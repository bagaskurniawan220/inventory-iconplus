@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                <form method="GET" class="d-flex gap-2">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                           placeholder="Cari nama kategori...">
                    <button class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
                </form>

                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Kategori
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Barang</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $c)
                            <tr>
                                <td>{{ $categories->firstItem() + $loop->index }}</td>
                                <td class="fw-semibold">{{ $c->name }}</td>
                                <td>{{ $c->description ?: '-' }}</td>
                                <td><span class="badge bg-secondary">{{ $c->items_count }}</span></td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('categories.edit', $c) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Ubah
                                    </a>
                                    <form method="POST" action="{{ route('categories.destroy', $c) }}" class="d-inline"
                                          onsubmit="return confirm('Yakin mau hapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada data kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $categories->links() }}
        </div>
    </div>
@endsection
