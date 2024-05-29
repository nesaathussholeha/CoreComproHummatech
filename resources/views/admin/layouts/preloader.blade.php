<div class="preloader">
    <img src="{{ asset('companyloader.png') }}" style="width:80px;" alt="loader" class="lds-ripple img-fluid" />
</div>
<!-- Preloader -->
<div class="preloader">
    <img src="{{ asset('companyloader.png') }}" style="width:80px;" alt="loader" class="lds-ripple img-fluid" />
</div>
<style>
    .preloader {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #fff;
    }

    .preloader img {
        animation: rotate 2s linear infinite;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
