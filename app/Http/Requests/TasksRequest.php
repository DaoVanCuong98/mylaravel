<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TasksRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|min:6',
            'description'=>'required',
            // 'title'=>'regex:/(?=.*[A-Z].*[a-z]){3}(?=.*[0-9]){3}/',
            // 'title' => 'regex:/^[A-Za-z]+[0-9]/',
            // 'photo'=>'required'
            
        ];
    }
    public function messages(){
        return[
            'title.required'=>'title bat buoc phai nhap',
            'description.required'=>'description bat buoc phai nhap',
            'title.min'=>'title phai nhap lon hon 6 ky tu',
            // 'title.regex'=>'title nhap chu va so',
            // 'photo.required'=>'anh bat buoc phai nhap',
        ];
    }
}
