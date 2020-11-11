<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;


class NotifyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email automatically ';

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
     * @return mixed
     */
    public function handle()
    {
        $user=User::select('email')->get();
        $email=User::pulck('email')->toArray();
        $data=['head'=>'programing','body'=>'php'];
        foreach ($email as $email){
            Mail::To($email)->send(new \App\Mail\NotifyEmail($data));

        }
    }
}
