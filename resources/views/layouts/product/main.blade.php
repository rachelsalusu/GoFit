<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/86eb6f6c32.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="{{URL::asset('/css/style.css')}}">
    <title></title>
</head>

<body>
    {{-- NAVBAR --}}
    @include('layouts.product.navbar')

    <div class="container pt-3">
        {{-- CONTENT --}}
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('layouts.footer')


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    {{-- SELECT2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // REMOVE ATTACH FILE TRIX JS
        document.addEventListener('trix-file-accept', function(event) {
            e.preventDefault();
        });
    
        function previewImage(){
            const image = document.querySelector('#image');
            const preview = document.querySelector('.img-preview');
            preview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent){
                preview.src = oFREvent.target.result;
            };
        }
    </script>
    @yield('script')
</body>

</html>