<?php

namespace Submtd\VinylGraphics\Commands;

use App\User;
use Illuminate\Console\Command;

class UserList extends Command
{
    /**
     * command signature
     * @var string $signature
     */
    protected $signature = 'user:list';

    /**
     * command description
     * @var string $description
     */
    protected $description = 'List all users';

    /**
     * handle method
     * @return void
     */
    public function handle()
    {
        $users = User::all();
        $header = ['Id', 'Name', 'Email', 'Admin', 'Created', 'Updated', 'Last Login'];
        $rows = [];
        foreach ($users as $user) {
            $rows[] = [
                $user->id,
                $user->name,
                $user->email,
                (bool) $user->admin,
                $user->created_at,
                $user->updated_at,
                $user->last_login_at,
            ];
        }
        $this->table($header, $rows);
        $this->warn(count($rows) . ' total users');
    }
}
