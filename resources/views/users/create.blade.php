@extends('layouts.default')
@section('content')

<style>
#loader-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
}

#loader {
    border: 12px solid #f3f3f3; /* Light grey */
    border-top: 12px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 80px;
    height: 80px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">{{$page_data['title']}}</h3>
                        <ul class="breadcrumb">
                            @foreach ($page_data['breadcrumbs'] as $breadcrumb)
                                <li class="breadcrumb-item">
                                    @if (!empty($breadcrumb['url']))
                                        <a href="{{ url($breadcrumb['url']) }}">{{ $breadcrumb['label'] }}</a>
                                    @else
                                        {{ $breadcrumb['label'] }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
    
                        @if (Session::has('success'))
                            <p class="text-success toast-title">{{ Session::get('success') }}</p>
                        @endif
        
                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
        
                        <form action="{{ url('users/store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row" id="form_row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">User Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                </div>
    
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prefix Name <span class="login-danger">*</span></label>
                                        <select name="prefixname" class="form-control" required>
                                            <option value="">--Select Prefix--</option>
                                            <option value="Mr" {{ old('prefixname') == 'Mr' ? 'selected' : '' }}>Mr.</option>
                                            <option value="Mrs" {{ old('prefixname') == 'Mrs' ? 'selected' : '' }}>Mrs.</option>
                                            <option value="Ms" {{ old('prefixname') == 'Ms' ? 'selected' : '' }}>Ms.</option>
                                        </select>
                                        @error('prefixname')
                                            <div class="error_msgs text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>First Name <span class="login-danger">*</span></label>
                                        <input name="firstname" class="form-control" type="text" placeholder="Enter First Name" value="{{ old('firstname') }}" required>
                                        @error('firstname')
                                            <div class="error_msgs text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Middle Name</label>
                                        <input name="middlename" class="form-control" type="text" placeholder="Enter Middle Name" value="{{ old('middlename') }}">
                                        @error('middlename')
                                            <div class="error_msgs text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Last Name <span class="login-danger">*</span></label>
                                        <input name="lastname" class="form-control" type="text" placeholder="Enter Last Name" value="{{ old('lastname') }}" required>
                                        @error('lastname')
                                            <div class="error_msgs text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Suffix Name</label>
                                        <input name="suffixname" class="form-control" type="text" placeholder="Enter Suffix Name" value="{{ old('suffixname') }}">
                                        @error('suffixname')
                                            <div class="error_msgs text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Username <span class="login-danger">*</span></label>
                                        <input name="username" class="form-control" type="text" placeholder="Enter Username" value="{{ old('username') }}" required>
                                        @error('username')
                                            <div class="error_msgs text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Email <span class="login-danger">*</span></label>
                                        <input name="email" class="form-control" type="email" placeholder="Enter Email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="error_msgs text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Password <span class="login-danger">*</span></label>
                                        <input name="password" class="form-control" type="password" placeholder="Enter Password" required>
                                        @error('password')
                                            <div class="error_msgs text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Upload Photo</label>
                                        <div class="uplod">
                                            <label class="file-upload image-upbtn mb-0">
                                                Choose File <input type="file" name="photo">
                                            </label>
                                        </div>
                                        @error('photo')
                                            <div class="error_msgs text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>User Type <span class="login-danger">*</span></label>
                                        <select name="type" class="form-control">
                                            <option value="">--Select UserType--</option>
                                            <option value="user" {{ old('type') == 'user' ? 'selected' : '' }}>User</option>
                                            <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        @error('type')
                                            <div class="error_msgs text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Create User</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        


                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if (Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ Session::get('success') }}',
                    showConfirmButton: true
        
                });
            @endif
        
        </script>


    @endsection
