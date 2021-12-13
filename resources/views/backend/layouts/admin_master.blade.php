@include('backend.layouts._partials.header')
    @include('backend.layouts._partials.sidebar')
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <div class="container-fluid">
            
            @yield('content')

        </div>
        <!--/.container-fluid-->
    </main>
@include('backend.layouts._partials.footer')
