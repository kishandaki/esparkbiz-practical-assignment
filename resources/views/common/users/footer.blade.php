<script src="{{ URL::asset('assets/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ URL::asset('assets/js/template.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/justgage/raphael-2.1.4.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendors/justgage/justgage.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/dashboard.js') }}"></script>
<script src="{{ url('sweetalert/sweetalert.min.js') }}"></script>

<script>
    // For update status
    $(document).on("click", '.btnChangeStatus', function(event) {

        event.preventDefault();
        var url = $(this).data('url');

        swal({
            title: "Are you sure?",
            text: "",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Change it!",
        }).then(function(result) {
            if (result.value) {
                form = $('#changeStatusForm');
                form.attr('action', url);
                form.submit();
            }
        });
    });

    $(document).on("click", '.btnDelete', function(event) {

        event.preventDefault();
        var title = $(this).data('title');
        var url = $(this).data('url');
        var form = '';
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this " + title,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
        }).then(function(result) {
            if (result.value) {
                form = $('#deleteForm');
                form.attr('action', url);
                form.submit();
            }
        });
    });

    // for alert message disppper after 4 sec
    $(document).ready(function() {
        setTimeout(function() {
            $('.alertdisapper').fadeOut();
        }, 4000);
    });
</script>

@yield('js')
