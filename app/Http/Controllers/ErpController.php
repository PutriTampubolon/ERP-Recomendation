<?php

namespace App\Http\Controllers;

use App\Models\Erp;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;

class ErpController extends Controller
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
        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|image',
            'budget' => 'required|numeric',
            'implementation' => 'required|string',
            'size' => 'required|numeric',
            'deployment' => 'required|string',
        ]);

        $product_image = $request->file('image');
        $image = $product_image->getClientOriginalName();
        $tujuan_upload = './assets/image';
        $product_image->move($tujuan_upload, $image);


        $feedback = [];
        $error = [];
        try {
            $erp = Erp::create([
                'name' => $request->name,
                'description' => $request->description,
                'link' => $request->link,
                'image' => $image,
                'budget' => $request->budget,
                'implementation' => $request->implementation,
                'size' => $request->size,
                'deployment' => $request->deployment
            ]);

            $feedback[0] = "Insert Erp Success";
        } catch (Exception $e) {
            $error = $e;
        }

        return redirect('/erp/' . $erp->id)->with(compact(['feedback', 'error']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Erp  $erp
     * @return \Illuminate\Http\Response
     */
    public function show(Erp $erp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Erp  $erp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $erp = Erp::where('id', $id)->get()->last();

        return view('admin.erp-update', compact(['erp']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Erp  $erp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|image',
            'budget' => 'required|numeric',
            'implementation' => 'required|string',
            'size' => 'required|numeric',
            'deployment' => 'required|string',
        ]);

        $product_image = $request->file('image');
        $image = $product_image->getClientOriginalName();
        $tujuan_upload = './assets/image';
        $product_image->move($tujuan_upload, $image);


        $feedback = [];
        $error = [];
        try {
            $erp = Erp::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'link' => $request->link,
                'image' => $image,
                'budget' => $request->budget,
                'implementation' => $request->implementation,
                'size' => $request->size,
                'deployment' => $request->deployment
            ]);

            $feedback[0] = "Update Erp Success";
        } catch (Exception $e) {
            $error = $e;
        }

        return redirect('/erp/' . $id)->with(compact(['feedback', 'error']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Erp  $erp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = [];
        $error = [];
        try{
            Erp::where('id', $id)->delete();
            $feedback[0] = "Delete Erp Success";
        }catch(Exception $e){
            $error = $e;
        }

        return redirect('/erp/1')->with(compact(['feedback', 'error']));
    }
}
