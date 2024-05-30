@extends('admin.layouts.app')

@section('content')
<div class="py-3">
    <div class="row">
        @forelse ($vacancies as $vacancy)
        <div class="col-sm-12">
            <div class="card card-body">
                <form action="{{ route('vacancy.update', $vacancy->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="rounded-3 p-4 position-relative">
                                <img alt="Logo" src="{{ asset("storage/{$vacancy->image}") }}" style="object-fit: cover; width: 100%;" class="img-fluid" />
                            </div>
                            <div class="my-1 mb-2">
                                <label for="image">Foto</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mt-1">
                                <label for="headline">Judul <span style="font-size: 11px" class="text-danger">*Wajib diisi</span></label>
                                <input type="text" class="form-control" id="headline" name="title" value="{{ $vacancy->title }}">
                            </div>
                            <div class="my-1">
                                <label for="subheadline">Subjudul <span style="font-size: 11px" class="text-danger">*Wajib diisi</span></label>
                                <input type="text" class="form-control" id="subheadline" name="subtitle" value="{{ $vacancy->subtitle }}">
                            </div>
                            <div class="my-1">
                                <label for="deskripsi">Deskripsi <span style="font-size: 11px" class="text-danger">*Wajib diisi</span></label>
                                <div class="editor" style="height: 300px">{!! old('description', $vacancy->description) !!}</div>
                                <textarea type="text" class="form-control description d-none" name="description" placeholder="Deskripsi" rows="5">{!! old('description', $vacancy->description) !!}</textarea>
                            </div>
                            <div class="my-1">
                                <label for="link">Tautan <span style="font-size: 11px" class="text-danger">*Wajib diisi</span></label>
                                <input type="text" class="form-control" id="link" name="link" value="{{ $vacancy->link }}">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary float-end">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @empty

        <div class="col-sm-12">
            <div class="card card-body">
                <form action="{{ route('vacancy.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="rounded-3 p-4 position-relative">

                                <!-- Kontainer untuk menampilkan gambar -->
                                <div id="imageContainer">
                                    <img src="{{ asset('assets/images/Figure.png') }}" id="selectedImage" style="object-fit: cover; width: 100%;" class="img-fluid" alt="Logo">
                                </div>
                            </div>
                            <div class="my-1 mb-2">
                                <label for="image">Foto</label>
                                <input type="file" id="inputImage" class="form-control" name="image" accept="image/*" onchange="displayImage(event)">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mt-1">
                                <label for="headline">Judul <span style="font-size: 11px" class="text-danger">*Wajib diisi</span></label>
                                <input type="text" class="form-control" id="headline" name="title" value="" placeholder="Masukkan Judul">
                            </div>
                            <div class="my-1">
                                <label for="subheadline">Subjudul <span style="font-size: 11px" class="text-danger">*Wajib diisi</span></label>
                                <input type="text" class="form-control" id="subheadline" name="subtitle" value="" placeholder="Masukkan Subjudul">
                            </div>
                            <div class="my-1">
                                <label for="deskripsi">Deskripsi <span style="font-size: 11px" class="text-danger">*Wajib diisi</span></label>
                                <div class="editor" style="height: 300px">{!! old('description') !!}</div>
                                <textarea type="text" class="form-control description d-none" name="description" placeholder="Deskripsi" rows="5"></textarea>
                            </div>
                            <div class="my-1">
                                <label for="link">Tautan <span style="font-size: 11px" class="text-danger">*Wajib diisi</span></label>
                                <input type="url" class="form-control" id="link" name="link" value="" placeholder="Mis: https://&hellip;">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary float-end">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @endforelse
    </div>

</div>
@endsection

@section('script')
<script>
    const quill = new Quill('.editor', {
        theme: 'snow',
        placeholder: "Silahkan masukkan deskripsi artikel.",
    });

    quill.on('text-change', (eventName, ...args) => {
        $('.description').val(quill.root.innerHTML);
    });
</script>
@endsection
