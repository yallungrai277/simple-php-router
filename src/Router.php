<?php

class Router
{
    public static function handle($method = 'GET', $path = '/', $fileNameOrCallable = '')
    {
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];
        if ($currentMethod != $method) {
            return false;
        }

        $root = '';
        $pattern = '#^' . $root . $path . '$#siD';
        if (preg_match($pattern, $currentUri)) {
            if (is_callable($fileNameOrCallable)) {
                return $fileNameOrCallable();
            }
            require_once $fileNameOrCallable;
            exit();
        }

        return false;
    }

    public static function get($path = '/', $fileNameOrCallable = '')
    {
        return self::handle('GET', $path, $fileNameOrCallable);
    }

    public static function post($path = '/', $fileNameOrCallable = '')
    {
        return self::handle('POST', $path, $fileNameOrCallable);
    }

    public static function put($path = '/', $fileNameOrCallable = '')
    {
        return self::handle('PUT', $path, $fileNameOrCallable);
    }

    public static function patch($path = '/', $fileNameOrCallable = '')
    {
        return self::handle('PATCH', $path, $fileNameOrCallable);
    }

    public static function delete($path = '/', $fileNameOrCallable = '')
    {
        return self::handle('DELETE', $path, $fileNameOrCallable);
    }
}