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
@foreach ($visite as $data)
{{-- modal pour visualiser visite details --}}
<div class="modal fade" id="exampleModalToggle{{$data->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">details </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="date">La date de visite</label>
                <input type="date" name="dateVisite" id="" value="{{$data->dateVisite}}" class="form-control" placeholder=""  readonly>
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
              </div>
              <div class="form-group mb-3">
                <label for="resultat">Resultat</label>
                <textarea name="resultat" id="" rows="5" class="form-control"  readonly>{{$data->resultat}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label for="recommendation">recommendation</label>
                <textarea name="recommendation" id="" rows="5" class="form-control"  readonly>{{$data->recommendation}}</textarea>
              </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2{{$data->id}}" data-bs-toggle="modal" data-bs-dismiss="modal">editer</button>
        </div>
      </div>
    </div>
  </div>
{{-- modal pour editer visite details --}}
  <div class="modal fade" id="exampleModalToggle2{{$data->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('update-visite/'.$data->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="date">La date de visite</label>
                <input type="date" name="dateVisite" id="" value="{{$data->dateVisite}}" class="form-control" placeholder=""  >
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
              </div>
              <div class="form-group mb-3">
                <label for="resultat">Resultat</label>
                <textarea name="resultat" id="" rows="5" class="form-control"  >{{$data->resultat}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label for="recommendation">recommendation</label>
                <textarea name="recommendation" id="" rows="5" class="form-control" >{{$data->recommendation}}</textarea>
              </div>
        </div>
        <div class="modal-footer">
        <button class="btn btn-success btn-sm" type="submit">Enregistrer</button>
        </form>
          <button class="btn btn-secondary btn-sm" data-bs-target="#exampleModalToggle{{$data->id}}" data-bs-toggle="modal" data-bs-dismiss="modal">Reteur</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
{{-- ajouter new visite --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter visite pour {{$travailleur->nom}} {{$travailleur->prenom}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{url('add-visite')}}" method="POST">
              @csrf
          <div class="modal-body">
              {{-- <div class="form-group mb-3"> --}}
                  {{-- <label for="date">La date de visite</label> --}}
                  <input type="hidden" name="travailleur_id" value="{{$travailleur->id}}" class="form-control"  >
                  {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                {{-- </div> --}}
                <div class="form-group mb-3">
                  <label for="date">La date de visite</label>
                  <input type="date" name="dateVisite" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
                  {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                </div>
                <div class="form-group mb-3">
                  <label for="resultat">Resultat</label>
                  <textarea name="resultat" id="" rows="5" class="form-control" aria-describedby="helpId" required></textarea>
                  <small id="helpId" class="text-muted">Veuillez saisir la resultal de cette visite</small>
                </div>
                <div class="form-group mb-3">
                  <label for="recommendation">recommendation</label>
                  <textarea name="recommendation" id="" rows="5" class="form-control" aria-describedby="helpId" required></textarea>
                  <small id="helpId" class="text-muted">Veuillez saisir des recommendation pour ce patient</small>
                </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
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
<div class="row">

    <div class="card">
    <div class="card">
        <div class="card-header">
         <h6>
             list des visite effectuer par {{$travailleur->nom}} {{$travailleur->prenom}}
             <div class="d-flex flex-row-reverse bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <a href="#" class="btn btn-primary btn btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" title="ajouter visite">+</i></a>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="{{url('medcin_visite')}}" class="btn btn-danger btn btn-sm float-end" title="retour"><i class='bx bx-arrow-back'></i></a>
                </div>
              </div>
        </h6>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Date de Visite</th>
                        <th>Resultat</th>
                        <th>Recommendation</th>
                        <th><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>

                 @foreach ($visite as $item )
                        <tr>
                            <td> {{$item->dateVisite}}</td>
                            <td> {{$item->resultat}}</td>
                            <td> {{$item->recommendation}}</td>
                            <td>
                            <a class="btn btn-secondary btn-sm" data-bs-toggle="modal" href="#exampleModalToggle{{$item->id}}" role="button"><i class='bx bxs-show'></i></a>
                            <a href="{{url('delete-visite/'.$item->id)}}" class="btn btn-danger btn-sm"><i class='bx bxs-message-alt-x'></i></a>
                            </td>
                        </tr>
                @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>Date de Visite</th>
                        <th>Resultat</th>
                        <th>Recommendation</th>
                        <th><strong>Action</strong></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer text-muted">
            <a href="{{url('print-pdf/'.$travailleur->id)}}" class="btn btn-success btn-sm float-end">print rapport</i></a>
        </div>
    </div>
</div>
</div>

@endsection
