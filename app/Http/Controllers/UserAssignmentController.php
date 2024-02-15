<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Classroom;
use App\Models\Material;
use Illuminate\View\View;
use App\Models\Assignment;
use App\Models\SubMaterial;
use App\Traits\DataSidebar;
use Illuminate\Http\Request;
use App\Models\SubmitAssignment;
use App\Helpers\SchoolYearHelper;
use App\Services\AssignmentService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SubmitAssignmentRequest;

class UserAssignmentController extends Controller
{
    use DataSidebar;
    private AssignmentService $assignmentService;

    public function __construct(AssignmentService $assignmentService)
    {
        $this->assignmentService = $assignmentService;
    }

    public function index(Classroom $classroom, Assignment $assignment): View
    {
        $data = $this->GetDataSidebar();
        $data['students'] = $this->assignmentService->handleGetAssignmentStudent($classroom->id, $assignment->id);
        $data['assignment'] = $assignment;
        $data['classroom'] = $classroom;
        $data ['status'] = false;
        foreach ($data['students'] as $a) {
            if ($a->submitAssignment != null) {
                $data['status'] = true;
            }
        }
        return view('dashboard.user.pages.assignment.index', $data);
    }

    public function create(Classroom $classroom, Material $material, SubMaterial $submaterial, Assignment $assignment): View
    {
        $data = $this->GetDataSidebar();
        $data['assignment'] = $assignment;
        $data['classroom'] = $classroom;
        $data['material'] = $material;
        $data['subMaterial'] = $submaterial;
        $data['submitAssignment'] = $this->assignmentService->handleGetStudentSubmitAssignment(auth()->id(), $assignment->id);
        return view('dashboard.user.pages.assignment.detail', $data);

    }

    public function store(SubmitAssignmentRequest $request, Classroom $classroom, Material $material, SubMaterial $submaterial): RedirectResponse
    {
        $this->assignmentService->submitAssignment($request);

        return to_route('common.showSubMaterial', ['classroom' => $classroom, 'material' => $material, 'submaterial' => $submaterial])->with('success', trans('alert.add_success'));
    }

    public function download(SubmitAssignment $submitAssignment)
    {
        if (file_exists('storage/' . $submitAssignment->file)) {
            $extension = pathinfo(storage_path('storage/' . $submitAssignment->file), PATHINFO_EXTENSION);
            $path = public_path('storage/' . $submitAssignment->file);
            $name = $submitAssignment->student->name . '.' . $extension;
            return response()->download($path, $name);
        } else {
            if (auth()->user()->roles->pluck('name')[0] == 'teacher' || auth()->user()->roles->pluck('name')[0] == 'mentor') {
                return redirect()->back()->with('error', ' Tugas Siswa Tidak Ada, Silahkan Memberitahu Untuk Mengisi Ulang Tugas.');
            } else {
                return redirect()->back()->with('error', 'Tugas Anda Tidak Tersedia, Silahkan Input Kembali Tugas Anda.');
            }
        }
    }

    public function downloadAll(Classroom $classroom, Assignment $assignment)
    {
    $files = $this->assignmentService->handleGetAssignmentStudent($classroom->id, $assignment->id);

    if (count($files) > 0) {
        $zipName = 'Assignment.zip';
        $zipPath = storage_path('app/public/' . $zipName);
        $zip = new ZipArchive;

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $filesToAdd = [];

            foreach ($files as $file) {
                if ($file->submitAssignment) {
                    $filePath = storage_path('app/public/' . $file->submitAssignment->file);
                    $extension = pathinfo($filePath, PATHINFO_EXTENSION);

                    if (file_exists($filePath)) {
                        $filesToAdd[] = [
                            'path' => $filePath,
                            'name' => $file->name . '.' . $extension,
                        ];
                    }
                }
            }

            if (!empty($filesToAdd)) {
                foreach ($filesToAdd as $fileToAdd) {
                    $zip->addFile($fileToAdd['path'], $fileToAdd['name']);
                }
                $zip->close();

                return response()->download($zipPath, $zipName);
            } else {
                $errorMessage = "File Tugas Siswa Tidak Ditemukan Silahkan Untuk Memberitahu Agar Mengisi Ulang Tugas.";
            }
        } else {
            $errorMessage = "Tidak dapat membuat ZIP archive.";
        }

        return redirect()->back()->with('error', $errorMessage);
    } else {
        return redirect()->back()->with('error', 'Tidak ada file tugas yang dapat di-download.');
    }
}

}
