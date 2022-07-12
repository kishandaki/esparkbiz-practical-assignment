@extends('layouts.layout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <h3>Reset Password</h3>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="pt-3" id="form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <p>Email Address</p>
                            <input id="email" type="email" class="form-control form-control-lg " name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                {{ __('Send Password Reset Link') }}
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

    <script src="{{ URL::asset('js/jquery.validate.min.js') }}" ></script>
    <!--  jquery validation -->
    <script type="text/javascript">
        $(document).ready(function ()
        {
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
                rules: {
                    email: {
                        required: true,
                        email:email,
                        regex:emailpattern,
                    }
                },
                messages: {
                    email: {
                        required: "Please enter email",
                        email:"Please enter valid email ",
                        regex:"Please enter valid email address"
                    }
                },
                submitHandler: function (form)
                {
                    form.submit();
                }
            });


        });
    </script>

@endsection
