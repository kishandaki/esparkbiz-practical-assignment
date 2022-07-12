@extends('layouts.userLayout')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="card congratulation-bg text-center">
                <div class="card-body pb-0">
                    <h2 class="mt-3 text-white mb-3 font-weight-bold">
                        Wel Come <br><br>{{auth()->user()->name}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
