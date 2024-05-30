@extends('landing.layouts.layouts.app')
@section('description')
<meta name="description" content="Hummatech adalah perusahaan software development terbaik di Malang. Kami menyediakan solusi perangkat lunak yang inovatif dan berkualitas tinggi." />
@endsection
{{-- @section('title', $slugs->name) --}}
@section('seo')
    <meta name="title" content="Berita - Hummatech." />
    <meta name="og:image" content="{{ asset('mobilelogo.png') }}" />
    <meta name="twitter:image" content="{{ asset('mobilelogo.png') }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <link rel="canonical" href="{{ url('/') }}" />
@endsection
@section('title', 'Berita')
@section('style')
    <style>
        .custom-tabs {
            display: flex;
            justify-content: space-between;
            align-items: center;
            overflow: hidden;
            overflow-x: auto;
            padding-top: 2rem;
            flex-wrap: nowrap;
        }

        .custom-tabs li a {
            margin-right: 1rem;
            text-transform: uppercase;
            display: flex;
            justify-content: center;
            flex-wrap: nowrap;
            white-space: nowrap;
        }

        .custom-tabs li:last-child a {
            margin-right: 0;
        }

        .custom-tabs li.active a {
            border-bottom: 4px solid #1273eb;
            color: #1273eb;
        }
        .meta {
            overflow: hidden;
            padding: 10px;
            box-sizing: border-box;
        }

        .meta ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .meta li {
            display: flex;
            align-items: center;
        }

        .meta img {
            margin-right: 10px;
        }

        .categories {
            flex-wrap: wrap;
            display: flex;
            gap: 0 5px;
            align-items: center;
        }

        .category-link {
            font-size: 12px;
            text-decoration: none;
            color: inherit;
        }

        .categories span {
            margin: 0 5px;
        }
    </style>
@endsection

@section('content')
    <div class="breadcrumb-area text-center shadow dark text-light bg-cover"
        style="background-image: url('{{ $background == null ? asset('assets-home/img/default-bg.png') : asset('storage/' . $background->image) }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Berita</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                        <li class="active">Berita</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area right-sidebar full-blog mt-5">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="col-12 col-xl-3 mb-4">
                        <!-- Start Sidebar -->
                        <div class="sidebar wow fadeInLeft card item border-0 py-4">
                            <aside>
                                <div class="sidebar-item recent-post">
                                    <div class="title">
                                        <h4>Kategori berita</h4>
                                    </div>
                                    <div class="sidebar-info">
                                        <ul>
                                            <li>
                                                <a href="/news" class="{{ request()->is('news') ? 'text-primary' : '' }}">
                                                    Semua
                                                </a>
                                            </li>
                                            @foreach ($newsCategories as $category)
                                                <li>
                                                    <a class="{{ request()->is('news/category/' . $category->slug) ? 'active text-primary' : '' }}"
                                                        href="{{ url("/news/category/{$category->slug}") }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <!-- End Start Sidebar -->
                    </div>
                    <div class="col-12 col-xl-9">
                        <div class="blog-item-box">
                            <div class="row mb-5 mt-2">
                                @forelse ($newses as $news)
                                    @if ($news->news)
                                        <div class="col-lg-6 col-md-6 mt-2">
                                            <div class="item">
                                                <div class="thumb">
                                                    <a href="/news/{{ $news->news->slug }}">
                                                        <img src="{{ asset('storage/' . $news->news->thumbnail) }}"
                                                            alt="{{ $news->news->title }}" class="img-fluid"
                                                            style="width: 500px; height: 200px; object-fit: cover;">
                                                    </a>

                                                    <time class="date"
                                                        datetime="">{{ \Carbon\Carbon::parse($news->news->date)->locale('id_ID')->isoFormat('D MMMM Y') }}</time>
                                                </div>
                                                <div class="info">
                                                    <div class="meta">
                                                        <ul>
                                                            <li>
                                                                <img src="{{ asset('mobilelogo.png') }}" alt="Hummatech Logo" />
                                                                @php
                                                                    $newsCategories = App\Models\NewsCategory::where('news_id', $news->news->id)->get();
                                                                @endphp
                                                                <div class="categories">
                                                                    @foreach ($newsCategories as $index => $newsCategory)
                                                                        <p href="javascript:void(0)" class="category-link">{{ $newsCategory->category->name }}</p>
                                                                        @if (!$loop->last)
                                                                            <p>,</p>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <h4>
                                                        <a
                                                            href="/news/{{ $news->news->slug }}">{{ $news->news->title }}</a>
                                                    </h4>

                                                    <p class="">{!! Str::limit(strip_tags($news->news->description), 200) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-6 col-md-6 single-item mt-2">
                                            <div class="item">
                                                <div class="thumb">
                                                    <a href="/news/{{ $news->slug }}"><img
                                                            src="{{ asset('storage/' . $news->thumbnail) }}"
                                                            alt="{{ $news->title }}" class="img-fluid"
                                                            style="width: 500px; height: 200px; object-fit: cover;"></a>

                                                    <time class="date"
                                                        datetime="">{{ \Carbon\Carbon::parse($news->date)->locale('id_ID')->isoFormat('D MMMM Y') }}</time>
                                                </div>
                                                <div class="info">
                                                    <div class="meta">
                                                        <ul>
                                                            <li>
                                                                <img src="{{ asset('mobilelogo.png') }}" alt="Hummatech Logo" />
                                                                @php
                                                                    $newsCategories = App\Models\NewsCategory::where('news_id', $news->id)->get();
                                                                @endphp
                                                                <div class="categories">
                                                                    @foreach ($newsCategories as $index => $newsCategory)
                                                                        <a href="javascript:void(0)" class="category-link">{{ $newsCategory->category->name }}</a>
                                                                        @if (!$loop->last)
                                                                            <a>,</a>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <h4>
                                                        <a href="/news/{{ $news->slug }}">{{ $news->title }}</a>
                                                    </h4>
                                                    <p class="">{!! Str::limit(strip_tags($news->description), 200) !!}</p>
                                                    {{-- <p class="text-break justify-content-center">{!! Str::limit(strip_tags($news->description), 200) !!}</p> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <div class="d-flex justify-content-center col-12 ">
                                        <img src="{{ asset('nodata-gif.gif') }}" width="600px" alt=""
                                            srcset="">
                                    </div>
                                    <h4 class="fs-1 text-center text-dark col-12 " style="font-weight: 600">
                                        Data Masih Kosong
                                    </h4>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
