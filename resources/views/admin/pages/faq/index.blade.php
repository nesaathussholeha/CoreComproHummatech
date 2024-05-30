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
                    <form action="/faq">
                        <div class="d-flex justify-content-lg-end justify-content-start">
                            <div class="d-flex align-items-center gap-2">
                                <p class="m-0 me-2">Cari:</p>
                                <input class="form-control me-2" name="question" value="{{ request()->question }}" type="text" placeholder="Search" aria-label="Search">
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
        @forelse ($faqs as $item)
            <div class="col-md-12">

                <div class="card pb-0 border-l-primary border-4 border-0 shadow">
                    <div class="card-header">
                        <div class="card-header-right">
                            <ul class="list-unstyled" style="text-align:center">
                                @if ($item->service_id )
                                <li><i class="fa fa-edit text-primary mb-2 p-1 btn-edit" data-id="{{ $item->id }}"
                                        data-question="{{ $item->question }}" data-answer="{{ $item->answer }}"
                                        data-service_id="{{ $item->service_id }}" type="button"></i></li>
                                @else
                                <li><i class="fa fa-edit text-primary mb-2 p-1 btn-edits" data-id="{{ $item->id }}"
                                        data-question="{{ $item->question }}" data-answer="{{ $item->answer }}"
                                        data-service_id="{{ $item->product_id }}" type="button"></i></li>
                                @endif
                                <li><i class="fa-solid fa-trash text-primary p-1 btn-delete" type="button"
                                        data-id="{{ $item->id }}"></i></li>
                            </ul>
                        </div>
                        <div class="ribbon mt-3 ribbon-primary ribbon-space-bottom">{{ $item->service == null ? $item->product->name : $item->service->name }}</div>

                        <div class="pt-5">
                            <h3 class="mb-2">{{ $item->question }}?</h3>
                            <p class="mb-0" style="width:95%;">{{ $item->answer }}
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
    {{-- {{ $faqs->links('pagination::bootstrap-5') }} --}}

    <!-- Add Modal -->
    <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="advance-options">
                    <ul class="simple-wrapper nav nav-tabs modal-header" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active txt-primary" id="profile-tabs" data-bs-toggle="tab"
                                href="#chats" role="tab" aria-controls="profile" aria-selected="false">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link txt-primary" id="contact-tab" data-bs-toggle="tab"
                                href="#contacts  " role="tab" aria-controls="contact" aria-selected="false">Produk</a>
                        </li>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </ul>
                    <div class="tab-content" id="chat-options-tabContent">
                        <div class="tab-pane fade show active" id="chats" role="tabpanel" aria-labelledby="chats-tab">
                            <form class="form-bookmark needs-validation" action="{{ route('faq.store') }}" method="POST"
                                id="bookmark-form" novalidate="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="status" value="service" id="">
                                <div class="modal-body">
                                    <div class="row g-2">
                                        <div class="mb-3 mt-0 col-md-12">
                                            <label for="bm-title">Pertanyaan</label>
                                            <input class="form-control" type="text" required="" name="question"
                                                value="{{ old('question') }}" autocomplete="name"
                                                placeholder="Mis: Bagaimana cara&hellip;">
                                            @error('question')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 mt-0 col-md-12">
                                            <label for="bm-title">Jawaban</label>
                                            <textarea name="answer" id="answer" cols="10" rows="5" class="form-control"
                                                placeholder="Mis: Caranya adalah sebagai berikut">{{ old('answer') }}</textarea>
                                            @error('answer')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 mt-0 col-md-12">
                                            <label for="bm-title">Ditampilkan Di</label>
                                            <select name="service_id" id="select" class="form-control">
                                                <option disabled selected>Pilih Salah Satu</option>
                                                @foreach ($services as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-secondary" type="button"
                                            data-bs-dismiss="modal">Batalkan</button>
                                        <button class="btn btn-primary" type="submit">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                            <form class="form-bookmark needs-validation" action="{{ route('faq.store') }}" method="POST"
                                id="bookmark-form" novalidate="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="status" value="product" id="">
                                <div class="modal-body">
                                    <div class="row g-2">
                                        <div class="mb-3 mt-0 col-md-12">
                                            <label for="bm-title">Pertanyaan</label>
                                            <input class="form-control" type="text" required="" name="question"
                                                value="{{ old('question') }}" autocomplete="name"
                                                placeholder="Mis: Bagaimana cara&hellip;">
                                            @error('question')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 mt-0 col-md-12">
                                            <label for="bm-title">Jawaban</label>
                                            <textarea name="answer" id="answer" cols="10" rows="5" class="form-control"
                                                placeholder="Mis: Caranya adalah sebagai berikut">{{ old('answer') }}</textarea>
                                            @error('answer')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 mt-0 col-md-12">
                                            <label for="bm-title">Ditampilkan Di</label>
                                            <select name="product_id" id="select" class="form-control">
                                                <option disabled selected>Pilih Salah Satu</option>
                                                @foreach ($products as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('product_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-secondary" type="button"
                                            data-bs-dismiss="modal">Batalkan</button>
                                        <button class="btn btn-primary" type="submit">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade modal-bookmark" id="modal-edit" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Edit FAQ
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" method="POST" id="form-update" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Pertanyaan</label>
                                <input class="form-control" type="text" name="question" required=""
                                    id="question-edit" autocomplete="name" placeholder="Mis: Bagaimana cara&hellip;">
                            </div>

                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Jawaban</label>
                                <textarea name="answer" cols="10" rows="5" class="form-control"
                                    placeholder="Mis: Caranya adalah sebagai berikut" id="answer-edit"></textarea>
                            </div>

                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Ditampilkan Di</label>
                                <select name="service_id" id="service-edit" class="form-control">
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"
                                            {{ $service->service_id == $service->id ? 'selected' : '' }}>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batalkan</button>
                            <button class="btn btn-primary" type="submit">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade modal-bookmark" id="modal-edit-faq" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Edit FAQ
                    </h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" method="POST" id="form-updates" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Pertanyaan</label>
                                <input class="form-control" type="text" name="question" required=""
                                    id="question-edits" autocomplete="name" placeholder="Mis: Bagaimana cara&hellip;">
                            </div>

                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Jawaban</label>
                                <textarea name="answer" cols="10"  rows="5" class="form-control"
                                    placeholder="Mis: Caranya adalah sebagai berikut" id="answer-edits"></textarea>
                            </div>

                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Ditampilkan Di</label>
                                <select name="product_id" id="service-edits" class="form-control">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batalkan</button>
                            <button class="btn btn-primary" type="submit">Perbarui</button>
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
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/faq/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id'); // Mengambil nilai id dari tombol yang diklik
            var question = $(this).data('question'); // Mengambil nilai name dari tombol yang diklik
            var answer = $(this).data('answer');
            var service_id = $(this).data('service_id');
            $('#form-update').attr('action', '/faq/' + id); // Mengubah nilai atribut action form
            $('#question-edit').val(question);
            $('#answer-edit').text(answer);
            $('#service-edit').val(service_id);
            $('#modal-edit').modal('show');

            console.log(id);
        });

        $('.btn-edits').click(function() {
            var id = $(this).data('id'); // Mengambil nilai id dari tombol yang diklik
            var question = $(this).data('question'); // Mengambil nilai name dari tombol yang diklik
            var answer = $(this).data('answer');
            var service_id = $(this).data('service_id');
            $('#form-updates').attr('action', '/faq/' + id); // Mengubah nilai atribut action form
            $('#question-edits').val(question);
            $('#answer-edits').text(answer);
            $('#service-edits').val(service_id);
            $('#modal-edit-faq').modal('show');

            console.log(id);
        });

    </script>
@endsection
