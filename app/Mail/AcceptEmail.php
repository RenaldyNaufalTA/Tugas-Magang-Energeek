<?php

namespace App\Mail;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pelamar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AcceptEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $pelamar;
    public $sender;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pelamar $pelamar)
    {
        $this->pelamar = $pelamar;
        $this->sender = Auth::user()->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@gmail.com')
                    ->view('mail.email')
                    ->subject('Announcement')
                    ->with(
                        [
                            'nama' => $this->pelamar->nama,
                            'pengirim' => $this->sender,
                        ]);
    }
}
