<!DOCTYPE html>

<head>
    <!--BOOTSTRAP 5--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--CODE-->
    <title>Timeline</title>
    <!--CSS-->
    <link rel="stylesheet" href="./Component/NavBar.css">
</head>

<body style="background-color: #C394E8;">
    <!--NAVBAR-->
    @component('Component.Navbar')
    @endcomponent
        
    <!--Konten-->
    <div class="container" style="margin-top:6%;">
        <div class="row">
            <div class="col-3">
                <div class="container">
                    <div class="card" style="background-color: #FFF4E1;">
                        <img src="{{url('public/Image/'.$user->Image)}}" alt="BigMan" class="w-20">
                        <h5 class="text-start">{{$user->Username}}</h5>
                        <p class="text-start">{{$user->Status}}</p>
                    </div>
                </div>
            </div>
            <div class="col" style="background-color : #5D3A9B">
                <form class="form-group" method="POST" action="{{$action}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="{{ $method }}" />
                    <br>
                    <label for="upload" style="cursor: pointer; width: 100%;">
                        <div class="card" style="background-color: #C394E8; border: 2px dashed #000;">
                            <div class="card-body text-center">
                                <img src="/Image/Timeline/UploadIcon-removebg-preview.png" alt="Upload Gambar"><br>
                                <p>Upload Gambar</p>
                                <input type="file" id="upload" name="Image">
                            </div>
                        </div>
                    </label>
                    <div class="mt-3">
                        <textarea class="form-control" rows="4" style="background-color: aqua;" name="Message"
                            placeholder="Send Message..."></textarea>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                </form>
                <a href="/timelineOrderBy">OrderBy</a>
                <div class="container text-center mt-4" style="background-color : #5D3A9B">
                        @foreach($prods as $d)
                        <div class="row items-center mb-4">
                            <div class="col-2 p-2" style="background-color: #C394E8;">
                                <img src="{{url('public/Image/'.$d->Image)}}" alt="BigMan" class="rounded-circle w-20"
                                    style="width: 120px; position: relative;">
                            </div>
                            <div class="col p-2" style="background-color: #C394E8;">
                            @if(session('username')==$d->Username)
                                @component('Component.CompTimeline', ['data' => $d, 'page' => 'timeline'])
                                @endcomponent
                            @endif
                                <label for="Name" class="float-start"
                                    style="position: relative;">{{$d->Username}}</label>
                                <p class="float-end" style="font-weight: lighter">{{$d->updated_at}}</p>
                                    <br>
                                <p class="float text-start" style="background-color: #C394E8;">
                                    {{$d->Message}}
                                </p>
                            </div>
                        </div>   
                        @endforeach
                </div>
            </div>

        </div>
    </div>
</body>

<footer>
    <!--UPLOAD BUTTON-->
    <div class="position-relative">
        <a href="/timeline/{{session('id')}}/create-timeline" onclick="return AlertLogin();"><img src="./Image/Timeline/UploadIcon-removebg-preview.png" alt="Upload" class="rounded-circle position-fixed bottom-0 end-0"></a>
    </div>

</footer>

<script src="{{ asset('Default.js') }}"></script>
<script>
    window.onload = function() {
        cekLogin();
        cekAdmin();
    };
</script>
