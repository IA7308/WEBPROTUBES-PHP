<!DOCTYPE html>
<head>
    <!--BOOTSTRAP 5--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--AJAX-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="{{ asset('NavBar.css') }}">
</head>
<body>
    <!--Code-->
    <!--NAVBAR-->
    <div class="NavBar sticky-top">
        <div class="row g-0">
            <div class="col-6" >
                <div class="d-flex flex-row">
                    <div class="p-2">
                        <a href="/Dashboard"><img src="/Image/HealthSIs.jpg" alt="Logo HealthSIs" id="LogoHS" style="width: 45px;"></a>
                    </div>
<<<<<<< HEAD
                    <div class="p-2" id="ProfBar"><a href="Profile.html" class="form-text" style="color: white;">Profile</a></div>
                    <div class="p-2"><a href="menudiet" class="form-text" style="color: white;">Menu Diet</a></div>
=======
                    <div class="p-2" id="ProfBar"><a href="/HealthSis/{id}/update" class="form-text" style="color: white;">Profile</a></div>
                    <div class="p-2"><a href="Menu Diet.html" class="form-text" style="color: white;">Menu Diet</a></div>
>>>>>>> 91ae70fdff70879397d42b1030f37d720ea666a6
                    <div class="p-2"><a href="Artikel.html" class="form-text" style="color: white;">Artikel</a></div>
                    <div class="p-2"><a href="Timeline.html" class="form-text" style="color: white;">Timeline</a></div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-row-reverse">
                    <div class="p-2" id="LoginBar"><a href="/Login" class="form-text" style="color: white;">Login</a></div>
                    <div class="p-2" id="SignUpBar"><a href="/register" class="form-text" style="color: white;">Register</a></div>
                    <div class="p-2" id="ProfileBar"><a href="/Profile" class="form-text" style="color: white;">{{ session('username') }} </a></div>
                    <div class="p-2" id="SignOutBar"><a href="/Dashboard" class="form-text" onclick="LogOut()" style="color: white;">SignOut</a></div>
                </div>      
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