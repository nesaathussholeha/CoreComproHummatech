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
<div class="uk-section in-equity-9">
    <div class="uk-container uk-margin-medium-top uk-margin-bottom">
        <h4 class="uk-text-center "> <span class="in-highlight">Visi Misi</span></h4>
        <h2 class="uk-text-center">
            Mewujudkan Visi Kami Melalui Misi yang Berkelanjutan dan Tindakan Nyata
        </h2>
        <div class="uk-grid-medium uk-child-width-1-2@m" data-uk-grid>
            <div>
                <div class="uk-card uk-card-primary uk-card-body uk-border-rounded uk-box-shadow-large uk-background-contain uk-background-center-right" data-src="assets_landing/img/in-equity-9-bg-1.png" data-uk-img>
                    <div class="uk-flex uk-flex-middle">
                        <div class="uk-margin-right">
                            <i class="fas fa-landmark fa-2x"></i>
                        </div>
                        <div>
                            <h4 class="uk-margin-remove">Visi</h4>
                        </div>
                    </div>
                    <p class="uk-margin-top uk-width-3-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-primary uk-card-body uk-border-rounded uk-box-shadow-large uk-background-contain uk-background-center-right" data-src="assets_landing/img/in-equity-9-bg-2.png" data-uk-img>
                    <div class="uk-flex uk-flex-middle">
                        <div class="uk-margin-right">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div>
                            <h4 class="uk-margin-remove">Misi</h4>
                        </div>
                    </div>
                    <p class="uk-margin-top uk-width-3-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
