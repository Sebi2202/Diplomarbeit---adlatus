<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Therapeut;
use DB;

class TherapeutController extends Controller
{
    /*
    public function __construct() {
        $this->middleware('auth:therapeut');
    }
    */
    

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
        return view('pages/registrierung');
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
        
        $therapeuts = Therapeut::all();
        foreach($therapeuts as $theras) {
            if($theras->sozNr == $request->input('sozNummer')) {
                return redirect('/error');
            }
        }
        if($request->input('password') == $request->input('again')) {
            $therapeut = new Therapeut();
            $therapeut->sozNr = $request->input('sozNummer');
            $therapeut->vorname = $request->input('vorname');
            $therapeut->nachname = $request->input('nachname');
            $therapeut->email = $request->input('email');
            $therapeut->password = $request->input('password');
    
            $therapeut->save();
            return redirect('/login')->with('Success', 'Therapeut created');
        }
        else {
            return redirect('/registrierung')->with('Error', 'Therapeut could not be created');
        }
        return redirect('/')-with('Error', 'Something went horribly wrong');
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
     * Redirects you to the Change_Password Page
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function continue(Request $required) {
        $therapeuts = Therapeut::all();
        $check = false;
        foreach($therapeuts as $therapeut) {
            if($therapeut->sozNr == $required->input('sozNummer') and $therapeut->vorname == $required->input('vorname') and $therapeut->nachname == $required->input('nachname')) {
                $check = true;
            }
            if($check == true) {
                return view('pages/change_password')->with('therapeut', $therapeut);
            }
        }
        return redirect('/forgot_password');
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
    public function update(Request $request, $sozNr)
    {
        $this->validate($request, [
            'password' => array(
                'required',
                'min:6'
            ),
            'again' => 'required'
        ]);
        
        $therapeut = Therapeut::where('sozNr', $sozNr)->first();

        if($request->input('password') == $request->input('again')) {
            //$therapeut->password = $request->input('password');
            Therapeut::where('sozNr', $sozNr)->update(['password'=> $request->input('password')]);
    
            return redirect('/login')->with('Success', 'Password Changed');
            
        }
        else {
            return redirect('/forgot_password');
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
