<?php

namespace App\Traits\Responses\Validation;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class ValidationResponsesTrait
 * @package App\Traits\Responses\Validation\ValidationResponsesTrait
 */
trait ValidationResponsesTrait
{
    /**
     * @return Response
     */
    public function ipBlockedResponse(): Response
    {
        return response(['message' => __('validation.ip_blocked')], Response::HTTP_FORBIDDEN);
    }
}
