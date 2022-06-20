<?php

namespace App\Routing;

class Request implements RequestInterface
{

    /**
     * {@inheritDoc}
     */
    public function getUrl(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}