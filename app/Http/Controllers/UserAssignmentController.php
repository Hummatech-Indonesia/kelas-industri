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
        // $this->submitAssignmentImageService->handleDelete($submitAssignment);
        $this->submitAssignmentImageService->handleCreate($request, $submitAssignment);
        return response()->json(null, 200);
    }
    public function deleteImages(SubmitAssignment $submitAssignment)
    {
        $this->submitAssignmentImageService->handleDelete($submitAssignment);
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
        $submitAssignments = SubmitAssignment::with(['student', 'images'])->get();
        // dd($submitAssignments);

        $notFoundFile = 0;
        if (count($submitAssignments) > 0) {
            $zip_name = $assignment->title . ' - ' . $classroom->name . '.zip';
            $zip_path = public_path($zip_name);
            $zip = new ZipArchive;

            if ($zip->open($zip_path, \ZipArchive::CREATE || \ZipArchive::OVERWRITE) === TRUE) {
                foreach ($submitAssignments as $submitAssignment) {
                    $studentName = $submitAssignment->student->name; // Nama siswa
                    $studentFolder = $studentName . '/'; // Nama folder untuk siswa

                    foreach ($submitAssignment->images as $image) {
                        $filePath = public_path('storage/' . $image->image); // Path file gambar

                        if (file_exists($filePath)) {
                            $zipFilePath = $studentFolder . basename($filePath);
                            $zip->addFile($filePath, $zipFilePath);
                        } else {
                            $notFoundFile++;
                        }
                    }
                }

                $zip->close();

                return response()->download($zip_path, $zip_name)->deleteFileAfterSend(true);
            } else {
                $errorMessage = "Tidak dapat membuat ZIP archive.";
            }

            return redirect()->back()->with('error', $errorMessage);
        } else {
            return redirect()->back()->with('error', 'Tidak ada file tugas yang dapat di-download.');
        }
    }
}
