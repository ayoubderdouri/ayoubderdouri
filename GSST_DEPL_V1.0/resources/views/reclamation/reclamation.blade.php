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

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Reclamation</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Suggestion</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row justify-content-center">
                <div class="card w-50">
                    <div class="card-header">
                        <P>Reclamation</P>
                    </div>
                  <div class="card-body">
                 <form action="{{url('send-reclamation')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                          <label for="customRange3" class="form-label">Nom </label>
                          <input type="text" class="form-control" name="nom"   >
                      </div>
                      <div class="col-md-6">
                          <label for="customRange3" class="form-label">Prenom </label>
                          <input type="text" class="form-control" name="prenom"   >

                      </div>
                      </div>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label for="customRange3" class="form-label">Entite </label>
                          <input type="text" class="form-control" name="entite"   required>
                      </div>
                      <div class="col-md-6">
                          <label for="customRange3" class="form-label">Email </label>
                          <input type="email" class="form-control" name="email"   >

                      </div>
                      </div>
                      <div class="form-group mb-3">
                        <label for="description">Objet</label>
                        <textarea name="objet" id="" rows="5" class="form-control" aria-describedby="helpId" required></textarea>
                        {{-- <small id="helpId" class="text-muted">Decrit le Risque</small> --}}
                      </div>
                      <div class="form-group mb-3">
                        <label for="piece">Piece jointe</label>
                        <input type="file" name="piece" id="" class="form-control" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">si vous avez une photo </small>
                      </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-success float-end" type="submit">submit</button>
                </div>
             </form>
                </div>
            </div>

        </div>


    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div class="row justify-content-center">
            <div class="card w-50">
                <div class="card-header">
                    <P>Suggestion</P>
                </div>
              <div class="card-body">
             <form action="{{url('send-suggestion')}}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                      <label for="customRange3" class="form-label">Nom </label>
                      <input type="text" class="form-control" name="nom"   >
                  </div>
                  <div class="col-md-6">
                      <label for="customRange3" class="form-label">Prenom </label>
                      <input type="text" class="form-control" name="prenom"   >

                  </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="customRange3" class="form-label">Entite </label>
                      <input type="text" class="form-control" name="entite"   required>
                  </div>
                  <div class="col-md-6">
                      <label for="customRange3" class="form-label">Email </label>
                      <input type="email" class="form-control" name="email"   >

                  </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="description">Votre suggestions</label>
                    <textarea name="objet" id="" rows="5" class="form-control" aria-describedby="helpId" required></textarea>
                    {{-- <small id="helpId" class="text-muted">Decrit le Risque</small> --}}
                  </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-success float-end" type="submit">submit</button>
            </div>
         </form>
            </div>
        </div>
        </div>
    </div>
  </div>

</section>
@endsection
@section('script')
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
></script>
@endsection
