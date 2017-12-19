<?php

namespace App\Listeners;

use App\Events\ImageDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class ImageDeleteFile
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
     * @param  ImageDeleted $event
     * @return void
     */
    public function handle(ImageDeleted $event)
    {
        Storage::delete([$event->media->file,
                         $event->media->medium,
                         $event->media->small]);
    }
}
