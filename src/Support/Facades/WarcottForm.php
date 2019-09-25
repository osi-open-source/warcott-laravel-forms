<?php

namespace Warcott\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Warcott\Form
 */
class WarcottForm extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'warcottForm';
    }
}
