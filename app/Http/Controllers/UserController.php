<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

     public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getPostsByUser($id)
    {
        $contents = $this->user::with('posts')->find($id);

        return view('user.profile', compact('contents'));
    }

    public function getCommentsByUser($id)
    {
        $contents = $this->user::with('comments')->find($id);

        return view('user.profile',compact('contents'));
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('admin.users.index', ['users' => $this->user::with('role')->get()]);
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
