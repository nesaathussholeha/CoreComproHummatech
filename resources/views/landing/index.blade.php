@extends('landing.layouts.app')
@section('style')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');

        .container {
            position: relative;
            width: 1000px;
            height: auto;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 440px;
            grid-gap: 40px;
            grid-template-rows: repeat(3, auto);
            grid-gap: 20px;
        }

        .container .card {
            position: relative;
            background: #000;
            overflow: hidden;
            border-radius: 10px;
            transition: 0.5s;
        }

        .container .card:hover {
            transform: translateY(-20px);
            box-shadow: 0 20px 20px rgba(0, 0, 0, .2);
        }

        /* Usado apenas para as imagens na web. Recomendável usar imagens na pasta */
        .container .card img {
            width: 320px;
            height: 450px;
            object-fit: cover
        }

        .container .card .img-box {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: 0.5s;
        }

        .container .card:hover .img-box {
            opacity: 0.5;
        }

        .container .card .img-box {
            width: 100%;
        }

        .container .card .content {
            position: absolute;
            width: 100%;
            height: 60%;
            bottom: -100%;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            transition: 0.5s;
        }

        .container .card:hover .content {
            bottom: 0;
        }

        .container .card:nth-child(1) .content {
            background: linear-gradient(0deg, #C21833, transparent);
        }

        .container .card:nth-child(2) .content {
            background: linear-gradient(0deg, #8012A5, transparent);
        }

        .container .card:nth-child(3) .content {
            background: linear-gradient(0deg, #3A414C, transparent);
        }

        .container .card .content h2 {
            margin: 0 0 10px;
            padding: 0;
            color: #FFF;
            font-size: 20px;
        }

        .container .card .content h2 span {
            color: #FFEB3B;
            font-size: 16px;
        }

        .container .card .content p {
            margin: 0;
            padding: 0;
            color: #FFF;
            font-size: 16px;
        }

        .container .card .content ul {
            display: flex;
            margin: 20px 0 0;
            padding: 0;
            align-items: center;
            justify-content: center;
        }

        .container .card .content ul li {
            list-style: none;
        }

        .container .card .content ul li a {
            color: #FFF;
            padding: 0 10px;
            font-size: 18px;
            transition: 0.5s;
        }
    </style>
@endsection
@section('content')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="uk-section uk-padding-remove-vertical in-slideshow-gradient">
        <div id="particles-js" class="uk-light in-slideshow uk-background-contain" data-src="{{ asset('assets/images/mischool.jpg') }}"
            data-uk-img data-uk-slideshow>
            <hr>
            <ul class="uk-slideshow-items">
                <li class="uk-flex uk-flex-middle">
                    <div class="uk-container">
                        <div class="uk-grid-large uk-flex-middle" data-uk-grid>
                            <div class="uk-width-1-2@s in-slide-text">
                                <h1 class="uk-heading-small">Maju Bersama Berkembang Bersama.</h1>
                                <p class="uk-text-lead uk-visible@m">bertransformasi menjadi perusahaan yang mampu menjawab
                                    tantangan di era revolusi industri 4.0.</p>
                                <div class="uk-grid-medium uk-child-width-1-3@m uk-child-width-1-2@s uk-margin-medium-top uk-visible@s"
                                    data-uk-grid>
                                    <div class="uk-visible@m">
                                        <button class="uk-button uk-button-primary uk-border-rounded"
                                            style="background-color:#FCB42D; color:">
                                            Selengkapnya <i class="fas fa-arrow-circle-right uk-margin-small-left"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="in-slide-img">
                                <img src="assets_landing/img/in-lazy.gif"
                                    data-src="{{ asset('assets_landing/img/in-equity-slide-1.png') }}" alt="image-slide"
                                    width="500" height="746" data-uk-img>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="uk-container">
                <div class="uk-position-relative" data-uk-grid>
                    <ul class="uk-slideshow-nav uk-dotnav uk-position-bottom-right uk-flex uk-flex-middle"></ul>
                </div>
            </div>
        </div>
    </div>

    <!-- slideshow content end -->
    <!-- section content begin -->
    <div class="uk-section in-equity-3 in-offset-top-65">
        <div class="uk-container uk-margin-large-bottom">
            <div class="uk-grid uk-flex uk-flex-middle">
                <div class="uk-width-expand@m">
                    <h1 class="uk-margin-small-bottom"><span class="in-highlight">Menghadirkan Solusi Terintegrasi untuk
                            Masa Digital</span></h1>
                    <p class="uk-margin-top">Kini Hummatech bertransformasi menjadi perusahaan yang mampu
                        menjawab tantangan di era revolusi industri 4.0 dengan menciptakan produk berbasis
                        integrated system berupa perangkat lunak, seperti </p>
                        <button class="uk-button uk-button-primary uk-border-rounded" style="background-color:#FCB42D; color:">
                            Selengkapnya <i class="fas fa-arrow-circle-right uk-margin-small-left"></i>
                        </button>
                        <hr class="uk-margin-medium-top uk-margin-medium-bottom">
                </div>
                <div class="uk-width-2xlarge uk-flex uk-flex-right uk-flex-center@s">
                    <div class="">
                        <img src="{{ asset('assets/images/Logo_HUMMATECH_Icon.ico') }}" style="width:400px;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section uk-section-primary uk-preserve-color in-equity-1">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <h1 cl>Layanan Kami</h1>
                </div>
            </div>
            <div class="uk-grid-match uk-grid-medium uk-child-width-1-3@m uk-child-width-1-2@s uk-margin-bottom"
                data-uk-grid>
                <div>
                    <div class="uk-card uk-card-body uk-card-default uk-border-rounded">
                        <div class="uk-flex uk-flex-middle">
                            <span class="in-product-name red">SD</span>
                            <h5 class="uk-margin-remove">Software Development</h5>
                        </div>
                        <p>Melayani pembuatan software berdasarkan kebutuhan klien/ customer. Produk yang dihasilkan adalah
                            perangkat lunak ....</p>
                        <a href="#" class="uk-button uk-button-text uk-float-right uk-position-bottom-right">Lihat
                            Selengkapnya<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-body uk-card-default uk-border-rounded">
                        <div class="uk-flex uk-flex-middle">
                            <span class="in-product-name red">SD</span>
                            <h5 class="uk-margin-remove">Software Development</h5>
                        </div>
                        <p>Melayani pembuatan software berdasarkan kebutuhan klien/ customer. Produk yang dihasilkan adalah
                            perangkat lunak ....</p>
                        <a href="#" class="uk-button uk-button-text uk-float-right uk-position-bottom-right">Lihat
                            Selengkapnya<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-body uk-card-default uk-border-rounded">
                        <div class="uk-flex uk-flex-middle">
                            <span class="in-product-name red">SD</span>
                            <h5 class="uk-margin-remove">Software Development</h5>
                        </div>
                        <p>Melayani pembuatan software berdasarkan kebutuhan klien/ customer. Produk yang dihasilkan adalah
                            perangkat lunak ....</p>
                        <a href="#" class="uk-button uk-button-text uk-float-right uk-position-bottom-right">Lihat
                            Selengkapnya<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-body uk-card-default uk-border-rounded">
                        <div class="uk-flex uk-flex-middle">
                            <span class="in-product-name red">SD</span>
                            <h5 class="uk-margin-remove">Software Development</h5>
                        </div>
                        <p>Melayani pembuatan software berdasarkan kebutuhan klien/ customer. Produk yang dihasilkan adalah
                            perangkat lunak ....</p>
                        <a href="#" class="uk-button uk-button-text uk-float-right uk-position-bottom-right">Lihat
                            Selengkapnya<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-body uk-card-default uk-border-rounded">
                        <div class="uk-flex uk-flex-middle">
                            <span class="in-product-name red">SD</span>
                            <h5 class="uk-margin-remove">Software Development</h5>
                        </div>
                        <p>Melayani pembuatan software berdasarkan kebutuhan klien/ customer. Produk yang dihasilkan adalah
                            perangkat lunak ....</p>
                        <a href="#" class="uk-button uk-button-text uk-float-right uk-position-bottom-right">Lihat
                            Selengkapnya<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-body uk-card-default uk-border-rounded">
                        <div class="uk-flex uk-flex-middle">
                            <span class="in-product-name red">SD</span>
                            <h5 class="uk-margin-remove">Software Development</h5>
                        </div>
                        <p>Melayani pembuatan software berdasarkan kebutuhan klien/ customer. Produk yang dihasilkan adalah
                            perangkat lunak ....</p>
                        <a href="#" class="uk-button uk-button-text uk-float-right uk-position-bottom-right">Lihat
                            Selengkapnya<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m in-card-10" data-uk-grid>
                <div class="uk-width-1-1">
                    <h1 class="uk-margin-remove uk-text-center">Menghadirkan produk dengan kualitas dan inovasi terbaik</h1>
                    <p class="uk-text-center">
                        Kami berkomitmen untuk menghadirkan produk-produk berkualitas tinggi yang dipadukan dengan inovasi
                        terdepan, memenuhi kebutuhan dan harapan konsumen dengan sempurna.
                    </p>
                </div>
                <div>
                    <div
                        class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded uk-light in-card-green">
                        <div class="in-icon-wrap uk-margin-bottom">
                            <i class="fas fa-seedling fa-lg"></i>
                        </div>
                        <h4 class="uk-margin-top">
                            <a href="#">Mischool.id<i class="fas fa-chevron-right uk-float-right"></i></a>
                        </h4>
                        <hr>
                        <p>Lorem ipsum dolor sit amet consectetur. Mauris sed aliquet arcu eleifend elementum magnis
                            consectetur metus sed. Et ultrices facilisi pellentesque quis auctor orci eu. A erat vitae risus
                            mi at eget. Donec adipiscing fringilla ultrices arcu magnis purus eu.</p>
                    </div>
                </div>
                <div>
                    <div
                        class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded uk-light in-card-blue">
                        <div class="in-icon-wrap uk-margin-bottom">
                            <i class="fas fa-seedling fa-lg"></i>
                        </div>
                        <h4 class="uk-margin-top">
                            <a href="#">Mischool.id<i class="fas fa-chevron-right uk-float-right"></i></a>
                        </h4>
                        <hr>
                        <p>Lorem ipsum dolor sit amet consectetur. Mauris sed aliquet arcu eleifend elementum magnis
                            consectetur metus sed. Et ultrices facilisi pellentesque quis auctor orci eu. A erat vitae risus
                            mi at eget. Donec adipiscing fringilla ultrices arcu magnis purus eu.</p>
                    </div>
                </div>
                <div>
                    <div
                        class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded uk-light in-card-purple">
                        <div class="in-icon-wrap uk-margin-bottom">
                            <i class="fas fa-seedling fa-lg"></i>
                        </div>
                        <h4 class="uk-margin-top">
                            <a href="#">Mischool.id<i class="fas fa-chevron-right uk-float-right"></i></a>
                        </h4>
                        <hr>
                        <p>Lorem ipsum dolor sit amet consectetur. Mauris sed aliquet arcu eleifend elementum magnis
                            consectetur metus sed. Et ultrices facilisi pellentesque quis auctor orci eu. A erat vitae risus
                            mi at eget. Donec adipiscing fringilla ultrices arcu magnis purus eu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content begin -->
    <div class="uk-section" style="background-color: #edeff1">
        <div class="uk-width-1-1@m uk-text-center ">
            <h1><span class="in-highlight">MITRA KAMI</span></h1>
            <p class="uk-text-lead uk-margin-remove-top "> Tumbuh bersama: Kolaborasi menuju kesuksesan</p>
        </div>
        <div class="uk-container  uk-padding-remove-vertical in-equity-18">
            <div class="uk-grid" data-uk-grid>
                <div class="uk-width-1-1">
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                        <div class="uk-grid-collapse uk-child-width-1-6@m uk-child-width-1-2@s uk-text-center in-client-logo-6"
                            data-uk-grid>
                            <div class="uk-tile uk-tile-default">
                                <img class="uk-margin-remove" src="assets_landing/img/in-equity-payment-1.svg"
                                    alt="client-logo" width="167" height="55">
                            </div>
                            <div class="uk-tile uk-tile-default">
                                <img class="uk-margin-remove" src="assets_landing/img/in-equity-payment-2.svg"
                                    alt="client-logo" width="167" height="55">
                            </div>
                            <div class="uk-tile uk-tile-default">
                                <img class="uk-margin-remove" src="assets_landing/img/in-equity-payment-3.svg"
                                    alt="client-logo" width="167" height="55">
                            </div>
                            <div class="uk-tile uk-tile-default">
                                <img class="uk-margin-remove" src="assets_landing/img/in-equity-payment-4.svg"
                                    alt="client-logo" width="167" height="55">
                            </div>
                            <div class="uk-tile uk-tile-default">
                                <img class="uk-margin-remove" src="assets_landing/img/in-equity-payment-5.svg"
                                    alt="client-logo" width="167" height="55">
                            </div>
                            <div class="uk-tile uk-tile-default">
                                <img class="uk-margin-remove" src="assets_landing/img/in-equity-payment-6.svg"
                                    alt="client-logo" width="167" height="55">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="uk-width-1-1@m uk-text-center uk-margin-medium-top">
            <button class="uk-button uk-button-primary uk-border-rounded" style="background-color:#FCB42D; color:">
                Selengkapnya <i class="fas fa-arrow-circle-right uk-margin-small-left"></i>
            </button>
        </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section in-equity-13">
        <div class="uk-container uk-margin-medium-bottom">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-3-4@m uk-text-center">
                    <h1 class="uk-margin-small-bottom"> <span class="in-highlight">BERITA</span></h1>
                    <p class="uk-text-lead uk-margin-remove-top ">Melangkah Ke Depan: Kabar Terbaru Mengenai Perkembangan
                        Perusahaan Kami</p>
                </div>
                <div class="uk-width-5-6@m">
                    <div class="uk-child-width-1-2@s
uk-child-width-1-3@m uk-margin-top"
                        data-uk-grid>
                        <div class="">
                            <span class="uk-label in-label-small uk-margin-remove-bottom">News</span>
                            <article>
                                <img class="uk-border-rounded uk-width-1-1 in-offset-bottom-20"
                                    src="assets_landing/img/in-lazy.gif"
                                    data-src="{{ asset('assets/images/mischool.jpg') }}" alt="news" width="340"
                                    height="170" data-uk-img>
                                <h5>
                                    <a href="#">Inflation and sanctions weaken ruble against the dollar</a>
                                </h5>
                                <div class="uk-flex uk-flex-middle">
                                    <div>
                                        <i class="fas fa-clock fa-xs"></i>
                                    </div>
                                    <div>
                                        <span
                                            class="uk-text-small uk-text-uppercase uk-text-muted uk-margin-small-left">October
                                            16, 2021</span>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit....
                                </p>
                            </article>
                        </div>
                        <div class="">
                            <span class="uk-label in-label-small uk-margin-remove-bottom">News</span>
                            <article>
                                <img class="uk-border-rounded uk-width-1-1 in-offset-bottom-20"
                                    src="assets_landing/img/in-lazy.gif"
                                    data-src="{{ asset('assets/images/mischool.jpg') }}" alt="news" width="340"
                                    height="170" data-uk-img>
                                <h5>
                                    <a href="#">Inflation and sanctions weaken ruble against the dollar</a>
                                </h5>
                                <div class="uk-flex uk-flex-middle">
                                    <div>
                                        <i class="fas fa-clock fa-xs"></i>
                                    </div>
                                    <div>
                                        <span
                                            class="uk-text-small uk-text-uppercase uk-text-muted uk-margin-small-left">October
                                            16, 2021</span>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit....
                                </p>
                            </article>
                        </div>
                        <div class="">
                            <span class="uk-label in-label-small uk-margin-remove-bottom">News</span>
                            <article>
                                <img class="uk-border-rounded uk-width-1-1 in-offset-bottom-20"
                                    src="assets_landing/img/in-lazy.gif"
                                    data-src="{{ asset('assets/images/mischool.jpg') }}" alt="news" width="340"
                                    height="170" data-uk-img>
                                <h5>
                                    <a href="#">Inflation and sanctions weaken ruble against the dollar</a>
                                </h5>
                                <div class="uk-flex uk-flex-middle">
                                    <div>
                                        <i class="fas fa-clock fa-xs"></i>
                                    </div>
                                    <div>
                                        <span
                                            class="uk-text-small uk-text-uppercase uk-text-muted uk-margin-small-left">October
                                            16, 2021</span>
                                    </div>
                                </div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit....
                                </p>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1@m uk-text-center uk-margin-medium-top">
                    <button class="uk-button uk-button-primary uk-border-rounded"
                        style="background-color:#FCB42D; color:">
                        Selengkapnya <i class="fas fa-arrow-circle-right uk-margin-small-left"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section" style="background-color: #edeff1">
        <div class="uk-width-1-1@m uk-text-center ">
            <h1><span class="in-highlight">PORTOFOLIO</span></h1>
            <h3 class="uk-text-lead uk-margin-remove-top ">Inspirasi dari Karya: Portfolio Hummatech Menggambarkan
                Keunggulan Produk</h3>
        </div>
        <div class="uk-container">
            <ul class="uk-grid-small uk-child-width-1-3@m uk-child-width-1-2@s uk-text-center" data-uk-grid="masonry: true">
                <li>
                    <div class="uk-inline-clip uk-transition-toggle uk-border-rounded" tabindex="0">
                        <img class="uk-transition-scale-up uk-transition-opaque" src="assets_landing/img/blockit/in-gallery-image-1.jpg" alt="gallery-image" data-width data-height>
                    </div>
                </li>
                <li>
                    <div class="uk-inline-clip uk-transition-toggle uk-border-rounded" tabindex="0">
                        <img class="uk-transition-scale-up uk-transition-opaque" src="assets_landing/img/blockit/in-gallery-image-2.jpg" alt="gallery-image" data-width data-height>
                    </div>
                </li>
                <li>
                    <div class="uk-inline-clip uk-transition-toggle uk-border-rounded" tabindex="0">
                        <img class="uk-transition-scale-up uk-transition-opaque" src="assets_landing/img/blockit/in-gallery-image-3.jpg" alt="gallery-image" data-width data-height>
                    </div>
                </li>
                <li>
                    <div class="uk-inline-clip uk-transition-toggle uk-border-rounded" tabindex="0">
                        <img class="uk-transition-scale-up uk-transition-opaque" src="assets_landing/img/blockit/in-gallery-image-4.jpg" alt="gallery-image" data-width data-height>
                    </div>
                </li>
                <li>
                    <div class="uk-inline-clip uk-transition-toggle uk-border-rounded" tabindex="0">
                        <img class="uk-transition-scale-up uk-transition-opaque" src="assets_landing/img/blockit/in-gallery-image-5.jpg" alt="gallery-image" data-width data-height>
                    </div>
                </li>
                <li>
                    <div class="uk-inline-clip uk-transition-toggle uk-border-rounded" tabindex="0">
                        <img class="uk-transition-scale-up uk-transition-opaque" src="assets_landing/img/blockit/in-gallery-image-6.jpg" alt="gallery-image" data-width data-height>
                    </div>
                </li>
            </ul>
        </div>
        <div class="uk-width-1-1@m uk-text-center uk-margin-medium-top">
            <button class="uk-button uk-button-primary uk-border-rounded" style="background-color:#FCB42D; color:">
                Selengkapnya <i class="fas fa-arrow-circle-right uk-margin-small-left"></i>
            </button>
        </div>
    </div>
    <!-- section content end -->
@endsection
