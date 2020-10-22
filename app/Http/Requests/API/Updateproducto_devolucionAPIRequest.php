<?php

namespace App\Http\Requests\API;

use App\Models\producto_devolucion;
use InfyOm\Generator\Request\APIRequest;

class Updateproducto_devolucionAPIRequest extends APIRequest
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
        $rules = producto_devolucion::$rules;
        
        return $rules;
    }
}
