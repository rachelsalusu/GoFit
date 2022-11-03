@extends('layouts.dashboard.main')

@section('content')

<form action="{{route('merchant.dashboard.update', $data)}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <div class="row" style="margin-top: 100px">
        <div class="col-4">
            <div class="mb-3">
                @if($data->image)
                <img src="{{ asset('storage/' . $data->image) }}" class="img-preview logo-profile mx-auto d-block">
                @else
                <img class="img-preview logo-profile">
                @endif
                <input class="mt-4 form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-8">
            <div class="form-floating mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control border-nameinput @error('name') is-invalid @enderror"
                    id="name" placeholder="Name" required value="{{ $data->name }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <label for="deskripsi">Description</label>
                    <textarea name="deskripsi" class="border-deskinput form-control @error('deskripsi') is-invalid @enderror" 
                    id="deskripsi" cols="23" rows="4" placeholder="deskripsi" required >{{ $data->deskripsi }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn btn-updateprofile" type="submit">Update</button>
        </div>
    </div>
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