<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = session('feedback');
        $error = session('error');
        $owner = Owner::where("user_id", Auth::user()->id)->get()->last();
        $company = Company::where("user_id", Auth::user()->id)->get()->last();
        return view('user.owner', compact(['feedback', 'company', 'owner', 'error']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        // Lakukan tindakan jika validasi berhasil

        $feedback = [];
        $error = [];


        try {
            $request->validate([
                'foto' => 'image|required'
            ]);

            $product_image = $request->file('foto');
            $gambar = $product_image->getClientOriginalName();
            $tujuan_upload = './assets/image';
            $product_image->move($tujuan_upload, $gambar);

            Owner::where('id', $id)->update([
                'image' => $gambar
            ]);
            $feedback[0] = "Update Foto success";
        } catch (ValidationException $e) {
            $feedback = $e->validator->errors()->all();
            $error[0] = 'danger';
        }
        return redirect('/owner')->with(compact(['feedback', 'error']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owner = Owner::where("user_id", Auth::user()->id)->get()->last();
        return view('user.owner-create', compact(['owner']));
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
        $error = [];
        $validate = $request->validate([
            'user_id' => 'required',
            'name' => 'required|string',
            'gender' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'position' => 'required|string',
            'foto' => 'required|image',
        ]);
        // Lakukan tindakan jika validasi berhasil
        $product_image = $request->file('foto');
        $gambar = $product_image->getClientOriginalName();
        $tujuan_upload = './assets/image';
        $product_image->move($tujuan_upload, $gambar);

        Owner::where('user_id', Auth::user()->id)->update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'date_of_birth' => $request->date_of_birth,
            'position' => $request->position,
            'image' => $gambar,
        ]);
        $feedback[0] = "Created data was Success";
        return redirect('/owner')->with(compact(['error', 'feedback']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = Owner::where('id', $id)->get()->last();
        return view('user.owner-update', compact(['owner']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = [];
        $error = [];
        $validate = $request->validate([
            'user_id' => 'required',
            'name' => 'required|string',
            'gender' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'position' => 'required|string',
            'foto' => 'required|image',
        ]);
        // Lakukan tindakan jika validasi berhasil
        $product_image = $request->file('foto');
        $gambar = $product_image->getClientOriginalName();
        $tujuan_upload = './assets/image';
        $product_image->move($tujuan_upload, $gambar);
        // Lakukan tindakan jika validasi berhasil
        Owner::where('id', $id)->update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'date_of_birth' => $request->date_of_birth,
            'position' => $request->position,
            'image' => $gambar,
        ]);
        $feedback[0] = "Updated data was Success";

        return redirect('/profile')->with(compact(['error', 'feedback']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = null;
        try {
            Owner::where("id", $id)->update([
                'gender' => '',
                'address' => '',
                'phone_number' => 0,
                'date_of_birth' => "2023-03-03",
                'position' => '',
                'image' => ''
            ]);
            $feedback[0] = "Deleted data was success";
        } catch (ValidationException $e) {
            // Tangani error validasi di sini
            $feedback = $e->validator->errors()->all();
            // Lakukan tindakan sesuai kebutuhan, misalnya tampilkan pesan error kepada pengguna
        }
        return redirect('/profile')->with('feedback', $feedback);
    }
}
