@extends('app.layout')
@section('css')
{{-- <link
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
/> --}}
@endsection
@section('content')
{{-- edit action --}}
@foreach ($actions as $item)
<div class="modal fade" id="editemodal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Action de Maitrise </h5>
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
                  <input type="date" class="form-control" name="date_realisation" min="{{$item->enregistrer_at}}"  max="{{now()->toDateString('Y-m-d')}}" required>
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
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endforeach
{{-- rapport d'audit --}}
<div class="modal fade" id="rapport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">rapport</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <embed src="{{asset('uploads/audits/'.$audit->rapportPath)}}" type="" height="100%" width="100%">
        </div>
      </div>
    </div>
  </div>
{{-- ajouter action --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une action de maitrise </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('add-action')}}" method="POST">
            @csrf
        <div class="modal-body">
            <input type="hidden" name="source1" value="Audits">
            <input type="hidden" name="source2" value="Constat">
            <input type="hidden" name="source_id" value="{{$constats->id}}">
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
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
        <h6>
            les informations d'audit
            <a href="{{url('constat-list/'.$audit->id)}}" class="btn btn-danger  btn-sm float-end">retour</a>
        </h6>
    </div>
    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th>Date d'audit</th>
                <th>type d'audit</th>
                <th>l'objectif d'audit</th>
                <th>Rapport d'audit</th>
            </tr>
            <tr>
                <td>{{$audit->date_audits}}</td>
                <td>{{$audit->type}}</td>
                <td>{{$audit->objet}}</td>
                <td>
                    <a href="#" class="btn btn-sm " data-bs-toggle="modal" data-bs-target="#rapport"><i class='bx bx-link-external'></i></a>
                </td>
            </tr>
        </table>


    </div>
  </div>
  <br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="card">
    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th rowspan="2">Constat</th>
                <th>Type</th>
                <th>Objet</th>
            </tr>
            <tr>
                <td>{{$constats->type}}</td>
                <td>{{$constats->objet}}</td>
            </tr>
        </table>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
    <h6>Actions de Maitrises
        <button type="button" class="btn btn-primary btn float-end btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ajouter
          </button>
    </h6>
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
                 @foreach ($actions as $data )
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
@section('script')
{{-- <script>
   var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
   dd = '0' + dd;
}

if (mm < 10) {
   mm = '0' + mm;
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("datefield").setAttribute("max", today);
</script> --}}
@endsection
