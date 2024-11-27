<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>mYSTORE</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    </head>
    <body>
        <nav class="navbar navbar-expand-md  bg-dark">
            <div class="container">
              <a class="navbar-brand text-white" href="{{route('Homepage')}}">mYStore</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                  <li class="nav-item">
                    <a class="nav-link text-white "  href="{{route('Homepage')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('Products.index')}}">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Brands</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contact Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Logout</a>
                  </li>
                </ul>
                <div class="ps-5 mb-2  ">
                  <a class="btn btn-secondary bg-dark"  type="submit" href="#">Login</a>
                  <a class="btn btn-secondary bg-dark"  type="submit" href="{{route('register')}}">Register</a>
                </div>
              </div>
            </div>
          </nav>
          <div class="row d-flex justify-content-center my-5">
            <div class="col-md-8">
              <div class="card boarder-0 shadow-lg my-2">
                <div class="card-body py-4">
                  <h4>Welcome Dear user! to mYStore</h4>
                </div>
              </div>
              
            </div>
          </div>
    </body>
</html>
