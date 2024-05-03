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
    public function handleFinishPresentation(string $projectId) : mixed {
        $presentation = $this->presentation->whereRelation('project', 'id', $projectId)->latest()->first();

        return $this->store([
            'presentation_id' => $presentation->id,
        ]);
    }


    public function handleGetFinishPresentation($projectId) : mixed {
        return $this->model->query()->whereRelation('presentation.project', 'id', $projectId)->get();
    }

}
