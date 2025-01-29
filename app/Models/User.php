<?php

namespace App\Models;

use App\DTO\Auth\RegisterUserDTO;
use App\Exceptions\WelcomeEmailNotificationException;
use App\Factories\EmailNotifications\WelcomeEmailNotificationFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models\User
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $role
 */
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    private const STUDENT_ROLE = 'student';
    private const TEACHER_ROLE = 'teacher';
    private const PARENT_ROLE = 'parent';
    private const TUTOR_ROLE = 'tutor';

    /** @var string[] $fillable */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'role',
    ];

    /**
     * @param RegisterUserDTO $userDTO
     * @return User
     */
    public function createUser(RegisterUserDTO $userDTO): User
    {
        return $this->create($userDTO->toArray());
    }

    /**
     * @return void
     * @throws WelcomeEmailNotificationException
     */
    public function sendWelcomeEmail(): void
    {
        $notificationFactory = new WelcomeEmailNotificationFactory();
        $this->notify($notificationFactory->getEmailNotificationInstance($this));
    }

    /**
     * @return bool
     */
    public function isStudent(): bool
    {
        return $this->role === self::STUDENT_ROLE;
    }

    /**
     * @return bool
     */
    public function isTeacher(): bool
    {
        return $this->role === self::TEACHER_ROLE;
    }

    /**
     * @return bool
     */
    public function isParent(): bool
    {
        return $this->role === self::PARENT_ROLE;
    }

    /**
     * @return bool
     */
    public function isTutor(): bool
    {
        return $this->role === self::TUTOR_ROLE;
    }

    /**
     * @return string[]
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
