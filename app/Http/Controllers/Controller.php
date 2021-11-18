<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function validate(array $data, array $rules)
    {
        $message = '';
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $message = implode(',', $validator->errors()->all());
            return $message;
        }
    }
}
