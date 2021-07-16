<?php

namespace App\Http\Requests\Leave;

use Illuminate\Foundation\Http\FormRequest;

class ApplyLeaveRequest extends FormRequest
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
            'leave_type_id' => 'required',
            'leave_balance' => 'required|numeric|gt:0',
            'from_date' => 'required|date_format:d/m/Y',
            'to_date' => 'required|date_format:d/m/Y|after_or_equal:from_date',
            'leave_duration' => 'required',
            'number_of_days' => 'required|numeric|gt:0',
            'reason' => 'required',
        ];
    }
}
