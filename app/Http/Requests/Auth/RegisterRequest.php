<?php

namespace App\Http\Requests\Auth;

use App\DTO\Auth\RegisterUserDTO;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class RegisterRequest
 * @package App\Http\Requests\Auth\RegisterRequest
 */
class RegisterRequest extends Request
{
    private const ALLOWED_ROLES = ['student', 'teacher', 'parent', 'tutor'];

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'role' => ['required', 'string', Rule::in(self::ALLOWED_ROLES)],
        ];
    }

    /**
     * @return RegisterUserDTO
     */
    public function getRegistrationData(): RegisterUserDTO
    {
        return new RegisterUserDTO(
            $this->get('first_name'),
            $this->get('last_name'),
            $this->get('email'),
            $this->get('role'),
        );
    }
}
