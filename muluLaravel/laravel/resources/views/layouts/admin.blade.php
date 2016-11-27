<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" >Mulu</a>
            </div>
           

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="usuario"><i class='fa fa-plus fa-fw'></i>Ingresar Zip Code</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>
    

    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/metisMenu.min.js')!!}
    {!!Html::script('js/sb-admin-2.js')!!}

</body>

</html>
