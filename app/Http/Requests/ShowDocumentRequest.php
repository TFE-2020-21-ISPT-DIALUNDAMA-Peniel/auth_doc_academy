<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class ShowDocumentRequest extends FormRequest
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
            'code' => 'bail|required|min:5|exists:documents,ref',
            'code.codeExist' => 'Code Invalide'
        ];
    }
}
