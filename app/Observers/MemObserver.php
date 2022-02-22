<?php

namespace App\Observers;

use App\Models\Mem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MemObserver
{
    /**
     * Handle the Mem "creating" event.
     *
     * @param  \App\Models\Mem  $mem
     * @return void
     */
    public function creating(Mem $mem)
    {
        $mem->slug = Str::slug($mem->title);
        $mem->user_id = \auth()->id();
        $mem->is_published = 0;
    }

    /**
     * Handle the Mem "created" event.
     *
     * @param  \App\Models\Mem  $mem
     * @return void
     */
    public function created(Mem $mem)
    {
        //
    }

    /**
     * Handle the Mem "updated" event.
     *
     * @param  \App\Models\Mem  $mem
     * @return void
     */
    public function updated(Mem $mem)
    {
        //
    }

    /**
     * Handle the Mem "deleted" event.
     *
     * @param  \App\Models\Mem  $mem
     * @return void
     */
    public function deleted(Mem $mem)
    {
        //
    }

    /**
     * Handle the Mem "restored" event.
     *
     * @param  \App\Models\Mem  $mem
     * @return void
     */
    public function restored(Mem $mem)
    {
        //
    }

    /**
     * Handle the Mem "force deleted" event.
     *
     * @param  \App\Models\Mem  $mem
     * @return void
     */
    public function forceDeleted(Mem $mem)
    {
        //
    }
}
