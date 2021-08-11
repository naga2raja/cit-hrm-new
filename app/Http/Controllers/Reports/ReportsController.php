<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Leave\Leave\LeaveController;
use Illuminate\Http\Request;
use App\Employee;
use App\Exports\EmployeesReportExport;
use App\Exports\LeavesReportExport;
use App\Exports\AttendanceReportExport;
use App\Exports\TimesheetReportExport;
use App\Exports\ProductivityReportExport;
use App\Exports\LeaveBalanceReportExport;
use DateTime;
use Excel;
use App\mJobTitle;
use App\tLeave;
use App\tLeaveRequest;
use App\mLeaveStatus;
use App\mLeaveType;
use App\tPunchInOut;
use App\mProject;
use App\tTimesheetItem;
use App\tActivity;
use App\mLeaveEntitlement;
use Auth;


class ReportsController extends Controller
{
    public function index(Request $request) {
        $data = [];

        if($request->report == 'employee_report') {
           $data = $this->getEmployeesReport($request);
            if($request->export)
                return (new EmployeesReportExport($data))->download('employees.xlsx');            
        } elseif($request->report == 'leave_report') {
            $data = $this->getLeavesReport($request);
             if($request->export)
                 return (new LeavesReportExport($data))->download('leaves.xlsx');            
        } elseif($request->report == 'attendance_report') {
            $data = $this->getAttendanceReport($request);
             if($request->export)
                 return (new AttendanceReportExport($data))->download('attendance.xlsx');            
        } elseif($request->report == 'timesheet_report') {
            $data = $this->getTimesheetsReport($request);
            if($request->export)
                return (new TimesheetReportExport($data))->download('timesheet_report.xlsx');            
        } elseif($request->report == 'productivity_report') {
            $data = $this->getProductivityReport($request);
            if($request->export)                
                return (new ProductivityReportExport($data))->download('productivity_report.xlsx');
        } elseif($request->report == 'leave_balance_report') {
            $data = $this->getLeaveBalanceReport($request);
            if($request->export)                
                return (new LeaveBalanceReportExport($data))->download('leave_balance_report.xlsx');
        }  

        $jobTitle = mJobTitle::get();
        $employees = Employee::where('status', 'Active')->selectRaw('id, CONCAT_WS (" ", first_name, middle_name, last_name) as name')->get();
        $leaveStatus = mLeaveStatus::get();
        $leaveType = mLeaveType::get();
        $projects = mProject::orderBy('m_projects.project_name', 'ASC')->get();
        $leavePeriod = mLeaveEntitlement::select('from_date', 'to_date')
            ->selectRaw('CONCAT(from_date, " - ", to_date) as leave_period')
            ->distinct()
            ->get(); 

        return view('reports/index', compact('data', 'jobTitle', 'employees', 'leaveStatus', 'leaveType', 'projects', 'leavePeriod'));
    }

