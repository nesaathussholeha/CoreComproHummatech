@extends('admin.layouts.app')

@section('header-style')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1rem;
        }

        @media screen and (min-width: 992px) {
            .grid-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media screen and (min-width: 1200px) {
            .grid-container {
                grid-template-columns: repeat(4, 1fr);
            }
        }
    </style>
@endsection

@section('subcontent')
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h5 class="m-2 fw-bold">Tim Hummatech</h5>
                </div>
                <div class="col-12 col-lg-6">
                    <form action="/setting/teams">
                    <div class="d-flex justify-content-lg-end justify-content-start">
                        <div class="d-flex align-teams-center gap-2">
                            <p class="m-0 me-2">Cari:</p>
                            <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                        </div>
                        <a href="/about-us/team" class="btn btn-secondary me-2" target="_blank">Lihat di website</a>
                        <a class="btn btn-primary m-0" href="#tambah" data-bs-toggle="modal">Tambah</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" id="exampleModalLabel">Anggota tim baru</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-bookmark needs-validation" id="form-create" action="/create/team" method="POST" id="bookmark-form"
                novalidate="" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row g-2 p-2">
                        <div class="mb-3 mt-0 col-md-12">
                            <label for="bm-title">Foto</label>
                            <input class="form-control" name="image" id="formFile" type="file" />
                        </div>
                        <div class="mb-3 mt-0 col-md-12">
                            <label for="bm-title">Nama Lengkap</label>
                            <input class="form-control" type="text" id="name" name="name" required="" autocomplete="name"
                                placeholder="Mis: Agus Prasetya">
                        </div>
                        <div class="mb-3 mt-0 col-md-12">
                            <label for="bm-title">Pilih Jabatan</label>
                            <select name="position_id" id="departement" class="form-select">
                                @forelse ($positions as  $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                @empty
                                    <option value="null" disabled="disabled" selected="selected">Jabatan Masih Kosong
                                    </option>
                                @endforelse
                            </select>
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
@endsection

@section('content')
    <div class="grid-container mb-3">
        @forelse ($teams as $team)
            <div class="card social-profile m-0">
                <div class="card-header" style="background: rgba(48, 126, 243, 0.05)">
                    <div class="card-header-right">
                        <ul class="list-unstyled" style="text-align:center">
                            <li><i class="fa fa-edit text-primary mb-2 p-1 btn-edit" data-id="{{ $team->id }}" data-name="{{ $team->name }}" data-position_id="{{ $team->position_id }}" data-image="{{ $team->image }}" type="button"></i></li>
                            <li><i class="fa-solid fa-trash text-primary p-1 btn-delete" type="button"
                                    data-id="{{ $team->id }}"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="social-img-wrap">
                        <div class="social-img"><img src="{{ asset('storage/' . $team->image) }}" width="100px"
                                height="200px" style="object-fit: cover ; height:100px" alt="profile">
                        </div>
                        <div class="edit-icon">
                            <svg>
                                <use href="{{ asset('assets/svg/icon-sprite.svg#profile-check') }}"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="social-details">
                        <h5 class="mb-1"><a href="social-app.html">{{ $team->name }}</a></h5><span
                            class="f-light">{{ $team->position->name }}</span>
                    </div>
                </div>
            </div>
        @empty

        @endforelse
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
                <form class="form-bookmark needs-validation" id="form-update" method="POST"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="social-img d-flex justify-content-center"><img src="" id="image-edit" width="100px"
                            height="100px" style="object-fit: cover ; height:100px" alt="profile">
                    </div>

                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Nama Lengkap</label>
                                <input class="form-control" type="text" id="name-edit" name="name" required="" autocomplete="name"
                                    placeholder="Mis: Agus Prasetya">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Pilih Jabatan</label>
                                <select name="position_id" id="departement" class="form-select">
                                    @forelse ($positions as  $position)
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @empty
                                        <option value="null" disabled="disabled" selected="selected">Jabatan Masih Kosong
                                        </option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Foto</label>
                                <input class="form-control" name="image" id="formFile" type="file" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- @if($teams->hasPages())
    <div class="mb-3">
        {{ $teams->links() }}
    </div>
    @endif --}}

    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    <script>
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/delete/team/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id'); // Mengambil nilai id dari tombol yang diklik
            var name = $(this).data('name'); // Mengambil nilai name dari tombol yang diklik
            var image = $(this).data('image');
            var position_id = $(this).data('position-id'); // Mengambil nilai position_id dari tombol yang diklik

            $('#departement option').each(function() {
                if ($(this).val() == position_id) {
                    $(this).prop('selected', true);
                }
            });

            $('#image-edit').attr('src','{{ asset('storage') }}/'+ image);
            $('#form-update').attr('action', '/update/team/' + id); // Mengubah nilai atribut action form
            $('#name-edit').val(name);
            $('#modal-edit').modal('show');
        });
    </script>
@endsection
