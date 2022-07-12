@extends('layouts.userLayout')

@section('title') Sign In @endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <h3>Sign In</h3>
                    <form class="pt-3" id="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <p>Email Address</p>
                            <input id="email" type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p>Password</p>
                            <input id="password" type="password" class="form-control form-control-lg" name="password" autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">

                            @if (Route::has('password.request'))
                                <a class="auth-link text-black" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                {{ __('Login') }}
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

            $("#form").validate({
                ignore: [],
                rules: {
                    email: {
                        required: true,

                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    email: {
                        required: "Email is required",
                        regex:"Please provide valid email address",
                        maxlength:"Email may not be greater than {0} characters.",
                    },
                    password: {
                        required: "Password is required",
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                },
                invalidHandler: function(form, validator) {}
            });
        });
    </script>
@endsection
