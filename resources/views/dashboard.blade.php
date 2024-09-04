<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <title>Tableau de bord</title>

    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    color: #333;
   padding-top: 10%;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: yellow;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style pour le tableau de bord */
.welcome-message {
    text-align: center;
    margin-bottom: 20px;
}

.welcome-message h1 {
    font-size: 36px;
    color: #4CAF50;
    margin-bottom: 10px;
}

.welcome-message h3 {
    font-size: 24px;
    color: #555;
}

/* Styles pour la table des utilisateurs */
.wrap-content {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #f2f2f2;
    color: #333;
}

table td {
    background-color: #fff;
}

/* Style pour les boutons */
.button {
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    display: flex;
    transition: background-color 0.3s;
}

.button.primary {
    background-color: blue;
    display: flex;
    justify-content: center;
}

.button.primary:hover {
    background-color: #45a049;
}

.button.error {
    background-color: #f44336;
}

.button.error:hover {
    background-color: #e53935;
}

.icon-button {
    padding: 8px 12px;
    font-size: 14px;
    border-radius: 3px;
    text-decoration: none;
    color: #fff;
    display: flex;
    transition: background-color 0.3s;
}

.icon-button.primary {
    background-color: #4CAF50;
    display: flex;
    justify-content: center;
    text-align: center;
}

.icon-button.error {
    background-color: #f44336;
    justify-content: center;
    text-align: center;
}

.icon-button:hover {
    opacity: 0.8;
}

/* Style pour l'utilisateur lambda */
h1 {
    font-size: 36px;
    color: #333;
    text-align: center;
    margin-top: 50px;
}

        
    </style>

</head>

<body>

    @if (Auth::check() && Auth::user()->email == 'admin@gmail.com')

        <div class="container">

            <div class="welcome-message">
                <h1>TABLEAU DE BORD</h1>
                <h3>BIENVENUE {{ Auth::user()->name }}</h3>
            </div>

            <div class="wrap-content">
                <table width="100%">
                    <tr>
                        <td>
                            <h2>Liste des utilisateurs</h2>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('addUser') }}" class="button primary">Créer</a>
                        </td>
                    </tr>
                </table><br />



                <div class="border datatable-cover">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th width="100" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="icon-button primary">Modifier</a>

                                        &nbsp;

                                        <a href="#" class="icon-button error"
                                            onclick="event.preventDefault(); 
                                             if(confirm('Êtes-vous sûr(e) de vouloir supprimer cet utilisateur ? Cette action sera irréversible !')) {
                                             document.getElementById('delete-user-{{ $user->id }}').submit();
                                            }">
                                            Supprimer
                                        </a>

                                        <form id="delete-user-{{ $user->id }}"
                                            action="{{ route('users.delete', $user->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
</body>

</html>


@else

{{-- A AFFICHER A L'UTILISATEUR LAMBDA --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <title>Page de Bienvenue</title>

</head>

<body>
    <div class="container">
        <h1>Bienvenue {{ Auth::user()->name }}</h1>
    </div>
</body>

</html>

@endif

