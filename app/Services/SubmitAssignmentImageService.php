<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\SubmitAssignmentImageRepository;

class SubmitAssignmentImageService
{
    private SubmitAssignmentImageRepository $repository;
    public function __construct(SubmitAssignmentImageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handleCreate($request, $submitAssignment): void
    {
        $data['submit_assignment_id'] = $submitAssignment->id;
        $data['image'] = $request->file('file')->store('assignment_file', 'public');
        $this->repository->store($data);
    }

    public function handleDelete($submitAssignment): void
    {
        foreach ($submitAssignment->images as $submitImage) {
            if (file_exists(public_path('storage/' . $submitImage->image))) {
                Storage::delete('public/' . $submitImage->image);
            }
            $this->repository->destroy($submitImage->id);
        }
    }
}
