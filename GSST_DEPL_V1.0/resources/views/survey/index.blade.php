@extends('app.layout')
@section('content')
<div class="modal fade" id="add_survey" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une Evaluation :</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ url('add-survey') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nom </label>
                    <input type="text" name="name" class="form-control"  required>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Reference</label>
                    <input type="text" name="reference" class="form-control" required>
                </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">
            Save
        </button>
        </div>
    </form>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
  @endif
<div class="card">
    <div class="card-header">
        <h5>
            Evaluation des formations
            <button class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#add_survey">+</button>
        </h5>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>reference</th>
                    <th>content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($survey as $survey)
                    <tr>
                        <td>{{$survey->name}}</td>
                        <td>{{$survey->referece}}</td>
                        <td><a href="{{url('editer_content/'.$survey->id)}}" class="btn btn-info btn-sm"><i class='bx bxs-show'></i></a></td>
                        <td>
                            <div class="dropdown">
                                <a  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class='bx bx-chevron-down'></i>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <li><a href="#" role="button" class="dropdown-item" title="editer" data-bs-toggle="modal" data-bs-target="#exampleModal">editer</a></li>
                                  <li><a href="{{url('surveyDemo/'.$survey->id)}}"  class="dropdown-item" title="voir le survey" >Demo</a></li>
                                  <li>
                                    <form method="POST" action="{{url('delete-survey/'.$survey->id)}}">
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
        </table>
    </div>
</div>
@endsection
