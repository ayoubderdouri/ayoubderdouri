@extends('app.layout')
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ajouter un compte utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('add-user')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" required value="{{ old('nom') }}" id="exampleFormControlInput1">
              </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}" id="exampleFormControlInput1">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
              </div>
              <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">role</label>
              <select name="role" id="" class="form-control">
                    <option value="Administrator">Administrator</option>
                    <option value="Pilote des processus">Pilote des processus</option>
              </select>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-success">Enregistrer</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="processus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ajouter un processus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('add-processus')}}" method="POST">
                @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Processus</label>
                <input type="text" class="form-control @error('nomProcessus') is-invalid @enderror" name="nomProcessus" required value="{{ old('nomProcessus') }}" id="exampleFormControlInput1">
                    @if ($errors->has('nomProcessus'))
                    <span class="text-danger">{{ $errors->first('nomProcessus') }}</span>
                    @endif
              </div>
              <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Pilote</label>
              <select name="user_id" id="" class="form-control">
                @foreach ($user as $data)
                    @if ($data->role !='Medcin' && $data->role !='Administrator')
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endif
                @endforeach
              </select>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
        </div>
      </div>
    </div>
  </div>

<div class="row">
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
      @endif
<div class="card">
  <div class="card">
      <div class="card-header">
          <h6>Gestion des utilisateurs
              <a  href="#" role="button" class="btn btn-secondary btn-sm float-end" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class='bx bx-chevron-down'></i>
              </a>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li>
                   <a href="#" id="users" class="dropdown-item" title="ajouter un questionaire" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter compte utilisateur</a>

                  </li>
                {{-- <li><a href="{{url('about_travailleur/'.$ST->id)}}" class="dropdown-item" title="voir plus d'informations">plus d'informations</a></li> --}}
                <li>
                  <a href="#" class="dropdown-item" id="erreurProcessus" data-bs-toggle="modal" data-bs-target="#processus">Ajouter un processus</a>
                </li>

              </ul>
          </h6>

      </div>
      <div class="card-body">
          <table id="example" class="table table-striped" style="width:100%">
              <thead>
                  <tr>
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Liste des processus</th>
                      <th>Role</th>
                      <th><strong>Action</strong></th>
                  </tr>
              </thead>
              <tbody>

               @foreach ($user as $item )
                      <tr>
                          <td>{{$item->name}}</td>
                          <td>{{$item->email}}</td>
                          <td>
                            <ul class="list-group list-group-flush">
                            @foreach ($item->processus as $pr)

                                    <li>
                                        <div class="d-flex bd-highlight mb-3">
                                            <div class="me-auto p-2 bd-highlight">{{$pr->nomProcessus}}</div>
                                            <div class="p-2 bd-highlight">
                                                <form method="POST" action="{{url('del_processus/'.$pr->id)}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger btn-sm float-end show_confirm" data-toggle="tooltip" title='supprimer'><i class='bx bx-message-square-x'></i></button>
                                            </form>
                                            </div>
                                          </div>


                                        {{-- <a href="{{url('del_processus/'.$pr->id)}}" title="Suprimmer ce processus" class="float-end"><span class="badge bg-danger rounded-pill"><i class='bx bx-message-square-x'></i></span></a> --}}
                                    </li>

                            @endforeach
                           </ul>
                          </td>
                          <td>{{$item->role}}</td>
                          <td>
                              <div class="dropdown">
                                  <a  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                      <i class='bx bx-chevron-down'></i>
                                  </a>

                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                      <form method="POST" action="{{url('delete-user/'.$item->id)}}">
                                          @csrf
                                          <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip" title='supprimer'>supprimer</button>
                                      </form>
                                    </li>
                                    <li> <a href="#" class="dropdown-item" title="editer un  compte"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">editer</a></li>
                                  </ul>
                                </div>
                          </td>
                      </tr>
              @endforeach

              </tbody>
          </table>
      </div>

  </div>
</div>
</div>

@endsection
@section('script')
<script>
    @if($errors->has('email'))
    var array = {{ json_encode($errors->has('email')) }};
    if(array !== null && array !== '') {

        document.getElementById('users').click();

    }
    @endif
   </script>
@endsection
