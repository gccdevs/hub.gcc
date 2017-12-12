<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $inviterName;

    public $activateLink;

    public function __construct(User $user)
    {
        $this->user = $user;

        $this->inviterName = User::where('id',$user->invited_by)->first()->name;

        $this->activateLink = env('APP_URL');

    }

    public function build()
    {
        return $this->markdown('emails.users.invite')->subject('Join us | GCC Hub');
    }
}
