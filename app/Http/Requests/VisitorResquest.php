<?php

namespace Siac\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorRequest extends FormRequest
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
            'nameVisitor' => 'required',
            'surnameVisitor' => 'required',
            'rutVisitor'  => 'required',
            'emailVisitor'  => 'required',
            'phoneVisitor'  => 'required',
            'addressVisitor'  => 'required',
            'companyVisitor'  => 'required|string|min:6|max:9',
        ];
    }
}
