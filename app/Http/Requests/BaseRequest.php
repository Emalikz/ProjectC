<?php

namespace App\Http\Requests;

use App\Traits\Validable;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest{
    use Validable;
    public function authorize(){
        return true;
    }
}
