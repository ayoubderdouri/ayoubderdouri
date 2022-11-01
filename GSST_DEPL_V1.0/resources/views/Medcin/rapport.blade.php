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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

    <div class="row justify-content-center">
    {{-- <div class="card "> --}}

        {{-- <div class="card-header"> --}}
    <table >
        <tr>
         <td rowspan="2">
         Marsa Maroc
         </td>
         <td colspan="14" style="text-decoration: underline;">Medcin GSST DEPL</td>
        </tr >
        <tr>
         <td>Document :</td>
         <td>E</td>
         <td>N</td>
         <td>R</td>
         <td>D</td>
         <td>S</td>
         <td>P</td>
         <td>L</td>
         <td>M</td>
         <td>A</td>
         <td>N</td>
         <td>G</td>
         <td>1</td>
         <td>0</td>
        </tr>
       </table>
    {{-- </div> --}}

    {{-- <div class="card-body"> --}}
        <br>
        <p>les information personnel</p>
        <br>
        <div class="card text-dark  mb-3" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nom</h6>
                    </div>
                    <div class="col-sm-9 text-primary">
                        {{$travailleur->nom}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Prenom</h6>
                    </div>
                    <div class="col-sm-9 text-primary">
                          {{$travailleur->prenom}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">CIN</h6>
                    </div>
                    <div class="col-sm-9 text-primary">
                        {{$travailleur->cin}}
                    </div>
                  </div>
                  <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Sexe</h6>
                </div>
                <div class="col-sm-9 text-primary">
                    {{$travailleur->sexe}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Situation Social</h6>
                </div>
                <div class="col-sm-9 text-primary">
                    {{$travailleur->situation}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col">
                  <h6 >Date de Naissance</h6>
                </div>
                <div class="col-sm-9 text-primary">
                    {{$travailleur->dateNaissance}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Lieu de naissance</h6>
                </div>
                <div class="col-sm-9 text-primary">
                    {{$travailleur->lieuNaissance}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Affeliation CNOPS</h6>
                </div>
                <div class="col-sm-9 text-primary">
                    {{$travailleur->affeliation_cnops}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">groupe sanguin</h6>
                </div>
                <div class="col-sm-9 text-primary">
                    {{$travailleur->group_sanguin}}
                </div>
              </div>
            </div>
          </div>
        <br>
        <p>liste des visites</p>

        <br>
        <table >
                <tr>
                    <th>Date de Visite</th>
                    <th>Resultat</th>
                    <th>Recommendation</th>
                </tr>
             @foreach ($visite as $item )
                    <tr>
                        <td> {{$item->dateVisite}}</td>
                        <td> {{$item->resultat}}</td>
                        <td> {{$item->recommendation}}</td>

                    </tr>
            @endforeach
        </table>
    {{-- </div> --}}
 {{-- </div> --}}
</div>
</body>
</html>
