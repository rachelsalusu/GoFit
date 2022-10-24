@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-6" style="padding-bottom: 200px">
        <img class="merchant-status-img " src="{{ asset("image/registermerchant.png") }}" alt="">
    </div>
    <div class="col-6">
            <h1 class="mb-3 font-titleregis" style="padding-top: 100px">Register</h1>
            <form action="{{route('merchant.merchantRegister')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label font-sub-titleregis">Profile Image</label>
                    <img class="img-preview img-fluid mb-4 col-sm-2">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                        onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3 font-sub-titleregis">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
                        id="name" placeholder="Name" required value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3 font-sub-titleregis">
                    <label for="deskripsi">deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                        id="deskripsi" placeholder="deskripsi" required value="{{ old('deskripsi') }}">
                    @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <button class="w-100 btn btn-order mt-3 mb-3" type="submit">Register</button>
            </form>
    </div>
</div>

@endsection

@section('script')
<script>
    const csrf_token = "{{csrf_token()}}";

    // previewImage
    function previewImage(){

        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
<script src="{{URL::asset('/js/select2-conf.js')}}" defer></script>
@endsection