<?php

namespace App\Http\Controllers;

use App\Models\Werkorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\RedirectResponse;

class WerkordersController extends Controller
{

    protected string $table = "werkorders";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('modules.werkorders.index');
    }

    public function nieuw()
    {
        return view('modules.werkorders.nieuw');
    }

    public static function GetAlleWerkorders()
    {
        return DB::table("werkorders")->get()->sortByDesc("created_at")->all();
    }

    public function CreateWerkorder(Request $request): RedirectResponse
    {
        $omschrijving = $request->input('inputOmschrijving');
        $klant = $request->input('inputKlant');
        $plandatum = $request->input('inputPlanDatum');
        $plantijd = $request->input('inputPlanTijd');
        $opleverdatum = $request->input('inputOpleverDatum');
        $oplevertijd = $request->input('inputOpleverTijd');

        $werkorder = new Werkorder();

        $werkorder->omschrijving = $omschrijving;
        $werkorder->klant = $klant;
        $werkorder->plandatum = $plandatum;
        $werkorder->plantijd = $plantijd;
        $werkorder->opleverdatum = $opleverdatum;
        $werkorder->oplevertijd = $oplevertijd;

        $werkorder->save();
        return redirect('/werkorders');
    }
}
