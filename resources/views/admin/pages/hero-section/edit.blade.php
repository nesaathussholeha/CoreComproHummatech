@extends('admin.layouts.app')

@section('subcontent')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 p-0">
                <h3>Ubah Carousel Hero Section</h3>
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
                    <li class="breadcrumb-item active">Ubah Data</li>
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
        <form action="{{ route('hero.update', $section->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <div class="fw-bold mb-2">Preview</div>
                <div class="img-empty">
                    <img src="{{ asset('storage/' . $section->image) }}" id="upload-img" alt="{{ $section->name }}" />
                </div>
            </div>

            <div class="mb-3 form-group">
                <label for="upload">Foto / Video <small class="text-danger">*Wajib Diisi</small></label>
                <input type="file" id="upload" class="form-control" accept="image/*,video/*" name="image"
                    onchange="readURL(this)" />
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="headline">Judul <small class="text-danger">*Wajib Diisi</small></label>
                <input type="text" id="headline" class="form-control" name="title"
                    placeholder="Contoh: Ini Adalah Headline" value="{{ old('title', $section->title) }}" />
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="subheadline">Subjudul <small class="text-danger">*Wajib Diisi</small></label>
                <input type="text" id="subheadline" class="form-control" name="subtitle"
                    placeholder="Contoh: Ini Adalah Subheadline" value="{{ old('subtitle', $section->subtitle) }}" />
                @error('subtitle')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 form-group">
                <label for="subheadline">Keterangan <small class="text-danger">*Wajib Diisi</small></label>
                <input type="text" id="subheadline" class="form-control" name="information"
                    placeholder="Contoh: Ini Adalah Keterangan" value="{{ old('information', $section->information) }}" />
                @error('subtitle')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="link">Link <small class="text-muted">(Opsional)</small></label>
                <input type="url" id="link" class="form-control" name="link"
                    placeholder="Contoh: https://www.mischool.id/" value="{{ old('link', $section->link) }}" />
                @error('link')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="pt-3 me-auto d-flex gap-2 w-100 justify-content-end align-items-center">
                <a href="{{ url('/hero-section') }}" class="btn btn-light">Batal</a>
                <button class="btn btn-primary" type="submit">Perbaharui</button>
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
