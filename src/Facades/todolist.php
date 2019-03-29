<?php

namespace evidenceekanem\todolist\Facades;

use Illuminate\Support\Facades\Facade;

class todolist extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'todolist';
    }
}
