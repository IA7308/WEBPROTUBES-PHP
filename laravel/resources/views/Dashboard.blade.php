<!DOCTYPE html>

<head>
    <!--BOOTSTRAP 5--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Code-->
    <title>Dashboard</title>
    <!--CSS--> 
    <link rel="stylesheet" href="{{ asset('NavBar.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard.css') }}">


</head>     
<body style="background-color: #C394E8;">
    @component('Component.Navbar')
    @endcomponent

    @if(session('statusAdmin') === true)
        @component('Component.Admin')
        @endcomponent
    @endif
    <!--KONTEN-->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Previous"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            @foreach($prods as $d)
            <div class="carousel-item active">
                <img src="{{url('public/Image/'.$d->Image)}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{$d->Judul}}</h5>
                    <p>{{$d->Deskripsi}}</p>
                </div>
            </div>
            @endforeach
            <div class="carousel-item">
                <img src="/Image/img2.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Hidup Sehat Itu Penting</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, minima. Consequuntur voluptas
                        eius perferendis adipisci itaque voluptatem odit sed ad aut a, est animi ipsam omnis pariatur
                        nemo facere nostrum.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</body>

<script src="{{ asset('Default.js') }}"></script>
<script>
    window.onload = function() {
        cekLogin();
        cekAdmin();
    };
</script>