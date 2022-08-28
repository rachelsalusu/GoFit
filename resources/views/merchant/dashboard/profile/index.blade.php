@extends('layouts.dashboard.main')

@section('content')
<div class="col-md-6 mb-4" style="width: 10%;">
    <img class="rounded-circle z-depth-2 img-fluid" alt="" src="{{ asset('storage/' . $data->image) }}"
    data-holder-rendered="true">
</div>
<div>
    <strong>Description</strong> <br>
    {{ $data->deskripsi }}
</div> 
<form action="{{route('merchant.dashboard.update', $data)}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <div class="mb-3">
        <label for="image" class="form-label">Profile Image</label>
        @if($data->image)
        <img src="{{ asset('storage/' . $data->image) }}" class="img-preview img-fluid mb-4 col-sm-2 d-block">
        @else
        <img class="img-preview img-fluid mb-4 col-sm-2">
        @endif
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
            onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
            id="name" placeholder="Name" required value="{{ $data->name }}">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <label for="deskripsi">deskripsi</label>
        <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
            id="deskripsi" placeholder="deskripsi" required value="{{ $data->deskripsi }}">
        @error('deskripsi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Update</button>
</form>

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