<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // Daftar kategori + pencarian
    public function index(Request $request)
    {
        $categories = Category::withCount('items')
            ->when($request->q, function ($query, $q) {
                $query->where('name', 'like', "%{$q}%");
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('categories.index', compact('categories'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('categories.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required', 'max:100', 'unique:categories,name'],
            'description' => ['nullable', 'max:500'],
        ], $this->pesan());

        $category = Category::create($data);

        $this->catat('tambah kategori', "Menambah kategori {$category->name}");

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan form ubah
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Menyimpan perubahan
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            // ignore: nama miliknya sendiri tidak dianggap kembar
            'name'        => ['required', 'max:100', 'unique:categories,name,' . $category->id],
            'description' => ['nullable', 'max:500'],
        ], $this->pesan());

        $category->update($data);

        $this->catat('ubah kategori', "Mengubah kategori {$category->name}");

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil diubah.');
    }

    // Menghapus kategori
    public function destroy(Category $category)
    {
        // Kategori yang masih dipakai barang tidak boleh dihapus
        if ($category->items()->exists()) {
            return back()->with('error', 'Kategori tidak bisa dihapus karena masih dipakai oleh barang.');
        }

        $nama = $category->name;
        $category->delete();

        $this->catat('hapus kategori', "Menghapus kategori {$nama}");

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    // Pesan error dalam bahasa Indonesia
    private function pesan(): array
    {
        return [
            'name.required' => 'Nama kategori harus diisi.',
            'name.max'      => 'Nama kategori maksimal 100 huruf.',
            'name.unique'   => 'Nama kategori ini sudah dipakai.',
            'description.max' => 'Deskripsi maksimal 500 huruf.',
        ];
    }

    // Mencatat aktivitas ke tabel activity_logs
    private function catat(string $aksi, string $keterangan): void
    {
        ActivityLog::create([
            'user_id'     => Auth::id(),
            'action'      => $aksi,
            'description' => $keterangan,
        ]);
    }
}
