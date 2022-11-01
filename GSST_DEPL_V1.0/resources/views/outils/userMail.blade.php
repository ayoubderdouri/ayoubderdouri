<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h6>
        Bonjour {{$details['nom']}} <br>
    </h6>
    <p>
        Je tiens à vous informer que votre compte a été créé<br>
        voici votre information : <br>
        Email : <u>{{$details['email']}}</u> <br>
        Mot de passe : <u>{{$details['pwd']}}</u><br>

    </p>
    <hr>
    <p> pour connecter clicker ici <a href="{{url('login')}}">GSST DEPL</a></p>
</body>
</html>
