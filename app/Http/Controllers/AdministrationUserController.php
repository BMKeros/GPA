<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Role;

use Illuminate\Http\Request;

class AdministrationUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.show_users', ['users' => $users]);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('/admin.create_user',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user->roles()->sync([(int) $data['rol']]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.edit_users', ['user' => $user, 'roles' => $roles]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $this->validate(request(), [
            'name' => 'required',
            'email'=> 'required',
            
        ]);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        
        if($request->get('password') !== ''){
            $user->password = bcrypt($request->get('password'));
        }
        
        if($request->get('rol') != 0){
            $user->roles()->sync([(int) $request->get('rol')]);
        } 
        
        
        $user->save();

        return redirect()->route('users.index')->with('success','Datos del usuario actualizados');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	$user = User::findOrFail($id);

        $user->delete();

        
        return redirect()->route('users.index');
    }
}
