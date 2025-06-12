<?php

namespace App\Http\Controllers;

use App\Models\Erp;
use App\Models\FunctionArea;
use App\Models\FunctionAreaErp;
use Illuminate\Http\Request;

class FunctionAreaController extends Controller
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
        return view('admin.function-area-create', compact(['erp']));
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

        $function_area = FunctionArea::create([
            'name' => $request->name
        ]);

        foreach ($erp as $item) {
            $bobot = "bobot" . $item->name;
            FunctionAreaErp::create([
                'erp_id' => $item->id,
                'function_area_id' => $function_area->id,
                'bobot' => $request->$bobot
            ]);
        }

        $feedback[0] = 'Success add Function Area';
        return redirect('/function_area')->with(compact(['feedback']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FunctionArea  $functionArea
     * @return \Illuminate\Http\Response
     */
    public function show(FunctionArea $functionArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FunctionArea  $functionArea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $function_area = FunctionArea::where('id', $id)->get()->last();
        $erp = Erp::all();
        // dd($modul->erp[0]->pivot->bobot);
        return view('admin.function-area-update', compact(['function_area', 'erp']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FunctionArea  $functionArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = [];
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $erp = Erp::all();

        $modul = FunctionArea::where('id', $id)->update([
            'name' => $request->name
        ]);

        foreach ($erp as $item) {
            $bobot = "bobot" . $item->name;
            FunctionAreaErp::where('function_area_id', $id)->where('erp_id', $item->id)->update([
                'bobot' => $request->$bobot
            ]);
        }

        $feedback[0] = 'Success update Function Area';
        return redirect('/function_area')->with(compact(['feedback']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FunctionArea  $functionArea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $erp = Erp::all();

        foreach ($erp as $item) {
            FunctionAreaErp::where('function_area_id', $id)->where('erp_id', $item->id)->delete();
        }
        FunctionArea::where('id', $id)->delete();


        $feedback[0] = 'Success delete Function area';
        return redirect('/function_area')->with(compact(['feedback']));
    }
}
