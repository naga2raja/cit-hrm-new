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

    function getProfileImage(){
        $user = Auth::user();
        $data = DB::table('employees')
                    ->where('id', $user->id)
                    ->selectRaw('profile_photo')
                    ->first();
        if($data->profile_photo){
            return $data->profile_photo;
        }else{
            return "img/profiles/img-1.jpg";
        }
    }

    // to get project name from project_id
    function getProjectName($project_id){
        $project = DB::table('m_projects')->where('id', $project_id)->first();
        $project_name = '';
        if($project){
            $project_name = $project->project_name;
        }
        return $project_name;
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

    function currentTimesheetStatus($index)
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

    function getEmployeeId($userId) {
        $employee = DB::table('employees')->where('user_id', $userId)->first();
        return $employee->id;
    }

    function attendanceDeleteEnabled() {
        // Supervisor can add/edit/delete attendance records of subordinates
        $conf = DB::table('m_attendance_configures')->where('id', 3)->first();
        return $conf->action_flag;
    }

    function employeeDeleteEnabled() {
        // Employee can edit/delete own attendance records
        $conf = DB::table('m_attendance_configures')->where('id', 2)->first();
        return $conf->action_flag;
    }

    function currentUserLeaveBalance() {
        $userId = getEmployeeId(Auth::User()->id);
        $today = date('Y-m-d');
        $leaves = DB::table('m_leave_types')
            ->join('m_leave_entitlements', 'm_leave_entitlements.leave_type_id', 'm_leave_types.id')
            ->where('m_leave_entitlements.emp_number', $userId)
            ->where('m_leave_entitlements.from_date', '<=', $today)
            ->where('m_leave_entitlements.to_date', '>=', $today)
            ->selectRaw('m_leave_types.name, m_leave_entitlements.no_of_days, m_leave_entitlements.days_used, (m_leave_entitlements.no_of_days - m_leave_entitlements.days_used) as remaining_days')
            ->get();
        return $leaves;
    }

    use App\tLog;
    function activityLog($action, $module, $action_by, $action_to) {
        $userId = getEmployeeId(Auth::User()->id);
        $today = date('Y-m-d h:i:s');

        $log = tLog::create([
            'action' => ucfirst(strtolower($action)),
            'module' => $module,
            'send_by' => $action_by,
            'send_to' => $action_to,
            'date' => $today,
        ]);

        return $log;
    }

    function getCurrentUserAssignedProjects() {
        $employeeId = getEmployeeId(Auth::User()->id);
        $roleName = '';
        if( Auth::user()->hasRole('Manager') ) {
            $roleName = 'Manager';
        } elseif( Auth::user()->hasRole('Employee') ) {
            $roleName = 'Employee';
        } else {
            $roleName = 'Admin';
        }
        $out['role'] = $roleName;
        $employees = DB::table('t_project_employees')->where('employee_id', $employeeId)->pluck('project_id')->toArray();
        $managers = DB::table('t_project_managers')->where('employee_id', $employeeId)->pluck('project_id')->toArray();
        $admins = DB::table('t_project_admins')->where('admin_id', $employeeId)->pluck('project_id')->toArray();
        $employees = array_merge($employees, $managers, $admins);
        $out['project_ids'] = array_unique($employees);
        return $out;
    }

    function getMyReportingManager($employee_id) {
        $data = DB::table('t_employee_report_to')->where('employee_id', $employee_id)->first(); 
        $return = 0;
        if($data){
           $return = $data->manager_id;
        }   
        return $return;
    }