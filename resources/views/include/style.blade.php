{{-- css --}}

<link rel="stylesheet" href="{{ asset('template/assets/css/main/app.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/css/main/app-dark.css') }}">
<link rel="shortcut icon" href="{{ asset('template/assets/images/logo/favicon.svg') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('template/assets/images/logo/favicon.png') }}" type="image/png">

<link rel="stylesheet" href="{{ asset('template/assets/css/shared/iconly.css') }}">

{{-- css login --}}

<link rel="stylesheet" href="{{ asset('template/assets/css/pages/auth.css') }}">

<style>
    /* Mode Malam */
    body.dark-mode {
        background-color: #121212;
        color: #ffffff;
    }

    body.dark-mode .card {
        background-color: #1e1e2d;
        color: #ffffff;
    }

    body.dark-mode .text-muted {
        color: #b3b3b3 !important;
    }

    /* Pastikan semua teks dalam card berubah warna */
    body.dark-mode .card-body h6 {
        color: #ffffff;
    }
</style>
