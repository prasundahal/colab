<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Cache;

class UserRepository implements UserRepositoryInterface{
    public function getAllUsers(){
        $users = Cache::remember('allUsers','60*60', function(){
            return User::orderBy('id','desc')->get();
        });
        return $users;
    }
    public function getUserById($userId){
        return User::findOrFail($userId);
    }
    public function deleteUser($userId){
        Cache::forget('allUsers');
        return User::destroy($userId);
    }
    public function createUser(array $userDetails){
        Cache::forget('allUsers');
        $userDetails['password'] = encrypt('password');
        return User::create($userDetails);
    }
    public function updateUser($userId, array $newDetails){
        Cache::forget('allUsers');
        return User::whereId($userId)->update($newDetails);
    }
}