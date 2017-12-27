<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class HttpsProtocol
{
    /**
     * @var  Application
     */
    private $app;

    /**
     * Environments to trust the proxies on.
     *
     * @var  array
     */
    private $envs = [
        'staging',
        'production',
    ];

    /**
     * @param  Application $app
     */
    public function __construct(Application $app) {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->app->environment($this->envs)) {

            $request->setTrustedHeaderName(Request::HEADER_FORWARDED, null);
            $request->setTrustedHeaderName(Request::HEADER_CLIENT_HOST, null);

            $request->setTrustedProxies([$request->getClientIp()]);

            return redirect()->secure($request->getRequestUri());

        }

        return $next($request);
    }
}
