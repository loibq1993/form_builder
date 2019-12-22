<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormBuilderRequest extends FormRequest
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
            'title' => 'required|max:1000',
            'start_date' => 'required|date_format:"Y-m-d H:i"',
            'status' => 'required',
            'end_date' => 'nullable|date_format:"Y-m-d H:i"|after_or_equal:start_date',
        ];
    }
}
