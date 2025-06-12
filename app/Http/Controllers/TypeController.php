<?php

namespace App\Http\Controllers;

use App\Models\Erp;
use App\Models\Type;
use App\Models\UserNeed;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;

class TypeController extends Controller
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

        return view('admin.type-create', compact(['erp']));
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

        try {
            Type::create($validated);
            $feedback[0] = "Create User Need Success";
        } catch (Exception $e) {
            $error = $e;
        }

        return redirect('/type')->with(compact(['feedback', 'error']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $erp = Erp::all();
        $user_need = UserNeed::where('id', 3)->get()->last();
        $type = Type::where('id', $id)->get()->last();

        return view('admin.type-update', compact(['erp', 'user_need', 'type']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
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

        try {
            Type::where('id', $id)->update($validated);
            $feedback[0] = "Update Type Success";
        } catch (Exception $e) {
            $error = $e;
        }

        return redirect('/type')->with(compact(['feedback', 'error']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Type::where('id', $id)->delete();
        $feedback[0] = 'Success delete Type';
        return redirect('/type')->with(compact(['feedback']));
    }
}
