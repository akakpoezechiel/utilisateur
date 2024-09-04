<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <title>Tableau de bord</title>

</head>

<body>

    @if (Auth::check() && Auth::user()->email == 'admin@gmail.com')

        <div class="container">

            <div class="welcome-message">
                <h1>Tableau de bord</h1>
                <h3>Bienvenue {{ Auth::user()->name }}</h3>
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
                                <th width="100" class="text-center">Opérations</th>
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

