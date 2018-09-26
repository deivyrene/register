<?php

namespace Siac\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EdificeRequest extends FormRequest
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
            'nameEdifice' => 'required',
            'addressEdifice' => 'required',
            'contactEdifice' => 'required',
            'emailEdifice' => 'required',
        ];
    }

    
}
