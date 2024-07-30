<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use App\Enums\QuestionTypeEnum;
use App\Repositories\BaseRepository;

class QuestionBankRepository extends BaseRepository
{

    public function __construct(QuestionBank $model)
    {
        $this->model = $model;
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        if (isset($data['answer'])) {
            $questionBank = $this->model->query()
                ->create($data);
            foreach ($data['answer'] as $answer) {
                $data['answer'] = $answer;
                $questionBank->questionBankAnswers()->create($data);
            }
        } else {
            $questionBank = $this->model->query()
                ->create($data);
        }
        return $questionBank;
    }

    public function updateQuestion(array $data, $questionBank): mixed
    {
        if (isset($data['answer'])) {
            $questionBank = $this->model->query()->find($questionBank);

            $questionBank->update($data);
            $questionBank->questionBankAnswers()->delete();

            foreach ($data['answer'] as $answer) {
                $data['answer'] = $answer;
                $questionBank->questionBankAnswers()->create($data);
            }
        } else {
            $questionBank = $this->model->query()
                ->update($data);
        }
        return $questionBank;
    }

    public function handleGetBySubmaterial(String $submaterialId, int $limit)
    {
        return $this->model->query()
        ->where('sub_material_id', $submaterialId)
        ->latest()
        ->paginate($limit);
    }

    /**
     * paginateUnusedQuestion
     *
     * @param  mixed $request
     * @param  mixed $pagination
     */
    public function paginateUnusedQuestion(Request $request,string $submaterialId, string $slug, int $pagination): mixed
    {
        $data = $this->model->query()
            ->where('sub_material_id', $submaterialId)
            ->whereDoesntHave('subMaterialExamQuestions', function ($query) use ($slug) {
                $query->whereRelation('subMaterialExam', 'slug', $slug);
            })
            ->when($request->multiple_choice, function ($query) {
                $query->where('type', QuestionTypeEnum::MULTIPLECHOICE->value);
            })
            ->when($request->essay, function ($query) {
                $query->where('type', QuestionTypeEnum::ESSAY->value);
            });


            if($request->start_at) {
                $data->where('created_at', '>=', $request->start_at);
            }
            if($request->end_at) {
                $data->where('updated_at', '<=', $request->end_at);
            }
            if ($request->type) {
                $data->where('type', $request->type);
            } else {
                $data->where('type', QuestionTypeEnum::MULTIPLECHOICE->value);
            }

            return $data->paginate($pagination);
    }
    public function paginateUnusedQuestionMaterial(Request $request,string $materialId, int $pagination): mixed
    {
        $data = $this->model->query()
            ->whereRelation('submaterial.material', 'id', $materialId)
            ->whereDoesntHave('materialExamQuestions', function ($query) use ($materialId) {
                $query->whereRelation('materialExam.material', 'id', $materialId);
            })
            ->when($request->multiple_choice, function ($query) {
                $query->where('type', QuestionTypeEnum::MULTIPLECHOICE->value);
            })
            ->when($request->essay, function ($query) {
                $query->where('type', QuestionTypeEnum::ESSAY->value);
            });
            if($request->start_at) {
                $data->where('created_at', '>=', $request->start_at);
            }
            if($request->end_at) {
                $data->where('updated_at', '<=', $request->end_at);
            }
            if ($request->type) {
                $data->where('type', $request->type);
            }

            return $data->paginate($pagination);
    }

    /**
     * whereIn
     *
     * @param  mixed $data
     * @return mixed
     */
    public function whereIn(array $data): mixed
    {
        return $this->model->query()
            ->whereIn('id', $data)
            ->get();
    }

    /**
     * getRandomOrder
     *
     * @param  Request $request
     * @param  string $levelId
     * @param  string $lessonId
     * @param  int $amount
     * @param  array $usedQuestions
     * @return mixed
     */
    public function getRandomOrder(Request $request, string $submaterialId, int $amount, array $usedQuestions, string $type = null): mixed
    {
        $query = $this->model->query()
            ->where('sub_material_id' , $submaterialId)
            ->when($type, function ($query) use ($type) {
                $query->where('type', $type);
            })
            ->whereNotIn('id', $usedQuestions)
            ->inRandomOrder()
            ->take($amount);
        $query->when($request->filled(['start_date', 'end_date']), function ($query) use ($request) {
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        });

        return $query->get();
    }

    /**
     * getRandomOrder
     *
     * @param  Request $request
     * @param  string $levelId
     * @param  string $lessonId
     * @param  int $amount
     * @param  array $usedQuestions
     * @return mixed
     */
    public function getMaterialRandomOrder(Request $request, string $materialId, int $amount, array $usedQuestions, string $type = null): mixed
    {
        // dd($materialId);
        $query = $this->model->query()
            ->whereRelation('submaterial.material', 'id' , $materialId)
            ->when($type, function ($query) use ($type) {
                $query->where('type', $type);
            })
            ->whereNotIn('id', $usedQuestions)
            ->inRandomOrder()
            ->take($amount);
        $query->when($request->filled(['start_date', 'end_date']), function ($query) use ($request) {
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        });

        return $query->get();
    }

    /**
     * getByDailyExam
     *
     * @param  mixed $dailyExamId
     * @return mixed
     */
    public function getBySubmaterialExam(string $submaterialExamId): mixed
    {
        return $this->model->query()
            ->whereRelation('subMaterialExamQuestions.subMaterialExam', 'id', $submaterialExamId)
            ->get();
    }

    public function getByMaterialExam(string $materialExamId): mixed
    {
        return $this->model->query()
            ->whereRelation('materialExamQuestions.materialExam', 'id', $materialExamId)
            ->get();
    }

    /**
     * getByQuestion
     *
     * @param  mixed $data
     * @return mixed
     */
    public function getAnswerByQuestion(array $data): mixed
    {
        return $this->model->query()
            ->whereRelation('questionBankAnswers', function ($query) use ($data) {
                $query->whereIn('question_bank_id', $data);
            })
            ->with('questionBankAnswers')
            ->get();
    }
}
