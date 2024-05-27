<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowongan = Lowongan::with('jabatan')->orderBy('end_date', 'desc')->paginate(5);
        return view('pelamar.lowongan', compact('lowongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lowongan = Jabatan::all();
        return view('pelamar.buatlowongan', compact('lowongan'));
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
            'jabatan' => 'required',
            'judul' => 'required|max:255',
            'slug' => 'required|unique:lowongan|max:255',
            'deskripsi' => 'max:500',
            'end_date' => 'required',
        ]);
        // $str_json = json_encode($request->jabatan);
        // $jabatan = explode(",", $request->id_posisi);
        // $input['id_posisi'] = implode(",",$request->jabatan);
        $lowongan = new Lowongan();
        $lowongan->judul = $request->judul;
        $lowongan->slug = $request->slug;
        $lowongan->deskripsi = $request->deskripsi;
        $lowongan->end_date = $request->end_date;
        $lowongan->jabatan_id = $request->jabatan;
        $lowongan->created_by = $user_id;
        $lowongan->save();

        // dd($lowongan);
        return redirect('/lowongan')->with('success', 'Lowongan berhasil ditambahkan!');
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
        $lowongan = Lowongan::findOrFail($id);
        $jabatan = Jabatan::all();
        return view('pelamar.editlowongan', compact('lowongan', 'jabatan'));
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
            'jabatan' => 'required',
            'judul' => 'required|max:50',
            'slug' => 'required|max:50',
            'deskripsi' => 'max:500',
            'end_date' => 'required',
        ]);
        $user_id = Auth::id();
        $lowongan = Lowongan::findOrFail($id);

        $lowongan->update([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'deskripsi' => $request->deskripsi,
            'end_date' => $request->end_date,
            'jabatan' => $request->jabatan,
            'updated_by' => $user_id,
        ]);
        return redirect('/lowongan')->with('success', ' Lowongan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();
        return redirect()->back()->with('success', 'Lowongan berhasil Dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Lowongan::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
