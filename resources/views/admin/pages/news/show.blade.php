@extends('admin.layouts.app')

@section('header-style')
<style>
    .card-body img {
        height: auto;
        width: 100%;
    }
</style>
@endsection

@section('subcontent')
    <div class="page-title">
        <div class="d-flex justify-content-between">
            {{ \Carbon\Carbon::parse($news['date'])->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
            <div class="d-flex gap-3">
                <a href="/news/{{ $news->slug }}" class="btn btn-secondary " target="_blank">Lihat website</a>
                <a href="/admin/news" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <p class="mb-0 fs-6" style="font-weight: 600">
            Judul
        </p>
        <h2>{{ $news->title }}</h2>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card card-body">
                <div class="img-news">
                    <img src="{{ asset('storage/' . $news->image ?? '') }}" class="w-100" alt="{{ $news->title ?? '' }}" />
                </div>
                <div class="news-description mt-3">
                    <p class="mb-0 fs-6" style="font-weight: 600">
                        Deskripsi
                    </p>
                    {!! $news->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
