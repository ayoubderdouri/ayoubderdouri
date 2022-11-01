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
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-stretch">
            <div class="p-2 bd-highlight">
                <img src="{{asset('images/logoMM.png')}}" alt="Image"  height="60" width="200">
            </div>
            <div class="d-flex" style="height: 60px;">
                <div class="vr"></div>
              </div>
             <div class="p-2 bd-highlight">{{$Questionnaire->titre}}</div>
             <div class="d-flex" style="height: 60px;">
             <div class="vr"></div>
             </div>
            <div class="p-2 bd-highlight">EN.QAP.PL.MANG.11</div>
            </div>
          </div>
              <div class="card-body">
                <div class="row justify-content-center">
                <p class="card-text">{{$Questionnaire->description}}</p>
                <div class="d-flex justify-content-center"><h4 ><u> Cochez la réponse qui vous parait la plus appropriée.</u> </h4></div>

                </div>
              @foreach ($section as $sec)
        <div class="row justify-content-center">
        <div class="card ">
          <form action="{{url('sendQuestionnaire/'.$Questionnaire->id)}}" method="POST">
            @csrf
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
                            <div class="p-2 bd-highlight"><input type="hidden" value="{{$ques->question}}"></div>
                            <div class="p-2 bd-highlight">
                                <select name="{{'rep'.$ques->id}}" id="" class="form-control">
                              <option value="" disabled selected hidden>Selectionnez une choix</option>
                              <option value="Pas du tout d'accord">Pas du tout d'accord</option>
                              <option value="Plutot pas d'accord">Plutot pas d'accord</option>
                              <option value="Plutot d'accord">Plutot d'accord</option>
                              <option value="tout a fait d'accord">tout a fait d'accord</option>
                            </select>
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
          <p class="card-text">Avez-vous des remarques,des suggestions ou des commentaires a effectuer ?</p>
          <div class="form-floating">
            <textarea class="form-control" name="comments" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>

          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Fait a</label>
            <input type="text" name="lieu" class="form-control" id="inputEmail4" required>
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Le</label>
            <input type="date" class="form-control"  name="date" id="inputPassword4" required>
          </div>

          </div>
    </div>
    <div class="card-footer text-muted">
     <button type="submit" class="btn btn-primary ">Envoyer</button>
    </form>
    </div>
</div>
@endsection
