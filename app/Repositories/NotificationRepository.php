<?php
namespace App\Repositories;
use App\Models\Notification;
use App\Repositories\BaseRepository;

class NotificationRepository extends BaseRepository {
    public function __construct(Notification $notification)
    {
        $this->model = $notification;
    }


    /**
     * getUserNotification
     *
     * @param  mixed $classroomId
     * @return mixed
     */
    public function getUserNotification(): mixed {
        return $this->model->with('project')->whereRelation('project', 'user_id', auth()->id())->get();
    }
}
