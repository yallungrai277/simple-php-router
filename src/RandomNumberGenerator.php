<?php

namespace JsonRai277\PhpRouter;

class RandomNumberGenerator
{
    public function __construct()
    {
        echo rand(1, 100000);
    }
}
