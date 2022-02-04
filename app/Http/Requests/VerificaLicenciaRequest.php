<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerificaLicenciaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "usuario_token" => "required",
            "email" => "required",
        ];
    }
}
