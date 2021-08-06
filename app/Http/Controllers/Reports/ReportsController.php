<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\Exports\EmployeesReportExport;
use App\Exports\LeavesReportExport;
use Excel;
use App\mJobTitle;
use App\tLeave;
use App\tLeaveRequest;
use App\mLeaveStatus;
use App\mLeaveType;


class ReportsController extends Controller
{
    public function index(Request $request) {
        $data = [];

        if($request->report == 'employee_report') {
           $data = $this->getEmployeesReport($request);
            if($request->export)
                return (new EmployeesReportExport($data))->download('employees.xlsx');            
        }

        if($request->report == 'leave_report') {
            $data = $this->getLeavesReport($request);
             if($request->export)
                 return (new LeavesReportExport($data))->download('leaves.xlsx');            
         }

        $jobTitle = mJobTitle::get();
        $employees = Employee::where('status', 'Active')->selectRaw('id, CONCAT_WS (" ", first_name, middle_name, last_name) as name')->get();
        $leaveStatus = mLeaveStatus::get();
        $leaveType = mLeaveType::get();
        return view('reports/index', compact('data', 'jobTitle', 'employees', 'leaveStatus', 'leaveType'));
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
}
