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
            <li class="active"><a href="/settings/"><i class="fa fa-cogs" aria-hidden="true"></i> Настройки</a></li>
            <li><a href="/rss.php"><i class="fa fa-rss-square" aria-hidden="true"></i> RSS</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Настройки</h1>
      </div> 
      <p class="lead">В данном разделе можно добавлять и редактировать аккаунты <code>CloudFlare</code>.</p>
     
<ul class="nav nav-tabs">

    <?php
require_once("../functions.php");

    $k = 0;
    while($user = print_user()) {
$k++;
if($k = 1) {
    echo '<li class="active"><a href="#cf-acc-'.$k.'" class="click_account"  data-toggle="tab" data-name="'.$user->show_info("NAME").'" data-email="'.$user->show_info("EMAIL").'" data-api="'.$user->show_info("API").'"  aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i> '.$user->show_info("NAME").'</a></li>';
}
else
{
    echo '<li><a href="#cf-acc-'.$k.'" data-toggle="tab" class="click_account" data-name="'.$user->show_info("NAME").'" data-email="'.$user->show_info("EMAIL").'" data-api="'.$user->show_info("API").'" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i> '.$user->show_info("NAME").'</a></li>';
}

    }


    ?>


  <li><a href="JavaScript:();" data-toggle="modal" id="add_account" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
 
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="cf-acc-1">
<div class="panel panel-default">
  <div class="panel-body">
    <div class="form-group">
    	<label class="control-label" for="disabledInput">Название</label>
    	<input class="form-control" id="name" type="text" placeholder="" disabled="">
    </div>
      <div class="form-group">
          <label class="control-label" for="disabledInput">E-mail</label>
          <input class="form-control" id="email" type="text" placeholder="" disabled="">
      </div>
    <div class="form-group">
    	<label class="control-label" for="disabledInput2">API Token</label>
    	<input class="form-control" id="api" type="text" placeholder="" disabled="">
    </div>
  </div>
  <div class="panel-footer text-right">
  	<a href="JavaScript:();" id="edit_account" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
  	<a href="JavaScript:();" class="btn btn-danger" data-toggle="modal" data-target="#myModal2"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
  </div>
</div>

  </div>

    </div>
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
        <h4 class="modal-title" id="myModalLabel">Редактирование</h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal">
  <fieldset>
    <legend id="formLegend">Аккаунт CloudFlare</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label">Название</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name"  id="formName" placeholder="" required>
      </div>
    </div>
      <div class="form-group">
          <label class="col-lg-2 control-label">E-mail</label>
          <div class="col-lg-10">
              <input type="email" class="form-control" name="email" id="formEmail" placeholder="" required>
          </div>
      </div>
    <div class="form-group">
      <labelclass="col-lg-2 control-label">API Token</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="api" rows="3" id="formApi" placeholder="" required></textarea>
        <span class="help-block">Добавьте ваш токен аккаунта CloudFlare.</span>
      </div>
    </div>
  </fieldset>
</form> 
      </div>
      <div class="modal-footer">
        <button type="button" id="cancle" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button type="button" id="submit" class="btn btn-primary">Применить</button>
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
		<p class="text-danger">Вы уверены что хотите удалить данный аккаунт?</p>
      </div>
      <div class="modal-footer">
      	<button type="button" id="delete_account" class="btn btn-danger pull-left">Да</button>
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
  <script type="text/javascript">
      $(document).ready(function() {

           var mode = 1;

            function init() {

                $("#name").attr("placeholder", $(".nav-tabs li.active > a").data("name"));
                $("#email").attr("placeholder", $(".nav-tabs li.active > a").data("email"));
                $("#api").attr("placeholder", $(".nav-tabs li.active > a").data("api"));

            }

          init();

          $(".click_account").click(function() {
              init();
          });


          $("#add_account").click(function() {

            if(mode != 1) { mode = 1 }

              $("#formLegend").html("Аккаунт CloudFlare");

              $("#formName").val("");
              $("#formEmail").val("");
              $("#formApi").val("");

          });

          $("#submit").click(function() {

              if(mode == 1) {

              $(".nav-tabs li").removeClass("active");

              //$.post add
              $(".nav-tabs").append('<li class="active"><a href="#cf-acc-" class="click_account"  data-toggle="tab" data-name="'+$("#formName").val()+'" data-email="'+$("#formEmail").val() + '" data-api="'+$("#formApi").val()+'"  aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i>'+$("#formName").val()+'</a></li>')

              init();


if($(".nav-tabs li").length == 2) {
                  $(".panel-body div.form-group").show(0);
                  $(".alert").remove();
                  $(".panel-footer a").removeClass("disabled");
}

                  $("#myModal").modal("hide");
              }

              else
              {
                  //$.post edit


              }

          });


          $("#edit_account").click(function() {
              if(mode != 0) { mode = 0; }

              $("#formLegend").html("Редактирование аккаунта " + $(".nav-tabs li.active > a").data("name"));

              $("#formName").val($(".nav-tabs li.active > a").data("name"));
              $("#formEmail").val($(".nav-tabs li.active > a").data("email"));
              $("#formApi").val($(".nav-tabs li.active > a").data("api"));

          });


          $("#delete_account").click(function() {
//$.post del
              $(".nav-tabs li.active").remove();


              if ($(".nav-tabs li").length != 1) {
                  $(".nav-tabs li").eq($(".nav-tabs li").length - 1).addClass("active")
                  init();
              }
              else

              {

                  $(".panel-body div.form-group").hide(0);
                  $(".panel-body").append('<div class="alert alert-info">Вы еще не добавили ни одного аккаунта!</div>');

                  $(".panel-footer a").addClass("disabled");

              }




              $("#myModal2").modal("hide");

          });

          $('body').delegate('a[data-toggle="tab"]', 'shown.bs.tab', function(){

              init();

          });




      });
  </script>
  </body>
</html>
