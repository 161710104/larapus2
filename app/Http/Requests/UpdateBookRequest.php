<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\StoreBookRequest;

class UpdateBookRequest extends StoreBookRequest
{   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules['title'] = 'required|unique:books,title,' . $this->route('book');
        return $rules;
    }
}
