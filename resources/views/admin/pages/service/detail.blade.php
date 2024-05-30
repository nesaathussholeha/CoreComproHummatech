@extends('admin.layouts.app')

@section('subcontent')
    <div class="py-3 my-3">
        <a href="{{ route('service.index') }}" class="btn btn-light"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
@endsection

@section('header-style')
    <style>
        #detail-title .title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        #detail-title .subtitle {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            opacity: .75;
        }

        @media screen and (max-width: 992px) {
            #detail-title .title {
                font-size: 2rem;
            }

            #detail-title .subtitle {
                font-size: 1rem;
            }
        }
    </style>

    <style>
        .need-space {
            padding: 2rem 0;
        }

        .need-space .title {
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }
    </style>

    <style>
        #faq .accordion .accordion-button::after {
            display: none;
        }

        #faq .accordion .accordion-button {
            position: relative;
        }

        #faq .accordion .accordion-button .icon-collapse {
            font-size: 1.5rem;
            top: 0;
            right: 0;
            padding: 1.25rem;
            position: absolute;
            transition: all .2s;
        }

        #faq .accordion .accordion-button.collapsed .icon-collapse {
            transform: rotate(180deg);
        }
    </style>

    <style>
        #tos-mission .card-info {
            border-left: 4px solid var(--bs-primary);
            padding: 1.5rem;
            border-radius: var(--bs-border-radius-lg);
            box-shadow: var(--bs-box-shadow)
        }
    </style>

    <style>
        #owl-carousel-mitra::before,
        #owl-carousel-mitra::after {
            position: absolute;
            height: 100%;
            z-index: 2;
            content: '';
            width: 150px;
        }

        #owl-carousel-mitra::before {
            left: 0;
            top: 0;
            bottom: 0;
            background: linear-gradient(to right, rgba(var(--bs-white-rgb), 1), 65%, transparent);
        }

        #owl-carousel-mitra::after {
            right: 0;
            top: 0;
            bottom: 0;
            background: linear-gradient(to left, rgba(var(--bs-white-rgb), 1), 65%, transparent);
        }
    </style>
@endsection

