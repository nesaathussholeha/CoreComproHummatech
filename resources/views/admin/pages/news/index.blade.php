@extends('admin.layouts.app')

@section('header-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
@endsection

@section('subcontent')
    <div class="py-1"></div>
    <div class="px-3 rounded-3 my-4 shadow-sm">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-7 p-0">
                    <h3>Berita</h3>
                </div>
                <div class="col-sm-5">
                    <div class="d-flex align-items-center">
                        <form action="/admin/news/">
                            <div class="d-flex align-items-center gap-2 justify-content-lg-end justify-content-start">
                                <p class="m-0">Cari:</p>&nbsp;
                                <input class="form-control me-2" name="title" value="{{ request()->title }}" type="text" placeholder="Search" aria-label="Search">
                            </div>
                        </form>
                        <a href="/admin/news/create" class="btn btn-primary">Tambah</a>&nbsp;
                        <a href="/news" class="btn btn-secondary w75 col-3" target="_blank">Lihat Berita</a> &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="product-grid">
        <div class="product-wrapper-grid">
            <div class="row">
                {{-- @dd($news) --}}
                @forelse ($news as $item)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="card shadow-sm">
                            <div class="product-box">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{ asset('storage/' . ($item->thumbnail ?? '')) }}"
                                        alt="" style="object-fit:cover; width:242vw; height:20vh;">
                                </div>
                                <div class="product-details">
                                    <small style="font-size: 13px"><span
                                            class="text-primary mb-3 fw-bold"></span>{{ \Carbon\Carbon::parse($item['date'])->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}</small>
                                    <a href="{{ route('news.show', $item->id) }}">
                                        <h4 class="mb-1 mt-3">{{ $item->title }}</h4>
                                    </a>
                                    <p class="mt-0 mb-2" style="font-size: 13px">{!! Str::words(strip_tags($item->description), 14, '...') !!}</p>
                                    <div class="d-flex gap-1 mb-3">
                                        @foreach ($item->newsCategories as $category)
                                            {{ $category->name }}
                                        @endforeach
                                    </div>

                                    <form action="{{ route('news.destroy', $item->id) }}" id="form-{{ $item->id }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <ul class="d-flex justify-content-start gap-2">
                                        <li><a href="{{ route('news.show', $item->id) }}" class="btn btn-sm btn-primary"
                                                type="button">
                                                Detail</a></li>
                                        <li><a href="{{ route('news.edit', $item->id) }}"
                                                style="background-color: #FFAA05; padding:6px 15px; border-radius: 5px; color: white"
                                                type="button"><i class="fa-solid fa-pen"></i></a></li>
                                        <li><a href="#" onclick="deleteDataConfirm('{{ $item->id }}')"
                                                style="background-color: #DC3545; padding:6px 15px; border-radius: 5px; color: white"
                                                type="button" title="hapus"><i class="fa-solid fa-trash-can"></i></a></li>
                                    </ul>
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
        </div>
    </div>

    {{-- {{ $news->links() }} --}}
@endsection

@section('script')
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>

    <script>
        function deleteDataConfirm($id) {
            swal({
                title: 'Apakah Anda Akan Menghapus Data Ini?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((e) => {
                if (e) {
                    $(`#form-${$id}`).submit();
                }
            });
        }
    </script>
@endsection
