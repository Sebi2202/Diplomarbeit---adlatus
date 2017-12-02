<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sozNummer' => array(
                'required',
                'min:10',
                'max:10',
                'regex:/\d\d\d\d([0][1-9]|[1,2]\d|[3][0,1])([0][1-9]|[1][0-3])\d\d/u'
            ),
            'vorname' => 'required',
            'nachname' => 'required',
            'email' => 'required',
            'password' => array(
                'required',
                'min:6'
            ),
            'again' => 'required'
        ]); 

        $users = User::all();
        foreach($users as $user) {
            if($user->sozNr == $request->input('sozNummer')) {
                return view('error');
            }
        }
        
        if($request->input('password') == $request->input('again')) {
            $user = Auth::user();

            $pat = new User();
            $pat->sozNr = $request->input('sozNummer');
            $pat->vorname = $request->input('vorname');
            $pat->nachname = $request->input('nachname');
            $pat->email = $request->input('email');
            $pat->password = Hash::make($request->input('password'));
            $pat->role_id = 2;
            $pat->therapeut_sozNr = $user->sozNr;
                
            $pat->save();  
            
            return redirect('/dashboard')->with('Success', 'Patient created');
        }
        else {
            return redirect('/dashboard/create_patient')->with('Error', 'Patient could not be created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('patient')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validate($request, [
            'vorname' => 'required',
            'nachname' => 'required',
            'email' => 'required',
            'password' => array(
                'required',
                'min:6'
            ),
            'again' => 'required'
        ]); 

        if($request->input('password') == $request->input('again')) {
            $user = User::find($id);
            
            $user->vorname = $request->input('vorname');
            $user->nachname = $request->input('nachname');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
                
            $user->save();  
            
            return redirect('/dashboard')->with('Success', 'Patient updated');
        }
        else {
            return redirect('/dashboard/patient/{id}')->with('Error', 'Patient could not be updated');
        }
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
