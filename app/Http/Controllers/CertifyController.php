<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Models\Material;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\EventPartisipant;
use App\Services\AssignmentService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Geometry\Factories\LineFactory;
use Intervention\Image\Geometry\Factories\RectangleFactory;

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
        // $countAssignmentByMaterial = $this->assignmentService->handleAssignmentByMaterialCertify($material->id);

        $countAssignment = $this->assignmentService->countAssignmentsByMaterial($material->id, auth()->user());

        // if ($countAssignmentByMaterial == $countAssignment) {

        $class = $this->convertRomanToNumber(substr($classroom->name, 0, 1));

        $img = ImageManager::gd()->read('templateSertifikat/materi.png');

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
        $img->text(auth()->user()->name, 1000, 500, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
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
        $img->text('Telah menyelesaikan materi', 1000, 775, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Regular.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text($material->title, 1000, 830, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text(Carbon::parse(now())->locale('id')->isoFormat('D MMMM YYYY'), 1000, 885, function ($font) {
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
        ob_start();
        QrCode::size(100)->format('png')->generate(route('material.cerify-certification', ['material' => $material->id, 'classroom' => $classroom->id, 'user' => auth()->user()->id]), 'php://output');
        // QrCode::size(100)->format('png')->generate('https//class.hummatech.com', 'php://output');
        $qrImage = ob_get_clean();

        // Create image from the QR code string and place it at the bottom-right of the certificate
        $qrcode = ImageManager::gd()->read($qrImage);
        $img->place($qrcode, 'bottom-right', 200, 170);

        // Membuat direktori jika belum ada
        $directory = storage_path('app/public/storage/sertifikat');
        File::makeDirectory($directory, $mode = 0777, true, true);

        // Simpan gambar
        $imgPath = $directory . '/sertifikat.png';
        $img->save($imgPath);

        // Return response download
        return response()->download($imgPath, 'sertifikat.png');
        // return response()->file($imgPath, ['Content-Type' => 'image/png']);
        // }

        // return redirect()->back()->with('error', trans('Tidak bisa mengunduh sertifikat karena anda belum menyelesaikan semua tugas pada materi ' . $material->title));
    }


    public function certifyCompetenceTest()
    {
        $studentScores = Material::with([
            'subMaterials.subMaterialExams.studentSubmaterialExams' => function ($query) {
                $query->where('student_id', auth()->user()->id)
                    ->select('sub_material_exam_id', 'score');
            }
        ])->get();

        $groupedScores = $studentScores->map(function ($material) {
            $subMaterialScores = $material->subMaterials->flatMap(function ($subMaterial) {
                return $subMaterial->subMaterialExams->flatMap(function ($subMaterialExam) {
                    return $subMaterialExam->studentSubmaterialExams->map(function ($studentSubmaterialExam) {
                        return [
                            'sub_material_exam_id' => $studentSubmaterialExam->sub_material_exam_id,
                            'score' => $studentSubmaterialExam->score,
                            'sub_material_id' => $studentSubmaterialExam->subMaterialExam->sub_material_id,
                        ];
                    });
                });
            })->groupBy('sub_material_id')
                ->map(function ($scores) {
                    return [
                        'total_score' => $scores->sum('score'),
                    ];
                });

            $assignmentScores = $material->subMaterials->flatMap(function ($subMaterial) {
                return $subMaterial->assignments->flatMap(function ($assignment) {
                    return $assignment->StudentSubmitAssignment->where('student_id', auth()->id())->map(function ($studentAssignment) {
                        return [
                            'assignment_id' => $studentAssignment->assignment_id,
                            'point' => $studentAssignment->point,
                        ];
                    });
                });
            })->groupBy('assignment_id')
                ->map(function ($scores) {
                    return [
                        'total_score' => $scores->sum('point'),
                    ];
                })->avg('total_score');

            $totalExamScore = $subMaterialScores->reduce(function ($carry, $item) {
                return $carry + $item['total_score'];
            }, 0);

            // $totalAssignmentScore = $assignmentScores->reduce(function ($carry, $item) {
            //     return $carry + $item['total_score'];
            // }, 0);

            $totalScore = ($totalExamScore * 0.6) + ($assignmentScores * 0.4);

            return [
                'material' => $material->title,
                'total_score' => $totalScore,
            ];
        });

        dd($groupedScores);


        $img = ImageManager::gd()->read('templateSertifikat/nilaiUas.png');
        $text = 'struktur program';
        $text = strtoupper($text);
        $spacedText = implode('', str_split($text));
        $img->text($spacedText, 1010, 330, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(90);
            $font->align('center');
            $font->valign('top');
        });

        // Draw the table
        $img->drawRectangle(240, 450, function (RectangleFactory $rectangle) {
            $rectangle->size(1500, 100); // width & height of rectangle
            $rectangle->background('#00b1f0'); // background color of rectangle
            $rectangle->border('black', 2); // border color & size of rectangle
        });

        $img->drawLine(function (LineFactory $line) {
            $line->from(350, 450); // starting point of line
            $line->to(350, 550); // ending point
            $line->color('black'); // color of line
            $line->width(5); // line width in pixels
        });

        $img->drawLine(function (LineFactory $line) {
            $line->from(1580, 450); // starting point of line
            $line->to(1580, 550); // ending point
            $line->color('black'); // color of line
            $line->width(5); // line width in pixels
        });

        // Add table headers
        $img->text('No', 270, 485, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(40);
            $font->color('white');
            $font->align('left');
            $font->valign('top');
        });
        $img->text('Materi', 1030, 485, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(40);
            $font->color('white');
            $font->align('right');
            $font->valign('top');
        });
        $img->text('Nilai', 1700, 485, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(40);
            $font->color('white');
            $font->align('right');
            $font->valign('top');
        });

        $vertical = 100;

        $img->drawRectangle(240, 550, function (RectangleFactory $rectangle) {
            $rectangle->size(1500, 100); // width & height of rectangle
            $rectangle->background('#FFF8EF'); // background color of rectangle
            $rectangle->border('black', 2); // border color & size of rectangle
        });

        $img->drawRectangle(240, 550 + $vertical, function (RectangleFactory $rectangle) {
            $rectangle->size(1500, 100); // width & height of rectangle
            $rectangle->background('#FFF8EF'); // background color of rectangle
            $rectangle->border('black', 2); // border color & size of rectangle
        });

        // Add table headers
        $img->text('1.', 290, 585, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(40);
            $font->color('black');
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Fundamental Jawa Terbaru', 950, 585, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(40);
            $font->color('black');
            $font->align('center');
            $font->valign('top');
        });
        $img->text('80', 1650, 585, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(40);
            $font->color('black');
            $font->align('center');
            $font->valign('top');
        });

        $img->drawLine(function (LineFactory $line) use ($vertical) {
            $line->from(350, 550 + $vertical); // starting point of line
            $line->to(350, 650 + $vertical); // ending point
            $line->color('black'); // color of line
            $line->width(5); // line width in pixels
        });

        $img->drawLine(function (LineFactory $line) use ($vertical) {
            $line->from(1580, 550 + $vertical); // starting point of line
            $line->to(1580, 650 + $vertical); // ending point
            $line->color('black'); // color of line
            $line->width(5); // line width in pixels
        });

        $img->drawLine(function (LineFactory $line) {
            $line->from(350, 550); // starting point of line
            $line->to(350, 650); // ending point
            $line->color('black'); // color of line
            $line->width(5); // line width in pixels
        });

        $img->drawLine(function (LineFactory $line) {
            $line->from(1580, 550); // starting point of line
            $line->to(1580, 650); // ending point
            $line->color('black'); // color of line
            $line->width(5); // line width in pixels
        });



        $content = $img->toPng();
        return response()->make($content, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'inline; filename="certificate.png"'
        ]);
    }

    public function eventCertify(Request $request, Event $event, EventPartisipant $participant)
    {

        // dd($event);
        // if ($countAssignmentByMaterial == $countAssignment) {

        $classroom = $participant->user->studentSchool->studentClassroom->classroom;
        $class = $this->convertRomanToNumber(substr($classroom->name, 0, 1));

        $img = ImageManager::gd()->read('templateSertifikat/event.png');

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
        $code = '23' . Carbon::now()->locale('id')->isoFormat('YYYYMMDD') . mt_rand(0, 9999);
        $spacedText = implode('  ', str_split($code));
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
        $img->text(auth()->user()->name, 1000, 500, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(140);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Sebagai', 1000, 660, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(30);
            // $font->color('77838D');
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Peserta', 1000, 710, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(40);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Dalam ' . $event->title, 1000, 775, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Regular.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('yang diselenggarakan oleh PT Humma Teknologi Indonesia', 1050, 830, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text(Carbon::parse($participant->updated_at)->locale('id')->isoFormat('D MMMM YYYY'), 1000, 885, function ($font) {
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

        $code = $class . substr($classroom->generation->generation, 9) . Carbon::now()->locale('id')->format('ymd') . substr(auth()->user()->national_student_id, 6);
        // Generate QR code and store it in output buffer
        ob_start();
        // QrCode::size(100)->format('png')->generate('https://class.hummatech.com/', 'php://output');
        QrCode::size(100)->format('png')->generate(route('events.verify-certification', ['participant' => EventPartisipant::where('user_id', auth()->user()->id)->first()->id, 'event' => $event->id]), 'php://output');
        $qrImage = ob_get_clean();

        // Create image from the QR code string and place it at the bottom-right of the certificate
        $qrcode = ImageManager::gd()->read($qrImage);
        $img->place($qrcode, 'bottom-right', 200, 170);

        // Membuat direktori jika belum ada
        $directory = storage_path('app/public/storage/sertifikat');
        File::makeDirectory($directory, $mode = 0777, true, true);

        // Simpan gambar
        $imgPath = $directory . '/sertifikat.png';
        $img->save($imgPath);

        // Return response download
        return response()->download($imgPath, 'sertifikat.png');
        // return response()->file($imgPath, ['Content-Type' => 'image/png']);
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


    public function eventVerification(
        EventPartisipant $participant,
        Event $event
    ): View {
        $classroom = $participant->user->studentSchool->studentClassroom->classroom;
        $class = $this->convertRomanToNumber(substr($classroom->name, 0, 1));

        $img = ImageManager::gd()->read('templateSertifikat/event.png');

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
        $code = '23' . Carbon::now()->locale('id')->isoFormat('YYYYMMDD') . mt_rand(0, 9999);
        $spacedText = implode('  ', str_split($code));
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
        $img->text($participant->user->name, 1000, 500, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(140);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Sebagai', 1000, 660, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(30);
            // $font->color('77838D');
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Peserta', 1000, 710, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(40);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Dalam ' . $event->title, 1000, 775, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Regular.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('yang diselenggarakan oleh PT Humma Teknologi Indonesia', 1050, 830, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text(Carbon::parse($participant->updated_at)->locale('id')->isoFormat('D MMMM YYYY'), 1000, 885, function ($font) {
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
        ob_start();
        // QrCode::size(100)->format('png')->generate('https://class.hummatech.com/', 'php://output');
        QrCode::size(100)->format('png')->generate(route('events.verify-certification', ['participant' => $participant->user->id, 'event' => $event->id]), 'php://output');
        $qrImage = ob_get_clean();

        // Create image from the QR code string and place it at the bottom-right of the certificate
        $qrcode = ImageManager::gd()->read($qrImage);
        $img->place($qrcode, 'bottom-right', 200, 170);

        // Membuat direktori jika belum ada
        $directory = storage_path('app/public/storage/sertifikat');
        File::makeDirectory($directory, $mode = 0777, true, true);

        // Simpan gambar
        $imgPath = $directory . '/sertifikat.png';
        $img->save($imgPath);

        // Convert the image to base64
        $imageData = base64_encode(file_get_contents($imgPath));
        $src = 'data:image/png;base64,' . $imageData;

        $data['participant'] = $participant;
        $data['event'] = $event;
        $data['classroom'] = $participant->user->studentSchool->studentClassroom->classroom;
        $data['class'] = $this->convertRomanToNumber(substr($data['classroom']->name, 0, 1));
        $data['number'] = $code;
        $data['image'] = $src;
        return view('dashboard.user.pages.certify.event-certify', $data);
    }

    public function materialVerify(Request $request, Material $material, Classroom $classroom, User $user)
    {
        $countAssignmentByMaterial = $this->assignmentService->handleAssignmentByMaterialCertify($material->id);

        $countAssignment = $this->assignmentService->countAssignmentsByMaterial($material->id, $user);

        // if ($countAssignmentByMaterial == $countAssignment) {

        $class = $this->convertRomanToNumber(substr($classroom->name, 0, 1));

        $img = ImageManager::gd()->read('templateSertifikat/materi.png');

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
        $text = $class . substr($classroom->generation->generation, 9) . Carbon::now()->locale('id')->format('ymd') . substr($user->national_student_id, 6);
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
        $img->text($user->name, 1000, 500, function ($font) {
            $font->file('fonts/tex-gyre-termes/texgyretermes-regular.otf');
            $font->size(140);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Dari ' . $user->studentSchool->school->name, 1000, 700, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(34);
            $font->align('center');
            $font->valign('top');
        });
        $img->text('Telah menyelesaikan materi', 1000, 775, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Regular.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text($material->title, 1000, 830, function ($font) {
            $font->file('fonts/open-sans/OpenSans-Bold.ttf');
            $font->size(30);
            $font->align('center');
            $font->valign('top');
        });
        $img->text(Carbon::parse(now())->locale('id')->isoFormat('D MMMM YYYY'), 1000, 885, function ($font) {
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

        $code = $class . substr($classroom->generation->generation, 9) . Carbon::now()->locale('id')->format('ymd') . substr($user->national_student_id, 6);

        // Generate QR code and store it in output buffer
        ob_start();
        QrCode::size(100)->format('png')->generate('https://class.hummatech.com/', 'php://output');
        $qrImage = ob_get_clean();

        // Create image from the QR code string and place it at the bottom-right of the certificate
        $qrcode = ImageManager::gd()->read($qrImage);
        $img->place($qrcode, 'bottom-right', 200, 170);

        // Membuat direktori jika belum ada
        $directory = storage_path('app/public/storage/sertifikat');
        File::makeDirectory($directory, $mode = 0777, true, true);

        // Simpan gambar
        $imgPath = $directory . '/sertifikat.png';
        $img->save($imgPath);

        // Convert the image to base64
        $imageData = base64_encode(file_get_contents($imgPath));
        $src = 'data:image/png;base64,' . $imageData;

        $data['image'] = $src;
        $data['material'] = $material;
        $data['classroom'] = $classroom;
        $data['user'] = $user;
        $data['number'] = $code;
        return view('dashboard.user.pages.certify.material-certify', $data);
        // return redirect()->back()->with('error', trans('Tidak bisa mengunduh sertifikat karena anda belum menyelesaikan semua tugas pada materi ' . $material->title));
    }
}
