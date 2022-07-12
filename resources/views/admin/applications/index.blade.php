@extends('layouts.adminLayout')
@section('css')
    <link href="{{ URL::asset('js/datatables/media/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('title')
    Applications
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-10">

            <nav aria-label="breadcrumb" style="margin-top: 15px; margin-left: 13px; margin-bottom: -30px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Applications </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="col-12 mt-2 m2-2">
            @include('common.flash')
        </div>
        <div class="row mt-2">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive m-t-40">
                            <table id="rows" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Apply On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('common.forms')
    </div>
@endsection

@section('js')
    <script src="{{ url('js/datatables/datatables.min.js') }}"></script>
    <script src="{{ url('js/jquery.raty.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            table = $('#rows').DataTable({
                processing: true,
                serverSide: true,
                "ajax": {
                    'url': '{{ url(route('admin.applications.search')) }}',
                    'type': "POST",
                    'async': false,
                },
                columns: [{
                        data: 'sr_no',
                        name: 'sr_no',
                        orderable: false
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },

                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'mobile_no',
                        name: 'mobile_no',
                        orderable: false
                    },
                     {
                        data: 'created_at',
                        name: 'created_at',
                        orderable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                "aaSorting": [
                    [5, 'desc']
                ],
            });
        });

        var url = $('meta[name="baseUrl"]').attr('content');

        //For delete
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
    </script>
@endsection
