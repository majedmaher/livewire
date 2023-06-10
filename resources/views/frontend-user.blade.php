<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="m-5 container d-flex justify-center align-items-center text-center" style="width: 100vw; height: 100vh;">
        <div class="card" style="width: 18rem;">
            <img src="{{asset($user->profile->picture)}}" class="card-img-top" alt="{{$user->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$user->name}}</h5>
                <p class="card-text">{{$user->profile->bio}}</p>
            </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Email: {{$user->email}}</li>
          <li class="list-group-item">Phone Number: {{$user->profile->contact_number}}</li>
          <li class="list-group-item">Website: {{$user->profile->website}}</li>
          <li class="list-group-item">Date of birth: {{$user->profile->date_of_birth}}</li>
        </ul>
        <div class="card-body">
            <li class="list-group-item">Status: {{$user->status == 1 ? 'Activated' : 'Deactivated'}}</li>
        </div>
    </div>
</div>
</body>
</html>