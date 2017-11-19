<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Therapeut;

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
                'regex:/\d...([0][1-9]|[1,2]\d|[3][0,1])([0][1-9]|[1][0-3])\d\d/u',
                'min:10',
                'max:10'
            ),
            'vorname' => 'required',
            'nachname' => 'required',
            'email' => 'nullable',
            'password' => array(
                'required',
                'min:6',
                'max:20'
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
