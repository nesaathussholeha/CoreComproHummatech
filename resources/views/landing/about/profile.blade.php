@extends('landing.layouts.layouts.app')
@section('title' , 'About Company')
@section('seo')
@section('seo')
@foreach ($profiles as $profile)
<meta name="title" content="{{ $profile->title }}" />
<meta name="description"
    content="{{ $profile->subtitle }}" />
<meta name="og:image" content="{{ asset('mobilelogo.png') }}" />
<meta name="twitter:image" content="{{ asset('mobilelogo.png') }}" />
<meta property="og:url" content="{{ url('/') }}" />
<meta property="og:type" content="website" />
<link rel="canonical" href="{{ url('/') }}" />
@endforeach
@endsection
@endsection

@section('style')

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

@section('header')
<div class="uk-section uk-padding-remove-vertical in-equity-breadcrumb">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <ul class="" style="padding-top: 13px;padding-bottom: 16px;color:white">
                    <li ><a href="#" style="color: white">Profil</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="uk-section">
    <div class="uk-container">
        <div class="uk-grid uk-grid-stack" data-uk-grid>
            <div class="uk-width-3-5@m uk-first-column">
                <h3 class="uk-margin-remove">
                    <span class="in-highlight">
                        Profil Perusahaan
                    </span>
                </h3>
                <h1>PT Humma teknologi indonesia</h1>
                <p>
                    <span class="uk-text-warning">HUMMATECH</span> merupakan perusahaan yang bergerak di bidang teknologi informasi yang berdiri sejak 21 Mei 2013. Hummatech dinaungi oleh badan hukum
                    <span class="uk-text-warning">PT. HUMMA TEKNOLOGI INDONESIA</span> dan telah disahkan oleh KEMENKUMHAM Republik Indonesia Nomor AHU-0057079.AH.01.01.
                </p>
                <p>
                    Hummatech melayani jasa pengembangan perangkat lunak, baik berbasis desktop, web, dan mobile apps. Mitra kami meliputi perorangan, swasta, bahkan juga lembaga pemerintahan.
                </p>
                <p>
                    Kini Hummatech bertransformasi menjadi perusahaan yang mampu menjawab tantangan di era revolusi industri 4.0 dengan menciptakan produk berbasis integrated system berupa perangkat lunak berbasis web dan mobile, Internet of Things (IoT), Artificial Intelligence (AI), Game, dan Augmented Reality.
                </p>
                <p>
                    Hummatech juga telah melebarkan sayapnya, tidak hanya dikenal di Indonesia, tetapi juga dipercaya oleh mitra dari luar negeri, yaitu Belanda dalam mengembangan software dan integrated system.
                </p>
                <a href="#" class="uk-button uk-button-primary uk-border-rounded">Lihat Profil Lengkap
                    <i class="fas fa-arrow-circle-right uk-margin-small-left"></i>
                </a>
            </div>
            <div class="uk-width-2-5@m uk-grid-margin uk-first-column">
                <img src="{{ asset('assets/images/Logo_HUMMATECH_Icon.ico') }}"  style="width:400px;" alt="">
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
