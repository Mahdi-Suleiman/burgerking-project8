@extends('layouts.app')

@section('content')

{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Profile</h2>
            </div>
            <div class="col-12">
                <a href="">Home</a>
                <a href="">Profile</a>
            </div>
        </div>
    </div>
</div>
<br>
<br><h1 class="profile-heading">User Profile</h1>
<div class="container emp-profile">

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <p class="updated">{!! session()->get('success') !!}</p></div>
        @endif

    <form method="post" action="{{ route('users.edit') }}">
        @csrf

        <div class="row">
            {{-- <div class="col-md-2"> --}}
                {{-- <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div> --}}
            {{-- </div> --}}
            <div class="col-md-4">
                <div class="profile-head">
                            <h5>
                             Hello {{Auth::user()->name}}
                            </h5>



                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Resrvations</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"
                 {{-- href="{{ route('users.edit',Auth::user()->id) }} --}}
                 />
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-md-4">
                <div class="profile-work">
                    <p>WORK LINK</p>
                    <a href="">Website Link</a><br/>
                    <a href="">Bootsnipp Profile</a><br/>
                    <a href="">Bootply Profile</a>
                    <p>SKILLS</p>
                    <a href="">Web Designer</a><br/>
                    <a href="">Web Developer</a><br/>
                    <a href="">WordPress</a><br/>
                    <a href="">WooCommerce</a><br/>
                    <a href="">PHP, .Net</a><br/>
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="form_name" type="text" name="name"   value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="mobile_number" type="text" name="mobile_number"
                                        value=" {{$user->email}} "
                                       disabled >

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">

                                       <input id="mobile_number" type="text" name="mobile_number"
                                         value=" {{$user->mobile_number}}"
                                         >



                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label> New password</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="form_password" type="text" name="password"
                                        {{-- value="{{Auth::user()->password}}
                                        " --}}
                                         >
                                    </div>
                                </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>table number</label>
                                    </div>
                                    <div class="col-md-6">
                                        @foreach($user->tables as $table)
                                        {{-- {{ dd($table->id) }} --}}
                                          <p> {{$table->number}}
                                          </p>
                                       @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>date &Time</label>
                                    </div>
                                    <div class="col-md-6">
                                        @foreach($user->tables as $table)
                                        <p>
                                         {{$table->pivot->date}}</p>

                                       @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>time</label>
                                    </div>
                                    <div class="col-md-6">
                                        @foreach($user->tables as $table)
                                        <p>
                                         {{$table->pivot->time}}</p>

                                       @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>status</label>
                                    </div>
                                    <div class="col-md-6">
                                        @foreach($user->tables as $table)

                                         <p> {{$table->pivot->status}}</p>

                                          @endforeach
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <label>Availability</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>6 months</p>
                                    </div>
                                </div> --}}
                        <div class="row">
                            {{-- <div class="col-md-12">
                                <label>Your Bio</label><br/>
                                <p>Your detail description</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection
