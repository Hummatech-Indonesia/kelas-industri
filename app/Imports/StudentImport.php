<?php

namespace App\Imports;

use App\Models\StudentClassroom;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToCollection, WithHeadingRow
{
    private string $classroomId;

    public function __construct(string $classroomId)
    {
        $this->classroomId = $classroomId;
    }

    /**
     * @param Collection $collection
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $check = User::query()->where('email', $row['email'])->first();

            if (!$check) {
                $user = User::create([
                    'name' => $row['nama'],
                    'email' => $row['email'],
                    'phone_number' => $row['no_telepon'],
                    'address' => $row['alamat'],
                    'password' => bcrypt('password')
                ]);

                StudentClassroom::create([
                    'student_id' => $user->id,
                    'classroom_id' => $this->classroomId
                ]);
            }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
