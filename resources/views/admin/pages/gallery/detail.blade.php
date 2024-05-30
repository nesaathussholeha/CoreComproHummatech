@extends('admin.layouts.app')

@section('content')
    <div class=" p-1 pb-4 pt-5">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h4 class="m-2">Galeri</h4>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-flex justify-content-lg-end justify-content-start">
                    <div class="d-flex align-items-center gap-2">
                        <p class="m-0 me-2">Cari:</p>
                        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                    </div>
                    <button class="btn btn-primary m-0" type="button" data-bs-toggle="modal"
                        data-bs-target="#tambah">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @forelse ($galleries as $gallery)
            @foreach ($galleryImages->where('gallery_id', $gallery->id) as $image)
                <div class="col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-header" style="width: 100%; background: none; margin-bottom: -20px">
                            <div class="position-absolute top-0 start-0">
                                <p class="bg-primary px-3 py-1 text-light"
                                    style="border-radius: 5px 0 0 0; font-size: 12px">{{ $gallery->name }}</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="product-box">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{ asset('storage/' . $image->image) }}" alt="">
                                    <div class="product-hover">
                                        <ul>
                                            <li><a type="button" data-id="{{ $image->id }}" class="btn-edit"
                                                    data-image="{{ $image->image }}"><i class="fa fa-edit "></i></a></li>
                                            <li><a type="button" data-id="{{ $image->id }}" class="btn-delete"><i
                                                        class="fa fa-trash "></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @empty
            <div class="d-flex justify-content-center">
                <img src="{{ asset('nodata.jpg') }}" alt="" width="400px">
            </div>
            <h5 class="text-center">
                Data Masih Kosong
            </h5>
        @endforelse
    </div>
    @error('name')
        {{ $message }}
    @enderror
    @error('service_id')
        {{ $message }}
    @enderror
    @error('image')
        {{ $message }}
    @enderror
    @error('image*')
        {{ $message }}
    @enderror
    @error('gallerie_id')
        {{ $message }}
    @enderror
    <!-- Add Modal -->
    <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="POST" id="formAddData" action="{{ route('gallery.store') }}" class="modal-content"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Galeri</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <div class="mb-3 mt-0 col-md-12">
                            <label for="bm-title">Judul Galeri</label>
                            <input class="form-control" id="formFile" name="name" type="text">
                        </div>
                        {{-- <div class="mb-3 mt-0 col-md-12">
                            <label for="bm-title">Tampilkan Pada</label>
                            <select name="service_id" id="showdata" class="form-select">
                                <option selected disabled>Pilih Salah Satu Layanan</option>
                                @foreach ($services as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <input id="image-uploadify" type="file" name="image[]" accept="image/*" multiple>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade modal-bookmark" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Galeri</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="#" method="POST" id="form-update"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row g-2">
                            <img src="" id="image-edit" class="img-fluid mb-3" alt="">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Foto</label>
                                <input class="form-control" name="image" id="formFile" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="buttonSubmitAdd" type="submit">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 2000, // Menutup SweetAlert setelah 3 detik
                timerProgressBar: true // Menampilkan progress bar
            });
        </script>
    @endif
    <script>
        feather.replace();
    </script>

    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#createUploadDropzone", {
            uploadMultiple: false,
            maxFilesize: 10,
            url: "{{ route('gallery.store') }}",
            maxFile: 1,
            acceptedFiles: ".jpg,.png,.gif",
            addRemoveLinks: true,
            dictDefaultMessage: "Drop files here or click to upload",
            autoProcessQueue: false,
            init: function() {
                this.on("removedfile", function(file) {
                    console.log("File " + file.name + " removed");
                });
            },
            maxfilesexceeded: function(file) {
                this.removeAllFiles();
                this.addFile(file);
            }
        });

        $('#formAddData').submit(function() {
            myDropzone.processQueue();
        })
    </script>

    <script>
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/galery/delete/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id'); // Mengambil nilai id dari tombol yang diklik
            var name = $(this).data('name');
            let image = $(this).data('image'); // Mengambil nilai name dari tombol yang diklik
            $('#form-update').attr('action', '/galery/update/' + id); // Mengubah nilai atribut action form
            $('#name-edit').val(name);
            $('#image-edit').attr('src', '{{ asset("storage") }}/' + image);
            $('#modal-edit').modal('show');
        });
    </script>
@endsection
