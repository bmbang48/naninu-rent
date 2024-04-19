<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{asset('bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-4 pt-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Masuk</h3>
                        <hr>
                        @if(session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{session()->get('error_message')}}
                        </div>
                        @endif
                        <form action="{{url("login")}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="example@mail.com">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="********">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-success w-100">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>