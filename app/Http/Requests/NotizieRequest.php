<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotizieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titolo_notizia' => 'required|min:5|max:255',
            'notizia' => 'required|min:5',
            'data_notizia' => 'required|date',
            'users_id' => 'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titolo_notizia.required' => 'Titolo richiesto',
            'notizia.required' => 'Testo richiesto',
            'data_notizia.required' => 'Data richiesta',
            'users_id.required' => 'Autore richiesto',
        ];
    }
}
