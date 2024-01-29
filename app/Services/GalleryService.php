<?php

namespace App\Services;

use App\Models\Gallery;
use App\Services\GalleryService;
use App\Http\Requests\GalleryRequest;
use App\Repositories\GalleryRepository;
use Illuminate\Support\Facades\Storage;

class GalleryService
{
    private GalleryRepository $repository;

    public function __construct(GalleryRepository $repository)
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
        return $this->repository->get_paginate(3);
    }

    /**
     * handle search
     *
     * @param string|null $search
     * @return mixed
     */
    public function handleSearch(string|null $search): mixed
    {
        return $this->repository->search_paginate($search, 6);
    }

    /**
     * store school year
     *
     * @param GalleryRequest $request
     * @return void
     */
    public function handleCreate(GalleryRequest $request): void
    {
        $data = $request->validated();
        $data['photo'] = $request->file('photo')->store('gallery_file', 'public');
        $gallery = $this->repository->store($data);
    }

    /**
     * update school year
     *
     * @param GalleryRequest $request
     * @param User $school
     * @return void
     */
    public function handleUpdate(GalleryRequest $request, Gallery $gallery): void
    {
        $data = $request->validated();
        if($request->hasFile('photo')){
            Storage::delete('public/' . $gallery->photo);
            $data['photo'] = $request->file('photo')->store('gallery_file', 'public');
        }
        $this->repository->update($gallery->id, $data);
    }

    /**
     * handle delete school year
     *
     * @param Gallery $school
     * @return bool
     */
    public function handleDelete(Gallery $gallery): bool
    {
        if($gallery->photo){
            $delete = Storage::delete('public/' . $gallery->photo);
        }
        return $this->repository->destroy($gallery->id);
    }
}
