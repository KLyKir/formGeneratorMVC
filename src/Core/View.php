<?php

namespace App\Core;

class View
{
    private const VIEW_PATH = __DIR__ . "/../views/";

    public function render(string $callback, array $params = []): bool|string
    {
        $layout = $this->renderLayout();
        $view = $this->renderView($callback, $params);
        return str_replace('{{view}}', $view, $layout);
    }

    private function renderView(string $callback, array $params = []): bool|string
    {
        foreach ($params as $keyParam => $paramValue) {
            $$keyParam = $paramValue;
        }
        ob_start();
        include_once self::VIEW_PATH . "{$callback}.php";
        return ob_get_clean();
    }

    private function renderLayout(): bool|string
    {
        ob_start();
        include_once self::VIEW_PATH . "layout.php";
        return ob_get_clean();
    }
}
