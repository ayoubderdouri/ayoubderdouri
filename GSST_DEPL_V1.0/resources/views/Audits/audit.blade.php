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
@foreach ($audits as $audit)
<div class="modal fade" id="rapport{{$audit->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
@endforeach
@foreach ($audits as $data)
<div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{'update-audits/'.$data->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="modal-body">


            <div class="form-group mb-2">
                <label for="date">Date d'audit</label>
                <input type="date" name="date_audits" class="form-control" value="{{$data->date_audits}}" required>
            </div>
            <div class="form-group mb-2">
                <label for="type">Type d'audit</label>
                <select name="type" class="form-control">
                    <option value="{{$data->type}}">{{$data->type}}</option>
                    <option value="Interne">Interne</option>
                    <option value="Extrene">Extrene </option>
                  </select>
            </div>
            <div class="form-group mb-2">
                <label for="date">l'objectif d'audit</label>
                <input type="text" name="objet" class="form-control" value="" required>
            </div>
            <div class="form-group mb-3">
                <label for="name">Rapport d'audit </label>
                <input type="file" name="rapportPath"  class="form-control" accept=".pdf">
            </div>

        </div>
        <div class="modal-footer">
          <button  type="submit" class="btn btn-primary">Enrogistrer</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endforeach

  <!-- Modal ajout audits -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ajouter nouveau Audit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{'add-audit'}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">


            <div class="form-group mb-2">
                <label for="date">Date d'audit</label>
                <input type="date" name="date_audits" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label for="type">Type d'audit</label>
                <select name="type" class="form-control">
                    <option value="Interne">Interne</option>
                    <option value="Extrene">Extrene </option>
                  </select>
            </div>
            <div class="form-group mb-2">
                <label for="date">l'objectif d'audit</label>
                <input type="text" name="objet" class="form-control" value="" required>
            </div>
            <div class="form-group mb-3">
                <label for="name">Rapport d'audit </label>
                <input type="file" name="rapportPath" class="form-control" accept=".pdf" required>
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

<div class="row" >
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                    <h4>Management des audits
                        <button type="button" class="btn btn-primary btn float-end btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Ajouter
                          </button>
                    </h4>
            </div>

            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Type d'audit</th>
                            <th>Date d'audit</th>
                            <th>l'objectif d'audit</th>
                            <th><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody>

                     @foreach ($audits as $item )
                            <tr>
                                <td> {{$item->type}}</td>
                                <td> {{$item->date_audits}}</td>
                                <td>{{$item->objet}}</td>
                                {{-- <td> <a href="{{ asset('uploads/audits/'.$item->rapportPath)}}" target="_blank">voir rapport</a></td> --}}
                                <td>
                                    <div class="dropdown">
                                        <a  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class='bx bx-chevron-down'></i>
                                        </a>
                                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#rapport{{$item->id}}">voir rapport</a>
                                        </li>
                                        <li><a href="#" role="button" class="dropdown-item" title="editer" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">editer</a></li>
                                        <li><a href="{{url('constat-list/'.$item->id)}}" class="dropdown-item" title="voir  les constats">voir  les constats</a></li>
                                        <li>
                                          <form method="POST" action="{{url('delete-audits/'.$data->id)}}">
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
                    {{-- <tfoot>
                        <tr>
                            <th>type</th>
                            <th>date</th>

                            <th><strong>Action</strong></th>
                        </tr>
                    </tfoot> --}}
                </table>

            </div>

        </div>

    </div>
</div>
@endsection
