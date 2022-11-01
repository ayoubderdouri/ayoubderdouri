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
@foreach ($section as $data)
<div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">editer  section</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('update-section/'.$data->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="titre">Ordre</label>
                <input type="number" name="ordre" id="" class="form-control" value="{{$data->ordre}}" placeholder="" aria-describedby="helpId" readonly>
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
              </div>
              <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="titre" id="" rows="5" class="form-control" aria-describedby="helpId" required>{{$data->titre}}</textarea>
                <small id="helpId" class="text-muted">Veuillez saisir une description</small>
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
  {{-- question --}}
  <div class="modal fade" id="question{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ajouter une section</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('add-question/'.$data->id)}}" method="POST">
            @csrf
        <div class="modal-body">
              <div class="form-group mb-3">
                <label for="description">Question</label>
                <textarea name="question" id="" rows="5" class="form-control" aria-describedby="helpId" required></textarea>
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
  @foreach ($data->questions as $question)
  <div class="modal fade" id="ques{{$question->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ajouter une section</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('update-question/'.$question->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
              <div class="form-group mb-3">
                <label for="description">Question</label>
                <textarea name="question" id="" rows="5" class="form-control" aria-describedby="helpId" required>{{$question->question}}</textarea>
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
@endforeach
@section('content')
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ajouter une section</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('add-section/'.$Questionnaire->id)}}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="titre">Ordre</label>
                <input type="number" name="ordre" id="" class="form-control" value="{{$maxValue->max+1}}" placeholder="" aria-describedby="helpId" readonly>
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
              </div>
              <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="titre" id="" rows="5" class="form-control" aria-describedby="helpId" required></textarea>
                <small id="helpId" class="text-muted">Veuillez saisir une description</small>
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
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
  @endif
<div class="card">
    <div class="card-header">
      <h6>
        {{$Questionnaire->titre}}
        <a href="#" class="btn btn-primary btn-sm float-end" title="ajouter section" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal"> +</a>
    </h6>


    </div>
    <div class="card-body">
        @foreach ($section as $sec)
        <div class="row justify-content-center">
        <div class="card w-75">
            <div class="card-header">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col">

                            <h6 class="fw-bold" >{{$sec->ordre}}){{$sec->titre}} </h6>
                        </div>
                        <div class="col">
                            <div class="dropdown">
                                <a  href="#" role="button" class="btn btn-secondary float-end" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class='bx bx-chevron-down'></i>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <li>
                                    <form method="POST" action="{{url('delete-section/'.$sec->id)}}">
                                        @csrf
                                        <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip" title='supprimer'>supprimer</button>
                                    </form>
                                  </li>
                                  <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal{{$sec->id}}">editer</a>
                                  <li>
                                    <a href="#" class="dropdown-item" title="ajouter section" type="button"  data-bs-toggle="modal" data-bs-target="#question{{$sec->id}}">ajouter Question</a>
                                  </li>

                                </ul>
                              </div>
                        </div>
                        </div>
                    </div>
                </div>


            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($sec->questions as $ques)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div >{{$ques->question}}</div>
                          </div>
                          <a href="{{url('del-question/'.$ques->id)}}"><span class="badge bg-danger rounded-pill"><i class='bx bx-message-square-x'></i></span></span></a>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#ques{{$ques->id}}"><span class="badge bg-primary rounded-pill"><i class='bx bx-edit-alt'></i></a>
                    </li>

                    @endforeach
                  </ul>

            </div>

        </div>
    </div>
    <br>
        @endforeach

    </div>
    <div class="card-footer text-muted">

    </div>
</div>
@endsection
