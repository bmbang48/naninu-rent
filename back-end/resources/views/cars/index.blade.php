<div class="container pt-4" id="mobil">
    <div class="row">
        <div class="col-md-9">
            <h4 class="title ms-3">Koleksi Mobil</h4>
        </div>
        <div class="col-md-3">
            <form class="col-12 me-3 col-lg-auto mb-3 mb-lg-0 d-flex px-5 p-lg-0" role="search" action="{{url("cars/search")}}" method="GET">
                <input type="search" class="form-control" name="keyword" placeholder="Cari Mobil..." aria-label="Search">
                <button type="submit" class="btn btn-success">Cari</button>
            </form>

        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center flex-wrap">
            @foreach($cars as $car)
            <div class="col-lg-3 col-md-4">
                <div class="card card-cars m-lg-4 m-3">
                    <div class="card-head">
                        <div class="bg-image">
                            <img src="{{asset("images/$car->image")}}" alt="" width="100%" height="150px">
                        </div>
                        <h3 class="cart-title px-3 pt-3">{{$car->merk}} {{$car->type}}</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="cart-text text-end">Rp. {{number_format($car->harga, 0, ',','.')}}</h5>
                        <p class="cart-text">Tahun : {{$car->tahun}}</p>
                        <p class="cart-text">Transmisi : {{$car->transmisi}}</p>
                        <p class="cart-text">Bahan Bakar : {{$car->bbm}}</p>
                        <p class="cart-text">Jumlah Penumpang : {{$car->jml_penumpang}}</p>
                    </div>
                    <a href="{{url("order/$car->id")}}" class="btn btn-primary">Pesan Mobil</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center text-lg-end pe-4 pb-4 pt-2 nav-pagination">
            {{$cars->links()}}
        </div>
    </div>

</div>