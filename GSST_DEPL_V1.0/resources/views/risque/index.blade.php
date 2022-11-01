@extends('app.layout')
@section('css')
<link rel="stylesheet" href="{{asset('css/about_travailleur.css')}}">
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
@foreach ($risque as $data)
{{-- modal pour visualiser risque details --}}
<div class="modal fade" id="exampleModalToggle{{$data->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">details pour {{$data->titre}} </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <div class="form-group mb-3">
                <div class="row gy-2 gx-3 align-items-center">
                    <label for="" style="font-size: 52px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Identifier</label>
                </div>
                <hr class="dropdown-divider">
                <div class="form-group mb-3">
                    <label for="milieu">Precessus</label>
                    <input type="text" name="nomProcessus" value="{{$nomProcessus}}" class="form-control" placeholder=""  readonly>
                  </div>
              <label for="titre">Risque</label>
              <input type="text" name="titre" id="" class="form-control" value="{{$data->titre}}"  readonly>
            </div>
            <div class="form-group mb-3">
                <label for="milieu">Danger</label>
                <input type="text" name="danger" id="" class="form-control" placeholder="" value="{{$data->danger}}"  readonly>
              </div>
          <div class="form-group mb-3">
              <label for="milieu">Milieu</label>
              <input type="text" name="milieu" id="" class="form-control" placeholder="" value="{{$data->milieu}}"  readonly>
            </div>
            <div class="form-group mb-3">
              <label for="activite">Activite</label>
              <input type="text" name="activite" id="" class="form-control" placeholder=""  value="{{$data->activite}}" readonly>
            </div>
            <div class="row gy-2 gx-3 align-items-center">
              <label for="" style="font-size: 52px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Mesurer</label>
          </div>
            <hr class="dropdown-divider">
             <div class="row g-3">
            <div class="col-md-6">
              <label for="customRange3" class="form-label">Durée d'exploitation </label>
              <input type="number" class="form-control" name="duree" max="4" min="1"   value="{{$data->duree}}" readonly >
          </div>
          <div class="col-md-6">
              <label for="customRange3" class="form-label">Fréquence </label>
              <input type="number" class="form-control"  max="4" min="1" name="frequence"  value="{{$data->frequence}}" readonly>
              {{-- <small id="helpId" class="text-muted">

              </small> --}}
          </div>
          </div>

          <div class="row g-3">
          <div class="col-md-6">
              <label for="customRange3" class="form-label">Gravité </label>
              <input type="number" class="form-control"  name="gravite" max="5" min="1"  value="{{$data->gravite}}" readonly>

          </div>
          <div class="col-md-6">
              <label for="customRange3" class="form-label">Coefficient de Maitrise </label>
              <input type="number" class="form-control"  name="coeffecient" max="4" min="1"  value="{{$data->coeffecient}}" readonly>
          </div>
      </div>
      <div class="row g-3">
        <div class="col-md-6">
            <label for="customRange3" class="form-label">Probabilte </label>
            {{-- $risque->criticite=($risque->probabilite)*($risque->coeffecient)*($risque->gravite); --}}
            <input type="number" class="form-control"  name="gravite"  value="{{$data->probabilite}}" readonly>

        </div>
        <div class="col-md-6">
            <label for="customRange3" class="form-label">Criticite </label>
            <input type="number" class="form-control"  name="coeffecient"   value="{{$data->criticite}}" readonly>
        </div>
      </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2{{$data->id}}" data-bs-toggle="modal" data-bs-dismiss="modal">editer</button>
        </div>
      </div>
    </div>
  </div>
{{-- modal pour editer risque details --}}
  <div class="modal fade" id="exampleModalToggle2{{$data->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('update-risque/'.$data->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="form-group mb-3">
                <div class="row gy-2 gx-3 align-items-center">
                    <label for="" style="font-size: 52px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Identifier</label>
                </div>
                <hr>
              <label for="titre">Risque</label>
              <input type="text" name="titre" id="" class="form-control" value="{{$data->titre}}"  required>
            </div>
            <div class="form-group mb-3">
                <label for="milieu">Precessus</label>
                <input type="text" name="nomProcessus" value="{{$nomProcessus}}" class="form-control" placeholder=""  readonly>
              </div>
            <div class="form-group mb-3">
                <label for="milieu">Danger</label>
                <input type="text" name="danger" id="" class="form-control" placeholder="" value="{{$data->danger}}" required>
              </div>
          <div class="form-group mb-3">
              <label for="milieu">Milieu</label>
              <input type="text" name="milieu" id="" class="form-control" placeholder="" value="{{$data->milieu}}"  required>
            </div>
            <div class="form-group mb-3">
              <label for="activite">Activite</label>
              <input type="text" name="activite" id="" class="form-control" placeholder=""  value="{{$data->activite}}" required>
            </div>
            <div class="row gy-2 gx-3 align-items-center">
              <label for="" style="font-size: 52px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Mesurer</label>
          </div>
            <hr class="dropdown-divider">
             <div class="row g-3">
            <div class="col-md-6">
              <label for="customRange3" class="form-label">Durée d'exploitation </label>
              <input type="number" class="form-control" name="duree" max="4" min="1"   value="{{$data->duree}}" required >
          </div>
          <div class="col-md-6">
              <label for="customRange3" class="form-label">Fréquence </label>
              <input type="number" class="form-control"  max="4" min="1" name="frequence"  value="{{$data->frequence}}" required>
              {{-- <small id="helpId" class="text-muted">

              </small> --}}
          </div>
          </div>

          <div class="row g-3">
          <div class="col-md-6">
              <label for="customRange3" class="form-label">Gravité </label>
              <input type="number" class="form-control"  name="gravite" max="5" min="1"  value="{{$data->gravite}}" required>

          </div>
          <div class="col-md-6">
              <label for="customRange3" class="form-label">Coefficient de Maitrise </label>
              <input type="number" class="form-control"  name="coeffecient" max="4" min="1"  value="{{$data->coeffecient}}" required>
          </div>
      </div>
        </div>
        <div class="modal-footer">
        <button class="btn btn-success btn-sm" type="submit">Enregistrer</button>
        </form>
          <button class="btn btn-secondary btn-sm" data-bs-target="#exampleModalToggle{{$data->id}}" data-bs-toggle="modal" data-bs-dismiss="modal">Reteur</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach

