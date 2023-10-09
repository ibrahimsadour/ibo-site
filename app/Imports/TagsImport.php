<?php

namespace App\Imports;
use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TagsImport implements ToCollection, WithHeadingRow,WithValidation
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
                    'description'=>$row['description'],
                    'seo_title'=>$row['seo_title'].' '. trans('front/home-blade.in').' '.get_default_country().' '.trans('front/home-blade.24_hours_a_day'),
                    'seo_keyword'=>$row['seo_keyword'],
                    'seo_description'=> ' '.trans('front/home-blade.We_provide_you_with_the_best_service').' '.$row['seo_description']. ' '.trans('front/home-blade.in_all_cities').' '.get_default_country().' '.trans('front/home-blade.Call_24_hours_a_day_so_we_can_reach_you_as_quickly_as_possible'),
                    'active'=>'1',
    
                ];
            
            Tag::create($data);
        }
    }

    public function rules(): array
    {
        return[
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'seo_title'=>'required',
            'seo_keyword'=>'required',
            'seo_description'=>'required',

        ];
    }
}
