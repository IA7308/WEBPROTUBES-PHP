<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="profile.css">
    <title>Profil Saya</title>
</head>

<body style="background-color: #C394E8;">
    <span role="button" id="open-sidebar" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#mySidebar"
        aria-controls="mySidebar" style="font-size: 30px; cursor: pointer;">&#9776;</span>
    <a href="/Dashboard" id="home-link" style="position: absolute; top: 20px; right: 20px; font-size: 30px;">
        &#127968;
    </a>
    <div id="mySidebar" class="offcanvas offcanvas-start" tabindex="-1" style="background-color: #a00066;">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" style="color: white;">Profile</h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <center>
                    <img src="{{url('public/Image/'.$prods->Image)}}" alt="Profil Saya" class="rounded-circle img-fluid"
                        id="profile-image" style="width: 200px;">
                </center>
                <p id="usernameP" style="color: white;">{{$prods->Username}}</p>
                <p id="phoneP" style="color: white;">{{$prods->NoHP}}</p>
                <p id="statusP" style="color: white;">{{$prods->status}}</p>
                <p id="ageP" style="color: white;">{{$prods->Umur}}</p>
                <p id="noteP" style="color: white;">{{$prods->Note}}</p>
            </div>
        </div>
    </div>
    <div class="container container-shifted" style="margin-top: 100px;">
        <form method="POST" action="/{{ $action }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="{{ $method }}" />
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="background-color: #a00066;" id="gambar">
                        <div class="card-body text-center">
                            <label for="upload" style="cursor:pointer;">
                                <img src="{{url('public/Image/'.$prods->Image)}}" alt="Profil Saya"
                                    class="rounded-circle img-fluid" style="width: 200px; height: 200px;">
                                <input type="file" name="Image" id="upload" style="display: none;">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            Edit Profile
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="Username" class="form-control" id="username"
                                    placeholder="Username" value="{{ isset($prods)?$prods->Username:'' }}">
                            </div>
                            <div class="mb-3">
                                <label for="NoHP" class="form-label">No HP</label>
                                <input type="text" name="NoHP" class="form-control" id="NoHP" placeholder="No HP"
                                    value="{{ isset($prods)?$prods->NoHP:'' }}">
                            </div>
                            <div class="mb-3">
                                <label for="Status" class="form-label">Status</label>
                                <input type="text" name="Status" class="form-control" id="Status" placeholder="Status"
                                    value="{{ isset($prods)?$prods->Status:'' }}">
                            </div>
                            <div class="mb-3">
                                <label for="Umur" class="form-label">Umur</label>
                                <input type="date" name="Umur" class="form-control" id="Umur"
                                    value="{{ isset($prods)?$prods->Umur:'' }}">
                            </div>
                            <div class="mb-3">
                                <label for="Note" class="form-label">Note</label>
                                <input type="text" name="Note" class="form-control" id="Note" placeholder="Note"
                                    value="{{ isset($prods)?$prods->Note:'' }}">
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('Default.js') }}"></script>
</body>

</html>