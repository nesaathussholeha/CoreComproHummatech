@extends('admin.layouts.app')

@section('subcontent')
    <div class="container-fluid">
        <div class="page-title">
            <div class="d-flex justify-content-between">
                    <h3>logo perusahaan</h3>
                    <a href="/about-us/logo" class="btn btn-secondary w75" target="_blank">Lihat di website</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="py-3">
        @if($errors->all())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        @forelse ($logos as $logo)
            <form action="{{ route('philosophy.update', $logo->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="product-box">
                                    <div class="product-img">
                                        <div id="imageContainer">
                                            <img src="{{ asset('storage/'.$logo->image) }}" id="selectedImage"
                                                style="object-fit: cover; width: 100%;" class="img-fluid" alt="Logo">
                                        </div>

                                        <div class="product-hover">
                                            <ul>
                                                <li>
                                                    <label>
                                                        <i class="fas fa-pencil"></i>
                                                        <input type="file" id="inputImage" hidden class="form-control"
                                                            name="image" accept="image/*" onchange="displayImage(event)">
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="my-2">
                                    <div class="mb-3">
                                        <label for="image">Judul <small class="text-danger ms-3">*Wajib
                                                diisi</small></label>
                                        <input type="text" class="form-control" name="title" value="{{ $logo->title }}"
                                            placeholder="PT Humma Teknologi  Indonesia">
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Deskripsi <small class="text-danger ms-3">*Wajib
                                                diisi</small></label>

                                        <div class="editor" style="height: 300px">{!! old('description', $logo->description) !!}</div>
                                        <textarea type="text" class="form-control description d-none" name="description" placeholder="Deskripsi" rows="5">{!! old('description', $logo->description) !!}</textarea>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @empty
            <form action="{{ route('philosophy.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="product-box">
                                    <div class="product-img">
                                        <div id="imageContainer">
                                            <img src="{{ asset('assets/images/Figure.png') }}" id="selectedImage"
                                                style="object-fit: cover; width: 100%;" class="img-fluid" alt="Logo">
                                        </div>

                                        <div class="product-hover">
                                            <ul>
                                                <li>
                                                    <label>
                                                        <i class="fas fa-pencil"></i>
                                                        <input type="file" id="inputImage" hidden class="form-control"
                                                            name="image" accept="image/*" onchange="displayImage(event)">
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="my-2">
                                    <div class="mb-3">
                                        <label for="image">Judul <small class="text-danger ms-3">*Wajib
                                                diisi</small></label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="PT Humma Teknologi  Indonesia">
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Deskripsi <small class="text-danger ms-3">*Wajib
                                                diisi</small></label>

                                        <div class="editor" style="height: 300px">{!! old('description') !!}</div>
                                        <textarea type="text" class="form-control description d-none" name="description" placeholder="Deskripsi" rows="5"></textarea>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforelse
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

    <script>
        // Fungsi untuk menampilkan gambar yang dipilih
        function displayImage(event) {
            const input = event.target;
            const imageContainer = document.getElementById('imageContainer');
            const selectedImage = document.getElementById('selectedImage');

            // Memastikan ada file yang dipilih
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                // Membaca file gambar yang dipilih
                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                };

                // Membaca file sebagai URL data
                reader.readAsDataURL(input.files[0]);

                // Menampilkan kontainer gambar
                imageContainer.style.display = 'block';
            } else {
                // Jika tidak ada file yang dipilih, sembunyikan kontainer gambar
                imageContainer.style.display = 'none';
            }
        }
    </script>
@endsection
