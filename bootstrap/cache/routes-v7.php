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
            '_route' => 'generated::AFIli0ksxKRSOA0l',
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
            '_route' => 'generated::diJ8nJKHFbO08jZJ',
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
            '_route' => 'generated::giZy1I5VpKs2WuAg',
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
            '_route' => 'generated::cJ5415taObElSwX3',
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
            '_route' => 'generated::avlAnsM0vKU92IT2',
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
      '/emp-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uy6KsNNz4VPSvovU',
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
      0 => '{^(?|/p(?|a(?|ssword/reset/([^/]++)(*:37)|yGrade(?|s/(?|([^/]++)(?|(*:69)|/edit(*:81)|(*:88))|multiple\\-delete(*:112))|Currency/([^/]++)(?|(*:141)|/edit(*:154)|(*:162))))|rojects/([^/]++)(?|(*:192)|/edit(*:205)|(*:213)))|/s(?|ystemUsers/(?|([^/]++)(?|(*:253)|/edit(*:266)|(*:274))|multiple\\-delete(*:299))|kills/(?|([^/]++)(?|(*:328)|/edit(*:341)|(*:349))|multiple\\-delete(*:374)))|/job(?|Titles/(?|([^/]++)(?|(*:412)|/edit(*:425)|(*:433))|multiple\\-delete(*:458))|Category/(?|([^/]++)(?|(*:490)|/edit(*:503)|(*:511))|multiple\\-delete(*:536)))|/employees/(?|([^/]++)(?|(*:571)|/edit(*:584)|(*:592))|multiple\\-delete(*:617))|/locations/(?|([^/]++)(?|(*:651)|/edit(*:664)|(*:672))|multiple\\-delete(*:697))|/customers/(?|([^/]++)(?|(*:731)|/edit(*:744)|(*:752))|multiple\\-delete(*:777)))/?$}sDu',
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
            '_route' => 'generated::R0SPComh0xIndK8z',
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
      192 => 
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
      205 => 
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
      213 => 
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
      253 => 
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
      266 => 
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
      274 => 
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
      299 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iumAKEqG4nsBetOv',
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
      328 => 
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
      341 => 
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
      349 => 
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
      374 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wxRDU1lNQbIqsujm',
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
      412 => 
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
      425 => 
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
      433 => 
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
      458 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eEfurnvlP9lcJO1F',
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
      490 => 
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
      503 => 
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
      511 => 
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
      536 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jEk4RXyX6wDYxNPT',
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
      571 => 
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
      584 => 
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
      592 => 
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
      617 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::raVGwbbsAqdvPySK',
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
      651 => 
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
      664 => 
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
      672 => 
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
      697 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yAEs9DF15qIYWtqS',
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
      731 => 
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
      744 => 
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
      752 => 
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
      777 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lDK4c7s4hiA6IITY',
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
    'generated::AFIli0ksxKRSOA0l' => 
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
        'as' => 'generated::AFIli0ksxKRSOA0l',
      ),
      'fallback' => false,
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
    'generated::diJ8nJKHFbO08jZJ' => 
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
        'as' => 'generated::diJ8nJKHFbO08jZJ',
      ),
      'fallback' => false,
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
    'generated::giZy1I5VpKs2WuAg' => 
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
        'as' => 'generated::giZy1I5VpKs2WuAg',
      ),
      'fallback' => false,
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
    'generated::cJ5415taObElSwX3' => 
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
        'as' => 'generated::cJ5415taObElSwX3',
      ),
      'fallback' => false,
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
    'generated::iumAKEqG4nsBetOv' => 
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
        'as' => 'generated::iumAKEqG4nsBetOv',
      ),
      'fallback' => false,
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
    'generated::avlAnsM0vKU92IT2' => 
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
        'as' => 'generated::avlAnsM0vKU92IT2',
      ),
      'fallback' => false,
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
    'generated::eEfurnvlP9lcJO1F' => 
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
        'as' => 'generated::eEfurnvlP9lcJO1F',
      ),
      'fallback' => false,
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
    'generated::R0SPComh0xIndK8z' => 
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
        'as' => 'generated::R0SPComh0xIndK8z',
      ),
      'fallback' => false,
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
    'generated::jEk4RXyX6wDYxNPT' => 
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
        'as' => 'generated::jEk4RXyX6wDYxNPT',
      ),
      'fallback' => false,
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
          1 => 'role:Admin',
        ),
        'as' => 'employees.index',
        'uses' => 'App\\Http\\Controllers\\EmployeeController@index',
        'controller' => 'App\\Http\\Controllers\\EmployeeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
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
          1 => 'role:Admin',
        ),
        'as' => 'employees.create',
        'uses' => 'App\\Http\\Controllers\\EmployeeController@create',
        'controller' => 'App\\Http\\Controllers\\EmployeeController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
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
          1 => 'role:Admin',
        ),
        'as' => 'employees.store',
        'uses' => 'App\\Http\\Controllers\\EmployeeController@store',
        'controller' => 'App\\Http\\Controllers\\EmployeeController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
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
          1 => 'role:Admin',
        ),
        'as' => 'employees.show',
        'uses' => 'App\\Http\\Controllers\\EmployeeController@show',
        'controller' => 'App\\Http\\Controllers\\EmployeeController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
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
          1 => 'role:Admin',
        ),
        'as' => 'employees.edit',
        'uses' => 'App\\Http\\Controllers\\EmployeeController@edit',
        'controller' => 'App\\Http\\Controllers\\EmployeeController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
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
          1 => 'role:Admin',
        ),
        'as' => 'employees.update',
        'uses' => 'App\\Http\\Controllers\\EmployeeController@update',
        'controller' => 'App\\Http\\Controllers\\EmployeeController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
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
          1 => 'role:Admin',
        ),
        'as' => 'employees.destroy',
        'uses' => 'App\\Http\\Controllers\\EmployeeController@destroy',
        'controller' => 'App\\Http\\Controllers\\EmployeeController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
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
    'generated::raVGwbbsAqdvPySK' => 
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
        'uses' => 'App\\Http\\Controllers\\EmployeeController@deleteMultiple',
        'controller' => 'App\\Http\\Controllers\\EmployeeController@deleteMultiple',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::raVGwbbsAqdvPySK',
      ),
      'fallback' => false,
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
    'generated::wxRDU1lNQbIqsujm' => 
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
        'as' => 'generated::wxRDU1lNQbIqsujm',
      ),
      'fallback' => false,
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
    'generated::yAEs9DF15qIYWtqS' => 
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
        'as' => 'generated::yAEs9DF15qIYWtqS',
      ),
      'fallback' => false,
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
    'generated::lDK4c7s4hiA6IITY' => 
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
        'as' => 'generated::lDK4c7s4hiA6IITY',
      ),
      'fallback' => false,
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
    'generated::uy6KsNNz4VPSvovU' => 
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
          1 => 'role:Employee',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@demoEmployee',
        'controller' => 'App\\Http\\Controllers\\HomeController@demoEmployee',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::uy6KsNNz4VPSvovU',
      ),
      'fallback' => false,
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
