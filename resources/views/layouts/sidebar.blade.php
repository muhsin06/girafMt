<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include SlimScroll -->
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                {{-- <li class="submenu ">
                    <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ url('/admin-dashboard') }}" class="">Admin Dashboard</a></li>
                        <li><a href="teacher-dashboard.html">Teacher Dashboard</a></li>
                        <li><a href="{{ url('/student-dashboard') }}">Student Dashboard</a></li>
                    </ul>
                </li> --}}

                <li>
                    <a href="{{ url('/admin-dashboard') }}"><i class="feather-grid"></i> <span>Dashboard</span></a>
                </li>
               
                <li class="submenu  @active('users*')">
                    <a href="#"><i class="fas fa-graduation-cap"></i> <span> Users</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        {{-- <li ><a href="students.html">Student List</a></li> --}}

                        <li>
                            <a href="{{ url('users/create') }}" class="@active('users/create')">Create User</a>
                        </li>
                        <li>
                            <a href="{{ url('users/index') }}" class="@active('users/index')">List Users </a>
                        </li>
                        <li>
                            <a href="{{ url('users/trashed') }}" class="@active('users/trashed')">Trashed Users </a>
                        </li>
                        {{-- <li><a href="edit-student.html">Student Edit</a></li> --}}
                    </ul>
                </li>

               

            </ul>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
    $('.sidebar-inner').slimScroll({
        height: 'auto' ,// Adjust height as needed
        width: '100%',
        position: 'right',
        size: '7px',
        color: '#ccc',
        allowPageScroll: false,
        wheelStep: 10,
        touchScrollStep: 100,
    });
});

</script>
