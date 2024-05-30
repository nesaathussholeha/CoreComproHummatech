@extends('admin.layouts.app')

@section('header-style')
    <style>
        #datatable .table thead th {
            background: #36405E;
            color: white;
        }

        #datatable .table tr:nth-of-type(odd) td {
            background: #F0F0F0 !important;
        }

        #datatable .table tr:nth-of-type(even) td {
            background: #FFF !important;
        }

        #datatable .table tr:nth-of-type(even) .sorting_1 {
            background: #FAFAFA !important;
        }

        #datatable .table tr:nth-of-type(odd) .sorting_1 {
            background: #F0F0F0 !important;
        }

        .dark-only #datatable .table tr:nth-of-type(odd) .sorting_1,
        .dark-only #datatable .table tr:nth-of-type(odd) td {
            background: none !important;
            color: white !important;
        }

        .dark-only #datatable tr td {
            border-color: rgba(var(--bs-white-rgb), .25) !important;
        }

        .dark-only #datatable .table tr:nth-of-type(even) td {
            color: white !important;
            background: rgba(var(--bs-white-rgb), .125) !important;
        }

        .dark-only #datatable .table tr:nth-of-type(odd) .sorting_1,
        .dark-only #datatable .table tr:nth-of-type(even) .sorting_1 {
            background: rgba(var(--bs-white-rgb), .15) !important;
        }

        .dark-only #datatable .dataTables_paginate {
            border-color: rgba(var(--bs-white-rgb), .15);
        }

        .dark-only #datatable .paginate_button,
        .dark-only #datatable .dataTables_info {
            color: rgba(var(--bs-white-rgb), 1) !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12 pt-3">
            <div class="pb-0 d-flex justify-content-between">
                <h3>Pengajuan</h3>
                <div class="d-flex align-items-center gap-2">
                    <p class="m-0 me-2">Cari:</p>
                    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                </div>
            </div>
        </div>
        <div class="col-sm-12 mt-3">
            <div class="table-responsive custom-scrollbar" id="datatable">
                <table class="table table-striped display">
                    <thead style="background-color:#36405E;">
                        <tr>
                            <th scope="col" style="color: white">No</th>
                            <th scope="col" style="color: white">Name</th>
                            <th scope="col" style="color: white">Email</th>
                            <th scope="col" style="color: white">Pesan</th>
                            <th scope="col" style="color: white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>AGDTS</td>
                            <td>agdts@gmail.com</td>
                            <td>{{ Str::limit('Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat velit tenetur veritatis', 50) }}
                            </td>
                            <td class="gap-2 align-items-center">
                                <a href="#" class="btn btn-outline-success">Terima</a>
                                <a href="#" class="btn btn-danger">Tolak</a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#edit"
                                    class="btn btn-primary px-3"><i class="fa fa-eye"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>SGMAN</td>
                            <td>sgman@gmail.com</td>
                            <td>{{ Str::limit('Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat velit tenetur veritatis', 50) }}
                            </td>
                            <td class="gap-2 align-items-center">
                                <a href="#" class="btn btn-outline-success">Terima</a>
                                <a href="#" class="btn btn-danger">Tolak</a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#edit"
                                    class="btn btn-primary px-3"><i class="fa fa-eye"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>SPMP</td>
                            <td>spmp@gmail.com</td>
                            <td>{{ Str::limit('Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat velit tenetur veritatis', 50) }}
                            </td>
                            <td class="gap-2 align-items-center">
                                <a href="#" class="btn btn-outline-success">Terima</a>
                                <a href="#" class="btn btn-danger">Tolak</a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#edit"
                                    class="btn btn-primary px-3"><i class="fa fa-eye"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade modal-bookmark" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Approval</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="#" method="POST" id="bookmark-form" novalidate=""
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Nama</label>
                                <p class="ms-2 text-muted">AGDTS</p>
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Email</label>
                                <p class="ms-2 text-muted">agdts@gmail.com</p>
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Pesan</label>
                                <p class="ms-2 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque
                                    odio repellat velit cupiditate excepturi ipsam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 mt-3 ms-2">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#datatable table').DataTable({
            searching: false,
            columnDefs: [{
                targets: 4,
                sortable: false
            }]
        });
    </script>
@endsection
