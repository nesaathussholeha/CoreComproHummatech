@extends('landing.layouts.layouts.app')
@section('header')

    <div class="uk-section uk-padding-remove-vertical in-equity-breadcrumb">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <ul class="" style="padding-top: 13px;padding-bottom: 16px;color:white">
                        <li ><a href="#" style="color: white">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb content end -->
@endsection
@section('content')
<div class="uk-section in-content-3">
    <div class="uk-container">
        <div class="uk-grid uk-flex uk-flex-center">
            <div class="uk-width-1-1">
                <h4 class="uk-text-center "> <span class="in-highlight">Struktur Organisasi</span></h4>
                <h2 class="uk-text-center">
                    Fondasi Keberhasilan dan Kolaborasi di Tempat Kerja
                </h2>
                <div class="uk-flex uk-flex-center">
                    <img src="{{ asset('assets_landing/img/structure_organisasi.png') }}" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
