<?php

namespace App\Http\Requests\IpAddress;

use App\Helpers\RequestValidationErrorFormat;

class IpAddressUpdateRequest extends RequestValidationErrorFormat
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     * @var bool
     */
    protected $stopOnFirstFailure = true;

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
            'label' => 'required|string',
        ];
    }
}
