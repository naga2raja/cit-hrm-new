<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<style>
    
@media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
}
</style>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td class="header">
            <a href="/" style="display: inline-block;">
                <img src="{{ assetUrl('img/logo.png') }}" class="logo" alt="CITHRM" style="height: auto;">
            </a>
        </td>
    </tr>        

    <!-- Email Body -->
    <tr>
        <td class="body" width="100%" cellpadding="0" cellspacing="0">
            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
            <!-- Body content -->
                <tr>
                    <td class="content-cell">                        
                        <h1>Hello {{ $details['employee_name'] }}</h1>
                        <br>
                        <p> Date : {{ $details['date'] }} </p>
                        <p> Timesheet Status: {!! $details['message'] !!}</p>
                        <br>
                        <p> You can check in your Dashboard <a href="{{ route('login') }}"> {{ route('login')}}</a></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- footer -->
    <tr>
        <td>
            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td class="content-cell" align="center">
                        © {{ date('Y') }} CITHRM. All rights reserved.
                    </td>
                </tr>
            </table>
        </td>
    </tr>        
</table>
</td>
</tr>
</table>
</body>
</html>
