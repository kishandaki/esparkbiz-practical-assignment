@extends('layouts.adminLayout')

@section('title')
    {{ empty($user) ? 'Create' : 'Edit' }} User
@endsection

@section('content')
    <nav aria-label="breadcrumb" style="margin-top: 15px; margin-left: 13px; margin-bottom: -30px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page"> {{ empty($user) ? 'Create' : 'Edit' }} User </li>
        </ol>
    </nav>
    <div class="content-wrapper">
        <div class="col-12 mt-2 m2-2">
            @include('common.flash')
        </div>
        <div class="row mt-2">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if (empty($user))
                            <form class="form" name="from" id="from" method="post" enctype="multipart/form-data"
                                action="{{ route('admin.users.store') }}">
                            @else
                                <form class="form" name="from" id="from" method="post"
                                    enctype="multipart/form-data"
                                    action="{{ route('admin.users.update', ['user' => $user->id]) }}">
                                    @method('PUT')
                        @endif

                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $user ? $user->id : '' }}" id="id">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $user != null ? $user->name : '' }}" required autocomplete="name"
                                            autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $user != null ? $user->email : '' }}" required
                                            autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="" autocomplete="password" autofocus>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" id="status1"
                                                    value="1" checked>
                                                Active
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" id="status2"
                                                    value="0">
                                                Inactive
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-light">Cancel</a>

                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('common.forms')
    </div>
@endsection


@section('js')
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //override required method
            $.validator.methods.required = function(value, element, param) {
                return (value == undefined) ? false : (value.trim() != '');
            }

            var emailpattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            $.validator.addMethod(
                "regex",
                function(value, element, regexp) {
                    var re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                },
                "Please check your input."
            );

            $(".form").validate({
                ignore: [],
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        regex: emailpattern,
                        maxlength: 150,
                    },
                    password: {
                        required: isRequired(),
                    }
                },
                messages: {
                    name: {
                        required: 'Please enter name',
                    },
                    email: {
                        required: "Please enter email",
                        regex: "Please enter valid email address",
                        maxlength: "Email must be less than {0} characters",
                    },
                    image: {
                        required: 'Please select image',
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                },
                invalidHandler: function(form, validator) {}
            });
        });

        function isRequired() {
            var is_required = "{{ $user != null ? 1 : 0 }}";
            return (is_required) ? false : true;
        }
    </script>
@endsection
