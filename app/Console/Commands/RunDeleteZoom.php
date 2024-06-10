<?php

namespace App\Console\Commands;

use Log;
use App\Models\ZoomSchedule;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RunDeleteZoom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'query:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete zoom schedule';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $zoomSchedules = ZoomSchedule::whereMonth('date', Carbon::now()->month)
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy('classroom_id')
            ->map(function ($schedules) {
                return $schedules->first();
            });

        // dd($zoomSchedules);
        foreach ($zoomSchedules as $schedule) {
            // Hapus semua jadwal untuk bulan ini
            ZoomSchedule::whereMonth('date', Carbon::parse($schedule->date)->month)->delete();

            // Tambahkan 1 minggu ke tanggal
            $schedule->date = Carbon::create($schedule->date)->addWeek();
            $startDate = Carbon::create($schedule->date);

            // Ambil tanggal pertama di bulan yang sama
            $firstDayOfMonth = $startDate->copy()->startOfMonth();

            // Ambil tanggal terakhir di bulan yang sama
            $lastDayOfMonth = $startDate->copy()->endOfMonth();

            info($lastDayOfMonth);

            // Loop dari tanggal mulai hingga akhir bulan
            while ($startDate->lte($lastDayOfMonth)) {
                // Salin objek $schedule sebelum menambahkan minggu
                $scheduleData = clone $schedule;

                // Tambah 1 minggu
                $scheduleData->date = $startDate->toDateTimeString();

                // Simpan ke database
                ZoomSchedule::create($scheduleData->toArray());

                // Tambah 1 minggu ke $startDate untuk iterasi berikutnya
                $startDate->addWeek();
            }
        }


        return 0;
        // return Command::SUCCESS;
    }
}
