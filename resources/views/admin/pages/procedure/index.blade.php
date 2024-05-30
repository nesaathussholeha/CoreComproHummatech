@extends('admin.layouts.app')
@section('subcontent')
    <div class="py-1"></div>
    <div class="px-3">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-7 p-0">
                    <h3>Prosedur</h3>
                </div>
                <div class="col-sm-5">
                    <div class="d-flex align-items-center">
                        <form action="/procedure">
                            <div class="col-12 col-lg-12 d-flex justify-content-end">
                                <div class="d-flex gap-2 col-sm-12">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" name="title" value="{{ request()->title }}" class="form-control" placeholder="Cari Produk" aria-label="Username"
                                    aria-describedby="basic-addon1">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#create-modal">Tambah</button>
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
        @forelse ($procedures as $item)
            <div class="col-xxl-3 col-xl-50 col-sm-6 proorder-xl-2">
                <div class="card since">
                    <div class="card-body">
                        <div class="customer-card d-flex justify-content-start gap-3">
                            <div class="dashboard-user bg-light-primary dflex justify-content-center">
                                <span class="mx-auto text-primary">{{ $loop->iteration }}</span>
                            </div>
                            <div class="text-center">
                                <h4 class="">{{ $item->title }}</h4>
                            </div>
                        </div>
                        <div class="mx-2">
                            <p class="mt-0 mb-2" style="font-size: 17px">{!! Str::words($item->description, 14, '...') !!}</p>
                        </div>
                        <div class="mx-2 mt-4 d-flex justify-content-between gap-2">
                            <button type="button" class="btn btn-primary w-100 btn-edit" data-id="{{ $item->id }}"
                                data-title="{{ $item->title }}" data-description="{{ $item->description }}"
                                data-service_id="{{ $item->service_id }}">Edit</button>
                            <button type="button" class="btn btn-danger w-100 btn-delete"
                                data-id="{{ $item->id }}">Hapus</button>
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

    <!-- Modal -->
    <div class="modal fade" id="create-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Prosedur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('procedure.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" name="title" id=""
                                placeholder="Masukan judul">
                        </div>
                        <div class="mb-3">
                            <label for="title">Deskripsi</label>
                            <textarea class="form-control" name="description" id="" placeholder="Masukan judul"> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="service_id">Tampilkan di</label>
                            <select class="form-select" name="service_id" id="">
                                <option value disabled selected>Pilih page</option>
                                @foreach ($services as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
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
    <div class="modal fade" id="modal-edit" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Prosedur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" name="title" id="title-edit"
                                placeholder="Masukan judul">
                        </div>
                        <div class="mb-3">
                            <label for="title">Deskripsi</label>
                            <textarea class="form-control" name="description" id="description-edit" placeholder="Masukan judul"> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="service_id">Tampilkan di</label>
                            <select class="form-select" name="service_id" id="service-edit">
                                @foreach ($services as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
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
            $('#form-delete').attr('action', '/procedure/' + id);
            $('#modal-delete').modal('show');
        });
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');
            var service_id = $(this).data('service_id');
            $('#form-update').attr('action', '/procedure/' + id);
            $('#title-edit').val(title);
            $('#description-edit').text(description);
            $('#service-edit').find('option[value="' + service_id + '"]').prop('selected', true);
            $('#modal-edit').modal('show');
        });
    </script>
@endsection
