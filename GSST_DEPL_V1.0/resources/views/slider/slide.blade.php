@extends('app.layout')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
.card{
    width: 100%;
    height: 100%;
    align-items: center;
}
.carousel-item{
  max-height: 490px;
}
.carousel-item h5{
    font-size: 52px;
    color: rgb(252, 252, 252);
}
.carousel-item p{
    font-size: 30px;
    color: rgb(243, 243, 243);
}
/* .carousel-control-next-icon{
    color: rgb(6, 6, 6);
    background: rgb(6, 6, 6);
} */
</style>
@endsection
@section('content')
<div class="card">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('slide/pexels-pixabay-260367.jpg')}}" class="d-block w-100" alt="Image">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('slide/pexels-pixabay-260367.jpg')}}" class="d-block w-100" alt="Image">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('slide/pexels-pixabay-266583.jpg')}}" class="d-block w-100" alt="Image">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
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
</div>
@endsection
@section('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
@endsection
