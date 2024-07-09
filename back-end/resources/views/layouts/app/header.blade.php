<header class="header-nav">
    <div class="container">
        <nav class="navbar navbar-expand-lg navigasi">
            <a class="navbar-brand me-lg-5" href="{{url("/")}}"><img src="{{asset("images/logo copy.png")}}" alt="" width="100px"></a>
            <button class="navbar-toggler tombol-burger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-lg-5 list-navbar" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link px-lg-5" href="{{url("/")}}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-5" href="{{url("/#mobil")}}">Koleksi Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-5 bayar-sewa" href="#">Bayar Sewa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-5" href="{{url("/#about")}}">Tentang</a>
                    </li>
                </ul>
                @if(Auth::check())
                <div class="dropdown py-2 px-lg-5">
                    <a class="dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{url("manage_orders")}}">Kelola Order</a></li>
                        <li><a class="dropdown-item" href="{{url("manage_cars")}}">Kelola Mobil</a></li>
                        <li><a href="{{url("logout")}}" class="dropdown-item">Logout</a></li>
                    </ul>
                </div>
                @endif
            </div>
        </nav>
        <div class="form-bayar d-none">
            <form action="{{url("search-order")}}" method="POST" class="d-flex">
                @csrf
                <input type="search" class="form-control" name="invoice" placeholder="Cari Invoice..." aria-label="Search">
                <button type="submit" class="btn btn-success">Cari</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script>
        const btnBayar = document.querySelector("a.bayar-sewa");
        btnBayar.addEventListener("click", function(e) {
            e.preventDefault();
            document.querySelector(".form-bayar").classList.toggle("d-none");
        });
    </script>
</header>