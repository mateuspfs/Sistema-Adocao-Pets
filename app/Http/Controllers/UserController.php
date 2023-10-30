<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public readonly User $user;
    
    public function __construct()
    {
        $this->user = new User();
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->user->all();

        return view('admin/painel', ['users' => $users]);
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
    public function edit(User $user)
    {
        return view('admin/editar', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_user)
    {
        // $update = $this->user->where('id_user', $id_user)->update($request->except(['_token', '_method']));

        var_dump($request->all());

        // if($update) {
        //     return redirect()->back()->with('message', 'susccesfully updated');
        // }

        // return redirect()->back()->with('message', 'Failed updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
