<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default attr-bg navbar-fixed white no-background bootsnav">

        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container">

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="side-menu">
                        <a href="#">
                            <span class="bar-1"></span>
                            <span class="bar-2"></span>
                            <span class="bar-3"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header h-100">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand h-100" href="/">
                    <img src="{{ asset('assets/images/LOGO-HUMMATECH_Putih.png') }}"
                        style="width: 200px;height: auto !important" class="logo logo-display" alt="Logo">
                    <img src="{{ asset('assets/images/LOGO-HUMMATECH_Hitam.png') }}"
                        style="width: 200px;height: auto !important" class="logo logo-scrolled" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-center" data-in="#" data-out="#">
                    <li class="active">
                        <a href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tentang</a>
                        <ul class="dropdown-menu">
                            <li class="">
                                <a href="/about/profile">Profil</a>
                            </li>
                            <li class="">
                                <a href="/about/vision-mision">visi & misi</a>
                            </li>
                            <li class="">
                                <a href="/about/organizational-structure">struktur organisasi</a>
                            </li>
                            <li class="">
                                <a href="/about/company-structure">struktur perusahaan</a>
                            </li>
                            <li class="">
                                <a href="/about/logo">logo</a>
                            </li>
                            <li class="">
                                <a href="/about/team">tim</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Layanan</a>
                        <ul class="dropdown-menu">
                            @forelse ($services as $service)
                            <li class="{{ request()->is('/services/' . $service->slug) ? 'active' : '' }}">
                                <a href="/services/{{ $service->slug }}">{{ $service->name }}</a>
                            </li>
                            @empty
                                <li><a href="javascript:void(0)">Layanan Masih Kosong</a></li>
                            @endforelse
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Portofolio</a>
                        <ul class="dropdown-menu">
                            <li class="{{ request()->is('/product') ? 'active' : '' }}">
                                <a href="{{ url('/product') }}">Produk</a>
                            </li>
                            <li class="{{ request()->is('/portfolio') ? 'active' : '' }}">
                                <a href="{{ url('/portfolio') }}">Portofolio</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('/news') ? 'active' : '' }}">
                        <a href="/news">Berita</a>
                    </li>
                    <li class="{{ request()->is('/contact') ? 'active' : '' }}">
                        <a href="/contact">Hubungi</a>
                    </li>
                    <li class="{{ request()->is('/job-vacancy') ? 'active' : '' }}">
                        <a href="/job-vacancy">Lowongan</a>

                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

        <!-- Start Side Menu -->
        <div class="side" >
            <a href="#" class="close-side"><i class="icon_close"></i></a>
            <div class="widget">
                <img src="{{ asset('assets/images/LOGO-HUMMATECH_Hitam.png') }}"
                    style="width: 200px;height: auto !important" alt="Logo">
                <p>
                    Melayani jasa pengembanganperangkat lunak, baik berbasis desktop, web, dan mobile apps. Mitra kami
                    meliputi perorangan, swasta, bahkan juga lembaga pemerintahan.
                </p>
            </div>


            <div class="portofolio">
                <h4><b>Produk Terbaru</b></h4>
                <div class="gallery-area overflow-hidden pt-3">
                    <div class="container">
                        <div class="case-items-area">
                            <div class="masonary">
                                @if ($products->isEmpty())

                                <div class="mx-auto d-flex flex-column justify-content-center text-center">
                                    <img src="{{ asset('nodata-gif-post.gif') }}" alt="No Data" height="200" class="mx-auto" width="200" />
                                    <p class="text-muted">Belum ada produk</p>
                                </div>
                                @endif
                                <div id="portfolio-grid" class="gallery-items colums-2">
                                    <!-- Single Item -->
                                    @forelse ($products->take(4) as $product)

                                    <div class="pf-item">
                                        <div class="item">
                                            <div class="">
                                                <img src="{{ asset('storage/' . $product->image) }}" width="300px" height="160px" class="object-fit-cover" alt="Thumb">
                                            </div>
                                            <div class="content">
                                                <div class="info">
                                                    <h4 class="text-white" style="font-size: 18px" ><a href="{{ route('detail.product', $product->slug) }}">{{ $product->name }}</a></h4>
                                                    <span class="text-break">{{ Str::limit($product->description, 20, '...') }}</span>
                                                </div>
                                                <div class="button">
                                                    <a href="{{ asset('storage/' . $product->image) }}" class="item popup-gallery">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @empty

                                    @endforelse
                                    <!-- End Single Item -->
                                </div>
                                <div class="d-flex justify-content-center pt-5">
                                    @if(count($products) > 0)
                                    <a class="text-primary" href="/portfolio">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                            d="M16.15 13H5q-.425 0-.712-.288T4 12q0-.425.288-.712T5 11h11.15L13.3 8.15q-.3-.3-.288-.7t.288-.7q.3-.3.713-.312t.712.287L19.3 11.3q.15.15.213.325t.062.375q0 .2-.062.375t-.213.325l-4.575 4.575q-.3.3-.712.288t-.713-.313q-.275-.3-.288-.7t.288-.7z" />
                                        </svg> Lihat Selengkapnya
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Side Menu -->

    </nav>
    <!-- End Navigation -->

</header>
