<?php

namespace App\Services\Validator;

/**
 * Class IpValidatorService
 * @package App\Services\Validator\IpValidatorService
 */
class IpValidatorService
{
    private const BLOCKED_IPS = [];

    /**
     * To test it you can simply return true in the very top of the method, this way you will see IP validator middleware return an error.
     *
     * @param string|null $ip
     * @return bool
     */
    public function isBlocked(?string $ip): bool
    {
        if (is_null($ip)) {
            return true;
        }

        return in_array($ip, self::BLOCKED_IPS);
    }
}
