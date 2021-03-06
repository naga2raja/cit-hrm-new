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
        return app('url')->asset('/public/'.$path, $secure);
    }
}

    function getProfileImage(){
        $user = Auth::user();
        $data = DB::table('employees')
                    ->where('user_id', $user->id)
                    ->selectRaw('profile_photo')
                    ->first();
        if($data && $data->profile_photo){
            return assetUrl($data->profile_photo);
        }else{
            return assetUrl("img/profiles/img-1.jpg");
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
        $employeeId = getEmployeeId(Auth::User()->id);
        $today = date('Y-m-d');

        $leave = new \App\Http\Controllers\Leave\Leave\LeaveController();
        $active_leave_period = $leave->getActiveLeavePeriod($employeeId);
        if(!$active_leave_period) {
            return [];
        }
        // $leaves = DB::table('m_leave_types')
        //     ->join('m_leave_entitlements', 'm_leave_entitlements.leave_type_id', 'm_leave_types.id')
        //     ->where('m_leave_entitlements.emp_number', $employeeId)
        //     ->where('m_leave_entitlements.from_date', '<=', $today)
        //     ->where('m_leave_entitlements.to_date', '>=', $today)
        //     ->selectRaw('m_leave_types.name, m_leave_entitlements.no_of_days, m_leave_entitlements.days_used, (m_leave_entitlements.no_of_days - m_leave_entitlements.days_used) as remaining_days')
        //     ->get();

        $leaves = DB::table('m_leave_entitlements')
                    ->join('m_leave_types', 'm_leave_types.id', 'm_leave_entitlements.leave_type_id')
                    ->join('employees', 'employees.id', 'm_leave_entitlements.emp_number')  
                    // ->leftJoin('t_leaves', 't_leaves.entitlement_id', 'm_leave_entitlements.id')
                    ->join('m_leave_periods', 'm_leave_periods.sub_unit_id', 'employees.company_location_id')
                    ->leftjoin('t_leaves', function($query){
                        $query->on('t_leaves.entitlement_id', '=', 'm_leave_entitlements.id')
                              ->whereIn('t_leaves.status', [1,2,3])
                              ->where('t_leaves.deleted_at', '=', NULL);
                    })
                    ->where('m_leave_entitlements.emp_number', $employeeId)
                    ->whereRaw(' from_date <= "'.$active_leave_period->end_period.'" AND to_date >= "'.$active_leave_period->start_period.'"')
                    // ->where('t_leaves.deleted_at', '=', NULL)  
                    ->where('m_leave_periods.status', '=', 1)
                    ->selectRaw('m_leave_types.name, m_leave_entitlements.no_of_days, IFNULL(SUM(t_leaves.length_days), 0) as days_used, (IFNULL(m_leave_entitlements.no_of_days, 0) - IFNULL(SUM(t_leaves.length_days), 0) ) as remaining_days')
                    ->groupBy('m_leave_entitlements.id')
                    ->orderBy('m_leave_types.name', 'ASC')
                    ->get();

                    // dd($leaves);

        return $leaves;
    }

    use App\tLog;
    function activityLog($action, $module, $action_by, $action_to, $module_id='0', $date) {

        if((strtolower($action) == "approved")||(strtolower($action) == "rejected")){
            $data = DB::table('t_logs')
                    ->where('module_id', $module_id)
                    ->where('module', $module)
                    ->where('status', 0)
                    ->update([
                        'status' => 1
                    ]);
        }
        $log = tLog::create([
            'action' => ucfirst(strtolower($action)),
            'module' => $module,
            'module_id' => $module_id,
            'date' => $date,
            'send_by' => $action_by,
            'send_to' => $action_to,
            'status' => 0
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
        $data = DB::table('t_employee_report_to')->where('employee_id', $employee_id)
                    ->selectRaw('GROUP_CONCAT(manager_id) as reporting_manager_ids')
                    ->first();        
        if($data && $data->reporting_manager_ids){
            $return = $data->reporting_manager_ids;
        } else {
            $adminUsers = getAllAdminUsers();
            $return = $adminUsers->admin_ids;
        }
        return $return;
    }

    function getAllAdminUsers() {
        $data = DB::table('employees')
                    ->join('users', 'users.id', 'employees.user_id')
                    ->join('model_has_roles', 'model_has_roles.model_id', 'employees.user_id')
                    ->where('model_has_roles.role_id', 1)
                    ->selectRaw('GROUP_CONCAT(employees.id) as admin_ids, GROUP_CONCAT(employees.email) as admin_emails')
                    ->first();
        return $data;
    }

    function getSuperAdminEmail() {
        $data = DB::table('users')
                    ->where('id', 1)
                    ->first();
        return $data->email;
    }

    function getSendToUsers($users) {
        $userArray = explode(',', $users);
       $data = DB::table('users')
                    ->whereIn('id', $userArray)
                    ->selectRaw('GROUP_CONCAT(users.name) as e_name')
                    ->first();
        return $data->e_name;
    }

    function getLocalDateTime($date) {
        $dt = new DateTime($date);
        $tz = new DateTimeZone('Asia/Kolkata'); // or whatever zone you're after
        if(@$_COOKIE['tz_client']) {            
            $tz = new DateTimeZone($_COOKIE['tz_client']);
        }
        $dt->setTimezone($tz);
        return $dt->format('Y-m-d h:i a');
    }