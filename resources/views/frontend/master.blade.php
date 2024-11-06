
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Online  Seeling System</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        @notifyCss
         
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="https://themewagon.github.io/fruitables/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="https://themewagon.github.io/fruitables/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    

        <!-- Customized Bootstrap Stylesheet -->
        <link href="https://themewagon.github.io/fruitables/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Template Stylesheet -->
        <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
        <style>
            .notify {
    position: fixed;
    top: 10px;
    right: 10px;
    z-index: 9999; /* Ensure it's above other elements */
}

        </style>
       
        
    </head>
    

    <body>

        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar start -->
        
        <!-- Modal Search End -->
        @include('frontend.partials.header')
        @include('notify::components.notify')



        <!-- Hero Start -->
       
        <!-- Tastimonial End -->

        @yield('content')
        <!-- Footer Start -->
       
        <!-- Copyright End -->
         

        @include('frontend.partials.footer')

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>
    @notifyJs

</html>