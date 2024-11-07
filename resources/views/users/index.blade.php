@extends('layouts.default')
@section('content')
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
            <div class="card card-table">
                <div class="card-body">

                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Users</h3>
                            </div>
                           
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="{{ url('users/index')}}" class="btn btn-outline-gray me-2 active"><i
                                        class="feather-list"></i></a>
                                <a href="{{ url('users/index-grid')}}" class="btn btn-outline-gray me-2 "><i
                                        class="feather-grid "></i></a>
                                <a href="{{ url('users/create')}}" class="btn btn-primary"><i
                                    class="fas fa-plus"></i> Create New User</a>
                            </div> 
                        </div>
                    </div>

                    <div class="table-responsive" >
                        <table id="example"
                            class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>Prefix</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>User Type</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->prefixname }}</td>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->type) }}</td>
                                <td>
                                    @if($user->photo)
                                        <img src="{{ asset('images/users/' . $user->photo) }}" alt="User Photo" width="50">
                                    @else
                                        No Photo
                                    @endif
                                </td>
                                <td>
                                   
                                    @if(Auth::user()->type == 'superadmin' || Auth::user()->type == 'admin')
                                        <a href="{{ url('users/show', $user->id) }}" class="btn btn-sm bg-danger-light">
                                            <i class="feather-eye"></i>
                                        </a>
                                        <a href="{{ url('users/edit', $user->id) }}" class="btn btn-sm bg-danger-light">
                                            <i class="feather-edit"></i>
                                        </a>
                                        @if($user->type != 'superadmin')
                                            <a href="{{ url('users/destroy', $user->id) }}" class="btn btn-sm bg-danger-light me-2" onclick="return confirm('This will move the user to Trashed List..Are you sure?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ url('users/show', $user->id) }}" class="btn btn-sm bg-danger-light">
                                            <i class="feather-eye"></i>
                                        </a>
                                        @if($user->id == Auth::user()->id)
                                            <a href="{{ url('users/edit', $user->id) }}" class="btn btn-sm bg-danger-light">
                                                <i class="feather-edit"></i>
                                            </a>
                                        @endif
                                    @endif
                                   
                                </td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css"rel="stylesheet">

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    new DataTable('#example');
</script>
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
