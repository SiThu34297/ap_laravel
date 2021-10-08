<?php

namespace App\Listeners;

use App\Events\PostCreatedEvent;
use App\Mail\PostStored;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PostCreatedEventListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(PostCreatedEvent $event)
    {
        Mail::to('alice@gmail.com')->send(new PostStored($event->post));
    }
}