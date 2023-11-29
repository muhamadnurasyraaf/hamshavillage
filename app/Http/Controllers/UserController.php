<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
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
        $user = User::create([
            'username' => 'asyraaf',
            'email' => 'masyraaf14@gmail.com',
            'is_admin' => true,
            'email_verified_at' => now(), // Assuming email is verified at the time of creation
            'password' => bcrypt('PythonisSucks98@#'), // Change 'password' to the desired password for the admin user
        ]);
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'username' => 'required|string|min:4|max:20',
                'email' => 'required|email|',
                'password' => 'string|min:7|max:25',
            ]);
            $validatedData['password'] = bcrypt($request->password);
            User::create($validatedData);
            return $validatedData;
        }catch(ValidationException $e){
            return $e;
        }

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
