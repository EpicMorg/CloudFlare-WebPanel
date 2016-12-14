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
                <li><a href="/index-all.php"><i class="fa fa-users" aria-hidden="true"></i> Все аккаунты</a></li>
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
        <h1>Редактирование <code>example.com</code></h1>
      </div>
       <small class="pull-right"><button type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Добавить</button></small>
      <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Тип</th>
      <th>Название</th>
      <th>Содержимое</th>
      <th>TTL</th>
      <th>Действие</th>
    </tr>
  </thead>
  <tbody>
      <td>TXT</td>
      <td>www</td>
      <td>yandex-verification: key</td>
      <td>Automatic</td>
      <td>
        <button type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
        <button type="button" data-toggle="modal" data-target="#myModal2"><i class="fa fa-trash" aria-hidden="true"></i></button>
      </td>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Редактирование\Добавление</h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal">
  <fieldset>
    <legend>example.com</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Название</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputName" placeholder="www">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Содержимое</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea" placeholder="yandex-verification: key"></textarea>
        <span class="help-block">Добавьте\Измените содержимое для TXT-записи вашего домена.</span>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">TTL</label>
      <div class="col-lg-10"> 
        <select class="form-control" id="select">
          <option value="1">Automatic</option>
          <option value="120">2 minutes</option>
          <option value="300">5 minutes</option>
          <option value="600">10 minutes</option>
          <option value="900">15 minutes</option>
          <option value="1800">30 minutes</option>
          <option value="3600">1 hour</option>
          <option value="7200">2 hours</option>
          <option value="18000">5 hours</option>
          <option value="43200">12 hours</option>
          <option value="86400">1 day</option>
        </select>
      </div>
    </div> 
  </fieldset>
</form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary">Применить</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel2">Подтверждение</h4>
      </div>
      <div class="modal-body">
    <p class="text-danger">Вы уверены что хотите удалить данную запись?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left">Да</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Нет</button>
      </div>
    </div>
  </div>
</div>
  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="/assets/js/jquery-3.1.1.min.js"><\/script>')</script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
