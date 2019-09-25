<?php

if (! function_exists('warcottDisplay')) {

    /**
     * Display Warcott Form (dataset)
     *
     * @param string $domainKey (you can pass comma separated list)
     * @param string|null $action
     * @param null|string $submitText
     * @return string
     */
    function warcottDisplay(string $domainKey, ?string $action = null, ?string $submitText = null)
    {
        return app('warcottForm')->display(explode(',', $domainKey), $action, $submitText);
    }
}

if(!function_exists('public_path'))
{
    /**
     * @param string|null $path
     * @return string
     */
    function public_path(string $path = null)
    {
        return rtrim(app()->basePath('public/' . $path), '/');
    }
}
