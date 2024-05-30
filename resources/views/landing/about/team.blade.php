@extends('landing.layouts.layouts.app')
@section('title', 'Team')
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
    <meta name="title" content="Team - Profil Hummatech" />
    <meta name="og:image" content="{{ asset('mobilelogo.png') }}" />
    <meta name="twitter:image" content="{{ asset('mobilelogo.png') }}" />
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
        style="background-image: url('{{ $background != null && $background->show_in == 'Tentang Kami' && $background->about_in == 'Tim' ? asset('storage/' . $background->image) : asset('assets-home/img/default-bg.png') }}');">
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
