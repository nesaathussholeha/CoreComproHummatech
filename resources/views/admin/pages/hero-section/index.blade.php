@extends('admin.layouts.app')

@section('subcontent')
<div class="py-4">
        <div class="text-end me-4">
            <a href="/" target="_blank" class="btn btn-primary m-0">Lihat Website</a>
        </div>
        <div class="px-4 m-5">
            <ul class="simple-wrapper nav nav-tabs justify-content-between" id="myTab" role="tablist">
                <div class="d-flex">
                    <li class="nav-item"><a class="nav-link active txt-primary" id="profile-tabs" data-bs-toggle="tab"
                            href="#section" role="tab" aria-controls="profile" aria-selected="false">Slider</a></li>
                    <li class="nav-item"><a class="nav-link txt-primary" id="contact-tab" data-bs-toggle="tab"
                            href="#background" role="tab" aria-controls="contact" aria-selected="false">Background</a>
                    </li>
                </div>
                <div class="col-12 col-lg-6 me-5">

                </div>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active py-3" id="section" role="tabpanel">
                    <div class="d-flex justify-content-lg-end justify-content-start  gap-2">
                        <a class="btn btn-primary m-0" href="{{ url('/hero-section/create') }}"
                            >Tambah</a>
                    </div>
                    <div class="row">
                        @forelse ($sections as $section)
                            <div class="col-md-12 col-12 col-xl-6">
                                <div class="card rounded-4" style="height: 350px">
                                    <div class="product-box rounded-4">
                                        <div class="product-img">
                                            <img class="img-fluid" src="{{ asset('storage/' . $section->image) }}"
                                                alt="" />

                                            <div class="content-center">
                                                <h3 class="title">{{ $section->title }}</h3>
                                                <p class="subtitle fs-5 mb-0 pb-0">{{ $section->subtitle }}</p>
                                                <p style="font-size: 13px">{{ $section->information }}</p>
                                                @if ($section->link != null)
                                                <div class="btn btn-lg btn-primary">Lihat Selengkapnya</div>
                                                @endif
                                            </div>

                                            <div class="product-hover">
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('hero.edit', $section->id) }}"><i
                                                                class="fas fa-pencil"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="btn-delete" data-id="{{ $section->id }}"><i
                                                                class="fas fa-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('nodata.jpg') }}" alt="" width="400px">
                            </div>
                            <h5 class="text-center">
                                Data Masih Kosong
                            </h5>
                        @endforelse
                    </div>
                </div>
                <div class="tab-pane fade py-3" id="background" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="d-flex justify-content-lg-end justify-content-start  gap-2">
                        <button class="btn btn-primary m-0" type="button" data-bs-toggle="modal" data-bs-target="#tambah"
                            >Tambah</button>
                    </div>
                    <div class="row mt-3">
                        @forelse ($backgrounds as $background)
                            <div class="col-md-12 col-12 col-xl-6">
                                <div class="card rounded-4" style="height: 200px">
                                    <div class="product-box rounded-4">
                                        <div class="product-img">
                                            <img class="img-fluid" src="{{ asset('storage/' . $background->image) }}"
                                                alt="" />
                                            <div class="content-center">
                                                <h3 class="title">
                                                    {{ ($background->show_in == 'Tentang Kami' ? $background->about_in 
                                                    : ($background->service_id == null ? $background->show_in 
                                                    : $background->service->name)) }}
                                                </h3>
                                            </div>

                                            <div class="product-hover">
                                                <ul>
                                                    <li>
                                                        <button class="btn-edit" type="button"
                                                            data-id="{{ $background->id }}"
                                                            data-show-in="{{ $background->show_in }}"
                                                            data-image="{{ $background->image }}"
                                                            data-service="{{ $background->service_id }}"
                                                            data-about-in="{{ $background->about_in }}"
                                                            style="border: none; background: none;"><i class="fas fa-pencil"
                                                                style="margin-left: -5px"></i></button>
                                                    </li>
                                                    <li>
                                                        <a class="btn-delete-background" data-id="{{ $background->id }}"><i
                                                                class="fas fa-trash" style="mergin-left: 3px"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('nodata.jpg') }}" alt="" width="400px">
                            </div>
                            <h5 class="text-center">
                                Data Masih Kosong
                            </h5>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('header-style')
    <style>
        .product-box {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-box .img-fluid {
            position: relative;
            z-index: 1;
        }

        .product-box .content-center {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(var(--bs-dark-rgb), .5);
            z-index: 2;
            top: 0;
            left: 0;
            flex-direction: column;
            color: var(--bs-white);
        }

        .product-box .content-center .title {
            color: var(--bs-white);
            font-size: 2.5rem;
            font-weight: bold;
        }

        .product-box .content-center .subtitle {
            color: var(--bs-white);
            font-size: 1.5rem;
        }

        .product-hover {
            z-index: 5;
        }
    </style>
@endsection

@section('content')
    <!-- Add Modal -->
    <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah Background</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="/background/store" method="POST"
                    id="bookmark-form" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="form-group mb-3 mt-0 col-md-12 show_in">
                                <label for="category">Tampilkan di Halaman</label>
                                <select name="show_in" class="showIn js-example-basic-single form-select" id="#edit">
                                    <option value="" disabled selected>Pilih Halaman</option>
                                    <option value="Tentang Kami">Tentang Kami</option>
                                    <option value="Layanan">Layanan</option>
                                    <option value="Mitra Kami">Mitra Kami</option>
                                    <option value="Portofolio">Portofolio</option>
                                    <option value="Berita">Berita</option>
                                    <option value="Hubungi Kami">Hubungi Kami</option>
                                    <option value="Lowongan">Lowongan</option>
                                </select>
                                @error('show_in')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-1 mt-0 col-md-12 service" style="display: none;">
                                <label for="service_id">Tampilkan Pada Layanan</label>
                                <select name="service_id" class="js-example-basic-single form-select">
                                    <option value="" disabled selected>Pilih Layanan</option>
                                    @forelse ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @empty
                                        <option value="" disabled selected>Belum ada layanan</option>
                                    @endforelse
                                </select>
                                @error('service_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-1 mt-0 col-md-12 about" style="display: none;">
                                <label for="about_in">Tampilkan Pada Bagian</label>
                                <select name="about_in" class="js-example-basic-single form-select">
                                    <option value="Profile">Profile</option>
                                    <option value="Visi & Misi">Visi & Misi</option>
                                    <option value="Struktur Organisasi">Struktur Organisasi</option>
                                    <option value="Struktur Usaha">Struktur Usaha</option>
                                    <option value="Logo">Logo</option>
                                    <option value="Tim">Tim</option>
                                </select>
                                @error('about_in')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="image">Foto Background</label>
                                <input class="form-control" type="file" required="" name="image">
                                @error('image')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-light-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                            <button class="btn btn-light-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade modal-bookmark" id="modal-edit" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Edit Background</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" method="POST" id="form-update" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="form-group mb-3 mt-0 col-md-12 show_in">
                                <label for="category">Tampilkan di Halaman</label>
                                <select name="show_in" class="showIn js-example-basic-single form-select showIn-edit" id="#edit">
                                    <option value="" disabled selected>Pilih Halaman</option>
                                    <option value="Tentang Kami">Tentang Kami</option>
                                    <option value="Layanan">Layanan</option>
                                    <option value="Mitra Kami">Mitra Kami</option>
                                    <option value="Portofolio">Portofolio</option>
                                    <option value="Berita">Berita</option>
                                    <option value="Hubungi Kami">Hubungi Kami</option>
                                    <option value="Lowongan">Lowongan</option>
                                </select>
                                @error('show_in')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-1 mt-0 col-md-12 service" style="display: none;">
                                <label for="service_id">Tampilkan Pada Layanan</label>
                                <select name="service_id" class="js-example-basic-single form-select" id="service-edit">
                                    <option value="" disabled selected>Pilih Layanan</option>
                                    @forelse ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @empty
                                        <option value="" disabled selected>Belum ada layanan</option>
                                    @endforelse
                                </select>
                                @error('service_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-1 mt-0 col-md-12 about" style="display: none;">
                                <label for="about_in">Tampilkan Pada Bagian</label>
                                <select name="about_in" id="aboutIn-edit" class="js-example-basic-single form-select">
                                    <option value="Profile">Profile</option>
                                    <option value="Visi & Misi">Visi & Misi</option>
                                    <option value="Struktur Organisasi">Struktur Organisasi</option>
                                    <option value="Struktur Usaha">Struktur Usaha</option>
                                    <option value="Logo">Logo</option>
                                    <option value="Tim">Tim</option>
                                </select>
                                @error('about_in')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="image">Foto Background</label><br>
                                <img id="image-edit" style="width: 200px; height: auto; border: 1px solid #ccc;">
                                <input class="form-control mt-2" type="file" name="image" required
                                    onchange="previewImage()">
                                @error('image')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-light-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                            <button class="btn btn-light-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    <!-- Masukkan kode ini di dalam tag <head> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Masukkan kode ini sebelum akhir tag </body> -->
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 3000, // Menutup SweetAlert setelah 3 detik
                timerProgressBar: true // Menampilkan progress bar
            });
        </script>
    @endif
    <script>
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/delete/section/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-delete-background').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', 'background/delete/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var serviceId = $(this).data('service');
            var showIn = $(this).data('show-in');
            var aboutIn = $(this).data('about-in');
            var image = $(this).data('image');
            $('#form-update').attr('action', 'background/update/' + id);
            $('#service-edit').val(serviceId).trigger('change');
            $('.showIn-edit').val(showIn).trigger('change');
            $('#aboutIn-edit').val(aboutIn).trigger('change');
            $('#image-edit').attr('src', 'storage/' + image);
            $('#modal-edit').modal('show');
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".js-example-basic-single").select2({
                dropdownParent: $("#background")
            });
        });

        $('.showIn').change(function() {
            var selectedOption = $(this).val();

            if (selectedOption == "Layanan") {
                $('.service').show();
            } else {
                $('.service').hide();
            }
        });

        $('.showIn').change(function() {
            var selectedOption = $(this).val();

            if (selectedOption == "Tentang Kami") {
                $('.about').show();
            } else {
                $('.about').hide();
            }
        });
    </script>
    <script>
        function previewImage() {
            var input = document.querySelector('input[type="file"]');
            var image = document.getElementById('image-edit');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    image.setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
