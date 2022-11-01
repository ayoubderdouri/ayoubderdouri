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
@foreach ( $conjointe as $item)
<div class="modal fade" id="editemodal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">editer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('update-conjointe/'.$item->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="type">type de conjointe </label>
                    <select name="type" class="form-control">
                        @if($travailleur->sexe == 'Femme')
                        <option value="Mari">Mari</option>
                        @elseif($travailleur->sexe == 'Homme')
                        <option value="épouse">épouse</option>
                        @endif
                        <option value="enfant">enfant</option>
                      </select>
                </div>
            <div class="form-group mb-3">
                <label for="name">nom </label>
                <input type="text" value="{{$item->nom}}" name="nom" class="form-control" required >
            </div>
            <div class="form-group mb-3">
                <label for="name">prenom </label>
                <input type="text" value="{{$item->prenom}}" name="prenom" class="form-control" required >
            </div>

        <div class="form-group mb-3">
            <label for="name">CIN </label>
            <input type="text" value="{{$item->cin}}" name="cin" class="form-control" required >
        </div>
        <div class="form-group mb-3">
            <label for="name">Telephone </label>
            <input type="tel" value="{{$item->tel}}" name="tel" class="form-control"  required>
        </div>
        <div class="form-group mb-3">
            <label for="name">Email</label>
            <input type="email" value="{{$item->email}}" name="email" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="name">Date de naissance</label>
            <input type="date" name="dateNaissance" class="form-control" value="{{$item->dateNaissance}}" required>
        </div>
        <div class="form-group mb-3">
            <label for="name">Lieu de naissance </label>
            <input type="text" name="lieuNaissance" class="form-control" value="{{$item->lieuNaissance}}" required>
        </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" data-bs-dismiss="modal">save change</button>
        </div>
      </form>
      </div>
    </div>
  </div>

{{-- readonly --}}

<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="name">Type</label>
                <input  class="form-control" value="{{$item->type}}" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="name">nom </label>
                <input type="text" value="{{$item->nom}}" name="nom" class="form-control" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="name">prenom </label>
                <input type="text" value="{{$item->prenom}}" name="prenom" class="form-control" readonly>
            </div>

        <div class="form-group mb-3">
            <label for="name">CIN </label>
            <input type="text" value="{{$item->cin}}" name="CIN" class="form-control" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="name">Telephone </label>
            <input type="tel" value="{{$item->tel}}" name="tel" class="form-control" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="name">Email</label>
            <input type="email" value="{{$item->email}}" name="email" class="form-control" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="name">Date de naissance</label>
            <input type="date" name="dateNaissance" class="form-control" value="{{$item->dateNaissance}}" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="name">Lieu de naissance </label>
            <input type="text" name="lieuNaissance" class="form-control" value="{{$item->lieuNaissance}}" readonly>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
        </div>
      </div>
    </div>
  </div>
@endforeach

{{-- modal pour cree new conjointe --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">conjointe pour {{$travailleur->nom}} {{$travailleur->prenom}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('add-conjointe') }}" method="POST">
            @csrf
        <div class="modal-body">
                {{-- <div class="form-group mb-3"> --}}
                    {{-- <label for="name">ID de travailleur associer avec cette conjointe</label> --}}
                    <input type="hidden" value="{{$travailleur->id}}" name="travailleur_id" class="form-control" readonly>
                {{-- </div> --}}
            <div class="form-group mb-3">
                <label for="name">CIN</label>
                <input type="text" name="cin" class="form-control  @error('cin') is-invalid @enderror"  value="{{ old('cin') }}" required>
                @if ($errors->has('cin'))
                            <span class="text-danger">{{ $errors->first('cin') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="name">Nom</label>
                <input type="text" name="nom" value="{{ old('nom') }}" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="name">Prenom</label>
                <input type="text" name="prenom" value="{{ old('prenom') }}" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="type">type de conjointe </label>
                <select name="type" class="form-control">
                    @if($travailleur->sexe == 'Femme')
                    <option value="Mari">Mari</option>
                    @elseif($travailleur->sexe == 'Homme')
                    <option value="épouse">épouse</option>
                    @endif
                    <option value="enfant">enfant</option>
                  </select>
            </div>
            <div class="form-group mb-3">
                <label for="name">Telephone</label>
                <input type="tel" name="tel" class="form-control" value="{{ old('tel') }}" required  placeholder="06xxxxxxx" >

            </div>
            <div class="form-group mb-3">
                <label for="name">Email</label>
                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="email@example.com">
                @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="name">Date de naissance</label>
                <input type="date" name="dateNaissance" class="form-control" value="{{ old('dateNaissance') }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="name">Lieu de naissance </label>
                <input type="text" name="lieuNaissance" class="form-control" value="{{ old('lieuNaissance') }}" required>
            </div>
             <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
            </div>

          </form>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
  @endif

<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Conjoint(e)</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">About</a>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row justify-content-center">
            <div class="card" style="with:340rem ;">
                <div class="card-header">
                    <h5>conjointe
                        <button type="button" id="clickButton" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Ajouter conjoint(e)
                           </button>
                    </h5>
                </div>
                <div class="card-body">
                    <table  id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                 <th>type</th>
                                 <th>CIN</th>
                                <th>nom </th>
                                <th>prenom</th>
                                <th>telephone</th>
                                <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($conjointe as $data )
                             <tr>
                                 <td>{{$data->type}}</td>
                                 <td>{{$data->cin}} </td>
                                 <td>{{$data->nom}} </td>
                                 <td>{{$data->prenom}}</td>
                                 <td>{{$data->tel}}</td>
                                 <td>
                                      <div class="d-flex justify-content-sm-around">
                                        <div class="p-2 bd-highlight">
                                            <a href="#" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$data->id}}" ><i class='bx bxs-show'></i></a>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editemodal{{$data->id}}"><i class='bx bxs-edit'></i></a>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <form method="POST" action="{{url('delete-conjointe/'.$data->id)}}">
                                                @csrf
                                                <button type="submit" class="btn  btn-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete'><i class='bx bxs-message-alt-x'></i></button>
                                            </form>
                                        </div>
                                      </div>
                                 </td>
                             </tr>
                             @endforeach
                         </tbody>
                         <tfoot>
                            <tr>
                                <th>type</th>
                                <th>CIN</th>
                               <th>nom </th>
                               <th>prenom</th>
                               <th>telephone</th>
                               <th>Action</th>
                            </tr>
                         </tfoot>
                     </table>
                </div>
            </div>


        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row justify-content-center">
            <div class="card text-dark " >
                <div class="card-header">
                    <P>About
                        <button onclick="getPDF()" class="btn btn-secondary float-end"><i class='bx bx-download' ></i></button>
                    </P>
                </div>
                <div class="card-body" id='contentPdf'>
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card text-dark "  style="height:34rem ;">
                                {{-- <img src="{{asset('uploads/travailleurs/1651940043.jpg')}}" class="card-img-top" alt="..." style="width: 100%;height:50% ;"> --}}
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{asset('uploads/travailleurs/'.$travailleur->image_profile)}}" alt="Admin" class="rounded-circle" width="150">

                                        <div class="mt-3">
                                          <h4>{{$travailleur->nom}}  {{$travailleur->prenom}}</h4>

                                          <p class="text-primary mb-1">  {{$travailleur->fonction}}</p>
                                          <p class="text-muted mb-1">Email :</p>
                                          <p class="text-primary mb-1">  {{$travailleur->email}}</p>
                                          <p class="text-muted mb-1">Telephone :</p>
                                          <p class="text-primary mb-4"> {{$travailleur->tel}}</p>
                                          <p class="text-muted mb-1">Adresse :</p>
                                          <p class="text-primary mb-4"> {{$travailleur->adresse}}</p>

                                        </div>
                                      </div>
                                </div>
                              </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card text-dark  mb-3" >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Nom</h6>
                                        </div>
                                        <div class="col-sm-9 text-primary">
                                            {{$travailleur->nom}}
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Prenom</h6>
                                        </div>
                                        <div class="col-sm-9 text-primary">
                                              {{$travailleur->prenom}}
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">CIN</h6>
                                        </div>
                                        <div class="col-sm-9 text-primary">
                                            {{$travailleur->cin}}
                                        </div>
                                      </div>
                                      <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Sexe</h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$travailleur->sexe}}
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Situation Social</h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$travailleur->situation}}
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col">
                                      <h6 >Date de Naissance</h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$travailleur->dateNaissance}}
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Lieu de naissance</h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$travailleur->lieuNaissance}}
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Affeliation CNOPS</h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$travailleur->affeliation_cnops}}
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">groupe sanguin</h6>
                                    </div>
                                    <div class="col-sm-9 text-primary">
                                        {{$travailleur->group_sanguin}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  </div>

@endsection
@section('script')
{{-- <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
{{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<script>
    function getPDF() {
return html2canvas($('#contentPdf'), {
background: "#ffffff",
onrendered: function(canvas) {
var myImage = canvas.toDataURL("image/jpeg,1.0");
// Adjust width and height
var imgWidth = (canvas.width * 32) / 240;
var imgHeight = (canvas.height * 35) / 240;
var pdf = new jsPDF('p', 'mm', 'a4');
pdf.addImage(myImage, 'png', 5, 2, 200, 100);
pdf.save(`TestingPDF ${$('.pdf-title').text()}.pdf`);

}
});
}

   </script>



@endsection
