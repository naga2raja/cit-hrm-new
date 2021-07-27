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

    function hoursAndMins($time, $format = '%02d:%02d')
    {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

    function currentPunchStatus($index)
    {
        $status = [
            '0' => 'Not submitted',
            '1' => 'Submitted',
            '2' => 'Approved',
            '3' => 'Rejected'
        ];

        return $status[$index];
    }

    function punchStatus()
    {
        $status = [
            '0' => 'Not submitted',
            '1' => 'Submitted',
            '2' => 'Approved',
            '3' => 'Rejected'
        ];
        return $status;
    }
}