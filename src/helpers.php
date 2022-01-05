<?php

declare(strict_types=1);

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

if (! function_exists('getHttpClientIp')) {
    /**
     * 获取客户端ip.
     *
     * @return mixed|string
     */
    function getHttpClientIp()
    {
        if ($ip = getHttpRequest()->getHeaderLine('x-real-ip')) {
            return $ip;
        }
        if ($ip = getHttpRequest()->getHeaderLine('x-forwarded-for')) {
            return $ip;
        }

        return getHttpRequest()->getServerParams()['remote_addr'] ?? '';
    }
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

if (! function_exists('getRegion')) {
    /**
     * 通过IP获取城市.
     *
     * @param $ip
     * @return mixed
     */
    function getRegion($ip = '')
    {
        try {
            $data = \Zhuzhichao\IpLocationZh\Ip::find($ip);
            $country = $data[0] ?? '中国';
            $province = $data[1] ?? '';
            $city = $data[2] ?? '';
            $township = $data[3] ?? '';
            $arr = array_unique([$country, $province, $city, $township]);

            return implode('', $arr);
        } catch (Throwable $exception) {
            return $exception->getMessage();
        }
    }
}