@section('content')
    <div class="card card-body p-5">
        <div class="row pb-4" id="detail-title">
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $services->image) }}" alt="Milink.id" class="rounded-3 w-100" />
            </div>
            <div class="col-md-7">
                <h1 class="title">{{ $services->name }}</h1>
            <p class="subtitle">{!! $services->description !!}</p>
                <a href="{{ url("/services/{$services->slug}") }}" target="_blank"  class="btn btn-lg btn-primary">Detail Layanan</a>
            </div>
        </div>

        <div id="products" class="need-space">
            <h1 class="title">Produk Yang Dihasilkan</h1>
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-xxl-3 col-md-4 col-sm-6">
                        <div class="card border-0 shadow rounded">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Milink"
                                class="rounded-top card-img-thumbnail" />
                            <div class="card-header text-center h4 border-bottom"
                                style="margin-top: -1rem; border-radius: var(--bs-border-radius) var(--bs-border-radius) 0 0 !important;">
                                {{ $product->name }}</div>
                            <div class="card-body">
                                <p>{!! $product->description !!}</p>

                                <a href="{{ $product->link }}" target="_blank" class="btn btn-primary">Kunjungi Situs</a>
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

        <div id="tos-mission" class="need-space">
            <div class="mb-4">
                <h1 class="title">Misi</h1>
                @forelse ($mision as $item)

                <div class="card card-info card-body">
                    <p class="mb-0">{{ $item->mission }}</p>
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
            <div class="mb-4">
                <h1 class="title">Syarat dan Ketentuan</h1>
                @forelse ($termsconditions as $item)
                <div class="card card-info card-body">
                    <p class="mb-0">{{ $item->termcondition }}</p>
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

        <div id="testimonials" class="need-space">
            <h1 class="title">Testimoni</h1>

            <div class="row">
                @forelse ($testimonials as $testimonial)
                    <div class="col-md-6">
                        <div class="card card-body rounded-4 shadow d-flex flex-row gap-3">
                            <img src="{{ asset('storage/'. $testimonial->image) }}" class="rounded-3" height="120px"
                                alt="{{ $testimonial->name }}" />
                            <div class="d-flex flex-column gap-2">
                                <strong class="h5">{{ $testimonial->name }}</strong>
                                <p class="mb-2">{{ $testimonial->description }}</p>
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

        <div id="faq" class="need-space">
            <h1 class="title">FAQ</h1>

            <div class="accordion" id="accordionExample">
                @forelse ($faqs as $item)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button d-flex collapsed align-items-center gap-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse-{{ $item->id }}"
                                aria-expanded="true" aria-controls="collapse-{{ $item->id }}">

                                <svg width="27" height="30" viewBox="0 0 27 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="13.5" cy="14.5" r="12.5" stroke="#363636" stroke-width="2" />
                                    <path
                                        d="M13.24 7.9C14.6 7.9 15.6867 8.27333 16.5 9.02C17.3267 9.76667 17.74 10.7867 17.74 12.08C17.74 13.4267 17.3133 14.44 16.46 15.12C15.6067 15.8 14.4733 16.14 13.06 16.14L12.98 17.72H11L10.9 14.58H11.56C12.8533 14.58 13.84 14.4067 14.52 14.06C15.2133 13.7133 15.56 13.0533 15.56 12.08C15.56 11.3733 15.3533 10.82 14.94 10.42C14.54 10.02 13.98 9.82 13.26 9.82C12.54 9.82 11.9733 10.0133 11.56 10.4C11.1467 10.7867 10.94 11.3267 10.94 12.02H8.8C8.8 11.22 8.98 10.5067 9.34 9.88C9.7 9.25333 10.2133 8.76667 10.88 8.42C11.56 8.07333 12.3467 7.9 13.24 7.9ZM11.96 22.14C11.5467 22.14 11.2 22 10.92 21.72C10.64 21.44 10.5 21.0933 10.5 20.68C10.5 20.2667 10.64 19.92 10.92 19.64C11.2 19.36 11.5467 19.22 11.96 19.22C12.36 19.22 12.7 19.36 12.98 19.64C13.26 19.92 13.4 20.2667 13.4 20.68C13.4 21.0933 13.26 21.44 12.98 21.72C12.7 22 12.36 22.14 11.96 22.14Z"
                                        fill="#363636" />
                                </svg>

                                <h1 class="h5 mb-0">#{{ $item->question }}</h1>

                                <i class="fas fa-chevron-down icon-collapse"></i>
                            </button>
                        </h2>
                        <div id="collapse-{{ $item->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>{{ $item->answer }}</p>
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

        <div class="need-space" id="mitra">
            <h1 class="title">Mitra</h1>

            <div class="owl-carousel owl-item owl-theme" id="owl-carousel-mitra">
                {{-- @forelse ($serviceMitras as $serviceMitra)
                    <div class="item"><img src="{{ asset('storage/'. $serviceMitra->mitra->image) }}" alt="{{ $serviceMitra->mitra->name }}" style="object-fit: cover; height: 200px; width: 200px"></div>
                @empty
                <div class="d-flex flex-column  align-items-center">
                    <img src="{{ asset('nodata.jpg') }}" alt="" width="400px">
                    <h5 class="text-center">
                        Data Masih Kosong
                    </h5>
                </div>
                @endforelse --}}
            </div>
        </div>

        <div class="need-space">
        @forelse ($galleries as $gallery)
            <div class="need-space" id="gallery-kelas-industri">
                <h1 class="title">Galeri {{ $gallery->name }}</h1>

                <div class="owl-carousel owl-item owl-theme" id="owl-carousel-galery">
                    @forelse ($gallery->galeryImages as $galery)
                        <div class="item"><img src="{{ asset('storage/'. $galery->image) }}" alt="{{ $galery->name }}" style="object-fit: cover; height: 200px; width: 200px"></div>
                    @empty
                    <div class="d-flex flex-column  align-items-center">
                        <img src="{{ asset('nodata.jpg') }}" alt="" width="400px">
                        <h5 class="text-center">
                            Data Masih Kosong
                        </h5>
                    </div>
                    @endforelse
                </div>
            </div>
        @empty
            <div class="d-flex flex-column  align-items-center">
                <img src="{{ asset('nodata.jpg') }}" alt="" width="400px">
                <h5 class="text-center">
                    Data Masih Kosong
                </h5>
            </div>
        @endforelse
        </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>

    <script>
        var itemCount = $('.owl-item .item').length;
        $('#owl-carousel-mitra, #owl-carousel-galery').owlCarousel({
            center: true,
            loop: itemCount > 5 ? true : false,
            margin: 1,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    mergeFit: true,
                },
                600: {
                    items: 2,
                    mergeFit: true,
                },
                1000: {
                    items: 3,
                    mergeFit: true,
                },
            },
        });
    </script>
@endsection
