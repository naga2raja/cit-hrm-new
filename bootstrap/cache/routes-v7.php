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
            '_route' => 'generated::SMQLGJiOcZsajvW6',
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
            '_route' => 'generated::N1FYkDpUhcizmGMt',
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
            '_route' => 'generated::Xig52qiMHzi2y6BB',
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
      '/admin-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oG0jyetAseK9DUwo',
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
            '_route' => 'generated::iCtI2tbWPKlvJpzG',
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
      '/currencyNameSearch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eMiEY4zBfNn4Dtkh',
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
      '/employee-autocomplete-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XmhA7mKRexlOkKfM',
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
      '/emp-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::amkuEoxBphKi5mMs',
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
      0 => '{^(?|/p(?|a(?|ssword/reset/([^/]++)(*:37)|yGrade(?|s/(?|([^/]++)(?|(*:69)|/edit(*:81)|(*:88))|multiple\\-delete(*:112))|Currency/([^/]++)(?|(*:141)|/edit(*:154)|(*:162))))|rojects/(?|([^/]++)(?|(*:195)|/edit(*:208)|(*:216))|multiple\\-delete(*:241))|unch/([^/]++)(?|(*:266)|/edit(*:279)|(*:287)))|/s(?|ystemUsers/(?|([^/]++)(?|(*:327)|/edit(*:340)|(*:348))|multiple\\-delete(*:373))|kills/(?|([^/]++)(?|(*:402)|/edit(*:415)|(*:423))|multiple\\-delete(*:448)))|/job(?|Titles/(?|([^/]++)(?|(*:486)|/edit(*:499)|(*:507))|multiple\\-delete(*:532))|Category/(?|([^/]++)(?|(*:564)|/edit(*:577)|(*:585))|multiple\\-delete(*:610)))|/l(?|eave(?|Period/([^/]++)(?|(*:650)|/edit(*:663)|(*:671))|Types/(?|([^/]++)(?|(*:700)|/edit(*:713)|(*:721))|multiple\\-delete(*:746))|Entitlement/([^/]++)(?|(*:778)|/edit(*:791)|(*:799))|/(?|([^/]++)(?|(*:823)|/edit(*:836)|(*:844))|leave\\-balance\\-ajax(*:873)))|ocations/(?|([^/]++)(?|(*:906)|/edit(*:919)|(*:927))|multiple\\-delete(*:952)))|/holidays/(?|([^/]++)(?|(*:986)|/edit(*:999)|(*:1007))|multiple\\-delete(*:1033))|/employees/(?|([^/]++)(?|(*:1068)|/edit(*:1082)|(*:1091))|multiple\\-delete(*:1117))|/c(?|ustomers/(?|([^/]++)(?|(*:1155)|/edit(*:1169)|(*:1178))|multiple\\-delete(*:1204))|o(?|mpany/([^/]++)(?|(*:1235)|/edit(*:1249)|(*:1258))|nfigurations/([^/]++)(?|(*:1292)|/edit(*:1306)|(*:1315))))|/activities/(?|([^/]++)(?|(*:1353)|/edit(*:1367)|(*:1376))|multiple\\-delete(*:1402))|/my(?|timesheets/([^/]++)(?|(*:1440)|/edit(*:1454)|(*:1463))|Entitlements/([^/]++)(?|(*:1497)|/edit(*:1511)|(*:1520))))/?$}sDu',
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
      69 => 
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
      81 => 
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
      88 => 
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
      112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3pLb2c1jRejFLK3H',
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
      141 => 
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
      154 => 
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
      162 => 
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
      195 => 
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
      208 => 
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
      216 => 
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
      241 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KaaacDlP8kK1MknB',
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
      266 => 
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
      279 => 
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
      287 => 
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
      327 => 
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
      340 => 
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
      348 => 
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
      373 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4FOBdaR03KDjBfrp',
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
      402 => 
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
      415 => 
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
      423 => 
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
      448 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LNSbRcItuTQI6QiE',
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
      486 => 
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
      499 => 
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
      507 => 
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
      532 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2CPc5K9Dh8g9edXT',
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
      564 => 
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
      577 => 
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
      585 => 
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
      610 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wxLoGRyCeCFbm3LX',
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
      650 => 
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
      663 => 
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
      671 => 
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
      700 => 
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
      713 => 
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
      721 => 
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
      746 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eDLSm4soefTAxFoL',
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
      778 => 
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
      791 => 
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
      799 => 
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
      823 => 
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
      836 => 
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
      844 => 
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
      873 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yBZYA17nDlbTpYg3',
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
      906 => 
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
      919 => 
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
      927 => 
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
      952 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::krqYTTEusLlGh3qa',
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
      986 => 
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
      999 => 
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
      1007 => 
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
      1033 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mqTa8QyJ999DSpNz',
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
      1068 => 
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
      1082 => 
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
      1091 => 
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
      1117 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NUD5QGFFtoDpl9NH',
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
      1155 => 
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
      1169 => 
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
      1178 => 
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
      1204 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LBES1xaWPdqg3cHP',
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
      1235 => 
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
      1249 => 
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
      1258 => 
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
      1292 => 
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
      1306 => 
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
      1315 => 
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
      1353 => 
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
      1367 => 
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
      1376 => 
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
      1402 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cnPNixgrlD0anNsg',
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
      1440 => 
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
      1454 => 
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
      1463 => 
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
      1497 => 
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
      1511 => 
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
      1520 => 
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
        2 => 
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
    ),
    'generated::SMQLGJiOcZsajvW6' => 
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
        'as' => 'generated::SMQLGJiOcZsajvW6',
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
    ),
    'generated::N1FYkDpUhcizmGMt' => 
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
        'as' => 'generated::N1FYkDpUhcizmGMt',
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
    ),
    'generated::Xig52qiMHzi2y6BB' => 
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
        'as' => 'generated::Xig52qiMHzi2y6BB',
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
    ),
    'generated::oG0jyetAseK9DUwo' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@demoAdmin',
        'controller' => 'App\\Http\\Controllers\\HomeController@demoAdmin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::oG0jyetAseK9DUwo',
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
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@index',
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
    ),
    'generated::4FOBdaR03KDjBfrp' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::4FOBdaR03KDjBfrp',
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
    ),
    'generated::iCtI2tbWPKlvJpzG' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@employeeNameSearch',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\SystemUserController@employeeNameSearch',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::iCtI2tbWPKlvJpzG',
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
    ),
    'generated::2CPc5K9Dh8g9edXT' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobTitles\\JobTitlesController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::2CPc5K9Dh8g9edXT',
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
    ),
    'generated::3pLb2c1jRejFLK3H' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::3pLb2c1jRejFLK3H',
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
    ),
    'generated::eMiEY4zBfNn4Dtkh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'currencyNameSearch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@currencyNameSearch',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\PayGrades\\PayGradesController@currencyNameSearch',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::eMiEY4zBfNn4Dtkh',
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
    ),
    'generated::wxLoGRyCeCFbm3LX' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\Job\\JobCategories\\JobCategoryController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::wxLoGRyCeCFbm3LX',
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
    ),
    'generated::eDLSm4soefTAxFoL' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Leave\\LeaveType\\LeaveTypeController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::eDLSm4soefTAxFoL',
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
    ),
    'generated::mqTa8QyJ999DSpNz' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Leave\\Holidays\\HolidaysController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::mqTa8QyJ999DSpNz',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
    ),
    'generated::NUD5QGFFtoDpl9NH' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::NUD5QGFFtoDpl9NH',
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
    ),
    'generated::XmhA7mKRexlOkKfM' => 
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
          1 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\EmployeeController@searchEmployeeAjax',
        'controller' => 'App\\Http\\Controllers\\Employee\\EmployeeController@searchEmployeeAjax',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::XmhA7mKRexlOkKfM',
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
    ),
    'generated::LNSbRcItuTQI6QiE' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\Qualifications\\SkillsController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::LNSbRcItuTQI6QiE',
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
    ),
    'generated::krqYTTEusLlGh3qa' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\Organization\\LocationsController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::krqYTTEusLlGh3qa',
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
    ),
    'generated::LBES1xaWPdqg3cHP' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\CustomersController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::LBES1xaWPdqg3cHP',
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
    ),
    'generated::KaaacDlP8kK1MknB' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ProjectsController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::KaaacDlP8kK1MknB',
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
    ),
    'generated::cnPNixgrlD0anNsg' => 
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
        ),
        'uses' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\Time\\ProjectInfo\\ActivitiesController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::cnPNixgrlD0anNsg',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
          1 => 'role:Admin',
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
    ),
    'generated::amkuEoxBphKi5mMs' => 
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
          1 => 'role:Employee|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@demoEmployee',
        'controller' => 'App\\Http\\Controllers\\HomeController@demoEmployee',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::amkuEoxBphKi5mMs',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
    ),
    'generated::yBZYA17nDlbTpYg3' => 
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
          1 => 'role:Employee|Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@getLeaveBalance',
        'controller' => 'App\\Http\\Controllers\\Leave\\Leave\\LeaveController@getLeaveBalance',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::yBZYA17nDlbTpYg3',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
          1 => 'role:Employee|Admin',
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
    ),
  ),
)
);
