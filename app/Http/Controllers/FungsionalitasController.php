<?php

namespace App\Http\Controllers;

use App\Models\Erp;
use App\Models\Fungsionalitas;
use App\Models\FungsionalitasErp;
use App\Models\Modul;
use Illuminate\Http\Request;

class FungsionalitasController extends Controller
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
        $erp = Erp::all();
        return view('admin.fungsionalitas-create', compact(['erp']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feedback = [];
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $erp = Erp::all();

        $fungsionalitas = Fungsionalitas::create([
            'name' => $request->name
        ]);

        foreach ($erp as $item) {
            $bobot = "bobot" . $item->name;
            FungsionalitasErp::create([
                'erp_id' => $item->id,
                'fungsionalitas_id' => $fungsionalitas->id,
                'bobot' => $request->$bobot
            ]);
        }

        $feedback[0] = 'Success add Fungsionalitas';
        return redirect('/fungsionalitas')->with(compact(['feedback']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fungsionalitas  $fungsionalitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fungsionalitas $fungsionalitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fungsionalitas  $fungsionalitas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modul = Modul::where('id', 3)->get()->last();
        $fungsionalitas = Fungsionalitas::where('id', $id)->get()->last();
        $erp = Erp::all();
        // dd($modul->erp[0]->pivot->bobot);
        return view('admin.fungsionalitas-update', compact(['modul', 'erp', 'fungsionalitas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fungsionalitas  $fungsionalitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = [];
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $erp = Erp::all();

        $fungsionalitas = Fungsionalitas::where('id', $id)->update([
            'name' => $request->name
        ]);

        foreach ($erp as $item) {
            $bobot = "bobot" . $item->name;
            FungsionalitasErp::where('fungsionalitas_id', $id)->where('erp_id', $item->id)->update([
                'bobot' => $request->$bobot
            ]);
        }

        $feedback[0] = 'Success update Fungsionalitas';
        return redirect('/fungsionalitas')->with(compact(['feedback']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fungsionalitas  $fungsionalitas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $erp = Erp::all();

        foreach ($erp as $item) {
            FungsionalitasErp::where('fungsionalitas_id', $id)->where('erp_id', $item->id)->delete();
        }
        Fungsionalitas::where('id', $id)->delete();


        $feedback[0] = 'Success delete Fungsionalitas';
        return redirect('/fungsionalitas')->with(compact(['feedback']));
    }
}
