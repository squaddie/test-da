<?php

namespace App\DTO\Auth;

/**
 * Class RegisterUserDTO
 * @package App\DTO\Auth\RegisterUserDTO
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $role
 */
class RegisterUserDTO
{
    /** @var string $firstName */
    private string $firstName;
    /** @var string $lastName */
    private string $lastName;
    /** @var string $email */
    private string $email;
   /** @var string $role */
    private string $role;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $role
     */
    public function __construct(string $firstName, string $lastName, string $email, string $role)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->role = $role;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'role' => $this->role,
        ];
    }
}
