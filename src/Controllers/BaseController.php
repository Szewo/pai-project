<?php

namespace App\Controllers;

use App\Exceptions\ViewNotFoundException;
use App\Routing\Request;
use App\Routing\RequestInterface;

class BaseController
{
    protected RequestInterface $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function renderView(string $viewName, array $params = []): string
    {
        $viewDir = VIEWS_DIR . $viewName . '.php';

        if (!file_exists($viewDir)) {
            throw new ViewNotFoundException('VIEW NOT FOUND');
        }

        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }

        ob_start();
        include $viewDir;
        return ob_get_clean();
    }

    protected function isGet(): bool {
        return $this->request->getMethod() === 'GET';
    }

    protected function isPost(): bool {
        return $this->request->getMethod() === 'POST';
    }
}