<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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


        //lay phuong thuc dang hoat dong
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'insert': // name cua route dang hoat dong
                        $rule = [
                            'name' => 'required',
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
    public function message()  {
        return [
            'name.required' => 'Required to fill in the Name',
        ];
    }
}
