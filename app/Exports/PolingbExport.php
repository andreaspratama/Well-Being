<?php

namespace App\Exports;

use App\Models\Polingdua;
use App\Models\Siswa;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PolingbExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function query()
    {
        return Polingdua::query()->where('nama', $this->nama);
    }

    public function map($poling): array
    {
        return [
            $poling->nama,
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
