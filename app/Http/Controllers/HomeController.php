<?php

namespace Siac\Http\Controllers;

use Illuminate\Http\Request;

use Siac\Edifice;
use Siac\Visitor;
use Siac\Place;

class HomeController extends Controller
{
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user','admin']);

        $tipo = $request->user()->typeRole();

        $countEdifice= Edifice::all()->count();
        $countVisitor = Visitor::all()->count();
        $countVisitants = \DB::table('places')->join('place_visitors', 'places.id', '=', 'place_visitors.place_id' )
                                           ->join('visitors', 'place_visitors.visitor_id', '=', 'visitors.id')->count();


        if($tipo == "admin")
        {
            return view('index', compact('countEdifice', 'countVisitor', 'countVisitants'));
        }
        if($tipo == "user")
        {
            $edifice_id = $request->user()->hasEdifice();
            $places = Place::where('edifice_id','=',$edifice_id)->get();
            
            return view('condominium.index', compact('places'));
        }

        
    }
}
