<?php

namespace App\Routing;

interface RequestInterface
{
    /**
     * Get requested URL.
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Get HTTP method.
     *
     * @return string
     */
    public function getMethod(): string;
}