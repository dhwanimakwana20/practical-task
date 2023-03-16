<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Yajra\DataTables\Facades\DataTables;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (auth()->user()->id == 1 && $request->ajax()) {
            $data = User::where('id', '!=', 1)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    if($data->action_performed == 0){
                        $btn = '<a href="javascript:void(0)" data-id="'.$data->id.'" data-response="approved" class="btn btn-success btn-sm approve-btn">Approve</a><a href="javascript:void(0)" data-id="'.$data->id.'" data-response="unapproved" class="btn btn-danger unapprove-btn btn-sm ml-10">Unapprove</a>';
                        return $btn;
                    }else{
                       return 'No Action required';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('home');
    }

    public function approveUser(Request $request){
        $user = User::where('id',$request->userID)->first();
        $user->status = $request->response;
        $user->action_performed = 1;
        $user->save();

        return response()->json(['status' => 'Updates are saved!!']);
    }


    public function approve(Request $request){
        return view('approvedUser');
    }

    public function unapprove(Request $request){
        return view('unapprovedUser');
    }
    public function pending(Request $request){
        return view('pendingUser');
    }
}
