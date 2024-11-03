<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('NavBar.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard.css') }}">
    <title>Dashboard</title>
</head>

<body style="background-color: #C394E8;">
    @component('Component.Navbar')
    @endcomponent

    @if(session('statusAdmin') === true)
        @component('Component.AdminDash')
        @endcomponent
    @endif

    <!-- Carousel Section -->
    <div id="carouselExampleCaptions" class="carousel slide mb-5">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            @foreach($prods as $index => $d)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ url('public/Image/'.$d->Image) }}" class="d-block w-100" alt="{{ $d->Judul }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $d->Judul }}</h5>
                        <p>{{ $d->Deskripsi }}</p>
                        @if(session('statusAdmin') === true)
                        <div class="d-flex justify-content-evenly">
                            <a href="/dashboard/{{ $d->id }}/edit"><input type="button" class="btn btn-success" value="Edit"></a>
                            <form method="post" action="/dashboard/{{ $d->id }}/delete" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Menu Diet Terbaru Section -->
    <section class="container my-5">
        <h2>Menu Diet Terbaru</h2>
        <div class="row">
            @foreach($newProds as $prod)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ url('public/Image/'.$prod->Image) }}" class="card-img-top" alt="{{ $prod->Judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $prod->Judul }}</h5>
                            <p class="card-text">{{ Str::limit($prod->Deskripsi, 100) }}</p>
                            <a href="/dashboard/{{ $prod->id }}/detail" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Statistik Section -->
    <section class="container my-5">
        <h2>Statistik Dashboard</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="p-4 bg-light rounded">
                    <h3>Total Menu Diet</h3>
                    <p class="display-4">{{ $totalProducts }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-light rounded">
                    <h3>Menu Diet Terpopuler</h3>
                    <p>{{ $mostViewed->Judul ?? 'Belum ada data' }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-light rounded">
                    <h3>Kategori Terlaris</h3>
                    <p>{{ $topCategory->category ?? 'Belum ada data' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni Section -->
    <section class="container my-5">
        <h2>Testimoni Pengguna</h2>
        <div class="row">
            @foreach($testimonials as $testimonial)
                <div class="col-md-6 mb-4">
                    <div class="bg-white p-3 rounded shadow-sm">
                        <blockquote class="blockquote">
                            <p>"{{ $testimonial->review }}"</p>
                            <footer class="blockquote-footer">{{ $testimonial->user_name }}</footer>
                        </blockquote>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Form Tambah Menu Diet Baru (Admin) -->
    @if(session('statusAdmin') === true)
    <section class="container my-5">
        <h2>Tambah Menu Diet Baru</h2>
        <form action="/dashboard/add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Menu Diet</label>
                <input type="text" name="Judul" id="judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="Deskripsi" id="deskripsi" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Menu Diet</label>
                <input type="file" name="Image" id="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
    </section>
    @endif

    <!-- JS -->
    <script src="{{ asset('Default.js') }}"></script>
    <script>
        window.onload = function() {
            cekLogin();
            cekAdmin();
        };
    </script>
</body>

</html>
