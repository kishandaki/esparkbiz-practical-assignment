@extends('layouts.layout')

@section('content')


<div class="main-panel">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <h3>Reset Password</h3>
                    <form class="pt-3 form" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <p>Email Address</p>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p>Password</p>
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="password" autofocus>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p>Confirm Password</p>
                            <input id="password_confirmation" type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password') }}">

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                {{ __('Reset Password') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>

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
                    email: {
                        required: true,
                        regex:emailpattern,
                        maxlength:150,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength:16,
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    email: {
                        required: "Email is required",
                        regex:"Please provide valid email address",
                        maxlength:"Email may not be greater than {0} characters.",
                    },
                    password: {
                        required: "New Password is required",
                        minlength: "Password must be at least {0} alphanumeric characters.",
                        maxlength:"Password may not be greater than {0} alphanumeric characters.",
                    },
                    password_confirmation: {
                        required: "Confirm password is required",
                        equalTo: "Confirm password must be same as password"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                },
                invalidHandler: function(form, validator) {}
            });
        });
    </script>
@endsection
