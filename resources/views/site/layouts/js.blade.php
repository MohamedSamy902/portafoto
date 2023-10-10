<!-- - custom js link -->
<script src="{{ asset('site') }}/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('site') }}/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('site') }}/assets/js/script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--  - ionicon link -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     window.lazySizes.init();
    // });
</script>
@stack('js')
