<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use App\Models\Pimpinan;
use Illuminate\Support\Str;

class PimpinanImport implements ToModel
{
    private $users;
            
    public function __construct()
    {
        $this->users = User::select('id', 'email')->get();
    }

    public function model(array $row)
        {
            $rem = Str::random(60);
            
            // if ($row[2] === 'pimpinan') {
            //     $pass = $row[1];
            // } elseif ($row[2] === 'pimpinan') {
            //     $pass = 'pimpinan123**';
            // }
            $user = $this->users->where('email', $row[1])->first();
            return new Pimpinan([
                'nama' => $row[0],
                'email' => $row[1],
                'unit' => $row[2],
                'user_id' => $user->id ?? NULL,
            ]);
        }    
}
