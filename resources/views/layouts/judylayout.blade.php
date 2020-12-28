
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>The Posts Site - @yield('title')</title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/icons/p_2007.ico') }}">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS. This will change with the theme.-->
    <?php
        $stylesheet = Auth::user() ? Auth::user()->theme : "style4-0";
        $stylesheetpath = '/css/' . $stylesheet . '.css';
    ?>
    <link id="sidebarstyle" rel="stylesheet" type="text/css" href="{{ asset($stylesheetpath) }}">

    <!--My added CSS -->
    <link rel="stylesheet" href="{{ asset('css/additional.css') }}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    @yield('extra-headers')
</head>

<body>
<!-- Page Content  -->

    <div class="wrapper">
        <!-- Sidebar  -->

        @include('layouts.partials.sidebar')

        <div id="content">
            @include('layouts.partials.header')
            @include('layouts.partials.searchresults')
            <!-- Page Content  -->
            @yield('content')
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}" ></script>
    <!-- Popper.JS -->
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <!-- My scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('js/additional.js') }}" ></script>

    <!-- Moving this into a separate JS file made it stop working -->
    <script>
        $(document).ready(function(){

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('live_search.action') }}",
                    method: 'GET',
                    data:{"query":query},
                    dataType: 'json',
                    success: function(data){
                        $('#searchresults').html(data.name_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $('#searchbox').on('keyup', function(){
                var query = $(this).val();
                fetch_customer_data(query);

                if (query == ''){
                    $('#searchresultsbox').hide();
                }
                else{
                    $('#searchresultsbox').show();
                }
            });

            $('#searchbox').on('blur', function(){
                $('#searchresultsbox').hide();
            });

        });
    </script>

</body>

</html>