    public function getEmployeesReport($request) {
        $data = Employee::when(request()->filled('status'), function ($query) {
            $query->where('employees.status', request('status'));
        })
        ->leftJoin('contact_details', 'employees.id', 'contact_details.user_id')
        ->leftJoin('m_job_titles', 'm_job_titles.id', 'employees.job_id')        
        ->when(request()->filled('from_date'), function ($query) {
            $fromDate = str_replace('/', '-', request('from_date'));
            $fromDate = date('Y-m-d', strtotime($fromDate));
            $query->where('employees.created_at', '>=', $fromDate);
        })        
        ->when(request()->filled('to_date'), function ($query) {
            $fromDate = str_replace('/', '-', request('to_date'));
            $fromDate = date('Y-m-d', strtotime($fromDate));
            $query->where('employees.created_at', '<=', $fromDate);
        })       
        ->when(request()->filled('job_title'), function ($query) {
            $query->where('m_job_titles.id', request('job_title'));
        })        
        ->selectRaw('employees.employee_id, first_name, middle_name, last_name, employees.email, date_of_birth, gender, joined_date, employees.status, employees.created_at, IF(employees.marital_status = 1, "YES", "NO") as marital_status')
        ->selectRaw('contact_details.street_address_1, contact_details.street_address_2, contact_details.city, contact_details.state, contact_details.country, contact_details.zip_code, contact_details.home_telephone, contact_details.mobile, contact_details.work_telephone, contact_details.alternate_email,
        m_job_titles.job_title, (SELECT GROUP_CONCAT(e.first_name) FROM t_employee_report_to ert INNER JOIN employees e ON e.id = ert.manager_id WHERE employees.id = ert.employee_id  ) as report_to')
        ->get()
        ->toArray();
        return $data;
    }

    public function getLeavesReport($request) {
        $data = tLeaveRequest::join('m_leave_types', 'm_leave_types.id', 't_leave_requests.leave_type_id')
        ->join('t_leaves', 't_leaves.leave_request_id', 't_leave_requests.id')
        ->join('m_leave_status', 't_leave_requests.status', 'm_leave_status.id')
        ->join('employees', 'employees.id', 't_leave_requests.employee_id')
        // ->where('t_leave_requests.id', $id)
        ->selectRaw('CONCAT(employees.first_name, " ", employees.last_name) as emp_name')
        ->selectRaw('m_leave_types.name, t_leave_requests.from_date , t_leave_requests.to_date')
        ->selectRaw(' CONCAT( (datediff(t_leave_requests.to_date, t_leave_requests.from_date) + 1) *  t_leaves.length_days, " (", t_leaves.leave_duration, ")" ) AS my_leave_duration ')
        // ->selectRaw(' t_leave_requests.status, datediff(t_leave_requests.to_date, t_leave_requests.from_date) as leave_days')
        ->selectRaw('t_leave_requests.comments, (IF (t_leaves.approval_level =1 && t_leaves.status = 2, "Pending Approval From Admin", 
        IF(approval_level =2 && t_leaves.status = 2, "APPROVED", m_leave_status.name)  )) AS my_leave_status, t_leave_requests.created_at');
        
        $data = $data->when(request()->filled('leave_status'), function ($query) {
            $query->where('t_leave_requests.status', request('leave_status'));
        })
        ->when(request()->filled('leave_type'), function ($query) {
            $query->where('t_leave_requests.leave_type_id', request('leave_type'));
        })
        ->when(request()->filled('from_date'), function ($query) {
            $fromDate = str_replace('/', '-', request('from_date'));
            $fromDate = date('Y-m-d', strtotime($fromDate));
            $query->where('t_leave_requests.from_date', '>=', $fromDate);
        })
        ->when(request()->filled('to_date'), function ($query) {
            $toDate = str_replace('/', '-', request('to_date'));
            $toDate = date('Y-m-d', strtotime($toDate));
            $query->where('t_leave_requests.to_date', '<=', $toDate);
        })
        ->when(request()->filled('employee_id'), function ($query) {
            $query->where('t_leave_requests.employee_id', request('employee_id'));
        })  
        ->groupBy('t_leave_requests.id')
        ->get()
        ->toArray();
        
        return $data;
    }

