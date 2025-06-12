<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->company);

        $feedback = session('feedback');
        $company = Company::where("user_id", Auth::user()->id)->get()->last();
        return view('user.company', compact(['feedback', 'company']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owner = Owner::where("user_id", Auth::user()->id)->get()->last();
        $company = Company::where("user_id", Auth::user()->id)->get()->last();

        return view('user.company-create', compact(['owner', 'company']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feedback = null;
        $error = null;
        $validate = $request->validate([
            'user_id' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'address' => 'required|string'
        ]);
        // Lakukan tindakan jika validasi berhasil
        Company::create($validate);
        $feedback[0] = "Insert data Berhasil";

        return redirect('/company')->with(compact(['feedback', 'error']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company =  Company::where('id', $id)->get()->last();
        return view('user.company-update', compact(['company']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = null;
        $error = null;
        $validate = $request->validate([
            'user_id' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'address' => 'required|string'
        ]);
        // Lakukan tindakan jika validasi berhasil
        Company::where('id', $id)->update($validate);
        $feedback[0] = "Update data Company Profile Success";

        return redirect('/profile')->with(compact(['error', 'feedback']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = null;
        $error = null;
        try {
            // Lakukan tindakan jika validasi berhasil
            Company::where('id', $id)->delete();
            $feedback[0] = "Delete data success";
        } catch (ValidationException $e) {
            // Tangani error validasi di sini
            $feedback = $e->validator->errors()->all();
            $error[0] = 'danger';
            // Lakukan tindakan sesuai kebutuhan, misalnya tampilkan pesan error kepada pengguna
        }
        return redirect('/profile')->with((compact(['error', 'feedback'])));
    }
}
