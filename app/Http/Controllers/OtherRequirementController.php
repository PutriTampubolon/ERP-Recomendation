<?php

namespace App\Http\Controllers;

use App\Models\Erp;
use App\Models\OtherRequirement;
use App\Models\Type;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;

class OtherRequirementController extends Controller
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

        return view('admin.other-requirement-create', compact(['erp']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'erp_id' => 'required',
            'bobot' => 'required|numeric'
        ]);

        $feedback = [];
        $error = [];

        try{
            OtherRequirement::create($validated);
            $feedback[0] = "Create User Need Success";
        }catch(Exception $e){
            $error = $e;
        }

        return redirect('/other_requirement')->with(compact(['feedback', 'error']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OtherRequirement  $otherRequirement
     * @return \Illuminate\Http\Response
     */
    public function show(OtherRequirement $otherRequirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OtherRequirement  $otherRequirement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $erp = Erp::all();
        $type = Type::where('id', 1)->get()->last();

        $otherRequirement = OtherRequirement::where('id', $id)->get()->last();

        return view('admin.other-requirement-update', compact(['erp', 'type', 'otherRequirement']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OtherRequirement  $otherRequirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'erp_id' => 'required',
            'bobot' => 'required|numeric'
        ]);

        $feedback = [];
        $error = [];

        try{
            OtherRequirement::where('id', $id)->update($validated);
            $feedback[0] = "Create User Need Success";
        }catch(Exception $e){
            $error = $e;
        }

        return redirect('/other_requirement')->with(compact(['feedback', 'error']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtherRequirement  $otherRequirement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OtherRequirement::where('id', $id)->delete();
        $feedback[0] = 'Success delete User Need';
        return redirect('/other_requirement')->with(compact(['feedback']));
    }
}
