<?php

namespace Modules\Sms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Sms\Dto\SendSmsDto;

class SendSmsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mobile_number' => 'required|ir_mobile',
            'message' => 'nullable|persian_alpha_eng_num',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function getDto(): SendSmsDto
    {
        return SendSmsDto::fromArray($this->validated());
    }
}
