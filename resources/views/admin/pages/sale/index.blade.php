@extends('admin.layouts.app')

@section('subcontent')
<div class="card border-0 pt-4 mt-2">
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="d-flex align-items-center gap-2">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" class="form-control" placeholder="Cari Penjualan" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="d-flex justify-content-lg-end justify-content-start">
                <button class="btn btn-primary m-0" type="button" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Penjualan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="row">
        @forelse ($sales as $sale)
            <div class="col-xxl-3 col-md-4 col-sm-6">
                <div class="card border-1 rounded">
                    <img src="{{ asset('storage/'.$sale->image) }}" alt="{{ $sale->name }}" class="rounded-top card-img-thumbnail" style="object-fit:cover; height: 200px; width: 100%;" />
                    <div class="card-header text-center h4 border-bottom"
                        style="margin-top: -1rem; border-radius: var(--bs-border-radius) var(--bs-border-radius) 0 0 !important;">
                        {{ $sale->name }}</div>
                    <div class="card-body">
                        <p>{{ Str::limit($sale->description, 80) }}</p>

                        <div class="gap-2 d-flex">
                            <div class="d-grid flex-grow-1">
                                <a href="{{ route('sale.show', $sale->id) }}" class="btn btn-light-primary btn-sm">Lihat Detail</a>
                            </div>
                            <div class="d-flex flex-shrink-0 gap-2">
                                <button class="btn px-3 btn-light-warning btn-edit btn-sm" type="button" data-id="{{ $sale->id }}" data-image="{{ $sale->image }}" data-name="{{ $sale->name }}" data-description="{{ $sale->description }}" data-proposal="{{ $sale->proposal }}"><i class="fas fa-edit"></i></button>
                                <button class="btn px-3 btn-light-danger btn-delete btn-sm" type="button" data-id="{{ $sale->id }}"><i class="fas fa-trash"></i></button>
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

    <nav class="mt-5" aria-label="Page navigation example">
        <ul class="pagination justify-content-center pagin-border-primary pagination-primary">
            <li class="page-item"><a class="page-link" href="javascript:void(0)">Previous</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
        </ul>
    </nav>

    <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah Penjualan</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="{{ route('sale.store') }}" method="POST" id="bookmark-form" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="image">Foto</label>
                                <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                                    <img class="img-thumbnail" id="image-preview" itemprop="thumbnail">
                                </figure>
                                <input class="form-control" name="image" id="image" type="file" onchange="preview(event)">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="name">Nama Penjualan</label>
                                <input class="form-control" id="name" type="text" name="name" autocomplete="name" placeholder="Masukan Nama Penjualan">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" rows="3" id="description" name="description" autocomplete="" placeholder="Masukan Deskripsi Penjualan" ></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="proposal">Proposal</label>
                                <input type="file" class="form-control" name="proposal" id="proposal" placeholder="Masukan Proposal">
                                @error('proposal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-light-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade modal-bookmark" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Penjualan</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" method="POST" id="form-edit" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="image">Foto</label><br>
                                <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                                    <img class="img-thumbnail" id="image-edit" itemprop="thumbnail">
                                </figure>
                                <input class="form-control" id="image" name="image" type="file" onchange="previewImage(event)">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="name-edit">Nama Penjualan</label>
                                <input class="form-control" type="text" id="name-edit" autocomplete="name" name="name" placeholder="Masukan Nama Penjualan">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="description-edit">Deskripsi</label>
                                <textarea class="form-control" rows="3" name="description" autocomplete="" id="description-edit" placeholder="Masukan Deskripsi Penjualan"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="proposal-edit">Proposal </label>
                                <input type="file" class="form-control" name="proposal" id="proposal-edit" placeholder="Masukan Proposal">
                                @error('proposal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-light-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
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
    $('.btn-edit').on('click', function() {
        var id = $(this).data('id');
        var image = $(this).data('image');
        var name = $(this).data('name');
        var description = $(this).data('description');
        $('#form-update').attr('action', '/sale/' + id);
        $('#name-edit').val(name);
        $('#description-edit').val(description);
        $('#image-edit').attr('src', 'storage/' + image);
        $('#form-edit').attr('action', '/sale/' + id);
        $('#modal-edit').modal('show');
    });

    $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/sale/' + id);
        $('#modal-delete').modal('show');
    });
</script>

<script>
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
<script>
    function preview(event) {
        var input = event.target;
        var previewImage = document.getElementById('image-preview');

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
