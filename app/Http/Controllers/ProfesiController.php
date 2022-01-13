<?php

namespace App\Http\Controllers;

use App\Models\Profesi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesis = Profesi::get();
        return view('admin.profesi.index', compact('profesis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesi = new Profesi();
        $clients = User::whereHas('roles', function ($query) {
            return $query->where('name', 'client');
        })->get();
        return view('admin.profesi.create', compact('profesi', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'price_low' => 'required|integer',
            'price_medium' => 'required|integer',
            'price_high' => 'required|integer',
            'margin' => 'required|integer',
        ]);
        DB::beginTransaction();
        try{
            Profesi::create($attr);
            
            DB::commit();
            toast('success','success');
            return back();
        }catch(Exception $err){
            DB::rollBack();
            toast($err->getMessage(),'error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
