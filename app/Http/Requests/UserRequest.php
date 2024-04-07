<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Request;

class UserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "id" => [ Rule::requiredIf($this->getMethod() == Request::METHOD_PUT) ],
            "name" => ["required","string"],
            "email"=> [
                        Rule::requiredIf( $this->getMethod() == Request::METHOD_POST ),
                        "email" ,
                        Rule::unique("users")->ignore($this?->id)
                    ],
            "password"=> "string",
        ];
    }
}
