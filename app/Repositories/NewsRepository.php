<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Cache\RateLimiting\Limit;

class NewsRepository extends BaseRepository
{
    public function __construct(News $model)
    {
        $this->model = $model;
    }

    /**
     * override get paginate
     *
     * @param int $limit
     * @param array|null $order
     * @return mixed
     */
    public function get_paginate(int $limit, array $order = null): mixed
    {
        return $this->model->query()
            ->where('status', '!=', 'On')
            ->whereNotIn('id', $this->model->latest()->take(5)->pluck('id'))
            ->latest()
            ->paginate($limit);
    }
    public function get_paginate_admin(): mixed
    {
        return $this->model->query()
            ->get()
            ->paginate(6);
            
    }
    public function get_by_slug(string $slug): mixed
    {
        return $this->model->query()
            ->where('slug', $slug)
            ->first();
    }
    /**
     * Get a random collection of news items excluding the one with the given slug.
     *
     * @param string $slug The slug of the news item to exclude.
     * @return mixed
     */
    public function getRandom(string $slug): mixed
    {
        // dd($slug);
        return $this->model->query()
            ->where('slug', '!=', $slug)
            ->inRandomOrder()
            ->limit(10)
            ->get();
    }

    public function getPrimaryNews(): mixed
    {
        return $this->model->query()
            ->where('status', '=', 'On')
            ->first();
    }

    public function getNewNews(): mixed
    {
        return $this->model->query()
            ->where('status', '!=', 'On')
            ->latest()
            ->limit(5)
            ->get();
    }
}
