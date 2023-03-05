<?php

namespace App\Jobs;

use App\Mail\SendAccount as MailSendAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAccount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $email;
    public $username;
    public $password;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $username, $password)
    {
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->queue = 'new_acount';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new MailSendAccount($this->username, $this->password));
    }
}
