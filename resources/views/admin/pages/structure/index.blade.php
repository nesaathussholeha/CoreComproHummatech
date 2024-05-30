@extends('admin.layouts.app')

@section('header-style')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1rem;
        }

        @media screen and (min-width: 992px) {
            .grid-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media screen and (min-width: 1200px) {
            .grid-container {
                grid-template-columns: repeat(4, 1fr);
            }
        }
    </style>
@endsection

@section('subcontent')
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h5 class="m-2 fw-bold">Struktur Organisasi dan Usaha</h5>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-lg-end justify-content-start">
                        <a href="/about-us/structure-organization" class="btn btn-secondary me-2" target="_blank">Lihat di website</a>
                        @if ($organization && $business)
                        @else
                            <a class="btn btn-primary m-0" href="#tambah" data-bs-toggle="modal">Tambah</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <ul class="simple-wrapper nav nav-tabs modal-header" id="myTab" role="tablist">
                        @if ($organization == null)
                            <li class="nav-item"><a class="nav-link active txt-primary" id="profile-tabs" data-bs-toggle="tab" href="#organisasi" role="tab" aria-controls="profile" aria-selected="false">Struktur organisasi</a></li>
                        @endif
                        @if ($business == null)
                            <li class="nav-item"><a class="nav-link txt-primary" id="contact-tab" data-bs-toggle="tab" href="#usaha" role="tab" aria-controls="contact" aria-selected="false">Struktur usaha</a></li>
                        @endif
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </ul>

                <div class="modal-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show {{ $organization ? '' : 'active' }}" id="organisasi" role="tabpanel">
                            <form class="form-bookmark needs-validation" action="{{ route('company.structure.create') }}" method="POST" id="bookmark-form" novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="pt-3 mb-0">
                                    <div class="mb-3 mt-0 col-md-12">
                                        <input type="hidden" name="type" value="structure_organize">
                                        <label for="formFile">Foto struktur organisasi</label>
                                        <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                                            <img class="img-thumbnail image-preview" itemprop="thumbnail">
                                        </figure>
                                        <input class="form-control" name="image" id="formFile" type="file" onchange="preview(event)"/>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-light-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                                    <button class="btn btn-primary" type="submit">Tambah</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade {{ $organization ? 'show active' : '' }}" id="usaha" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="pt-3">
                            <form class="form-bookmark needs-validation" action="{{ route('company.structure.create') }}" method="POST" id="bookmark-form" novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 mt-0 col-md-12">
                                    <input type="hidden" name="type" value="structure_business">
                                    <label for="formFile">Foto struktur usaha</label>
                                    <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                                        <img class="img-thumbnail image-preview" itemprop="thumbnail">
                                    </figure>
                                    <input class="form-control" name="image" id="formFile" type="file" onchange="preview(event)"/>
                                </div>
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-light-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                                    <button class="btn btn-primary" type="submit">Tambah</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="mb-3">
        @if ($organization)
            <div class=" border border-1 rounded-2 d-flex justify-content-end text-center pb-5">
                <div class="position-absolute p-3">
                    <button class="mb-2 py-2 px-4 btn-edit btn btn-primary" data-id="{{ $organization->id }}" data-name="{{ $organization->name }}" data-position_id="{{ $organization->position_id }}" data-image="{{ $organization->image }}" data-type="{{ $organization->type }}" type="button">Edit</button>
                    <button class="mb-2 py-2 px-4 btn-delete btn btn-danger" data-id="{{ $organization->id }}" type="button">Hapus</button>
                </div>
                <div class="col">
                    <h3 class="py-4">Struktur Organisasi</h1>
                    <img src="{{ asset('storage/'.$organization->image) }}" width="50%">
                </div>
            </div>
        @else
            <div class=" border border-1 rounded-2 text-center pb-5">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('nodata.jpg') }}" alt="" width="200px">
                </div>
                <h5 class="text-center">
                    Struktur Organisasi Masih Kosong
                </h5>
            </div>
        @endif
        @if ($business)
            <div class="mt-5 border border-1 rounded-2 d-flex justify-content-end text-center pb-5">
                <div class="position-absolute p-3">
                    <button class="mb-2 py-2 px-4 btn-edit btn btn-primary" data-id="{{ $business->id }}" data-name="{{ $business->name }}" data-position_id="{{ $business->position_id }}" data-image="{{ $business->image }}" data-type="{{ $business->type }}" type="button">Edit</button>
                    <button class="mb-2 py-2 px-4 btn-delete btn btn-danger" data-id="{{ $business->id }}" type="button">Hapus</button>
                </div>
                <div class="col">
                    <h3 class="py-4">Struktur Usaha</h1>
                    <img src="{{ asset('storage/'.$business->image) }}" width="50%">
                </div>
            </div>
        @else
            <div class="mt-5 border border-1 rounded-2 text-center pb-5">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('nodata.jpg') }}" alt="" width="200px">
                </div>
                <h5 class="text-center">
                    Struktur Usaha Masih Kosong
                </h5>
            </div>
        @endif
    </div>

    <!-- Edit Modal -->
    <div class="modal fade modal-bookmark" id="modal-edit" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Ubah Data</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" id="form-update" action="" method="POST" id="bookmark-form"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" id="type">

                    <div class="modal-body">
                        <div class=" d-flex justify-content-center"><img src="" id="image-edit" style="object-fit: cover; height:300px" alt="profile">
                        </div>

                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Foto</label>
                                <input class="form-control" name="image" id="formFile" type="file" onchange="previewImage(event)"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- @if($structures->hasPages())
    <div class="mb-3">
        {{ $structures->links() }}
    </div>
    @endif --}}

    @include('admin.components.delete-modal-component')
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
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/setting/structure/delete/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var image = $(this).data('image');
            var type = $(this).data('type');

            $('#image-edit').attr('src','{{ asset('storage') }}/'+ image);
            $('#form-update').attr('action', '/setting/structure/update/' + id); // Mengubah nilai atribut action form
            $('#name-edit').val(name);
            $('#type').val(type);
            $('#modal-edit').modal('show');
        });
    </script>

    <script>
        function preview(event) {
            var input = event.target;
            var previewImages = document.getElementsByClassName('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    Array.from(previewImages).forEach(function(previewImage) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                    });
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewImage(event) {
            var input = event.target;
            var previewImage = document.getElementById('image-edit');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
