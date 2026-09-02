<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserRepository implements UserRepositoryInterface
{

    public function create(array $data): User
    {
        $data['password'] = Hash::make(
            $data['password']
        );

        return User::create($data);
    }


    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)
            ->first();
    }


    public function findById(int $id): ?User
    {
        return User::find($id);
    }


    public function update(
        User $user,
        array $data
    ): bool {

        return $user->update($data);
    }


    public function delete(User $user): bool
    {
        return $user->delete();
    }

}
