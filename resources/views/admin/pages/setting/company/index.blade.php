@extends('admin.layouts.app')

@section('subcontent')
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h4 class="m-2">Struktur Usaha</h4>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-lg-end justify-content-start">
                        <div class="d-flex align-items-center gap-2">
                            <p class="m-0 me-2">Cari:</p>
                            <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                        </div>

                        <button class="btn btn-primary m-0" type="button" data-bs-toggle="modal"
                            data-bs-target="#tambah">Tambah</button>

                        <!-- Add Modal -->
                        <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah Struktur Usaha
                                        </h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form class="form-bookmark needs-validation" action="{{ route('company.store') }}"
                                        method="POST" id="bookmark-form" novalidate="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                <div class="mb-3 mt-0 col-md-12">
                                                    <label for="bm-title">Nama</label>
                                                    <input class="form-control" name="title" value="{{ old('title') }}"
                                                        type="text" required="" autocomplete="name"
                                                        placeholder="Hummatech Digital Indonesia" />

                                                    @error('title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 mt-0 col-md-12">
                                                    <label for="bm-title">Deskripsi <span
                                                            class="opacity-75">(Opsional)</span></label>
                                                    <textarea name="description" required id="deskripsi" cols="30" rows="5" class="form-control"
                                                        placeholder="Mis: Bergerak dibidang&hellip;">{{ old('description') }}</textarea>

                                                    @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 mt-0 col-md-12">
                                                    <label for="bm-title">Produk <span
                                                            class="opacity-75">(Opsional)</span></label>

                                                    <input class="form-control" type="text"
                                                        value="{{ old('products') ? old('products')[0] : '' }}"
                                                        name="products[]" required="" autocomplete="name"
                                                        placeholder="Mis: Website Development" />

                                                    <div id="product-listing">
                                                        @foreach (old('products', []) as $index => $itemProductInput)
                                                            @if ($index > 0)
                                                                @php
                                                                    $uniqueID = uniqid();
                                                                @endphp

                                                                <div class="d-flex align-items-center mt-3 gap-2"
                                                                    id="{{ $uniqueID }}">
                                                                    <input class="form-control mb-0" type="text"
                                                                        name="products[]" required="" autocomplete="name"
                                                                        value="{{ $itemProductInput }}"
                                                                        placeholder="Mis: Website Development" />
                                                                    <button onclick="deleteElement('{{ $uniqueID }}')"
                                                                        type="button"
                                                                        class="btn delete-trigger px-3 mt-0 btn-danger"><i
                                                                            class="fas fa-trash"></i></button>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                    <button type="button"
                                                        class="btn add-button-trigger btn-primary mt-3">Tambah
                                                        Produk</button>

                                                    @error('products.*')
                                                        <div class="text-danger mt-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 mt-0 col-md-12">
                                                    <label for="bm-title">Foto</label>
                                                    <input name="image" class="form-control" type="file" required=""
                                                        autocomplete="name" />

                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button class="btn btn-primary" type="submit">Simpan</button>
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
    <div class="row">
        @forelse ($data as $item)
            <div class="col-xl-4 col-xxl-3">
                <div class="card card-body shadow rounded-4">
                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-100 rounded-3" />

                    <div class="pt-4">
                        <h1 class="h4 border-bottom pb-3 mb-3 text-primary">{{ $item->title }}</h1>

                        @if (count(json_decode($item->products)) > 0)
                            <div class="row mb-3">
                                @foreach (json_decode($item->products) as $product)
                                    <div class="col-6 mb-2">&mdash; {{ $product }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('company.destroy', $item->id) }}" id="form-{{ $item->id }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                        </form>

                        <div class="d-flex justify-content-end gap-2">
                            <button data-bs-toggle="modal" data-bs-target="#edit-{{ $item->id }}"
                                class="btn btn-warning px-3"><i class="fas fa-pencil"></i></button>
                            <button class="btn-delete btn btn-danger px-3" data-id="{{ $item->id }}"
                                id="{{ $item->id }}"><i class="fas fa-trash"></i></button>
                        </div>

                        <!-- Edit Modal -->
                        <div class="modal fade modal-bookmark modal-edit" id="edit-{{ $item->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-semibold" id="exampleModalLabel">Edit Struktur Usaha
                                        </h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form class="form-bookmark needs-validation"
                                        action="{{ route('company.update', $item->id) }}" method="POST"
                                        id="bookmark-form" novalidate="" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                <div class="mb-3 mt-0 col-md-12">
                                                    <label for="bm-title">Nama</label>
                                                    <input class="form-control" name="title"
                                                        value="{{ old('title', $item->title) }}" type="text"
                                                        required="" autocomplete="name"
                                                        placeholder="Hummatech Digital Indonesia" />

                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 mt-0 col-md-12">
                                                    <label for="bm-title">Deskripsi <span
                                                            class="opacity-75">(Opsional)</span></label>
                                                    <textarea name="description" required id="deskripsi" cols="30" rows="5" class="form-control"
                                                        placeholder="Mis: Bergerak dibidang&hellip;">{{ old('description', $item->description) }}</textarea>

                                                    @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 mt-0 col-md-12">
                                                    <label for="bm-title">Produk <span
                                                            class="opacity-75">(Opsional)</span></label>

                                                    <input class="form-control" type="text"
                                                        value="{{ old('products', json_decode($item->products)) ? old('products', json_decode($item->products))[0] : '' }}"
                                                        name="products[]" required="" autocomplete="name"
                                                        placeholder="Mis: Website Development" />

                                                    <div id="product-listing">
                                                        @foreach (old('products', json_decode($item->products)) as $index => $itemProductInput)
                                                            @if ($index > 0)
                                                                @php
                                                                    $uniqueID = uniqid();
                                                                @endphp

                                                                <div class="d-flex align-items-center mt-3 gap-2"
                                                                    id="{{ $uniqueID }}">
                                                                    <input class="form-control mb-0" type="text"
                                                                        name="products[]" required=""
                                                                        autocomplete="name"
                                                                        value="{{ $itemProductInput }}"
                                                                        placeholder="Mis: Website Development" />
                                                                    <button onclick="deleteElement('{{ $uniqueID }}')"
                                                                        type="button"
                                                                        class="btn delete-trigger px-3 mt-0 btn-danger"><i
                                                                            class="fas fa-trash"></i></button>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                    <button type="button"
                                                        class="btn add-button-trigger btn-primary mt-3">Tambah
                                                        Produk</button>

                                                    @error('products.*')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 mt-0 col-md-12">

                                                    <img id="image-edit-preview" src="{{ Storage::url($item->image) }}"
                                                    alt="{{ $item->title }}" class="w-50 mb-3 border rounded-3">
                                                    <div>
                                                        <label for="bm-title">Foto</label>
                                                        <input name="image" class="form-control" id="image"
                                                            type="file" required="" autocomplete="name" />
                                                    </div>
                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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

    @include('admin.components.delete-modal-component')

    <div class="mb-4">
        {{ $data->links() }}
    </div>
@endsection

@section('script')
    <script>
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', `/setting/company/${id}`);
            $('#modal-delete').modal('show');
        });
    </script>

    <script>
        // Function to handle image preview
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-edit-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        // Add event listener to the input element
        document.getElementById('image').addEventListener('change', previewImage);
    </script>

    <script>
        const deleteElement = (id) => $('#' + id).remove();

        (() => {
            $('.add-button-trigger').click((e) => {
                let idInput = 'input_' + Math.random().toString(36).substr(2, 9); // Generate random id
                let target = $(e.target).parent().find('#product-listing');
                target.append(`<div class="d-flex align-items-center mt-3 gap-2" id="${idInput}">
                <input class="form-control mb-0" type="text" name="products[]"
                    required="" autocomplete="name"
                    placeholder="Mis: Website Development" />
                <button onclick="deleteElement('${idInput}')" type="button" class="btn delete-trigger px-3 mt-0 btn-danger"><i
                        class="fas fa-trash"></i></button>
            </div>`);
            });

            $('.btn-close').click((e) => {
                let target = $(e.target).parent('.modal').find('.delete-trigger');
                target.each((i, el) => $(el).click());
            });
        })();
    </script>

    @if (request()->has('action') && request()->action === 'add')
        <script>
            $('#tambah').modal('show');
        </script>
    @endif
@endsection
