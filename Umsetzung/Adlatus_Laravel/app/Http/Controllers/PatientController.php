<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/create_patient');
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
            'email' => 'nullable',
            'password' => array(
                'required',
                'min:6'
            ),
            'again' => 'required'
        ]);

        $patients = Patient::all();
        foreach($patients as $patient) {
            if($patient->sozNr == $request->input('sozNummer')) {
                return redirect('/error');
            }
        }

        if($request->input('password') == $request->input('again')) {
            $patient = new Patient();
            $patient->sozNr = $request->input('sozNummer');
            $patient->vorname = $request->input('vorname');
            $patient->nachname = $request->input('nachname');
            $patient->email = $request->input('email');
            $patient->password = $request->input('password');
            $patient->therapeut_sozNr = auth()->therapeut()->sozNr;

            $patient->save();
            
            return redirect('/dashboard')->with('Success', 'Patient created');
        }
        else {
            return redirect('/create_patient')->with('Error', 'Patient could not be created');
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
        //
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
        //
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
