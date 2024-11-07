
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/feather/feather.css ')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toatr.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/icons/flags/flags.css ')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css ')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css ')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css ')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/flick/jquery-ui.css">




</head>

<body>
    <div class="main-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
            <div class="page-wrapper">
                @yield('content')

            </div>
            @include('layouts.footer')
    </div>



</body>
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.1/jquery-ui.min.js"></script>
<script src="{{asset('assets/js/monthpicker.js')}}"></script>

<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/feather.min.js')}}"></script>
<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/plugins/apexchart/chart-data.js')}}"></script>
<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/plugins/toastr/toastr.js')}}"></script>
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>


<script>

    // Get the current URL path
    var path = window.location.pathname;

    // Find all links in the sidebar
    var links = document.querySelectorAll('.submenu ul li a');

    // Loop through each link
    links.forEach(function(link) {
        // Check if the link's href matches the current URL path
        if (link.getAttribute('href') === path) {
            // Add the 'active' class to the parent <li> element
            link.parentNode.classList.add('active');
        }
    });
</script>

</html>
