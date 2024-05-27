<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AcceptEmail;
use Illuminate\Support\Facades\Artisan;
use Brotzka\DotenvEditor\DotenvEditor;

class EmailController extends Controller
{
    public function sendemail($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        try {
            $pelamar = Mail::to($pelamar->email)->send(new AcceptEmail($pelamar));
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Something went wrong!')
                ->withError($e->getMessage());
        }
        return redirect('/dashboard')->with('success', 'Email Terkirim!');
    }
    //
    public function edit()
    {
        $email = env('MAIL_USERNAME');
        $pass = env('MAIL_PASSWORD');
        return view('pelamar.editemail', compact('email', 'pass'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:30',
            'password' => 'required|max:30',
        ]);

        $env = new DotenvEditor();
        $env->changeEnv([
            'MAIL_USERNAME'   => $request->email,
            'MAIL_PASSWORD'   => $request->password,
        ]);
        $cache = Artisan::call("config:clear");
        return back($cache)->with('success', 'Email Berhasil diPerbarui!');;
    }
}