<?php

namespace App\Http\Requests\ExpenseRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Update this logic if you need to check user permissions
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'amount' => [
                'required',
                'numeric',
                'min:0.01'
            ],

            'category' => [
                'required',
                'string',
            ],

            'expense_date' => [
                'required',
                'date'
            ],

        ];
    }

    /**
     * Customize the error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'amount.required' => 'The amount is required.',
            'amount.numeric' => 'The amount must be a number.',
            'amount.min' => 'The amount must be at least 0.01.',
            'category_id.required' => 'The category is required.',
            'date.required' => 'The date is required.',
            'date.date' => 'The date must be a valid date.',
        ];
    }
}
