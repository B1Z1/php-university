<?php

class User {
    public readonly int $id;
    public readonly string $name;
    public readonly string $surname;
    public readonly string $email;
    public readonly string $login;
    public readonly string $password;
    public readonly string $address;
    public readonly int $degreeId;
    public readonly Permissions $permissions;

    public function __construct(
        int    $id,
        string $name,
        string $surname,
        string $email,
        string $login,
        string $password,
        string $address,
        int    $degreeId,
        int    $permissionId
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
        $this->address = $address;
        $this->degreeId = $degreeId;
        $this->permissions = Permissions::from($permissionId);
    }
}
