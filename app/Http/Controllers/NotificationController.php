<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotificationService;

class NotificationController extends Controller
{
    private $notificationServcie;

    public function __construct(NotificationService $notificationServcie)
    {
        $this->notificationServcie = $notificationServcie;
    }


    public function create(Request $request)
    {
        // $this->notificationServcie->createRejectNotification($request);
    }

    public function getAll() {
        return $this->notificationServcie->getNotification();
        // return "sdfsfsdfsfsdf";
        // return "sfsgdfh";
    }
    //
}
