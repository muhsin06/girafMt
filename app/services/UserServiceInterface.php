<?php

namespace App\Services;

interface UserServiceInterface
{
    public function createUser(array $data);
    public function hash(string $password): string;
}
