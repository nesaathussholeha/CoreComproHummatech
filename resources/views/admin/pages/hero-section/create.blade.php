@extends('admin.layouts.app')

@section('subcontent')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Tambah Carousel Hero Section</h3>
            </div>
            <div class="col-sm-6 p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/hero-section') }}">Hero Section</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('header-style')
    <style>
        .img-empty {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 400px;
            overflow: hidden;
            background: #eeeeee;
            border-radius: var(--bs-border-radius-xl);
            overflow: hidden;
        }

        .img-empty .upload-img {
            height: 300px;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex mb-3">
        <a href="{{ url('/hero-section') }}" class="btn btn-light">Kembali</a>
    </div>

    <div class="card card-body">
        <form action="{{ route('create.section') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <div class="fw-bold mb-2">Preview</div>
                <div class="img-empty">
                    <img src="{{ asset('blank-img.jpg') }}" id="upload-img" alt="Upload Placeholder" />
                </div>
            </div>

            <div class="mb-3 form-group">
                <label for="upload">Foto / Video <small class="text-danger">*Wajib Diisi</small></label>
                <input type="file" id="upload" name="image" class="form-control" accept="image/*,video/*"
                    onchange="readURL(this)" />
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="headline">Judul <small class="text-danger">*Wajib Diisi</small></label>
                <input type="text" id="headline" name="title" class="form-control" placeholder="Contoh: Ini Adalah Headline" />
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="subheadline">Subjudul <small class="text-danger">*Wajib Diisi</small></label>
                <input type="text" id="subheadline" name="subtitle" class="form-control" placeholder="Contoh: Ini Adalah Subheadline" />
                @error('subtitle')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 form-group">
                <label for="subheadline">Keterangan <small class="text-danger">*Wajib Diisi</small></label>
                <input type="text" id="subheadline" name="information" class="form-control" placeholder="Contoh: Ini Adalah Keterangan" />
                @error('subtitle')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="link">Link <small class="text-muted">(Opsional)</small></label>
                <input type="url" id="link" name="link" class="form-control" placeholder="Contoh: https://www.mischool.id/" />
            </div>

            <div class="pt-3 me-auto d-flex gap-2 w-100 justify-content-end align-items-center">
                <a href="{{ url('/hero-section') }}" class="btn btn-light">Batal</a>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#upload-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
