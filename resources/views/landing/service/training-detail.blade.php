@extends('landing.layouts.layouts.app')
@section('title' , 'Berita')
@section('style')
    <style>
        .subtitle {
            text-transform: uppercase;
            font-weight: 600;
            color: #1273eb;
            margin-top: -5px;
            display: inline-block;
            background: linear-gradient(90deg, rgba(18, 115, 235, 1) 30%, rgba(4, 215, 242, 1) 100%);
            -webkit-background-clip: text;
            -moz-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .about-us-area .thumb {
            padding-left: unset;
            padding-right: 50px;
        }

        .about-us-area .thumb::after {
            right: 0;
            top: 5rem !important;
            left: unset !important;
        }

        .about-us-area .container {
            position: relative;
        }

        .about-us-area .about-triangle {
            position: absolute;
            z-index: -1;
            top: -7.5rem;
            right: -7.5rem;
        }

        @media screen and (max-width: 992px) {
            .about-us-area .about-triangle {
                right: 0;
            }

            .about-us-area .thumb {
                padding-top: 50px;
                padding-right: unset;
            }
        }
    </style>
@endsection

@section('seo')
    <!-- ========== Breadcrumb Markup (JSON-LD) ========== -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Beranda",
          "item": "{{ url('/') }}"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Tentang Kami",
          "item": "{{ url('/about-us') }}"
        },
        {
          "@type": "ListItem",
          "position": 4,
          "name": "Produk",
          "item": "{{ url('/produk') }}"
        },
      ]
    }
    </script>
@endsection

@section('content')
<div class="thumb-services-area inc-thumbnail p-5 bottom-less">
    <div class="left-shape">
        <img src="{{ asset('assets-home/img/shape/14.png') }}" alt="Shape" style="opacity: 20%; width: 20vw;">
    </div>
    <div class="container p-5">
        <div class="about-items">
            <div class="row align-center justify-content-center">
                <div class="col-lg-5">
                    <div class="thumb">
                        <img src="{{ asset('assets_landing/produk/milink.png') }}" alt="Thumb" >
                        <div class="shape" style="background-image: url(assets/img/shape/14.png);"></div>
                    </div>
                </div>
                <div class="col-lg-6 info mx-3">
                    <h1>Lorem ipsum vulputate</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur.
                        Tincidunt pellentesque pellentesque sed in.
                        Sit nunc velit aliquam quis faucibus nibh nisl pellentesque.
                        Massa natoque mattis quisque ut molestie turpis at fusce integer.
                        Tincidunt lorem egestas sed ipsum proin.
                        Ac vestibulum euismod amet dignissim et lobortis blandit bibendum.
                        Nulla venenatis vitae dui sapien duis dolor sed ut dictum.
                        Neque diam senectus suspendisse id.
                        Pretium congue erat pharetra aliquet.
                        Platea aliquet aliquam ac vitae senectus quis.
                    </p>
                    <a class="btn btn-gradient effect btn-md" href="">Ajukan Proposal</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="thumb-services-area inc-thumbnail mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h4>PAKET PELATIHAN</h4>
                    <h3>Berinvestasi dalam Kemampuan Anda: Paket Pelatihan Kami Membuka Pintu Menuju Sukses</h3>
                    <div class="devider"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="services-items text-center">
            <div class="row">
                @foreach (range(1,3) as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInDown">
                        <div class="package">
                            <div class="package-name">
                                <img src="{{ asset('assets-home/img/shape/23.png') }}">
                                <h4>Basic</h4>
                            </div>
                            <div class="package-description">
                                <p>Show social proof notifications to increase leads and sales.</p>
                            </div>
                            <div class="package-price">
                                <h1>Rp. 99k <span class="per-month">/Bulan</span></h1>
                            </div>
                            <a href="" class="ajukan">Ajukan Proposal</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
