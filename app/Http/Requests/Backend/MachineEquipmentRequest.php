<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class MachineEquipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'machine_type' => 'required',
            'model_designation' => 'required',
            'no_of_machine' => 'required',
            'machine_builder' => 'required',
            'country_origin' => 'required'
        ];
    }
}