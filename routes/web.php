<?php

use FontLib\Table\Type\name;
use App\Models\SubMaterialExam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TripayController;
use App\Http\Controllers\CertifyController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DevisionController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DependentController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SubMaterialController;
use App\Http\Controllers\MaterialExamController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\QuestionBankController;
use App\Http\Controllers\Spk\CriteriaController;
use App\Http\Controllers\SubmitRewardController;
use App\Http\Controllers\ZoomScheduleController;
use App\Http\Controllers\AdminitrasionController;
use App\Http\Controllers\SchoolPackageController;
use App\Http\Controllers\UserClassroomController;
use App\Http\Controllers\StudentPaymentController;
use App\Http\Controllers\TripayCallbackController;
use App\Http\Controllers\UserAssignmentController;
use App\Http\Controllers\SubMaterialExamController;
use App\Http\Controllers\TrackingPaymentController;
use App\Http\Controllers\EventPartisipantController;
use App\Http\Controllers\TeacherStatisticController;
use App\Http\Controllers\EventDocumentationController;
use App\Http\Controllers\PresentationFinishController;
use App\Http\Controllers\MaterialExamQuestionController;
use App\Http\Controllers\StudentMaterialExamController;
use App\Http\Controllers\StudentSubmaterialExamController;
use App\Http\Controllers\SubMaterialExamQuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [WelcomeController::class, 'index'])->name('landingPage');
Route::get('/event', [WelcomeController::class, 'event'])->name('event');
Route::get('/event/{event}', [WelcomeController::class, 'eventDetail'])->name('detail-events');
Route::get('/gallery', [WelcomeController::class, 'gallery'])->name('gallery');
Route::get('/news', [WelcomeController::class, 'news'])->name('news');
Route::get('/news/{slug}', [WelcomeController::class, 'detail'])->name('detail-news');
Route::get('certify/{material}/{classroom}', [CertifyController::class, 'certify'])->name('certify');
Route::get('all-school', [SchoolController::class, 'school'])->name('all-school');
Route::get('classroomBySchool', [ClassroomController::class, 'classroom'])->name('classroomBySchool');

Auth::routes(['login' => true, 'register' => true]);

