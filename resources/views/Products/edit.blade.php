<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create Product</title>
  </head>
  <body>
  <div class="bg-dark py-3">
    <h4 class="text-white text-center">Simple Laravel 11 CRUD</h4>
  </div>
  <div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-8 d-flex justify-content-end">
            <a href="{{route('Products.index')}}" class="btn btn-dark">Back</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card boarder-0 shadow-lg my-2">
                <div class="card-header bg-dark text-white">
                    <h4>Edit Product</h4>
                </div>
                <form  enctype="multipart/form-data" action="{{route('Products.update',$product->id)}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" value="{{old('name',$product->name)}}" class=" @error('name') is-invalid @enderror 
                            form-control form-control-lg" placeholder="Name" name="name">
                            @error('name')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Sku</label>
                            <input type="text" value="{{old('sku',$product->sku)}}" class=" @error('sku') is-invalid @enderror 
                            form-control form-control-lg" placeholder="Sku" name="sku">
                            @error('sku')
                            <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <input type="text" value="{{old('price',$product->price)}}" class=" @error('price') is-invalid @enderror  
                            form-control form-control-lg" placeholder="Price" name="price">
                            @error('price')
                            <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control"  name="description" cols="30" rows="4">{{old('description', $product->description)}}"</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" class="form-control form-control-lg"  name="image">
                            @if ($product->image != "")
                            <img class="w-50,my-2" src="{{asset('Uploads/Products/'.$product->image)}}" alt="">
                        @endif
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-md">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
  </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>