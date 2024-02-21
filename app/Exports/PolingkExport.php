<?php

namespace App\Exports;

use App\Models\Poling;
use App\Models\Siswa;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PolingkExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function __construct($siswa_id)
    {
        $this->siswa_id = $siswa_id;
    }

    public function query()
    {
        return Poling::query()->where('siswa_id', $this->siswa_id);
    }

    public function map($poling): array
    {
        return [
            $poling->siswa->nama,
            $poling->feed->nama,
            $poling->cerita,
            \Carbon\Carbon::parse($poling->tglcek)->format('d-m-Y'),
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Feedback',
            'Cerita',
            'Tanggal',
        ];
    }
}
