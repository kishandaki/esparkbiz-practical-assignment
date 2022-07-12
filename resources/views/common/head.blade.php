<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') | Admin {{ config('app.name') }}</title>
<!-- Custom styles -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="{{ url('sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">



<!-- Required meta tags -->


<!-- base:css -->
<link rel="stylesheet" href="{{ URL::asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/vendors/base/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
<!-- endinject -->
<style>
    .error{
        color: rgb(206, 22, 22);
    }

    #rows_wrapper, .row{
        margin-top: 10px;
    }
</style>
@yield('css')
