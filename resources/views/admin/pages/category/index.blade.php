@extends('admin.layouts.app')

@section('content')
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h4 class="m-2">Sosial Media</h4>
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
    </div>
    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/images/avtar/11.jpg') }}" class="rounded-circle w-50" alt="">
                    </div>
                    <div class="text-center mt-3">
                        <h3 class="mt-2 mb-0 text-primary">https://www.youtube.com/</h3>
                    </div>
                    <div class="mt-3 d-flex justify-content-center gap-2">
                        <button class="btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#edit"
                            type="button">Edit</button>
                        <button class="btn btn-danger btn-edit" type="button">Hapus</button>
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
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah Sosial Media</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="#" method="POST" id="bookmark-form" novalidate=""
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Nama Platform</label>
                                <input class="form-control" type="text" required="" autocomplete="name"
                                    placeholder="Masukkan Nama Platform">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Tautan Media Sosial</label>
                                <input class="form-control" type="text" required="" autocomplete="name"
                                    placeholder="Masukkan Tautan Media Sosial">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Foto / Logo Sosmed</label>
                                <input class="form-control" id="formFile" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade modal-bookmark" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sosial Media</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="#" method="POST" id="bookmark-form"
                    novalidate="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Nama Platform</label>
                                <input class="form-control" type="text" required="" autocomplete="name"
                                    placeholder="Masukkan Nama Platform">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Tautan Media Sosial</label>
                                <input class="form-control" type="text" required="" autocomplete="name"
                                    placeholder="Masukkan Tautan Media Sosial">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Foto / Logo Sosmed</label>
                                <input class="form-control" id="formFile" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
