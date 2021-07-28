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

    function getCurrentTime() {
        date_default_timezone_set('Asia/Kolkata');
        $currentDateTime = date('d-m-Y H:i a');
        date_default_timezone_set('UTC');
        return $currentDateTime;
    }

    function isPunchInEnabled()
    {
        
        $enabledFlag = 0;
        //check punch time module enabled for all
        $empSettings = DB::table('m_attendance_configures')->where('id', 4)->first();
        if($empSettings->action_flag) {
            $enabledFlag = 1;
        } else {
            $userId = Auth::User()->id;
            $employee = DB::table('employees')->where('user_id', $userId)->first();

            //check punch in/out enabled for specific employees
            if($empSettings) {
                $empIds = explode(',', $empSettings->employee_ids);
                if(in_array($employee->id, $empIds)) {
                    $enabledFlag = 1;
                }
            }                
        }
        return $enabledFlag;
        
        // return Auth::user()->id;
    }