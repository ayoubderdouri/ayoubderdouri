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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('add-constat')}}" method="POST">
            @csrf
        <div class="modal-body">
            <input type="hidden" value="{{$audit->id}}" name="audit_id">
            <div class="form-group mb-2">
                <label for="type">Type de constat</label>
                <select name="type" class="form-control">
                    <option value="Recommendation">Recommendation </option>
                    <option value="Remarque">Remarque</option>
                    <option value="Non-conformité">Non-conformité</option>
                    <option value="Amélioration">Amélioration</option>
                  </select>
            </div>
            <div class="form-group mb-3">
                <label for="name">Objet </label>
                <textarea name="objet" id="" class="form-control" required></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button  type="submit" class="btn btn-primary">Enrogistrer</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  @foreach ($constat  as $data)
  <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('update-constat/'.$data->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <input type="hidden" value="{{$audit->id}}" name="audit_id">
            <div class="form-group mb-2">
                <label for="type">Type de constat</label>
                <select name="type" class="form-control">
                    <option value="{{$data->type}}">{{$data->type}}</option>
                    <option value="Recommendation">Recommendation </option>
                    <option value="Remarque">Remarque</option>
                    <option value="Non-conformité">Non-conformité</option>
                    <option value="Amélioration">Amélioration</option>
                  </select>
            </div>
            <div class="form-group mb-3">
                <label for="name">Objet </label>
                <textarea name="objet" id="" class="form-control" required>{{$data->objet}}</textarea>
            </div>

        </div>
        <div class="modal-footer">
            <button  type="submit" class="btn btn-primary">Enrogistrer</button>
        </form>
          {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button> --}}
          {{-- <a href="{{url('del-constat/'.$data->id)}}" class="btn btn-danger">Supprimer</a> --}}
        </div>

      </div>
    </div>
  </div>
  @endforeach
  <div class="card">
    <div class="card-header">
        <a href="{{url('audits')}}" class="btn btn-danger float-end  btn-sm">retour</a>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <th rowspan="2">Audit</th>
                <th>Date</th>
                <th>type</th>
                <th>Rapport</th>
            </tr>
            <tr>
                <td>{{$audit->date_audits}}</td>
                <td>{{$audit->type}}</td>
                <td>
                    <a href="{{asset('uploads/audits/'.$audit->rapportPath)}}" target="_blanck"><i class='bx bx-link-external'></i></a>
                </td>
            </tr>
        </table>
    </div>
  </div>
  <br>
  <div class="card">
    <div class="card-body">
       <table class="table table-borderless">
        <thead>
            <tr>
                <th>#</th>
                <th>Recommendation</th>
                <th>Remarque</th>
                <th>Non-conformité</th>
                <th>Amélioration</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>N :</td>
                <td>{{$RC}}</td>
                <td>{{$RM}}</td>
                <td>{{$NC}}</td>
                <td>{{$AM}}</td>
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

<div class="card">
    <div class="card-header">
    <h6>list des constats
        <button type="button" class="btn btn-primary btn float-end btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ajouter
          </button>
    </h6>

    </div>
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Objet</th>
                    <th><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody>

             @foreach ($constat as $item )
                    <tr>
                        <td> {{$item->type}}</td>
                        <td> {{$item->objet}}</td>
                        <td>
                              <div class="dropdown">
                                <a  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a href="#" role="button" class="dropdown-item" title="editer" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">editer</a></li>
                                <li><a href="{{url('getActionForConstat/'.$item->id)}}" class="dropdown-item" title="voir  les actions de maitrises">actions de maitrises</a></li>
                                <li>
                                  <form method="POST" action="{{url('del-constat/'.$item->id)}}">
                                      @csrf
                                      <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip" title='supprimer'>supprimer</button>
                                  </form>
                                </li>

                              </ul>
                            </div>
                        </td>
                    </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection
