@extends('admin.layouts.app')

@section('subcontent')
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6 align-items-center d-flex gap-2">
                    <h4 class="mb-0 me-3 ms-2 h6 fw-normal">Filter:</h4>
                    <div class="w-25">
                        <select name="" id="" class="form-control">
                            <option value="" disabled="disabled" selected="selected">Pilih Opsi Filter</option>
                            <option value="it">IT Consultant</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <form action="/terms_condition">
                        <div class="d-flex justify-content-lg-end justify-content-start">
                            <div class="d-flex align-items-center gap-2">
                                <p class="m-0 me-2">Cari:</p>
                                <input class="form-control me-2" name="termcondition" value="{{ request()->termcondition }}" type="text" placeholder="Search" aria-label="Search">
                            </div>

                            <!-- Button Add Modal -->
                            <button class="btn btn-primary m-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#tambah">Tambah</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @forelse ($termscondition as $item)
            <div class="col-md-12">

                <div class="card pb-0 border-l-primary border-4 border-0 shadow">
                    <div class="card-header">
                        <div class="card-header-right">
                            <ul class="list-unstyled" style="text-align:center">
                                <li><i class="fa fa-edit text-primary mb-2 p-1 btn-edit" data-id="{{ $item->id }}"
                                        data-termcondition="{{ $item->termcondition }}"
                                        data-service_id="{{ $item->service_id }}" type="button" data-bs-toggle="modal"
                                        data-bs-target="#edit"></i></li>
                                <li><i class="fa-solid fa-trash text-primary p-1 btn-delete" type="button"
                                        data-id="{{ $item->id }}"></i></li>
                            </ul>
                        </div>
                        <div class="ribbon mt-3 ribbon-primary ribbon-space-bottom">{{ $item->service->name }}</div>

                        <div class="pt-5">
                            <p class="mb-0" style="width:95%;">
                                {{ $item->termcondition }}
                            </p>
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

    <!-- Pagination -->
    {{-- <div class="pt-3 pb-5 align-items-center d-flex gap-2 justify-content-end">
        {{ $termscondition->links('pagination::bootstrap-4') }}
    </div> --}}

    <!-- Add Modal -->
    <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah "Syarat dan Ketentuan"
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="{{ route('terms_condition.store') }}" method="POST"
                    id="bookmark-form" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Pilih Halaman</label>
                                <select name="service_id" id="target" class="form-control">
                                    <option disabled="disabled" selected="selected">Pilih halaman</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Syarat dan Ketentuan</label>
                                <input class="form-control" type="text" name="termcondition[]" required=""
                                    autocomplete="name"
                                    placeholder="Mis: Semua peserta magang diwajibkan untuk&hellip;" />

                                <div id="product-listing"></div>
                                @error('termcondition.*')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer align-items-center d-flex justify-content-between w-full">
                        <button type="button" class="btn me-auto add-button-trigger btn-primary m-0">Tambah</button>
                        <div>
                            <button class="btn btn-secondary m-0" type="button"
                                data-bs-dismiss="modal">Batalkan</button>
                            <button class="btn btn-primary m-0" type="submit">Simpan</button>
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
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Ubah "Syarat dan Ketentuan"
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="" method="POST" id="form-update"
                    novalidate="" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Pilih Halaman</label>
                                <select name="service_id" id="service-edit" class="form-control">
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"
                                            {{ $service->service_id == $service->id ? 'selected' : '' }}>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Syarat dan Ketentuan</label>
                                <input class="form-control" type="text" id="termcondition-edit" name="termcondition"
                                    required="" autocomplete="name"
                                    placeholder="Mis: Semua peserta magang diwajibkan untuk&hellip;" />

                                <div id="product-listing"></div>
                                @error('termcondition')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer align-items-center d-flex justify-content-end w-full">
                        <div>
                            <button class="btn btn-secondary m-0" type="button"
                                data-bs-dismiss="modal">Batalkan</button>
                            <button class="btn btn-primary m-0" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.components.delete-modal-component')
@endsection

@section('script')
    <script>
        const deleteElement = (id) => $('#' + id).remove();

        $('.add-button-trigger').click((e) => {
            let idInput = 'input_' + Math.random().toString(36).substr(2, 9); // Generate random id
            let target = $(e.target).parents('.modal').find('#product-listing');
            target.append(`<div class="d-flex align-items-center mt-3 gap-2" id="${idInput}">
                <input class="form-control mb-0" type="text" name="termcondition[]"
                    required="" autocomplete="name"
                    placeholder="Mis: Semua peserta magang diwajibkan untuk&hellip;" />
                <button onclick="deleteElement('${idInput}')" type="button" class="btn delete-trigger px-3 mt-0 btn-danger"><i
                        class="fas fa-trash"></i></button>
            </div>`);
        });

        $('.btn-close').click((e) => {
            let target = $(e.target).parent('.modal').find('.delete-trigger');
            target.each((i, el) => $(el).click());
        });
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', 'terms_condition/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id'); // Mengambil nilai id dari tombol yang diklik
            var terms = $(this).data('termcondition');
            $('#form-update').attr('action', 'terms_condition/' + id); // Mengubah nilai atribut action form
            $('#termcondition-edit').val(terms);
            $('#modal-edit').modal('show');
        });
    </script>
@endsection
