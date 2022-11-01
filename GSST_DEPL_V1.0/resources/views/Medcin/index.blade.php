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
<!-- Modal -->
<div class="row">
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
    <div class="card">
        <div class="card">
            <div class="card-header">
                list des travailleur
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>CIN</th>
                            <th>avatar</th>
                            <th>NOM</th>
                            <th>Prenom</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody>

                     @foreach ($travailleur as $item )
                            <tr>
                                <td> {{$item->cin}}</td>
                                <td><img src="{{asset('uploads/travailleurs/'.$item->image_profile)}}"  alt="Image" class="__avatar"></td>
                                <td> {{$item->nom}}</td>
                                <td> {{$item->prenom}}</td>
                                <td> {{$item->tel}}</td>
                                <td> {{$item->email}}</td>

                                <td>
                                <a href="{{url('list-visite/'.$item->id)}}" class="btn btn-primary btn-sm"> visites</a>
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
