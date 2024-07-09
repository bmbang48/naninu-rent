@extends('layouts.app')

@section('title','Login Admin')
@section('content')

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
                        <form action="{{url("naninunet")}}" method="POST">
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
@endsection