<?php

namespace App\Controllers;

use App\Exceptions\ViewNotFoundException;

abstract class BaseController
{
    public function renderView(string $viewName, array $params = []): string {
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
}