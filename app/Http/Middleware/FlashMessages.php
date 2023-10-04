<?php

namespace App\Http\Middleware;

class FlashMessages
{
    /**
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \RuntimeException
     */
    public function handle($request, $next)
    {


        if (!$request->ajax() && $request->isMethod('get')) {

            app('common.flash_message')->put($request->session()->pull('flash_messages') ?: []);

            return $next($request);
        }

        /** @var Response $response */
        $response = $next($request);

        if ($request->ajax()) {
            $messages = app('common.flash_message')->all();
            $response->headers->set('flash-messages', json_encode($messages));
        } else {
            $request->session()->put('flash_messages', app('common.flash_message')->all());
        }

        return $response;
    }
}
