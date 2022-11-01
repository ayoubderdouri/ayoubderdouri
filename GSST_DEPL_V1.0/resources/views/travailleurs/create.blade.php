@extends('app.layout')

@section('css')
<style>
    .container{
        width: 90%;
        height: 50%;
    }
</style>
@endsection

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
                        <h2>ajouter un travailleur
                            <a class="btn btn-primary float-end" href="{{ url('travailleurs') }}">Reteur</a>
                        </h2>

                </div>
                {{-- @if ($errors->any())
                 <div class="alert alert-danger">

                             <ul>
                                  @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                   @endforeach
                              </ul>
                 </div>
               @endif --}}
                <div class="card-body">
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
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
