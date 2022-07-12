@extends('layouts.userLayout')

@section('title')
    Form Apply
@endsection

@section('css')
    <link href="{{ url('js/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('js/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="col-12 mt-2 m2-2">
            @include('common.flash')
        </div>
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form class="form" name="from" id="from" method="post" enctype="multipart/form-data"
                        action="{{ route('save.form') }}">
                        {{ csrf_field() }}
                        <p class="card-description">
                            Basic Details
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="first_name" id="first_name">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="last_name" id="last_name">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="email" id="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Mobile No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="mobile_no" id="mobile_no">
                                        @error('mobile_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Designation</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="designation" id="designation">
                                        @error('designation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row col-sm-12">
                                    <label class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" id="gender1"
                                                    value="1" checked>
                                                Male
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" id="gender2"
                                                    value="0">
                                                Female
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                                    <div class="col-sm-9">
                                        <input class="form-control date" placeholder="dd/mm/yyyy" name="date_of_birth"
                                            id="date_of_birth">
                                        @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address 1</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="address1" id="address1">
                                        @error('address1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address 2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="address2" id="address2">
                                        @error('address2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="city" id="city">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="state" id="state">
                                            <option value="">Select State Name</option>
                                            <option value="America">America</option>
                                            <option value="Italy">Italy</option>
                                            <option value="India">India</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Britain">Britain</option>

                                            "AN":"Andaman and Nicobar Islands",
                                            <option value="Andhra Pradesh"> Andhra Pradesh </option>
                                            <option value="Arunachal Pradesh"> Arunachal Pradesh </option>
                                            <option value="Assam"> Assam </option>
                                            <option value="Bihar"> Bihar </option>
                                            <option value="Chandigarh"> Chandigarh </option>
                                            <option value="Chhattisgarh"> Chhattisgarh </option>
                                            <option value="Dadra and Nagar Haveli"> Dadra and Nagar Haveli </option>
                                            <option value="Daman and Diu"> Daman and Diu </option>
                                            <option value="Delhi"> Delhi </option>
                                            <option value="Goa"> Goa </option>
                                            <option value="Gujarat" selected> Gujarat </option>
                                            <option value="Haryana"> Haryana </option>
                                            <option value="Himachal Pradesh"> Himachal Pradesh </option>
                                            <option value="Jammu and Kashmir"> Jammu and Kashmir </option>
                                            <option value="Jharkhand"> Jharkhand </option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Ladakh">Ladakh</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Zip Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="zip_code" id="zip_code">
                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="country" id="country">
                                            <option value="India">India</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">RelationShip Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="relationship_status" id="relationship_status">
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="widowed">Widowed</option>
                                            <option value="divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            Education Details
                        </p>
                        <hr>
                        <div class="row content-wrapper">
                            <p class="card-description">
                                SSC Result
                            </p>
                            <div class="row col-sm-12">
                                <input type="hidden" name="ssc_board" value="ssc board">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <label class="col-form-label">Name Of Board</label>
                                            <input type="text" class="form-control" name="ssc_board_name"
                                                id="ssc_board_name">
                                            @error('ssc_board_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <label class="col-form-label">Passiong Year (EX. 2010)</label>
                                            <input type="text" class="form-control" name="ssc_board_pass_year"
                                                id="ssc_board_pass_year">
                                            @error('ssc_board_pass_year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <label class="col-form-label">Percentage (%)</label>
                                            <input type="text" class="form-control" name="ssc_board_percentage"
                                                id="ssc_board_percentage">
                                            @error('ssc_board_percentage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p class="card-description">
                                HSC/Diploma Result
                            </p>
                            <div class="row col-sm-12">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <label class="col-form-label">Name Of Board</label>
                                            <input type="text" class="form-control" name="hsc_board_name"
                                                id="hsc_board_name">
                                            @error('hsc_board_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <label class="col-form-label">Passiong Year (EX. 2012)</label>
                                            <input type="text" class="form-control" name="hsc_board_pass_year"
                                                id="hsc_board_pass_year">
                                            @error('hsc_board_pass_year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <label class="col-form-label">Percentage (%)</label>
                                            <input type="text" class="form-control" name="hsc_board_percentage"
                                                id="hsc_board_percentage">
                                            @error('hsc_board_percentage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <p class="card-description">
                                Bachelor Degree
                            </p>
                            <div class="row col-sm-12">
                                <input type="hidden" class="form-control" name="bachelor_degree_name"
                                    value="Bachelor Degree">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <label class="col-form-label">Course Name</label>
                                            <input type="text" class="form-control" name="bachelor_degree_course_name"
                                                id="bachelor_degree_course_name">
                                            @error('bachelor_degree_course_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <label class="col-form-label">University Name</label>
                                            <input type="text" class="form-control"
                                                name="bachelor_degree_university_name"
                                                id="bachelor_degree_university_name">
                                            @error('bachelor_degree_university_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Passiong Year (EX. 2015)</label>
                                            <input type="text" class="form-control" name="bachelor_degree_pass_year"
                                                id="bachelor_degree_pass_year">
                                            @error('bachelor_degree_pass_year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Percentage (%)</label>
                                            <input type="text" class="form-control" name="bachelor_degree_percentage"
                                                id="bachelor_degree_percentage">
                                            @error('bachelor_degree_percentage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <p class="card-description">
                                Master Degree
                            </p>
                            <div class="row col-sm-12">

                                <input type="hidden" class="form-control" name="bachelor_degree_name"
                                    value="Master Degree">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <label class="col-form-label">Course Name</label>
                                            <input type="text" class="form-control" name="master_degree_name"
                                                id="master_degree_name">
                                            @error('master_degree_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                 <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <label class="col-form-label">Course Name</label>
                                            <input type="text" class="form-control" name="master_degree_course_name"
                                                id="master_degree_course_name">
                                            @error('master_degree_course_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class=
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <label class="col-form-label">University Name</label>
                                            <input type="text" class="form-control" name="master_degree_univerty_name"
                                                id="master_degree_univerty_name">
                                            @error('master_degree_univerty_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Passiong Year(EX. 2017)</label>
                                            <input type="text" class="form-control" name="master_degree_pass_year"
                                                id="master_degree_pass_year">
                                            @error('master_degree_pass_year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Percentage (%)</label>
                                            <input type="text" class="form-control" name="master_degree_percentage"
                                                id="master_degree_percentage">
                                            @error('master_degree_percentage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row col-sm-12">

                            <div class="col-sm-6">
                                <p class="card-description mt-2">
                                    Language know
                                </p>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row col-sm-12">
                                            <label class="col-sm-2 col-form-label">Hindi</label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="hindi_is_read" id="hindi1">
                                                        Read
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="hindi_is_write" id="hindi2">
                                                        Write
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="hindi_is_speak" id="hindi3">
                                                        Speak
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row col-sm-12">
                                            <label class="col-sm-2 col-form-label">English</label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="english_is_read" id="english1">
                                                        Read
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="english_is_write" id="english2">
                                                        Write
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="english_is_speak" id="english3">
                                                        Speak
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row col-sm-12">
                                            <label class="col-sm-2 col-form-label">Gujarati</label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="gujarati_is_read" id="gujarati1">
                                                        Read
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="gujarati_is_write" id="gujarati2">
                                                        Write
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="gujarati_is_speak" id="gujarati3">
                                                        Speak
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <p class="card-description">
                                    Technologies you know
                                </p>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row col-sm-12">
                                            <label class="col-sm-2 col-form-label">PHP</label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="php"
                                                            id="php1" value="1">
                                                        Beginner
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="php"
                                                            id="php2" value="2">
                                                        Mediator
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="php"
                                                            id="php3" value="3">
                                                        Expert
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row col-sm-12">
                                            <label class="col-sm-2 col-form-label">Mysql</label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="mysql"
                                                            id="mysql1" value="1">
                                                        Beginner
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="mysql"
                                                            id="mysql2" value="2">
                                                        Mediator
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="mysql"
                                                            id="mysql3" value="3">
                                                        Expert
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row col-sm-12">
                                            <label class="col-sm-2 col-form-label">Laravel</label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="laravel"
                                                            id="laravel1" value="1">
                                                        Beginner
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="laravel"
                                                            id="laravel2" value="2">
                                                        Mediator
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="laravel"
                                                            id="laravel3" value="3">
                                                        Expert
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row col-sm-12">
                                            <label class="col-sm-2 col-form-label">Oracle</label>
                                            <div class="col-sm-3   ">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="oracle"
                                                            id="oracle1" value="1">
                                                        Beginner
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3  ">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="oracle"
                                                            id="oracle2" value="2">
                                                        Mediator
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4   ">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="oracle"
                                                            id="oracle3" value="3">
                                                        Expert
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="card-description">
                            Work Experiences
                        </p>
                        <hr>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table" id="dynamic_field">
                                    <tr>
                                        <td>
                                            <label class="col-form-label">Name Of Board</label>
                                            <input type="text" name="name[]" placeholder="Enter your company name"
                                                class="form-control name_list" />
                                        </td>
                                        <td>
                                            <label class="col-form-label">Designation</label>
                                            <input type="text" name="designation[]"
                                                placeholder="Enter your designation"
                                                class="form-control designation_list" />
                                        </td>

                                        <td>
                                            <label class="col-form-label">From</label>
                                            <input type="date" name="from[]" placeholder="Enter your from date "
                                                class="form-control from_list " />
                                        </td>

                                        <td>
                                            <label class="col-form-label">To</label>
                                            <input type="date" name="to[]" placeholder="Enter your to date "
                                                class="form-control to_list" />
                                        </td>

                                        <td>
                                            <button type="button" name="add" id="add"
                                                class="btn btn-success">Add
                                                More</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>


                        <p class="card-description mt-2">
                            Referance Contact
                        </p>
                        <hr>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table" id="preferences_dynamic_field">
                                    <tr>
                                        <td>
                                            <label class="col-form-label">Name</label>
                                            <input type="text" name="relation_name[]"
                                                placeholder="Enter your company name" class="form-control name_list" />
                                        </td>
                                        <td>
                                            <label class="col-form-label">Contact Number</label>
                                            <input type="text" name="relation_contact_no[]"
                                                placeholder="Enter your designation"
                                                class="form-control designation_list" />
                                        </td>

                                        <td>
                                            <label class="col-form-label">Relation</label>
                                            <input type="text" name="relation[]" placeholder="Enter your to date "
                                                class="form-control relation_list" />
                                        </td>

                                        <td>
                                            <button type="button" name="add" id="preferences_dynamic_add"
                                                class="btn btn-success">Add
                                                More</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <p class="card-description mt-2">
                            Preferences
                        </p>
                        <hr>
                        <div class="row col-sm-12">
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <div class="col-sm-9">
                                        <label class="col-form-label">Preferd location </label>
                                        <select class="form-control" name="preferd_location" id="preferd_location"
                                            multiple>
                                            <option value="">Select department name here</option>
                                            <option value="Ahmedabad">Ahmedabad</option>
                                            <option value="Rajkot">Rajkot</option>
                                            <option value="Surat">Surat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <div class="col-sm-9">
                                        <label class="col-form-label">Notice period(In Days)</label>
                                        <input type="text" class="form-control" name="notice_period"
                                            id="notice_period">
                                        @error('notice_period')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <label class="col-form-label">Expacted CTC(Monthly)</label>
                                        <input type="text" class="form-control" name="expected_CTC"
                                            id="expected_CTC">
                                        @error('expected_CTC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <label class="col-form-label">Current CTC(Monthly)</label>
                                        <input type="text" class="form-control" name="current_CTC"
                                            id="current_CTC">
                                        @error('current_CTC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="form-group row">
                                    <div class="col-sm-9">
                                        <label class="col-form-label">Department</label>
                                        <select class="form-control" name="department" id="department">
                                            <option value="">Select department name here</option>
                                            <option value="hr">HR</option>
                                            <option value="marketing">Marketing</option>
                                            <option value="development">Development</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('js/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('js/select2/dist/js/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#preferd_location').select2({
                width: '100%',
                placeholder: "Select an Option",
                allowClear: true
            });

            var postURL = "<?php echo url('addmore'); ?>";
            var i = 1;


            $("#add").click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i +
                    '" class="dynamic-added"><td><label class="col-form-label">Name Of Board</label><input type="text" name="company_name[]" placeholder="Enter your company name" class="form-control name_list" /></td><td><label class="col-form-label">Designation</label><input type="text" name="designation[]" placeholder="Enter your designation" class="form-control designation_list" /></td><td><label class="col-form-label">From</label><input type="date" name="from[]" placeholder="Enter your from date " class="form-control from_list " /></td><td><label class="col-form-label">To</label><input type="date" name="to[]" placeholder="Enter your to date "class="form-control to_list" /></td><td><button type="button" name="remove" id="' +
                    i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });


            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

            $("#preferences_dynamic_add").click(function() {
                i++;
                $('#preferences_dynamic_field').append('<tr id="row' + i +
                    '" class="dynamic-added"><td><label class="col-form-label">Name</label><input type="text" name="relation_name[]" placeholder="Enter your name" class="form-control name_list" /></td><td><label class="col-form-label">Contact No</label><input type="text" name="relation_contact_no[]" placeholder="Enter your contact no" class="form-control relation_contact_no_list" /></td><td><label class="col-form-label">Relation</label><input type="text" name="relation[]" placeholder="Enter your relation " class="form-control from_list " /></td><td><button type="button" name="remove" id="' +
                    i + '" class="btn btn-danger preferences_dynamic_remove">X</button></td></tr>');
            });


            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });


            $(document).on('click', '.preferences_dynamic_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });




            var today = new Date();
            $('.date').datepicker({
                format: 'mm-dd-yyyy',
                autoclose: true,
                endDate: "today",
                maxDate: today,
            });
            //override required method
            $.validator.methods.required = function(value, element, param) {
                return (value == undefined) ? false : (value.trim() != '');
            }

            $(".form").validate({
                ignore: [],
                rules: {
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    address1: {
                        required: true,
                    },
                    address2: {
                        required: true,
                    },
                    date_of_birth: {
                        required: true,
                    },
                    designation: {
                        required: true,
                    },
                    mobile_no: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    zip_code: {
                        required: true,
                    },
                },
                messages: {
                    first_name: {
                        required: 'Please enter first name',
                    },
                    last_name: {
                        required: 'Please enter last name',
                    },
                    email: {
                        required: 'Please enter email address',
                    },
                    date_of_birth: {
                        required: 'Please select date of birth',
                    },
                    address1: {
                        required: 'Please enter address 1',
                    },
                    address2: {
                        required: 'Please enter address 2',
                    },
                    designation: {
                        required: 'Please enter your designation',
                    },
                    city: {
                        required: 'Please enter city name',
                    },
                    mobile_no: {
                        required: 'Please enter mobile no',
                    },
                    zip_code: {
                        required: 'Please enter zip code',
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