{{--modal pour  ajouter new risque--}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Identifier un risque</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('add-risque')}}" method="POST">
            @csrf
        <div class="modal-body">
            {{-- No Risques Présence Description Priorité Moyens de  --}}
            <div class="form-group mb-3">
                <label for="milieu">Precessus</label>
                <input type="text" name="nomProcessus" value="{{$nomProcessus}}" class="form-control" placeholder=""  readonly>
              </div>
              <div class="form-group mb-3">
                  <div class="row gy-2 gx-3 align-items-center">
                      <label for="" style="font-size: 52px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Identifier</label>
                  </div>
                  <hr class="dropdown-divider">
                <label for="titre">Risque</label>
                <input type="text" name="titre" id="" class="form-control" placeholder=""  required>
              </div>
              <div class="form-group mb-3">
                <label for="milieu">Danger</label>
                <input type="text" name="danger" id="" class="form-control" placeholder=""  required>
              </div>
            <div class="form-group mb-3">
                <label for="milieu">Milieu</label>
                <input type="text" name="milieu" id="" class="form-control" placeholder=""  required>
              </div>
              <div class="form-group mb-3">
                <label for="activite">Activite</label>
                <input type="text" name="activite" id="" class="form-control" placeholder=""  required>
              </div>
              <div class="row gy-2 gx-3 align-items-center">
                <label for="" style="font-size: 52px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Mesurer</label>
            </div>
              <hr class="dropdown-divider">
               <div class="row g-3">
              <div class="col-md-6">
                <label for="customRange3" class="form-label">Durée d'exploitation </label>
                <input type="number" class="form-control" name="duree" max="4" min="1"  required>
            </div>
            <div class="col-md-6">
                <label for="customRange3" class="form-label">Fréquence </label>
                <input type="number" class="form-control"  max="4" min="1" name="frequence"  required>

            </div>
            </div>

            <div class="row g-3">
            <div class="col-md-6">
                <label for="customRange3" class="form-label">Gravité </label>
                <input type="number" class="form-control"  name="gravite" max="5" min="1" required>

            </div>
            <div class="col-md-6">
                <label for="customRange3" class="form-label">Coefficient de Maitrise </label>
                <input type="number" class="form-control"  name="coeffecient" max="4" min="1" required>
            </div>
        </div>
        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- opprtinite modal for edit and show  --}}
