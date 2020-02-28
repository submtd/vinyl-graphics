<?php

namespace Submtd\VinylGraphics\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ValidLogin implements Rule
{
    /**
     * @var string $email
     */
    protected $email;

    /**
     * class constructor
     * @param string $email
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Determine if the validation rule passes.
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Auth::attempt(['email' => $this->email, 'password' => $value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid login credentials.';
    }
}
