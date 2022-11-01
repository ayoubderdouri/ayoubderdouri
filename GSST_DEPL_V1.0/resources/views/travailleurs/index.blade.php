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
@foreach ($travailleur as $tr)
<div class="modal fade" id="exampleModal{{$tr->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un travailleur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ url('update-travailleur/'.$tr->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="name">CIN</label>
                    <input type="text"  name="cin" class="form-control form-control-sm @error('cin') is-invalid @enderror"  value="{{$tr->cin}}" required>
                    @if ($errors->has('cin'))
                     <span class="text-danger">{{ $errors->first('cin') }}</span>
                     @endif
                </div>
                <div class="col-md-6">
                    <label for="name">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{$tr->nom}}" required>
                </div>
                <div class="col-md-6">
                    <label for="name">Prenom</label>
                    <input type="text" name="prenom" class="form-control" value="{{$tr->prenom}}" required>
                </div>
                <div class="col-md-6">
                    <label for="name">Telephone</label>
                    <input type="tel" name="tel" class="form-control" required value="{{$tr->tel}}" placeholder="06xxxxxxx1">
                    {{-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" --}}
                </div>
                <div class="col-md-6">
                    <label for="name">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{$tr->email}}" placeholder="email@example.com">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="name">Date de naissance</label>
                    <input type="date" name="dateNaissance" class="form-control" value="{{$tr->dateNaissance}}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Lieu de naissance </label>
                    <input type="text" name="lieuNaissance" class="form-control" value="{{$tr->lieuNaissance}}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Adresse </label>
                    <input type="text" name="adresse" class="form-control" value="{{$tr->adresse}}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="sexe">Sexe  </label>
                    <select name="sexe" class="form-control">
                        <option value="" disabled>please select</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                      </select>
                </div>
                <div class="form-group mb-2">
                    <label for="situation">Situation social  </label>
                    <select name="situation" class="form-control">
                        <option value="" disabled>please select</option>
                        <option value="celibataire">Celibataire</option>
                        <option value="marie">Marie </option>
                      </select>
                </div>
                <div class="form-group mb-2">
                    <label for="name">Fonction</label>
                    <input type="text" name="fonction" value="{{$tr->fonction}}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="name">Affeliation CNOPS</label>
                    <input type="text" name="affeliation_cnops" value="{{$tr->affeliation_cnops}}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="name">groupe Sanguin</label>
                    <input type="text" name="group_sanguin" value="{{$tr->group_sanguin}}" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Image </label>
                    <input type="file" name="image_profile" class="form-control" required>
                </div>
                <div class="form-group mb-3">

                </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">
            Enregistrer
        </button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endforeach
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un travailleur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ url('add-travailleur') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf

                <div class="col-12">
                    <label for="name">CIN</label>
                    <input type="text"  name="cin" class="form-control form-control-sm @error('cin') is-invalid @enderror"  value="{{ old('cin') }}" required>
                    @if ($errors->has('cin'))
                     <span class="text-danger">{{ $errors->first('cin') }}</span>
                     @endif
                </div>
                <div class="col-md-6">
                    <label for="name">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="name">Prenom</label>
                    <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="name">Telephone</label>
                    <input type="tel" name="tel" class="form-control" required value="{{ old('tel') }}" placeholder="06xxxxxxx1">
                    {{-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" --}}
                </div>
                <div class="col-md-6">
                    <label for="name">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}" placeholder="email@example.com">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="name">Date de naissance</label>
                    <input type="date" name="dateNaissance" class="form-control" value="{{ old('dateNaissance') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Lieu de naissance </label>
                    <input type="text" name="lieuNaissance" class="form-control" value="{{ old('lieuNaissance') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Adresse </label>
                    <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="sexe">Sexe  </label>
                    <select name="sexe" class="form-control">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                      </select>
                </div>
                <div class="form-group mb-2">
                    <label for="situation">Situation social  </label>
                    <select name="situation" class="form-control">
                        <option value="celibataire">Celibataire</option>
                        <option value="marie">Marie </option>
                      </select>
                </div>
                <div class="form-group mb-2">
                    <label for="name">Fonction</label>
                    <input type="text" name="fonction" value="{{ old('fonction') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="name">Affeliation CNOPS</label>
                    <input type="text" name="affeliation_cnops" value="{{ old('affeliation_cnops') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="name">groupe Sanguin</label>
                    <input type="text" name="group_sanguin" value="{{ old('group_sanguin') }}" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Image </label>
                    <input type="file" name="image_profile" class="form-control" required>
                </div>
                <div class="form-group mb-3">

                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
            Save
        </button>
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
                        <h6>gestion des travailleurs
                            {{-- <a class="btn btn-primary float-end" href="{{ url('add-travailleur') }}"></a> --}}
                            <button type="button" id="clickButton" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Ajouter
                              </button>
                        </h6>
                </div>

                <div class="card-body">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>CIN</th>
                                <th>avatar</th>
                                <th>NOM</th>
                                <th>Prenom</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>

                         @foreach ($travailleur as $item )
                                <tr>
                                    <td> {{$item->cin}}</td>
                                    <td><img src="{{asset('uploads/travailleurs/'.$item->image_profile)}}"  alt="" class="__avatar"></td>
                                    <td> {{$item->nom}}</td>
                                    <td> {{$item->prenom}}</td>
                                    <td> {{$item->tel}}</td>
                                    <td> {{$item->email}}</td>

                                    <td>
                                        <div class="dropdown">
                                            <a  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bx-chevron-down'></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                              <li><a href="#" role="button" class="dropdown-item" title="editer" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">editer</a></li>
                                              <li><a href="{{url('about_travailleur/'.$item->id)}}" class="dropdown-item" title="voir plus d'informations">plus d'informations</a></li>
                                              <li>
                                                <form method="POST" action="{{url('delete-travailleur/'.$item->id)}}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip" title='supprimer'>supprimer</button>
                                                </form>
                                              </li>
                                            </ul>
                                          </div>
                                        {{-- <div class="d-flex justify-content-sm-around">
                                            <div class="p-2 bd-highlight">
                                                <a href="#" role="button" class="btn btn-primary btn-sm" title="editer" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"><i class='bx bxs-edit'></i></a>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <a href="{{url('about_travailleur/'.$item->id)}}" class="btn btn-primary btn-sm" title="voir plus d'informations"><i class='bx bxs-show'></i></a>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <form method="POST" action="{{url('delete-travailleur/'.$item->id)}}">
                                                    @csrf
                                                    <button type="submit" class="btn  btn-danger btn-sm show_confirm" data-toggle="tooltip" title='supprimer'><i class='bx bxs-message-alt-x'></i></button>
                                                </form>
                                            </div>
                                          </div> --}}



                                    </td>
                                </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>CIN</th>
                                <th>avatar</th>
                                <th>NOM</th>
                                <th>Prenom</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>

        </div>
    </div>
@endsection
