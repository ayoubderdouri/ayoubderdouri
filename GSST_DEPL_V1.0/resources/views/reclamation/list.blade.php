@extends('app.layout')
@section('content')
@foreach ($reclamation as $recla)
<div class="modal fade" id="image{{$recla->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">conjointe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <embed src="{{asset('uploads/reclamation/'.$recla->piece)}}" type="" height="100%" width="100%">
        </div>
      </div>
    </div>
  </div>
@endforeach
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="card">
        <div class="card-header">
            Header
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" >
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>date</th>
                        <th>Entite</th>
                        <th>Email </th>
                        <th>Objet</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reclamation as $rec)
                    <tr>
                        <td>{{$rec->nom}}</td>
                        <td>{{$rec->prenom}}</td>
                        <td>{{$rec->created_at}}</td>
                        <td>{{$rec->entite}}</td>
                        <td>{{$rec->email}}</td>
                        <td>{{$rec->objet}}</td>
                        <td>
                                <div class="dropdown">
                                    <a  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class='bx bx-chevron-down'></i>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                      <li>
                                        <form method="POST" action="{{url('delete-reclamation N= '.$rec->id)}}">
                                            @csrf
                                            <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip" title='supprimer'>supprimer</button>
                                        </form>
                                      </li>
                                      <li><a href="{{url('action_Maitrise_reclamation N='.$rec->id)}}" class="dropdown-item">les actions de maitrises</a></li>
                                      @if ($rec->piece)
                                      <li ><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#image{{$rec->id}}">voir la piece</a></li>
                                      @endif
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
