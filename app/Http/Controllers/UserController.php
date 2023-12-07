<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        #if (Auth::check()) {
            // Check if the authenticated user has the 'admin' role
            #if (Auth::user()->hasRole('admin')) {
               /* $users = User::with('booking', 'person')->get();
                // Include the roles of each user
                $usersWithRoles = $users->map(function ($user) {
                    $userRoles = $user->getRoleNames();
                    $user->roles = $userRoles;
                    return $user;
                });
                return response()->json($usersWithRoles);
            /*}
            return response()->json(['error' => 'Unauthorized.'], 401);


        return response()->json(['error' => 'Unauthenticated.'], 401);*/
        //$users = User::all();
        $users = User::with( 'person')->get();
        return response()->json($users);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        //$user->person_id = $request->person_id;
        $user->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $user
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = User::with('booking', 'person')->find($user->id);
        // Incluimos los roles
        $userRoles = $user->getRoleNames();
        $user->roles = $userRoles;

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->person_id = $request->person_id;
        $user->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $user
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        $data = [
            'message' => "success",
            'code' => 204,
            'data' => $user
        ];
        return response()->json($data);
    }
}
