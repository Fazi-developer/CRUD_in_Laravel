<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="row d-flex justify-content-center my-5">
        <div class="col-md-4">
            <div class="card boarder-0 shadow-lg my-2">
                <div class="card-header bg-dark text-white">
                    <h4 class=" text-center">Register</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('RegisterSave')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Name" name="name" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email/Username</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Username" name="username" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="password_confirmatio" >
                        </div>
                        <button class="btn btn-primary " type="submit">Register</button>
                        <a href="{{route('Homepage')}}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>