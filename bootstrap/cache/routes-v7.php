<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yvsze03Sj3QMOIwX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'landingPage',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/event' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gallery' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gallery',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/all-school' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'all-school',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/classroomBySchool' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'classroomBySchool',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xcgahlRKv0dFkPJa',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::09Y5bpBJEqx8h5MS',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QcUxXFZcg7iGBcsb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/absent' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.absent',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/ranking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rankings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.report',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/teacher-statistic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.teacher.statistic.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/studentRegistration' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.studentRegistration',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/studentRegistration/wrongInput' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.wrongInput',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/studentRegistration/updateSchool' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateSchool',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/approve-student-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.approveStudentAll',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/schedules/get-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schedules.all',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/events/school' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.events.schools',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/schoolYears' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schoolYears.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schoolYears.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/schoolYears/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schoolYears.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/generations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.generations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.generations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/generations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.generations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/schools' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schools.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schools.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/schools/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schools.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/materials' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.materials.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.materials.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/materials/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.materials.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/submaterials' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submaterials.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submaterials.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/submaterials/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submaterials.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assignments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.assignments.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.assignments.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/assignments/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.assignments.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/mentors' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.mentors.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.mentors.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/mentors/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.mentors.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/zoomSchedules' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.zoomSchedules.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.zoomSchedules.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/zoomSchedules/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.zoomSchedules.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/journal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.journal.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.journal.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/journal/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.journal.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attendance/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/exam' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/exam/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/saleries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saleries.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saleries.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/saleries/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saleries.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rewards' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rewards.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rewards.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rewards/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rewards.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/submitRewards' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submitRewards.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submitRewards.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/submitRewards/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submitRewards.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/gallerys' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.gallerys.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.gallerys.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/gallerys/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.gallerys.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/administrations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.administrations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.administrations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/administrations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.administrations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/devisions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.devisions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.devisions.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/devisions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.devisions.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/question-bank' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.question-bank.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.question-bank.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/question-bank/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.question-bank.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/schedules' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schedules.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schedules.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/schedules/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schedules.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/events' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.events.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.events.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/events/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.events.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/eventDocumentation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.eventDocumentation.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.eventDocumentation.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/eventDocumentation/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.eventDocumentation.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sub-material-exam' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.sub-material-exam.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.sub-material-exam.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sub-material-exam/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.sub-material-exam.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/exam-taking-place' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam-taking-place',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/detail-exam-taking-place' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.detail-exam-taking-place',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/exam-finnaly' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam-finnaly',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/exam-statistic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam-statistic',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/exam-detail-student' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam-detail-student',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/question-bank-store-essay' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.questionBank.storeEssay',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/saleriesTeacher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saleriesTeacher',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.createSaleriesTeacher',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.storeSaleriesTeacher',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/getTeacherBySchool' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.getTeacherBySchool',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/showSubMaterial' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showSubMaterial',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rolling-mentor' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rollingMentor.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rolling-student' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rollingStudent.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rollingStudent.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/import-students' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.importStudents',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/salary-mentor-teacher/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.salary-mentor.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/teacher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.teacher.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/teacher/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.teacher.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/salary-teacher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.salaryTeacher.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/salary-teacher/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.salaryTeacher.show',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/mentor' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.mentor.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/mentor/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.mentor.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/salary-mentor' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.salary-mentor.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/salary-mentor/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.salary-mentor.show',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/dependent' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.dependent.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/tracking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.tracking.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'administration.tracking.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/tracking/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.tracking.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/package' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.package.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'administration.package.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/package/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.package.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/schoolPackage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.schoolPackage.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'administration.schoolPackage.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/schoolPackage/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.schoolPackage.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/payment-monitoring' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.payment-monitoring.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/individual-package' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.individual-package',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/administration/finance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.generated::5lkAuu2StcPMnxdb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/teachers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.teachers.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'school.teachers.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/students' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.students.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/classrooms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.classrooms.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'school.classrooms.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/classrooms/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.classrooms.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/teachers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.teachers.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/journal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.journal.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'school.journal.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/journal/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.journal.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/exam' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.exam.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'school.exam.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/exam/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.exam.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/packages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.packages.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'school.packages.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/packages/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.packages.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/ranking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.rankings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/filter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.filterStudent',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/school/tracking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.tracking.showStudent',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/challenges' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.challenges.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.challenges.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/challenges/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.challenges.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/journal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.journal.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.journal.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/journal/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.journal.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/exam' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.exam.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.exam.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/exam/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.exam.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/saleries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.saleries.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.saleries.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/saleries/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.saleries.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/showClassroom' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.showClassroom',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.report',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/storepoint' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.storepoint',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/validChallengeTeacher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.validChallengeTeacher',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/teacher/ranking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.rankings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/challenges' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.challenges.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.challenges.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/challenges/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.challenges.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.attendance.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.attendance.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/attendance/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.attendance.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/journal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.journal.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.journal.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/journal/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.journal.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/exam' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.exam.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.exam.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/exam/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.exam.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/saleries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.saleries.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.saleries.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/saleries/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.saleries.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/submaterial-exam' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.submaterialExam.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/detail-submaterial-exam' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.detailSubMaterialExam',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/ranking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.rankings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mentor/validChallenge' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.validChallenge',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/classrooms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'common.classrooms',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/ranking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.rankings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/classrooms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.classrooms',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/event' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.events.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/storeChallenge' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.storeChallenge',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/historyReward' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.historyReward',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/student-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.student-payment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/payment-channel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.payment-channel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/request-transaction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.request-transaction',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/challenges' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.challenges.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/rewards' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.rewards.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/submitRewards' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.submitRewards.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'student.submitRewards.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/submitRewards/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.submitRewards.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/projectf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.projectf.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'student.projectf.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/projectf/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.projectf.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/presentation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.presentation.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'student.presentation.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/presentation/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.presentation.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/notes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.notes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'student.notes.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/notes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.notes.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/tasks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.tasks.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'student.tasks.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/tasks/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.tasks.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/student/print-certify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.print-certify',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/delete-all-notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'deleteAllNotification',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OiDahZKQtlYtslzG',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/zoom-testing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AZTgHNBQ4igt5Rqb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/event/([^/]++)(*:22)|/news/([^/]++)(*:43)|/c(?|ertify/([^/]++)/([^/]++)(*:79)|lassrooms/([^/]++)(*:104))|/p(?|assword/reset/([^/]++)(*:140)|rofile/update\\-p(?|rofile/([^/]++)(*:182)|assword/([^/]++)(*:206)))|/admin(?|/(?|a(?|bsent/([^/]++)(*:247)|pprove\\-student/([^/]++)(*:279)|ssignments/([^/]++)(?|(*:309)|/edit(*:322)|(*:330))|ttendance/([^/]++)(?|(*:360)|/edit(*:373)|(*:381))|dministrations/([^/]++)(?|(*:416)|/edit(*:429)|(*:437)))|de(?|tail(?|Kelas/([^/]++)(*:473)|Siswa/([^/]++)(*:495)|Jurnal/([^/]++)(?|(*:521)|/([^/]++)(*:538)))|visions/([^/]++)(?|(*:567)|/edit(*:580)|(*:588))|lete/([^/]++)(*:610))|c(?|lassrooms/(?|([^/]++)(*:644)|create/([^/]++)(*:667)|store/([^/]++)(*:689)|([^/]++)(?|/([^/]++)(?|/edit(*:725)|(*:733))|(*:742)))|reateExam/([^/]++)(*:770))|teacher(?|\\-statistic/([^/]++)(*:809)|s/(?|create/([^/]++)(*:837)|store/([^/]++)(*:859)|edit/([^/]++)/([^/]++)(*:889)|update/([^/]++)/([^/]++)(*:921)|([^/]++)(*:937)))|s(?|tudents/(?|([^/]++)(*:970)|create/([^/]++)(*:993)|store/([^/]++)(*:1015)|edit/([^/]++)/([^/]++)(*:1046)|update/([^/]++)/([^/]++)(*:1079)|([^/]++)(*:1096))|ch(?|ool(?|Years/([^/]++)(?|(*:1134)|/edit(*:1148)|(*:1157))|s/([^/]++)(?|(*:1180)|/edit(*:1194)|(*:1203)))|edules/([^/]++)(?|(*:1232)|/edit(*:1246)|(*:1255)))|ub(?|m(?|aterial(?|s/(?|([^/]++)(?|(*:1301)|/edit(*:1315)|(*:1324))|assignments/([^/]++)/create(*:1361)|([^/]++)/view/([^/]++)(*:1392))|ExamQuestion/([^/]++)(*:1423))|itRewards/([^/]++)(?|(*:1454)|/edit(*:1468)|(*:1477)))|\\-material\\-exam/([^/]++)(?|(*:1516)|/edit(*:1530)|(*:1539)))|aleries/([^/]++)(?|(*:1569)|/edit(*:1583)|(*:1592))|how(?|Classroom/([^/]++)(*:1626)|Student/([^/]++)(*:1651)|Evaluation/([^/]++)(*:1679)))|g(?|a(?|ntiPassword(?|/([^/]++)/([^/]++)(*:1730)|Mentor/([^/]++)(*:1754)|Guru/([^/]++)(*:1776))|llerys/([^/]++)(?|(*:1804)|/edit(*:1818)|(*:1827)))|enerations/([^/]++)(?|(*:1860)|/edit(*:1874)|(*:1883)))|update(?|Password(?|/([^/]++)/([^/]++)(*:1932)|Mentor/([^/]++)(*:1956)|Guru/([^/]++)(*:1978))|StatusNews/([^/]++)(*:2007)|/([^/]++)(*:2025))|m(?|aterials/([^/]++)(?|(*:2059)|/(?|edit(*:2076)|create(*:2091)|([^/]++)(*:2108))|(*:2118))|entors/([^/]++)(?|(*:2146)|/edit(*:2160)|(*:2169)))|zoomSchedules/([^/]++)(?|(*:2205)|/edit(*:2219)|(*:2228))|journal/([^/]++)(?|(*:2257)|/edit(*:2271)|(*:2280))|e(?|xam(?|/([^/]++)(?|(*:2312)|/edit(*:2326)|(*:2335))|\\-question(?|/([^/]++)(*:2367)|\\-manual/([^/]++)/([^/]++)(*:2402)))|vent(?|s/(?|([^/]++)(?|(*:2436)|/(?|edit(*:2453)|participants(*:2474))|(*:2484))|set\\-certificate/([^/]++)(*:2519))|Documentation/(?|([^/]++)(?|(*:2557)|/edit(*:2571)|(*:2580))|store/([^/]++)(*:2604)))|dit/([^/]++)(*:2627))|r(?|ewards/([^/]++)(?|(*:2659)|/edit(*:2673)|(*:2682))|olling\\-(?|mentor/(?|([^/]++)(*:2721)|get\\-classrooms(*:2745)|action\\-rolling\\-mentor(*:2777)|delete\\-rolling\\-mentor/([^/]++)(*:2818))|teacher/(?|([^/]++)(*:2847)|a(?|ddRollingTeacher/([^/]++)(*:2885)|ction\\-rolling\\-teacher(*:2917))|delete\\-rolling\\-teacher/([^/]++)(*:2960))))|news/([^/]++)(?|(*:2988)|/edit(*:3002)|(*:3011))|que(?|stion\\-bank(?|/([^/]++)(?|(*:3053)|/edit(*:3067)|(*:3076))|\\-(?|m(?|ultiplechoice/([^/]++)(*:3117)|anual/([^/]++)(*:3140))|essay/([^/]++)(*:3164)|auto/([^/]++)(*:3186)))|tion\\-bank(?|s/([^/]++)(*:3220)|\\-detail/([^/]++)(*:3246)))|validStatus/([^/]++)(*:3277))|istration/(?|t(?|eacher/([^/]++)(?|(*:3322)|/month(*:3337))|racking/(?|([^/]++)(?|(*:3369)|/edit(*:3383)|(*:3392))|student\\-school/(?|([^/]++)(*:3429)|detail/([^/]++)/(?|([^/]++)(*:3465)|store(*:3479)|update(*:3494)))))|mentor/([^/]++)(?|(*:3525)|/month(*:3540))|dependent/([^/]++)(?|(*:3571)|(*:3580))|pa(?|ckage/([^/]++)(?|(*:3612)|/edit(*:3626)|(*:3635))|yment\\-monitoring/([^/]++)(?|(*:3674)|/([^/]++)(*:3692)))|schoolPackage/([^/]++)(?|(*:3728)|/edit(*:3742)|(*:3751))|get\\-total\\-dependent/([^/]++)/([^/]++)(*:3800)))|/school/(?|detailJurnal/([^/]++)(*:3843)|classrooms/([^/]++)(?|(*:3874)|/edit(*:3888)|(*:3897))|t(?|eachers/([^/]++)(?|(*:3930)|/edit(*:3944)|(*:3953))|racking/([^/]++)/([^/]++)(*:3988))|journal/([^/]++)(?|(*:4017)|/edit(*:4031)|(*:4040))|exam/([^/]++)(?|(*:4066)|/edit(*:4080)|(*:4089))|packages/([^/]++)(?|(*:4119)|/edit(*:4133)|(*:4142))|showStudent/([^/]++)(*:4172)|gantiPasswordGuru/([^/]++)(*:4207)|updatePasswordGuru/([^/]++)(*:4243)|([^/]++)/([^/]++)(*:4269))|/teacher/(?|challenges/([^/]++)(?|(*:4313)|/edit(*:4327)|(*:4336))|journal/([^/]++)(?|(*:4365)|/edit(*:4379)|(*:4388))|exam/([^/]++)(?|(*:4414)|/edit(*:4428)|(*:4437))|s(?|aleries/([^/]++)(?|(*:4470)|/edit(*:4484)|(*:4493))|howStudent(?|/([^/]++)(*:4525)|Report/([^/]++)(*:4549)))|([^/]++)/assignment/([^/]++)(*:4588)|s(?|torePointAssignment/([^/]++)(*:4629)|howStudentDetail/([^/]++)/([^/]++)(*:4672))|download(?|AllFile/([^/]++)(?|/([^/]++)(*:4721)|(*:4730))|File(?|/([^/]++)(*:4756)|Challenge/([^/]++)(*:4783))))|/m(?|entor/(?|challenges/([^/]++)(?|(*:4831)|/edit(*:4845)|(*:4854))|attendance/([^/]++)(?|(*:4886)|/edit(*:4900)|(*:4909))|journal/([^/]++)(?|(*:4938)|/edit(*:4952)|(*:4961))|exam(?|/([^/]++)(?|(*:4990)|/edit(*:5004)|(*:5013))|\\-submaterial\\-assessment/([^/]++)(*:5057))|s(?|aleries/([^/]++)(?|(*:5090)|/edit(*:5104)|(*:5113))|tudent\\-sub\\-material\\-exam\\-essay\\-score/([^/]++)(*:5173)|howStudent/([^/]++)(*:5201))|([^/]++)/assignment/([^/]++)(*:5239)|s(?|how(?|StudentDetail/([^/]++)/([^/]++)(*:5289)|Document/([^/]++)/([^/]++)(*:5324))|tudent\\-project/([^/]++)(*:5358))|download(?|AllFile/([^/]++)(?|(*:5398)|/([^/]++)(*:5416))|File(?|Challenge/([^/]++)(*:5451)|/([^/]++)(*:5469)))|approval\\-student\\-pr(?|oject/([^/]++)(*:5518)|esentation/([^/]++)(*:5546))|reject\\-student\\-pr(?|oject/([^/]++)(*:5592)|esentation/([^/]++)(*:5620))|finish\\-presentation/([^/]++)(*:5659))|aterials/([^/]++)(*:5686))|/([^/]++)/show(?|Material/([^/]++)(*:5730)|SubMaterial/([^/]++)/([^/]++)(*:5768))|/s(?|howDocument/([^/]++)/([^/]++)(*:5812)|tudent/(?|classrooms/([^/]++)(*:5850)|materials/([^/]++)(*:5877)|show(?|Material/([^/]++)(*:5910)|SubMaterial/([^/]++)(*:5939)|Document/([^/]++)/([^/]++)(*:5974))|([^/]++)/s(?|ubmitAssignment/([^/]++)/([^/]++)/([^/]++)(*:6039)|toreassignment/([^/]++)/([^/]++)(*:6080))|s(?|toreimageassignment/([^/]++)(*:6122)|ubmit(?|Challenge/([^/]++)(*:6157)|Reward(?|/([^/]++)(*:6184)|s/([^/]++)(?|(*:6206)|/edit(*:6220)|(*:6229)))))|absen/([^/]++)(*:6256)|d(?|ownloadFile(?|Challenge/([^/]++)(*:6301)|Assignment/([^/]++)(*:6329))|etail\\-(?|payment/([^/]++)(*:6365)|transaction/([^/]++)(*:6394)))|invoice/([^/]++)(*:6421)|e(?|xam/([^/]++)(?|(*:6449)|/(?|opentab(*:6469)|([^/]++)(?|(*:6489)|/finish(*:6505)))|(*:6516))|vents/(?|([^/]++)(*:6543)|follow/([^/]++)(*:6567)|unfollow/([^/]++)(*:6593)))|c(?|ertify/events/([^/]++)/([^/]++)(*:6639)|hallenges/([^/]++)(*:6666))|pr(?|ojectf/([^/]++)(?|(*:6699)|/edit(*:6713)|(*:6722))|esentation/([^/]++)(?|(*:6754)|/edit(*:6768)|(*:6777)))|notes/([^/]++)(?|(*:6805)|/edit(*:6819)|(*:6828))|tasks/([^/]++)(?|(*:6855)|/edit(*:6869)|(*:6878))|([^/]++)/([^/]++)(*:6905)))|/de(?|tail\\-student\\-project/([^/]++)(*:6953)|lete\\-notification/([^/]++)(*:6989))|/verify/([^/]++)/([^/]++)/([^/]++)(*:7033)|/certify/events/([^/]++)/([^/]++)/verification(*:7088))/?$}sDu',
    ),
    3 => 
    array (
      22 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'detail-events',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      43 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'detail-news',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      79 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'certify',
          ),
          1 => 
          array (
            0 => 'material',
            1 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      104 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'common.showClassrooms',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      140 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      182 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.updatePassword',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      247 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showAbsent',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      279 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.generated::ObfbbrIrUXU8RBTg',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.assignments.show',
          ),
          1 => 
          array (
            0 => 'assignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      322 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.assignments.edit',
          ),
          1 => 
          array (
            0 => 'assignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      330 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.assignments.update',
          ),
          1 => 
          array (
            0 => 'assignment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.assignments.destroy',
          ),
          1 => 
          array (
            0 => 'assignment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      360 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.show',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      373 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.edit',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      381 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.update',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.destroy',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      416 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.administrations.show',
          ),
          1 => 
          array (
            0 => 'administration',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      429 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.administrations.edit',
          ),
          1 => 
          array (
            0 => 'administration',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      437 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.administrations.update',
          ),
          1 => 
          array (
            0 => 'administration',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.administrations.destroy',
          ),
          1 => 
          array (
            0 => 'administration',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      473 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.detailKelas',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      495 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.detailSiswa',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      521 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.detailJurnal',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      538 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.journal.attendance',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'journal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      567 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.devisions.show',
          ),
          1 => 
          array (
            0 => 'devision',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      580 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.devisions.edit',
          ),
          1 => 
          array (
            0 => 'devision',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      588 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.devisions.update',
          ),
          1 => 
          array (
            0 => 'devision',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.devisions.destroy',
          ),
          1 => 
          array (
            0 => 'devision',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      610 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.deleteSaleriesTeacher',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      644 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.classrooms.show',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      667 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.classrooms.create',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      689 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.classrooms.store',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      725 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.classrooms.edit',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      733 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.classrooms.update',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'school',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      742 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.classrooms.destroy',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      770 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.createExam',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      809 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.teacher.statistic.show',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      837 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.teachers.create',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      859 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.teachers.store',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      889 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.teachers.edit',
          ),
          1 => 
          array (
            0 => 'teacher',
            1 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      921 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.teachers.update',
          ),
          1 => 
          array (
            0 => 'teacher',
            1 => 'school',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      937 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.teachers.destroy',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      970 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.students.all',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      993 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.students.create',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1015 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.students.store',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1046 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.students.edit',
          ),
          1 => 
          array (
            0 => 'student',
            1 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1079 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.students.update',
          ),
          1 => 
          array (
            0 => 'student',
            1 => 'school',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1096 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.students.destroy',
          ),
          1 => 
          array (
            0 => 'student',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1134 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schoolYears.show',
          ),
          1 => 
          array (
            0 => 'schoolYear',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1148 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schoolYears.edit',
          ),
          1 => 
          array (
            0 => 'schoolYear',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schoolYears.update',
          ),
          1 => 
          array (
            0 => 'schoolYear',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schoolYears.destroy',
          ),
          1 => 
          array (
            0 => 'schoolYear',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1180 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schools.show',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1194 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schools.edit',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1203 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schools.update',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schools.destroy',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1232 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schedules.show',
          ),
          1 => 
          array (
            0 => 'schedule',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1246 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schedules.edit',
          ),
          1 => 
          array (
            0 => 'schedule',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schedules.update',
          ),
          1 => 
          array (
            0 => 'schedule',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.schedules.destroy',
          ),
          1 => 
          array (
            0 => 'schedule',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1301 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submaterials.show',
          ),
          1 => 
          array (
            0 => 'submaterial',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1315 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submaterials.edit',
          ),
          1 => 
          array (
            0 => 'submaterial',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1324 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submaterials.update',
          ),
          1 => 
          array (
            0 => 'submaterial',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submaterials.destroy',
          ),
          1 => 
          array (
            0 => 'submaterial',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1361 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submaterials.createAssignment',
          ),
          1 => 
          array (
            0 => 'submaterial',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1392 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submaterials.viewMaterial',
          ),
          1 => 
          array (
            0 => 'submaterial',
            1 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1423 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submaterialExamQuestion.destroy',
          ),
          1 => 
          array (
            0 => 'submaterialExamQuestion',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1454 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submitRewards.show',
          ),
          1 => 
          array (
            0 => 'submitReward',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1468 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submitRewards.edit',
          ),
          1 => 
          array (
            0 => 'submitReward',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1477 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submitRewards.update',
          ),
          1 => 
          array (
            0 => 'submitReward',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.submitRewards.destroy',
          ),
          1 => 
          array (
            0 => 'submitReward',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1516 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.sub-material-exam.show',
          ),
          1 => 
          array (
            0 => 'sub_material_exam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1530 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.sub-material-exam.edit',
          ),
          1 => 
          array (
            0 => 'sub_material_exam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1539 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.sub-material-exam.update',
          ),
          1 => 
          array (
            0 => 'sub_material_exam',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.sub-material-exam.destroy',
          ),
          1 => 
          array (
            0 => 'sub_material_exam',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1569 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saleries.show',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1583 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saleries.edit',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1592 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saleries.update',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.saleries.destroy',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1626 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showClassroom',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1651 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showStudent',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1679 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showEvaluation',
          ),
          1 => 
          array (
            0 => 'student',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1730 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.gantiPassword',
          ),
          1 => 
          array (
            0 => 'student',
            1 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1754 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.gantiPasswordMentor',
          ),
          1 => 
          array (
            0 => 'mentor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1776 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.gantiPasswordGuru',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1804 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.gallerys.show',
          ),
          1 => 
          array (
            0 => 'gallery',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1818 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.gallerys.edit',
          ),
          1 => 
          array (
            0 => 'gallery',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1827 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.gallerys.update',
          ),
          1 => 
          array (
            0 => 'gallery',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.gallerys.destroy',
          ),
          1 => 
          array (
            0 => 'gallery',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1860 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.generations.show',
          ),
          1 => 
          array (
            0 => 'generation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1874 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.generations.edit',
          ),
          1 => 
          array (
            0 => 'generation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1883 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.generations.update',
          ),
          1 => 
          array (
            0 => 'generation',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.generations.destroy',
          ),
          1 => 
          array (
            0 => 'generation',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1932 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updatePassword',
          ),
          1 => 
          array (
            0 => 'student',
            1 => 'school',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1956 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updatePasswordMentor',
          ),
          1 => 
          array (
            0 => 'mentor',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1978 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updatePasswordGuru',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2007 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateStatusNews',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2025 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.updateSaleriesTeacher',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2059 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.materials.show',
          ),
          1 => 
          array (
            0 => 'material',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2076 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.materials.edit',
          ),
          1 => 
          array (
            0 => 'material',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2091 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.materials.createSubmaterial',
          ),
          1 => 
          array (
            0 => 'material',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2108 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.materials.editSubmaterial',
          ),
          1 => 
          array (
            0 => 'material',
            1 => 'subMaterial',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2118 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.materials.update',
          ),
          1 => 
          array (
            0 => 'material',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.materials.destroy',
          ),
          1 => 
          array (
            0 => 'material',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2146 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.mentors.show',
          ),
          1 => 
          array (
            0 => 'mentor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2160 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.mentors.edit',
          ),
          1 => 
          array (
            0 => 'mentor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2169 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.mentors.update',
          ),
          1 => 
          array (
            0 => 'mentor',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.mentors.destroy',
          ),
          1 => 
          array (
            0 => 'mentor',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2205 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.zoomSchedules.show',
          ),
          1 => 
          array (
            0 => 'zoomSchedule',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2219 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.zoomSchedules.edit',
          ),
          1 => 
          array (
            0 => 'zoomSchedule',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2228 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.zoomSchedules.update',
          ),
          1 => 
          array (
            0 => 'zoomSchedule',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.zoomSchedules.destroy',
          ),
          1 => 
          array (
            0 => 'zoomSchedule',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2257 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.journal.show',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2271 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.journal.edit',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2280 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.journal.update',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.journal.destroy',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2312 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam.show',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2326 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam.edit',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2335 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam.update',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam.destroy',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2367 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam-question',
          ),
          1 => 
          array (
            0 => 'subMaterialExam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2402 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.exam-question-manual',
          ),
          1 => 
          array (
            0 => 'submaterial',
            1 => 'submaterialExam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.events.show',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2453 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.events.edit',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2474 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.events.participants',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2484 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.events.update',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.events.destroy',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2519 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.eventsParticipant.setCertificate',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2557 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.eventDocumentation.show',
          ),
          1 => 
          array (
            0 => 'eventDocumentation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2571 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.eventDocumentation.edit',
          ),
          1 => 
          array (
            0 => 'eventDocumentation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2580 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.eventDocumentation.update',
          ),
          1 => 
          array (
            0 => 'eventDocumentation',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.eventDocumentation.destroy',
          ),
          1 => 
          array (
            0 => 'eventDocumentation',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2604 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.eventDocumentation.store-img',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2627 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editSaleriesTeacher',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2659 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rewards.show',
          ),
          1 => 
          array (
            0 => 'reward',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2673 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rewards.edit',
          ),
          1 => 
          array (
            0 => 'reward',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2682 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rewards.update',
          ),
          1 => 
          array (
            0 => 'reward',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rewards.destroy',
          ),
          1 => 
          array (
            0 => 'reward',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2721 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rollingMentor.add',
          ),
          1 => 
          array (
            0 => 'mentor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2745 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rollingMentor.getClassrooms',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2777 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rollingMentor.actionRollingMentor',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2818 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rollingMentor.deleteRollingMentor',
          ),
          1 => 
          array (
            0 => 'mentorClassroom',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2847 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rollingTeacher.index',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2885 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rollingTeacher.add',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2917 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rollingTeacher.actionRollingTeacher',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2960 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rollingTeacher.deleteRollingTeacher',
          ),
          1 => 
          array (
            0 => 'teacherClassroom',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2988 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.show',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3002 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.edit',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3011 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.update',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.destroy',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3053 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.question-bank.show',
          ),
          1 => 
          array (
            0 => 'question_bank',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3067 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.question-bank.edit',
          ),
          1 => 
          array (
            0 => 'question_bank',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3076 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.question-bank.update',
          ),
          1 => 
          array (
            0 => 'question_bank',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.question-bank.destroy',
          ),
          1 => 
          array (
            0 => 'question_bank',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3117 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.question-bank-multiplechoice',
          ),
          1 => 
          array (
            0 => 'submaterial',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3140 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.questionBank.manual',
          ),
          1 => 
          array (
            0 => 'submaterialExam',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3164 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.question-bank-essay',
          ),
          1 => 
          array (
            0 => 'submaterial',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3186 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.questionBank.auto',
          ),
          1 => 
          array (
            0 => 'submaterialExam',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3220 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.questionBank',
          ),
          1 => 
          array (
            0 => 'material',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3246 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.quetion-bank-detail',
          ),
          1 => 
          array (
            0 => 'submaterial',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3277 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.validStatus',
          ),
          1 => 
          array (
            0 => 'submitReward',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3322 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.teacher.show',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3337 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.teacherMonth.show',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3369 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.tracking.show',
          ),
          1 => 
          array (
            0 => 'tracking',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3383 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.tracking.edit',
          ),
          1 => 
          array (
            0 => 'tracking',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3392 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.tracking.update',
          ),
          1 => 
          array (
            0 => 'tracking',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'administration.tracking.destroy',
          ),
          1 => 
          array (
            0 => 'tracking',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3429 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.tracking.showStudent',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3465 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.tracking.detailStudent',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3479 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.tracking.detailStudent.store',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3494 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.tracking.detailStudent.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3525 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.mentor.show',
          ),
          1 => 
          array (
            0 => 'mentor',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3540 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.mentorMonth.show',
          ),
          1 => 
          array (
            0 => 'mentor',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3571 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.dependent.index',
          ),
          1 => 
          array (
            0 => 'school',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3580 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.dependent.update',
          ),
          1 => 
          array (
            0 => 'dependent',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3612 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.package.show',
          ),
          1 => 
          array (
            0 => 'package',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3626 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.package.edit',
          ),
          1 => 
          array (
            0 => 'package',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3635 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.package.update',
          ),
          1 => 
          array (
            0 => 'package',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'administration.package.destroy',
          ),
          1 => 
          array (
            0 => 'package',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3674 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.payment-student',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3692 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.payment-detail-student',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3728 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.schoolPackage.show',
          ),
          1 => 
          array (
            0 => 'schoolPackage',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3742 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.schoolPackage.edit',
          ),
          1 => 
          array (
            0 => 'schoolPackage',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3751 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.schoolPackage.update',
          ),
          1 => 
          array (
            0 => 'schoolPackage',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'administration.schoolPackage.destroy',
          ),
          1 => 
          array (
            0 => 'schoolPackage',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3800 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.total.dependent',
          ),
          1 => 
          array (
            0 => 'semester',
            1 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3843 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.detailJurnal',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3874 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.classrooms.show',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3888 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.classrooms.edit',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3897 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.classrooms.update',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'school.classrooms.destroy',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3930 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.teachers.show',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3944 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.teachers.edit',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3953 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.teachers.update',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'school.teachers.destroy',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3988 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.tracking.detailStudent',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4017 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.journal.show',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4031 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.journal.edit',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4040 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.journal.update',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'school.journal.destroy',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4066 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.exam.show',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4080 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.exam.edit',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4089 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.exam.update',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'school.exam.destroy',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4119 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.packages.getPayment',
          ),
          1 => 
          array (
            0 => 'package',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4133 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.packages.edit',
          ),
          1 => 
          array (
            0 => 'package',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4142 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.packages.update',
          ),
          1 => 
          array (
            0 => 'package',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'school.packages.destroy',
          ),
          1 => 
          array (
            0 => 'package',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4172 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.showStudent',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4207 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.gantiPasswordGuru',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4243 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.updatePasswordGuru',
          ),
          1 => 
          array (
            0 => 'teacher',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4269 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'school.total.dependent',
          ),
          1 => 
          array (
            0 => 'semester',
            1 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4313 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.challenges.show',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4327 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.challenges.edit',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4336 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.challenges.update',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.challenges.destroy',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4365 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.journal.detail',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4379 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.journal.edit',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4388 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.journal.update',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.journal.destroy',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4414 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.exam.show',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4428 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.exam.edit',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4437 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.exam.update',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.exam.destroy',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4470 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.saleries.show',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4484 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.saleries.edit',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4493 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.saleries.update',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.saleries.destroy',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4525 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.showStudent',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4549 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.showStudentReport',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4588 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.showAssignment',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'assignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4629 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.storePointAssignment',
          ),
          1 => 
          array (
            0 => 'submitAssingnment',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4672 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.showStudentDetail',
          ),
          1 => 
          array (
            0 => 'student',
            1 => 'generation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4721 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.downloadAll',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'assignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4730 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.downloadAllFile',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4756 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.downloadAssignment',
          ),
          1 => 
          array (
            0 => 'submitAssignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4783 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'teacher.downloadFileChallenge',
          ),
          1 => 
          array (
            0 => 'submitChallenge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4831 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.challenges.show',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4845 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.challenges.edit',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4854 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.challenges.update',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.challenges.destroy',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4886 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.attendance.show',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4900 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.attendance.edit',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4909 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.attendance.update',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.attendance.destroy',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4938 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.journal.show',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4952 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.journal.edit',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4961 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.journal.update',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.journal.destroy',
          ),
          1 => 
          array (
            0 => 'journal',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4990 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.exam.show',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5004 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.exam.edit',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      5013 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.exam.update',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.exam.destroy',
          ),
          1 => 
          array (
            0 => 'exam',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5057 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.examSubMaterialAssessment',
          ),
          1 => 
          array (
            0 => 'subMaterialExam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5090 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.saleries.show',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5104 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.saleries.edit',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      5113 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.saleries.update',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.saleries.destroy',
          ),
          1 => 
          array (
            0 => 'salery',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5173 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.studentSubMaterialExamEssayScore',
          ),
          1 => 
          array (
            0 => 'subMaterialExam',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5201 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.showStudent',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5239 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.showAssignment',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'assignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5289 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.showStudentDetail',
          ),
          1 => 
          array (
            0 => 'student',
            1 => 'generation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5324 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.showDocument',
          ),
          1 => 
          array (
            0 => 'submaterial',
            1 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5358 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.studentProject',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5398 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.downloadAllFile',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5416 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.downloadAll',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'assignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5451 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.downloadFileChallenge',
          ),
          1 => 
          array (
            0 => 'submitChallenge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5469 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.downloadAssignment',
          ),
          1 => 
          array (
            0 => 'submitAssignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5518 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.approvalProject',
          ),
          1 => 
          array (
            0 => 'project',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5546 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.approvalPresentation',
          ),
          1 => 
          array (
            0 => 'presentation',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5592 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.rejectProject',
          ),
          1 => 
          array (
            0 => 'project',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5620 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.rejectPresentation',
          ),
          1 => 
          array (
            0 => 'presentation',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5659 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mentor.presentationFinish',
          ),
          1 => 
          array (
            0 => 'projectId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5686 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'common.materials',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5730 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'common.showMaterial',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'material',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5768 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'common.showSubMaterial',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'material',
            2 => 'submaterial',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5812 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'common.showDocument',
          ),
          1 => 
          array (
            0 => 'submaterial',
            1 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5850 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.showClassrooms',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5877 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.materials',
          ),
          1 => 
          array (
            0 => 'classroom',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5910 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.showMaterial',
          ),
          1 => 
          array (
            0 => 'material',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5939 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.showSubMaterial',
          ),
          1 => 
          array (
            0 => 'submaterial',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      5974 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.showDocument',
          ),
          1 => 
          array (
            0 => 'submaterial',
            1 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6039 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.submitAssignment',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'material',
            2 => 'submaterial',
            3 => 'assignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6080 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.storeassignment',
          ),
          1 => 
          array (
            0 => 'classroom',
            1 => 'material',
            2 => 'submaterial',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6122 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.store-image-assignment',
          ),
          1 => 
          array (
            0 => 'submitAssignment',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.submitChallenge',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6184 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.submitReward',
          ),
          1 => 
          array (
            0 => 'reward',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.submitRewards.show',
          ),
          1 => 
          array (
            0 => 'submitReward',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6220 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.submitRewards.edit',
          ),
          1 => 
          array (
            0 => 'submitReward',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      6229 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.submitRewards.update',
          ),
          1 => 
          array (
            0 => 'submitReward',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'student.submitRewards.destroy',
          ),
          1 => 
          array (
            0 => 'submitReward',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6256 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.generated::iVT0AG5FB0vQVBu7',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6301 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.downloadChallenge',
          ),
          1 => 
          array (
            0 => 'submitChallenge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6329 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.downloadAssignment',
          ),
          1 => 
          array (
            0 => 'submitAssignment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6365 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.detail-payment',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6394 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.detail-transaction',
          ),
          1 => 
          array (
            0 => 'reference',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6421 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.invoice',
          ),
          1 => 
          array (
            0 => 'reference',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6449 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.exam',
          ),
          1 => 
          array (
            0 => 'subMaterialExam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6469 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.exam.opentab',
          ),
          1 => 
          array (
            0 => 'subMaterialExam',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      6489 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.exam.submit',
          ),
          1 => 
          array (
            0 => 'subMaterialExam',
            1 => 'studentSubmaterialExam',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6505 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.exam.show-finish',
          ),
          1 => 
          array (
            0 => 'subMaterialExam',
            1 => 'studentSubmaterialExam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      6516 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.exam.reset',
          ),
          1 => 
          array (
            0 => 'subMaterialExam',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6543 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.events.show',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6567 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.events.follow',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6593 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.events.unfollow',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6639 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.events.print-certify',
          ),
          1 => 
          array (
            0 => 'event',
            1 => 'participant',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6666 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.challenges.show',
          ),
          1 => 
          array (
            0 => 'challenge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6699 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.projectf.show',
          ),
          1 => 
          array (
            0 => 'projectf',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6713 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.projectf.edit',
          ),
          1 => 
          array (
            0 => 'projectf',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      6722 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.projectf.update',
          ),
          1 => 
          array (
            0 => 'projectf',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'student.projectf.destroy',
          ),
          1 => 
          array (
            0 => 'projectf',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6754 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.presentation.show',
          ),
          1 => 
          array (
            0 => 'presentation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6768 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.presentation.edit',
          ),
          1 => 
          array (
            0 => 'presentation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      6777 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.presentation.update',
          ),
          1 => 
          array (
            0 => 'presentation',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'student.presentation.destroy',
          ),
          1 => 
          array (
            0 => 'presentation',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6805 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.notes.show',
          ),
          1 => 
          array (
            0 => 'note',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6819 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.notes.edit',
          ),
          1 => 
          array (
            0 => 'note',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      6828 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.notes.update',
          ),
          1 => 
          array (
            0 => 'note',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'student.notes.destroy',
          ),
          1 => 
          array (
            0 => 'note',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6855 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.tasks.show',
          ),
          1 => 
          array (
            0 => 'task',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6869 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.tasks.edit',
          ),
          1 => 
          array (
            0 => 'task',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      6878 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.tasks.update',
          ),
          1 => 
          array (
            0 => 'task',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'student.tasks.destroy',
          ),
          1 => 
          array (
            0 => 'task',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6905 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'student.total.dependent',
          ),
          1 => 
          array (
            0 => 'semester',
            1 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6953 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'common.detail-student-project',
          ),
          1 => 
          array (
            0 => 'project',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      6989 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5eSt7aQhJLMw5oeJ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7033 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.cerify-certification',
          ),
          1 => 
          array (
            0 => 'material',
            1 => 'classroom',
            2 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      7088 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'events.verify-certification',
          ),
          1 => 
          array (
            0 => 'participant',
            1 => 'event',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yvsze03Sj3QMOIwX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e100000000000000000";}";s:4:"hash";s:44:"99gVNntMK5wBD3OQg9FlCEWaYj5blnabadlfwPkqIy4=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::yvsze03Sj3QMOIwX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'landingPage' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WelcomeController@index',
        'controller' => 'App\\Http\\Controllers\\WelcomeController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'landingPage',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'event' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'event',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WelcomeController@event',
        'controller' => 'App\\Http\\Controllers\\WelcomeController@event',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'event',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'detail-events' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'event/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WelcomeController@eventDetail',
        'controller' => 'App\\Http\\Controllers\\WelcomeController@eventDetail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'detail-events',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gallery' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gallery',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WelcomeController@gallery',
        'controller' => 'App\\Http\\Controllers\\WelcomeController@gallery',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'gallery',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WelcomeController@news',
        'controller' => 'App\\Http\\Controllers\\WelcomeController@news',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'detail-news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'news/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WelcomeController@detail',
        'controller' => 'App\\Http\\Controllers\\WelcomeController@detail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'detail-news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'certify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'certify/{material}/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CertifyController@certify',
        'controller' => 'App\\Http\\Controllers\\CertifyController@certify',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'certify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'all-school' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'all-school',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SchoolController@school',
        'controller' => 'App\\Http\\Controllers\\SchoolController@school',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'all-school',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'classroomBySchool' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'classroomBySchool',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ClassroomController@classroom',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@classroom',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'classroomBySchool',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xcgahlRKv0dFkPJa' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::xcgahlRKv0dFkPJa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::09Y5bpBJEqx8h5MS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::09Y5bpBJEqx8h5MS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QcUxXFZcg7iGBcsb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::QcUxXFZcg7iGBcsb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfileController@edit',
        'controller' => 'App\\Http\\Controllers\\ProfileController@edit',
        'as' => 'profile.index',
        'namespace' => NULL,
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'profile/update-profile/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfileController@update',
        'controller' => 'App\\Http\\Controllers\\ProfileController@update',
        'as' => 'profile.update',
        'namespace' => NULL,
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.updatePassword' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'profile/update-password/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfileController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\ProfileController@updatePassword',
        'as' => 'profile.updatePassword',
        'namespace' => NULL,
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:298:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:80:"function () {
            return \\view(\'dashboard.admin.layouts.app\');
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e2d0000000000000000";}";s:4:"hash";s:44:"sP0YnQ+GuiVAO/CoDOQETUY1ATvwIeIgXN12FxoO/gs=";}}',
        'as' => 'admin.',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.absent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/absent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@index',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@index',
        'as' => 'admin.absent',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showAbsent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/absent/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@show',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@show',
        'as' => 'admin.showAbsent',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rankings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/ranking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\PointController@index',
        'controller' => 'App\\Http\\Controllers\\PointController@index',
        'as' => 'admin.rankings',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.report' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@index',
        'controller' => 'App\\Http\\Controllers\\ReportController@index',
        'as' => 'admin.report',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.detailKelas' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/detailKelas/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@show',
        'controller' => 'App\\Http\\Controllers\\ReportController@show',
        'as' => 'admin.detailKelas',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.detailSiswa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/detailSiswa/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@detail',
        'controller' => 'App\\Http\\Controllers\\ReportController@detail',
        'as' => 'admin.detailSiswa',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.classrooms.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/classrooms/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.classrooms.show',
        'uses' => 'App\\Http\\Controllers\\ClassroomController@show',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.detailJurnal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/detailJurnal/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@detailJurnal',
        'controller' => 'App\\Http\\Controllers\\JurnalController@detailJurnal',
        'as' => 'admin.detailJurnal',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.journal.attendance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/detailJurnal/{classroom}/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@detailAttendance',
        'controller' => 'App\\Http\\Controllers\\JurnalController@detailAttendance',
        'as' => 'admin.journal.attendance',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.teacher.statistic.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/teacher-statistic',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherStatisticController@index',
        'controller' => 'App\\Http\\Controllers\\TeacherStatisticController@index',
        'as' => 'admin.teacher.statistic.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.teacher.statistic.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/teacher-statistic/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherStatisticController@show',
        'controller' => 'App\\Http\\Controllers\\TeacherStatisticController@show',
        'as' => 'admin.teacher.statistic.show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.studentRegistration' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/studentRegistration',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ApprovalController@studentRegistration',
        'controller' => 'App\\Http\\Controllers\\ApprovalController@studentRegistration',
        'as' => 'admin.studentRegistration',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.wrongInput' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/studentRegistration/wrongInput',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ApprovalController@wrongInput',
        'controller' => 'App\\Http\\Controllers\\ApprovalController@wrongInput',
        'as' => 'admin.wrongInput',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateSchool' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/studentRegistration/updateSchool',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ApprovalController@updateSchool',
        'controller' => 'App\\Http\\Controllers\\ApprovalController@updateSchool',
        'as' => 'admin.updateSchool',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.approveStudentAll' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/approve-student-all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ApprovalController@approveAll',
        'controller' => 'App\\Http\\Controllers\\ApprovalController@approveAll',
        'as' => 'admin.approveStudentAll',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.generated::ObfbbrIrUXU8RBTg' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/approve-student/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ApprovalController@approve',
        'controller' => 'App\\Http\\Controllers\\ApprovalController@approve',
        'as' => 'admin.generated::ObfbbrIrUXU8RBTg',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.classrooms.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/classrooms/create/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ClassroomController@create',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@create',
        'as' => 'admin.classrooms.create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.classrooms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/classrooms/store/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ClassroomController@store',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@store',
        'as' => 'admin.classrooms.store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.classrooms.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/classrooms/{classroom}/{school}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ClassroomController@edit',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@edit',
        'as' => 'admin.classrooms.edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.classrooms.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/classrooms/{classroom}/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ClassroomController@update',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@update',
        'as' => 'admin.classrooms.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.classrooms.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/classrooms/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ClassroomController@destroy',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@destroy',
        'as' => 'admin.classrooms.destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.teachers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/teachers/create/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@create',
        'controller' => 'App\\Http\\Controllers\\TeacherController@create',
        'as' => 'admin.teachers.create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.teachers.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/teachers/store/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@store',
        'controller' => 'App\\Http\\Controllers\\TeacherController@store',
        'as' => 'admin.teachers.store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.teachers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/teachers/edit/{teacher}/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@edit',
        'controller' => 'App\\Http\\Controllers\\TeacherController@edit',
        'as' => 'admin.teachers.edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.teachers.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/teachers/update/{teacher}/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@update',
        'controller' => 'App\\Http\\Controllers\\TeacherController@update',
        'as' => 'admin.teachers.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.teachers.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/teachers/{teacher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.teachers.destroy',
        'uses' => 'App\\Http\\Controllers\\TeacherController@destroy',
        'controller' => 'App\\Http\\Controllers\\TeacherController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.students.all' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/students/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SchoolController@students',
        'controller' => 'App\\Http\\Controllers\\SchoolController@students',
        'as' => 'admin.students.all',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.students.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/students/create/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentController@create',
        'controller' => 'App\\Http\\Controllers\\StudentController@create',
        'as' => 'admin.students.create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.students.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/students/store/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentController@store',
        'controller' => 'App\\Http\\Controllers\\StudentController@store',
        'as' => 'admin.students.store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.students.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/students/edit/{student}/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentController@edit',
        'controller' => 'App\\Http\\Controllers\\StudentController@edit',
        'as' => 'admin.students.edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.students.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/students/update/{student}/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentController@update',
        'controller' => 'App\\Http\\Controllers\\StudentController@update',
        'as' => 'admin.students.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.students.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/students/{student}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.students.destroy',
        'uses' => 'App\\Http\\Controllers\\StudentController@destroy',
        'controller' => 'App\\Http\\Controllers\\StudentController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.gantiPassword' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/gantiPassword/{student}/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentController@ChangePassword',
        'controller' => 'App\\Http\\Controllers\\StudentController@ChangePassword',
        'as' => 'admin.gantiPassword',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updatePassword' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/updatePassword/{student}/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\StudentController@updatePassword',
        'as' => 'admin.updatePassword',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schedules.all' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schedules/get-all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ScheduleController@all',
        'controller' => 'App\\Http\\Controllers\\ScheduleController@all',
        'as' => 'admin.schedules.all',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.events.schools' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/events/school',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\EventController@showSchools',
        'controller' => 'App\\Http\\Controllers\\EventController@showSchools',
        'as' => 'admin.events.schools',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schoolYears.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schoolYears',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schoolYears.index',
        'uses' => 'App\\Http\\Controllers\\SchoolYearController@index',
        'controller' => 'App\\Http\\Controllers\\SchoolYearController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schoolYears.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schoolYears/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schoolYears.create',
        'uses' => 'App\\Http\\Controllers\\SchoolYearController@create',
        'controller' => 'App\\Http\\Controllers\\SchoolYearController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schoolYears.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/schoolYears',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schoolYears.store',
        'uses' => 'App\\Http\\Controllers\\SchoolYearController@store',
        'controller' => 'App\\Http\\Controllers\\SchoolYearController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schoolYears.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schoolYears/{schoolYear}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schoolYears.show',
        'uses' => 'App\\Http\\Controllers\\SchoolYearController@show',
        'controller' => 'App\\Http\\Controllers\\SchoolYearController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schoolYears.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schoolYears/{schoolYear}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schoolYears.edit',
        'uses' => 'App\\Http\\Controllers\\SchoolYearController@edit',
        'controller' => 'App\\Http\\Controllers\\SchoolYearController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schoolYears.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/schoolYears/{schoolYear}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schoolYears.update',
        'uses' => 'App\\Http\\Controllers\\SchoolYearController@update',
        'controller' => 'App\\Http\\Controllers\\SchoolYearController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schoolYears.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/schoolYears/{schoolYear}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schoolYears.destroy',
        'uses' => 'App\\Http\\Controllers\\SchoolYearController@destroy',
        'controller' => 'App\\Http\\Controllers\\SchoolYearController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.generations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/generations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.generations.index',
        'uses' => 'App\\Http\\Controllers\\GenerationController@index',
        'controller' => 'App\\Http\\Controllers\\GenerationController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.generations.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/generations/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.generations.create',
        'uses' => 'App\\Http\\Controllers\\GenerationController@create',
        'controller' => 'App\\Http\\Controllers\\GenerationController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.generations.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/generations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.generations.store',
        'uses' => 'App\\Http\\Controllers\\GenerationController@store',
        'controller' => 'App\\Http\\Controllers\\GenerationController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.generations.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/generations/{generation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.generations.show',
        'uses' => 'App\\Http\\Controllers\\GenerationController@show',
        'controller' => 'App\\Http\\Controllers\\GenerationController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.generations.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/generations/{generation}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.generations.edit',
        'uses' => 'App\\Http\\Controllers\\GenerationController@edit',
        'controller' => 'App\\Http\\Controllers\\GenerationController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.generations.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/generations/{generation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.generations.update',
        'uses' => 'App\\Http\\Controllers\\GenerationController@update',
        'controller' => 'App\\Http\\Controllers\\GenerationController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.generations.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/generations/{generation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.generations.destroy',
        'uses' => 'App\\Http\\Controllers\\GenerationController@destroy',
        'controller' => 'App\\Http\\Controllers\\GenerationController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schools.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schools',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schools.index',
        'uses' => 'App\\Http\\Controllers\\SchoolController@index',
        'controller' => 'App\\Http\\Controllers\\SchoolController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schools.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schools/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schools.create',
        'uses' => 'App\\Http\\Controllers\\SchoolController@create',
        'controller' => 'App\\Http\\Controllers\\SchoolController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schools.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/schools',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schools.store',
        'uses' => 'App\\Http\\Controllers\\SchoolController@store',
        'controller' => 'App\\Http\\Controllers\\SchoolController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schools.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schools/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schools.show',
        'uses' => 'App\\Http\\Controllers\\SchoolController@show',
        'controller' => 'App\\Http\\Controllers\\SchoolController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schools.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schools/{school}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schools.edit',
        'uses' => 'App\\Http\\Controllers\\SchoolController@edit',
        'controller' => 'App\\Http\\Controllers\\SchoolController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schools.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/schools/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schools.update',
        'uses' => 'App\\Http\\Controllers\\SchoolController@update',
        'controller' => 'App\\Http\\Controllers\\SchoolController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schools.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/schools/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schools.destroy',
        'uses' => 'App\\Http\\Controllers\\SchoolController@destroy',
        'controller' => 'App\\Http\\Controllers\\SchoolController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.materials.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/materials',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.materials.index',
        'uses' => 'App\\Http\\Controllers\\MaterialController@index',
        'controller' => 'App\\Http\\Controllers\\MaterialController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.materials.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/materials/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.materials.create',
        'uses' => 'App\\Http\\Controllers\\MaterialController@create',
        'controller' => 'App\\Http\\Controllers\\MaterialController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.materials.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/materials',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.materials.store',
        'uses' => 'App\\Http\\Controllers\\MaterialController@store',
        'controller' => 'App\\Http\\Controllers\\MaterialController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.materials.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/materials/{material}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.materials.show',
        'uses' => 'App\\Http\\Controllers\\MaterialController@show',
        'controller' => 'App\\Http\\Controllers\\MaterialController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.materials.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/materials/{material}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.materials.edit',
        'uses' => 'App\\Http\\Controllers\\MaterialController@edit',
        'controller' => 'App\\Http\\Controllers\\MaterialController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.materials.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/materials/{material}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.materials.update',
        'uses' => 'App\\Http\\Controllers\\MaterialController@update',
        'controller' => 'App\\Http\\Controllers\\MaterialController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.materials.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/materials/{material}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.materials.destroy',
        'uses' => 'App\\Http\\Controllers\\MaterialController@destroy',
        'controller' => 'App\\Http\\Controllers\\MaterialController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submaterials.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/submaterials',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submaterials.index',
        'uses' => 'App\\Http\\Controllers\\SubMaterialController@index',
        'controller' => 'App\\Http\\Controllers\\SubMaterialController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submaterials.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/submaterials/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submaterials.create',
        'uses' => 'App\\Http\\Controllers\\SubMaterialController@create',
        'controller' => 'App\\Http\\Controllers\\SubMaterialController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submaterials.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/submaterials',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submaterials.store',
        'uses' => 'App\\Http\\Controllers\\SubMaterialController@store',
        'controller' => 'App\\Http\\Controllers\\SubMaterialController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submaterials.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/submaterials/{submaterial}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submaterials.show',
        'uses' => 'App\\Http\\Controllers\\SubMaterialController@show',
        'controller' => 'App\\Http\\Controllers\\SubMaterialController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submaterials.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/submaterials/{submaterial}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submaterials.edit',
        'uses' => 'App\\Http\\Controllers\\SubMaterialController@edit',
        'controller' => 'App\\Http\\Controllers\\SubMaterialController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submaterials.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/submaterials/{submaterial}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submaterials.update',
        'uses' => 'App\\Http\\Controllers\\SubMaterialController@update',
        'controller' => 'App\\Http\\Controllers\\SubMaterialController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submaterials.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/submaterials/{submaterial}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submaterials.destroy',
        'uses' => 'App\\Http\\Controllers\\SubMaterialController@destroy',
        'controller' => 'App\\Http\\Controllers\\SubMaterialController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.assignments.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/assignments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.assignments.index',
        'uses' => 'App\\Http\\Controllers\\AssignmentController@index',
        'controller' => 'App\\Http\\Controllers\\AssignmentController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.assignments.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/assignments/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.assignments.create',
        'uses' => 'App\\Http\\Controllers\\AssignmentController@create',
        'controller' => 'App\\Http\\Controllers\\AssignmentController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.assignments.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/assignments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.assignments.store',
        'uses' => 'App\\Http\\Controllers\\AssignmentController@store',
        'controller' => 'App\\Http\\Controllers\\AssignmentController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.assignments.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/assignments/{assignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.assignments.show',
        'uses' => 'App\\Http\\Controllers\\AssignmentController@show',
        'controller' => 'App\\Http\\Controllers\\AssignmentController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.assignments.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/assignments/{assignment}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.assignments.edit',
        'uses' => 'App\\Http\\Controllers\\AssignmentController@edit',
        'controller' => 'App\\Http\\Controllers\\AssignmentController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.assignments.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/assignments/{assignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.assignments.update',
        'uses' => 'App\\Http\\Controllers\\AssignmentController@update',
        'controller' => 'App\\Http\\Controllers\\AssignmentController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.assignments.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/assignments/{assignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.assignments.destroy',
        'uses' => 'App\\Http\\Controllers\\AssignmentController@destroy',
        'controller' => 'App\\Http\\Controllers\\AssignmentController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.mentors.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/mentors',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.mentors.index',
        'uses' => 'App\\Http\\Controllers\\MentorController@index',
        'controller' => 'App\\Http\\Controllers\\MentorController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.mentors.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/mentors/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.mentors.create',
        'uses' => 'App\\Http\\Controllers\\MentorController@create',
        'controller' => 'App\\Http\\Controllers\\MentorController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.mentors.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/mentors',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.mentors.store',
        'uses' => 'App\\Http\\Controllers\\MentorController@store',
        'controller' => 'App\\Http\\Controllers\\MentorController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.mentors.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/mentors/{mentor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.mentors.show',
        'uses' => 'App\\Http\\Controllers\\MentorController@show',
        'controller' => 'App\\Http\\Controllers\\MentorController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.mentors.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/mentors/{mentor}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.mentors.edit',
        'uses' => 'App\\Http\\Controllers\\MentorController@edit',
        'controller' => 'App\\Http\\Controllers\\MentorController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.mentors.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/mentors/{mentor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.mentors.update',
        'uses' => 'App\\Http\\Controllers\\MentorController@update',
        'controller' => 'App\\Http\\Controllers\\MentorController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.mentors.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/mentors/{mentor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.mentors.destroy',
        'uses' => 'App\\Http\\Controllers\\MentorController@destroy',
        'controller' => 'App\\Http\\Controllers\\MentorController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.zoomSchedules.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/zoomSchedules',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.zoomSchedules.index',
        'uses' => 'App\\Http\\Controllers\\ZoomScheduleController@index',
        'controller' => 'App\\Http\\Controllers\\ZoomScheduleController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.zoomSchedules.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/zoomSchedules/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.zoomSchedules.create',
        'uses' => 'App\\Http\\Controllers\\ZoomScheduleController@create',
        'controller' => 'App\\Http\\Controllers\\ZoomScheduleController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.zoomSchedules.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/zoomSchedules',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.zoomSchedules.store',
        'uses' => 'App\\Http\\Controllers\\ZoomScheduleController@store',
        'controller' => 'App\\Http\\Controllers\\ZoomScheduleController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.zoomSchedules.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/zoomSchedules/{zoomSchedule}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.zoomSchedules.show',
        'uses' => 'App\\Http\\Controllers\\ZoomScheduleController@show',
        'controller' => 'App\\Http\\Controllers\\ZoomScheduleController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.zoomSchedules.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/zoomSchedules/{zoomSchedule}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.zoomSchedules.edit',
        'uses' => 'App\\Http\\Controllers\\ZoomScheduleController@edit',
        'controller' => 'App\\Http\\Controllers\\ZoomScheduleController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.zoomSchedules.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/zoomSchedules/{zoomSchedule}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.zoomSchedules.update',
        'uses' => 'App\\Http\\Controllers\\ZoomScheduleController@update',
        'controller' => 'App\\Http\\Controllers\\ZoomScheduleController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.zoomSchedules.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/zoomSchedules/{zoomSchedule}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.zoomSchedules.destroy',
        'uses' => 'App\\Http\\Controllers\\ZoomScheduleController@destroy',
        'controller' => 'App\\Http\\Controllers\\ZoomScheduleController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.journal.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/journal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.journal.index',
        'uses' => 'App\\Http\\Controllers\\JurnalController@index',
        'controller' => 'App\\Http\\Controllers\\JurnalController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.journal.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/journal/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.journal.create',
        'uses' => 'App\\Http\\Controllers\\JurnalController@create',
        'controller' => 'App\\Http\\Controllers\\JurnalController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.journal.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/journal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.journal.store',
        'uses' => 'App\\Http\\Controllers\\JurnalController@store',
        'controller' => 'App\\Http\\Controllers\\JurnalController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.journal.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.journal.show',
        'uses' => 'App\\Http\\Controllers\\JurnalController@show',
        'controller' => 'App\\Http\\Controllers\\JurnalController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.journal.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/journal/{journal}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.journal.edit',
        'uses' => 'App\\Http\\Controllers\\JurnalController@edit',
        'controller' => 'App\\Http\\Controllers\\JurnalController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.journal.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.journal.update',
        'uses' => 'App\\Http\\Controllers\\JurnalController@update',
        'controller' => 'App\\Http\\Controllers\\JurnalController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.journal.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.journal.destroy',
        'uses' => 'App\\Http\\Controllers\\JurnalController@destroy',
        'controller' => 'App\\Http\\Controllers\\JurnalController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.attendance.index',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@index',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attendance/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.attendance.create',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@create',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.attendance.store',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@store',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attendance/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.attendance.show',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@show',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attendance/{attendance}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.attendance.edit',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@edit',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/attendance/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.attendance.update',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@update',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/attendance/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.attendance.destroy',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@destroy',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.exam.index',
        'uses' => 'App\\Http\\Controllers\\ExamController@index',
        'controller' => 'App\\Http\\Controllers\\ExamController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exam/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.exam.create',
        'uses' => 'App\\Http\\Controllers\\ExamController@create',
        'controller' => 'App\\Http\\Controllers\\ExamController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.exam.store',
        'uses' => 'App\\Http\\Controllers\\ExamController@store',
        'controller' => 'App\\Http\\Controllers\\ExamController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.exam.show',
        'uses' => 'App\\Http\\Controllers\\ExamController@show',
        'controller' => 'App\\Http\\Controllers\\ExamController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exam/{exam}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.exam.edit',
        'uses' => 'App\\Http\\Controllers\\ExamController@edit',
        'controller' => 'App\\Http\\Controllers\\ExamController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.exam.update',
        'uses' => 'App\\Http\\Controllers\\ExamController@update',
        'controller' => 'App\\Http\\Controllers\\ExamController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.exam.destroy',
        'uses' => 'App\\Http\\Controllers\\ExamController@destroy',
        'controller' => 'App\\Http\\Controllers\\ExamController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saleries.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/saleries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.saleries.index',
        'uses' => 'App\\Http\\Controllers\\SalaryController@index',
        'controller' => 'App\\Http\\Controllers\\SalaryController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saleries.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/saleries/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.saleries.create',
        'uses' => 'App\\Http\\Controllers\\SalaryController@create',
        'controller' => 'App\\Http\\Controllers\\SalaryController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saleries.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/saleries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.saleries.store',
        'uses' => 'App\\Http\\Controllers\\SalaryController@store',
        'controller' => 'App\\Http\\Controllers\\SalaryController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saleries.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/saleries/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.saleries.show',
        'uses' => 'App\\Http\\Controllers\\SalaryController@show',
        'controller' => 'App\\Http\\Controllers\\SalaryController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saleries.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/saleries/{salery}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.saleries.edit',
        'uses' => 'App\\Http\\Controllers\\SalaryController@edit',
        'controller' => 'App\\Http\\Controllers\\SalaryController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saleries.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/saleries/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.saleries.update',
        'uses' => 'App\\Http\\Controllers\\SalaryController@update',
        'controller' => 'App\\Http\\Controllers\\SalaryController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saleries.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/saleries/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.saleries.destroy',
        'uses' => 'App\\Http\\Controllers\\SalaryController@destroy',
        'controller' => 'App\\Http\\Controllers\\SalaryController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rewards.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rewards',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.rewards.index',
        'uses' => 'App\\Http\\Controllers\\RewardController@index',
        'controller' => 'App\\Http\\Controllers\\RewardController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rewards.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rewards/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.rewards.create',
        'uses' => 'App\\Http\\Controllers\\RewardController@create',
        'controller' => 'App\\Http\\Controllers\\RewardController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rewards.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/rewards',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.rewards.store',
        'uses' => 'App\\Http\\Controllers\\RewardController@store',
        'controller' => 'App\\Http\\Controllers\\RewardController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rewards.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rewards/{reward}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.rewards.show',
        'uses' => 'App\\Http\\Controllers\\RewardController@show',
        'controller' => 'App\\Http\\Controllers\\RewardController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rewards.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rewards/{reward}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.rewards.edit',
        'uses' => 'App\\Http\\Controllers\\RewardController@edit',
        'controller' => 'App\\Http\\Controllers\\RewardController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rewards.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/rewards/{reward}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.rewards.update',
        'uses' => 'App\\Http\\Controllers\\RewardController@update',
        'controller' => 'App\\Http\\Controllers\\RewardController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rewards.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/rewards/{reward}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.rewards.destroy',
        'uses' => 'App\\Http\\Controllers\\RewardController@destroy',
        'controller' => 'App\\Http\\Controllers\\RewardController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submitRewards.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/submitRewards',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submitRewards.index',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@index',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submitRewards.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/submitRewards/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submitRewards.create',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@create',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submitRewards.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/submitRewards',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submitRewards.store',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@store',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submitRewards.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/submitRewards/{submitReward}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submitRewards.show',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@show',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submitRewards.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/submitRewards/{submitReward}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submitRewards.edit',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@edit',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submitRewards.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/submitRewards/{submitReward}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submitRewards.update',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@update',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submitRewards.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/submitRewards/{submitReward}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submitRewards.destroy',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@destroy',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.gallerys.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/gallerys',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.gallerys.index',
        'uses' => 'App\\Http\\Controllers\\GalleryController@index',
        'controller' => 'App\\Http\\Controllers\\GalleryController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.gallerys.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/gallerys/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.gallerys.create',
        'uses' => 'App\\Http\\Controllers\\GalleryController@create',
        'controller' => 'App\\Http\\Controllers\\GalleryController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.gallerys.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/gallerys',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.gallerys.store',
        'uses' => 'App\\Http\\Controllers\\GalleryController@store',
        'controller' => 'App\\Http\\Controllers\\GalleryController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.gallerys.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/gallerys/{gallery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.gallerys.show',
        'uses' => 'App\\Http\\Controllers\\GalleryController@show',
        'controller' => 'App\\Http\\Controllers\\GalleryController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.gallerys.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/gallerys/{gallery}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.gallerys.edit',
        'uses' => 'App\\Http\\Controllers\\GalleryController@edit',
        'controller' => 'App\\Http\\Controllers\\GalleryController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.gallerys.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/gallerys/{gallery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.gallerys.update',
        'uses' => 'App\\Http\\Controllers\\GalleryController@update',
        'controller' => 'App\\Http\\Controllers\\GalleryController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.gallerys.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/gallerys/{gallery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.gallerys.destroy',
        'uses' => 'App\\Http\\Controllers\\GalleryController@destroy',
        'controller' => 'App\\Http\\Controllers\\GalleryController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.news.index',
        'uses' => 'App\\Http\\Controllers\\NewsController@index',
        'controller' => 'App\\Http\\Controllers\\NewsController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.news.create',
        'uses' => 'App\\Http\\Controllers\\NewsController@create',
        'controller' => 'App\\Http\\Controllers\\NewsController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.news.store',
        'uses' => 'App\\Http\\Controllers\\NewsController@store',
        'controller' => 'App\\Http\\Controllers\\NewsController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.news.show',
        'uses' => 'App\\Http\\Controllers\\NewsController@show',
        'controller' => 'App\\Http\\Controllers\\NewsController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/{news}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.news.edit',
        'uses' => 'App\\Http\\Controllers\\NewsController@edit',
        'controller' => 'App\\Http\\Controllers\\NewsController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/news/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.news.update',
        'uses' => 'App\\Http\\Controllers\\NewsController@update',
        'controller' => 'App\\Http\\Controllers\\NewsController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/news/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.news.destroy',
        'uses' => 'App\\Http\\Controllers\\NewsController@destroy',
        'controller' => 'App\\Http\\Controllers\\NewsController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.administrations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/administrations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.administrations.index',
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@index',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.administrations.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/administrations/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.administrations.create',
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@create',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.administrations.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/administrations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.administrations.store',
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@store',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.administrations.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/administrations/{administration}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.administrations.show',
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@show',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.administrations.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/administrations/{administration}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.administrations.edit',
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@edit',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.administrations.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/administrations/{administration}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.administrations.update',
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@update',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.administrations.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/administrations/{administration}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.administrations.destroy',
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@destroy',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.devisions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/devisions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.devisions.index',
        'uses' => 'App\\Http\\Controllers\\DevisionController@index',
        'controller' => 'App\\Http\\Controllers\\DevisionController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.devisions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/devisions/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.devisions.create',
        'uses' => 'App\\Http\\Controllers\\DevisionController@create',
        'controller' => 'App\\Http\\Controllers\\DevisionController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.devisions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/devisions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.devisions.store',
        'uses' => 'App\\Http\\Controllers\\DevisionController@store',
        'controller' => 'App\\Http\\Controllers\\DevisionController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.devisions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/devisions/{devision}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.devisions.show',
        'uses' => 'App\\Http\\Controllers\\DevisionController@show',
        'controller' => 'App\\Http\\Controllers\\DevisionController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.devisions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/devisions/{devision}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.devisions.edit',
        'uses' => 'App\\Http\\Controllers\\DevisionController@edit',
        'controller' => 'App\\Http\\Controllers\\DevisionController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.devisions.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/devisions/{devision}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.devisions.update',
        'uses' => 'App\\Http\\Controllers\\DevisionController@update',
        'controller' => 'App\\Http\\Controllers\\DevisionController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.devisions.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/devisions/{devision}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.devisions.destroy',
        'uses' => 'App\\Http\\Controllers\\DevisionController@destroy',
        'controller' => 'App\\Http\\Controllers\\DevisionController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.question-bank.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/question-bank',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.question-bank.index',
        'uses' => 'App\\Http\\Controllers\\QuestionBankController@index',
        'controller' => 'App\\Http\\Controllers\\QuestionBankController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.question-bank.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/question-bank/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.question-bank.create',
        'uses' => 'App\\Http\\Controllers\\QuestionBankController@create',
        'controller' => 'App\\Http\\Controllers\\QuestionBankController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.question-bank.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/question-bank',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.question-bank.store',
        'uses' => 'App\\Http\\Controllers\\QuestionBankController@store',
        'controller' => 'App\\Http\\Controllers\\QuestionBankController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.question-bank.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/question-bank/{question_bank}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.question-bank.show',
        'uses' => 'App\\Http\\Controllers\\QuestionBankController@show',
        'controller' => 'App\\Http\\Controllers\\QuestionBankController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.question-bank.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/question-bank/{question_bank}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.question-bank.edit',
        'uses' => 'App\\Http\\Controllers\\QuestionBankController@edit',
        'controller' => 'App\\Http\\Controllers\\QuestionBankController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.question-bank.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/question-bank/{question_bank}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.question-bank.update',
        'uses' => 'App\\Http\\Controllers\\QuestionBankController@update',
        'controller' => 'App\\Http\\Controllers\\QuestionBankController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.question-bank.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/question-bank/{question_bank}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.question-bank.destroy',
        'uses' => 'App\\Http\\Controllers\\QuestionBankController@destroy',
        'controller' => 'App\\Http\\Controllers\\QuestionBankController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schedules.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schedules',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schedules.index',
        'uses' => 'App\\Http\\Controllers\\ScheduleController@index',
        'controller' => 'App\\Http\\Controllers\\ScheduleController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schedules.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schedules/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schedules.create',
        'uses' => 'App\\Http\\Controllers\\ScheduleController@create',
        'controller' => 'App\\Http\\Controllers\\ScheduleController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schedules.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/schedules',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schedules.store',
        'uses' => 'App\\Http\\Controllers\\ScheduleController@store',
        'controller' => 'App\\Http\\Controllers\\ScheduleController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schedules.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schedules/{schedule}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schedules.show',
        'uses' => 'App\\Http\\Controllers\\ScheduleController@show',
        'controller' => 'App\\Http\\Controllers\\ScheduleController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schedules.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/schedules/{schedule}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schedules.edit',
        'uses' => 'App\\Http\\Controllers\\ScheduleController@edit',
        'controller' => 'App\\Http\\Controllers\\ScheduleController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schedules.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/schedules/{schedule}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schedules.update',
        'uses' => 'App\\Http\\Controllers\\ScheduleController@update',
        'controller' => 'App\\Http\\Controllers\\ScheduleController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.schedules.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/schedules/{schedule}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.schedules.destroy',
        'uses' => 'App\\Http\\Controllers\\ScheduleController@destroy',
        'controller' => 'App\\Http\\Controllers\\ScheduleController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.events.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/events',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.events.index',
        'uses' => 'App\\Http\\Controllers\\EventController@index',
        'controller' => 'App\\Http\\Controllers\\EventController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.events.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/events/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.events.create',
        'uses' => 'App\\Http\\Controllers\\EventController@create',
        'controller' => 'App\\Http\\Controllers\\EventController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.events.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/events',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.events.store',
        'uses' => 'App\\Http\\Controllers\\EventController@store',
        'controller' => 'App\\Http\\Controllers\\EventController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.events.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/events/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.events.show',
        'uses' => 'App\\Http\\Controllers\\EventController@show',
        'controller' => 'App\\Http\\Controllers\\EventController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.events.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/events/{event}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.events.edit',
        'uses' => 'App\\Http\\Controllers\\EventController@edit',
        'controller' => 'App\\Http\\Controllers\\EventController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.events.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/events/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.events.update',
        'uses' => 'App\\Http\\Controllers\\EventController@update',
        'controller' => 'App\\Http\\Controllers\\EventController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.events.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/events/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.events.destroy',
        'uses' => 'App\\Http\\Controllers\\EventController@destroy',
        'controller' => 'App\\Http\\Controllers\\EventController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.eventDocumentation.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/eventDocumentation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.eventDocumentation.index',
        'uses' => 'App\\Http\\Controllers\\EventDocumentationController@index',
        'controller' => 'App\\Http\\Controllers\\EventDocumentationController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.eventDocumentation.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/eventDocumentation/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.eventDocumentation.create',
        'uses' => 'App\\Http\\Controllers\\EventDocumentationController@create',
        'controller' => 'App\\Http\\Controllers\\EventDocumentationController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.eventDocumentation.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/eventDocumentation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.eventDocumentation.store',
        'uses' => 'App\\Http\\Controllers\\EventDocumentationController@store',
        'controller' => 'App\\Http\\Controllers\\EventDocumentationController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.eventDocumentation.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/eventDocumentation/{eventDocumentation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.eventDocumentation.show',
        'uses' => 'App\\Http\\Controllers\\EventDocumentationController@show',
        'controller' => 'App\\Http\\Controllers\\EventDocumentationController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.eventDocumentation.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/eventDocumentation/{eventDocumentation}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.eventDocumentation.edit',
        'uses' => 'App\\Http\\Controllers\\EventDocumentationController@edit',
        'controller' => 'App\\Http\\Controllers\\EventDocumentationController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.eventDocumentation.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/eventDocumentation/{eventDocumentation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.eventDocumentation.update',
        'uses' => 'App\\Http\\Controllers\\EventDocumentationController@update',
        'controller' => 'App\\Http\\Controllers\\EventDocumentationController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.eventDocumentation.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/eventDocumentation/{eventDocumentation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.eventDocumentation.destroy',
        'uses' => 'App\\Http\\Controllers\\EventDocumentationController@destroy',
        'controller' => 'App\\Http\\Controllers\\EventDocumentationController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.sub-material-exam.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sub-material-exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.sub-material-exam.index',
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@index',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.sub-material-exam.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sub-material-exam/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.sub-material-exam.create',
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@create',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.sub-material-exam.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/sub-material-exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.sub-material-exam.store',
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@store',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.sub-material-exam.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sub-material-exam/{sub_material_exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.sub-material-exam.show',
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@show',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.sub-material-exam.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sub-material-exam/{sub_material_exam}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.sub-material-exam.edit',
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@edit',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.sub-material-exam.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/sub-material-exam/{sub_material_exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.sub-material-exam.update',
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@update',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.sub-material-exam.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/sub-material-exam/{sub_material_exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.sub-material-exam.destroy',
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@destroy',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.events.participants' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/events/{event}/participants',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\EventController@showParticipants',
        'controller' => 'App\\Http\\Controllers\\EventController@showParticipants',
        'as' => 'admin.events.participants',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.eventsParticipant.setCertificate' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/events/set-certificate/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\EventPartisipantController@update',
        'controller' => 'App\\Http\\Controllers\\EventPartisipantController@update',
        'as' => 'admin.eventsParticipant.setCertificate',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.eventDocumentation.store-img' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/eventDocumentation/store/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\EventDocumentationController@storeMultiple',
        'controller' => 'App\\Http\\Controllers\\EventDocumentationController@storeMultiple',
        'as' => 'admin.eventDocumentation.store-img',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam-taking-place' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exam-taking-place',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@examTakingPlace',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@examTakingPlace',
        'as' => 'admin.exam-taking-place',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.detail-exam-taking-place' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/detail-exam-taking-place',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@detailExamTakingPlace',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@detailExamTakingPlace',
        'as' => 'admin.detail-exam-taking-place',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam-finnaly' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exam-finnaly',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@examFinnaly',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@examFinnaly',
        'as' => 'admin.exam-finnaly',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam-statistic' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exam-statistic',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@examStatistic',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@examStatistic',
        'as' => 'admin.exam-statistic',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam-detail-student' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exam-detail-student',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@examDetailStudent',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@examDetailStudent',
        'as' => 'admin.exam-detail-student',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam-question' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exam-question/{subMaterialExam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@examQuestion',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@examQuestion',
        'as' => 'admin.exam-question',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.exam-question-manual' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exam-question-manual/{submaterial}/{submaterialExam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@examQuestionManual',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@examQuestionManual',
        'as' => 'admin.exam-question-manual',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.question-bank-multiplechoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/question-bank-multiplechoice/{submaterial}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\QuestionBankController@indexMultipleChoise',
        'controller' => 'App\\Http\\Controllers\\QuestionBankController@indexMultipleChoise',
        'as' => 'admin.question-bank-multiplechoice',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.question-bank-essay' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/question-bank-essay/{submaterial}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\QuestionBankController@indexEssay',
        'controller' => 'App\\Http\\Controllers\\QuestionBankController@indexEssay',
        'as' => 'admin.question-bank-essay',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.questionBank' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/quetion-banks/{material}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MaterialController@questionBank',
        'controller' => 'App\\Http\\Controllers\\MaterialController@questionBank',
        'as' => 'admin.questionBank',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.quetion-bank-detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/quetion-bank-detail/{submaterial}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\QuestionBankController@show',
        'controller' => 'App\\Http\\Controllers\\QuestionBankController@show',
        'as' => 'admin.quetion-bank-detail',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.questionBank.manual' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/question-bank-manual/{submaterialExam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamQuestionController@manual',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamQuestionController@manual',
        'as' => 'admin.questionBank.manual',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.questionBank.auto' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/question-bank-auto/{submaterialExam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamQuestionController@auto',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamQuestionController@auto',
        'as' => 'admin.questionBank.auto',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submaterialExamQuestion.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/submaterialExamQuestion/{submaterialExamQuestion}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'as' => 'admin.submaterialExamQuestion.destroy',
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamQuestionController@destroy',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamQuestionController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.questionBank.storeEssay' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/question-bank-store-essay',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\QuestionBankController@storeEssay',
        'controller' => 'App\\Http\\Controllers\\QuestionBankController@storeEssay',
        'as' => 'admin.questionBank.storeEssay',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateStatusNews' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/updateStatusNews/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\NewsController@updateStatus',
        'controller' => 'App\\Http\\Controllers\\NewsController@updateStatus',
        'as' => 'admin.updateStatusNews',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.saleriesTeacher' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/saleriesTeacher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SalaryController@indexTeacher',
        'controller' => 'App\\Http\\Controllers\\SalaryController@indexTeacher',
        'as' => 'admin.saleriesTeacher',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.createSaleriesTeacher' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SalaryController@createTeacher',
        'controller' => 'App\\Http\\Controllers\\SalaryController@createTeacher',
        'as' => 'admin.createSaleriesTeacher',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editSaleriesTeacher' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SalaryController@editTeacher',
        'controller' => 'App\\Http\\Controllers\\SalaryController@editTeacher',
        'as' => 'admin.editSaleriesTeacher',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.storeSaleriesTeacher' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SalaryController@storeTeacher',
        'controller' => 'App\\Http\\Controllers\\SalaryController@storeTeacher',
        'as' => 'admin.storeSaleriesTeacher',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updateSaleriesTeacher' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/update/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SalaryController@updateTeacher',
        'controller' => 'App\\Http\\Controllers\\SalaryController@updateTeacher',
        'as' => 'admin.updateSaleriesTeacher',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.deleteSaleriesTeacher' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/delete/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SalaryController@destroyTeacher',
        'controller' => 'App\\Http\\Controllers\\SalaryController@destroyTeacher',
        'as' => 'admin.deleteSaleriesTeacher',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.getTeacherBySchool' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/getTeacherBySchool',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SalaryController@getTeacherBySchool',
        'controller' => 'App\\Http\\Controllers\\SalaryController@getTeacherBySchool',
        'as' => 'admin.getTeacherBySchool',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showClassroom' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/showClassroom/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ExamController@showClassroom',
        'controller' => 'App\\Http\\Controllers\\ExamController@showClassroom',
        'as' => 'admin.showClassroom',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showStudent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/showStudent/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ExamController@showStudent',
        'controller' => 'App\\Http\\Controllers\\ExamController@showStudent',
        'as' => 'admin.showStudent',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showEvaluation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/showEvaluation/{student}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ExamController@showEvaluation',
        'controller' => 'App\\Http\\Controllers\\ExamController@showEvaluation',
        'as' => 'admin.showEvaluation',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showSubMaterial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/showSubMaterial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialController@showSubMaterial',
        'controller' => 'App\\Http\\Controllers\\SubMaterialController@showSubMaterial',
        'as' => 'admin.showSubMaterial',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rollingMentor.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rolling-mentor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MentorController@rollingMentor',
        'controller' => 'App\\Http\\Controllers\\MentorController@rollingMentor',
        'as' => 'admin.rollingMentor.index',
        'namespace' => NULL,
        'prefix' => 'admin/rolling-mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rollingMentor.add' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rolling-mentor/{mentor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MentorController@addRollingMentor',
        'controller' => 'App\\Http\\Controllers\\MentorController@addRollingMentor',
        'as' => 'admin.rollingMentor.add',
        'namespace' => NULL,
        'prefix' => 'admin/rolling-mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rollingMentor.getClassrooms' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/rolling-mentor/get-classrooms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MentorController@getClassroomBySchool',
        'controller' => 'App\\Http\\Controllers\\MentorController@getClassroomBySchool',
        'as' => 'admin.rollingMentor.getClassrooms',
        'namespace' => NULL,
        'prefix' => 'admin/rolling-mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rollingMentor.actionRollingMentor' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/rolling-mentor/action-rolling-mentor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MentorController@actionRollingMentor',
        'controller' => 'App\\Http\\Controllers\\MentorController@actionRollingMentor',
        'as' => 'admin.rollingMentor.actionRollingMentor',
        'namespace' => NULL,
        'prefix' => 'admin/rolling-mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rollingMentor.deleteRollingMentor' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/rolling-mentor/delete-rolling-mentor/{mentorClassroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MentorController@deleteMentorClassroom',
        'controller' => 'App\\Http\\Controllers\\MentorController@deleteMentorClassroom',
        'as' => 'admin.rollingMentor.deleteRollingMentor',
        'namespace' => NULL,
        'prefix' => 'admin/rolling-mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.materials.createSubmaterial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/materials/{material}/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialController@create',
        'controller' => 'App\\Http\\Controllers\\SubMaterialController@create',
        'as' => 'admin.materials.createSubmaterial',
        'namespace' => NULL,
        'prefix' => 'admin/materials',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.materials.editSubmaterial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/materials/{material}/{subMaterial}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialController@edit',
        'controller' => 'App\\Http\\Controllers\\SubMaterialController@edit',
        'as' => 'admin.materials.editSubmaterial',
        'namespace' => NULL,
        'prefix' => 'admin/materials',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submaterials.createAssignment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/submaterials/assignments/{submaterial}/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AssignmentController@create',
        'controller' => 'App\\Http\\Controllers\\AssignmentController@create',
        'as' => 'admin.submaterials.createAssignment',
        'namespace' => NULL,
        'prefix' => 'admin/submaterials',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.submaterials.viewMaterial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/submaterials/{submaterial}/view/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialController@viewMaterial',
        'controller' => 'App\\Http\\Controllers\\SubMaterialController@viewMaterial',
        'as' => 'admin.submaterials.viewMaterial',
        'namespace' => NULL,
        'prefix' => 'admin/submaterials',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rollingStudent.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rolling-student',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentController@rollingStudent',
        'controller' => 'App\\Http\\Controllers\\StudentController@rollingStudent',
        'as' => 'admin.rollingStudent.index',
        'namespace' => NULL,
        'prefix' => 'admin/rolling-student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rollingStudent.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/rolling-student',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ClassroomController@addStudentClassroom',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@addStudentClassroom',
        'as' => 'admin.rollingStudent.store',
        'namespace' => NULL,
        'prefix' => 'admin/rolling-student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rollingTeacher.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rolling-teacher/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@rollingTeacher',
        'controller' => 'App\\Http\\Controllers\\TeacherController@rollingTeacher',
        'as' => 'admin.rollingTeacher.index',
        'namespace' => NULL,
        'prefix' => 'admin/rolling-teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rollingTeacher.add' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rolling-teacher/addRollingTeacher/{teacher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@addRollingTeacher',
        'controller' => 'App\\Http\\Controllers\\TeacherController@addRollingTeacher',
        'as' => 'admin.rollingTeacher.add',
        'namespace' => NULL,
        'prefix' => 'admin/rolling-teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rollingTeacher.actionRollingTeacher' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/rolling-teacher/action-rolling-teacher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@actionRollingTeacher',
        'controller' => 'App\\Http\\Controllers\\TeacherController@actionRollingTeacher',
        'as' => 'admin.rollingTeacher.actionRollingTeacher',
        'namespace' => NULL,
        'prefix' => 'admin/rolling-teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rollingTeacher.deleteRollingTeacher' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/rolling-teacher/delete-rolling-teacher/{teacherClassroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@deleteTeacherClassroom',
        'controller' => 'App\\Http\\Controllers\\TeacherController@deleteTeacherClassroom',
        'as' => 'admin.rollingTeacher.deleteRollingTeacher',
        'namespace' => NULL,
        'prefix' => 'admin/rolling-teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.validStatus' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/validStatus/{submitReward}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@validStatus',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@validStatus',
        'as' => 'admin.validStatus',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.createExam' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/createExam/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\ExamController@createExam',
        'controller' => 'App\\Http\\Controllers\\ExamController@createExam',
        'as' => 'admin.createExam',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.gantiPasswordMentor' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/gantiPasswordMentor/{mentor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MentorController@ChangePasswordMentor',
        'controller' => 'App\\Http\\Controllers\\MentorController@ChangePasswordMentor',
        'as' => 'admin.gantiPasswordMentor',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updatePasswordMentor' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/updatePasswordMentor/{mentor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\MentorController@updatePasswordMentor',
        'controller' => 'App\\Http\\Controllers\\MentorController@updatePasswordMentor',
        'as' => 'admin.updatePasswordMentor',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.gantiPasswordGuru' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/gantiPasswordGuru/{teacher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@ChangePasswordTeacher',
        'controller' => 'App\\Http\\Controllers\\TeacherController@ChangePasswordTeacher',
        'as' => 'admin.gantiPasswordGuru',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.updatePasswordGuru' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/updatePasswordGuru/{teacher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@updatePasswordGuru',
        'controller' => 'App\\Http\\Controllers\\TeacherController@updatePasswordGuru',
        'as' => 'admin.updatePasswordGuru',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.importStudents' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/import-students',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentController@importStudents',
        'controller' => 'App\\Http\\Controllers\\StudentController@importStudents',
        'as' => 'admin.importStudents',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@dashFinance',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@dashFinance',
        'as' => 'administration.',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.salary-mentor.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'administration/salary-mentor-teacher/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@createsalaryMentorTeacher',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@createsalaryMentorTeacher',
        'as' => 'administration.salary-mentor.create',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.teacher.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/teacher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@teacher',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@teacher',
        'as' => 'administration.teacher.index',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.teacher.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/teacher/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@createTeacher',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@createTeacher',
        'as' => 'administration.teacher.create',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.teacher.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/teacher/{teacher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@showTeacher',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@showTeacher',
        'as' => 'administration.teacher.show',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.teacherMonth.show' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'administration/teacher/{teacher}/month',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@getMonth',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@getMonth',
        'as' => 'administration.teacherMonth.show',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.salaryTeacher.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/salary-teacher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@salaryTeacher',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@salaryTeacher',
        'as' => 'administration.salaryTeacher.index',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.salaryTeacher.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/salary-teacher/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@showSalaryTeacher',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@showSalaryTeacher',
        'as' => 'administration.salaryTeacher.show',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.mentor.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/mentor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@mentor',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@mentor',
        'as' => 'administration.mentor.index',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.mentor.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/mentor/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@createMentor',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@createMentor',
        'as' => 'administration.mentor.create',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.mentor.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/mentor/{mentor}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@showMentor',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@showMentor',
        'as' => 'administration.mentor.show',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.mentorMonth.show' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'administration/mentor/{mentor}/month',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@getMonthAttendance',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@getMonthAttendance',
        'as' => 'administration.mentorMonth.show',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.salary-mentor.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/salary-mentor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@salaryMentor',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@salaryMentor',
        'as' => 'administration.salary-mentor.index',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.salary-mentor.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/salary-mentor/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminitrasionController@showSalaryMentor',
        'controller' => 'App\\Http\\Controllers\\AdminitrasionController@showSalaryMentor',
        'as' => 'administration.salary-mentor.show',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.dependent.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/dependent/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\DependentController@index',
        'controller' => 'App\\Http\\Controllers\\DependentController@index',
        'as' => 'administration.dependent.index',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.dependent.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'administration/dependent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.dependent.store',
        'uses' => 'App\\Http\\Controllers\\DependentController@store',
        'controller' => 'App\\Http\\Controllers\\DependentController@store',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.dependent.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'administration/dependent/{dependent}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.dependent.update',
        'uses' => 'App\\Http\\Controllers\\DependentController@update',
        'controller' => 'App\\Http\\Controllers\\DependentController@update',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.tracking.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/tracking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.tracking.index',
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@index',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@index',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.tracking.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/tracking/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.tracking.create',
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@create',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@create',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.tracking.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'administration/tracking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.tracking.store',
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@store',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@store',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.tracking.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/tracking/{tracking}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.tracking.show',
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@show',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@show',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.tracking.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/tracking/{tracking}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.tracking.edit',
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@edit',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@edit',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.tracking.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'administration/tracking/{tracking}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.tracking.update',
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@update',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@update',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.tracking.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'administration/tracking/{tracking}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.tracking.destroy',
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@destroy',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@destroy',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.package.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/package',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.package.index',
        'uses' => 'App\\Http\\Controllers\\PackageController@index',
        'controller' => 'App\\Http\\Controllers\\PackageController@index',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.package.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/package/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.package.create',
        'uses' => 'App\\Http\\Controllers\\PackageController@create',
        'controller' => 'App\\Http\\Controllers\\PackageController@create',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.package.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'administration/package',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.package.store',
        'uses' => 'App\\Http\\Controllers\\PackageController@store',
        'controller' => 'App\\Http\\Controllers\\PackageController@store',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.package.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/package/{package}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.package.show',
        'uses' => 'App\\Http\\Controllers\\PackageController@show',
        'controller' => 'App\\Http\\Controllers\\PackageController@show',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.package.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/package/{package}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.package.edit',
        'uses' => 'App\\Http\\Controllers\\PackageController@edit',
        'controller' => 'App\\Http\\Controllers\\PackageController@edit',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.package.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'administration/package/{package}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.package.update',
        'uses' => 'App\\Http\\Controllers\\PackageController@update',
        'controller' => 'App\\Http\\Controllers\\PackageController@update',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.package.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'administration/package/{package}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.package.destroy',
        'uses' => 'App\\Http\\Controllers\\PackageController@destroy',
        'controller' => 'App\\Http\\Controllers\\PackageController@destroy',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.schoolPackage.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/schoolPackage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.schoolPackage.index',
        'uses' => 'App\\Http\\Controllers\\SchoolPackageController@index',
        'controller' => 'App\\Http\\Controllers\\SchoolPackageController@index',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.schoolPackage.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/schoolPackage/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.schoolPackage.create',
        'uses' => 'App\\Http\\Controllers\\SchoolPackageController@create',
        'controller' => 'App\\Http\\Controllers\\SchoolPackageController@create',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.schoolPackage.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'administration/schoolPackage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.schoolPackage.store',
        'uses' => 'App\\Http\\Controllers\\SchoolPackageController@store',
        'controller' => 'App\\Http\\Controllers\\SchoolPackageController@store',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.schoolPackage.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/schoolPackage/{schoolPackage}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.schoolPackage.show',
        'uses' => 'App\\Http\\Controllers\\SchoolPackageController@show',
        'controller' => 'App\\Http\\Controllers\\SchoolPackageController@show',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.schoolPackage.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/schoolPackage/{schoolPackage}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.schoolPackage.edit',
        'uses' => 'App\\Http\\Controllers\\SchoolPackageController@edit',
        'controller' => 'App\\Http\\Controllers\\SchoolPackageController@edit',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.schoolPackage.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'administration/schoolPackage/{schoolPackage}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.schoolPackage.update',
        'uses' => 'App\\Http\\Controllers\\SchoolPackageController@update',
        'controller' => 'App\\Http\\Controllers\\SchoolPackageController@update',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.schoolPackage.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'administration/schoolPackage/{schoolPackage}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'as' => 'administration.schoolPackage.destroy',
        'uses' => 'App\\Http\\Controllers\\SchoolPackageController@destroy',
        'controller' => 'App\\Http\\Controllers\\SchoolPackageController@destroy',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.payment-monitoring.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/payment-monitoring',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@paymentMonitoring',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@paymentMonitoring',
        'as' => 'administration.payment-monitoring.index',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.payment-student' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/payment-monitoring/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@paymentAllStudent',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@paymentAllStudent',
        'as' => 'administration.payment-student',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.payment-detail-student' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/payment-monitoring/{classroom}/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@monitoringDetailStudent',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@monitoringDetailStudent',
        'as' => 'administration.payment-detail-student',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.individual-package' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/individual-package',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\PackageController@indexSchool',
        'controller' => 'App\\Http\\Controllers\\PackageController@indexSchool',
        'as' => 'administration.individual-package',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.tracking.showStudent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/tracking/student-school/{school}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@allStudent',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@allStudent',
        'as' => 'administration.tracking.showStudent',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.tracking.detailStudent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/tracking/student-school/detail/{classroom}/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@detailStudent',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@detailStudent',
        'as' => 'administration.tracking.detailStudent',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.tracking.detailStudent.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'administration/tracking/student-school/detail/{user}/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@store',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@store',
        'as' => 'administration.tracking.detailStudent.store',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.tracking.detailStudent.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'administration/tracking/student-school/detail/{user}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@update',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@update',
        'as' => 'administration.tracking.detailStudent.update',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.total.dependent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/get-total-dependent/{semester}/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\DependentController@semester',
        'controller' => 'App\\Http\\Controllers\\DependentController@semester',
        'as' => 'administration.total.dependent',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.generated::5lkAuu2StcPMnxdb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administration/finance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:administration',
        ),
        'uses' => 'App\\Http\\Controllers\\FinanceController@get',
        'controller' => 'App\\Http\\Controllers\\FinanceController@get',
        'as' => 'administration.generated::5lkAuu2StcPMnxdb',
        'namespace' => NULL,
        'prefix' => '/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:298:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:80:"function () {
            return \\view(\'dashboard.admin.layouts.app\');
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f580000000000000000";}";s:4:"hash";s:44:"/IYfKMVEb7OuNrb0Ega1N2VUWFfpMbaIJHsuj28VluE=";}}',
        'as' => 'school.',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.detailJurnal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/detailJurnal/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@detailJurnal',
        'controller' => 'App\\Http\\Controllers\\JurnalController@detailJurnal',
        'as' => 'school.detailJurnal',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.teachers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/teachers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.teachers.index',
        'uses' => 'App\\Http\\Controllers\\TeacherController@index',
        'controller' => 'App\\Http\\Controllers\\TeacherController@index',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.students.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/students',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.students.index',
        'uses' => 'App\\Http\\Controllers\\StudentController@index',
        'controller' => 'App\\Http\\Controllers\\StudentController@index',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.classrooms.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/classrooms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.classrooms.index',
        'uses' => 'App\\Http\\Controllers\\ClassroomController@index',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@index',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.classrooms.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/classrooms/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.classrooms.create',
        'uses' => 'App\\Http\\Controllers\\ClassroomController@create',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@create',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.classrooms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'school/classrooms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.classrooms.store',
        'uses' => 'App\\Http\\Controllers\\ClassroomController@store',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@store',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.classrooms.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/classrooms/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.classrooms.show',
        'uses' => 'App\\Http\\Controllers\\ClassroomController@show',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@show',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.classrooms.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/classrooms/{classroom}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.classrooms.edit',
        'uses' => 'App\\Http\\Controllers\\ClassroomController@edit',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@edit',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.classrooms.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'school/classrooms/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.classrooms.update',
        'uses' => 'App\\Http\\Controllers\\ClassroomController@update',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@update',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.classrooms.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'school/classrooms/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.classrooms.destroy',
        'uses' => 'App\\Http\\Controllers\\ClassroomController@destroy',
        'controller' => 'App\\Http\\Controllers\\ClassroomController@destroy',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.teachers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/teachers/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.teachers.create',
        'uses' => 'App\\Http\\Controllers\\TeacherController@create',
        'controller' => 'App\\Http\\Controllers\\TeacherController@create',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.teachers.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'school/teachers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.teachers.store',
        'uses' => 'App\\Http\\Controllers\\TeacherController@store',
        'controller' => 'App\\Http\\Controllers\\TeacherController@store',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.teachers.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/teachers/{teacher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.teachers.show',
        'uses' => 'App\\Http\\Controllers\\TeacherController@show',
        'controller' => 'App\\Http\\Controllers\\TeacherController@show',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.teachers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/teachers/{teacher}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.teachers.edit',
        'uses' => 'App\\Http\\Controllers\\TeacherController@edit',
        'controller' => 'App\\Http\\Controllers\\TeacherController@edit',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.teachers.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'school/teachers/{teacher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.teachers.update',
        'uses' => 'App\\Http\\Controllers\\TeacherController@update',
        'controller' => 'App\\Http\\Controllers\\TeacherController@update',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.teachers.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'school/teachers/{teacher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.teachers.destroy',
        'uses' => 'App\\Http\\Controllers\\TeacherController@destroy',
        'controller' => 'App\\Http\\Controllers\\TeacherController@destroy',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.journal.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/journal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.journal.index',
        'uses' => 'App\\Http\\Controllers\\JurnalController@index',
        'controller' => 'App\\Http\\Controllers\\JurnalController@index',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.journal.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/journal/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.journal.create',
        'uses' => 'App\\Http\\Controllers\\JurnalController@create',
        'controller' => 'App\\Http\\Controllers\\JurnalController@create',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.journal.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'school/journal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.journal.store',
        'uses' => 'App\\Http\\Controllers\\JurnalController@store',
        'controller' => 'App\\Http\\Controllers\\JurnalController@store',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.journal.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.journal.show',
        'uses' => 'App\\Http\\Controllers\\JurnalController@show',
        'controller' => 'App\\Http\\Controllers\\JurnalController@show',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.journal.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/journal/{journal}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.journal.edit',
        'uses' => 'App\\Http\\Controllers\\JurnalController@edit',
        'controller' => 'App\\Http\\Controllers\\JurnalController@edit',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.journal.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'school/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.journal.update',
        'uses' => 'App\\Http\\Controllers\\JurnalController@update',
        'controller' => 'App\\Http\\Controllers\\JurnalController@update',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.journal.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'school/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.journal.destroy',
        'uses' => 'App\\Http\\Controllers\\JurnalController@destroy',
        'controller' => 'App\\Http\\Controllers\\JurnalController@destroy',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.exam.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.exam.index',
        'uses' => 'App\\Http\\Controllers\\ExamController@index',
        'controller' => 'App\\Http\\Controllers\\ExamController@index',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.exam.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/exam/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.exam.create',
        'uses' => 'App\\Http\\Controllers\\ExamController@create',
        'controller' => 'App\\Http\\Controllers\\ExamController@create',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.exam.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'school/exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.exam.store',
        'uses' => 'App\\Http\\Controllers\\ExamController@store',
        'controller' => 'App\\Http\\Controllers\\ExamController@store',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.exam.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.exam.show',
        'uses' => 'App\\Http\\Controllers\\ExamController@show',
        'controller' => 'App\\Http\\Controllers\\ExamController@show',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.exam.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/exam/{exam}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.exam.edit',
        'uses' => 'App\\Http\\Controllers\\ExamController@edit',
        'controller' => 'App\\Http\\Controllers\\ExamController@edit',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.exam.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'school/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.exam.update',
        'uses' => 'App\\Http\\Controllers\\ExamController@update',
        'controller' => 'App\\Http\\Controllers\\ExamController@update',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.exam.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'school/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.exam.destroy',
        'uses' => 'App\\Http\\Controllers\\ExamController@destroy',
        'controller' => 'App\\Http\\Controllers\\ExamController@destroy',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.packages.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/packages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.packages.index',
        'uses' => 'App\\Http\\Controllers\\PackageController@index',
        'controller' => 'App\\Http\\Controllers\\PackageController@index',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.packages.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/packages/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.packages.create',
        'uses' => 'App\\Http\\Controllers\\PackageController@create',
        'controller' => 'App\\Http\\Controllers\\PackageController@create',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.packages.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'school/packages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.packages.store',
        'uses' => 'App\\Http\\Controllers\\PackageController@store',
        'controller' => 'App\\Http\\Controllers\\PackageController@store',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.packages.getPayment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/packages/{package}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'uses' => 'App\\Http\\Controllers\\PackageController@getPayment',
        'controller' => 'App\\Http\\Controllers\\PackageController@getPayment',
        'as' => 'school.packages.getPayment',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.packages.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/packages/{package}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.packages.edit',
        'uses' => 'App\\Http\\Controllers\\PackageController@edit',
        'controller' => 'App\\Http\\Controllers\\PackageController@edit',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.packages.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'school/packages/{package}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.packages.update',
        'uses' => 'App\\Http\\Controllers\\PackageController@update',
        'controller' => 'App\\Http\\Controllers\\PackageController@update',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.packages.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'school/packages/{package}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'as' => 'school.packages.destroy',
        'uses' => 'App\\Http\\Controllers\\PackageController@destroy',
        'controller' => 'App\\Http\\Controllers\\PackageController@destroy',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.showStudent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/showStudent/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'uses' => 'App\\Http\\Controllers\\ExamController@showStudent',
        'controller' => 'App\\Http\\Controllers\\ExamController@showStudent',
        'as' => 'school.showStudent',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.rankings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/ranking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'uses' => 'App\\Http\\Controllers\\PointController@index',
        'controller' => 'App\\Http\\Controllers\\PointController@index',
        'as' => 'school.rankings',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.filterStudent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/filter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentController@filterStudent',
        'controller' => 'App\\Http\\Controllers\\StudentController@filterStudent',
        'as' => 'school.filterStudent',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.gantiPasswordGuru' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/gantiPasswordGuru/{teacher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@ChangePasswordTeacher',
        'controller' => 'App\\Http\\Controllers\\TeacherController@ChangePasswordTeacher',
        'as' => 'school.gantiPasswordGuru',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.updatePasswordGuru' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'school/updatePasswordGuru/{teacher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'uses' => 'App\\Http\\Controllers\\TeacherController@updatePasswordGuru',
        'controller' => 'App\\Http\\Controllers\\TeacherController@updatePasswordGuru',
        'as' => 'school.updatePasswordGuru',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.tracking.showStudent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/tracking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@schoolAllStudent',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@schoolAllStudent',
        'as' => 'school.tracking.showStudent',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.tracking.detailStudent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/tracking/{classroom}/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'uses' => 'App\\Http\\Controllers\\TrackingPaymentController@schoolDetailStudent',
        'controller' => 'App\\Http\\Controllers\\TrackingPaymentController@schoolDetailStudent',
        'as' => 'school.tracking.detailStudent',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'school.total.dependent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'school/{semester}/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:school',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@schoolTrackingSemester',
        'controller' => 'App\\Http\\Controllers\\HomeController@schoolTrackingSemester',
        'as' => 'school.total.dependent',
        'namespace' => NULL,
        'prefix' => '/school',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.challenges.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/challenges',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.challenges.index',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@index',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@index',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.challenges.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/challenges/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.challenges.create',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@create',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@create',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.challenges.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'teacher/challenges',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.challenges.store',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@store',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@store',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.challenges.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/challenges/{challenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.challenges.show',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@show',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@show',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.challenges.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/challenges/{challenge}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.challenges.edit',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@edit',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@edit',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.challenges.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'teacher/challenges/{challenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.challenges.update',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@update',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@update',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.challenges.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'teacher/challenges/{challenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.challenges.destroy',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@destroy',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@destroy',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.journal.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/journal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.journal.index',
        'uses' => 'App\\Http\\Controllers\\JurnalController@index',
        'controller' => 'App\\Http\\Controllers\\JurnalController@index',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.journal.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/journal/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.journal.create',
        'uses' => 'App\\Http\\Controllers\\JurnalController@create',
        'controller' => 'App\\Http\\Controllers\\JurnalController@create',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.journal.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'teacher/journal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.journal.store',
        'uses' => 'App\\Http\\Controllers\\JurnalController@store',
        'controller' => 'App\\Http\\Controllers\\JurnalController@store',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.journal.detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\JurnalController@detailTeacher',
        'controller' => 'App\\Http\\Controllers\\JurnalController@detailTeacher',
        'as' => 'teacher.journal.detail',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.journal.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/journal/{journal}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.journal.edit',
        'uses' => 'App\\Http\\Controllers\\JurnalController@edit',
        'controller' => 'App\\Http\\Controllers\\JurnalController@edit',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.journal.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'teacher/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.journal.update',
        'uses' => 'App\\Http\\Controllers\\JurnalController@update',
        'controller' => 'App\\Http\\Controllers\\JurnalController@update',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.journal.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'teacher/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.journal.destroy',
        'uses' => 'App\\Http\\Controllers\\JurnalController@destroy',
        'controller' => 'App\\Http\\Controllers\\JurnalController@destroy',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.exam.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.exam.index',
        'uses' => 'App\\Http\\Controllers\\ExamController@index',
        'controller' => 'App\\Http\\Controllers\\ExamController@index',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.exam.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/exam/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.exam.create',
        'uses' => 'App\\Http\\Controllers\\ExamController@create',
        'controller' => 'App\\Http\\Controllers\\ExamController@create',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.exam.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'teacher/exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.exam.store',
        'uses' => 'App\\Http\\Controllers\\ExamController@store',
        'controller' => 'App\\Http\\Controllers\\ExamController@store',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.exam.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.exam.show',
        'uses' => 'App\\Http\\Controllers\\ExamController@show',
        'controller' => 'App\\Http\\Controllers\\ExamController@show',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.exam.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/exam/{exam}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.exam.edit',
        'uses' => 'App\\Http\\Controllers\\ExamController@edit',
        'controller' => 'App\\Http\\Controllers\\ExamController@edit',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.exam.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'teacher/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.exam.update',
        'uses' => 'App\\Http\\Controllers\\ExamController@update',
        'controller' => 'App\\Http\\Controllers\\ExamController@update',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.exam.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'teacher/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.exam.destroy',
        'uses' => 'App\\Http\\Controllers\\ExamController@destroy',
        'controller' => 'App\\Http\\Controllers\\ExamController@destroy',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.saleries.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/saleries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.saleries.index',
        'uses' => 'App\\Http\\Controllers\\SalaryController@index',
        'controller' => 'App\\Http\\Controllers\\SalaryController@index',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.saleries.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/saleries/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.saleries.create',
        'uses' => 'App\\Http\\Controllers\\SalaryController@create',
        'controller' => 'App\\Http\\Controllers\\SalaryController@create',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.saleries.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'teacher/saleries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.saleries.store',
        'uses' => 'App\\Http\\Controllers\\SalaryController@store',
        'controller' => 'App\\Http\\Controllers\\SalaryController@store',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.saleries.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/saleries/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.saleries.show',
        'uses' => 'App\\Http\\Controllers\\SalaryController@show',
        'controller' => 'App\\Http\\Controllers\\SalaryController@show',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.saleries.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/saleries/{salery}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.saleries.edit',
        'uses' => 'App\\Http\\Controllers\\SalaryController@edit',
        'controller' => 'App\\Http\\Controllers\\SalaryController@edit',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.saleries.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'teacher/saleries/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.saleries.update',
        'uses' => 'App\\Http\\Controllers\\SalaryController@update',
        'controller' => 'App\\Http\\Controllers\\SalaryController@update',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.saleries.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'teacher/saleries/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'as' => 'teacher.saleries.destroy',
        'uses' => 'App\\Http\\Controllers\\SalaryController@destroy',
        'controller' => 'App\\Http\\Controllers\\SalaryController@destroy',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.showStudent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/showStudent/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\ExamController@showStudent',
        'controller' => 'App\\Http\\Controllers\\ExamController@showStudent',
        'as' => 'teacher.showStudent',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.showStudentReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/showStudentReport/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@showStudent',
        'controller' => 'App\\Http\\Controllers\\ReportController@showStudent',
        'as' => 'teacher.showStudentReport',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.showClassroom' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/showClassroom',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@showClassroom',
        'controller' => 'App\\Http\\Controllers\\ReportController@showClassroom',
        'as' => 'teacher.showClassroom',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.report' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@index',
        'controller' => 'App\\Http\\Controllers\\ReportController@index',
        'as' => 'teacher.report',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.showAssignment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/{classroom}/assignment/{assignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAssignmentController@index',
        'controller' => 'App\\Http\\Controllers\\UserAssignmentController@index',
        'as' => 'teacher.showAssignment',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.storepoint' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'teacher/storepoint',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\AssignmentController@storePoint',
        'controller' => 'App\\Http\\Controllers\\AssignmentController@storePoint',
        'as' => 'teacher.storepoint',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.validChallengeTeacher' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'teacher/validChallengeTeacher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\ChallengeController@validChallengeTeacher',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@validChallengeTeacher',
        'as' => 'teacher.validChallengeTeacher',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.storePointAssignment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'teacher/storePointAssignment/{submitAssingnment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\PointController@storePointAssignment',
        'controller' => 'App\\Http\\Controllers\\PointController@storePointAssignment',
        'as' => 'teacher.storePointAssignment',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.downloadAll' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/downloadAllFile/{classroom}/{assignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAssignmentController@downloadAll',
        'controller' => 'App\\Http\\Controllers\\UserAssignmentController@downloadAll',
        'as' => 'teacher.downloadAll',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.downloadAssignment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/downloadFile/{submitAssignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAssignmentController@download',
        'controller' => 'App\\Http\\Controllers\\UserAssignmentController@download',
        'as' => 'teacher.downloadAssignment',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.showStudentDetail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/showStudentDetail/{student}/{generation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@showStudentDetail',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@showStudentDetail',
        'as' => 'teacher.showStudentDetail',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.rankings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/ranking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\PointController@index',
        'controller' => 'App\\Http\\Controllers\\PointController@index',
        'as' => 'teacher.rankings',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.downloadAllFile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/downloadAllFile/{challenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\ChallengeController@downloadAll',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@downloadAll',
        'as' => 'teacher.downloadAllFile',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'teacher.downloadFileChallenge' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'teacher/downloadFileChallenge/{submitChallenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:teacher',
        ),
        'uses' => 'App\\Http\\Controllers\\ChallengeController@download',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@download',
        'as' => 'teacher.downloadFileChallenge',
        'namespace' => NULL,
        'prefix' => '/teacher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.challenges.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/challenges',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.challenges.index',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@index',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@index',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.challenges.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/challenges/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.challenges.create',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@create',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@create',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.challenges.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/challenges',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.challenges.store',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@store',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@store',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.challenges.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/challenges/{challenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.challenges.show',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@show',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@show',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.challenges.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/challenges/{challenge}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.challenges.edit',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@edit',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@edit',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.challenges.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'mentor/challenges/{challenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.challenges.update',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@update',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@update',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.challenges.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'mentor/challenges/{challenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.challenges.destroy',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@destroy',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@destroy',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.attendance.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.attendance.index',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@index',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@index',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.attendance.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/attendance/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.attendance.create',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@create',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@create',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.attendance.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.attendance.store',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@store',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@store',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.attendance.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/attendance/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.attendance.show',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@show',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@show',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.attendance.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/attendance/{attendance}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.attendance.edit',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@edit',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@edit',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.attendance.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'mentor/attendance/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.attendance.update',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@update',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@update',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.attendance.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'mentor/attendance/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.attendance.destroy',
        'uses' => 'App\\Http\\Controllers\\AttendanceController@destroy',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@destroy',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.journal.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/journal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.journal.index',
        'uses' => 'App\\Http\\Controllers\\JurnalController@index',
        'controller' => 'App\\Http\\Controllers\\JurnalController@index',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.journal.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/journal/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.journal.create',
        'uses' => 'App\\Http\\Controllers\\JurnalController@create',
        'controller' => 'App\\Http\\Controllers\\JurnalController@create',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.journal.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/journal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.journal.store',
        'uses' => 'App\\Http\\Controllers\\JurnalController@store',
        'controller' => 'App\\Http\\Controllers\\JurnalController@store',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.journal.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.journal.show',
        'uses' => 'App\\Http\\Controllers\\JurnalController@show',
        'controller' => 'App\\Http\\Controllers\\JurnalController@show',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.journal.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/journal/{journal}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.journal.edit',
        'uses' => 'App\\Http\\Controllers\\JurnalController@edit',
        'controller' => 'App\\Http\\Controllers\\JurnalController@edit',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.journal.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'mentor/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.journal.update',
        'uses' => 'App\\Http\\Controllers\\JurnalController@update',
        'controller' => 'App\\Http\\Controllers\\JurnalController@update',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.journal.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'mentor/journal/{journal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.journal.destroy',
        'uses' => 'App\\Http\\Controllers\\JurnalController@destroy',
        'controller' => 'App\\Http\\Controllers\\JurnalController@destroy',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.exam.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.exam.index',
        'uses' => 'App\\Http\\Controllers\\ExamController@index',
        'controller' => 'App\\Http\\Controllers\\ExamController@index',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.exam.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/exam/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.exam.create',
        'uses' => 'App\\Http\\Controllers\\ExamController@create',
        'controller' => 'App\\Http\\Controllers\\ExamController@create',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.exam.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.exam.store',
        'uses' => 'App\\Http\\Controllers\\ExamController@store',
        'controller' => 'App\\Http\\Controllers\\ExamController@store',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.exam.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.exam.show',
        'uses' => 'App\\Http\\Controllers\\ExamController@show',
        'controller' => 'App\\Http\\Controllers\\ExamController@show',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.exam.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/exam/{exam}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.exam.edit',
        'uses' => 'App\\Http\\Controllers\\ExamController@edit',
        'controller' => 'App\\Http\\Controllers\\ExamController@edit',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.exam.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'mentor/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.exam.update',
        'uses' => 'App\\Http\\Controllers\\ExamController@update',
        'controller' => 'App\\Http\\Controllers\\ExamController@update',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.exam.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'mentor/exam/{exam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.exam.destroy',
        'uses' => 'App\\Http\\Controllers\\ExamController@destroy',
        'controller' => 'App\\Http\\Controllers\\ExamController@destroy',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.saleries.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/saleries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.saleries.index',
        'uses' => 'App\\Http\\Controllers\\SalaryController@index',
        'controller' => 'App\\Http\\Controllers\\SalaryController@index',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.saleries.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/saleries/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.saleries.create',
        'uses' => 'App\\Http\\Controllers\\SalaryController@create',
        'controller' => 'App\\Http\\Controllers\\SalaryController@create',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.saleries.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/saleries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.saleries.store',
        'uses' => 'App\\Http\\Controllers\\SalaryController@store',
        'controller' => 'App\\Http\\Controllers\\SalaryController@store',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.saleries.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/saleries/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.saleries.show',
        'uses' => 'App\\Http\\Controllers\\SalaryController@show',
        'controller' => 'App\\Http\\Controllers\\SalaryController@show',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.saleries.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/saleries/{salery}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.saleries.edit',
        'uses' => 'App\\Http\\Controllers\\SalaryController@edit',
        'controller' => 'App\\Http\\Controllers\\SalaryController@edit',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.saleries.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'mentor/saleries/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.saleries.update',
        'uses' => 'App\\Http\\Controllers\\SalaryController@update',
        'controller' => 'App\\Http\\Controllers\\SalaryController@update',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.saleries.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'mentor/saleries/{salery}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'as' => 'mentor.saleries.destroy',
        'uses' => 'App\\Http\\Controllers\\SalaryController@destroy',
        'controller' => 'App\\Http\\Controllers\\SalaryController@destroy',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.submaterialExam.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/submaterial-exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@examMentor',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@examMentor',
        'as' => 'mentor.submaterialExam.index',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.detailSubMaterialExam' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/detail-submaterial-exam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@examMentorDetail',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@examMentorDetail',
        'as' => 'mentor.detailSubMaterialExam',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.examSubMaterialAssessment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/exam-submaterial-assessment/{subMaterialExam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\SubMaterialExamController@examMentorAssessment',
        'controller' => 'App\\Http\\Controllers\\SubMaterialExamController@examMentorAssessment',
        'as' => 'mentor.examSubMaterialAssessment',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.studentSubMaterialExamEssayScore' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/student-sub-material-exam-essay-score/{subMaterialExam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@studentSubMaterialExamEssayScore',
        'controller' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@studentSubMaterialExamEssayScore',
        'as' => 'mentor.studentSubMaterialExamEssayScore',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.showStudent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/showStudent/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\ExamController@showStudent',
        'controller' => 'App\\Http\\Controllers\\ExamController@showStudent',
        'as' => 'mentor.showStudent',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.showAssignment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/{classroom}/assignment/{assignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAssignmentController@index',
        'controller' => 'App\\Http\\Controllers\\UserAssignmentController@index',
        'as' => 'mentor.showAssignment',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.rankings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/ranking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\PointController@index',
        'controller' => 'App\\Http\\Controllers\\PointController@index',
        'as' => 'mentor.rankings',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.showStudentDetail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/showStudentDetail/{student}/{generation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@showStudentDetail',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@showStudentDetail',
        'as' => 'mentor.showStudentDetail',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.validChallenge' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/validChallenge',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\ChallengeController@validChallenge',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@validChallenge',
        'as' => 'mentor.validChallenge',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.showDocument' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/showDocument/{submaterial}/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@showDocument',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@showDocument',
        'as' => 'mentor.showDocument',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.downloadAllFile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/downloadAllFile/{challenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\ChallengeController@downloadAll',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@downloadAll',
        'as' => 'mentor.downloadAllFile',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.downloadFileChallenge' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/downloadFileChallenge/{submitChallenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\ChallengeController@download',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@download',
        'as' => 'mentor.downloadFileChallenge',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.downloadAll' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/downloadAllFile/{classroom}/{assignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAssignmentController@downloadAll',
        'controller' => 'App\\Http\\Controllers\\UserAssignmentController@downloadAll',
        'as' => 'mentor.downloadAll',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.downloadAssignment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/downloadFile/{submitAssignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAssignmentController@download',
        'controller' => 'App\\Http\\Controllers\\UserAssignmentController@download',
        'as' => 'mentor.downloadAssignment',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.studentProject' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mentor/student-project/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@studentProject',
        'controller' => 'App\\Http\\Controllers\\ProjectController@studentProject',
        'as' => 'mentor.studentProject',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.approvalProject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/approval-student-project/{project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@approvalProject',
        'controller' => 'App\\Http\\Controllers\\ProjectController@approvalProject',
        'as' => 'mentor.approvalProject',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.rejectProject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/reject-student-project/{project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@rejectProject',
        'controller' => 'App\\Http\\Controllers\\ProjectController@rejectProject',
        'as' => 'mentor.rejectProject',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.approvalPresentation' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/approval-student-presentation/{presentation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\PresentationController@approvalPresentation',
        'controller' => 'App\\Http\\Controllers\\PresentationController@approvalPresentation',
        'as' => 'mentor.approvalPresentation',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.rejectPresentation' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/reject-student-presentation/{presentation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\PresentationController@rejectPresentation',
        'controller' => 'App\\Http\\Controllers\\PresentationController@rejectPresentation',
        'as' => 'mentor.rejectPresentation',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mentor.presentationFinish' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mentor/finish-presentation/{projectId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:mentor',
        ),
        'uses' => 'App\\Http\\Controllers\\PresentationFinishController@finish',
        'controller' => 'App\\Http\\Controllers\\PresentationFinishController@finish',
        'as' => 'mentor.presentationFinish',
        'namespace' => NULL,
        'prefix' => '/mentor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'common.classrooms' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'classrooms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@index',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@index',
        'as' => 'common.classrooms',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'common.showClassrooms' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'classrooms/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@show',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@show',
        'as' => 'common.showClassrooms',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'common.materials' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'materials/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@materials',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@materials',
        'as' => 'common.materials',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'common.showMaterial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{classroom}/showMaterial/{material}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@showMaterial',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@showMaterial',
        'as' => 'common.showMaterial',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'common.showSubMaterial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{classroom}/showSubMaterial/{material}/{submaterial}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@showSubMaterial',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@showSubMaterial',
        'as' => 'common.showSubMaterial',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'common.showDocument' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'showDocument/{submaterial}/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@showDocument',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@showDocument',
        'as' => 'common.showDocument',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'common.detail-student-project' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'detail-student-project/{project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@show',
        'controller' => 'App\\Http\\Controllers\\ProjectController@show',
        'as' => 'common.detail-student-project',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:306:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:88:"function () {
            return \\view(\'dashboard.user.pages.material.index\');
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ff10000000000000000";}";s:4:"hash";s:44:"+ZqEu0ai7q1CEV/eYDoW5C6KnYBZyKPlCMcTbFERIdA=";}}',
        'as' => 'student.',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.rankings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/ranking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
          4 => 'checkpayment',
        ),
        'uses' => 'App\\Http\\Controllers\\PointController@index',
        'controller' => 'App\\Http\\Controllers\\PointController@index',
        'as' => 'student.rankings',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.classrooms' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/classrooms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
          4 => 'checkpayment',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@index',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@index',
        'as' => 'student.classrooms',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@create',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@create',
        'as' => 'student.create',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.showClassrooms' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/classrooms/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@show',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@show',
        'as' => 'student.showClassrooms',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.materials' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/materials/{classroom}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@materials',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@materials',
        'as' => 'student.materials',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.showMaterial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/showMaterial/{material}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@showMaterial',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@showMaterial',
        'as' => 'student.showMaterial',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.showSubMaterial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/showSubMaterial/{submaterial}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
          4 => 'checkpayment',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@showSubMaterial',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@showSubMaterial',
        'as' => 'student.showSubMaterial',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.showDocument' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/showDocument/{submaterial}/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\UserClassroomController@showDocument',
        'controller' => 'App\\Http\\Controllers\\UserClassroomController@showDocument',
        'as' => 'student.showDocument',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.events.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/event',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\EventController@studentEvent',
        'controller' => 'App\\Http\\Controllers\\EventController@studentEvent',
        'as' => 'student.events.index',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.submitAssignment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/{classroom}/submitAssignment/{material}/{submaterial}/{assignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAssignmentController@create',
        'controller' => 'App\\Http\\Controllers\\UserAssignmentController@create',
        'as' => 'student.submitAssignment',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.storeassignment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'student/{classroom}/storeassignment/{material}/{submaterial}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAssignmentController@store',
        'controller' => 'App\\Http\\Controllers\\UserAssignmentController@store',
        'as' => 'student.storeassignment',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.store-image-assignment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'student/storeimageassignment/{submitAssignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAssignmentController@storeImage',
        'controller' => 'App\\Http\\Controllers\\UserAssignmentController@storeImage',
        'as' => 'student.store-image-assignment',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.submitChallenge' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/submitChallenge/{challenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\ChallengeController@submitChallenge',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@submitChallenge',
        'as' => 'student.submitChallenge',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.storeChallenge' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'student/storeChallenge',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\ChallengeController@storeChallenge',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@storeChallenge',
        'as' => 'student.storeChallenge',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.generated::iVT0AG5FB0vQVBu7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/absen/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@submit',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@submit',
        'as' => 'student.generated::iVT0AG5FB0vQVBu7',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.downloadChallenge' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/downloadFileChallenge/{submitChallenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\ChallengeController@download',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@download',
        'as' => 'student.downloadChallenge',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.downloadAssignment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/downloadFileAssignment/{submitAssignment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\UserAssignmentController@download',
        'controller' => 'App\\Http\\Controllers\\UserAssignmentController@download',
        'as' => 'student.downloadAssignment',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.submitReward' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'student/submitReward/{reward}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@submitReward',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@submitReward',
        'as' => 'student.submitReward',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.historyReward' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/historyReward',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\RewardController@historyReward',
        'controller' => 'App\\Http\\Controllers\\RewardController@historyReward',
        'as' => 'student.historyReward',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.student-payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/student-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentPaymentController@index',
        'controller' => 'App\\Http\\Controllers\\StudentPaymentController@index',
        'as' => 'student.student-payment',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.payment-channel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/payment-channel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\TripayController@index',
        'controller' => 'App\\Http\\Controllers\\TripayController@index',
        'as' => 'student.payment-channel',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.request-transaction' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'student/request-transaction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\TripayController@store',
        'controller' => 'App\\Http\\Controllers\\TripayController@store',
        'as' => 'student.request-transaction',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.detail-payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/detail-payment/{payment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentPaymentController@detail',
        'controller' => 'App\\Http\\Controllers\\StudentPaymentController@detail',
        'as' => 'student.detail-payment',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.invoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/invoice/{reference}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentPaymentController@invoice',
        'controller' => 'App\\Http\\Controllers\\StudentPaymentController@invoice',
        'as' => 'student.invoice',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.detail-transaction' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/detail-transaction/{reference}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentPaymentController@show',
        'controller' => 'App\\Http\\Controllers\\StudentPaymentController@show',
        'as' => 'student.detail-transaction',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.exam' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/exam/{subMaterialExam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@index',
        'controller' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@index',
        'as' => 'student.exam',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.exam.opentab' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'student/exam/{subMaterialExam}/opentab',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@openTab',
        'controller' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@openTab',
        'as' => 'student.exam.opentab',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.exam.reset' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'student/exam/{subMaterialExam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@reset',
        'controller' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@reset',
        'as' => 'student.exam.reset',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.exam.submit' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'student/exam/{subMaterialExam}/{studentSubmaterialExam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@answer',
        'controller' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@answer',
        'as' => 'student.exam.submit',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.exam.show-finish' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/exam/{subMaterialExam}/{studentSubmaterialExam}/finish',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@showFinish',
        'controller' => 'App\\Http\\Controllers\\StudentSubmaterialExamController@showFinish',
        'as' => 'student.exam.show-finish',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.events.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/events/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\EventController@show',
        'controller' => 'App\\Http\\Controllers\\EventController@show',
        'as' => 'student.events.show',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.events.follow' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'student/events/follow/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\EventPartisipantController@store',
        'controller' => 'App\\Http\\Controllers\\EventPartisipantController@store',
        'as' => 'student.events.follow',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.events.unfollow' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'student/events/unfollow/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\EventPartisipantController@destroy',
        'controller' => 'App\\Http\\Controllers\\EventPartisipantController@destroy',
        'as' => 'student.events.unfollow',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.events.print-certify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/certify/events/{event}/{participant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\CertifyController@eventCertify',
        'controller' => 'App\\Http\\Controllers\\CertifyController@eventCertify',
        'as' => 'student.events.print-certify',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.challenges.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/challenges',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
          4 => 'checkpayment',
        ),
        'as' => 'student.challenges.index',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@index',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@index',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.challenges.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/challenges/{challenge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
          4 => 'checkpayment',
        ),
        'as' => 'student.challenges.show',
        'uses' => 'App\\Http\\Controllers\\ChallengeController@show',
        'controller' => 'App\\Http\\Controllers\\ChallengeController@show',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.rewards.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/rewards',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
          4 => 'checkpayment',
        ),
        'as' => 'student.rewards.index',
        'uses' => 'App\\Http\\Controllers\\RewardController@index',
        'controller' => 'App\\Http\\Controllers\\RewardController@index',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.submitRewards.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/submitRewards',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.submitRewards.index',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@index',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@index',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.submitRewards.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/submitRewards/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.submitRewards.create',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@create',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@create',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.submitRewards.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'student/submitRewards',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.submitRewards.store',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@store',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@store',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.submitRewards.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/submitRewards/{submitReward}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.submitRewards.show',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@show',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@show',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.submitRewards.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/submitRewards/{submitReward}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.submitRewards.edit',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@edit',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@edit',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.submitRewards.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'student/submitRewards/{submitReward}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.submitRewards.update',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@update',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@update',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.submitRewards.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'student/submitRewards/{submitReward}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.submitRewards.destroy',
        'uses' => 'App\\Http\\Controllers\\SubmitRewardController@destroy',
        'controller' => 'App\\Http\\Controllers\\SubmitRewardController@destroy',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.projectf.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/projectf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.projectf.index',
        'uses' => 'App\\Http\\Controllers\\ProjectController@index',
        'controller' => 'App\\Http\\Controllers\\ProjectController@index',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.projectf.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/projectf/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.projectf.create',
        'uses' => 'App\\Http\\Controllers\\ProjectController@create',
        'controller' => 'App\\Http\\Controllers\\ProjectController@create',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.projectf.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'student/projectf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.projectf.store',
        'uses' => 'App\\Http\\Controllers\\ProjectController@store',
        'controller' => 'App\\Http\\Controllers\\ProjectController@store',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.projectf.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/projectf/{projectf}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.projectf.show',
        'uses' => 'App\\Http\\Controllers\\ProjectController@show',
        'controller' => 'App\\Http\\Controllers\\ProjectController@show',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.projectf.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/projectf/{projectf}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.projectf.edit',
        'uses' => 'App\\Http\\Controllers\\ProjectController@edit',
        'controller' => 'App\\Http\\Controllers\\ProjectController@edit',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.projectf.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'student/projectf/{projectf}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.projectf.update',
        'uses' => 'App\\Http\\Controllers\\ProjectController@update',
        'controller' => 'App\\Http\\Controllers\\ProjectController@update',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.projectf.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'student/projectf/{projectf}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.projectf.destroy',
        'uses' => 'App\\Http\\Controllers\\ProjectController@destroy',
        'controller' => 'App\\Http\\Controllers\\ProjectController@destroy',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.presentation.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/presentation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.presentation.index',
        'uses' => 'App\\Http\\Controllers\\PresentationController@index',
        'controller' => 'App\\Http\\Controllers\\PresentationController@index',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.presentation.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/presentation/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.presentation.create',
        'uses' => 'App\\Http\\Controllers\\PresentationController@create',
        'controller' => 'App\\Http\\Controllers\\PresentationController@create',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.presentation.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'student/presentation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.presentation.store',
        'uses' => 'App\\Http\\Controllers\\PresentationController@store',
        'controller' => 'App\\Http\\Controllers\\PresentationController@store',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.presentation.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/presentation/{presentation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.presentation.show',
        'uses' => 'App\\Http\\Controllers\\PresentationController@show',
        'controller' => 'App\\Http\\Controllers\\PresentationController@show',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.presentation.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/presentation/{presentation}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.presentation.edit',
        'uses' => 'App\\Http\\Controllers\\PresentationController@edit',
        'controller' => 'App\\Http\\Controllers\\PresentationController@edit',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.presentation.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'student/presentation/{presentation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.presentation.update',
        'uses' => 'App\\Http\\Controllers\\PresentationController@update',
        'controller' => 'App\\Http\\Controllers\\PresentationController@update',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.presentation.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'student/presentation/{presentation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.presentation.destroy',
        'uses' => 'App\\Http\\Controllers\\PresentationController@destroy',
        'controller' => 'App\\Http\\Controllers\\PresentationController@destroy',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.notes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/notes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.notes.index',
        'uses' => 'App\\Http\\Controllers\\NoteController@index',
        'controller' => 'App\\Http\\Controllers\\NoteController@index',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.notes.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/notes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.notes.create',
        'uses' => 'App\\Http\\Controllers\\NoteController@create',
        'controller' => 'App\\Http\\Controllers\\NoteController@create',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.notes.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'student/notes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.notes.store',
        'uses' => 'App\\Http\\Controllers\\NoteController@store',
        'controller' => 'App\\Http\\Controllers\\NoteController@store',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.notes.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/notes/{note}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.notes.show',
        'uses' => 'App\\Http\\Controllers\\NoteController@show',
        'controller' => 'App\\Http\\Controllers\\NoteController@show',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.notes.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/notes/{note}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.notes.edit',
        'uses' => 'App\\Http\\Controllers\\NoteController@edit',
        'controller' => 'App\\Http\\Controllers\\NoteController@edit',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.notes.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'student/notes/{note}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.notes.update',
        'uses' => 'App\\Http\\Controllers\\NoteController@update',
        'controller' => 'App\\Http\\Controllers\\NoteController@update',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.notes.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'student/notes/{note}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.notes.destroy',
        'uses' => 'App\\Http\\Controllers\\NoteController@destroy',
        'controller' => 'App\\Http\\Controllers\\NoteController@destroy',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.tasks.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/tasks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.tasks.index',
        'uses' => 'App\\Http\\Controllers\\TaskController@index',
        'controller' => 'App\\Http\\Controllers\\TaskController@index',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.tasks.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/tasks/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.tasks.create',
        'uses' => 'App\\Http\\Controllers\\TaskController@create',
        'controller' => 'App\\Http\\Controllers\\TaskController@create',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.tasks.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'student/tasks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.tasks.store',
        'uses' => 'App\\Http\\Controllers\\TaskController@store',
        'controller' => 'App\\Http\\Controllers\\TaskController@store',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.tasks.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/tasks/{task}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.tasks.show',
        'uses' => 'App\\Http\\Controllers\\TaskController@show',
        'controller' => 'App\\Http\\Controllers\\TaskController@show',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.tasks.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/tasks/{task}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.tasks.edit',
        'uses' => 'App\\Http\\Controllers\\TaskController@edit',
        'controller' => 'App\\Http\\Controllers\\TaskController@edit',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.tasks.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'student/tasks/{task}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.tasks.update',
        'uses' => 'App\\Http\\Controllers\\TaskController@update',
        'controller' => 'App\\Http\\Controllers\\TaskController@update',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.tasks.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'student/tasks/{task}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'as' => 'student.tasks.destroy',
        'uses' => 'App\\Http\\Controllers\\TaskController@destroy',
        'controller' => 'App\\Http\\Controllers\\TaskController@destroy',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.print-certify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/print-certify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\CertifyController@exportPdf',
        'controller' => 'App\\Http\\Controllers\\CertifyController@exportPdf',
        'as' => 'student.print-certify',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'student.total.dependent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'student/{semester}/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
          2 => 'auth',
          3 => 'role:student',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@semester',
        'controller' => 'App\\Http\\Controllers\\HomeController@semester',
        'as' => 'student.total.dependent',
        'namespace' => NULL,
        'prefix' => '/student',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5eSt7aQhJLMw5oeJ' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-notification/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\NotificationController@destroy',
        'controller' => 'App\\Http\\Controllers\\NotificationController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::5eSt7aQhJLMw5oeJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'deleteAllNotification' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'delete-all-notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth.custom',
        ),
        'uses' => 'App\\Http\\Controllers\\NotificationController@deleteAll',
        'controller' => 'App\\Http\\Controllers\\NotificationController@deleteAll',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'deleteAllNotification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OiDahZKQtlYtslzG' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\TripayCallbackController@handle',
        'controller' => 'App\\Http\\Controllers\\TripayCallbackController@handle',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OiDahZKQtlYtslzG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.cerify-certification' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'verify/{material}/{classroom}/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CertifyController@materialVerify',
        'controller' => 'App\\Http\\Controllers\\CertifyController@materialVerify',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'material.cerify-certification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'events.verify-certification' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'certify/events/{participant}/{event}/verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CertifyController@eventVerification',
        'controller' => 'App\\Http\\Controllers\\CertifyController@eventVerification',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'events.verify-certification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AZTgHNBQ4igt5Rqb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'zoom-testing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ZoomScheduleController@first',
        'controller' => 'App\\Http\\Controllers\\ZoomScheduleController@first',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::AZTgHNBQ4igt5Rqb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
