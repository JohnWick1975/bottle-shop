<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder
{
    const ROLE_ADMIN = 1;
    const ROLE_USER = 0;

    public function setRole(int $role): void
    {
        $this->role = $role;
    }

    public function getRole(): ?string
    {
        return $this->role ?? null;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getUsername(): ?string
    {
        return $this->username ?? null;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): ?string
    {
        return $this->email ?? null;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): ?string
    {
        return $this->password ?? null;
    }

    protected function setId(int $id)
    {
        $this->id = $id;
    }

    protected function getId()
    {
        return $this->id ?? null;
    }

}