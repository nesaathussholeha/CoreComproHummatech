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
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 box-col-12 col-12">
            <div class="row">
                @forelse ($serviceData as $id => $name)
                @php
                    $galleryImageCount = $galeryImages->whereIn('gallery_id', $galleries->where('service_id', $id)->pluck('id'))->count();
                @endphp
                <a href="{{ route('gallery.showFolder', $id) }}" class="col-md-2 col-xl-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-box">
                                <div class="product-img">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="60px" viewBox="0 0 51 43" fill="none">
                                        <path d="M17.85 8.56011e-09C18.4105 -4.57125e-05 18.9554 0.183081 19.4004 0.521059L19.6554 0.741118L26.5557 7.58824H43.35C45.3013 7.58813 47.1789 8.32765 48.5986 9.65548C50.0183 10.9833 50.8728 12.7991 50.9873 14.7313L51 15.1765V35.4118C51.0001 37.3473 50.2546 39.2097 48.9159 40.618C47.5773 42.0262 45.7467 42.8738 43.7988 42.9874L43.35 43H7.65C5.69871 43.0001 3.82114 42.2606 2.40143 40.9328C0.981732 39.6049 0.127226 37.7891 0.0127503 35.8569L1.18841e-08 35.4118V7.58824C-0.000108685 5.6527 0.745429 3.79029 2.08407 2.38205C3.42272 0.973806 5.25327 0.126199 7.2012 0.0126474L7.65 8.56011e-09H17.85Z" fill="#FFAA05"/>
                                    </svg>
                                </div>
                                <h3>{{ $name }}</h3>
                                <p class="text-secondary">
                                    {{ $galleryImageCount }} Foto
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
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
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if(session('success'))
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
@endsection
