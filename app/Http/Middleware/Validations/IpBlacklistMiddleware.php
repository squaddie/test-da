<?php

namespace App\Http\Middleware\Validations;

use App\Services\Validator\IpValidatorService;
use App\Traits\Responses\Validation\ValidationResponsesTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IpBlacklistMiddleware
 * @package App\Http\Middleware\Validations\IpBlacklistMiddleware
 */
class IpBlacklistMiddleware
{
    use ValidationResponsesTrait;

    /** @var IpValidatorService $ipValidatorService */
    private IpValidatorService $ipValidatorService;

    /**
     * @param IpValidatorService $ipValidatorService
     */
    public function __construct(IpValidatorService $ipValidatorService)
    {
        $this->ipValidatorService = $ipValidatorService;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->ipValidatorService->isBlocked($request->getClientIp())) {
            return $this->ipBlockedResponse();
        }

        return $next($request);
    }
}
