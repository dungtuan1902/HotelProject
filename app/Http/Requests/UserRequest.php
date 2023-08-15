<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    case 'add': // name cua route dang hoat dong
                        $rule = [
                            'name' => 'required',
                            'address' => 'required|max:255',
                            'email' => 'required|unique:table_user',
                            'phone' => 'required|unique:table_user|max:10',
                            'username' => 'required|unique:table_user',
                            'password' => 'required',
                        ];
                        break;
                    // case 'login':
                    //     $rule = [
                    //         'email' => 'required',
                    //         'password' => 'required',
                    //     ];
                    //     break;
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
            'address.required' => 'Required to fill in the Address',
            'address.max' => 'Address is too long',
            'email.required' => 'Required to fill in the Email',
            'email.unique' => 'Email already exists',
            'phone.required' => 'Required to fill in the Phone',
            'phone.unique' => 'Phone already exists',
            'username.required' => 'Required to fill in the Username',
            'username.unique' => 'Username already exists',
            'password.required' => 'Required to fill in the Password',
        ];
    }
}