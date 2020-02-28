<?php

namespace Submtd\VinylGraphics\Commands;

use Illuminate\Console\Command;
use Submtd\VinylGraphics\Facades\UserFacade;

class UserCreate extends Command
{
    /**
     * command signature
     * @var string $signature
     */
    protected $signature = 'user:create';

    /**
     * command description
     * @var string $description
     */
    protected $description = 'Create a new user';

    /**
     * handle method
     * @return void
     */
    public function handle()
    {
        $name = $this->ask("Enter the user's name");
        $email = $this->ask("Enter the user's email");
        $passwordsMatch = false;
        while (!$passwordsMatch) {
            $password = $this->secret("Enter the user's password");
            $confirmPassword = $this->secret("Confirm the user's password");
            $passwordsMatch = $password == $confirmPassword;
            if (!$passwordsMatch) {
                $this->error('Passwords do not match');
            }
        }
        $admin = $this->confirm('Is this user an administrator?', false);
        try {
            $user = UserFacade::create($name, $email, $password, $admin);
            $this->table(null, [
                ['Id', $user->id],
                ['Name', $user->name],
                ['Email', $user->email],
                ['Admin', (bool) $user->admin],
            ]);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
