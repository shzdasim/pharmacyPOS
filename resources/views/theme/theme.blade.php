<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Pharmacy POS | @yield('title')</title>
        @include('theme.css')
        @yield('css')
    </head>
    <body>
       
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

           <!-- Start Sidebar -->
           @include('theme.sidebar')
            <!-- END Sidebar -->

            <!-- Header -->
            @include('theme.header')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                          <!-- Notifications -->
           @if(session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{ session('success') }}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
           </div>
       @endif
       
       @if(session('error'))
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
               {{ session('error') }}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
           </div>
       @endif
           <!-- End Notification -->
                <!-- Page Content -->
               @yield('content')
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
           @include('theme.footer')
            <!-- END Footer -->

        </div>
        <!-- END Page Container -->

     
       @include('theme.js')
       @yield('js')
    </body>
</html>
