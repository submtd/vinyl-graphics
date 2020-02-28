<?php

namespace Submtd\VinylGraphics\Services;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Submtd\VinylGraphics\Exceptions\UserException;

class UserService
{
    /**
     * Add a user
     * @param string $name
     * @param string $email
     * @param string $password
     * @param bool $admin
     * @return App\User
     * @throws Submtd\VinylGraphics\Exceptions\UserException
     */
    public function create(
        string $name,
        string $email,
        string $password,
        bool $admin = false
    ) : User {
        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'admin' => $admin,
        ], [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:App\User,email',
            'password' => 'required|min:8|max:255',
            'admin' => 'required|boolean',
        ]);
        if ($validator->fails()) {
            throw UserException::validationFailed($validator->getMessageBag()->first());
        }
        try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
            if ($admin) {
                $user->admin = $admin;
                $user->save();
            }
            return $user;
        } catch (\Exception $e) {
            throw UserException::unknownError($e->getMessage(), $e->getCode(), $e->getPrevious());
        }
    }

    /**
     * Update user
     * @param int $id
     * @param array $attributes
     * @return App\User
     * @throws Submtd\VinylGraphics\Exceptions\UserException
     */
    public function update(int $id, array $attributes = []) : User
    {
        if (!$user = User::find($id)) {
            throw UserException::userNotFound();
        }
        $validator = Validator::make($attributes, [
            'name' => 'nullable|max:255',
            'email' => 'nullable|email|max:255|unique:App\User,email,id,' . $user->id,
            'password' => 'nullable|min:8|max:255',
            'admin' => 'nullable|boolean',
        ]);
        if ($validator->fails()) {
            throw UserException::validationFailed($validator->getMessageBag()->first());
        }
        try {
            if (isset($attributes['password'])) {
                $attributes['password'] = Hash::make($attributes['password']);
            }
            $user->update($attributes);
            if (isset($attributes['admin'])) {
                $user->admin = $attributes['admin'];
                $user->save();
            }
            return $user;
        } catch (\Exception $e) {
            throw UserException::unknownError($e->getMessage(), $e->getCode(), $e->getPrevious());
        }
    }
}
