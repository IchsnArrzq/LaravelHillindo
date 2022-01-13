<?php

namespace App\Http\Controllers;

use App\Models\Prefix;
use App\Models\Quotation;
use Exception;
use Illuminate\Http\Request;

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
    public function index()
    {
        return view('home');
    }
    public function getPrefix()
    {
        try {
            $prefix = Prefix::find();
            $resource = Quotation::get();
            $wallet = [];
            foreach ($resource as $data) {
                array_push($wallet, str_replace('-JAK', '', $data->file_no));
            }
            array_multisort($wallet);
            $response = end($wallet);
            $response += 1;
            $response = str_pad($response, 6, '0', STR_PAD_LEFT);
            return response()->json($response);
        } catch (Exception $err) {
            return response()->json($err->getMessage());
        }
    }
}