    public function getAttendanceReport($request) {
        $user = Auth::user();
        $leaveCtrl = new LeaveController;
        $currentEmployeeDetails = $leaveCtrl->getEmployeeDetails(Auth::user()->id);
        $employeeId = $currentEmployeeDetails->id;

        $userRole = 'Admin'; $empIds = [];
        if($user->hasRole('Manager')) {
            $userRole = 'Manager';
            //Find Reporting Employees Ids
            $reportTo = $leaveCtrl->getReportingEmployees($employeeId);
            if($reportTo)
                $empIds = explode(',', $reportTo->reporting_manager_ids);
        }
        
        $data = tPunchInOut::join('employees', 't_punch_in_outs.employee_id', 'employees.id')
            ->selectRaw('CONCAT(employees.first_name, " ", employees.last_name) as emp_name, t_punch_in_outs.is_import')
            ->selectRaw('punch_in_user_time, punch_out_user_time, t_punch_in_outs.punch_in_note, t_punch_in_outs.punch_out_note')
            ->selectRaw('TIMESTAMPDIFF(MINUTE, t_punch_in_outs.punch_in_user_time, t_punch_in_outs.punch_out_user_time) as duration')
            ->selectRaw('(IF(t_punch_in_outs.status = 1, "Submitted", IF(t_punch_in_outs.status = 2, "Approved", IF(t_punch_in_outs.status = 3, "Rejected", "Not Submitted")))  ) as current_status')
            ->when(request()->filled('from_date'), function ($query) {
                $date = DateTime::createFromFormat('d/m/Y', request('from_date'));
                $date = $date->format('Y-m-d');
                $query->whereRaw('DATE_FORMAT(t_punch_in_outs.punch_in_user_time, "%Y-%m-%d") >= "'. $date.'"');
            })
            ->when(request()->filled('to_date'), function ($query) {
                $date = DateTime::createFromFormat('d/m/Y', request('to_date'));
                $date = $date->format('Y-m-d');
                $query->whereRaw('DATE_FORMAT(t_punch_in_outs.punch_in_user_time, "%Y-%m-%d") <= "'. $date.'"');
            });        
            if(count($empIds)) {
                $data = $data->whereIn('t_punch_in_outs.employee_id', $empIds);
            }
            $data = $data->where('t_punch_in_outs.status', '>', 0)
                    ->when(request()->filled('is_import'), function ($query) {
                        $query->where('t_punch_in_outs.is_import', request('is_import'));
                    })
                    ->when(request()->filled('employee_id'), function ($query) {
                        $query->where('t_punch_in_outs.employee_id', request('employee_id'));
                    })
                    ->orderBy('t_punch_in_outs.id', 'DESC')
                    ->get()
                    ->toArray();
            return $data;
    }

    public function getTimesheetsReport($request) {
        $user = Auth::user();
        $userRole = 'Admin'; $empIds = [];
        if($user->hasRole('Manager')) {
            $userRole = 'Manager';
            //Find Reporting Employees Ids
            $reportTo = $leaveCtrl->getReportingEmployees($employeeId);
            if($reportTo)
                $empIds = explode(',', $reportTo->reporting_manager_ids);
        }

        $timesheets = tTimesheetItem::join('t_timesheets', 't_timesheet_items.timesheet_id', 't_timesheets.id')
            ->join('m_projects', 'm_projects.id', 't_timesheet_items.project_id')
            ->select('t_timesheets.*')
            ->join('employees', 'employees.id', 't_timesheets.employee_id')
            ->join('model_has_roles', 'model_has_roles.model_id', 'employees.user_id')
            ->join('roles', 'roles.id', 'model_has_roles.role_id')
            ->when(request()->filled('employee_id'), function ($query) {
                $query->where('t_timesheets.employee_id', request('employee_id'));
            })
            ->when(request()->filled('job_title'), function ($query) {
                $query->where('employees.job_id', request('job_title'));
            })
            ->when(request()->filled('project_id'), function ($query) {
                $query->where('t_timesheet_items.project_id', request('project_id'));
            })
            ->when(request()->filled('from_date'), function ($query) {
                $date = DateTime::createFromFormat('d/m/Y', request('from_date'));
                $date = $date->format('Y-m-d');
                $query->whereRaw('DATE_FORMAT(t_timesheet_items.date, "%Y-%m-%d") >= "'. $date.'"');
            })
            ->when(request()->filled('to_date'), function ($query) {
                $date = DateTime::createFromFormat('d/m/Y', request('to_date'));
                $date = $date->format('Y-m-d');
                $query->whereRaw('DATE_FORMAT(t_timesheet_items.date, "%Y-%m-%d") <= "'. $date.'"');
            });

        if(count($empIds)) {
            $timesheets = $timesheets->whereIn('t_timesheets.employee_id', $empIds);
        }  
        
        $timesheets = $timesheets->where('t_timesheets.status', '!=', 0)
            ->selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, m_projects.project_name')
            ->selectRaw('employees.user_id, roles.name as role_name, t_timesheet_items.duration, t_timesheet_items.date')
            // ->with('allTimesheetItem')
            ->orderBy('t_timesheets.start_date', 'asc')
            ->orderBy('t_timesheets.id', 'asc')
            ->get()
            ->toArray();

        return $timesheets;
    }

