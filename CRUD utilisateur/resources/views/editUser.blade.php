
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <title>Modifier utilisateur</title>
    <style>
   
    </style>
</head>

<body>
    <form action="{{ route('users.update', $user->id) }}" method="POST" >
        @csrf
        @method('PUT') 
        <h1>Modifier un utilisateur</h1><br/><br/> <br/>

        @if ($message = Session::get("success"))
                <ul class="alert alert-success">
                    <li>{{ $message }}</li>
                </ul>
            @endif

        <label for="name">Le nom de l'utilisateur</label><br />
        <input type="text" name="name" id="name" placeholder="Saisir le nom ici" /><br /><br />

        <label for="email">Email de l'utilisateur</label><br />
        <input type="text" name="email" id="email" placeholder="Saisir l'e-mail ici " /><br /><br />

        <button type="submit">Soumettre</button>
    </form>
</body>

</html>
