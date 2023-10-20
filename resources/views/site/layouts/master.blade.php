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
                    <p class="text-white-50 author justify-content-sm-center justify-content-lg-start pt-3">{{ __('site.Created By') }}
                        <a href="https://wa.me/+201065160109" target="_blank"><span>Golden Code</span></a>
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
                        <a class="social-button instagram" href="{{ $setting->instagram }}" target="_blank"><img alt="svgImg" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCI+CjxyYWRpYWxHcmFkaWVudCBpZD0ieU9ybm5obGlDcmRTMmd5fjR0RDhtYV9YeTEwSmN1MUwyU3VfZ3IxIiBjeD0iMTkuMzgiIGN5PSI0Mi4wMzUiIHI9IjQ0Ljg5OSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2ZkNSI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjMyOCIgc3RvcC1jb2xvcj0iI2ZmNTQzZiI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjM0OCIgc3RvcC1jb2xvcj0iI2ZjNTI0NSI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjUwNCIgc3RvcC1jb2xvcj0iI2U2NDc3MSI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjY0MyIgc3RvcC1jb2xvcj0iI2Q1M2U5MSI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjc2MSIgc3RvcC1jb2xvcj0iI2NjMzlhNCI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjg0MSIgc3RvcC1jb2xvcj0iI2M4MzdhYiI+PC9zdG9wPjwvcmFkaWFsR3JhZGllbnQ+PHBhdGggZmlsbD0idXJsKCN5T3JubmhsaUNyZFMyZ3l+NHREOG1hX1h5MTBKY3UxTDJTdV9ncjEpIiBkPSJNMzQuMDE3LDQxLjk5bC0yMCwwLjAxOWMtNC40LDAuMDA0LTguMDAzLTMuNTkyLTguMDA4LTcuOTkybC0wLjAxOS0yMAljLTAuMDA0LTQuNCwzLjU5Mi04LjAwMyw3Ljk5Mi04LjAwOGwyMC0wLjAxOWM0LjQtMC4wMDQsOC4wMDMsMy41OTIsOC4wMDgsNy45OTJsMC4wMTksMjAJQzQyLjAxNCwzOC4zODMsMzguNDE3LDQxLjk4NiwzNC4wMTcsNDEuOTl6Ij48L3BhdGg+PHJhZGlhbEdyYWRpZW50IGlkPSJ5T3JubmhsaUNyZFMyZ3l+NHREOG1iX1h5MTBKY3UxTDJTdV9ncjIiIGN4PSIxMS43ODYiIGN5PSI1LjU0IiByPSIyOS44MTMiIGdyYWRpZW50VHJhbnNmb3JtPSJtYXRyaXgoMSAwIDAgLjY2NjMgMCAxLjg0OSkiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiM0MTY4YzkiPjwvc3RvcD48c3RvcCBvZmZzZXQ9Ii45OTkiIHN0b3AtY29sb3I9IiM0MTY4YzkiIHN0b3Atb3BhY2l0eT0iMCI+PC9zdG9wPjwvcmFkaWFsR3JhZGllbnQ+PHBhdGggZmlsbD0idXJsKCN5T3JubmhsaUNyZFMyZ3l+NHREOG1iX1h5MTBKY3UxTDJTdV9ncjIpIiBkPSJNMzQuMDE3LDQxLjk5bC0yMCwwLjAxOWMtNC40LDAuMDA0LTguMDAzLTMuNTkyLTguMDA4LTcuOTkybC0wLjAxOS0yMAljLTAuMDA0LTQuNCwzLjU5Mi04LjAwMyw3Ljk5Mi04LjAwOGwyMC0wLjAxOWM0LjQtMC4wMDQsOC4wMDMsMy41OTIsOC4wMDgsNy45OTJsMC4wMTksMjAJQzQyLjAxNCwzOC4zODMsMzguNDE3LDQxLjk4NiwzNC4wMTcsNDEuOTl6Ij48L3BhdGg+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTI0LDMxYy0zLjg1OSwwLTctMy4xNC03LTdzMy4xNDEtNyw3LTdzNywzLjE0LDcsN1MyNy44NTksMzEsMjQsMzF6IE0yNCwxOWMtMi43NTcsMC01LDIuMjQzLTUsNQlzMi4yNDMsNSw1LDVzNS0yLjI0Myw1LTVTMjYuNzU3LDE5LDI0LDE5eiI+PC9wYXRoPjxjaXJjbGUgY3g9IjMxLjUiIGN5PSIxNi41IiByPSIxLjUiIGZpbGw9IiNmZmYiPjwvY2lyY2xlPjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik0zMCwzN0gxOGMtMy44NTksMC03LTMuMTQtNy03VjE4YzAtMy44NiwzLjE0MS03LDctN2gxMmMzLjg1OSwwLDcsMy4xNCw3LDd2MTIJQzM3LDMzLjg2LDMzLjg1OSwzNywzMCwzN3ogTTE4LDEzYy0yLjc1NywwLTUsMi4yNDMtNSw1djEyYzAsMi43NTcsMi4yNDMsNSw1LDVoMTJjMi43NTcsMCw1LTIuMjQzLDUtNVYxOGMwLTIuNzU3LTIuMjQzLTUtNS01SDE4eiI+PC9wYXRoPgo8L3N2Zz4="/></a>
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
