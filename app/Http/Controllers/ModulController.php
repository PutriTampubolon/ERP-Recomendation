<?php

namespace App\Http\Controllers;

use App\Models\Erp;
use App\Models\Modul;
use App\Models\ModulErp;
use Illuminate\Http\Request;

class ModulController extends Controller
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
        return view('admin.modul-create', compact(['erp']));
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

        $modul = Modul::create([
            'name' => $request->name
        ]);

        foreach ($erp as $item) {
            $bobot = "bobot" . $item->name;
            ModulErp::create([
                'erp_id' => $item->id,
                'modul_id' => $modul->id,
                'bobot' => $request->$bobot
            ]);
        }

        $feedback[0] = 'Success add Modul';
        return redirect('/modul')->with(compact(['feedback']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function show(Modul $modul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modul = Modul::where('id', $id)->get()->last();
        $erp = Erp::all();
        // dd($modul->erp[0]->pivot->bobot);
        return view('admin.modul-update', compact(['modul', 'erp']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = [];
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $erp = Erp::all();

        $modul = Modul::where('id', $id)->update([
            'name' => $request->name
        ]);

        foreach ($erp as $item) {
            $bobot = "bobot" . $item->name;
            ModulErp::where('modul_id', $id)->where('erp_id', $item->id)->update([
                'bobot' => $request->$bobot
            ]);
        }

        $feedback[0] = 'Success update Modul';
        return redirect('/modul')->with(compact(['feedback']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $erp = Erp::all();

        foreach ($erp as $item) {
            ModulErp::where('modul_id', $id)->where('erp_id', $item->id)->delete();
        }
        Modul::where('id', $id)->delete();


        $feedback[0] = 'Success delete Modul';
        return redirect('/modul')->with(compact(['feedback']));
    }
}
