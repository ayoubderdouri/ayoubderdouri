@extends('app.layout')
@section('css')
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
  rel="stylesheet"
/>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="card w-50">
        <div class="card-header">
            <h6>Selectionnez le processus que vous voulez</h6>
        </div>
      <div class="card-body">
          <ul>
              @foreach ($processus as $P)
              <li>{{$P->nomProcessus}} <a href="{{url('risque-index/'.$P->id)}}"><i class='bx bx-link-external'></i></a></li>
              @endforeach
            </ul>

    </div>
</div>
@endsection
