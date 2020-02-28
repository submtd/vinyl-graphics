<?php

namespace Submtd\VinylGraphics\Commands;

use App\User;
use Illuminate\Console\Command;
use Submtd\VinylGraphics\Facades\UserFacade;

class UserUpdate extends Command
{
    /**
     * command signature
     * @var string $signature
     */
    protected $signature = 'user:update {id?}';

    /**
     * command description
     * @var string $description
     */
    protected $description = 'Update a user';

    /**
     * handle method
     * @return void
     */
    public function handle()
    {
        $user = User::find($this->argument('id'));
        while (!$user) {
            $searchString = $this->ask('Please enter as earch string to find the user');
            if (!$users = User::where(function ($query) use ($searchString) {
                return $query->where('name', 'like', "%$searchString%")->orWhere('email', 'like', "%$searchString%");
            })->get()) {
                $this->error('No users found matching the search strig');
            } else {
                $foundUsers = [];
                foreach ($users as $foundUser) {
                    $foundUsers['id-' . $foundUser->id] = $foundUser->name . ' <' . $foundUser->email . '>';
                }
                $id = ltrim($this->choice('Please choose a user', $foundUsers, 0), 'id-');
                $user = User::find($id);
            }
        }
        $this->table(null, [
            ['Id', $user->id],
            ['Name', $user->name],
            ['Email', $user->email],
            ['Admin', (bool) $user->admin],
        ]);
        $attributes = [];
        if ($this->confirm("Would you like to update the user's name?")) {
            $attributes['name'] = $this->ask("Enter the user's new name");
        }
        if ($this->confirm("Would you like to update the user's email?")) {
            $attributes['email'] = $this->ask("Enter the user's new email");
        }
        if ($this->confirm("Would you like to update the user's password?")) {
            $attributes['password'] = $this->ask("Enter the user's new password");
        }
        if ($this->confirm("Would you like to update the user's admin status?")) {
            $attributes['admin'] = $this->confirm('Is this user an administrator?', false);
        }
        try {
            $user = UserFacade::update($user->id, $attributes);
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
