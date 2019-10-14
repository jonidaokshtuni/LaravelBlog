<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\User;

class SendPostEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $emails = User::all()->pluck('email');
        Mail::send('emails.postmail', [], function($message) use ($emails) {
            $message->to($emails->toArray())
                    ->subject('Welcome to Blog Website');
            $message->from('noreply@test.it');
        });

        
    }
}
