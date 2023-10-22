<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportProduct implements ToModel ,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        if ($product = Product::where('code',$row['code'])->first()) {
            //Update Old Records
            if ($product->count() >0) {
                $product->update([
                    'stock_quantity' => $row['stock_quantity'],
                    'retail_price' => $row['retail_price'],
                ]);
            }
        }
    }
    public function rules(): array
    {
        //Validation
        return [
            // Above is alias for as it always validates in batches
            '*.code'=>'required',
        ];
    }
}
