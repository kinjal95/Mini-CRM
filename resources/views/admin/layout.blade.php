<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">-->
        <style> 
            #header {
                height: 50px;
                background-color: black;
            }
            #body {
                height: 500px;
                background-color: #eee;
            }
            #footer {
                height: 300px;
                background-color: #3f3f3f;
            }
            .white-text{
                color: #fff;
            }
        </style>
    </head>
    <body>
        <div id="header" class="col-lg-12">
            <header class="row">
                @include('admin.header')
            </header>
        </div>
        <div id="sideLeft" class="col-lg-2">
            @include('admin.menu')
        </div>
        <div class="">
            <div id="body" class="col-lg-10">
                
                @yield('content')
            </div>
        </div>
    </body>
</html>
