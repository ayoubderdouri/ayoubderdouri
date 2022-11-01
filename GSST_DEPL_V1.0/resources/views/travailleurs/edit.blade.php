@extends('app.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                        <h2>
                            editer travailleur
                            <a class="btn btn-primary float-end" href="{{ url('travailleurs') }}">Retour</a>
                        </h2>

                </div>
                <div class="card-body">
                    <form action="{{ url('update-travailleur/'.$travailleur->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name">CIN</label>
                            <input type="text" name="cin" class="form-control" value="{{$travailleur->cin}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nom</label>
                            <input type="text" name="nom" class="form-control" value="{{$travailleur->nom}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Prenom</label>
                            <input type="text" name="prenom" class="form-control" value="{{$travailleur->prenom}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Tel</label>
                            <input type="text" name="tel" class="form-control" value="{{$travailleur->tel}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Email</label>
                            <input type="text" name="email" class="form-control" value="{{$travailleur->email}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Date de naissance</label>
                            <input type="date" name="dateNaissance" class="form-control" value="{{$travailleur->dateNaissance}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Lieu de naissance </label>
                            <input type="text" name="lieuNaissance" class="form-control" value="{{$travailleur->lieuNaissance}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="adresse">Adresse </label>
                            <input type="text" name="adresse" class="form-control" value="{{$travailleur->adresse}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="sexe">Sexe  </label>
                            <select name="sexe" class="form-control" >
                                <option value="{{$travailleur->sexe}}">{{$travailleur->sexe}}</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                              </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="situation">Situation social  </label>
                            <select name="situation" class="form-control">
                                <option value="{{$travailleur->situation}}">{{$travailleur->situation}}</option>
                                <option value="celibataire">Celibataire</option>
                                <option value="marie">Marie </option>
                              </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Fonction</label>
                            <input type="text" name="fonction" class="form-control" value="{{$travailleur->fonction}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Image </label>
                            <input type="file"  name="image_profile" class="form-control"  required>
                            <img src="{{asset('uploads/travailleurs/'.$travailleur->image_profile)}}"  alt="Image" class="__avatar">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
