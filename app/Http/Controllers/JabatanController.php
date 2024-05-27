<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lowongan $lowongan)
    {
        $lowongan = Lowongan::where('end_date', '>', Carbon::now())->get();
        return view('index', compact('lowongan'));
    }

    //Halaman Master Jabatan
    public function view()
    {
        $jabatan = Jabatan::orderBy("id", 'desc')->paginate(5);
        return view('pelamar.jabatan', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelamar.buatjabatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        $this->validate($request, [
            'jabatan' => 'required|max:255',
        ]);

        $jabatan = new Jabatan();
        $jabatan->nama = request()->get('jabatan');
        $jabatan->created_by = $user_id;
        $jabatan->save();
        return redirect('/jabatan')->with('success', 'Jabatan berhasil ditambahkan!');
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
        $jabatan = Jabatan::find($id);
        $jabatan->delete();
        return redirect()->back()->with('success', 'Jabatan berhasil dihapus!');
    }
}