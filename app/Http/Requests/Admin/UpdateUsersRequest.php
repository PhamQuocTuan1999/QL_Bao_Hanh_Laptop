<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UpdateUsersRequest extends FormRequest
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
            'name'=>'required|max:30|min:5',
            'nv_diaChi'=>'required|max:30|min:5',
            'sdt'=>'required|min:8|numeric',
            'nv_email'=>'required|max:50',
            'nv_gioiTinh'=>'required',
            'email'=>'required|max:30|min:5',
            'q_ma'=>'required',
        ];
    }
}
