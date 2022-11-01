@extends('app.layout')
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
<div class="modal fade" id="ajouterAction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter Action de Maitrise </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('add-action')}}" method="POST">
            @csrf
        <div class="modal-body">
            <input type="hidden" name="source1" value="Participation et engagement">
            <input type="hidden" name="source2" value="Reclamation">
            <input type="hidden" name="source_id" value="{{$reclamation->id}}">
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
@if ($reclamation->piece)
<div class="modal fade" id="image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">conjointe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <embed src="{{asset('uploads/reclamation/'.$reclamation->piece)}}" type="" height="100%" width="100%">
        </div>
      </div>
    </div>
  </div>
@endif
<div class="card">
    <div class="card-header">
        <h6>Reclamation N : {{$reclamation->id}}
            <div class="dropdown">
                <a  href="#" class="btn float-end" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-chevron-down'></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  @if ($reclamation->piece)
                  <li ><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#image">voir la piece</a></li>
                  @endif
                </ul>
              </div>
        </h6>
    </div>
    <div class="card-body">
        <table class="table table-striped" >
            <thead>
                <tr>
                    <th>Objet</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>date</th>
                    <th>Entite</th>
                    <th>Email </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$reclamation->objet}}</td>
                    <td>{{$reclamation->nom}}</td>
                    <td>{{$reclamation->prenom}}</td>
                    <td>{{$reclamation->created_at}}</td>
                    <td>{{$reclamation->entite}}</td>
                    <td>{{$reclamation->email}}</td>
                </tr>
             </tbody>
            </table>
    </div>
</div>
<br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<br>
<div class="card">
    <div class="card-header">
        <h5>
            liste des actions de maitrises
            <a href="#" class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#ajouterAction">Ajouter Action de Maitrise</a>
        </h5>
    </div>
    <div class="card-body">
        <table  class="table table-striped" id="example">
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
@endsection
