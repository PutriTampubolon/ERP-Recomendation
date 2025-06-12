<?php

namespace App\Http\Controllers;

use App\Models\Erp;
use App\Models\ErpRecomendation;
use App\Models\FunctionArea;
use App\Models\Fungsionalitas;
use App\Models\Modul;
use App\Models\OtherRequirement;
use App\Models\Type;
use App\Models\UserNeed;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ErpRecomendationController extends Controller
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
        // dd($request);
        $moduls = Modul::all();
        $fungsionalitas = Fungsionalitas::all();
        $function_area = FunctionArea::all();
        $user_needs = UserNeed::all();
        $types = Type::all();
        $other_requirements = OtherRequirement::all();
        $erps = Erp::all();
        $i = 0;
        $j = 0;
        $a = 0;
        $b = 0;

        foreach ($erps as $erp) {
            $result[$i] = 0;
            $i++;
        }

        function nilaiTerdekat($array, $nilai)
        {
            $terdekat = null;
            $jarakTerdekat = null;

            foreach ($array as $angka) {
                $jarak = abs($angka - $nilai);
                if ($jarakTerdekat === null || $jarak < $jarakTerdekat) {
                    $jarakTerdekat = $jarak;
                    $terdekat = $angka;
                } elseif ($jarak === $jarakTerdekat && $angka > $terdekat) {
                    $terdekat = $angka;
                }
            }

            return $terdekat;
        }

        // modul
        foreach ($request->keys() as $item) {
            $temp = 0;
            $nilai = [];
            foreach ($moduls as $modul) {
                if ("modul" . $modul->name == str_replace("_", " ", $item)) {
                    $modul_arr = explode("modul", $item);
                    foreach ($request->keys() as $item2) {
                        if ("bobot" . $modul_arr[1] == $item2) {
                            $sementara = 0;
                            foreach ($modul->erp as $bobot) {
                                $selisih = $bobot->pivot->bobot;
                                $nilai[$sementara] = $selisih;
                                $sementara++;
                            }
                            $nilai_max = nilaiTerdekat($nilai, $request->$item2);
                            $index_dekat = array_search($nilai_max, $nilai);
                            $result[$index_dekat] += 1;
                        }
                    }
                }
                $temp++;
            }
        }
        // dd($request->keys());
        // fungsionalitas
        foreach ($request->keys() as $item) {
            // foreach ($fungsionalitas as $fungsionalita) {
            //     if ("fungsionalitas" . $fungsionalita->name == str_replace("_", " ", $item)) {
            //         for ($i = 0; $i < count($erps); $i++) {
            //             $result[$i] += $fungsionalita->erp[$i]->pivot->bobot;
            //         }
            //     }
            // }
            $temp = 0;
            $nilai = [];
            foreach ($fungsionalitas as $modul) {
                if ("fungsionalitas" . $modul->name == str_replace("_", " ", $item)) {
                    $modul_arr = explode("fungsionalitas", $item);
                    foreach ($request->keys() as $item2) {
                        if ("bobot" . $modul_arr[1] == $item2) {
                            $sementara = 0;
                            foreach ($modul->erp as $bobot) {
                                $selisih = $bobot->pivot->bobot;
                                $nilai[$sementara] = $selisih;
                                $sementara++;
                            }
                            $nilai_max = nilaiTerdekat($nilai, $request->$item2);
                            $index_dekat = array_search($nilai_max, $nilai);
                            $result[$index_dekat] += 1;
                        }
                    }
                }
                $temp++;
            }
        }

        // Function Area
        foreach ($request->keys() as $item) {
            // foreach ($function_area as $function_are) {
            //     if ("function area" . $function_are->name == str_replace("_", " ", $item)) {
            //         for ($i = 0; $i < count($erps); $i++) {
            //             $result[$i] += $function_are->erp[$i]->pivot->bobot;
            //         }
            //     }
            // }
            $temp = 0;
            $nilai = [];
            foreach ($function_area as $modul) {
                if ("functionarea" . $modul->name == str_replace("_", " ", $item)) {
                    $modul_arr = explode("functionarea", $item);

                    foreach ($request->keys() as $item2) {
                        if ("bobot" . $modul_arr[1] == $item2) {
                            $sementara = 0;
                            foreach ($modul->erp as $bobot) {
                                $selisih = $bobot->pivot->bobot;
                                $nilai[$sementara] = $selisih;
                                $sementara++;
                            }
                            $nilai_max = nilaiTerdekat($nilai, $request->$item2);
                            $index_dekat = array_search($nilai_max, $nilai);
                            $result[$index_dekat] += 1;
                        }
                    }
                }
                $temp++;
            }
        }


        // user need
        foreach ($user_needs as $user_need) {
            if ($request->user_need == $user_need->id) {
                $x = 0;
                foreach ($erps as $item) {
                    if ($user_need->erp_id == $item->id) {
                        $j = $x;
                    }
                    $x++;
                }
                $result[$j] += $user_need->bobot;
            }
        }

        // type
        foreach ($types as $type) {
            if ($request->type == $type->id) {
                $x = 0;
                foreach ($erps as $item) {
                    if ($type->erp_id == $item->id) {
                        $a = $x;
                    }
                    $x++;
                }
                $result[$a] += $type->bobot;
            }
        }

        // other_requirement
        foreach ($other_requirements as $other_requirement) {
            if ($request->other_requirement == $other_requirement->id) {
                $x = 0;
                foreach ($erps as $item) {
                    if ($other_requirement->erp_id == $item->id) {
                        $b = $x;
                    }
                    $x++;
                }
                $result[$b] += $other_requirement->bobot;
            }
        }
        $max = max($result);
        $index = array_search($max, $result);
        $erp = $erps[$index];
        ErpRecomendation::create([
            'user_id' => Auth::user()->id,
            'erp_id' => $erp->id
        ]);

        return view('user.erp-result', compact(['result', 'erp', 'erps']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ErpRecomendation  $erpRecomendation
     * @return \Illuminate\Http\Response
     */
    public function show(ErpRecomendation $erpRecomendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ErpRecomendation  $erpRecomendation
     * @return \Illuminate\Http\Response
     */
    public function edit(ErpRecomendation $erpRecomendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ErpRecomendation  $erpRecomendation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ErpRecomendation $erpRecomendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ErpRecomendation  $erpRecomendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ErpRecomendation $erpRecomendation)
    {
        //
    }
}
