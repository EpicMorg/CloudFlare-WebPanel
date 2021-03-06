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
            <li class="dropdown">
              <a href="JavaScript:();" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> Отображение <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/index-all.php"><i class="fa fa-users" aria-hidden="true"></i> Все аккаунты</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Отдельные аккаунты</li>
                <li><a href="/index-1.php"><i class="fa fa-user" aria-hidden="true"></i> Account 1</a></li>
                <li><a href="/index-2.php"><i class="fa fa-user" aria-hidden="true"></i> Account 2</a></li>
              </ul>
            </li> 
            <li><a href="/settings/"><i class="fa fa-cogs" aria-hidden="true"></i> Настройки</a></li>
            <li class="active"><a href="/rss.php"><i class="fa fa-rss-square" aria-hidden="true"></i> RSS</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>RSS  <small><a class="pull-right" target="_blank" href="https://telegram.me/cloudflarerss"><i class="fa fa-telegram" aria-hidden="true"></i> Telegram</a></small></h1>
      </div> 
      <p class="lead">Данные берутся с <a href="https://www.cloudflarestatus.com/"><code>https://www.cloudflarestatus.com/history.atom</code></a>. <a href="JavaScript:();" class="btn btn-info pull-right"><i class="fa fa-refresh" aria-hidden="true"></i> Обновить</a></p>
      

<!-- Кусок из RSS -->
<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Cloudflare</h3>
  </div>
  <div class="panel-body"> 
    <p><small>Dec 10, 06:49 UTC</small>
    <strong>Resolved</strong> - This incident has been resolved</p>

    <p><small>Dec 10, 05:29 UTC</small>
    <strong>Identified</strong> - All traffic normally destined for Seoul is now routed to other nearby locations on our network whilst we continue to work on this issue.</p>

    <p><small>Dec 10, 05:28 UTC</small>
    <strong>Investigating</strong> - Cloudflare is observing network performance issues in Seoul. We are actively working to reduce or eliminate any impact to Internet users in this region. All traffic normally destined for Seoul is now routed to other nearby locations on our network whilst we continue to work on this issue.</p>
  </div>
</div>

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
