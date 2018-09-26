<?php

namespace Siac\Http\Controllers;

use Illuminate\Http\Request;

use Siac\Edifice;
use Siac\Visitor;

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

        $countEdifice= Edifice::all()->count();
        $countVisitor = Visitor::all()->count();

        //$lastUser = BusinessUser::orderby('created_at','DESC')->take(3)->get();

       /* $lastActivity = RegisterActivity::OrderBy('created_at','desc')
                                        ->with([
                                                'companies' => function($query) {
                                                    $query->select('id','nameCompany');
                                                },
                                                'consultants' => function($query) {
                                                    $query->select('id','nameConsultant');
                                                }
                                        ])->groupBy('codActivity')->take(3)->get();*/

        return view('index', compact('countEdifice', 'countVisitor'));
    }
}