Route::middleware('auth.custom')->group(function () {

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('index');
        Route::patch('/update-profile/{user}', [ProfileController::class, 'update'])->name('update');
        Route::patch('/update-password/{user}', [ProfileController::class, 'updatePassword'])->name('updatePassword');
    });

    //admin
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            return view('dashboard.admin.layouts.app');
        });

        Route::get('/absent', [AttendanceController::class, 'index'])->name('absent');
        Route::get('/absent/{attendance}', [AttendanceController::class, 'show'])->name('showAbsent');
        Route::get('/ranking', [PointController::class, 'index'])->name('rankings');
        Route::get('/report', [ReportController::class, 'index'])->name('report');
        Route::get('/detailKelas/{school}', [ReportController::class, 'show'])->name('detailKelas');
        Route::get('/detailSiswa/{classroom}', [ReportController::class, 'detail'])->name('detailSiswa');
        Route::resource('classrooms', ClassroomController::class)->only('show');
        Route::get('/detailJurnal/{classroom}', [JurnalController::class, 'detailJurnal'])->name('detailJurnal');
        Route::get('/detailJurnal/{classroom}/{journal}', [JurnalController::class, 'detailAttendance'])->name('journal.attendance');

        Route::get('/teacher-statistic', [TeacherStatisticController::class, 'index'])->name('teacher.statistic.index');
        Route::get('/teacher-statistic/{school}', [TeacherStatisticController::class, 'show'])->name('teacher.statistic.show');


        Route::get('studentRegistration', [ApprovalController::class, 'studentRegistration'])->name('studentRegistration');
        Route::get('studentRegistration/wrongInput', [ApprovalController::class, 'wrongInput'])->name('wrongInput');
        Route::patch('studentRegistration/updateSchool', [ApprovalController::class, 'updateSchool'])->name('updateSchool');
        Route::patch('approve-student-all', [ApprovalController::class, 'approveAll'])->name('approveStudentAll');
        Route::patch('approve-student/{user}', [ApprovalController::class, 'approve']);
        Route::get('classrooms/create/{school}', [ClassroomController::class, 'create'])->name('classrooms.create');
        Route::post('classrooms/store/{school}', [ClassroomController::class, 'store'])->name('classrooms.store');
        Route::get('classrooms/{classroom}/{school}/edit', [ClassroomController::class, 'edit'])->name('classrooms.edit');
        Route::patch('classrooms/{classroom}/{school}', [ClassroomController::class, 'update'])->name('classrooms.update');
        Route::delete('classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('classrooms.destroy');

        Route::get('teachers/create/{school}', [TeacherController::class, 'create'])->name('teachers.create');
        Route::post('teachers/store/{school}', [TeacherController::class, 'store'])->name('teachers.store');
        Route::get('teachers/edit/{teacher}/{school}', [TeacherController::class, 'edit'])->name('teachers.edit');
        Route::patch('teachers/update/{teacher}/{school}', [TeacherController::class, 'update'])->name('teachers.update');
        Route::resource('teachers', TeacherController::class)->only('destroy');

        Route::get('students/{school}', [SchoolController::class, 'students'])->name('students.all');
        Route::get('students/create/{school}', [StudentController::class, 'create'])->name('students.create');
        Route::post('students/store/{school}', [StudentController::class, 'store'])->name('students.store');
        Route::get('students/edit/{student}/{school}', [StudentController::class, 'edit'])->name('students.edit');
        Route::patch('students/update/{student}/{school}', [StudentController::class, 'update'])->name('students.update');
        Route::resource('students', StudentController::class)->only('destroy');

        Route::get('/gantiPassword/{student}/{school}', [StudentController::class, 'ChangePassword'])->name('gantiPassword');
        Route::patch('/updatePassword/{student}/{school}', [StudentController::class, 'updatePassword'])->name('updatePassword');

        Route::get('schedules/get-all', [ScheduleController::class, 'all'])->name('schedules.all');
        // Route::get('events/school', [EventController::class, 'showSchools'])->name('events.schools');

        Route::resources([
            'schoolYears' => SchoolYearController::class,
            'generations' => GenerationController::class,
            'schools' => SchoolController::class,
            'materials' => MaterialController::class,
            'submaterials' => SubMaterialController::class,
            'assignments' => AssignmentController::class,
            'mentors' => MentorController::class,
            'zoomSchedules' => ZoomScheduleController::class,
            'journal' => JurnalController::class,
            'attendance' => AttendanceController::class,
            'exam' => ExamController::class,
            'saleries' => SalaryController::class,
            'rewards' => RewardController::class,
            'submitRewards' => SubmitRewardController::class,
            'gallerys' => GalleryController::class,
            'news' => NewsController::class,
            'administrations' => AdminitrasionController::class,
            'devisions' => DevisionController::class,
            'question-bank' => QuestionBankController::class,
            'schedules' => ScheduleController::class,
            'events' => EventController::class,
            'eventDocumentation' => EventDocumentationController::class,
            'sub-material-exam' => SubMaterialExamController::class,
            'material-exam' => MaterialExamController::class,
        ]);

        Route::post('/question-bank/upload-image', [QuestionBankController::class, 'uploadImage'])->name('ckeditor-upload');
        Route::post('/question-bank/delete-image', [QuestionBankController::class, 'deleteImage'])->name('ckeditor-delete');

        Route::post('register-exam', [SubMaterialExamController::class, 'registerExamStore'])->name('registerExam.store');
        Route::get('register-exam-result/{subMaterialExam}', [SubMaterialExamController::class, 'registrationExamResult'])->name('registerExam.result');
        Route::put('regristation-exam-update/{subMaterialExam}', [SubMaterialExamController::class, 'registerExamupdate'])->name('exam-update');
        Route::get('regristation-exam-question/{subMaterialExam}', [SubMaterialExamController::class, 'examQuestion'])->name('regristation-exam-question');


        Route::get('criterias/{devision}', [CriteriaController::class, 'index'])->name('criterias.index');
        Route::post('criterias', [CriteriaController::class, 'store'])->name('criterias.store');
        Route::delete('criterias/{criterias}', [CriteriaController::class, 'destroy'])->name('criterias.destroy');
        Route::put('criterias/{criterias}', [CriteriaController::class, 'update'])->name('criterias.update');

        Route::get('events/{event}/participants', [EventController::class, 'showParticipants'])->name('events.participants');
        Route::put('events/set-certificate/{event}', [EventPartisipantController::class, 'update'])->name('eventsParticipant.setCertificate');
        Route::post('eventDocumentation/store/{event}', [EventDocumentationController::class, 'storeMultiple'])->name('eventDocumentation.store-img');

        Route::get('exam-taking-place', [SubMaterialExamController::class, 'examTakingPlace'])->name('exam-taking-place');
        Route::get('detail-exam-taking-place/{slug}', [SubMaterialExamController::class, 'detailExamTakingPlace'])->name('detail-exam-taking-place');
        Route::get('exam-finnaly', [SubMaterialExamController::class, 'examFinnaly'])->name('exam-finnaly');
        Route::get('exam-statistic/{slug}', [SubMaterialExamController::class, 'examStatistic'])->name('exam-statistic');
        Route::get('exam-detail-student/{submaterialExam}', [SubMaterialExamController::class, 'examDetailStudent'])->name('exam-detail-student');

        Route::get('exam-registration', [SubMaterialExamController::class, 'registrationExam'])->name('exam-registration');

        Route::get('exam-question/{subMaterialExam}', [SubMaterialExamController::class, 'examQuestion'])->name('exam-question');
        Route::get('exam-question-manual/{submaterial}/{submaterialExam}', [SubMaterialExamController::class, 'examQuestionManual'])->name('exam-question-manual');
        Route::get('matarial-exam-question-manual/{material}/{materialExam}', [MaterialExamController::class, 'examQuestionManual'])->name('material-exam-question-manual');

        Route::get('material-exam-question/{materialExam}', [MaterialExamController::class, 'examQuestion'])->name('materialExam-question');

        Route::get('question-bank-multiplechoice/{submaterial}', [QuestionBankController::class, 'indexMultipleChoise'])->name('question-bank-multiplechoice');
        Route::get('question-bank-essay/{submaterial}', [QuestionBankController::class, 'indexEssay'])->name('question-bank-essay');
        Route::get('question-bank/{questionBank}/edit', [QuestionBankController::class, 'edit'])->name('question-bank-edit');
        Route::put('update-essay/{questionBank}', [QuestionBankController::class, 'updateEssay'])->name('updateEssay');
        Route::get('quetion-banks/{material}', [MaterialController::class, 'questionBank'])->name('questionBank');
        Route::get('quetion-bank-detail/{submaterial}', [QuestionBankController::class, 'show'])->name('quetion-bank-detail');

        Route::post('question-bank-manual/{submaterialExam}', [SubMaterialExamQuestionController::class, 'manual'])->name('questionBank.manual');
        Route::post('material-question-bank-manual/{materialExam}', [MaterialExamQuestionController::class, 'manual'])->name('material-questionBank.manual');
        Route::post('question-bank-auto/{submaterialExam}', [SubMaterialExamQuestionController::class, 'auto'])->name('questionBank.auto');
        Route::post('material-question-bank-auto/{materialExam}', [MaterialExamQuestionController::class, 'auto'])->name('material-questionBank.auto');
        Route::resource('submaterialExamQuestion', SubMaterialExamQuestionController::class)->only('destroy');

        Route::post('question-bank-store-essay', [QuestionBankController::class, 'storeEssay'])->name('questionBank.storeEssay');

        Route::patch('updateStatusNews/{news}', [NewsController::class, 'updateStatus'])->name('updateStatusNews');
        Route::get('saleriesTeacher', [SalaryController::class, 'indexTeacher'])->name('saleriesTeacher');
        Route::get('create', [SalaryController::class, 'createTeacher'])->name('createSaleriesTeacher');
        Route::get('edit/{salery}', [SalaryController::class, 'editTeacher'])->name('editSaleriesTeacher');
        Route::post('store', [SalaryController::class, 'storeTeacher'])->name('storeSaleriesTeacher');
        Route::patch('update/{salery}', [SalaryController::class, 'updateTeacher'])->name('updateSaleriesTeacher');
        Route::delete('delete/{salery}', [SalaryController::class, 'destroyTeacher'])->name('deleteSaleriesTeacher');
        Route::post('getTeacherBySchool', [SalaryController::class, 'getTeacherBySchool'])->name('getTeacherBySchool');

        Route::get('/showClassroom/{school}', [ExamController::class, 'showClassroom'])->name('showClassroom');
        Route::get('/showStudent/{classroom}', [ExamController::class, 'showStudent'])->name('showStudent');
        Route::get('/showEvaluation/{student}', [ExamController::class, 'showEvaluation'])->name('showEvaluation');

        Route::get('/showSubMaterial', [SubMaterialController::class, 'showSubMaterial'])->name('showSubMaterial');

        Route::prefix('rolling-mentor')->name('rollingMentor.')->group(function () {
            Route::get('/', [MentorController::class, 'rollingMentor'])->name('index');
            Route::get('/{mentor}', [MentorController::class, 'addRollingMentor'])->name('add');
            Route::post('/get-classrooms', [MentorController::class, 'getClassroomBySchool'])->name('getClassrooms');
            Route::post('/action-rolling-mentor', [MentorController::class, 'actionRollingMentor'])->name('actionRollingMentor');
            Route::delete('/delete-rolling-mentor/{mentorClassroom}', [MentorController::class, 'deleteMentorClassroom'])->name('deleteRollingMentor');
        });

        Route::name('materials.')->prefix('materials')->group(function () {
            Route::get('/{material}/create', [SubMaterialController::class, 'create'])->name('createSubmaterial');
            Route::get('/{material}/{subMaterial}', [SubMaterialController::class, 'edit'])->name('editSubmaterial');
        });

        Route::name('submaterials.')->prefix('submaterials')->group(function () {
            Route::get('/assignments/{submaterial}/create', [AssignmentController::class, 'create'])->name('createAssignment');
            Route::get('/{submaterial}/view/{role}', [SubMaterialController::class, 'viewMaterial'])->name('viewMaterial');
        });

        Route::prefix('rolling-student')->name('rollingStudent.')->group(function () {
            Route::get('/', [StudentController::class, 'rollingStudent'])->name('index');
            Route::post('/', [ClassroomController::class, 'addStudentClassroom'])->name('store');
        });

        Route::prefix('rolling-teacher')->name('rollingTeacher.')->group(function () {
            Route::get('/{school}', [TeacherController::class, 'rollingTeacher'])->name('index');
            Route::get('addRollingTeacher/{teacher}', [TeacherController::class, 'addRollingTeacher'])->name('add');
            Route::post('/action-rolling-teacher', [TeacherController::class, 'actionRollingTeacher'])->name('actionRollingTeacher');
            Route::delete('/delete-rolling-teacher/{teacherClassroom}', [TeacherController::class, 'deleteTeacherClassroom'])->name('deleteRollingTeacher');
        });

        Route::patch('validStatus/{submitReward}', [SubmitRewardController::class, 'validStatus'])->name('validStatus');

        Route::get('createExam/{classroom}', [ExamController::class, 'createExam'])->name('createExam');

        //changepwmentor
        Route::get('/gantiPasswordMentor/{mentor}', [MentorController::class, 'ChangePasswordMentor'])->name('gantiPasswordMentor');
        Route::patch('/updatePasswordMentor/{mentor}', [MentorController::class, 'updatePasswordMentor'])->name('updatePasswordMentor');
        //changepwsteacher
        Route::get('/gantiPasswordGuru/{teacher}', [TeacherController::class, 'ChangePasswordTeacher'])->name('gantiPasswordGuru');
        Route::patch('/updatePasswordGuru/{teacher}', [TeacherController::class, 'updatePasswordGuru'])->name('updatePasswordGuru');

        //student
        Route::post('/import-students/{schoolId}', [StudentController::class, 'importStudents'])->name('importStudents');

        Route::get('export/UAS/{exam}/{semester}', [ExamController::class, 'export'])->name('exportUAS');
        Route::get('export-users/{school}', [SchoolController::class, 'exportStudent'])->name('exportUser');
        Route::get('export-studentRegristationExam/{school}', [StudentSubmaterialExamController::class, 'exportRegristationExam'])->name('exportStudentRegristationExam');
        Route::delete('delete-regristation-exam-users/{school}', [SchoolController::class, 'deleteRegristationExamStudent'])->name('regristationExam-delete');
        // Route::get('teacher-statistic', )
        // Route::get('print-report', )
    });
    //end admin

    //finance
    Route::middleware(['auth', 'role:administration'])->prefix('administration')->name('administration.')->group(function () {
        Route::get('', [AdminitrasionController::class, 'dashFinance'])->name('');
        Route::post('salary-mentor-teacher/create', [AdminitrasionController::class, 'createsalaryMentorTeacher'])->name('salary-mentor.create');

        Route::get('teacher', [AdminitrasionController::class, 'teacher'])->name('teacher.index');
        Route::get('teacher/create', [AdminitrasionController::class, 'createTeacher'])->name('teacher.create');
        Route::get('teacher/{teacher}', [AdminitrasionController::class, 'showTeacher'])->name('teacher.show');
        Route::post('teacher/{teacher}/month', [AdminitrasionController::class, 'getMonth'])->name('teacherMonth.show');

        Route::get('salary-teacher', [AdminitrasionController::class, 'salaryTeacher'])->name('salaryTeacher.index');
        Route::get('salary-teacher/show', [AdminitrasionController::class, 'showSalaryTeacher'])->name('salaryTeacher.show');

        Route::get('mentor', [AdminitrasionController::class, 'mentor'])->name('mentor.index');
        Route::get('mentor/create', [AdminitrasionController::class, 'createMentor'])->name('mentor.create');
        Route::get('mentor/{mentor}', [AdminitrasionController::class, 'showMentor'])->name('mentor.show');
        Route::post('mentor/{mentor}/month', [AdminitrasionController::class, 'getMonthAttendance'])->name('mentorMonth.show');

        Route::get('salary-mentor', [AdminitrasionController::class, 'salaryMentor'])->name('salary-mentor.index');
        Route::get('salary-mentor/show', [AdminitrasionController::class, 'showSalaryMentor'])->name('salary-mentor.show');

        Route::get('dependent/{school}', [DependentController::class, 'index'])->name('dependent.index');
        Route::resource('dependent', DependentController::class)->only('store', 'update');
        Route::resources([
            'tracking' => TrackingPaymentController::class,
            'package' => PackageController::class,
            'schoolPackage' => SchoolPackageController::class,
        ]);

        Route::get('payment-monitoring', [TrackingPaymentController::class, 'paymentMonitoring'])->name('payment-monitoring.index');
        Route::get('payment-monitoring/{classroom}', [TrackingPaymentController::class, 'paymentAllStudent'])->name('payment-student');
        Route::get('payment-monitoring/{classroom}/{user}', [TrackingPaymentController::class, 'monitoringDetailStudent'])->name('payment-detail-student');

        Route::get('individual-package', [PackageController::class, 'indexSchool'])->name('individual-package');


        Route::get('tracking/student-school/{school}', [TrackingPaymentController::class, 'allStudent'])->name('tracking.showStudent');
        Route::get('tracking/student-school/detail/{classroom}/{user}', [TrackingPaymentController::class, 'detailStudent'])->name('tracking.detailStudent');
        Route::post('tracking/student-school/detail/{user}/store', [TrackingPaymentController::class, 'store'])->name('tracking.detailStudent.store');
        Route::put('tracking/student-school/detail/{user}/update', [TrackingPaymentController::class, 'update'])->name('tracking.detailStudent.update');
        Route::get('get-total-dependent/{semester}/{user}', [DependentController::class, 'semester'])->name('total.dependent');

        Route::get('finance', [FinanceController::class, 'get']);
    });
    //end finance

    //schools
    Route::middleware(['auth', 'role:school'])->prefix('school')->name('school.')->group(function () {
        Route::get('/', function () {
            return view('dashboard.admin.layouts.app');
        });

        Route::get('/detailJurnal/{classroom}', [JurnalController::class, 'detailJurnal'])->name('detailJurnal');
        Route::get('/detailJurnal/{classroom}/{journal}', [JurnalController::class, 'detailAttendance'])->name('journal.attendance');

        Route::resource('teachers', TeacherController::class)->only('index');
        Route::resource('students', StudentController::class)->only('index');
        Route::resources([
            'classrooms' => ClassroomController::class,
            'teachers' => TeacherController::class,
            'journal' => JurnalController::class,
            'exam' => ExamController::class,
            'packages' => PackageController::class,
        ]);
        Route::get('/packages/{package}', [PackageController::class, 'getPayment'])->name('packages.getPayment');
        Route::get('/showStudent/{classroom}', [ExamController::class, 'showStudent'])->name('showStudent');

        Route::get('/ranking', [PointController::class, 'index'])->name('rankings');
        //changepwstudent
        Route::get('/filter', [StudentController::class, 'filterStudent'])->name('filterStudent');
        //changepwsteacher
        Route::get('/gantiPasswordGuru/{teacher}', [TeacherController::class, 'ChangePasswordTeacher'])->name('gantiPasswordGuru');
        Route::patch('/updatePasswordGuru/{teacher}', [TeacherController::class, 'updatePasswordGuru'])->name('updatePasswordGuru');
        Route::get('tracking', [TrackingPaymentController::class, 'schoolAllStudent'])->name('tracking.showStudent');
        Route::get('tracking/{classroom}/{user}', [TrackingPaymentController::class, 'schoolDetailStudent'])->name('tracking.detailStudent');
        Route::get('{semester}/{user}', [HomeController::class, 'schoolTrackingSemester'])->name('total.dependent');
    });
    //end schools

    //teacher
    Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
        Route::resources([
            'challenges' => ChallengeController::class,
            'journal' => JurnalController::class,
            'exam' => ExamController::class,
            'saleries' => SalaryController::class,
        ]);
        Route::get('journal/{journal}', [JurnalController::class, 'detailTeacher'])->name('journal.detail');
        Route::get('/showStudent/{classroom}', [ExamController::class, 'showStudent'])->name('showStudent');
        Route::get('/showStudentReport/{classroom}', [ReportController::class, 'showStudent'])->name('showStudentReport');
        Route::get('/showClassroom', [ReportController::class, 'showClassroom'])->name('showClassroom');
        Route::get('/report', [ReportController::class, 'index'])->name('report');
        Route::get('/{classroom}/assignment/{assignment}', [UserAssignmentController::class, 'index'])->name('showAssignment');
        Route::post('/storepoint', [AssignmentController::class, 'storePoint'])->name('storepoint');
        Route::post('validChallengeTeacher/', [ChallengeController::class, 'validChallengeTeacher'])->name('validChallengeTeacher');
        Route::post('storePointAssignment/{submitAssingnment}', [PointController::class, 'storePointAssignment'])->name('storePointAssignment');
        Route::get('downloadAllFile/{classroom}/{assignment}', [UserAssignmentController::class, 'downloadAll'])->name('downloadAll');
        Route::get('downloadFile/{submitAssignment}', [UserAssignmentController::class, 'download'])->name('downloadAssignment');
        Route::get('/showStudentDetail/{student}/{generation}', [UserClassroomController::class, 'showStudentDetail'])->name('showStudentDetail');
        Route::get('/ranking', [PointController::class, 'index'])->name('rankings');
        Route::get('/downloadAllFile/{challenge}', [ChallengeController::class, 'downloadAll'])->name('downloadAllFile');
        Route::get('/downloadFileChallenge/{submitChallenge}', [ChallengeController::class, 'download'])->name('downloadFileChallenge');
        Route::get('submaterial-exam', [SubMaterialExamController::class, 'examTeacher'])->name('submaterialExam.index');
        Route::get('detail-submaterial-exam/{subMaterialExam}', [SubMaterialExamController::class, 'examMentorDetail'])->name('detailSubMaterialExam');
    });
    //end teacher

    //mentor
    Route::middleware(['auth', 'role:mentor'])->prefix('mentor')->name('mentor.')->group(function () {
        Route::resources([
            'challenges' => ChallengeController::class,
            'attendance' => AttendanceController::class,
            'journal' => JurnalController::class,
            'exam' => ExamController::class,
            'saleries' => SalaryController::class,
        ]);

        Route::get('submaterial-exam', [SubMaterialExamController::class, 'examMentor'])->name('submaterialExam.index');
        Route::get('detail-submaterial-exam/{subMaterialExam}', [SubMaterialExamController::class, 'examMentorDetail'])->name('detailSubMaterialExam');
        Route::get('exam-submaterial-assessment/{subMaterialExam}', [SubMaterialExamController::class, 'examMentorAssessment'])->name('examSubMaterialAssessment');

        Route::post('student-sub-material-exam-essay-score/{subMaterialExam}', [StudentSubMaterialExamController::class, 'studentSubMaterialExamEssayScore'])->name('studentSubMaterialExamEssayScore');

        Route::get('/showStudent/{classroom}', [ExamController::class, 'showStudent'])->name('showStudent');

        Route::get('/{classroom}/assignment/{assignment}', [UserAssignmentController::class, 'index'])->name('showAssignment');
        Route::get('/ranking', [PointController::class, 'index'])->name('rankings');
        Route::get('/showStudentDetail/{student}/{generation}', [UserClassroomController::class, 'showStudentDetail'])->name('showStudentDetail');
        Route::post('validChallenge1', [ChallengeController::class, 'validChallenge'])->name('validChallenge');
        Route::get('/showDocument/{submaterial}/{role}', [UserClassroomController::class, 'showDocument'])->name('showDocument');
        Route::get('/downloadAllFile/{challenge}', [ChallengeController::class, 'downloadAll'])->name('downloadAllFile');
        Route::get('/downloadFileChallenge/{submitChallenge}', [ChallengeController::class, 'download'])->name('downloadFileChallenge');
        Route::get('downloadAllFile/{classroom}/{assignment}', [UserAssignmentController::class, 'downloadAll'])->name('downloadAll');
        Route::get('downloadFile/{submitAssignment}', [UserAssignmentController::class, 'download'])->name('downloadAssignment');

        Route::get('student-project/{classroom}', [ProjectController::class, 'studentProject'])->name('studentProject');
        Route::post('approval-student-project/{project}', [ProjectController::class, 'approvalProject'])->name('approvalProject');
        Route::post('reject-student-project/{project}', [ProjectController::class, 'rejectProject'])->name('rejectProject');

        Route::post('approval-student-presentation/{presentation}', [PresentationController::class, 'approvalPresentation'])->name('approvalPresentation');
        Route::post('reject-student-presentation/{presentation}', [PresentationController::class, 'rejectPresentation'])->name('rejectPresentation');

        // set presentation finish
        Route::post('finish-presentation/{projectId}', [PresentationFinishController::class, 'finish'])->name('presentationFinish');
    });
    //end mentor

    //mentor, student, teacher
    Route::name('common.')->group(function () {
        Route::get('/classrooms', [UserClassroomController::class, 'index'])->name('classrooms');
        Route::get('/classrooms/{classroom}', [UserClassroomController::class, 'show'])->name('showClassrooms');
        Route::get('/materials/{classroom}', [UserClassroomController::class, 'materials'])->name('materials');
        Route::get('{classroom}/showMaterial/{material}', [UserClassroomController::class, 'showMaterial'])->name('showMaterial');
        Route::get('{classroom}/showSubMaterial/{material}/{submaterial}', [UserClassroomController::class, 'showSubMaterial'])->name('showSubMaterial');
        Route::get('/showDocument/{submaterial}/{role}', [UserClassroomController::class, 'showDocument'])->name('showDocument');
        Route::get('/detail-student-project/{project}', [ProjectController::class, 'show'])->name('detail-student-project');
        Route::get('schedules/get-all', [ScheduleController::class, 'all'])->name('schedules.all');
    });
    //end mentor, student, teacher

    //student
    Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
        Route::get('/', function () {
            return view('dashboard.user.pages.material.index');
        });
        Route::get('/ranking', [PointController::class, 'index'])->name('rankings')->middleware('checkpayment');
        Route::get('/classrooms', [UserClassroomController::class, 'index'])->name('classrooms')->middleware('checkpayment');
        Route::get('/create', [UserClassroomController::class, 'create'])->name('create');
        Route::get('/classrooms/{classroom}', [UserClassroomController::class, 'show'])->name('showClassrooms');
        Route::get('/materials/{classroom}', [UserClassroomController::class, 'materials'])->name('materials');
        Route::get('/showMaterial/{material}', [UserClassroomController::class, 'showMaterial'])->name('showMaterial');
        Route::get('/showSubMaterial/{submaterial}', [UserClassroomController::class, 'showSubMaterial'])->name('showSubMaterial')->middleware('checkpayment');
        Route::get('/showDocument/{submaterial}/{role}', [UserClassroomController::class, 'showDocument'])->name('showDocument');

        Route::get('/event', [EventController::class, 'studentEvent'])->name('events.index')->middleware('checkpayment');
        Route::get('/schedule', [ScheduleController::class, 'indexStudent'])->name('schedules.index')->middleware('checkpayment');


        Route::get('{classroom}/submitAssignment/{material}/{submaterial}/{assignment}', [UserAssignmentController::class, 'create'])->name('submitAssignment');
        Route::post('{classroom}/storeassignment/{material}/{submaterial}', [UserAssignmentController::class, 'store'])->name('storeassignment');
        Route::post('storeimageassignment/{submitAssignment}', [UserAssignmentController::class, 'storeImage'])->name('store-image-assignment');

        Route::get('submitChallenge/{challenge}', [ChallengeController::class, 'submitChallenge'])->name('submitChallenge');
        Route::post('storeChallenge', [ChallengeController::class, 'storeChallenge'])->name('storeChallenge');
        Route::get('/absen/{attendance}', [AttendanceController::class, 'submit']);

        Route::get('/downloadFileChallenge/{submitChallenge}', [ChallengeController::class, 'download'])->name('downloadChallenge');
        Route::get('downloadFileAssignment/{submitAssignment}', [UserAssignmentController::class, 'download'])->name('downloadAssignment');

        Route::post('submitReward/{reward}', [SubmitRewardController::class, 'submitReward'])->name('submitReward');
        Route::get('historyReward', [RewardController::class, 'historyReward'])->name('historyReward');

        Route::get('student-payment', [StudentPaymentController::class, 'index'])->name('student-payment');
        Route::get('detail-payment/{payment}', [StudentPaymentController::class, 'detail'])->name('detail-payment');
        Route::get('invoice/{reference}', [StudentPaymentController::class, 'invoice'])->name('invoice');
        Route::get('invoice-preview/', [StudentPaymentController::class, 'preview'])->name('preview-invoice');
        Route::get('detail-transaction/{reference}', [StudentPaymentController::class, 'show'])->name('detail-transaction');
        Route::get('payment-channel', [TripayController::class, 'index'])->name('payment-channel');
        Route::post('request-transaction', [TripayController::class, 'store'])->name('request-transaction');

        // student material exam
        Route::get('material-exam/{materialExam}/{type}', [StudentMaterialExamController::class, 'index'])->name('material-exam');
        Route::get('exam/{materialExam}/{studentMaterialExam}/finish', [StudentMaterialExamController::class, 'showFinish'])->name('material-exam.show-finish');

        // student exam
        Route::get('regristation-exam/{subMaterialExam}', [StudentSubmaterialExamController::class, 'regristationExamSetName'])->name('exam-setname');
        Route::get('exam/{subMaterialExam}', [StudentSubmaterialExamController::class, 'index'])->name('exam');
        Route::put('exam/{subMaterialExam}/opentab', [StudentSubmaterialExamController::class, 'openTab'])->name('exam.opentab');
        Route::delete('exam/{subMaterialExam}', [StudentSubmaterialExamController::class, 'reset'])->name('exam.reset');
        Route::patch('exam/{subMaterialExam}/{studentSubmaterialExam}', [StudentSubmaterialExamController::class, 'answer'])->name('exam.submit');
        Route::patch('material-exam/{materialExam}/{studentMaterialExam}', [StudentMaterialExamController::class, 'answer'])->name('material-exam.submit');
        Route::get('exam/{materialExam}/{studentMaterialExam}/finish', [StudentMaterialExamController::class, 'showFinish'])->name('exam.show-finish-exam-material');

        Route::get('events/{event}', [EventController::class, 'show'])->name('events.show');
        Route::post('events/follow/{event}', [EventPartisipantController::class, 'store'])->name('events.follow');
        Route::delete('events/unfollow/{event}', [EventPartisipantController::class, 'destroy'])->name('events.unfollow');
        Route::get('certify/events/{event}/{participant}', [CertifyController::class, 'eventCertify'])->name('events.print-certify');

        Route::resource('challenges', ChallengeController::class)
            ->only(['index', 'show'])->middleware('checkpayment');

        Route::resource('rewards', RewardController::class)
            ->only(['index'])->middleware('checkpayment');

        Route::resources([
            'submitRewards' => SubmitRewardController::class,
            'projects' => ProjectController::class,
            'presentation' => PresentationController::class,
            'notes' => NoteController::class,
            'tasks' => TaskController::class,
        ]);
        Route::get('print-certify', [CertifyController::class, 'exportPdf'])->name('print-certify');

        Route::get('/{semester}/{user}', [HomeController::class, 'semester'])->name('total.dependent');
    });
    //end student

    Route::middleware(['auth', 'role:tester'])->prefix('tester')->name('tester.')->group(function () {
        Route::get('regristation-exam-regulation/{subMaterialExam}', [StudentSubmaterialExamController::class, 'regristationExamRegulation'])->name('exam-regulation');
        Route::get('regristation-exam/{subMaterialExam}', [StudentSubmaterialExamController::class, 'regristationExamSetName'])->name('exam-setname');
        Route::put('regristation-exam/{subMaterialExam}', [StudentSubmaterialExamController::class, 'regristationExamUpdateName'])->name('exam-update-name');
        Route::get('exam/{subMaterialExam}', [StudentSubmaterialExamController::class, 'index'])->name('exam');
        Route::put('exam/{subMaterialExam}/opentab', [StudentSubmaterialExamController::class, 'openTab'])->name('exam.opentab');
        Route::delete('exam/{subMaterialExam}', [StudentSubmaterialExamController::class, 'reset'])->name('exam.reset');
        Route::patch('exam/{subMaterialExam}/{studentSubmaterialExam}', [StudentSubmaterialExamController::class, 'answer'])->name('exam.submit');
        Route::get('exam/{subMaterialExam}/{studentSubmaterialExam}/finish', [StudentSubmaterialExamController::class, 'showFinish'])->name('exam.show-finish');
    });


    // notification
    Route::delete('delete-notification/{id}', [NotificationController::class, 'destroy']);
    Route::delete('delete-all-notification', [NotificationController::class, 'deleteAll'])->name('deleteAllNotification');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::post('callback', [TripayCallbackController::class, 'handle']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('verify/{material}/{classroom}/{user}', [CertifyController::class, 'materialVerify'])->name('material.cerify-certification');
Route::get('verify-competence/{classroom}/{user}', [CertifyController::class, 'competenceTestVerify'])->name('competence-verifycation');

// Route::post('certify/events/', [CertifyController::class, 'eventVerification'])->name('events.verify-certification');
Route::get('certify/events/{participant}/{event}/verification', [CertifyController::class, 'eventVerification'])->name('events.verify-certification');

Route::get('zoom-testing', [ZoomScheduleController::class, 'first']);

Route::get('certifyCompetenceTest/{classroom}', [CertifyController::class, 'certifyCompetenceTest'])->name('certifyCompetenceTest');

require __DIR__ . '/spk.php';
