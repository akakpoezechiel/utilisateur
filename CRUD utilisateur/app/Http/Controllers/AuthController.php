<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Interfaces\AuthenticationInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {
       
        $credentials = $request->only('email', 'password');

        try {
            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard');
            } else {
                return back()->with('error', "Email or password incorrect.");
            }


        } catch (\Exception $ex) {
            return back()->with('error', 'An error occurred during processing. Please try again!');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
