<?php

namespace App\Traits\Responses\Auth;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class RegistrationResponsesTrait
 * @package App\Traits\Responses\Auth\RegistrationResponsesTrait
 */
trait RegistrationResponsesTrait
{
    /**
     * @return Response
     */
    public function userCreatedResponse(): Response
    {
        return response(['message' => __('auth.user_created')], Response::HTTP_CREATED);
    }
}
