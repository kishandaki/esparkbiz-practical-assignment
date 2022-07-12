<!DOCTYPE html>
<html lang="en">

<head>
    @include('common.users.head')
</head>

<body>
    <div class="container-scroller">

        @include('common.users.sidebar')

        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">

                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="footer-wrap">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <p>&copy; {{ date('Y') . ' ' . config('app.name') }}</p>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('common.users.footer')
</body>

</html>
