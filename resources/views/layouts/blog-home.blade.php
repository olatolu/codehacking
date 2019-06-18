<!-- Front Header -->
@include('includes.front.common.front_header')

<!-- Front Navigation -->
@include('includes.front.front_nav')

<!-- Page Content -->
<div class="container">

    <div class="row">

            @yield('content')

    </div>
    <!-- /.row -->
@include('includes.front.common.front_footer')