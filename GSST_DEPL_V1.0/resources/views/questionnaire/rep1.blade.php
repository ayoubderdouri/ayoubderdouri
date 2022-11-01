<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       table {
    border-left: 0.01em solid #ccc;
    border-right: 0;
    border-top: 0.01em solid #ccc;
    border-bottom: 0;
    border-collapse: collapse;
}
table td,
table th {
    border-left: 0;
    border-right: 0.01em solid #ccc;
    border-top: 0;
    border-bottom: 0.01em solid #ccc;
}
    </style>
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

    <div class="row justify-content-center">
    <table >
        <tr>
         <td rowspan="2">
            <img src="{{public_path('images/logoMM.jpg')}}" alt="Image"  height="60" width="200">
         </td>
         <td colspan="2" style="text-decoration: underline;">{{$details['Questionnaire']->titre}}</td>
        </tr >
        <tr>
         <td>Document :</td>
         <td>EN.QAP.PL.MANG.11</td>
        </tr>
       </table>
       <br>
       <div class="card">
        <div class="card-header">
            <div class="row justify-content-center">
                <p class="card-text">{{$details['Questionnaire']->description}}</p>
                {{-- <div class="d-flex justify-content-center"><h4 ><u> Cochez la réponse qui vous parait la plus appropriée.</u> </h4></div> --}}

                </div>
              </div>
                  <div class="card-body">

                  @foreach ($details['section'] as $sec)
            <div class="row justify-content-center">
            <div class="card ">
                <div class="card-header">
                    <h6 class="fw-bold" > <input type="hidden" value="{{$sec->titre}}" name="{{$sec->id}}">{{$sec->ordre}}){{$sec->titre}} </h6>
                    </div>
                <div class="card-body">

                    <table style="width: 100%;">
                        <tr>
                            <th>Question</th>
                            <th>Reponce</th>
                        </tr>
                        @foreach ($sec->questions as $ques)
                        <tr>

                            <td>{{$ques->question}}</td>
                            <td>{{$details['req']->input('rep'.$ques->id)}}</td>
                        </tr>
                        @endforeach
                    </table>


                </div>

            </div>
        </div>
        <br>
            @endforeach
            <div class="card">
                <div class="card-body">
                    <table style="width: 100%;">
                        <tr>
                            <th>Des remarques</th>
                        </tr>
                        <tr>
                            <td>
                                {{$details['req']->input('comments')}}
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table style="width: 100%;">
                        <tr>
                            <th>Fait le</th>
                            <td> {{$details['req']->input('lieu')}}</td>
                        </tr>
                        <tr>
                            <th>
                                Le
                            </th>
                            <td>
                                {{$details['req']->input('date')}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
