<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>@yield('title')</title> --}}
    @includeIf('site.layouts.css')
    {!! SEO::generate() !!}
</head>

<body>
    <div class="messanger">
        <a href="{{ $setting->messenger }}" target="_blank">
            <div class="ii">
                <img src="https://img.icons8.com/3d-fluency/94/facebook-messenger.png" alt="facebook-messenger" />
            </div>
        </a>
    </div>

    <div class="overlay" data-overlay></div>


    @include('site.layouts.alert')
    <!-- - HEADER -->
    @includeIf('site.layouts.header')


    <!-- - MAIN -->
    @yield('content')




    <!-- - FOOTER -->

    {{-- <footer>


        <div class="footer-bottom">

            <div class="container">

                <p class="copyright">
                    Copyright &copy; <a href="#">Portafoto</a> all rights reserved.
                </p>

            </div>

        </div>

    </footer> --}}

    <footer>

        <div class="container pt-3 text-sm-center text-lg-left">

            <div class="row position-relative">

                <div class="col-sm-12 col-lg-4">
                    <a href="#" class="footer-logo">
                        <!-- <img src="./assets/images/logo/logo.jpg" alt="Anon's logo" width="120" height="36"> -->
                        {{-- <img src="{{ asset('site/assets/images/logo/logo-removebg-previe.png') }}" alt="Anon's logo" width="120" height="36"> --}}
                        Portafoto
                    </a>
                    <p class="text-white-50 author justify-content-sm-center justify-content-lg-start pt-3">Created By
                        <a href="https://karimosama99.github.io/GoldenCode/" target="_blank"><span>CyBoRg</span></a>
                    </p>
                </div>
                <div class="col-sm-12 col-lg-4">
                    {{-- <a href="#" class="footer-logo">
                        <!-- <img src="./assets/images/logo/logo.jpg" alt="Anon's logo" width="120" height="36"> -->
                        Social Links --}}
                    {{-- </a> --}}
                    <div class="rounded-social-buttons">
                        <a class="social-button facebook" href="{{ $setting->facebook }}" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        {{-- <a class="social-button twitter" href="{{ $setting->twitter }}" target="_blank"><i
                                class="fab fa-twitter"></i></a> --}}
                        <a class="social-button instagram" href="{{ $setting->instagram }}" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    @if ($setting->mobile_1)
                        <p class="telephone"><i class="fa-solid fa-mobile-screen"></i> <span>
                                {{ $setting->mobile_1 }}</span></p>
                    @endif
                    @if ($setting->mobile_2)
                        <p class="telephone"><i class="fa-solid fa-mobile-screen"></i> <span>
                                {{ $setting->mobile_2 }}</span></p>
                    @endif

                </div>
                <p class="copyright pb-sm-3 pb-md-0 text-center">2023-2024 All Rights&copy; Reserved</p>
            </div>

        </div>

    </footer>


    @includeIf('site.layouts.js')



</body>

</html>
