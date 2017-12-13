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

    public $tempPassword;

    public function __construct(User $user, $tempPassword)
    {
        $this->user = $user;

        $this->inviterName = User::where('id',$user->invited_by)->first()->name;

        $this->tempPassword = $tempPassword;

        $this->activateLink = env('APP_URL') . '/user-confirmation/' . $user->confirm_token;

    }

    public function build()
    {
        return $this->markdown('emails.users.invite')->subject('Join us | GCC Hub');
    }
}
