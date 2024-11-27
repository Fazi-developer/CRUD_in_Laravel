<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Product</title>
  </head>
  <body>
  {{-- <div class="bg-dark py-3">
    <h4 class="text-white text-center">Simple Laravel 11 CRUD</h4>
  </div> --}}
  <div class="container">
    <div class="row justify-content-center mt-1">
        <div class="col-md-8 d-flex justify-content-end">
            <a href="{{route('Products.create')}}" class="btn btn-dark">Create</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        @if (Session::has('success'))
        <div class="col-md-8 mt-4">
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        </div>
        @endif
        <div class="col-md-8">
            <div class="card boarder-0 shadow-lg my-2">
                <div class="card-header bg-dark text-white">
                    <h4>Products</h4>
                </div>
                <div class="card-body">
                  <table class="table">
                    <tr>
                      <th>ID</th>
                      <th></th>
                      <th>Name</th>
                      <th>Sku</th>
                      <th>Price</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                    @if ($products->isNotEmpty())
                    @foreach ($products as $product)
                    <tr>
                      <td>{{$product->id}}</td>
                      <td>
                        @if ($product->image != "")
                            <img width="50" src="{{asset('Uploads/Products/'.$product->image)}}" alt="">
                        @endif
                      </td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->sku}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M Y') }}</td>
                      <td>
                        <a href="{{route('Products.edit',$product->id)}}" class="btn btn-dark">Edit</a>
                        <a href="#" onclick="deleteProduct({{ $product->id }});" class="btn btn-danger">Delete</a>
                        <form id="delete-product-from-{{$product->id}}" action="{{ route('Products.destory', $product->id) }}" method="POST">
                          @csrf
                          @method('delete')

                        </form>
                      </td>
                    </tr>
                    @endforeach    
                    @endif
                  </table>
                </div>
            </div>
        </div>
    </div>
  </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      function deleteProduct(id){
        if (confirm("Are you sure you want to delete the product?")) {
          document.getElementById("delete-product-from-"+id).submit();  
        }
      }
    </script>
  </body>
</html>