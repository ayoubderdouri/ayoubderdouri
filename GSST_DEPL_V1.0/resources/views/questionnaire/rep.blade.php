<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GSST DEPL</title>
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-stretch">
                <div class="p-2 bd-highlight">
                    <img src="{{public_path('images/profile1.jpg')}}" alt="Image"  height="60" width="200">
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
</body>
</html>
