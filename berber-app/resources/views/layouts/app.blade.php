<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/register.css', 'resources/js/app.js','resources/css/app.css','resources/css/paginate.css'])
    @vite(['resources/css/login.css', 'resources/css/mainpage.css','resources/css/adminvertical.css','resources/css/adminprocess.css',
    'resources/css/adminpageUpdate.css','resources/css/employeeCard.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

</head>
<body>
    @yield('content')
</body>
</html>