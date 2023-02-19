<?php

namespace App\Listeners;

use App\Events\VideoViwer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncreateCounter
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VideoViwer $event): void
    {
        $this->updateview($event->video);
    }
    function updateview($video)
   {
    $video ->number_of_visits = $video->number_of_visits + 1;
    $video ->save();
   }
}
