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
use App\Http\Requests\UploadAssignmentImage;
use App\Models\SubmitAssignmentImage;
use App\Models\SubmitReward;
use App\Services\SubmitAssignmentImageService;
use App\Services\SubmitAssignmentService;

class UserAssignmentController extends Controller
{
    use DataSidebar;
    private AssignmentService $assignmentService;
    private SubmitAssignmentImageService $submitAssignmentImageService;

    public function __construct(AssignmentService $assignmentService, SubmitAssignmentImageService $submitAssignmentImageService)
    {
        $this->assignmentService = $assignmentService;
        $this->submitAssignmentImageService = $submitAssignmentImageService;
    }

    public function index(Request $request, Classroom $classroom, Assignment $assignment): View
    {
        $data = $this->GetDataSidebar();
        $data['students'] = $this->assignmentService->handleGetAssignmentStudent($classroom->id, $assignment->id, $request);
        $data['assignment'] = $assignment;
        $data['classroom'] = $classroom;
        $data['status'] = false;
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

    public function store(SubmitAssignmentRequest $request, Classroom $classroom, Material $material, SubMaterial $submaterial)
    {
        $submitAssignment = $this->assignmentService->submitAssignment($request);
        $this->submitAssignmentImageService->handleDelete($submitAssignment);
        return response()->json(['success' => true, 'submitAssignment' => $submitAssignment]);
    }

    public function storeImage(UploadAssignmentImage $request, SubmitAssignment $submitAssignment)
    {
        $this->submitAssignmentImageService->handleCreate($request, $submitAssignment);
        return response()->json(null, 200);
    }

    public function download(SubmitAssignment $submitAssignment)
    {
        // Set the name for the ZIP file
        $zip_name = $submitAssignment->student->name . '.zip';
        $zip_path = public_path($zip_name);

        $zip = new \ZipArchive();

        // Open the ZIP file for creation and overwrite if it exists
        if ($zip->open($zip_path, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
            foreach ($submitAssignment->images as $submitImage) {
                $file = public_path('storage/' . $submitImage->image);

                // Check if the file exists before adding it to the ZIP
                if (file_exists($file)) {
                    // Use the base name of the file for the local name inside the ZIP
                    $zip->addFile($file, basename($file));
                } else {
                    if (auth()->user()->roles->pluck('name')[0] == 'teacher' || auth()->user()->roles->pluck('name')[0] == 'mentor') {
                        return redirect()->back()->with('error', 'Ada Kesalahan Pada File Tugas Siswa, Silahkan Memberitahu Siswa Untuk Mengisi Ulang Tugas.');
                    } else {
                        return redirect()->back()->with('error', 'Ada Kesalahan Pada File Tugas Anda, Silahkan Input Kembali Tugas Anda.');
                    }
                }
            }
            $zip->close();
        } else {
            echo 'Failed to create ZIP file';
        }

        // Return the ZIP file as a download response
        return response()->download($zip_path)->deleteFileAfterSend(true);

        // if (file_exists('storage/' . $submitAssignment->file)) {
        //     $extension = pathinfo(storage_path('storage/' . $submitAssignment->file), PATHINFO_EXTENSION);
        //     $path = public_path('storage/' . $submitAssignment->file);
        //     $name = $submitAssignment->student->name . '.' . $extension;
        //     return response()->download($path, $name);
        // } else {
        //     if (auth()->user()->roles->pluck('name')[0] == 'teacher' || auth()->user()->roles->pluck('name')[0] == 'mentor') {
        //         return redirect()->back()->with('error', ' Tugas Siswa Tidak Ada, Silahkan Memberitahu Untuk Mengisi Ulang Tugas.');
        //     } else {
        //         return redirect()->back()->with('error', 'Tugas Anda Tidak Tersedia, Silahkan Input Kembali Tugas Anda.');
        //     }
        // }
    }

    public function downloadAll(Classroom $classroom, Assignment $assignment)
    {
        $files = $this->assignmentService->handleGetAssignmentStudentDownload($classroom->id, $assignment->id);

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
