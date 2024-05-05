<?php

namespace App\Repositories;

use App\Models\Presentation;
use App\Models\PresentationFinish;

class PresentationFinishRepository extends BaseRepository {

    public function __construct(PresentationFinish $presentationFinish, Presentation $presentation)
    {
        $this->model = $presentationFinish;
        $this->presentation = $presentation;
    }

    /**
     * handleFinishPresentation
     *
     * @param  mixed $preseectationId
     * @return mixed
     */
    public function handleFinishPresentation(string $projectId, string $status) : mixed {
        $presentation = $this->presentation->query()->where('status', 'approved')->where('presentation_status', $status)->whereRelation('project', 'id', $projectId)->orderBy('updated_at', 'desc')->first();
        if(!$presentation) {
            return redirect()->back()->with('error', 'tidak ada presentasi dengan status presentasi ' . $status);
        }
        return $this->store([
            'presentation_id' => $presentation->id,
        ]);
    }


    public function handleGetFinishPresentation($projectId) : mixed {
        return $this->model->query()->whereRelation('presentation.project', 'id', $projectId)->orderBy('created_at', 'asc')->get();
    }

}
