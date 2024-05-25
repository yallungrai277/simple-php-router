<?php

namespace JsonRai277\PhpRouter;

class Router
{
    /**
     * Handle incoming request.
     */
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

    /**
     * Handle get request.
     */
    public static function get($path = '/', $fileNameOrCallable = '')
    {
        return self::handle('GET', $path, $fileNameOrCallable);
    }

    /**
     * Handle post request.
     */
    public static function post($path = '/', $fileNameOrCallable = '')
    {
        return self::handle('POST', $path, $fileNameOrCallable);
    }

    /**
     * Handle put request.
     */
    public static function put($path = '/', $fileNameOrCallable = '')
    {
        return self::handle('PUT', $path, $fileNameOrCallable);
    }

    /**
     * Handle patch request.
     */
    public static function patch($path = '/', $fileNameOrCallable = '')
    {
        return self::handle('PATCH', $path, $fileNameOrCallable);
    }

    /**
     * Handle delete request.
     */
    public static function delete($path = '/', $fileNameOrCallable = '')
    {
        return self::handle('DELETE', $path, $fileNameOrCallable);
    }
}
