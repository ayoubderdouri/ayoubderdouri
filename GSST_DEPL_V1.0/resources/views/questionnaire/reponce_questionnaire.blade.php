@extends('app.layout')
@section('content')
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
                      <th>la date d'enregistrement</th>
                      <th></th>
                      <th>published</th>
                      <th><strong>Action</strong></th>
                  </tr>
              </thead>
              <tbody>

               @foreach ($reponce as $item )
                      <tr>
                          <td>{{$item->enregistred_at}}</td>
                          <td>{{$item->reponce_path}}</td>
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
