<?php

namespace App\Services;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use App\Services\NewsService;
use Illuminate\Support\Facades\Storage;

class NewsService
{
    private NewsRepository $repository;

    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * handle get all
     *
     * @param array|null $order
     * @return mixed
     */
    public function handleGetAll(array $order = null): mixed
    {
        return $this->repository->getAll($order);
    }

    /**
     * handle get paginated
     *
     * @return mixed
     */
    public function handleGetPaginate(): mixed
    {
        return $this->repository->get_paginate(6);
    }

    /**
     * Handle fetching a random news item
     *
     * @return News|null
     */
    public function handleGetRandom(): mixed
    {
        return $this->repository->getRandom(10);
    }

    public function handleGetNewNews(): mixed{
        return $this->repository->getNewNews(5);
    }

    public function handleGetBySlug(string $slug): mixed
    {
        return $this->repository->get_by_slug($slug);
    }

    public function handleGetPrimaryNews(): mixed
    {
        return $this->repository->getPrimaryNews();
    }

    /**
     * handle search
     *
     * @param string|null $search
     * @return mixed
     */
    public function handleSearch(string | null $search): mixed
    {
        return $this->repository->search_paginate($search, 6);
    }

    /**
     * store school year
     *
     * @param NewsRequest $request
     * @return void
     */
    public function handleCreate(NewsRequest $request): void
    {
        $data = $request->validated();
        $data['photo'] = $request->file('photo')->store('news_file', 'public');
        $this->repository->store($data);
    }

    /**
     * update school year
     *
     * @param NewsRequest $request
     * @param User $school
     * @return void
     */
    public function handleUpdate(NewsRequest $request, News $news): void
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            Storage::delete('public/' . $news->photo);
            $data['photo'] = $request->file('photo')->store('news_file', 'public');
        }
        $this->repository->update($news->id, $data);
    }

    /**
     * handle delete school year
     *
     * @param News $school
     * @return bool
     */
    public function handleDelete(News $news): bool
    {
        if ($news->photo) {
            $delete = Storage::delete('public/' . $news->photo);
        }
        return $this->repository->destroy($news->id);
    }
}
