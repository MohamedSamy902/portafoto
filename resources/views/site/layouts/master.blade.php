<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @includeIf('site.layouts.css')
</head>

<body>


    <div class="overlay" data-overlay></div>


    @include('site.layouts.alert')
    <!-- - HEADER -->
    @includeIf('site.layouts.header')


    <!-- - MAIN -->
   @yield('content')




    <!-- - FOOTER -->

    <footer>


        <div class="footer-bottom">

            <div class="container">

                <p class="copyright">
                    Copyright &copy; <a href="#">Portafoto</a> all rights reserved.
                </p>

            </div>

        </div>

    </footer>


    @includeIf('site.layouts.js')



</body>

</html>
