<?php

if (! function_exists('container')) {
    /**
     * 获取容器实例.
     * @return \Psr\Container\ContainerInterface
     */
    function container(): Psr\Container\ContainerInterface
    {
        return \Hyperf\Utils\ApplicationContext::getContainer();
    }
}

if (! function_exists('getHttpRequest')) {
    /**
     *  获取HTTP请求。
     *
     * @return \Hyperf\HttpServer\Contract\RequestInterface
     */
    function getHttpRequest(): Hyperf\HttpServer\Contract\RequestInterface
    {
        return container()->get(\Hyperf\HttpServer\Request::class);
    }
}

if (!function_exists('getHttpClientIp')) {

    function getHttpClientIp()
    {
        $request = getHttpRequest();
        $serverParams = $request->getServerParams();
        $ip = $serverParams['remote_addr'] ?? '0.0.0.0';
        $headers = $request->getHeaders();

        if (isset($headers['x-real-ip'])) {
            $ip = $headers['x-real-ip'][0];
        } elseif (isset($headers['x-forwarded-for'])) {
            $ip = $headers['x-forwarded-for'][0];
        } elseif (isset($headers['http_x_forwarded_for'])) {
            $ip = $headers['http_x_forwarded_for'][0];
        }

        return $ip;
    }

    if (! function_exists('getRoutePath')) {
        /**
         * 获取访问的路由.
         *
         * @return string
         */
        function getRoutePath()
        {
            $dispatcher = getHttpRequest()->getAttribute('Hyperf\HttpServer\Router\Dispatched');

            return sprintf('%s:%s', getHttpRequest()->getMethod(), $dispatcher->handler->route ?? getHttpRequest()->getRequestUri());
        }
    }

    if (! function_exists('getEventDispatcherFactory')) {
        /**
         * 获取事件分发器.
         *
         * @return \Psr\EventDispatcher\EventDispatcherInterface
         */
        function getEventDispatcherFactory()
        {
            return container()->get(\Hyperf\Event\EventDispatcher::class);
        }
    }
}
