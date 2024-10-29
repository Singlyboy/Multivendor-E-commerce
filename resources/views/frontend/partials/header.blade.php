
<div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Pirojali, Gazipur</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">saralsagar417@gmail.com</a></small>
                    </div>
                  
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Sarol Enterprise</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
           
                            <a href="" class="nav-item nav-link">Product</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                

                                    <a href="" class="dropdown-item">Item</a>
                                
                                   
                                </div>
                            </div>
                    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            
                        </div>
                        <div class="d-flex m-3 me-0">

                        @guest('customerGuard') 
                            <button class="btn btn-primary btn border border-secondary btn-md-square rounded-circle me-1 text-light"  data-bs-toggle="modal" data-bs-target="#loginModal">login</button>
                            <button class="btn btn-primary me-2 text-light" data-bs-toggle="modal" data-bs-target="#registationModal">SignUp</button>

                            @endguest
                            @auth('customerGuard')

                            <a href="" class="btn btn-primary btn border border-secondary btn-md-square  me-2 text-light"style="padding: 15px 30px;" >{{ auth('customerGuard')->user()->name }}</a>

                            <a href="{{route('customer.logout')}}" class="btn btn-primary me-2 text-light">Logout</a>
                            @endauth     
                            
                            
                            <a href="" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                               
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1 " style="top: -5px; left: 15px; height: 20px; min-width: 20px;"> </span>
                              
                            </a>
                            <a href="#" class="my-auto">
                                <i class="fas fa-heart fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="">
                    <div class="modal-body d-flex align-items-center">
                       
                       <div class="input-group w-75 mx-auto d-flex">
                            <input  name="search_key" value="" type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <button type="submit" id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>
                        </div>
                     
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Login Modal -->
<div  class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('customer.login')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Enter your email:</label>
                        <input required type="email" name="email" placeholder="Enter your email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Enter your password:</label>
                        <input required type="password" name="password" placeholder="Enter your password" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registationModal" tabindex="-1" aria-labelledby="registationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registationModalLabel">Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('customer.registration')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Enter your name:</label>
                        <input required type="text" name="customer_name" placeholder="Enter your name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Enter your email:</label>
                        <input required type="email" name="email" placeholder="Enter your email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Enter your password:</label>
                        <input required type="password" name="password" placeholder="Enter your password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Retype your password:</label>
                        <input required type="password" name="password_confirmation" placeholder="Retype your password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Enter your Mobile Number:</label>
                        <input required type="tel" name="mobile_number" placeholder="Enter your Mobile number" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Register Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>