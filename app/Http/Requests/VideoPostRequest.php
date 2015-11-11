<?php

namespace App\Http\Requests;

class VideoPostRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "comentario" => "required",
            "file" => "required|mimes:avi,mp4|size:100000"
        ];
    }

}
