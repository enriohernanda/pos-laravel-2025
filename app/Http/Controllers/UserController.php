<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // SELECT * FROM USERS Order By id DESC
        // $users = User::all();
        $users = User::orderBy('id', 'DESC')->get();
        $title = 'Data User';
        return view('user.index', compact('users', 'title'));
        // return view('user.index', ['usr' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add User';
        return view('user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8'
            ]);

            User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]
            );
            return redirect()->route('user.index');
        } catch (ValidationException $th) {
            return redirect()->back()->withErrors($th->validator)->withInput();
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
        //SELECT * FROM users WHERE id = $id
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'nullable|min:8'
            ]);
            $data = [
                "name" => $request->name,
                "email" => $request->email,
            ];
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }
            $user->update($data);

            return redirect()->route('user.index');
        } catch (ValidationException $th) {
            return redirect()->back()->withErrors($th->validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // SELECT * FROM users WHERE id = $id
        $user = User::find($id);
        // DELETE FROM users WHERE id = $id
        $user->delete();
        return redirect()->route('user.index');
    }
}
