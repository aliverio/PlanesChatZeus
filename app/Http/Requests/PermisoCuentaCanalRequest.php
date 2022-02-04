<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermisoCuentaCanalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "cuenta_id"     => "required",
            "usuario_id"    => "required",
            "usuario_token" => "required",
            "codigo_opcion" => "required",
        ];
        
		
		
		
		
    }
}
