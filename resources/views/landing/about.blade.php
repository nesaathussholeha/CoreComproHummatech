@extends('landing.layouts.layouts.app')
@section('title' , 'Tentang')
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

<meta name="description" content="Perusahaan Software House terbaik se-Jawa Timur" />
<meta name="og:description" content="Perusahaan Software House terbaik se-Jawa Timur" />
@endsection

@section('content')
    <div class="breadcrumb-area text-center shadow dark text-light bg-cover"
        style="background-image: url('{{ $background == null ? asset('assets-home/img/default-bg.png') : asset('storage/'. $background->image) }}');">
        <div class="container">
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

    <div class="about-us-area pt-5">
        <div class="container">
            <img src="{{ asset('assets-home/img/about-polygon.svg') }}" class="about-triangle" alt="Polygon" />
            <div class="about-items">
                <div class="row align-center justify-content-center">
                    <div class="col-lg-6 info text-center text-lg-start">
                        <h4 class="subtitle">Profile Perusahaan</h4>
                        @forelse ($profiles as $profile)
                        <h2>{{ $profile->title }}</h2>
                        <img src="{{ asset('storage/' . $profile->image) }}" alt="Thumb"
                            class="w-75 mb-3 d-block mx-auto d-lg-none" />
                        <p>{!! $profile->description !!}</p>

                        @if ($profile->proposal)
                            <a class="btn btn-gradient effect btn-md"
                                href="{{ url('detail/profile') }}">Lihat Profil Lengkap</a>
                        @endif
                    </div>
                    <div class="col-lg-6 d-none d-md-none d-lg-inline">
                        <div class="thumb">
                            <img src="{{ asset('storage/' . $profile->image) }}" alt="Thumb" style="max-width: 80%; max-height: auto; display: inline-block;">
                        </div>
                    </div>

                @empty
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('nodata-gif.gif') }}" alt="" width="800px">
                    </div>
                    <h4 class="text-center text-dark" style="font-weight:600">
                        Belum ada profile perusahaan
                    </h4>
                </div>
                    @endforelse
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
                    <div class="single-item  col-lg-4 col-md-6 mb-4 text-light fadeInRight "  data-wow-delay="300ms"
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
                        <div class="single-item col-lg-4 col-md-6 mb-4 text-dark fadeInRight shadow"  data-wow-delay="300ms"
                        style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;">
                            <div class="py-5 px-5" style="border-radius: 8px; box-shadow: 0px 0px 15px .3px #00000012">
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

    <div class="work-process-area features-area default-padding-bottom pt-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4>STRUKTUR ORGANISASI</h4>
                        <h2>Fondasi Keberhasilan dan Kolaborasi di Tempat Kerja</h2>
                        <div class="devider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="work-process-items features-content">
                <div class="text-center">
                    @if ($imageStructures->count() > 0 && isset($imageStructures[0]))
                        <img src="{{ Storage::url($imageStructures[0]->image) }}" alt="Struktur Organisasi Hummatech" />
                    @else
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('nodata-gif.gif') }}" alt="Not Found" width="800px" />
                        </div>
                        <h4 class="text-center text-dark" style="font-weight:600">
                            Gambar struktur organisasi belum diunggah
                        </h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="work-process-area features-area default-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4>STRUKTUR USAHA</h4>
                        <h2>Struktur Usaha yang Membawa Inovasi dan Keberlanjutan</h2>
                        <div class="devider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="work-process-items features-content">
                <div class="text-center">
                    @if ($imageStructures->count() > 0 && isset($imageStructures[1]))
                        <img src="{{ Storage::url($imageStructures[1]->image) }}" alt="Struktur Usaha dari Hummatech" />
                    @else
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('nodata-gif.gif') }}" alt="Not Found" width="800px" />
                        </div>
                        <h4 class="text-center text-dark" style="font-weight:600">
                            Gambar struktur organisasi belum diunggah
                        </h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="team-area default-padding bottom-less">
        <div class="container">
            <div class="team-items">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="site-heading text-center">
                            <h4>FILOSOFI LOGO</h4>
                            <h2>Simbol Kuat Inovasi dan Keandalan: Filosofi di Balik Logo Kami</h2>
                            <div class="devider"></div>
                        </div>
                    </div>
                    @forelse ($logos as $logo)
                    <div class="single-item col-lg-5 col-md-6 mx-auto">
                        <div class="item text-center">
                            <div class="logo-container">
                                <img class="logo-image" src="{{ asset('storage/' . $logo->image) }}" alt="{{ $logo->title }}" style="max-width: 60%; height: auto; display: block; margin: 0 auto;">
                            </div>
                            <div class="item-details pt-5">
                                <h3 style="font-size: 37px;"><b>{{ $logo->title }}</b></h3>
                                <p>{{ Str::limit($logo->description, 250) }}</p>
                                <a href="/detail-logo" class="btn btn-gradient btn-lg">Selengkapnya</a>
                                {{-- <button class="btn btn-gradient btn-lg">Selengkapnya</button> --}}
                            </div>
                        </div>
                    </div>


                    @empty
                        <div class="col-lg-8 offset-lg-2">
                            <div class=" text-center">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('nodata-gif.gif') }}" alt="Not Found" width="800px" />
                                </div>
                                <h4 class="text-center text-dark" style="font-weight:600">
                                    Logo belum diunggah
                                </h4>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="team-area default-padding bottom-less">
        <div class="container">
            <div class="team-items text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="site-heading text-center">
                            <h4>TIM KAMI</h4>
                            <h2>Bersatu Demi Kesuksesan: Introducing Tim Kami yang Berdedikasi dan Profesional</h2>
                            <div class="devider"></div>
                        </div>
                    </div>
                    <!-- Single Item -->
                    @forelse ($teams as $team)
                        <div class="single-item col-lg-4 col-md-6">
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ url(Storage::url($team->image)) }}" alt="Thumb">
                                    <div class="social">
                                        <a href="#" class="share-icon facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" class="share-icon twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="share-icon instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                    <div class="share">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="content">
                                        <h4>{{ $team->name }}</h4>
                                        <span>{{ $team->position->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('nodata-gif.gif') }}" alt="" width="800px">
                            </div>
                            <h4 class="text-center text-dark" style="font-weight:600">
                                Belum ada tim yang didaftarkan
                            </h4>
                        </div>
                    @endforelse

                    <div class="col-12" id="pagination">
                        <div class="d-flex justify-content-center">
                            {{ $teams->links() }}
                        </div>
                    </div>
                </div>
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