@foreach ($opportunite as $opportu)
<div class="modal fade" id="opportunite{{$opportu->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter nouveau opportunité</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <form action="{{url('update-opportunite/'.$opportu->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="container">
                <label for="" style="font-size: 52px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">identifier</label>
                <hr>
                <div class="form-group mb-3">
                    <label for="milieu">Precessus</label>
                    <input type="text" name="nomProcessus" value="{{$nomProcessus}}" class="form-control" placeholder=""  readonly>
                  </div>
                <div class="form-group mb-3">
                    <label for="activite">Objet</label>
                    <input type="text" name="objet" id="" class="form-control" value="{{$opportu->objet}}" placeholder=""  required>
                  </div>
                  <label for="" style="font-size: 52px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">mesurer</label>
                  <hr>
                <div class="row">
                  <div class="col">
                    <label for="customRange3" class="form-label">Bénéfice</label>
                <input type="number" class="form-control"  name="benifice" value="{{$opportu->benifice}}" max="3" min="1" required>
                  </div>
                  <div class="col">
                    <label for="customRange3" class="form-label">Profit</label>
                <input type="number" class="form-control"  name="profit" max="3" value="{{$opportu->profit}}" min="1" required>
                  </div>
                  <div class="col">
                    <label for="customRange3" class="form-label">Facilité</label>
                    <input type="number" class="form-control"  name="facilite" max="3" value="{{$opportu->facilite}}" min="1" required>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endforeach
  {{-- opportunite --}}

  <div class="modal fade" id="opportunite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter nouveau opportunité</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <form action="{{url('add-opportunite')}}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="container">
                <label for="" style="font-size: 52px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">identifier</label>
                <hr>
                <div class="form-group mb-3">
                    <label for="milieu">Precessus</label>
                    <input type="text" name="nomProcessus" value="{{$nomProcessus}}" class="form-control" placeholder=""  readonly>
                  </div>
                <div class="form-group mb-3">
                    <label for="activite">Objet</label>
                    <input type="text" name="objet" id="" class="form-control" placeholder=""  required>
                  </div>
                  <label for="" style="font-size: 52px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">mesurer</label>
                  <hr>
                <div class="row">
                  <div class="col">
                    <label for="customRange3" class="form-label">Bénéfice</label>
                <input type="number" class="form-control"  name="benifice" max="3" min="1" required>
                  </div>
                  <div class="col">
                    <label for="customRange3" class="form-label">Profit</label>
                <input type="number" class="form-control"  name="profit" max="3" min="1" required>
                  </div>
                  <div class="col">
                    <label for="customRange3" class="form-label">Facilité</label>
                    <input type="number" class="form-control"  name="facilite" max="3" min="1" required>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('success_opp'))
<div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
@endif
 <div class="card">
     <div class="card-header">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Liste des Risques </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Liste des opportunités</a>
            </li>
          </ul>
          <a href="{{url('risque-page')}}" class="btn btn-secondary btn float-end btn-sm">retour</a>
     </div>
 </div>

  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">

            <div class="card">
            {{-- <div class="card-header"> --}}
                <div class="card-header">
                 <h6>
                     Identifier Nouveau risque
                    <a href="#" class="btn btn-primary btn float-end" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bx-plus'></i></a>
                </h6>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped" style="width:100%">
                        {{-- //table table-hover --}}
                        <thead>
                            <tr>
                                <th>Risque</th>
                                <th>Danger</th>
                                <th> Milieu</th>
                                <th> Activite</th>
                                <th> Niveaus de Priorite</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>

                         @foreach ($risque as $item )
                                <tr>
                                    <td> {{$item->titre}}</td>


                                    <td>{{$item->danger}}</td>

                                    <td> {{$item->milieu}}</td>
                                    <td> {{$item->activite}}</td>
                                    @if ($item->priorite =='Bas')
                                    <td><span class="badge bg-success">{{$item->priorite}}</span></td>
                                    @elseif ($item->priorite =='Moyen')
                                    <td><span class="badge bg-info">{{$item->priorite}}</span></td>
                                    @elseif ($item->priorite =='Elevé')
                                    <td><span class="badge bg-warning">{{$item->priorite}}</span></td>
                                    @else
                                    <td><span class="badge bg-danger">{{$item->priorite}}</span></td>
                                    @endif
                                    <td>
                                        <a  href="#" role="button"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class='bx bx-chevron-down'></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li>
                                                <a class="dropdown-item" data-bs-toggle="modal" href="#exampleModalToggle{{$item->id}}" role="button">editer</a>

                                            </li>
                                          {{-- <li><a href="{{url('about_travailleur/'.$ST->id)}}"  title="voir plus d'informations">plus d'informations</a></li> --}}
                                          <li>
                                            <a href="{{url('add-Action-Maitrise-risque/'.$item->id)}}" class="dropdown-item">Actions de maitrises</a>
                                          </li>
                                          <li>
                                            <form method="POST" action="{{url('delete-risque/'.$item->id)}}">
                                                @csrf
                                                <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip" title='supprimer'>supprimer</button>
                                            </form>
                                          </li>

                                        </ul>


                                    </td>
                                </tr>
                        @endforeach

                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th>Risque</th>
                                <th>Danger</th>
                                <th> Milieu</th>
                                <th> Activite</th>
                                <th> Niveaus de Priorite</th>
                                <th>Details</th>
                                <th>Actions de Maitrise</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            {{-- </div> --}}
        </div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div class="card">
            <div class="card-header">
                <h6>
                    Opportunite
                   <a href="#" class="btn btn-primary btn float-end" data-bs-toggle="modal" data-bs-target="#opportunite"><i class='bx bx-plus'></i></a>
               </h6>
               </div>
               <div class="card-body" id="opportunite">
                <table id="example2" class="table table-bordred" style="width:100%">
                    {{-- //table table-hover --}}
                    <thead>
                        <tr>
                            <th>Objet</th>
                            <th>Bénéfice</th>
                            <th> Profit</th>
                            <th> Facilité</th>
                            <th>Priorité</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                     @foreach ($opportunite as $Opp )
                            <tr>
                                <td>{{$Opp->objet}}</td>
                                    @if ($Opp->benifice == 1)
                                     <td><span class="badge rounded-pill bg-info">Faible</span></td>
                                    @elseif ($Opp->benifice == 2)
                                    <td><span class="badge rounded-pill bg-primary">Moyen</span></td>
                                    @else
                                    <td><span class="badge rounded-pill bg-success">élevé</span></td>
                                    @endif

                                    @if ($Opp->facilite == 1)
                                     <td><span class="badge rounded-pill bg-info">Faible</span></td>
                                    @elseif ($Opp->facilite == 2)
                                    <td><span class="badge rounded-pill bg-primary">Moyen</span></td>
                                    @else
                                    <td><span class="badge rounded-pill bg-success">élevé</span></td>
                                    @endif

                                    @if ($Opp->profit == 1)
                                     <td><span class="badge rounded-pill bg-info">Faible</span></td>
                                    @elseif ($Opp->profit == 2)
                                    <td><span class="badge rounded-pill bg-primary">Moyen</span></td>
                                    @else
                                    <td><span class="badge rounded-pill bg-success">élevé</span></td>
                                    @endif

                                    @if ($Opp->priorite == 'non-prioritaire')
                                     <td><span class="badge rounded-pill bg-info">{{$Opp->priorite}}</span></td>
                                    @else
                                    <td><span class="badge rounded-pill bg-success">{{$Opp->priorite}}</span></td>
                                    @endif
                                    <td>
                                        <a  href="#" role="button"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class='bx bx-chevron-down'></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#opportunite{{$Opp->id}}">editer</a>

                                            </li>
                                          {{-- <li><a href="{{url('about_travailleur/'.$ST->id)}}"  title="voir plus d'informations">plus d'informations</a></li> --}}
                                          <li>
                                            <a href="{{url('add-Action-Maitrise-opportunite/'.$Opp->id)}}" class="dropdown-item">Actions de Maitrises</a>
                                          </li>
                                          <li>
                                            <form method="POST" action="{{url('delete-opp/'.$Opp->id)}}">
                                                @csrf
                                                <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip" title='supprimer'>supprimer</button>
                                            </form>
                                          </li>

                                        </ul>


                                    </td>

                            </tr>
                    @endforeach

                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>Objet</th>
                            <th>Bénéfice</th>
                            <th> Profit</th>
                            <th> Facilité</th>
                            <th>Priorité</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot> --}}
                </table>
               </div>
        </div>

    </div>
  </div>

@endsection
@section('script')
<script>$(document).ready(function() {
    $('#example2').DataTable();
} );</script>

    <script>
    var array = {{ json_encode(Session::get('success_opp'))}};
    if(array !== null && array !== '') {
        document.getElementById("home-tab").classList.remove('active');
        document.getElementById("home-tab").setAttribute("aria-selected","false");
        document.getElementById("home").classList.remove('showactive');
        document.getElementById("home").classList.remove('active');

        document.getElementById("profile-tab").classList.add('active');
        document.getElementById("profile-tab").setAttribute("aria-selected","true");
        document.getElementById("profile").classList.add('show');
        document.getElementById("profile").classList.add('active');
	}
    </script>

@endsection
