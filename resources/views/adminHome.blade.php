@extends('layouts.adminLayout')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-sm-8 flex-column d-flex stretch-card">
                <div class="row">
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card sale-diffrence-border">
                            <div class="card-body">
                                <a href="{{ route('admin.users.index') }}">
                                    <h2 class="text-dark mb-2 font-weight-bold">{{ $users }}</h2>
                                    <h4 class="card-title mb-2">No. User Applications</h4>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
