<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/images/favicon.ico">

    <title>CloudFlare WebPanel</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/engine.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img class="navbar-brand"  src="/assets/images/cf-logo-h-rgb-rev.png">
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Главная</a></li>
            <li class="dropdown active">
              <a href="JavaScript:();" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> Отображение <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="active"><a href="/index-all.php"><i class="fa fa-users" aria-hidden="true"></i> Все аккаунты</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Отдельные аккаунты</li>
                <li><a href="/index-1.php"><i class="fa fa-user" aria-hidden="true"></i> Account 1</a></li>
                <li><a href="/index-2.php"><i class="fa fa-user" aria-hidden="true"></i> Account 2</a></li>
              </ul>
            </li> 
            <li><a href="/settings/"><i class="fa fa-cogs" aria-hidden="true"></i> Настройки</a></li>
            <li><a href="/rss.php"><i class="fa fa-rss-square" aria-hidden="true"></i> RSS</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Все аккаунты</h1>
      </div>
      <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Аккаунт</th>
      <th>Домен</th>
      <th>Действие</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Account 1</td>
      <td>example1.com</td>
      <td><a href="/edit.php"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <td>2</td>
      <td>Account 1</td>
      <td>example2.com</td>
      <td><a href="/edit.php"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <td>3</td>
      <td>Account 2</td>
      <td>example3.com</td>
      <td><a href="/edit.php"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
    </tr>
  </tbody>
</table> 
    </div>

    <footer class="footer navbar-default">
      <div class="container">
        <p class="text-muted pull-right">Version 0.1-git-asdADqsdf</p>
        <p class="text-muted pull-left">EpicMorg <i class="fa fa-copyright" aria-hidden="true"></i> 2017</p> 
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="/assets/js/jquery-3.1.1.min.js"><\/script>')</script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
