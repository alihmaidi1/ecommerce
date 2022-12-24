<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class news_letter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $id;
    public function __construct($id)
    {
    
        $this->id=$id;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        

        $emails=\App\Models\newsletter::get();
        foreach($emails as $email){
            
            Mail::to($email->email)->send(new \App\Mail\news_letter($this->id));


        }



    }
}
