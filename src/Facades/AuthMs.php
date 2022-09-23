<?php

namespace Ilhamhanif15\AuthMs\Facades;

use Illuminate\Support\Facades\Facade;

class AuthMs extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'authms';
    }
}
