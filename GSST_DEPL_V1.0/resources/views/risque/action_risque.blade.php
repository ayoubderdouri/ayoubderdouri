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
{{-- editer action de maitrise --}}
@foreach ($action as $item)
<div class="modal fade" id="editemodal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">editer action de maitrise </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('update-action/'.$item->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
               <div class="row g-3">
              <div class="col-md-6">
                <label for="customRange3" class="form-label">Actuel </label>
                <input type="text" class="form-control" name="actuel" value="{{$item->actuel}}" required>
            </div>
            <div class="col-md-6">
                <label for="customRange3" class="form-label">Prevu </label>
                <input type="text" class="form-control"   name="prevu" value="{{$item->prevu}}" required>
            </div>
            </div>
            <div class="row g-3">
            <div class="col-md-6">
                <label for="customRange3" class="form-label">Responsable </label>
                <input type="text" class="form-control"  name="responsable" value="{{$item->responsable}}" required>

            </div>
            <div class="col-md-6">
                <label for="customRange3" class="form-label">Ressource </label>
                <select name="ressource" class="form-control">
                    <option value="{{$item->ressource}}">{{$item->ressource}}</option>
                    <option value="Interne">Interne</option>
                    <option value="Externe">Externe </option>
                  </select>
            </div>
            <div class="form-group mb-3">
                <label for="milieu">Delai Recommende de realisation</label>
                <input type="text" name="date_recommande" id="" class="form-control" value="{{$item->date_recommande}}" readonly>
              </div>
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="customRange3" class="form-label">Date de realisation </label>
                  <input type="date" class="form-control" name="date_realisation" min="{{$item->enregistrer_at}}" value="{{$item->date_realisation}}" max="{{now()->toDateString('Y-m-d')}}" required>
              </div>
              <div class="col-md-6">
                  <label for="customRange3" class="form-label">Efficacité </label>
                  <select name="Efficacité" class="form-control">
                    <option value="efficace">efficace</option>
                    <option value="non-efficasse">non-efficace </option>
                  </select>
              </div>
              </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endforeach
{{--modal pour  ajouter new action--}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter new risque </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('add-action')}}" method="POST">
            @csrf
        <div class="modal-body">
            <input type="hidden" name="source1" value="Risque et Opportunite">
            <input type="hidden" name="source2" value="Risque">
            <input type="hidden" name="source_id" value="{{$risque->id}}">
            {{-- No Risques Présence Description Priorité Moyens de  --}}
               <div class="row g-3">
              <div class="col-md-6">
                <label for="customRange3" class="form-label">Actuel </label>
                <input type="text" class="form-control" name="actuel"  required>
            </div>
            <div class="col-md-6">
                <label for="customRange3" class="form-label">Prevu </label>
                <input type="text" class="form-control"   name="prevu"  required>
            </div>
            </div>
            <div class="row g-3">
            <div class="col-md-6">
                <label for="customRange3" class="form-label">Responsable </label>
                <input type="text" class="form-control"  name="responsable"  required>

            </div>
            <div class="col-md-6">
                <label for="customRange3" class="form-label">Ressource </label>
                <select name="ressource" class="form-control">
                    <option value="Interne">Interne</option>
                    <option value="Externe">Externe </option>
                  </select>
            </div>
            <div class="form-group mb-3">
                <label for="milieu">Delai Recommende de realisation</label>
                <input type="text" name="date_recommande" id="" class="form-control" placeholder=""  required>
              </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
<div class="card">
    <div class="card-header">
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Risque Information</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">les actions de Maitrises</a>
    </li>
  </ul>

  <a href="{{url('risque-page')}}" class="btn btn-secondary btn float-end btn-sm">retour</a>
</div>
<div class="card-body">
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row justify-content-center">
            <div class="card  w-75" id='contentPdf'>
                <div class="card-header">
                    <P>
                       Risque Information
                    </P>
                </div>
                <div class="card-body" >
                    <div class="row gutters-sm">
                        <div class="col ">
                            <div class="card " >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Risque</h6>
                                        </div>
                                        <div class="col-sm-9 text-primary">
                                            {{$risque->titre}}
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Danger</h6>
                                        </div>
                                        <div class="col-sm-9 text-primary">
                                            {{$risque->danger}}
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Milieu</h6>
                                        </div>
                                        <div class="col-sm-9 text-primary">
                                            {{$risque->milieu}}
                                        </div>
                                      </div>
                                      <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Activite</h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$risque->activite}}
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Durée d'exploitation </h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$risque->duree}}
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col">
                                      <h6 >Fréquence </h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$risque->frequence}}
                                    </div>
                                  </div>
                                  <hr>

                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Gravité</h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$risque->gravite}}
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Coefficient de Maitrise</h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$risque->coeffecient}}
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Probablite</h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$risque->probabilite}}
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">criticite</h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$risque->criticite}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h5>les actions de Maitrises
                        <a href="#" class="btn btn-primary btn float-end" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bx-plus'></i></a>
                    </h5>
                </div>
                <div class="card-body">
                    <table  class="table table-striped" id="example" style="width:100%">
                        <thead>
                            <tr>
                                 <th>Actuel</th>
                                <th>Prevu</th>
                                <th>Responsable</th>
                                <th>Ressource</th>
                                <th>Delai recommende</th>
                                <th>Date de Realisation</th>
                                <th>Delai de realisation</th>
                                <th>Efficacite</th>
                                <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($action as $data )
                            <tr>
                                <td>{{$data->actuel}}</td>
                                <td>{{$data->prevu}} </td>
                                <td>{{$data->responsable}}</td>
                                <td>{{$data->ressource}}</td>
                                <td>{{$data->date_recommande}}</td>
                                @if ($data->date_realisation)
                                <td>{{$data->date_realisation}}</td>
                                @else
                                <td><span class="badge rounded-pill bg-success">En cours</span>
                                </td>
                                @endif
                                @if ($data->delay_realisation)
                                <td>{{$data->delay_realisation}}</td>
                                @else
                                <td><span class="badge rounded-pill bg-success">En cours</span>
                                </td>
                                @endif
                                @if ($data->efficacite)
                                <td>{{$data->efficacite}}</td>
                                @else
                                <td><span class="badge rounded-pill bg-success">En cours</span>
                                </td>
                                @endif

                                <td>
                                   <a  href="#" role="button"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                       <i class='bx bx-chevron-down'></i>
                                   </a>

                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                       <li>
                                           <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editemodal{{$data->id}}">editer</i></a>

                                       </li>
                                     {{-- <li><a href="{{url('about_travailleur/'.$ST->id)}}"  title="voir plus d'informations">plus d'informations</a></li> --}}
                                     <li>
                                       <form method="POST" action="{{url('del-action/'.$data->id)}}">
                                           @csrf
                                           <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip" title='supprimer'>supprimer</button>
                                       </form>
                                     </li>

                                   </ul>
                                </td>
                            </tr>
                            @endforeach
                         </tbody>
                     </table>
                </div>
            </div>
        </div>
  </div>
  </div>
</div>
</div>
@endsection
