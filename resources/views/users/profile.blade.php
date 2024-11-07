@extends('layouts.default')
@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">User Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                        <li class="breadcrumb-item active">Student Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-info">
                        <h4>Profile <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h4>
                    </div>
                    <div class="student-profile-head">
                        <div class="profile-bg-img">
                            <img src="{{ asset('assets/img/profile-bg.jpg') }}" alt="Profile">
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="profile-user-box">
                                    <div class="profile-user-img">
                                        <img src="{{ $user->avatar }}" alt="Profile">
                                        
                                    </div>
                                    <div class="names-profiles">
                                        <h4>{{ $user->prefixname }} {{ $user->firstname }}</h4>
                                        <h5>{{ $user->type }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                <div class="follow-group">
                                    <div class="students-follows">
                                        <h5>Followers</h5>
                                        <h4></h4>
                                    </div>
                                    <div class="students-follows">
                                        <h5>Following</h5>
                                        <h4></h4>
                                    </div>
                                    <div class="students-follows">
                                        <h5>Posts</h5>
                                        <h4></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                <div class="follow-btn-group">
                                    <button type="submit" class="btn btn-info follow-btns">Follow</button>
                                    <button type="submit" class="btn btn-info message-btns">Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="student-personals-grp">
                        <div class="card">
                            <div class="card-body">
                                <div class="heading-detail">
                                    <h4>Personal Details :</h4>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-user"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>UserName</h4>
                                        <h5>{{ $user->username }} </h5>
                                    </div>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-user"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>Prefix</h4>
                                        <h5>{{ $user->prefixname }} </h5>
                                    </div>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-user"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>FirstName</h4>
                                        <h5> {{ $user->firstname }}</h5>
                                    </div>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-phone-call"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>MiddleName</h4>
                                        <h5>{{ $user->middlename }} </h5>
                                    </div>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-user"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>LastName</h4>
                                        <h5>{{ $user->lastname }}</h5>
                                    </div>
                                </div>
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-mail"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>Email</h4>
                                        <h5><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></h5>
                                    </div>
                                </div>
                                
                                <div class="personal-activity">
                                    <div class="personal-icons">
                                        <i class="feather-calendar"></i>
                                    </div>
                                    <div class="views-personal">
                                        <h4>Suffix</h4>
                                        <h5>{{ $user->suffixname }}</h5>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                  
                </div>
                <div class="col-lg-8">
                    <div class="student-personals-grp">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="heading-detail">
                                    <h4>About Me</h4>
                                </div>
                                <div class="hello-park">
                                    <h5>Hello I am Daisy Parks</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                        ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        aliquip ex commodo consequat. Duis aute irure dolor in reprehenderit
                                        in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                        Excepteur officia deserunt mollit anim id est laborum.</p>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                        accusantium doloremque laudantium, totam inventore veritatis et
                                        quasi architecto beatae vitae dicta sunt explicabo. </p>
                                </div>
                                {{-- <div class="hello-park">
                                    <h5>Education</h5>
                                    <div class="educate-year">
                                        <h6>2008 - 2009</h6>
                                        <p>Secondary Schooling at xyz school of secondary education, Mumbai.
                                        </p>
                                    </div>
                                    <div class="educate-year">
                                        <h6>2011 - 2012</h6>
                                        <p>Higher Secondary Schooling at xyz school of higher secondary
                                            education, Mumbai.</p>
                                    </div>
                                    <div class="educate-year">
                                        <h6>2012 - 2015</h6>
                                        <p>Bachelor of Science at Abc College of Art and Science, Chennai.
                                        </p>
                                    </div>
                                    <div class="educate-year">
                                        <h6>2015 - 2017</h6>
                                        <p class="mb-0">Master of Science at Cdm College of Engineering and
                                            Technology, Pune.</p>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



@endsection