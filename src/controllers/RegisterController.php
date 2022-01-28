<?php

class RegisterController {
    private $name;
    private $surname;
    private $email;
    private $login;
    private $password;
    private $address;
    private $hobbies;
    private $degreeId;

    private $userRepository;

    public function __construct(
        $name,
        $surname,
        $email,
        $login,
        $password,
        $address,
        $hobbies,
        $degreeId
    ) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
        $this->address = $address;
        $this->hobbies = $hobbies;
        $this->degreeId = $degreeId;

        $this->userRepository = new UserRepository();
    }

    public function register() {
        return $this->userRepository->addUser(
            $this->name,
            $this->surname,
            $this->email,
            $this->login,
            $this->password,
            $this->address,
            $this->degreeId
        );
    }
}
