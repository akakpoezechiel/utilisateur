<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Interfaces\AuthenticationInterface;

class AddController extends Controller
{
    private AuthenticationInterface $authInterface;

    public function __construct(AuthenticationInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }


    public function showaddUserForm()
    {
        return view('addUser');
    }


    public function store(Request $request)
    {


        $name = $request->name;
        $email = $request->email;
   
        $password = $this->authInterface->sendPassword($email, $name);
      
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // Redirect to a success page or back to the form
        return redirect()->route('dashboard')->with('success', 'Utilisateur créer avec succès.');
    }

    // Afficher le formulaire de modification de l'utilisateur
    public function editUserForm($id)
    {
        $user = User::findOrFail($id);
        return view('editUser', compact('user'));
    }

    // Mettre à jour les informations de l'utilisateur
    public function updateUser(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Récupérer l'utilisateur
        $user = User::findOrFail($id);

        // Mettre à jour les attributs de l'utilisateur
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Sauvegarder les modifications
        $user->save();

        // Rediriger vers le tableau de bord avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Utilisateur modifié avec succès !');
    }


    //Méthode pour supprimer un utilisateur
    public function delete($id)
    {
        // Récupérer l'utilisateur
        $user = User::findOrFail($id);

        // Supprimer l'utilisateur
        $user->delete();

        // Rediriger vers le tableau de bord avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Utilisateur supprimé avec succès !');
    }



    
}
