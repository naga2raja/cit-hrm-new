<?php
if (! function_exists('assetUrl')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function assetUrl($path, $secure = null)
    {
        return app('url')->asset('/'.$path, $secure);
    }
}