@extends('landing.layouts.layouts.app')
@section('title' , 'Detail Alumni')
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
        .img-box {
            position: relative;
            overflow: hidden;
        }

        .background-img {
            position: absolute;
            top:-30%;
            left: -65%;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: left;
            opacity: 0.1; /* Sesuaikan nilai opacity sesuai kebutuhan */

        }

        .img-box img {
            display: block;
            width: 100%;
            height: auto;
        }

        .shape {
            /* Gaya untuk shape */
            /* ... */
        }


        .background-img-shape {
            position: absolute;
            top: -3%;
            left: -110%;
            width: 40%;
            height: 40%;
            background-size: cover;
            background-position: left;
            opacity: 0.4;
        }
        .about-us-area-shape .about-triangle {
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


    <div class="services-details-area default-padding">
        <div class="container">
            <div class="services-details-items">
                <div class="row">

                    <div class="col-lg-8 services-single-content wow fadeInUp offset-lg-2">
                        <div class="about-content-area pb-5 mb-5">
                            <div class="row">
                                <div class="col-lg-5 thumb wow fadeInUp">
                                    <div class="background-img" style="background-image: url('{{ asset('assets-home/img/shape/14.png') }}');"></div>
                                    <div class="img-box">
                                        <img src="{{ asset('assets-home/img/about/2.jpg') }}" alt="Thumb">
                                        <div class="shape" style="background-image: url(assets/img/shape/1.png);"></div>
                                    </div>
                                </div>
                                <div class="col-lg-7 wow fadeInDown">
                                    <h2>Angkatan 1922 - 1903</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur.
                                        Tincidunt pellentesque pellentesque sed in.
                                        Sit nunc velit aliquam quis faucibus nibh nisl pellentesque.
                                        Massa natoque mattis quisque ut molestie turpis at fusce integer.
                                        Tincidunt lorem egestas
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">

                        </div>

                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="site-heading text-center">
                                    <h4>PRODUK YANG DIHASILKAN</h4>
                                    <h3>"Inspirasi Dari Para Alumni: Produk Unggulan Mereka Membuktikan Keunggulan Pelatihan Kami"</h3>
                                    <div class="devider"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 services-single-content wow fadeInUp offset-lg-2">
                        <div class="mt-5">

                            <div class="about-content-area pb-5 mb-5">
                                <div class="row">
                                    <div class="col-lg-6 thumb wow fadeInUp">
                                        <div class="img-box">
                                            <img src="{{ asset('assets-home/img/about/2.jpg') }}" alt="Thumb">
                                            <div class="shape" style="background-image: url(assets/img/shape/1.png);"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInDown">
                                        <h2>Milink.id</h2>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur.
                                            Tincidunt pellentesque pellentesque sed in.
                                            Sit nunc velit aliquam quis faucibus nibh nisl pellentesque.
                                            Massa natoque mattis quisque ut molestie turpis at fusce integer.
                                            Tincidunt lorem egestas
                                        </p>
                                        <a class="btn btn-stroke-gradient effect btn-sm" href="">Lihat detail</a>
                                        <a class="btn btn-gradient effect btn-sm" href="">Kunjungi website</a>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="about-content-area-shape pb-5 mb-5">
                                <div class="row">
                                    <div class="col-lg-6 wow fadeInDown">
                                        <div class="text-content">
                                            <h2>Mischool</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur.
                                                Tincidunt pellentesque pellentesque sed in.
                                                Sit nunc velit aliquam quis faucibus nibh nisl pellentesque.
                                                Massa natoque mattis quisque ut molestie turpis at fusce integer.
                                                Tincidunt lorem egestas
                                            </p>
                                            <a class="btn btn-stroke-gradient effect btn-sm" href="">Lihat detail</a>
                                            <a class="btn btn-gradient effect btn-sm" href="">Kunjungi website</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 thumb wow fadeInUp">
                                        <div class="img-box">
                                            <img src="{{ asset('assets-home/img/about/2.jpg') }}" alt="Thumb">
                                            <div class="shape" style="background-image: url(assets/img/shape/3.png);"></div>
                                        </div>
                                        <div class="background-img-shape" style="background-image: url('{{ asset('assets-home/img/shape/3.png') }}');"></div>
                                    </div>

                                </div>
                            </div> --}}

                            <div class="about-content-area pb-5 mb-5">
                                <div class="row product-service">
                                    <div class="col-lg-6 thumb wow fadeInUp">
                                        <div class="img-box">
                                            <img src="{{ asset('assets-home/img/about/2.jpg') }}" alt="Thumb">
                                            <div class="shape" style="background-image: url(assets/img/shape/3.png);"></div>
                                        </div>
                                        <div class="background-img-shape" style="background-image: url('{{ asset('assets-home/img/shape/3.png') }}');"></div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInDown">
                                        <h2>Mischool</h2>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur.
                                            Tincidunt pellentesque pellentesque sed in.
                                            Sit nunc velit aliquam quis faucibus nibh nisl pellentesque.
                                            Massa natoque mattis quisque ut molestie turpis at fusce integer.
                                            Tincidunt lorem egestas
                                        </p>
                                        <a class="btn btn-stroke-gradient effect btn-sm" href="">Lihat detail</a>
                                        <a class="btn btn-gradient effect btn-sm" href="">Kunjungi website</a>
                                    </div>
                                </div>
                            </div>

                            <div class="about-content-area my-5">
                                <div class="row">
                                    <div class="col-lg-6 thumb wow fadeInUp">
                                        <div class="img-box">
                                            <img src="{{ asset('assets-home/img/about/2.jpg') }}" alt="Thumb">
                                            <div class="shape" style="background-image: url(assets/img/shape/1.png);"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInDown">
                                        <h2>Jurnal mengajar</h2>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur.
                                            Tincidunt pellentesque pellentesque sed in.
                                            Sit nunc velit aliquam quis faucibus nibh nisl pellentesque.
                                            Massa natoque mattis quisque ut molestie turpis at fusce integer.
                                            Tincidunt lorem egestas
                                        </p>
                                        <a class="btn btn-stroke-gradient effect btn-sm" href="">Lihat detail</a>
                                        <a class="btn btn-gradient effect btn-sm" href="">Kunjungi website</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
