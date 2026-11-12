<div class="mb-3">
    <label class="form-label">Nama Kategori <span class="text-danger">*</span></label>
    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}"
           class="form-control @error('name') is-invalid @enderror" autofocus>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" rows="3"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<a href="{{ route('categories.index') }}" class="btn btn-light">Batal</a>
<button class="btn btn-primary">Simpan</button>
