<?php

namespace admin\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequestAdd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|unique:permission,name,'.$this->id,
            'module_child' => 'required',
            'description'  => 'required'
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
}
