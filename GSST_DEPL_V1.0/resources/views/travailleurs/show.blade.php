@extends('app.layout')
@section('css')
        <link rel="stylesheet" href="{{asset('css/about_travailleur.css')}}">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endsection
@section('content')
{{-- modal pour editer --}}
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
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" data-bs-dismiss="modal">save change</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endforeach
{{-- readonly --}}
@foreach ( $conjointe as $item)
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
                <input type="text" name="cin" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="name">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="name">Prenom</label>
                <input type="text" name="prenom" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="type">type de conjointe </label>
                <select name="type" class="form-control">
                    @if($travailleur->sexe == 'Femme')
                    <option value="marie">marie</option>
                    @endif
                    @if($travailleur->sexe == 'Homme')
                    <option value="epouse">epouse</option>
                    @endif
                  </select>
            </div>
            <div class="form-group mb-3">
                <label for="name">Telephone</label>
                <input type="tel" name="tel" class="form-control" required  placeholder="06xxxxxxx" >

            </div>
            <div class="form-group mb-3">
                <label for="name">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="email@example.com">
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

<div class="card">
    <div class="card-header">
            <h2>
                About

                <a class="btn btn-primary float-end" href="{{ url('travailleurs') }}">Reteur</a>


            </h2>
    </div>
<div class="card-body">
    <div class="container emp-profile" id="contentPdf" >
        <div class="card">
            <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{asset('uploads/travailleurs/'.$travailleur->image_profile)}}" alt="Image"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                            <h5>
                                {{$travailleur->nom}}  {{$travailleur->prenom}}
                            </h5>
                            <h6>
                                Web Developer and Designer
                            </h6>
                            <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">conjointe</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>WORK LINK</p>
                    <a href="">Website Link</a><br/>
                    <a href="">Bootsnipp Profile</a><br/>
                    <a href="">Bootply Profile</a>
                    <p>SKILLS</p>
                    <a href="">Web Designer</a><br/>
                    <a href="">Web Developer</a><br/>
                    <a href="">WordPress</a><br/>
                    <a href="">WooCommerce</a><br/>
                    <a href="">PHP, .Net</a><br/>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>CIN</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$travailleur->cin}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nom</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$travailleur->nom}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$travailleur->email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$travailleur->tel}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$travailleur->fonction}}</p>
                                    </div>
                                </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <div class="card">
                            <div class="card-header">
                                    <h6>ajouter conjointe
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                           +
                                          </button>

                                    </h6>

                            </div>

                             <table id="example" class="table table-striped" style="width:100%">
                               <thead>
                                   <tr>
                                        <th>type</th>
                                       <th>nom complete</th>
                                       <th>phone</th>
                                       <th>Action</th>
                                   </tr>
                                </thead>
                                <tbody>
                                    @foreach ($conjointe as $data )
                                    <tr>
                                        <td>{{$data->type}}</td>
                                        <td>{{$data->nom}} {{$data->prenom}}</td>
                                        <td>{{$data->tel}}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$data->id}}" ><i class='bx bxs-show'></i></a>
                                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editemodal{{$data->id}}"><i class='bx bxs-edit'></i></a>
                                            <a href="{{url('delete-conjointe/'.$data->id)}}" class="btn btn-danger btn-sm"><i class='bx bxs-message-alt-x'></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
<div class="card-footer text-muted">
    <h2>
        Print PDF
        <button onclick="getPDF()" class="btn btn-secondary float-end"><i class='bx bx-download' ></i></button>
      </h2>
</div>

</div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
   pdf.addImage(myImage, 'png', 15, 2, imgWidth, imgHeight);
   pdf.save(`TestingPDF ${$('.pdf-title').text()}.pdf`);

   }
   });
   }

       </script>
@endsection
