<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qaHY41aVSb9deopO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::m8vR7nvdHWpcM9sz',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9HZ3Du1AfFI25WsF',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EDapr3B79VKgImj3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/adminDashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminDashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/systemUsers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'systemUsers.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'systemUsers.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/systemUsers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'systemUsers.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employeeNameSearch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3z0nh9tcjzj0YqxI',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/getUsername' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getUsername',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jobTitles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jobTitles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitles.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payGrades' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGrades.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'payGrades.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payGrades/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGrades.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payGradeCurrency' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGradeCurrency.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'payGradeCurrency.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payGradeCurrency/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGradeCurrency.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/currency-autocomplete-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'currency-autocomplete-ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jobCategory' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobCategory.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'jobCategory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jobCategory/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobCategory.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leavePeriod' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leavePeriod.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'leavePeriod.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leavePeriod/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leavePeriod.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leaveTypes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveTypes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'leaveTypes.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leaveTypes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveTypes.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/holidays' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/holidays/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/myEntitlements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myEntitlements.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'myEntitlements.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/myEntitlements/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myEntitlements.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employees/multiple-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employees.deleteMultiple',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employees-import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employees.import',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'employees-import',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/skills' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'skills.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'skills.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/skills/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'skills.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/locations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'locations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'locations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/locations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'locations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customers.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'customers.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customers.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projects' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projects.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'projects.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projects/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projects.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customers-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customers-search',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projects-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projects-search',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/project-admin-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project-admin-search',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/project-save-customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project-save-customer',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-project' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-project',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customers-ajax-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.AjaxSearch',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/check-assigned-manager-employees-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project.checkEmployeeAjax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/activities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'activities.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/activities/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-activity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-activity',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/company' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'company.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/company/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-company-name' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-company-name',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-company-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-company-info',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-company-contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-company-contact',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/configurations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configurations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'configurations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/configurations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configurations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/punch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'punch.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'punch.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/punch/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'punch.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/import-biometric-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'upload.biometric',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.import',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mK43Io8Ms9bL0c82',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/getTodayNews-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getTodayNews-ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/getTeamLeads-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getTeamLeads-ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/getUpcomingLeaves-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getUpcomingLeaves-ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/getRecentActivities-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getRecentActivities-ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/emp-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::a0PbCxB11GSfrZmA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employees' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employees.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'employees.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employees/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employees.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leave-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leave.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leave' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leave.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'leave.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leave/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leave.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/my-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myinfo',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mytimesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mytimesheets.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mytimesheets.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mytimesheets/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mytimesheets.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/timesheets.create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'timesheets.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/timesheets.store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'timesheets.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/timesheets/multiple-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'timesheets.deleteMultiple',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee-autocomplete-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.employee_search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/project-autocomplete-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.project_search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/getActivityName-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getActivityName-ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/country-autocomplete-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'country-autocomplete-ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/timesheets/getEmployeeTimeSheets-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getEmployeeTimeSheets-ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payslips' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payslips.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'payslips.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payslips/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payslips.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payslip-download' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payslip.download',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/download-sample-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sample.download',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'news.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/news/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/getEmployeeChart-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getEmployeeChart-ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/getRequestChart-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getRequestChart-ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leave-admin-action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leave.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leave-assign' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leave.assign',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee-records' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'punch.employee-records',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/attendance-admin-action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'punch.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leaveEntitlement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveEntitlement.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'leaveEntitlement.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leaveEntitlement/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveEntitlement.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/timesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'timesheets.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reports.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/timesheets-admin-action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'timesheets.action',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile-settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/change-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'change-password',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/p(?|a(?|ssword/reset/([^/]++)(*:37)|y(?|Grade(?|s/(?|([^/]++)(?|(*:72)|/edit(*:84)|(*:91))|multiple\\-delete(*:115))|Currency/(?|([^/]++)(?|(*:147)|/edit(*:160)|(*:168))|multiple\\-delete(*:193)))|slips/([^/]++)(?|(*:220)|/edit(*:233)|(*:241))))|rojects/(?|([^/]++)(?|(*:274)|/edit(*:287)|(*:295))|multiple\\-delete(*:320))|unch/(?|([^/]++)(?|(*:348)|/edit(*:361)|(*:369))|multiple\\-delete(*:394)|update\\-ajax(*:414)|status\\-change(*:436)))|/s(?|ystemUsers/(?|([^/]++)(?|(*:476)|/edit(*:489)|(*:497))|multiple\\-delete(*:522))|kills/(?|([^/]++)(?|(*:551)|/edit(*:564)|(*:572))|multiple\\-delete(*:597)))|/job(?|Titles/(?|([^/]++)(?|(*:635)|/edit(*:648)|(*:656))|multiple\\-delete(*:681))|Category/(?|([^/]++)(?|(*:713)|/edit(*:726)|(*:734))|multiple\\-delete(*:759)))|/l(?|eave(?|Period/([^/]++)(?|(*:799)|/edit(*:812)|(*:820))|Types/(?|([^/]++)(?|(*:849)|/edit(*:862)|(*:870))|multiple\\-delete(*:895))|/(?|([^/]++)(?|(*:919)|/edit(*:932)|(*:940))|leave\\-balance\\-ajax(*:969)|delete\\-leave(*:990))|Entitlement/(?|([^/]++)(?|(*:1025)|/edit(*:1039)|(*:1048))|multiple\\-delete(*:1074)))|ocations/(?|([^/]++)(?|(*:1108)|/edit(*:1122)|(*:1131))|multiple\\-delete(*:1157)))|/holidays/(?|([^/]++)(?|(*:1192)|/edit(*:1206)|(*:1215))|multiple\\-delete(*:1241))|/my(?|Entitlements/(?|([^/]++)(?|(*:1284)|/edit(*:1298)|(*:1307))|multiple\\-delete(*:1333))|timesheets/(?|([^/]++)(?|(*:1368)|/edit(*:1382)|(*:1391))|status\\-change(*:1415)|getMyTimeSheets\\-ajax(*:1445)|multiple\\-delete(*:1470)))|/c(?|ustomers/(?|([^/]++)(?|(*:1509)|/edit(*:1523)|(*:1532))|multiple\\-delete(*:1558))|o(?|mpany/([^/]++)(?|(*:1589)|/edit(*:1603)|(*:1612))|nfigurations/([^/]++)(?|(*:1646)|/edit(*:1660)|(*:1669))))|/activities/(?|([^/]++)(?|(*:1707)|/edit(*:1721)|(*:1730))|multiple\\-delete(*:1756))|/employees/([^/]++)(?|(*:1788)|/edit(*:1802)|(*:1811))|/news/(?|([^/]++)(?|(*:1841)|/edit(*:1855)|(*:1864))|multiple\\-delete(*:1890)))/?$}sDu',
    ),
    3 => 
    array (
      37 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      72 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGrades.show',
          ),
          1 => 
          array (
            0 => 'payGrade',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      84 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGrades.edit',
          ),
          1 => 
          array (
            0 => 'payGrade',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      91 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGrades.update',
          ),
          1 => 
          array (
            0 => 'payGrade',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'payGrades.destroy',
          ),
          1 => 
          array (
            0 => 'payGrade',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      115 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGrades.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      147 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGradeCurrency.show',
          ),
          1 => 
          array (
            0 => 'payGradeCurrency',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      160 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGradeCurrency.edit',
          ),
          1 => 
          array (
            0 => 'payGradeCurrency',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      168 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGradeCurrency.update',
          ),
          1 => 
          array (
            0 => 'payGradeCurrency',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'payGradeCurrency.destroy',
          ),
          1 => 
          array (
            0 => 'payGradeCurrency',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      193 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payGradeCurrency.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      220 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payslips.show',
          ),
          1 => 
          array (
            0 => 'payslip',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payslips.edit',
          ),
          1 => 
          array (
            0 => 'payslip',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      241 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payslips.update',
          ),
          1 => 
          array (
            0 => 'payslip',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'payslips.destroy',
          ),
          1 => 
          array (
            0 => 'payslip',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      274 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projects.show',
          ),
          1 => 
          array (
            0 => 'project',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      287 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projects.edit',
          ),
          1 => 
          array (
            0 => 'project',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      295 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projects.update',
          ),
          1 => 
          array (
            0 => 'project',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'projects.destroy',
          ),
          1 => 
          array (
            0 => 'project',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      320 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projects.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      348 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'punch.show',
          ),
          1 => 
          array (
            0 => 'punch',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      361 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'punch.edit',
          ),
          1 => 
          array (
            0 => 'punch',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      369 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'punch.update',
          ),
          1 => 
          array (
            0 => 'punch',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'punch.destroy',
          ),
          1 => 
          array (
            0 => 'punch',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      394 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'punch.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      414 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'punch.update-ajax',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'punch.submit',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      476 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'systemUsers.show',
          ),
          1 => 
          array (
            0 => 'systemUser',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      489 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'systemUsers.edit',
          ),
          1 => 
          array (
            0 => 'systemUser',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      497 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'systemUsers.update',
          ),
          1 => 
          array (
            0 => 'systemUser',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'systemUsers.destroy',
          ),
          1 => 
          array (
            0 => 'systemUser',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      522 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'systemUsers.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      551 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'skills.show',
          ),
          1 => 
          array (
            0 => 'skill',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      564 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'skills.edit',
          ),
          1 => 
          array (
            0 => 'skill',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      572 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'skills.update',
          ),
          1 => 
          array (
            0 => 'skill',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'skills.destroy',
          ),
          1 => 
          array (
            0 => 'skill',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      597 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'skills.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      635 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitles.show',
          ),
          1 => 
          array (
            0 => 'jobTitle',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      648 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitles.edit',
          ),
          1 => 
          array (
            0 => 'jobTitle',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      656 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitles.update',
          ),
          1 => 
          array (
            0 => 'jobTitle',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitles.destroy',
          ),
          1 => 
          array (
            0 => 'jobTitle',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      681 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitles.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      713 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobCategory.show',
          ),
          1 => 
          array (
            0 => 'jobCategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      726 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobCategory.edit',
          ),
          1 => 
          array (
            0 => 'jobCategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      734 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobCategory.update',
          ),
          1 => 
          array (
            0 => 'jobCategory',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'jobCategory.destroy',
          ),
          1 => 
          array (
            0 => 'jobCategory',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      759 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobCategory.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      799 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leavePeriod.show',
          ),
          1 => 
          array (
            0 => 'leavePeriod',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      812 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leavePeriod.edit',
          ),
          1 => 
          array (
            0 => 'leavePeriod',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      820 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leavePeriod.update',
          ),
          1 => 
          array (
            0 => 'leavePeriod',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'leavePeriod.destroy',
          ),
          1 => 
          array (
            0 => 'leavePeriod',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      849 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveTypes.show',
          ),
          1 => 
          array (
            0 => 'leaveType',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      862 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveTypes.edit',
          ),
          1 => 
          array (
            0 => 'leaveType',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      870 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveTypes.update',
          ),
          1 => 
          array (
            0 => 'leaveType',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'leaveTypes.destroy',
          ),
          1 => 
          array (
            0 => 'leaveType',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      895 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveTypes.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      919 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leave.show',
          ),
          1 => 
          array (
            0 => 'leave',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      932 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leave.edit',
          ),
          1 => 
          array (
            0 => 'leave',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      940 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leave.update',
          ),
          1 => 
          array (
            0 => 'leave',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'leave.destroy',
          ),
          1 => 
          array (
            0 => 'leave',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      969 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leave-balance-ajax',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      990 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leave.delete_modal',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1025 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveEntitlement.show',
          ),
          1 => 
          array (
            0 => 'leaveEntitlement',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1039 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveEntitlement.edit',
          ),
          1 => 
          array (
            0 => 'leaveEntitlement',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1048 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveEntitlement.update',
          ),
          1 => 
          array (
            0 => 'leaveEntitlement',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'leaveEntitlement.destroy',
          ),
          1 => 
          array (
            0 => 'leaveEntitlement',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1074 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leaveEntitlement.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1108 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'locations.show',
          ),
          1 => 
          array (
            0 => 'location',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1122 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'locations.edit',
          ),
          1 => 
          array (
            0 => 'location',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1131 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'locations.update',
          ),
          1 => 
          array (
            0 => 'location',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'locations.destroy',
          ),
          1 => 
          array (
            0 => 'location',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'locations.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1192 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.show',
          ),
          1 => 
          array (
            0 => 'holiday',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.edit',
          ),
          1 => 
          array (
            0 => 'holiday',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1215 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.update',
          ),
          1 => 
          array (
            0 => 'holiday',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.destroy',
          ),
          1 => 
          array (
            0 => 'holiday',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1241 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1284 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myEntitlements.show',
          ),
          1 => 
          array (
            0 => 'myEntitlement',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1298 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myEntitlements.edit',
          ),
          1 => 
          array (
            0 => 'myEntitlement',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1307 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myEntitlements.update',
          ),
          1 => 
          array (
            0 => 'myEntitlement',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'myEntitlements.destroy',
          ),
          1 => 
          array (
            0 => 'myEntitlement',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1333 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myEntitlements.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1368 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mytimesheets.show',
          ),
          1 => 
          array (
            0 => 'mytimesheet',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1382 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mytimesheets.edit',
          ),
          1 => 
          array (
            0 => 'mytimesheet',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1391 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mytimesheets.update',
          ),
          1 => 
          array (
            0 => 'mytimesheet',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mytimesheets.destroy',
          ),
          1 => 
          array (
            0 => 'mytimesheet',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1415 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mytimesheets.submit',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1445 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getMyTimeSheets-ajax',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1470 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mytimesheets.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1509 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customers.show',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1523 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customers.edit',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1532 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customers.update',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'customers.destroy',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1558 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customers.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1589 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company.show',
          ),
          1 => 
          array (
            0 => 'company',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1603 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company.edit',
          ),
          1 => 
          array (
            0 => 'company',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1612 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company.update',
          ),
          1 => 
          array (
            0 => 'company',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'company.destroy',
          ),
          1 => 
          array (
            0 => 'company',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1646 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configurations.show',
          ),
          1 => 
          array (
            0 => 'configuration',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1660 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configurations.edit',
          ),
          1 => 
          array (
            0 => 'configuration',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1669 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configurations.update',
          ),
          1 => 
          array (
            0 => 'configuration',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'configurations.destroy',
          ),
          1 => 
          array (
            0 => 'configuration',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1707 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.show',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1721 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.edit',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1730 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.update',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'activities.destroy',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1756 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activities.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1788 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employees.show',
          ),
          1 => 
          array (
            0 => 'employee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1802 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employees.edit',
          ),
          1 => 
          array (
            0 => 'employee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1811 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employees.update',
          ),
          1 => 
          array (
            0 => 'employee',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'employees.destroy',
          ),
          1 => 
          array (
            0 => 'employee',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1841 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.show',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1855 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.edit',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1864 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.update',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'news.destroy',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1890 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.deleteMultiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qaHY41aVSb9deopO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::qaHY41aVSb9deopO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::m8vR7nvdHWpcM9sz' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::m8vR7nvdHWpcM9sz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9HZ3Du1AfFI25WsF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::9HZ3Du1AfFI25WsF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::EDapr3B79VKgImj3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@demoAdmin',
        'controller' => 'App\\Http\\Controllers\\HomeController@demoAdmin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::EDapr3B79VKgImj3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'adminDashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'adminDashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'adminDashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'systemUsers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'systemUsers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'systemUsers.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'systemUsers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'systemUsers/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'systemUsers.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'systemUsers.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'systemUsers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'systemUsers.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'systemUsers.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'systemUsers/{systemUser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'systemUsers.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'systemUsers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'systemUsers/{systemUser}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'systemUsers.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'systemUsers.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'systemUsers/{systemUser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'systemUsers.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'systemUsers.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'systemUsers/{systemUser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'systemUsers.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'systemUsers.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'systemUsers/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'systemUsers.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3z0nh9tcjzj0YqxI' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employeeNameSearch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@employeeNameSearch',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@employeeNameSearch',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::3z0nh9tcjzj0YqxI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'getUsername' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'getUsername',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@getUsername',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@getUsername',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'getUsername',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobTitles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jobTitles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobTitles.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobTitles.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jobTitles/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobTitles.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobTitles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'jobTitles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobTitles.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobTitles.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jobTitles/{jobTitle}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobTitles.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobTitles.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jobTitles/{jobTitle}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobTitles.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobTitles.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'jobTitles/{jobTitle}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobTitles.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobTitles.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'jobTitles/{jobTitle}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobTitles.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobTitles.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'jobTitles/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'jobTitles.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGrades.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payGrades',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGrades.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGrades.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payGrades/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGrades.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGrades.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payGrades',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGrades.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGrades.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payGrades/{payGrade}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGrades.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGrades.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payGrades/{payGrade}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGrades.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGrades.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'payGrades/{payGrade}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGrades.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGrades.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'payGrades/{payGrade}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGrades.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGrades.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payGrades/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'payGrades.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGradeCurrency.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payGradeCurrency',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGradeCurrency.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGradeCurrency.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payGradeCurrency/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGradeCurrency.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGradeCurrency.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payGradeCurrency',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGradeCurrency.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGradeCurrency.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payGradeCurrency/{payGradeCurrency}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGradeCurrency.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGradeCurrency.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payGradeCurrency/{payGradeCurrency}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGradeCurrency.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGradeCurrency.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'payGradeCurrency/{payGradeCurrency}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGradeCurrency.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGradeCurrency.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'payGradeCurrency/{payGradeCurrency}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'payGradeCurrency.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payGradeCurrency.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payGradeCurrency/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'payGradeCurrency.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'currency-autocomplete-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'currency-autocomplete-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@searchCurrencyAjax',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradeCurrencyController@searchCurrencyAjax',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'currency-autocomplete-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobCategory.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jobCategory',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobCategory.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobCategory.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jobCategory/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobCategory.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobCategory.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'jobCategory',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobCategory.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobCategory.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jobCategory/{jobCategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobCategory.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobCategory.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jobCategory/{jobCategory}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobCategory.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobCategory.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'jobCategory/{jobCategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobCategory.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobCategory.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'jobCategory/{jobCategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'jobCategory.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'jobCategory.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'jobCategory/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'jobCategory.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leavePeriod.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leavePeriod',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leavePeriod.index',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@index',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leavePeriod.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leavePeriod/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leavePeriod.create',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@create',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leavePeriod.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'leavePeriod',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leavePeriod.store',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@store',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leavePeriod.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leavePeriod/{leavePeriod}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leavePeriod.show',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@show',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leavePeriod.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leavePeriod/{leavePeriod}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leavePeriod.edit',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@edit',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leavePeriod.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'leavePeriod/{leavePeriod}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leavePeriod.update',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@update',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leavePeriod.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'leavePeriod/{leavePeriod}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leavePeriod.destroy',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@destroy',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeavePeriod\\LeavePeriodController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveTypes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leaveTypes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leaveTypes.index',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@index',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveTypes.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leaveTypes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leaveTypes.create',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@create',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveTypes.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'leaveTypes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leaveTypes.store',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@store',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveTypes.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leaveTypes/{leaveType}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leaveTypes.show',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@show',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveTypes.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leaveTypes/{leaveType}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leaveTypes.edit',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@edit',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveTypes.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'leaveTypes/{leaveType}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leaveTypes.update',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@update',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveTypes.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'leaveTypes/{leaveType}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'leaveTypes.destroy',
        'uses' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@destroy',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveTypes.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'leaveTypes/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'leaveTypes.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'holidays.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'holidays',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'holidays.index',
        'uses' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@index',
        'controller' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'holidays.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'holidays/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'holidays.create',
        'uses' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@create',
        'controller' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'holidays.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'holidays',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'holidays.store',
        'uses' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@store',
        'controller' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'holidays.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'holidays/{holiday}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'holidays.show',
        'uses' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@show',
        'controller' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'holidays.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'holidays/{holiday}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'holidays.edit',
        'uses' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@edit',
        'controller' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'holidays.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'holidays/{holiday}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'holidays.update',
        'uses' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@update',
        'controller' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'holidays.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'holidays/{holiday}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'holidays.destroy',
        'uses' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@destroy',
        'controller' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'holidays.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'holidays/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'holidays.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'myEntitlements.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myEntitlements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'myEntitlements.index',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@index',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'myEntitlements.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myEntitlements/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'myEntitlements.create',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@create',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'myEntitlements.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'myEntitlements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'myEntitlements.store',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@store',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'myEntitlements.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myEntitlements/{myEntitlement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'myEntitlements.show',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@show',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'myEntitlements.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myEntitlements/{myEntitlement}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'myEntitlements.edit',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@edit',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'myEntitlements.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'myEntitlements/{myEntitlement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'myEntitlements.update',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@update',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'myEntitlements.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'myEntitlements/{myEntitlement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'myEntitlements.destroy',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@destroy',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'myEntitlements.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'myEntitlements/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\MyLeaveEntitlementController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'myEntitlements.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'employees.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employees/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'employees.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'employees.import' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employees-import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ImportEmployeeController@index',
        'controller' => 'App\\Http\\Controllers\\Employee\\ImportEmployeeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'employees.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'employees-import' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employees-import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ImportEmployeeController@import',
        'controller' => 'App\\Http\\Controllers\\Employee\\ImportEmployeeController@import',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'employees-import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'skills.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'skills',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'skills.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'skills.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'skills/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'skills.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'skills.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'skills',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'skills.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'skills.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'skills/{skill}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'skills.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'skills.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'skills/{skill}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'skills.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'skills.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'skills/{skill}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'skills.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'skills.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'skills/{skill}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'skills.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'skills.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'skills/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'skills.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'locations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'locations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'locations.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'locations.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'locations/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'locations.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'locations.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'locations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'locations.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'locations.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'locations/{location}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'locations.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'locations.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'locations/{location}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'locations.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'locations.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'locations/{location}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'locations.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'locations.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'locations/{location}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'locations.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'locations.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'locations/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'locations.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'customers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'customers.index',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@index',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'customers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customers/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'customers.create',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@create',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'customers.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'customers.store',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@store',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'customers.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customers/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'customers.show',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@show',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'customers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customers/{customer}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'customers.edit',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@edit',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'customers.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'customers/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'customers.update',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@update',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'customers.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'customers/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'customers.destroy',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@destroy',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'customers.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customers/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'customers.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'projects.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projects',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'projects.index',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@index',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'projects.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projects/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'projects.create',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@create',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'projects.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'projects',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'projects.store',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@store',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'projects.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projects/{project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'projects.show',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@show',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'projects.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projects/{project}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'projects.edit',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@edit',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'projects.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'projects/{project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'projects.update',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@update',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'projects.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'projects/{project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'projects.destroy',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'customers-search' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customers-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@customers_search',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@customers_search',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'customers-search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'projects-search' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'projects-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@projects_search',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@projects_search',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'projects-search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'project-admin-search' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'project-admin-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@project_admin_search',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@project_admin_search',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'project-admin-search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'project-save-customer' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'project-save-customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@project_save_customer',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@project_save_customer',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'project-save-customer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'update-project' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-project',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@update_project',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@update_project',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'update-project',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'projects.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'projects/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'projects.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'customer.AjaxSearch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customers-ajax-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@customerAjaxSearch',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@customerAjaxSearch',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'customer.AjaxSearch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'project.checkEmployeeAjax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'check-assigned-manager-employees-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@checkAssignedEmployeeManagerAjax',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@checkAssignedEmployeeManagerAjax',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'project.checkEmployeeAjax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'activities.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'activities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'activities.index',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@index',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'activities.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'activities/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'activities.create',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@create',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'activities.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'activities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'activities.store',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@store',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'activities.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'activities/{activity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'activities.show',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@show',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'activities.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'activities/{activity}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'activities.edit',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@edit',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'activities.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'activities/{activity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'activities.update',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@update',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'activities.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'activities/{activity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'activities.destroy',
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'update-activity' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@update_activity',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@update_activity',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'update-activity',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'activities.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'activities/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'activities.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'company.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'company.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'company.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'company.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'company.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'company.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'company.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/{company}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'company.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'company.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/{company}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'company.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'company.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'company/{company}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'company.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'company.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'company/{company}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'company.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'update-company-name' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-company-name',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@update_company_name',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@update_company_name',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'update-company-name',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'update-company-info' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-company-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@update_company_info',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@update_company_info',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'update-company-info',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'update-company-contact' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-company-contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@update_company_contact',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\CompanyInfoController@update_company_contact',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'update-company-contact',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'configurations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configurations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'configurations.index',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@index',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'configurations.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configurations/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'configurations.create',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@create',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'configurations.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'configurations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'configurations.store',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@store',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'configurations.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configurations/{configuration}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'configurations.show',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@show',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'configurations.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configurations/{configuration}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'configurations.edit',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@edit',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'configurations.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'configurations/{configuration}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'configurations.update',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@update',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'configurations.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'configurations/{configuration}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'as' => 'configurations.destroy',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\ConfigurationsController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'punch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'punch.index',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@index',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'punch/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'punch.create',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@create',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'punch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'punch.store',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@store',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'punch/{punch}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'punch.show',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@show',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'punch/{punch}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'punch.edit',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@edit',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'punch/{punch}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'punch.update',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@update',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'punch/{punch}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'punch.destroy',
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@destroy',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'upload.biometric' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'import-biometric-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Biometric\\BiometricImportController@index',
        'controller' => 'App\\Http\\Controllers\\Biometric\\BiometricImportController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'upload.biometric',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'attendance.import' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'import-biometric-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Biometric\\BiometricImportController@import',
        'controller' => 'App\\Http\\Controllers\\Biometric\\BiometricImportController@import',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'attendance.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'getTodayNews-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'getTodayNews-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@getTodayNews',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@getTodayNews',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'getTodayNews-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'getTeamLeads-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'getTeamLeads-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@getTeamLeads',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@getTeamLeads',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'getTeamLeads-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'getUpcomingLeaves-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'getUpcomingLeaves-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@getUpcomingLeaves',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@getUpcomingLeaves',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'getUpcomingLeaves-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'getRecentActivities-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'getRecentActivities-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@getRecentActivities',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@getRecentActivities',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'getRecentActivities-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::a0PbCxB11GSfrZmA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'emp-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@demoEmployee',
        'controller' => 'App\\Http\\Controllers\\HomeController@demoEmployee',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::a0PbCxB11GSfrZmA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'employees.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employees',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'employees.index',
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@index',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'employees.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employees/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'employees.create',
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@create',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'employees.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employees',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'employees.store',
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@store',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'employees.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employees/{employee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'employees.show',
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@show',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'employees.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employees/{employee}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'employees.edit',
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@edit',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'employees.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'employees/{employee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'employees.update',
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@update',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'employees.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'employees/{employee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'employees.destroy',
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@destroy',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leave-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@getLeaveList',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@getLeaveList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'leave.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leave',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'leave.index',
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@index',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leave/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'leave.create',
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@create',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'leave',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'leave.store',
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@store',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leave/{leave}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'leave.show',
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@show',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leave/{leave}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'leave.edit',
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@edit',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'leave/{leave}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'leave.update',
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@update',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'leave/{leave}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'leave.destroy',
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@destroy',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave-balance-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'leave/leave-balance-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@getLeaveBalance',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@getLeaveBalance',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'leave-balance-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave.delete_modal' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'leave/delete-leave',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@destroy',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'leave.delete_modal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'myinfo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'my-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@myInfo',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@myInfo',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'myinfo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'mytimesheets.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mytimesheets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'mytimesheets.index',
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@index',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'mytimesheets.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mytimesheets/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'mytimesheets.create',
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@create',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'mytimesheets.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mytimesheets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'mytimesheets.store',
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@store',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'mytimesheets.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mytimesheets/{mytimesheet}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'mytimesheets.show',
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@show',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'mytimesheets.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mytimesheets/{mytimesheet}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'mytimesheets.edit',
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@edit',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'mytimesheets.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'mytimesheets/{mytimesheet}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'mytimesheets.update',
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@update',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'mytimesheets.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'mytimesheets/{mytimesheet}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'mytimesheets.destroy',
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'mytimesheets.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mytimesheets/status-change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@updateStatusAjax',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@updateStatusAjax',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'mytimesheets.submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'getMyTimeSheets-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mytimesheets/getMyTimeSheets-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@getMyTimeSheets',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@getMyTimeSheets',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'getMyTimeSheets-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'mytimesheets.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mytimesheets/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\MyTimesheetsController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'mytimesheets.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'timesheets.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'timesheets.create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@create',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'timesheets.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'timesheets.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'timesheets.store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@store',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'timesheets.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'timesheets.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'timesheets/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'timesheets.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'ajax.employee_search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee-autocomplete-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@searchEmployeeAjax',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@searchEmployeeAjax',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'ajax.employee_search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'ajax.project_search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'project-autocomplete-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@searchProjectAjax',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@searchProjectAjax',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'ajax.project_search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'getActivityName-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'getActivityName-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@getActivityName',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@getActivityName',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'getActivityName-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'country-autocomplete-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'country-autocomplete-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@searchCountryAjax',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@searchCountryAjax',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'country-autocomplete-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'punch/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'punch.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.update-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'punch/update-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@updateAjax',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@updateAjax',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'punch.update-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'punch/status-change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@updateStatusAjax',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@updateStatusAjax',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'punch.submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'getEmployeeTimeSheets-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'timesheets/getEmployeeTimeSheets-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@getEmployeeTimeSheets',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@getEmployeeTimeSheets',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'getEmployeeTimeSheets-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payslips.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payslips',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'payslips.index',
        'uses' => 'App\\Http\\Controllers\\Payslips\\PayslipController@index',
        'controller' => 'App\\Http\\Controllers\\Payslips\\PayslipController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payslips.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payslips/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'payslips.create',
        'uses' => 'App\\Http\\Controllers\\Payslips\\PayslipController@create',
        'controller' => 'App\\Http\\Controllers\\Payslips\\PayslipController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payslips.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payslips',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'payslips.store',
        'uses' => 'App\\Http\\Controllers\\Payslips\\PayslipController@store',
        'controller' => 'App\\Http\\Controllers\\Payslips\\PayslipController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payslips.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payslips/{payslip}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'payslips.show',
        'uses' => 'App\\Http\\Controllers\\Payslips\\PayslipController@show',
        'controller' => 'App\\Http\\Controllers\\Payslips\\PayslipController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payslips.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payslips/{payslip}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'payslips.edit',
        'uses' => 'App\\Http\\Controllers\\Payslips\\PayslipController@edit',
        'controller' => 'App\\Http\\Controllers\\Payslips\\PayslipController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payslips.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'payslips/{payslip}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'payslips.update',
        'uses' => 'App\\Http\\Controllers\\Payslips\\PayslipController@update',
        'controller' => 'App\\Http\\Controllers\\Payslips\\PayslipController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payslips.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'payslips/{payslip}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'as' => 'payslips.destroy',
        'uses' => 'App\\Http\\Controllers\\Payslips\\PayslipController@destroy',
        'controller' => 'App\\Http\\Controllers\\Payslips\\PayslipController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'payslip.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payslip-download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Payslips\\PayslipController@download',
        'controller' => 'App\\Http\\Controllers\\Payslips\\PayslipController@download',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'payslip.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'sample.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'download-sample-file',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager|Employee',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Payslips\\PayslipController@sampleDownload',
        'controller' => 'App\\Http\\Controllers\\Payslips\\PayslipController@sampleDownload',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'sample.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'news.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'news.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'news.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'news/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'news.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'news.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'news.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'news.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'news/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'news.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'news.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'news/{news}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'news.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'news.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'news/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'news.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'news.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'news/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'news.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'news.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'news/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'news.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'getEmployeeChart-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'getEmployeeChart-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@getEmployeeChartData',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@getEmployeeChartData',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'getEmployeeChart-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'getRequestChart-ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'getRequestChart-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@getRequestChart',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@getRequestChart',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'getRequestChart-ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'leave-admin-action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@adminAction',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@adminAction',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'leave.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leave.assign' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leave-assign',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@assign',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@assign',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'leave.assign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.employee-records' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee-records',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@getEmployeeRecords',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@getEmployeeRecords',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'punch.employee-records',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'punch.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'attendance-admin-action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@adminAction',
        'controller' => 'App\\Http\\Controllers\\Time\\Attendance\\PunchInOutController@adminAction',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'punch.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveEntitlement.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leaveEntitlement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'leaveEntitlement.index',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@index',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveEntitlement.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leaveEntitlement/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'leaveEntitlement.create',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@create',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveEntitlement.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'leaveEntitlement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'leaveEntitlement.store',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@store',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveEntitlement.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leaveEntitlement/{leaveEntitlement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'leaveEntitlement.show',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@show',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveEntitlement.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leaveEntitlement/{leaveEntitlement}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'leaveEntitlement.edit',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@edit',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveEntitlement.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'leaveEntitlement/{leaveEntitlement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'leaveEntitlement.update',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@update',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveEntitlement.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'leaveEntitlement/{leaveEntitlement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'as' => 'leaveEntitlement.destroy',
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@destroy',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'leaveEntitlement.deleteMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'leaveEntitlement/multiple-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Leave\\Entitlements\\LeaveEntitlementController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'leaveEntitlement.deleteMultiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'timesheets.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'timesheets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@index',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'timesheets.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'reports.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Reports\\ReportsController@index',
        'controller' => 'App\\Http\\Controllers\\Reports\\ReportsController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'reports.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'timesheets.action' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'timesheets-admin-action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin|Manager',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@adminAction',
        'controller' => 'App\\Http\\Controllers\\Time\\Timesheets\\TimesheetsController@adminAction',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'timesheets.action',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::mK43Io8Ms9bL0c82' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::mK43Io8Ms9bL0c82',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile-settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfileSettingsController@index',
        'controller' => 'App\\Http\\Controllers\\ProfileSettingsController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'profile-settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'change-password' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'change-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfileSettingsController@changePassword',
        'controller' => 'App\\Http\\Controllers\\ProfileSettingsController@changePassword',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'change-password',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
  ),
)
);
