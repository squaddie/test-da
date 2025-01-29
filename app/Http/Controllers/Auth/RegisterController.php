<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\WelcomeEmailNotificationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Traits\Responses\Auth\RegistrationResponsesTrait;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Auth\RegisterController
 */
class RegisterController extends Controller
{
    use RegistrationResponsesTrait;

    /** @var User $userModel */
    private User $userModel;

    /**
     * Here we are not going to use repositories, since it looks like abstraction sake of abstraction.
     * It is enough to only have a model.
     *
     * @param User $userModel
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * @param RegisterRequest $request
     * @return Response
     * @throws WelcomeEmailNotificationException
     */
    public function register(RegisterRequest $request): Response
    {
        $userInstance = $this->userModel->createUser($request->getRegistrationData());
        $userInstance->sendWelcomeEmail();

        return $this->userCreatedResponse();
    }
}
