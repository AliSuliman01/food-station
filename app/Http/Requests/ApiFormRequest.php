<?php

namespace  App\Http\Requests;

use App\Exceptions\GeneralException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

abstract class ApiFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        $e = (new ValidationException($validator));

        throw new GeneralException(collect($e->errors())->values()[0][0],$e->getTrace(),400);
    }
    public function validationData(): array
    {
        return $this->all() + $this->route()->parameters + $this->json()->all();
    }

    public abstract function rules();


}
