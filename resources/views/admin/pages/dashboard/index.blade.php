@extends('admin.layouts.app')

@section('subcontent')
    <div class="page-title">
        <div class="row">
            <div class="d-flex justify-content-between">
                <h3>Dashboard </h3>
                <a href="/" target="_blank" class="btn btn-primary btn-sm px-4">Lihat Website</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-4 col-xl-100 box-col-12 ps-4 pe-4">
            <div class="row">
                <div class="">
                    <div class="row bg-light h-100 p-3 pt-4 pb-4">
                        <div class="col-12 col-xl-50 box-col-6">
                            <div class="card welcome-card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h1>Hello, {{ auth()->user()->name }}</h1>
                                            <p>Selamat datang Ayo menuju perubahan.</p>
                                            {{-- <a class="btn"
                                                href="user-profile.html">View Profile</a> --}}
                                        </div>
                                        <div class="flex-shrink-0"> <img src="../assets/images/dashboard/welcome.png"
                                                alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-8 col-xl-50 col-sm-6 proorder-xl-3">
            <div class="row">
                <div class="col-xxl-6 col-xl-50 col-sm-6 proorder-xl-3">
                    <div class="card since">
                        <div class="card-body money">
                            <div class="customer-card d-flex b-l-secondary border-2">
                                <div class="ms-3">
                                    <h3 class="mt-1">Total Layanan</h3>
                                    <h5 class="mt-1">{{ $services }} Layanan</h5>
                                </div>
                                <div class="dashboard-user bg-light-secondary"><span></span>
                                    <svg>
                                        <use href="https://admin.pixelstrap.net/dunzo/assets/svg/icon-sprite.svg#money">
                                        </use>
                                    </svg>
                                </div>
                            </div>
                            <div class="customer mt-2"><span class="me-1">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-50 col-sm-6 proorder-xl-3">
                    <div class="card since">
                        <div class="card-body invoice-profit">
                            <div class="customer-card d-flex b-l-success border-2">
                                <div class="ms-3">
                                    <h3 class="mt-1">Total Mitra</h3>
                                    <h5 class="mt-1">{{ $mitras }} Mitra</h5>
                                </div>
                                <div class="dashboard-user bg-light-success"><span></span>
                                    <svg>
                                        <use href="https://admin.pixelstrap.net/dunzo/assets/svg/icon-sprite.svg#invoice">
                                        </use>
                                    </svg>
                                </div>
                            </div>
                            <div class="customer mt-2"><span class="me-1">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-50 col-sm-6 proorder-xl-4">
                    <div class="card since">
                        <div class="card-body profit">
                            <div class="customer-card d-flex b-l-danger border-2">
                                <div class="ms-3">
                                    <h3 class="mt-1">Total Produk</h3>
                                    <h5 class="mt-1">{{ $products }} Produk</h5>
                                </div>
                                <div class="dashboard-user bg-light-danger"><span></span>
                                    <svg>
                                        <use href="https://admin.pixelstrap.net/dunzo/assets/svg/icon-sprite.svg#profile">
                                        </use>
                                    </svg>
                                </div>
                            </div>
                            <div class="customer mt-2"><span class="me-1">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-50 col-sm-6 proorder-xl-2">
                    <div class="card since">
                        <div class="card-body">
                            <div class="customer-card d-flex b-l-primary border-2">
                                <div class="ms-3">
                                    <h3 class="mt-1">Total Berita</h3>
                                    <h5 class="mt-1">{{ $newss }} Berita</h5>
                                </div>
                                <div class="dashboard-user bg-light-primary"><span></span>
                                    <svg>
                                        <use href="https://admin.pixelstrap.net/dunzo/assets/svg/icon-sprite.svg#male">
                                        </use>
                                    </svg>
                                </div>
                            </div>
                            <div class="customer mt-2"><span class="me-1">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="header-top">
                        <h3>Data Pengunjung</h3>
                        <div class="card-header-right-icon">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" id="dropdownMenuButton" type="button"
                                    data-bs-toggle="dropdown">{{ Carbon\Carbon::now()->format('Y') }}</button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"><a
                                        class="dropdown-item" href="#">Yesterday</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container progress-chart">
                        <div id="sales-overview-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="header-top">
                        <h3>Data Unique Visitor</h3>
                        <div class="card-header-right-icon">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" id="dropdownMenuButton" type="button"
                                    data-bs-toggle="dropdown">{{ Carbon\Carbon::now()->format('Y') }}</button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"><a
                                        class="dropdown-item" href="#">Yesterday</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container progress-chart">
                        <div id="sales-overview-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        (function($) {
            var ChartData = @json($chartUnique);
            var options = {
                series: [{
                    name: 'Jumlah Pengunjung',
                    type: 'area',
                    data: ChartData.map(data => parseInt(data.visitor))
                },],
                chart: {
                    height: 320,
                    type: 'line',
                    stacked: false,
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: false,
                    },
                },
                stroke: {
                    curve: 'smooth',
                    width: [3, 3],
                    dashArray: [0, 4]

                },
                grid: {
                    show: true,
                    strokeDashArray: 0,
                    position: 'back',
                    xaxis: {
                        lines: {
                            show: true,
                        },
                    },
                    yaxis: {
                        lines: {
                            show: false,
                        },
                    },
                },
                labels: ChartData.map(data => data.month),
                colors: [dunzoAdminConfig.primary],
                fill: {
                    type: ['gradient', 'solid', 'gradient'],
                    gradient: {
                        shade: 'light',
                        type: "vertical",
                        shadeIntensity: 1,
                        gradientToColors: [dunzoAdminConfig.primary, '#fff5f7', dunzoAdminConfig.primary],
                        inverseColors: true,
                        opacityFrom: 0.4,
                        opacityTo: 0,
                        stops: [0, 100, 100, 100],
                    }
                },

                xaxis: {
                    labels: {
                        style: {
                            fontFamily: 'Outfit, sans-serif',
                            fontWeight: 500,
                            colors: '#8D8D8D',
                        },
                    },
                    axisBorder: {
                        show: false
                    },
                },
                yaxis: {
                    labels: {
                        show: false
                    },
                },
                responsive: [{
                    breakpoint: 1440,
                    options: {
                        chart: {
                            height: 220
                        },
                    },
                }, ]
            };
            var chart = new ApexCharts(document.querySelector("#sales-overview-2"), options);
            chart.render();
        })(jQuery);


    </script>
    <script>
        (function($) {
            var ChartData = @json($chartVisitor);
            var options = {
                series: [{
                    name: 'Jumlah Pengunjung',
                    type: 'area',
                    data: ChartData.map(data => parseInt(data.visitor))
                },],
                chart: {
                    height: 320,
                    type: 'line',
                    stacked: false,
                    toolbar: {
                        show: false,
                    },
                    zoom: {
                        enabled: false,
                    },
                },
                stroke: {
                    curve: 'smooth',
                    width: [3, 3],
                    dashArray: [0, 4]

                },
                grid: {
                    show: true,
                    strokeDashArray: 0,
                    position: 'back',
                    xaxis: {
                        lines: {
                            show: true,
                        },
                    },
                    yaxis: {
                        lines: {
                            show: false,
                        },
                    },
                },
                labels: ChartData.map(data => data.month),
                colors: [dunzoAdminConfig.primary],
                fill: {
                    type: ['gradient', 'solid', 'gradient'],
                    gradient: {
                        shade: 'light',
                        type: "vertical",
                        shadeIntensity: 1,
                        gradientToColors: [dunzoAdminConfig.primary, '#fff5f7', dunzoAdminConfig.primary],
                        inverseColors: true,
                        opacityFrom: 0.4,
                        opacityTo: 0,
                        stops: [0, 100, 100, 100],
                    }
                },

                xaxis: {
                    labels: {
                        style: {
                            fontFamily: 'Outfit, sans-serif',
                            fontWeight: 500,
                            colors: '#8D8D8D',
                        },
                    },
                    axisBorder: {
                        show: false
                    },
                },
                yaxis: {
                    labels: {
                        show: false
                    },
                },
                responsive: [{
                    breakpoint: 1440,
                    options: {
                        chart: {
                            height: 220
                        },
                    },
                }, ]
            };
            var chart = new ApexCharts(document.querySelector("#sales-overview-1"), options);
            chart.render();
        })(jQuery);


    </script>

    {{-- <script>
        (function($) {
            var ChartData = @json($chart);
            var options = {
                series: [{
                    name: 'Total visitors',
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 70, 60, 54]
                }, {
                    name: 'Unique visitors',
                    data: ChartData.map(data => parseInt(data.visitor))
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                labels: ChartData.map(data => data.month),
                fill: {
                    type: ['gradient', 'solid', 'gradient'],
                    gradient: {
                        shade: 'light',
                        type: "vertical",
                        shadeIntensity: 1,
                        gradientToColors: [dunzoAdminConfig.primary, '#fff5f7', dunzoAdminConfig.primary],
                        inverseColors: true,
                        opacityFrom: 0.4,
                        opacityTo: 0,
                        stops: [0, 100, 100, 100],
                    }
                },

                xaxis: {
                    labels: {
                        style: {
                            fontFamily: 'Outfit, sans-serif',
                            fontWeight: 500,
                            colors: '#8D8D8D',
                        },
                    },
                    axisBorder: {
                        show: false
                    },
                },
                yaxis: {
                    title: {
                        text: 'Hummatech'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " pengunjung"
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#sales-overview-2"), options);
            chart.render();
        })(jQuery);
    </script> --}}
@endsection
