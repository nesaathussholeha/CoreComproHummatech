@extends('admin.layouts.app')

@section('subcontent')
    <div class="d-flex justify-content-between pt-4 col-12">
        <h3>Judul dan deskripsi bagian produk di beranda</h3>
        <div class="d-flex gap-2">
            <a href="/" target="_blank" class="btn btn-primary m-0">Lihat Website</a>
            @if (!$home)
                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#tambah">Tambah</button>
            @endif
        </div>
    </div>
@endsection

@section('content')
    <style>
        .btn-xs {
            padding: 7px 15px;
            font-size: 10px;
        }
    </style>
    <div class="col-lg-12 pt-5">
        <div class="row">
            <div class="card p-3">
                @if ($home)
                    <div class="card p-3">
                        <div class="p-3">
                            <h1>{{ $home->title }}</h1>
                            <p>{{ $home->description }}</p>
                        </div>
                        <div class="text-end gap-2">
                            <button class="btn btn-edit btn-xs mt-2"
                                    style="background-color: #DDEAFF; color: #307EF3" type="button"
                                    data-bs-toggle="modal" data-bs-target="#edit"
                                    data-id="{{ $home->id }}" 
                                    data-title="{{ $home->title }}"
                                    data-description="{{ $home->description }}">Edit</button>
                            <button class="btn-delete btn btn-xs mt-2"
                                style="background-color: #FFE8EA; color: #DC3545"
                                data-id="{{ $home->id }}">
                                Hapus
                            </button>
                        </div>
                    </div>
                @else
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('nodata.jpg') }}" alt="" width="400px">
                    </div>
                    <h5 class="text-center">
                        Data Masih Kosong
                    </h5>
                @endif
            </div>
        </div>
    </div>


    <!-- Add Modal -->
    <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah data</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="{{ route('home-description.store') }}" method="POST" id="bookmark-form"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Judul</label>
                                <input class="form-control" type="text" required="" autocomplete="name" name="title"
                                    placeholder="Masukkan judul">
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Deskripsi</label>
                                <textarea class="form-control" placeholder="Masukkan deskripsi" name="description" cols="10" rows="3"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-light-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade modal-bookmark" id="edit" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" method="POST" id="form-update" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Judul</label>
                                <input class="form-control" type="text" required="" autocomplete="name" id="title-edit" name="title"
                                    placeholder="Masukkan judul">
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Deskripsi</label>
                                <textarea class="form-control" id="description-edit" placeholder="Masukkan deskripsi" name="description" cols="10" rows="3"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-light-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    <script>
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', 'home-description/' + id);
            $('#modal-delete').modal('show');
        });
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');
            $('#form-update').attr('action', 'home-description/' + id); 
            $('#title-edit').val(title);
            $('#description-edit').text(description);
            $('#modal-edit').modal('show');
        });
    </script>
@endsection
