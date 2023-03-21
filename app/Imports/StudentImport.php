<?php

namespace App\Imports;

use App\Models\StudentSchool;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToCollection, WithHeadingRow
{
    private string $schoolId;

    public function __construct(string $schoolId)
    {
        $this->schoolId = $schoolId;
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

                StudentSchool::create([
                    'student_id' => $user->id,
                    'school_id' => $this->schoolId
                ]);
            }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
