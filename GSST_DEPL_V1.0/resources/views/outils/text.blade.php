@extends('app.layout')
@section('content')
<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un avis</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{url('addText')}}" method="POST">
            @csrf
            <div class="form-floating">
                <textarea class="form-control" name="text" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">taper votre text ici </label>
              </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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
        Text de sensibilisation
        <a href="#" class="btn btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">ajouter un text</a>
     </h6>
    </div>
    <div class="card-body">
       <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>Text</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($text as $TT)
            <tr>
                <td>{{$TT->text}}</td>
                <td>
                    <a href="{{url('delete_text/'.$TT->id)}}" class="btn btn-outline-danger float end ">suprimmer</a>
                </td>
            </tr>
            @endforeach
        </tbody>
       </table>
    </div>
</div>
@endsection
