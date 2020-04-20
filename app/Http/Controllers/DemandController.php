<?php

namespace App\Http\Controllers;

use App\Demand;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DemandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demands = Demand::all();
        return view('demands.index',['demands'=>$demands]);
    }

    public function indexPetitioner()
    {
        $demands = Demand::where('petitioner_id', Auth::user()->id)->get();
        return view('demands.index',['demands'=>$demands]);
    }

    public function indexVolunteer()
    {
        $demands = DB::table('demands')
            ->join('users', 'users.id', '=', 'demands.petitioner_id')
            ->select('users.cp', 'demands.*')
            ->where('users.cp','=',Auth::user()->cp)
            ->get();


        return view('demands.indexVolunteer',['demands'=>$demands]);
    }

    public function aceptar($id){

        // Editar la demanda para incluir la fecha de aceptación y el voluntario que la ha aceptado.

        $demanda = Demand::find($id);
        $demanda->volunteer_id = Auth::user()->id;
        $demanda->accepted = Carbon::now();
        $demanda->save();

        flash('Demanda aceptada correctamente');
        return redirect()->route('myCPDemands');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => ['required', 'string', 'max:255'],
            'demandType' => ['required', 'string', 'in:pasearMascota,trasladoMedico,compraSupermercado,sacarBasura,compraFarmacia,otros']
        ]);
        $petitioner_id = Auth::user()->id;

        $demand = new Demand($request->all());
        $demand->petitioner_id = $petitioner_id;
        $demand->save();


        flash('Demanda creada correctamente');

        return redirect()->route('myDemands');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demanda = Demand::find($id);

        return view('demands/show',['demanda'=>$demanda]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $demanda = Demand::find($id);

        return view('demands/edit',['demanda'=>$demanda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => ['required', 'string', 'max:255'],
            'demandType' => ['required', 'string', 'in:pasearMascota,trasladoMedico,compraSupermercado,sacarBasura,compraFarmacia,otros']
        ]);

        $demanda = Demand::find($id);
        $demanda->fill($request->all());

        $demanda->save();

        flash('Demanda modificada correctamente');

        return redirect()->route('myDemands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demanda = Demand::find($id);
        $demanda->delete();
        flash('Demanda borrada correctamente');

        return redirect()->route('myDemands');
    }
}
