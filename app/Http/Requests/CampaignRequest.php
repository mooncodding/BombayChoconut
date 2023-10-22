<?php

namespace App\Http\Requests;

use App\Models\Campaign;
use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name'=>'required|string|max:64',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_date',
            'applicable_on' => 'required|string',
            'discount_type' => 'nullable|string',
            'notes' => 'nullable',
            'discount_value' => 'nullable|regex:/^\d+(\.\d{1,2})?$/|max:64',
        ];
    }

    public function withValidator($validator)
    {   
        $validator->sometimes('discount_type', 'required', function($input) {
            return $input->applicable_on  == Campaign::STOREWIDE;
        });
        $validator->sometimes('discount_value', 'required', function($input) {
            return $input->applicable_on  == Campaign::STOREWIDE;
        });
    }
}
