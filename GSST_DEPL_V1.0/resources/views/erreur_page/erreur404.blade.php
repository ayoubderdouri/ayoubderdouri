@extends('app.layout')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('css/erreur404.css')}}" />
@endsection
@section('content')
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h3>Oops! Page non trouvée</h3>
            <h1><span>4</span><span>0</span><span>4</span></h1>
        </div>
        <h2>Désolé, vous n'avez pas accès à cette page</h2>
    </div>
</div>
@endsection
