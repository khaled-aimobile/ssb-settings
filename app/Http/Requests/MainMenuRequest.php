<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class MainMenuRequest extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        if (isset($this->request->all()['menu_id']) && empty($this->request->all()['menu_id'])) {
            return [
                "name" => "required",
                "menu_id" => "required|numeric",
                "order" => "required|numeric",
           ];
        }
        return [
            "name" => "required",
            "order" => "required|numeric"
       ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }
}
