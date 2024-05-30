@extends('admin.layouts.app')

@section('content')
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h4 class="m-2">Sosial Media</h4>
                </div>
                <form action="/social-media" class="col-12 col-lg-6 d-flex justify-content-end">
                    <div class="d-flex justify-content-lg-end justify-content-start">
                        <div class="d-flex align-items-center gap-2 mx-2">
                            <p class="m-0 me-2">Cari:</p>
                            <input type="text" name="platform" value="{{ request()->platform }}" class="form-control" placeholder="Cari Produk" aria-label="Username"
                            aria-describedby="basic-addon1">                            </div>
                        <button class="btn btn-primary m-0" type="button" data-bs-toggle="modal"
                            data-bs-target="#tambah">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
            @forelse ($socialMedia as $socialmedia)
            <div class="col">
                <div class="card overflow-hidden">
                    <div class="card-body d-flex align-items-center flex-wrap">
                        <img src="{{ asset('storage/' . $socialmedia->image) }}" class="img-fluid img-75 me-3 rounded" style="width: 80px; height: 80px; object-fit: cover;" alt="Order Thumbnail 1">
                        <div class="d-flex flex-column">
                            <h3 class="card-title ">{{$socialmedia->platform}}</h3>
                            <p class="card-text" style="width: 80%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;"><a href="{{$socialmedia->link}}">{{$socialmedia->link}}</a></p>
                            <div class="d-flex">
                                <button class="btn btn-primary btn-edit mx-3" type="button" data-bs-toggle="modal"
                                    data-bs-target="#edit" data-id="{{ $socialmedia->id }}" data-image="{{ $socialmedia->image }}" data-name="{{ $socialmedia->platform }}" data-link="{{ $socialmedia->link }}">Edit</button>
                                <button class="btn btn-danger btn-delete" data-id="{{$socialmedia->id}}" type="button">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12 col-lg-12 text-center my-5 item-center">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ asset('nodata.jpg') }}" alt="" width="400px" class="mb-3">
                    <h5 class="text-center">
                        Data Masih Kosong
                    </h5>
                </div>
            </div>


            @endforelse
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
                <form class="form-bookmark needs-validation" action="{{ route('create.social.media') }}" method="POST" id="bookmark-form" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Nama Platform</label>
                                <input class="form-control" type="text" required="" autocomplete="name"
                                    placeholder="Masukkan Nama Platform" name="platform">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Tautan Media Sosial</label>
                                <input class="form-control" type="text" required="" id="link-edit" autocomplete="name"
                                    placeholder="Masukkan Tautan Media Sosial" name="link">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Foto / Logo Sosmed</label>
                                <input class="form-control" id="formFile" type="file" name="image">
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

    <!-- Edit Modal -->
    <div class="modal fade modal-bookmark" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sosial Media</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation"  method="POST" id="form-update"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Nama Platform</label>
                                <input class="form-control" type="text" required="" id="platform-edit" autocomplete="name" name="platform"
                                    placeholder="Masukkan Nama Platform">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Tautan Media Sosial</label>
                                <input class="form-control link-edit" type="text" required="" autocomplete="link" id="link-edit" name="link"
                                    placeholder="Masukkan Tautan Media Sosial">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Foto / Logo Sosmed</label><br>
                                <img id="image-edit" style="width: 200px; height: auto; border: 1px solid #ccc;">
                                <input class="form-control" type="file" name="image" onchange="previewImage()">
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
    @include('admin.components.delete-modal-component')
@endsection

@section('script')
<script>
    $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/delete/social/media/' + id);
        $('#modal-delete').modal('show');
    });
    $('.btn-edit').click(function() {
        var id = $(this).data('id'); // Mengambil nilai id dari tombol yang diklik
        var name = $(this).data('name'); // Mengambil nilai name dari tombol yang diklik
        var link = $(this).data('link');
        var image = $(this).data('image');
        $('#form-update').attr('action', 'update/social/media/' + id); // Mengubah nilai atribut action form
        $('#platform-edit').val(name);
        $('.link-edit').val(link);
        $('#image-edit').attr('src', 'storage/'+image);
        $('#modal-edit').modal('show');
    });
</script>
<script>
    function previewImage() {
        var input = document.querySelector('input[type="file"]');
        var image = document.getElementById('image-edit');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                image.setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
