<?php

namespace App\Imports;

use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CitiesImport implements ToCollection, WithHeadingRow,WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
                $data=[
                    'name'=>$row['name'],
                    'slug'=>Str::slug($row['slug'],'-', null),
                    'active'=>'1',
    
                ];
            
            City::create($data);
        }
    }

    public function rules(): array
    {
        return[
            'name'=>'required',
            'slug'=>'required',
        ];
    }
}
