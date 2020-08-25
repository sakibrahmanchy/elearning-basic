<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    public function rules()
    {
        return [

        ];
    }
}
