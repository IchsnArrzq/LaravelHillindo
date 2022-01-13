<?php

namespace App\Console\Commands;

use App\Mail\MailNotification;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailSendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for sending mail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::find(1);
        Mail::to($user->email)->send(new MailNotification($user));
    }
}
