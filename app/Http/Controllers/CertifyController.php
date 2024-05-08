<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Material;
use App\Services\AssignmentService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertifyController extends Controller
{
    private AssignmentService $assignmentService;

    public function __construct(AssignmentService $assignmentService)
    {
        $this->assignmentService = $assignmentService;
    }
    /**
     * certity
     *
     * @return void
     */
    public function certify(Request $request, Material $material, Classroom $classroom)
    {
        $countAssignmentByMaterial = $this->assignmentService->handleAssignmentByMaterialCertify($material->id);

        $countAssignment = $this->assignmentService->countAssignmentsByMaterial($material->id);

        // if ($countAssignmentByMaterial == $countAssignment) {

        $class = $this->convertRomanToNumber(substr($classroom->name, 0, 1));

        $img = ImageManager::gd()->read('templateSertifikat.png');

        $text = 'sertifikat';
        $text = strtoupper($text);
        $spacedText = implode(' ', str_split($text));
        $img->text($spacedText, 1010, 230, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(100);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('No .', 680, 340, function ($font) {
            $font->file('fonts/merriweather/Merriweather-Regular.ttf');
            $font->size(42);
            $font->align('center');
            $font->valign('top');
        });
        $text = $class . substr($classroom->generation->generation, 9) . Carbon::now()->locale('id')->format('ymd') . substr(auth()->user()->national_student_id, 6);
        $spacedText = implode('  ', str_split($text));
        $img->text($spacedText, 1045, 340, function ($font) {
            $font->file('fonts/poppins/Poppins-Regular.ttf');
            $font->size(42);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('diberikan kepada :', 995, 420, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Italic.ttf');
            $font->size(40);
            $font->color('77838D');
            $font->align('center');
            $font->valign('top');
        });
        $img->text(auth()->user()->name, 975, 500, function ($font) {
            $font->file('fonts/Pinyon_Script/PinyonScript-Regular.ttf');
            $font->size(140);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Dari ' . auth()->user()->studentSchool->school->name, 1000, 700, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(34);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Telah menyelesaikan pembelajaran di kelas industri Hummatech untuk tema', 1020, 775, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Regular.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text($material->title, 1020, 830, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Malang, ' . Carbon::parse(now())->locale('id')->isoFormat('D MMMM YYYY'), 1020, 885, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Regular.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Verifikasi Sertifikat', 1505, 1185, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(30);
            $font->align('center');
        });
        $img->text('class.hummatech.com/sertifikat/example', 1360, 1240, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Regular.ttf');
            $font->size(30);
            $font->align('center');
        });

        // Generate QR code and store it in output buffer
        // ob_start();
        // QrCode::size(100)->format('png')->generate('https://class.hummatech.com/', 'php://output');
        // $qrImage = ob_get_clean();

        // Create image from the QR code string and place it at the bottom-right of the certificate
        // $qrcode = ImageManager::gd()->read($qrImage);
        // $img->place($qrcode, 'bottom-right', 200, 170);

        // Membuat direktori jika belum ada
        $directory = storage_path('app/public/storage/sertifikat');
        File::makeDirectory($directory, $mode = 0777, true, true);

        // Simpan gambar
        $imgPath = $directory . '/sertifikat.png';
        $img->save($imgPath);

        // Return response download
        return response()->download($imgPath, 'sertifikat.png');
        // }

        // return redirect()->back()->with('error', trans('Tidak bisa mengunduh sertifikat karena anda belum menyelesaikan semua tugas pada materi ' . $material->title));
    }

    public function convertRomanToNumber($roman)
    {
        $romans = [
            'X' => 10,
            'XI' => 11,
            'XII' => 12,
        ];

        return $romans[$roman];
    }
}
