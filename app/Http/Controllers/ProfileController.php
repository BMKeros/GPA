<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        return Profile::create([
            'user_id' =>  \Auth::user()->id,
            'first_name' => $data['first_name'],
            'second_name'=> $data['second_name'],
            'first_surname' => $data['first_surname'],
            'second_surname'=> $data['second_surname'],
            'cedula'=> $data['cedula'],
            'number_phone'=> $data['number_phone'],
            'number_cellphone'=> $data['number_cellphone'],
            'hobby'=> $data['hobby'],
          ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);
        return view('profiles.show',compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('profiles.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        $this->validate(request(), [
            'first_name' => 'required',
            'second_name'=> 'required',
            'first_surname' => 'required',
            'second_surname'=> 'required',
            'cedula'=> 'required',
            'number_phone'=> 'required',
            'number_cellphone'=> 'required',
            'hobby'=> 'required',
        ]);
        $profile->first_name = $request->get('first_name');
        $profile->second_name = $request->get('second_name');
        $profile->first_surname = $request->get('first_surname');
        $profile->second_surname = $request->get('second_surname');
        $profile->cedula = $request->get('cedula');
        $profile->number_phone = $request->get('number_phone');
        $profile->number_cellphone = $request->get('number_cellphone');
        $profile->hobby = $request->get('hobby');
        $profile->save();
        return redirect()->action('ProfileController@show', $profile['id'])->with('success','Perfil actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
