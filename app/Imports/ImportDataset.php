<?php

namespace App\Imports;

use App\Helpers\ImportModelHelper;
use App\Models\Alternative;
use App\Models\AlternativeCriteria;
use App\Models\Criteria;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportDataset implements ToModel, WithChunkReading, WithHeadingRow
{
    private array $criterias = [], $alternatives = [];
    private int $currentIndex = 0;
    private string $batch_id;

    public function __construct(string $id)
    {
        $this->batch_id = $id;
    }

    /** loop all alternatives
     *
     * @param array $row
     */

    public function model(array $row)
    {
        $data = array_filter(array_values($row), fn ($value) => $value !== null);

        if ($this->currentIndex == 0) {
            $this->criterias = ImportModelHelper::queryModel(new Criteria);
            $this->alternatives = Alternative::query()
            ->where('batch_id',$this->batch_id)
            ->where('status',1)
            ->oldest('id')
            ->pluck('id')
            ->toArray();
        } else {
            // 0 : A1, A2, etc.
            // remove the first element
            array_shift($data);

            foreach ($this->criterias as $i => $criteria) {
                AlternativeCriteria::query()
                    ->updateOrCreate(
                        [
                            'criteria_id' => $this->criterias[$i],
                            'batch_id' => $this->batch_id,
                            'alternative_id' => $this->alternatives[$this->currentIndex - 1],
                        ],
                        [
                            'score' => $data[$i]
                        ]
                    );
            }
        }


        $this->currentIndex++;
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
