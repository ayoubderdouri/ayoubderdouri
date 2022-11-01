@extends('app.layout')
@section('content')
<div class="card">
    <div class="card-header">
        liste  des suggestions
    </div>
    <div class="card-body">
        <table class="table" id="example">
            <thead>
                <th>
                    <tr>
                        <th>Objet</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Entite</th>
                        <th>Email</th>
                    </tr>
                </th>
                <tbody>
                    @foreach ($suggestion as $suggestion)
                        <tr>
                            <td>{{$suggestion->objet}}</td>
                            <td>{{$suggestion->nom}}</td>
                            <td>{{$suggestion->prenom}}</td>
                            <td>{{$suggestion->entite}}</td>
                            <td>{{$suggestion->email}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>
@endsection
