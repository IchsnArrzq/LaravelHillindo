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
                        <a class='btn btn-sm btn-outline-warning' href=" . route('admin.profesi.edit', $qr->id) . ">edit</a>
                        <form action=" . route('admin.profesi.destroy', $qr->id) . " method='post'>
                            " . method_field('delete') . "
                            " . csrf_field() . "
                            <button type='submit' class='btn btn-sm btn-outline-danger'>delete</button>
                        </form>
                    </div>
                    "
                    );
                })->make(true);
        }
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
        try {
            Profesi::create($attr);

            DB::commit();
            toast('success', 'success');
            return back();
        } catch (Exception $err) {
            DB::rollBack();
            toast($err->getMessage(), 'error');
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

        $profesi = Profesi::findOrFail($id);
        $clients = User::whereHas('roles', function ($query) {
            return $query->where('name', 'client');
        })->get();
        return view('admin.profesi.edit', compact('profesi', 'clients'));
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
        $attr = $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'price_low' => 'required|integer',
            'price_medium' => 'required|integer',
            'price_high' => 'required|integer',
            'margin' => 'required|integer',
        ]);
        DB::beginTransaction();
        try {
            Profesi::findOrFail($id)->update($attr);

            DB::commit();
            toast('success', 'success');
            return back();
        } catch (Exception $err) {
            DB::rollBack();
            toast($err->getMessage(), 'error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Profesi::findOrFail($id)->delete();
            toast('success', 'success');
            return back();
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'error');
            return back();
        }
    }
}
