<!DOCTYPE html>

<head>
    <!--BOOTSTRAP 5--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!--Code-->
    <title>Menu diet</title>
    <!--CSS-->
    <link rel="stylesheet" href="./Component/NavBar.css">
</head>

<body>
    <!--NAVBAR-->
    @component('Component.Navbar')
    @endcomponent
    <!--ISI KONTEN MENU DIET-->
    <!--Konten Admin-->
    @component('Component.Admin')
    @endcomponent
    <!--Baris pertama-->
    <div>
        <h2 for="Most Related" class="Content-Label ms-2 mb-2">Most Related</h2>
    </div>
    <div class="row d-flex mb-2 ms-auto">
        <!--ITEM-1-->
        @foreach($prods as $d)
        <div class="col-md-4 mb-3">
            <div class="card">
                <a href="/menudiet/{{$d->id}}/food">
                    <img src="{{url('public/Image/'.$d->Image)}}" alt="Food_1" class="card-img-top" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h3 class="text-center card-title">{{$d->Judul}}</h3>
                    <h5 class="card-text text-center">{{$d->Subjudul}} Kal</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!--Baris ke-2 Konten-->
    <div>
        <h2 class="Content-Label ms-2 mb-2">Recommended</h2>
    </div>
    <div class="d-flex mb-2">
        <!--ITEM-1-->
        <div class="card mr-1 ms-auto me-auto">
            <a href="/MenuDiet/Food-8.html" class="img-fluid"><img src="./Image/MenuDiet/Food_1.jpg" alt="Food_1"></a>
            <div class="card-body">
                <h3 class="text-center card-text">Nasi Merah <br>Sayuran Tahu</h3>
                <h5 class="card-text text-center">359Kal</h5>
            </div>
        </div>
        <!--ITEM-2-->
        <div class="card mr-1 ms-auto me-auto">
            <a href="/MenuDiet/Food-9.html" class="img-fluid"><img src="./Image/MenuDiet/Food_1.jpg" alt="Food_1"></a>
            <div class="card-body">
                <h3 class="text-center card-text">Roasted Beef</h3>
                <h5 class="card-text text-center">390Kal</h5>
            </div>
        </div>
        <!--ITEM-3-->
        <div class="card mr-1 ms-auto me-auto">
            <a href="/MenuDiet/Food-10.html" class="img-fluid"><img src="./Image/MenuDiet/Food_1.jpg" alt="Food_1"></a>
            <div class="card-body">
                <h3 class="text-center card-text">Salmon <br> Avocado Sushi</h3>
                <h5 class="card-text text-center">380Kal</h5>
            </div>
        </div>
        <!--ITEM-4-->
        <div class="card mr-1 ms-auto me-auto">
            <a href="/MenuDiet/Food-11.html" class="img-fluid"><img src="./Image/MenuDiet/Food_1.jpg" alt="Food_1"></a>
            <div class="card-body">
                <h3 class="text-center card-text">Edamame Panggang</h3>
                <h5 class="card-text text-center">120Kal</h5>
            </div>
        </div>
        <!--ITEM-5-->
        <div class="card mr-1 ms-auto me-auto">
            <a href="./Image/MenuDiet/src/Food-1.jpg" class="img-fluid"><img src="./Image/MenuDiet/Food_1.jpg" alt="Food_1"></a>
            <div class="card-body">
                <h3 class="text-center card-text">Smoothie <br>Bayam Kiwi</h3>
                <h5 class="card-text text-center">200Kal</h5>
            </div>
        </div>
        <!--ITEM-6-->
        <div class="card mr-1 ms-auto me-auto">
            <a href="./Image/MenuDiet/src/Food-1.jpg" class="img-fluid"><img src="./Image/MenuDiet/Food_1.jpg" alt="Food_1"></a>
            <div class="card-body">
                <h3 class="text-center card-text">Fruity Pancake</h3>
                <h5 class="card-text text-center">365Kal</h5>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('Default.js') }}"></script>
<script>
    window.onload = function() {
        cekLogin();
        cekAdmin();
    };
</script>