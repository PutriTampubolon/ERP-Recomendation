<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Erp;
use App\Models\ErpRecomendation;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\FunctionArea;
use App\Models\Fungsionalitas;
use App\Models\Modul;
use App\Models\OtherRequirement;
use App\Models\Owner;
use App\Models\Type;
use App\Models\User;
use App\Models\UserNeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function not_found(){
        return view('not-found');
    }
    public function searchPageUser(Request $request){
        if($request->search == 'home'){
            return redirect('/home');
        }
        else if($request->search == 'profile'){
            return redirect('/profile');
        }
        else if($request->search == 'company'){
            return redirect('/company');
        }
        else if($request->search == 'owner'){
            return redirect('/owner');
        }
        else if($request->search == 'erp'){
            return redirect('/erp_user/1');
        }
        else if($request->search == 'odoo'){
            return redirect('/erp/1');
        }
        else if($request->search == 'dolibarr'){
            return redirect('/erp/2');
        }
        else if($request->search == 'sap'){
            return redirect('/erp/3');
        }
        else if($request->search == 'history'){
            return redirect('/erp_report');
        }
        else if($request->search == 'report'){
            return redirect('/erp_report');
        }
        else if($request->search == 'erp recomendation'){
            return redirect('/erp_recomendation');
        }
        else if($request->search == 'faq'){
            return redirect('/faq');
        }
        else if($request->search == 'feedback'){
            return redirect('/feedback');
        }else{
            return redirect('/not-found');
        }
    }
    public function searchPageAdmin(Request $request){
        if($request->search == 'home'){
            return redirect('/home');
        }
        else if($request->search == 'erp'){
            return redirect('/erp/1');
        }
        else if($request->search == 'modul'){
            return redirect('/modul');
        }
        else if($request->search == 'fungsionalitas'){
            return redirect('/fungsionalitas');
        }
        else if($request->search == 'function area'){
            return redirect('/function_area');
        }
        else if($request->search == 'odoo'){
            return redirect('/erp/1');
        }
        else if($request->search == 'dolibarr'){
            return redirect('/erp/2');
        }
        else if($request->search == 'sap'){
            return redirect('/erp/3');
        }
        else if($request->search == 'user need'){
            return redirect('/user_need');
        }
        else if($request->search == 'type'){
            return redirect('/type');
        }
        else if($request->search == 'other requirement'){
            return redirect('/other_requirement');
        }
        else if($request->search == 'user report'){
            return redirect('/user-report');
        }
        else if($request->search == 'faq admin'){
            return redirect('/faq-admin');
        }else{
            return redirect('/not-found');
        }
    }
    public function register_admin()
    {
        return view('auth.register_admin');
    }

    public function faq_admin(){
        $questions = Faq::all();
        return view('admin.faq', compact(['questions']));
    }

    public function erp_report_admin()
    {

        $erp_recomendation = ErpRecomendation::all();
        $erps = Erp::all();
        // $i = 0;
        $result = [];
        for($i = 0; $i<count($erps); $i++){
            $result[$i] = ErpRecomendation::groupBy('erp_id')
            ->select('erp_id', DB::raw('count(*) as total'))
            ->get();
        }
        $var = $result[0];
        $res = [];

        for($j=0; $j<count($var); $j++){
            $res[$j] = $var[$j]->total;
        }

        return view('admin.erp-report', compact(['result', 'erps', 'res']));
    }

    public function user_report(){
        $users = User::where('role', 'user')->get();
        return view('admin.user-report', compact(['users']));
    }
    public function feedback_user()
    {
        $feedbacks = Feedback::all();
        return view('feedback', compact(['feedbacks']));
    }

    public function faq_user()
    {
        $questions = Faq::all();
        return view('faq', compact(['questions']));
    }

    public function welcome()
    {
        $erps = Erp::take(3)->get();
        return view('welcome', compact(['erps']));
    }

    public function home()
    {
        if (Auth::user()->role == 'admin') {
            $erps = Erp::take(3)->get();
            $erps_result = ErpRecomendation::where('user_id', Auth::user()->id)->take(5)->get();
            $owner = Owner::where('user_id', Auth::user()->id)->get()->last();
            $company = Company::where('user_id', Auth::user()->id)->get()->last();
            $users = User::where('role', 'user')->get();
            $faqs = Faq::all();
            return view('admin.index', compact(['faqs','erps', 'erps_result', 'owner', 'company', 'users']));
        } else if (Auth::user()->role == 'user') {
            $erps = Erp::take(3)->get();
            $erps_result = ErpRecomendation::where('user_id', Auth::user()->id)->take(5)->get();
            $owner = Owner::where('user_id', Auth::user()->id)->get()->last();
            $company = Company::where('user_id', Auth::user()->id)->get()->last();
            return view('user.index', compact(['erps', 'erps_result', 'owner', 'company']));
        }
    }

    public function erp($id)
    {
        $feedback = session('feedback');
        $error = session('error');
        $erp = Erp::where('id', $id)->get()->last();
        if ($erp == null) {
            $erp = null;
        }
        $erps = Erp::all();
        return view('admin.erp', compact(['erp', 'erps', 'feedback', 'error']));
    }

    public function erp_create()
    {
        return view('admin.erp-create');
    }

    public function modul()
    {
        $moduls = Modul::all();
        $erp = Erp::all();
        // dd($moduls);
        return view('admin.modul', compact(['moduls', 'erp']));
    }

    public function fungsionalitas()
    {
        $moduls = Modul::all();
        $erp = Erp::all();
        $fungsionalitas = Fungsionalitas::all();
        // dd($moduls);
        return view('admin.fungsionalitas', compact(['moduls', 'erp', 'fungsionalitas']));
    }

    public function function_area()
    {
        $moduls = Modul::all();
        $erp = Erp::all();
        $fungsionalitas = Fungsionalitas::all();
        $function_area = FunctionArea::all();
        // dd($moduls);
        return view('admin.function-area', compact(['moduls', 'erp', 'fungsionalitas', 'function_area']));
    }

    public function user_need()
    {
        $moduls = Modul::all();
        $erp = Erp::all();
        $user_needs = UserNeed::all();
        // dd($moduls);
        return view('admin.user-need', compact(['erp', 'user_needs']));
    }

    public function type()
    {
        $type = Type::all();
        $erp = Erp::all();
        $user_needs = UserNeed::all();
        // dd($moduls);
        return view('admin.type', compact(['erp', 'user_needs', 'type']));
    }

    public function other_requirement()
    {
        $type = Type::all();
        $erp = Erp::all();
        $other_requirement = OtherRequirement::all();
        // dd($moduls);
        return view('admin.other-requirement', compact(['erp', 'other_requirement', 'type']));
    }


    // user owner

    public function profile()
    {
        $feedback = session('feedback');
        $error = session('error');
        $owner = Owner::where("user_id", Auth::user()->id)->get()->last();
        $company = Company::where("user_id", Auth::user()->id)->get()->last();
        return view('user.profile', compact(['feedback', 'company', 'owner', 'error']));
    }
    public function erp_user($id)
    {
        $feedback = session('feedback');
        $error = session('error');
        $erp = Erp::where('id', $id)->get()->last();
        if ($erp == null) {
            $erp = null;
        }
        $erps = Erp::all();
        return view('user.erp', compact(['erp', 'erps', 'feedback', 'error']));
    }

    public function erp_recomendation()
    {
        $moduls = Modul::all();
        $fungsionalitas = Fungsionalitas::all();
        $function_area = FunctionArea::all();
        $user_needs = UserNeed::all();
        $types = Type::all();
        $other_requirements = OtherRequirement::all();
        return view('user.erp-recomendation', compact(['moduls', 'fungsionalitas', 'function_area', 'user_needs', 'types', 'other_requirements']));
    }

    public function erp_report()
    {
        $erp_result = ErpRecomendation::where('user_id', Auth::user()->id)->get();
        return view('user.erp-report', compact(['erp_result']));
    }
    public function dashboard()
    {
        return view('user.index');
    }
}
