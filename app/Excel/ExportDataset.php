<?php

namespace App\Excel;

use Illuminate\View\View;
use App\Models\StudentSchool;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportDataset implements FromView, ShouldAutoSize, WithEvents
{
    use Exportable;

    private array $criterias;
    private $alternatives;

    public function __construct(array $criterias,$alternatives)
    {
        $this->criterias = $criterias;
        $this->alternatives = $alternatives;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */

    public function view(): View
    {
        return view('exports.dataset', [
            'criterias' => $this->criterias,
            'alternatives' => $this->alternatives
        ]);
    }

    /**
     * Add custom events to excel
     *
     * @return array
     */

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                $range = 'A1:';
                $highestColumn = $sheet->getHighestColumn();
                $highestRow = $sheet->getHighestRow();
                $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

                $range .= $highestColumn . $highestRow;

                $sheet->getStyle($range)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                for ($column = 1; $column <= $highestColumnIndex; $column++) {
                    for ($row = 1; $row <= $highestRow; $row++) {
                        $cell = Coordinate::stringFromColumnIndex($column) . $row;
                        $sheet->getStyle($cell)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    }
                }
            },
        ];
    }
}
