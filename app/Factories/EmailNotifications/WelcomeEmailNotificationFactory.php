<?php

namespace App\Factories\EmailNotifications;

use App\Exceptions\WelcomeEmailNotificationException;
use App\Models\User;
use App\Notifications\WelcomeEmail\ParentEmailNotification;
use App\Notifications\WelcomeEmail\StudentEmailNotification;
use App\Notifications\WelcomeEmail\TeacherEmailNotification;
use App\Notifications\WelcomeEmail\TutorEmailNotification;
use Illuminate\Notifications\Notification;

/**
 * Class WelcomeEmailNotificationFactory
 * @package App\Factories\EmailNotifications\WelcomeEmailNotificationFactory
 */
class WelcomeEmailNotificationFactory
{
    /**
     * All the notifications were generated by artisan command, and I wasn't edit them.
     * It is just an example of how I would send an email for this particular case (laravel built in mechanism).
     *
     * @param User $user
     * @return Notification
     * @throws WelcomeEmailNotificationException
     */
    public function getEmailNotificationInstance(User $user): Notification
    {
        if ($user->isStudent()) {
            return new StudentEmailNotification();
        }

        if ($user->isTeacher()) {
            return new TeacherEmailNotification();
        }

        if ($user->isParent()) {
            return new ParentEmailNotification();
        }

        if ($user->isTutor()) {
            return new TutorEmailNotification();
        }

        throw new WelcomeEmailNotificationException();
    }
}
