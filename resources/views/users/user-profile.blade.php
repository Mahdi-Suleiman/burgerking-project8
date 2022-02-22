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
                                        {{-- value="{{$user()->password}}
                                        " --}}
                                         >
                                    </div>
                                </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table style="
                    background-color: #fbaf32; " class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Table number</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">status</th>
                                <th scope="col">Note</th>
                                <th scope="col">Action</th>


                              </tr>
                            </thead>
                            <tbody>

{{-- <div style="display:none">
{{ $count= $user->tables->count()}}

{{ $count2=$count-$count+1 }}
</div> --}}
@php
$i=0;

@endphp

@foreach($user->tables as $table)
                              <tr>

                                 <th scope="row">{{ ++$i }}</th>
                                <td>{{$table->number}}</td>
                                <td> {{$table->pivot->date}}</td>
                                <td> {{$table->pivot->time}}</td>
                                <td> {{$table->pivot->status}}</td>
                                <td> {{$table->pivot->note}}</td>
                                <td> </form>
                                    <form action="{{ url('/user-profile-delete/'.$table->pivot->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
                                    </form>
                                </td>
                                     {{-- {{$count2=$count2+1}} --}}
                                      </tr>@endforeach

                            </tbody>
                          </table>

                    </div>
                </div>
            </div>
        </div>


</div>
@endsection
