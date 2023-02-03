<?php

namespace App\Http\Controllers;

use App\Models\Knjiga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KnjigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //GET
    {
        return Knjiga::all();
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
    public function store(Request $request) //POST
    {
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:50',
            'godIzdanja' => 'required|integer',
            'autor' => 'required|integer',
            'zanr' => 'required|integer',
 
        ]);

        if ($validator->fails()) 
            return response()->json($validator->errors());
        $i = Knjiga::create([
            'naziv' => $request->naziv, 
            'godIzdanja' => $request->godIzdanja, 
            'autor' => $request->autor,
            'zanr' => $request->zanr,

 


        ]);
        $i->save();
        return response()->json(['Objekat je  kreiran', $i]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function show($id) //GET
    {
        return Knjiga::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function edit(Knjiga $knjiga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //PUT
    {
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:50',
            'godIzdanja' => 'required|integer',
            'autor' => 'required|integer',
            'zanr' => 'required|integer',
 
        ]);
        if ($validator->fails()) 
            return response()->json($validator->errors());
        $i = Knjiga::find($id);
        if($i){
            $i->naziv=$request->naziv;
            $i->godIzdanja=$request->godIzdanja;
            $i->autor=$request->autor;
            $i->zanr=$request->zanr;

            $i->save();
            return response()->json( ["Uspesno izmenjeno!",$i]);
        }else{
            return response()->json("Objekat ne postoji u bazi");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //DELETE
    {
        $i = Knjiga::find($id);
        $i->delete();
        return response()->json(["Objekat obrisan",$i]);
    }
}
