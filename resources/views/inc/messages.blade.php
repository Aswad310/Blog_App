@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

{{--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
{{--@if(Session::has('alert.config'))--}}
{{--    <script>--}}
{{--        swal.fire({!! Session::pull('alert.config') !!});--}}
{{--    </script>--}}
{{--@endif--}}

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
