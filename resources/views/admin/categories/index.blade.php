@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="row">
    <div class="col-lg-12">
        {{-- Alert Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger border-0 shadow-sm">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-primary fw-bold"><i class="bi bi-grid-fill me-2"></i>Daftar Kategori</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="bi bi-plus-lg me-1"></i> Kategori Baru
                </button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Detail Kategori</th>
                                <th class="text-center">Total Produk</th>
                                <th class="text-center">Status</th>
                                <th class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            @if($category->image)
                                                <img src="{{ asset('storage/' . $category->image) }}" class="rounded shadow-sm me-3" width="45" height="45" style="object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                                    <i class="bi bi-tag text-muted"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="fw-bold">{{ $category->name }}</div>
                                                <small class="text-muted">slug: {{ $category->slug }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark border">{{ $category->products_count ?? 0 }} Produk</span>
                                    </td>
                                    <td class="text-center">
                                        @if($category->is_active)
                                            <span class="badge bg-success-subtle text-success px-3">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary px-3">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                                  class="d-inline ms-1" onsubmit="return confirm('Hapus kategori ini? Produk di dalamnya mungkin akan kehilangan kategori.')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                {{-- MODAL EDIT --}}
                                <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Kategori</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Nama Kategori</label>
                                                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Ganti Gambar</label>
                                                        <input type="file" name="image" class="form-control" accept="image/*">
                                                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                                    </div>
                                                    <div class="form-check form-switch mt-3">
                                                        <input type="hidden" name="is_active" value="0">
                                                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="switch{{$category->id}}" {{ $category->is_active ? 'checked' : '' }}>
                                                        <label class="form-check-label fw-bold" for="switch{{$category->id}}">Status Aktif</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-warning px-4">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <i class="bi bi-folder-x display-4 d-block mb-3"></i>
                                        Belum ada kategori ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL TAMBAH (Create) --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Kategori</label>
                        <input type="text" name="name" class="form-control" required placeholder="Contoh: Sepatu Olahraga">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Gambar Cover</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="switchCreate" checked>
                        <label class="form-check-label fw-bold" for="switchCreate">Aktifkan Sekarang</label>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection