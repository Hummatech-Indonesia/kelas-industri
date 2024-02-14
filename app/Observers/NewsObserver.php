<?php

namespace App\Observers;

use App\Models\News;
use Faker\Provider\Uuid;
use Illuminate\Support\Str;

class NewsObserver
{
    /**
     * Handle the Attendance "created" event.
     *
     * @param  \App\Models\News  $News
     * @return void
     */
    public function creating(News $news)
    {
        $news->id = Uuid::uuid();
    }

    /**
     * Handle the Attendance "updated" event.
     *
     * @param  \App\Models\News  $News
     * @return void
     */
    public function updating(News $news)
    {
        if ($news->isDirty('title')) {
            $newSlug = Str::slug($news->title);

            $count = News::where('slug', $newSlug)
                ->where('id', '!=', $news->id)
                ->count();
                
            if ($count > 0) {
                $newSlug .= '-' . ($count + 1);
            }

            $news->slug = $newSlug;
        }
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param  \App\Models\News  $News
     * @return void
     */
    public function deleted(News $news)
    {
        //
    }

    /**
     * Handle the News "restored" event.
     *
     * @param  News  $News
     * @return void
     */
    public function restored(News $news)
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param  \App\Models\News  $News
     * @return void
     */
    public function forceDeleted(News $Journlas)
    {
        //
    }
}
