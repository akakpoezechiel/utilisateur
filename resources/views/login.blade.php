
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <title>Authentification</title>
    <style>
   /* Styles généraux */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
    color: #4CAF50;
}

label {
    font-size: 14px;
    color: #555;
    margin-bottom: 5px;
    display: block;
}

input[type="text"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
    color: #333;
}

input[type="text"]:focus {
    border-color: #4CAF50;
    outline: none;
}

button[type="submit"] {
    width: 100%;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

/* Style pour les messages de succès */
.alert-success {
    background-color: #dff0d8;
    color: #3c763d;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 20px;
    list-style-type: none;
}

.alert-success li {
    margin: 0;
    padding: 0;
}

    </style>
</head>

<body>
    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <h1>Connexion</h1>

        @if ($errors->any())
            <ul class="alert alert-danger">
                {!! implode('', $errors->all('<li>:message</li>')) !!}
            </ul>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert">{{ $message }}</div><br />
        @endif

        <label for="email">Email</label><br />
        <input type="text" name="email" id="email" placeholder="Saisir l'e-mail ici" /><br /><br />

        <label for="password">Mot de passe</label><br />
        <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici" /><br /><br />


        <button type="submit">Soumettre</button>
    </form>
</body>

</html>
