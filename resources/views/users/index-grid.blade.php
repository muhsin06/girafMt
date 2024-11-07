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
            <div class="card card-table comman-shadow">
                <div class="card-body pb-0">

                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Users</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                {{-- <a href="students.html" class="btn btn-outline-gray me-2"><i
                                        class="feather-list"></i></a>
                                <a href="students-grid.html" class="btn btn-outline-gray me-2 active"><i
                                        class="feather-grid "></i></a> --}}
                                
                                <a href="{{ url('users/index')}}" class="btn btn-outline-gray me-2"><i
                                        class="feather-list"></i></a>
                                <a href="{{ url('users/index-grid')}}" class="btn btn-outline-gray me-2 active"><i
                                        class="feather-grid "></i></a>
                                <a href="{{ url('users/create')}}" class="btn btn-primary"><i
                                    class="fas fa-plus"></i> Create New User</a>
                            </div>
                        </div>
                    </div>

                    <div class="student-pro-list">
                        <div class="row">
                            @foreach($users as $user)
                                <div class="col-xl-3 col-lg-4 col-md-6 d-flex">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="student-box flex-fill">
                                                <div class="student-img">
                                                    <a href="student-details.html">
                                                        <img class="img-fluid" alt="Students Info"
                                                            src="{{ $user->avatar }}">
                                                    </a>
                                                </div>
                                                <div class="student-content pb-0">
                                                    <h5><a href="{{ url('users/show', $user->id) }}">{{ $user->fullname }}</a></h5>
                                                    <h6>{{ $user->type }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
