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
@foreach ($Questionnaire as $data)
<div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('update-questionnaire/'.$data->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$data->titre}}" required>
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
              </div>
              <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="" rows="5" class="form-control" aria-describedby="helpId" required>{{$data->description}}</textarea>
                <small id="helpId" class="text-muted">Veuillez saisir une description</small>
              </div>
              <div class="row">
                <div class="col">
                    <label for="published">publier</label>
                </div>
                <div class="col-lg-2">
                    <div class="form-check form-switch">
                        @if ($data->published == True)
                        <input class="form-check-input" name="published" type="checkbox" id="flexSwitchCheckDefault" checked>
                        @else
                        <input class="form-check-input" name="published" type="checkbox" id="flexSwitchCheckDefault">
                        @endif

                     </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endforeach


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ajouter un Questionnaire</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('add-questionnaire')}}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
              </div>
              <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="" rows="5" class="form-control" aria-describedby="helpId" required></textarea>
                <small id="helpId" class="text-muted">Veuillez saisir une description</small>
              </div>
              <div class="row">
                <div class="col">
                    <label for="published">publier</label>
                </div>
                <div class="col-lg-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="published" type="checkbox" id="flexSwitchCheckDefault" >
                     </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                <h6>Questionnaires de satisfaction
                    <a  href="#" role="button" class="btn btn-secondary btn-sm float-end" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-chevron-down'></i>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                         <a href="#" class="dropdown-item" title="ajouter un questionaire" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter Questionnaire</a>

                        </li>
                      {{-- <li><a href="{{url('about_travailleur/'.$ST->id)}}" class="dropdown-item" title="voir plus d'informations">plus d'informations</a></li> --}}
                      <li>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#import">Exporter Excel</a>
                      </li>

                    </ul>
                </h6>

            </div>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>published</th>
                            <th><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody>

                     @foreach ($Questionnaire as $item )
                            <tr>
                                <td>{{$item->titre}}</td>
                                <td>{{$item->description}}</td>
                                @if ($item->published == True)
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                                     </div>
                                </td>
                                @else
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" disabled>
                                     </div>
                                </td>
                                @endif
                                <td>
                                    <div class="dropdown">
                                        <a  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class='bx bx-chevron-down'></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                          <li>
                                            <form method="POST" action="{{url('delete-Questionnaire/'.$item->id)}}">
                                                @csrf
                                                <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip" title='supprimer'>supprimer</button>
                                            </form>
                                          </li>
                                          <li> <a href="#" class="dropdown-item" title="editer un questionaire"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">editer</a></li>
                                          <li>
                                            <a href="{{url('get-section/'.$item->id)}}" class="dropdown-item">voir les sections</a>
                                          </li>

                                        </ul>
                                      </div>
                                </td>
                            </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>published</th>
                            <th><strong>Action</strong></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