    public function getProductivityReport($request) {
        $out = [];
        $projects = mProject::join('m_customers', 'm_customers.id', 'm_projects.customer_id')
            ->join('t_timesheet_items', 't_timesheet_items.project_id', 'm_projects.id')
            ->join('t_timesheets', 't_timesheets.id', 't_timesheet_items.timesheet_id')
            ->when(request()->filled('project_id'), function ($query) {
                $query->where('m_projects.id', request('project_id'));
            })
            ->when(request()->filled('from_date'), function ($query) {
                $date = DateTime::createFromFormat('d/m/Y', request('from_date'));
                $date = $date->format('Y-m-d');
                $query->whereRaw('DATE_FORMAT(t_timesheet_items.date, "%Y-%m-%d") >= "'. $date.'"');
            })
            ->when(request()->filled('to_date'), function ($query) {
                $date = DateTime::createFromFormat('d/m/Y', request('to_date'));
                $date = $date->format('Y-m-d');
                $query->whereRaw('DATE_FORMAT(t_timesheet_items.date, "%Y-%m-%d") <= "'. $date.'"');
            })
            ->selectRaw('m_projects.project_name as project_name, m_customers.customer_name, SUM(t_timesheet_items.duration) as duration, m_projects.id')
            ->orderBy('m_projects.project_name', 'ASC')
            ->groupBy('m_projects.id')
            ->get()
            ->toArray();
        
            foreach($projects as $project) {
                $activities = tActivity::join('t_timesheet_items', 't_timesheet_items.activity_id', 't_activities.id')
                ->join('t_timesheets', 't_timesheets.id', 't_timesheet_items.timesheet_id')
                ->where('t_timesheet_items.project_id', $project['id'])
                ->selectRaw('t_activities.activity_name as activity_name, SUM(t_timesheet_items.duration) as duration')
                ->orderBy('t_activities.activity_name', 'ASC')
                ->groupBy('t_activities.id')
                ->get()
                ->toArray();
                
                $project['activities'] = $activities;
                $out[] = $project;
            }

            if($request->export) {
                $download = [];
                foreach($out as $timesheet) {
                    $download[] = [
                        'project_name' => $timesheet['project_name'],
                        'customer_name' => $timesheet['customer_name'],
                        'duration' => ($timesheet['duration'])
                    ];
    
                    foreach($timesheet['activities'] as $activity) {
                        $download[] = [
                            'project_name' => '',
                            'customer_name' => $activity['activity_name'],
                            'duration' => ($activity['duration'])
                        ];
                    }
                    $download[] = [  'project_name' => '', 'customer_name' => '', 'duration' => ''];    
                }
                return $download;   
            }          

           return $out;        
    }

    public function getLeaveBalanceReport() {

        $data = mLeaveEntitlement::join('m_leave_types', 'm_leave_types.id', 'm_leave_entitlements.leave_type_id')
            // ->leftJoin('t_leaves', 't_leaves.entitlement_id', 'm_leave_entitlements.id')
            ->leftjoin('t_leaves', function($query){
                $query->on('t_leaves.entitlement_id', '=', 'm_leave_entitlements.id')
                    ->whereIn('t_leaves.status', [1,2,3]);
            })
            ->join('employees', 'employees.id', 'm_leave_entitlements.emp_number')            
            ->when(request()->filled('leave_period'), function ($query) {
                $leavePeriod = explode(' - ', request('leave_period'));
                $query->where('m_leave_entitlements.from_date', '>=', $leavePeriod[0] );
                $query->where('m_leave_entitlements.to_date', '<=', $leavePeriod[1] );
            })
            ->when(request()->filled('employee_id'), function ($query) {
                $query->where('m_leave_entitlements.emp_number', request('employee_id'));
            })
            ->when(request()->filled('leave_type'), function ($query) {
                $query->where('m_leave_entitlements.leave_type_id', request('leave_type'));
            })
            ->selectraw('CONCAT_WS (" ", employees.first_name, employees.middle_name, employees.last_name) as employee_name, m_leave_types.name as leave_type, m_leave_entitlements.no_of_days, SUM(t_leaves.length_days) as leaves_taken, m_leave_entitlements.from_date, m_leave_entitlements.to_date')
            ->orderBy('employees.id', 'ASC')
            ->groupBy('m_leave_entitlements.id', 'm_leave_entitlements.emp_number')
            ->get()
            ->toArray();
        return  $data;
    }
}
