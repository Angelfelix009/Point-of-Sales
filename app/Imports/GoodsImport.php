<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Goods;
class GoodsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        foreach ($collection as $row)
        {
            Goods::create([
                'name' =>trim($row[0]) ,
                'description' => trim($row[1]),
                'unit' => trim($row[2]),
                'price' => trim($row[3]),
                'user' => 'admin',
            ]);
        }
    }
}
