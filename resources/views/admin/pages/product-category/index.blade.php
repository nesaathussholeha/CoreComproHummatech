@extends('admin.layouts.app')

@section('header-style')
    <style>
        #datatable .table th {
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

@section('subcontent')
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h4 class="m-2">Kategori Produk</h4>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-lg-end justify-content-start">
                        <form action="/category-product" class="d-flex align-items-center gap-2">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" name="name" value="{{ request()->name }}" class="form-control" placeholder="Cari Produk" aria-label="Cari Produk" aria-describedby="basic-addon1">
                            </div>

                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                        </form>

                        <!-- Add Modal -->
                        <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah Kategori Produk</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="form-bookmark needs-validation" action="{{ route('category-product.store') }}" method="POST" id="bookmark-form" novalidate=""
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                <div class="mb-3 mt-0 col-md-12">
                                                    <label for="name">Kategori</label>
                                                    <input class="form-control" type="text" required="" autocomplete="name" name="name"
                                                        placeholder="Masukkan Nama Kategori">
                                                        @error('name')
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="modal fade modal-bookmark" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Produk</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" method="POST" id="form-update" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Kategori Produk</label>
                                <input class="form-control name"name="name" type="text" required="" autocomplete="name"
                                    placeholder="Masukkan Nama Kategori">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-light-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                            <button class="btn btn-light-primary" type="submit">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive custom-scrollbar" id="datatable">
        <table class="table table-striped display">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categoryProducts as $index=>$categoryProduct)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $categoryProduct->name }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn-edit btn btn-warning btn-edit" data-id="{{ $categoryProduct->id }}" data-name="{{ $categoryProduct->name }}"
                                    id="{{ $categoryProduct->id }}">
                                    Edit
                                </button>
                                <button class="btn-delete btn btn-danger btn-delete" data-id="{{ $categoryProduct->id }}"
                                    id="{{ $categoryProduct->id }}">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
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
        $('#datatable table').DataTable({
            searching: false,
            columnDefs: [{
                targets: 2,
                sortable: false
            }]
        });
        $('.btn-edit').click(function() {
            var id = $(this).data('id'); // Mengambil nilai id dari tombol yang diklik
            var name = $(this).data('name'); // Mengambil nilai name dari tombol yang diklik
            $('#form-update').attr('action', '/category-product/update/' + id ); // Mengubah nilai atribut action form
            $('.name').val(name);
            $('#modal-edit').modal('show');
        });
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/category-product/delete/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
