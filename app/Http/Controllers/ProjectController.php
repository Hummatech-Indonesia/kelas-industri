<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Classroom;
use App\Models\Project;
use App\Services\PresentationService;
use App\Services\ProjectService;
use App\Services\NotificationService;
use App\Services\PresentationFinishService;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use DataSidebar;
    private ProjectService $projectService;
    private PresentationService $presentationService;
    private NotificationService $notificationService;
    private PresentationFinishService $presentationFinishService;

    public function __construct(ProjectService $projectService, PresentationService $presentationService, NotificationService $notificationService, PresentationFinishService $presentationFinishService)
    {
        $this->projectService = $projectService;
        $this->presentationService = $presentationService;
        $this->notificationService = $notificationService;
        $this->presentationFinishService = $presentationFinishService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->GetDataSidebar();
        $data['project'] = $this->projectService->handleGetProjectByUser(auth()->user()->id);
        if ($data['project']) {
            $data['presentations'] = $this->presentationService->handleGetByProject(auth()->user()->project->id);
            $data['approvedPresentations'] = $this->presentationService->handleGetByProjectApproved($data['project']->id);
            $data['presentationFinishes'] = $this->presentationFinishService->getPresentationFinish(auth()->user()->project->id);
            $data['notes'] = $this->projectService->handleGetNote($data['project']->id);
            $data['tasks'] = $this->projectService->handleGetTasks($data['project']->id);
        } else {
            $data['presentations'] = [];
            $data['approvedPresentations'] = [];
            $data['notes'] = [];
            $data['tasks'] = [];
        }
        // dd($data['approvedPresentations']);
        return view('dashboard.user.pages.project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $this->projectService->handleCreate($request);
        return redirect()->back()->with('success', 'Berhasil upload project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $data = $this->GetDataSidebar();
        $data['project'] = $project;
        $data['tasks'] = $this->projectService->handleGetTasks($project->id);
        $data['notes'] = $this->projectService->handleGetNote($project->id);
        $data['presentations'] = $this->presentationService->handleGetByProject($project->id);
        $data['presentationFinishes'] = $this->presentationFinishService->getPresentationFinish($project->id);
        $data['approvedPresentations'] = $this->presentationService->handleGetByProjectApproved($project->id);
        return view('dashboard.user.pages.project.detailProject', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    /**
     * studentProject
     *
     * @param  mixed $classroom
     * @return void
     */
    public function studentProject(Classroom $classroom, Request $request)
    {
        $data = $this->GetDataSidebar();
        $data['projects'] = $this->projectService->handleGetProjectByClassroom($classroom->id, $request);
        return view('dashboard.user.pages.project.studentProject', $data);
    }

    /**
     * approvalProject
     *
     * @param  mixed $project
     * @return void
     */
    public function approvalProject(Project $project)
    {
        $this->projectService->handleApprovalProject($project->id);
        return redirect()->back()->with('success', 'Project ' . $project->user->name . ' berhasil di Setujui');
    }

    /**
     * rejectProject
     *
     * @param  mixed $project
     * @return void
     */
    public function rejectProject(Project $project, Request $request)
    {
        $this->projectService->handleRejectProject($project->id, $request);
        $this->notificationService->createRejectProjectNotification($project->id, $request);
        return redirect()->back()->with('success', 'Project ' . $project->user->name . ' berhasil di Tolak');
    }
}
