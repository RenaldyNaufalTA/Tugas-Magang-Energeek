<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\Lowongan;
use App\Models\Pelamarfile;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelamarkerja = Pelamar::latest()->filter(request('search'))->paginate(5)->withQueryString();
        $lowongan = Lowongan::all();
        // if (request('lowongan')) {
        //     $pelamarkerja->whereIn('pelamar.lowongan.slug', request('lowongan'));
        // }
        // dd($lowongan);
        return view('dashboard', compact('pelamarkerja', 'lowongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Lowongan $lowongan)
    {
        // $lowongan = Lowongan::find($judul);
        return view('recruitment', [
            'lowongan' => $lowongan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required|max:100',
            'telpon' => 'required|string|min:18|max:23|',
            'alamat' => 'required|max:100',
            'email' => 'required|unique:pelamar|email:rfc,dns|max:100',
            'lowongan' => 'required',
            // 'g-recaptcha-response' => 'required',
        ]);
        $path = storage_path('app/public/pelamar');
        $file = $request->file('input-id');
        $replace_file = time() . '_' . str_replace(['+', ' ', ',', '*'], ['_', '_',], $file->getClientOriginalName());
        $replace = str_replace(['_'], [''], $request->telpon);


        $pelamar = new Pelamar();
        $pelamar->nama = $request->nama;
        $pelamar->telpon = $replace;
        $pelamar->alamat = $request->alamat;
        $pelamar->email = $request->email;
        $pelamar->lowongan_id = $request->lowongan_id;
        $pelamar->jabatan_id = $request->jabatan_id;
        $pelamar->save();

        $file->move($path, $replace_file);

        $pelamarFile = new Pelamarfile();
        $pelamarFile->filename = $replace_file;
        $pelamarFile->pelamar_id = $pelamar->id;
        $pelamarFile->save();

        return redirect()->back()
            ->with('success', 'Lamaran berhasil dikirim.');
    }

    public function storeMedia(Request $request)
    {
        $path = storage_path('app/public/pelamar');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('file');

        $pelamar = Pelamar::max('id');
        $pelamar_id = Pelamarfile::max('pelamar_id');
        $replace = str_replace(['+', ' ', ',', '*'], ['_', '_',], $file->getClientOriginalName());
        $name = $pelamar . '_' . $replace;
        if ($pelamar !== $pelamar_id) {

            $file->move($path, $name);

            $pelamarFile = new Pelamarfile();
            $pelamarFile->filename = $name;
            $pelamarFile->pelamar_id = $pelamar;
            $pelamarFile->save();
            return response()->json(['success' => $name]);
        } else {
            return abort(401);
        }
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        Pelamarfile::where('filename', $filename)->delete();
        $path = public_path() . 'pelamar' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plmr = Pelamar::findorFail($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $pelamarkerja = Pelamar::onlyTrashed()->orderBy("id", "desc")
            ->Paginate(10);
        // dd($pelamarkerja);
        return view('pelamar.trash', compact('pelamarkerja'));
    }

    public function restore($id)
    {
        // memulihkan data
        $pelamar = Pelamar::onlyTrashed()->where('id', $id);
        $pelamar->restore();
        return redirect()->back()->with('success', 'Data Berhasil dipulihkan!');
    }

    public function delete($id)
    {
        $pelamar = Pelamar::onlyTrashed()->where('id', $id);
        $file = Pelamarfile::where('pelamar_id', $id)->first();
        $path = storage_path('app/public/pelamar/' . $file->filename);
        if (file_exists($path)) {
            unlink($path);
        }
        $pelamar->forceDelete();
        return redirect()->back()->with('success', 'Data dihapus Permanen!');
    }
}
