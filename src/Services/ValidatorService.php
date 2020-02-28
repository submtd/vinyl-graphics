<?php

namespace Submtd\VinylGraphics\Services;

use Illuminate\Support\Facades\Validator;

class ValidatorService
{
    public function validate(array $data = [], array $rules = [])
    {
    }

    protected function validateField($data, $rules)
    {
        $validator = Validator::make([
            'field' => $data,
        ], [
            'field' => $rules,
        ]);
        if ($validator->fails()) {
        }
    }
}
