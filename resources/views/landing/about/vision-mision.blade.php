@extends('landing.layouts.layouts.app')
@section('title', 'Vision & Mision')
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />

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
            /* padding-right: 50px; */
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

        .pagination {
            display: flex !important;
            gap: .5rem;
        }

        .pagination .page-item {
            margin: 0 !important;
        }

        .pagination .page-item .page-link {
            padding: .75rem 1rem !important;
            border-radius: 8px;
            margin: 0;
        }

        @media screen and (min-width: 992px) {
            .text-lg-start {
                text-align: left !important;
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
      ]
    }
</script>

    <meta name="og:image" content="{{ asset('mobilelogo.png') }}" />
    <meta name="twitter:image" content="{{ asset('mobilelogo.png') }}" />
    <meta name="title" content="Visi Misi - Profil Hummatech" />
    <meta name="description" content="Perusahaan Software House terbaik se-Jawa Timur" />
    <meta name="og:description" content="Perusahaan Software House terbaik se-Jawa Timur" />
@endsection

@section('content')
    <div class="breadcrumb-area text-center shadow dark text-light bg-cover"
        style="background-image: url('{{ $background != null && $background->show_in == 'Tentang Kami' && $background->about_in == 'Profile' ? asset('storage/' . $background->image) : asset('assets_landing/background/Profile.jpg') }}');">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>Tentang Kami</h1>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
                    <li class="active">Tentang Kami</li>
                </ul>
            </div>
        </div>
    </div>
    </div>

    <div class="work-process-area features-area default-padding-bottom py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4>Visi dan Misi</h4>
                        <h2>Mewujudkan Visi Kami Melalui Misi yang Berkelanjutan dan Tindakan Nyata</h2>
                        <div class="devider"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @forelse ($visionMisions as $visionMission)
                    <div class="single-item  col-lg-4 col-md-6 mb-4 text-light fadeInRight " data-wow-delay="300ms"
                        style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;">
                        <div class=" bg-primary py-5 px-5 rounded">
                            <div class=" d-flex justify-content-center align-items-center">
                                <p class="text-light" style="font-weight: 900">______________</p>
                                <h3 class="mt-2 px-3 text-light " style="font-weight: 900">Visi</h3>
                                <p class="text-light" style="font-weight: 900">______________</p>
                            </div>
                            <p class="fw-semibold">
                                {{ $visionMission->vision }}
                            </p>
                        </div>
                    </div>

                    @forelse ($missions as $mission)
                        <div class="single-item col-lg-4 col-md-6 mb-4 text-dark fadeInRight shadow" data-wow-delay="300ms"
                            style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;">
                            <div class="py-5 px-5"
                                style="border-radius: 8px; box-shadow: 0px 0px 15px .3px #00000012; min-height: 100%; max-height: 100%;">
                                <div class=" d-flex justify-content-center align-items-center">
                                    <p class="text-primary" style="font-weight: 900">______________</p>
                                    <h3 class="mt-2 px-3 text-primary " style="font-weight: 900">Misi</h3>
                                    <p class="text-primary" style="font-weight: 900">______________</p>
                                </div>
                                <p class="fw-semibold">
                                    {{ $mission->mission }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('nodata-gif.gif') }}" alt="" width="800px">
                            </div>
                            <h4 class="text-center text-dark" style="font-weight:600">
                                Belum ada misi perusahaan
                            </h4>
                        </div>
                    @endforelse
                @empty
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('nodata-gif.gif') }}" alt="" width="800px">
                        </div>
                        <h4 class="text-center text-dark" style="font-weight:600">
                            Belum ada visi-misi perusahaan
                        </h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var delay = 500;
            $('[class^="wow fadeInRight"]').each(function(index) {
                $(this).attr('data-wow-delay', delay + 'ms');
                delay += 300;
            });
        });
    </script>
@endsection
