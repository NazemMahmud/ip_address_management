<?php

namespace App\Http\Requests\IpAddress;

use App\Helpers\RequestValidationErrorFormat;

class IpAddressCreateRequest extends RequestValidationErrorFormat
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
            'ip' => 'required|ip|unique:ip_addresses',
            'label' => 'required|string',
        ];
    }
}
