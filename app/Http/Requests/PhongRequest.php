<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rule = [];
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'insert':
                        $rule = [
                            'name' => 'required',
                            'soLuong' => 'required',
                            'price' => 'required',
                            'description' => 'required',
                            'note' => 'required'
                        ];
                        break;
                    case 'edit':
                        $rule = [
                            'name' => 'required',
                            'soLuong' => 'required',
                            'price' => 'required',
                            'description' => 'required',
                            'note' => 'required'
                        ];
                        break;
                    default:
                        # code...
                        break;
                }
                break;

            default:
                # code...
                break;
        }
        return $rule;
    }
    public function messages()
    {
        return [
            'name.required' => 'Required to fill in the Name',
            'soLuong.required' => 'Required to fill in the Quantity',
            'price.required' => 'Required to fill in the Price',
            'description.required' => 'Required to fill in the Description',
            'note.required' => 'Required to fill in the Note'
        ];
    }
}