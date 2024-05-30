@extends('admin.layouts.app')

@section('subcontent')
    <div class="py-1"></div>
    <div class="px-3">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-7 p-0">
                    <h3>Alur Kerja</h3>
                </div>

                <div class="col-sm-5">
                    <div class="d-flex align-items-center">
                        <form action="">
                            <div class="col-12 col-lg-12 d-flex justify-content-end">
                                <div class="d-flex justify-content-lg-end justify-content-start">
                                    <div class="d-flex align-items-center gap-2 mx-2">
                                        <label for="search">Cari:</label>
                                        <input type="text" name="name" value="{{ request()->name }}" id="search" class="form-control mx-3">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#create-modal">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col">
                                            <label for="name">Kategori</label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                placeholder="Buat Kategori">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mx-3 mb-3">
                                        <button type="button" class="btn btn-secondary me-2"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary">Tambah</button>
                                    </div>
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
    <div class="row mt-3">
        @forelse ($workflows as $workflow)
            <div class="col-xxl-3 col-xl-50 col-sm-6 proorder-xl-2">
                <div class="card since">
                    <div class="card-body">
                        <div class="customer-card d-flex justify-content-start gap-3">
                            <div class="dashboard-user bg-light-primary dflex justify-content-center">
                                <span class="mx-auto text-primary">{{ $loop->iteration }}</span>
                            </div>
                            <div class="text-center">
                                <h4 class="">{{ $workflow->name }}</h4>
                            </div>
                        </div>
                        <div class="mx-2">
                            <p class="mt-0 mb-2" style="font-size: 17px">{!! Str::words($workflow->description, 14, '...') !!}</p>
                        </div>
                        <div class="mx-2 mt-4 d-flex justify-content-between gap-2">
                            <button type="button" class="btn btn-primary w-100 btn-edit" data-id="{{ $workflow->id }}"
                                data-name="{{ $workflow->name }}" data-description="{{ $workflow->description }}"
                                >Edit</button>
                            <button type="button" class="btn btn-danger w-100 btn-delete"
                                data-id="{{ $workflow->id }}">Hapus</button>
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

    <div class="modal fade" id="create-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Alur Kerja</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('store.workflow') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" name="name" id=""
                            placeholder="Masukan judul">
                    </div>
                    <div class="mb-3">
                        <label for="title">Deskripsi</label>
                        <textarea class="form-control" name="description" id="" placeholder="Masukan judul"> </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
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
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Ubah Data</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" id="form-update" action="" method="POST" id="bookmark-form"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" name="name" id="name-edit"
                                placeholder="Masukan judul">
                        </div>
                        <div class="mb-3">
                            <label for="title">Deskripsi</label>
                            <textarea class="form-control" name="description" id="description-edit" placeholder="Masukan judul"> </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.components.delete-modal-component')

@endsection

@section('script')
    <script>
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', 'workflow/delete/' + id);
            $('#modal-delete').modal('show');
        });
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');
            $('#form-update').attr('action', 'workflow/update/' + id);
            $('#name-edit').val(name);
            $('#description-edit').text(description);
            $('#modal-edit').modal('show');
        });
    </script>
@endsection
