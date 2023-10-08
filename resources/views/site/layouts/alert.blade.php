@if (session('success'))
    @push('js')
        <script>
            swal({
                position: 'center',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endpush
@elseif(session('error'))
    @push('js')
        <script>
            swal({
                position: 'center',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endpush
@endif
@if ($errors->any())
    @push('js')
        <script>
            swal({
                position: 'center',
                icon: 'error',

                @foreach ($errors->all() as $error)
                    text: '{!! $error !!}',
                @endforeach
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endpush
@endif
