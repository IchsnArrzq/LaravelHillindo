<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Profesi;
use App\Models\Quotation;
use Illuminate\Http\Request;

class ProfesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesis = Profesi::where('user_id', auth()->user()->id)->get();
        if (request()->ajax()) {
            return datatables()->of($profesis)
                ->addIndexColumn()
                ->editColumn('user_id', function ($qr) {
                    return $qr->user->name . ' | ' . $qr->user->email;
                })
                ->editColumn('price_low', function ($qr) {
                    return number_format($qr->price_low);
                })
                ->editColumn('price_medium', function ($qr) {
                    return number_format($qr->price_medium);
                })
                ->editColumn('price_high', function ($qr) {
                    return number_format($qr->price_high);
                })
                ->editColumn('margin', function ($qr) {
                    return number_format($qr->margin);
                })
                ->editColumn('action', function ($qr) {
                    return ("
                    <div class='d-flex'>
                        <a class='btn btn-sm btn-outline-info' href=" . route('client.profesi.show', $qr->id) . ">show</a>
                    </div>
                    "
                    );
                })->make(true);
        }
        return view('client.profesi.index', compact('profesis'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesi = Profesi::findOrFail($id);
        if (request()->ajax()) {
            $quotations = Quotation::where('profesi_id', $id)->get();
            return datatables()->of($quotations)
                ->addIndexColumn()
                ->editColumn('total_price',function($qr){
                    return number_format($qr->total_price);
                })->editColumn('action', function ($qr) {
                    return ("
                    <div class='d-flex'>
                        <a class='btn btn-sm btn-outline-info' href=" . route('client.quotation.show', $qr->id) . ">show</a>
                    </div>
                    "
                    );
                })->make(true);
        }
        return view('client.profesi.show', compact('profesi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
