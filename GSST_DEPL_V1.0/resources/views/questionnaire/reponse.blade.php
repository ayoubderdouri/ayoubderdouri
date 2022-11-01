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
@if ($successMsg)
<div class="alert alert-success">
    <p>{{ $successMsg }}</p>
</div>
@elseif ($erreurMsg)
<div class="alert alert-danger">
    <p>{{ $erreurMsg }}</p>
</div>
@endif
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-stretch">
            <div class="p-2 bd-highlight">
                <img src="{{asset('images/logoMM.png')}}" alt="Image"  height="60" width="200">
            </div>
            <div class="d-flex" style="height: 60px;">
                <div class="vr"></div>
              </div>
             <div class="p-2 bd-highlight">{{$details['Questionnaire']->titre}}</div>
             <div class="d-flex" style="height: 60px;">
             <div class="vr"></div>
             </div>
            <div class="p-2 bd-highlight">EN.QAP.PL.MANG.11</div>
            </div>
          </div>
              <div class="card-body">
                <div class="row justify-content-center">
                <p class="card-text">{{$details['Questionnaire']->description}}</p>
                <div class="d-flex justify-content-center"><h4 ><u> Cochez la réponse qui vous parait la plus appropriée.</u> </h4></div>

                </div>
              @foreach ($details['section'] as $sec)
        <div class="row justify-content-center">
        <div class="card ">
            <div class="card-header">
                <h6 class="fw-bold" > <input type="hidden" value="{{$sec->titre}}" name="{{$sec->id}}">{{$sec->ordre}}){{$sec->titre}} </h6>
                </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($sec->questions as $ques)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div >{{$ques->question}}</div>
                          </div>
                          <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight"></div>
                            <div class="p-2 bd-highlight">
                              {{$details['req']->input('rep'.$ques->id)}}
                            </div>

                          </div>
                    </li>

                    @endforeach
                  </ul>

            </div>

        </div>
    </div>
    <br>
        @endforeach
        <div class="row justify-content-center">
          <p class="card-text">Des remarques</p>
          <div class="form-floating">
            {{$details['req']->input('comments')}}
          </div>
          <hr>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Fait a</label>
          {{$details['req']->input('lieu')}}
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Le</label>
            {{$details['req']->input('date')}}
          </div>
          </div>
    </div>
</div>
@endsection
