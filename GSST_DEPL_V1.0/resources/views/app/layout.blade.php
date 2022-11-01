<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSST DEPL</title>
    <link href="{{ asset('css\style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @yield('css')
</head>

<body>
    <div class="sidebar">
        <div class="logo_details" >
            <img src="{{ asset('images/logo.jpeg') }}" alt="" >
            <span class="logo_name">GSST DEPL</span>
        </div>
        <ul class="nav_links list-group" >
            @if (Auth::check() && Auth::user()->role=='Administrator')
            <li>
                <a href="#" role="button" id="dropdownMenuLinkid" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bxs-brightness' ></i>
                    <span class="lin_name">Outils</span>
                </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLinkid">
                      <li><a class="dropdown-item" href="{{url('users')}}">getion des utilisateur</a></li>
                      <li><a class="dropdown-item" href="{{url('sensibilisation')}}"> Text de sensibilisation</a></li>
                    </ul>
            </li>
            @endif
            <li>
                <a href="{{url('PlanActionGlobal')}}">
                    <i class='bx bx-map-alt'></i>
                    <span class="lin_name">Plan d'action global</span>
                </a>
            </li>
            <li>
                <a href="{{url('travailleurs')}}">
                    <i class='fa fa-group'></i>
                    <span class="lin_name">Travailleurs</span>
                </a>
            </li>
            <div class="dropdown">
            <li>
                <a href="{{url('medcin_visite')}}" >
                    <i class='fa fa-stethoscope'></i>
                    <span class="lin_name"> Espace MT</span>
                </a>
            </li>
        </div>
            <li>
                <a href="{{url('risque-page')}}">
                    <i class='bx bxs-hot'></i>
                    <span class="lin_name">Risques et Opportunités</span>
                </a>
            </li>
            <li>
                <a href="{{url('audits')}}">
                    <i class='bx bxs-user-check'></i>
                    <span class="lin_name">Audits</span>
                </a>
            </li>

            <li>
                <a href=""  role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-support'></i>
                    <span class="lin_name">Participation et engagement</span>
                </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{url('Reclamation')}}">Reclamtion et suggestion</a></li>
                        <li><a class="dropdown-item" href="{{url('list_off_reclamation')}}">Traitement de Reclamation</a></li>
                        <li><a class="dropdown-item" href="{{url('list_off_suggestion')}}">Traitement de suggestion</a></li>
                      </ul>
            </li>
            <li>
                <a href="{{url('survey_index')}}">
                    <i class='bx bx-task'></i>
                    <span class="lin_name">Evaluation des formations</span>
                </a>
            </li>
            <li>
                <a href="{{url('Questionnaire')}}">
                    <i class='bx bx-happy-alt'></i>
                    <span class="lin_name">Enquete de satisfaction</span>
                </a>
            </li>
            <li>
                <a href="#" role="button" id="dropdownMenuLinkid" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bxs-calendar-x'></i>
                    <span class="lin_name">Formation et sensibilisation</span>
                </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLinkid">
                      <li><a class="dropdown-item" href="{{url('formation')}}">plannig des formations</a></li>
                      <li><a class="dropdown-item" href="{{url('simulation')}}"> planning des exercices</a></li>

                    </ul>
            </li>
        </ul>
    </div>
    <!-- home section -->
    <section class="home_section">
        <nav >
            <div class="sidebar_button">
                <i class='bx bx-menu'></i>
            </div>
            <div class="search_box">
                <input type="text" placeholder="Search..." id="hautdepage">
                <i class='bx bx-search-alt'></i>
            </div>
            @if (Auth::check())
            <div class="profile_details">
               <img src="{{ asset('images/profile1.jpg') }}" alt="">
               <span class="admin_name">

                       {{Auth::user()->name}}

                </span>
                <div class="dropdown">
                    <a  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-chevron-down'></i>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="{{url('log-out')}}">log out</a></li>
                      <li><a class="dropdown-item" href="#">profile </a></li>

                    </ul>
                  </div>
                  @else
                  <a href="{{url('/home')}}" class="btn btn-primary float-end btn-sm" >log in </a>
                  @endif


            </div>
        </nav>
        <!-- home content -->
        <div class="container-lg mt-5 " id="containerDiv" >
            @yield('content')
        </div>
        {{-- <div class="footer">
            <!-- text widget --><div id="slap_moving_text" class="slap_moving_text" style="display: none"><a href="https://surlapage.fr" title="widgets html">widgets html</a><script charset="UTF-8" type="text/javascript" src="https://www.surlapage.fr/script/moving-text?ath=w&saletext=GSST%20DEPL&amp;bgcolor=rgb(255, 0, 132)&amp;color=rgb(255, 255, 255)&amp;size=lg&amp;pos=bottom"></script></div><!-- end text widget -->
        </div> --}}

    </section>
    <footer class="foot" >

        <div class="text-center p-4" >
            <marquee  direction="left" bgcolor="orange" scrolldelay=100>
                @foreach ($text as $t)
                <i class='bx bx-news' ></i>
                <div class="vr"></div>
                {{$t->text}}
                @endforeach
            </marquee>
            <hr>
            © {{date('Y')}} Copyright:
            <a class="text-reset fw-bold" href="{{url('/')}}">GSST DEPL</a>
        <button onclick="topFunction()"
        type="button"
        class="btn btn-danger btn float-end btn-sm"
        id="myBtn"
        >
        <i class='bx bx-up-arrow-alt'></i>
        </button>
          </div>
    </footer>
    <script src="{{ asset('js\sript.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>
{{-- <script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
></script> --}}
 @yield('script')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
 <script type="text/javascript">

  $('.show_confirm').click(function(event) {
       var form =  $(this).closest("form");
       var name = $(this).data("name");
       event.preventDefault();
       swal({
           title: `Voulez-vous vraiment supprimer cet enregistrement ?`,
           text: "Si vous le supprimez, il disparaîtra pour toujours.",
           icon: "warning",
           buttons: true,
           dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {
           form.submit();
         }
       });
   });

</script>
<script>
    @if($errors->any())
    var array = {{ json_encode($errors->any()) }};
    if(array !== null && array !== '') {

        document.getElementById('clickButton').click();

    }
    @endif
   </script>
</body>
</html>
