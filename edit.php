<?php
require_once ("sql.php");

require_once("functions.php");

$user_id = clear_data($_GET["user_id"]);

$data = $mysqli->query("SELECT * FROM users WHERE id = $user_id");


if($data->num_rows) {
?>
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
    <?php



    $row = $data->fetch_array();

    $zone_id = clear_data($_GET["zone_id"]);

    $connection = curl_init();

    curl_setopt($connection, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/$zone_id");

    curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

    $headers = [
        'X-Auth-Email: ' . $row["email"],
        'X-Auth-Key: ' . $row["api"]
    ];

    curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($connection);

    curl_close($connection);

    $result = json_decode($result);

    $name = $result->result->name;
    ?>
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Редактирование <code><?=$name?></code></h1>
      </div>
       <small class="pull-right"><button type="button" data-toggle="modal" id="add_record" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Добавить</button></small>
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
  <tbody id="tb">
  <?php


      $zone_id = clear_data($_GET["zone_id"]);

      $connection = curl_init();

      curl_setopt($connection, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records?type=TXT");

      curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

      $headers = [
          'X-Auth-Email: ' . $row["email"],
          'X-Auth-Key: ' . $row["api"]
      ];

      curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);

      $result = curl_exec($connection);

      curl_close($connection);

      $result = json_decode($result);


    foreach ($result->result as $val) {


        switch($val->ttl) {

            case 1 : $val->ttl= "Automatic"; break;
            case 120 : $val->ttl= "2 minutes"; break;
            case 300 : $val->ttl= "5 minutes"; break;
            case 600 : $val->ttl= "10 minutes"; break;
            case 900 : $val->ttl= "15 minutes"; break;
            case 1800 : $val->ttl= "30 minutes"; break;
            case 3600 : $val->ttl= "1 hour"; break;
            case 7200 :  $val->ttl= "2 hours"; break;
            case 18000 : $val->ttl= "5 hours"; break;
            case 43200 : $val->ttl= "12 hours"; break;
            case 86400 : $val->ttl= "1 day"; break;
        }


        $val->name =  str_replace(".$name", "", $val->name);
print <<< HTML

 <tr>
      <td>{$val->type}</td>
      <td>{$val->name}</td>
      <td>{$val->content}</td>
      <td>{$val->ttl}</td>
      <td>
        <button type="button" data-toggle="modal" data-id="{$val->id}" class="edit_record" data-target="#myModal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
        <button type="button" data-toggle="modal" data-id="{$val->id}" class="delete_record" data-target="#myModal2"><i class="fa fa-trash" aria-hidden="true"></i></button>
      </td>
    </tr>

HTML;





    }

  ?>

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
        <h4 class="modal-title" id="myModalLabel">Редактирование</h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal" >
    <input type="hidden" name="zone_id" value="<?=$zone_id;?>" />
    <input type="hidden" name="user_id" value="<?=$row["id"];?>" />
    <input type="hidden" id="formRecord" name="record_id" value="" />

  <fieldset>
    <legend id="zone_name"></legend>
      <div id="answer_post"></div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Название</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="name" id="formName" placeholder="www">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Содержимое</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" name="content" id="formContent" placeholder="yandex-verification: key"></textarea>
        <span class="help-block">Измените содержимое для TXT-записи вашего домена.</span>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">TTL</label>
      <div class="col-lg-10"> 
        <select class="form-control" name="ttl" id="formSelect">
          <option value="1" selected="">Automatic</option>
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
    <p class="text-danger">Вы уверены что хотите удалить данную запись?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="apply" class="btn btn-danger pull-left">Да</button>
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
            var zone_name = "<?=$name?>";
            var obj;

            $('body').delegate('.edit_record', 'click', function(){


                $("#myModalLabel").text("Редактирование записи");
                $("#formName").val($(this).closest("tr").find("td").eq(1).text());
                $("#formContent").val($(this).closest("tr").find("td").eq(2).text());
                $("#formRecord").val($(this).data("id"));



                var ttl = $(this).closest("tr").find("td").eq(3).text();

                $('#formSelect :selected').each(function(){
                    this.selected = false;
                    $(this).removeAttr("selected");
                });

                $('#formSelect :contains("'+ttl+'")').attr("selected", "selected");

                $("#zone_name").text(zone_name);

                obj = $(this).closest("tr").find("td");

                if(mode != 0) { mode = 0;}
            });


            var elem = null;
            var record_id;
            $('body').delegate('.delete_record', 'click', function(){

                elem = $(this).closest("tr");
                record_id = $(this).data("id")
            });

            $("#apply").click(function() {
                $.post( "delete_record.php", { zone_id:"<?=$zone_id;?>", user_id:<?=$user_id?>,record_id:  record_id}, function(data) {

                    if(data.success) {
                        elem.hide( 300, function() {
                            $(this).remove();
                        });
//
                    } else { alert("Error!");}
                }, "json");

                $("#myModal2").modal("hide");
            });


            $("#add_record").click(function() {$("#myModalLabel").text("Добавление записи");


                $("#formName").val("");
                $("#formContent").val("");


                $('#formSelect :selected').each(function(){
                    this.selected=false;
                    $(this).removeAttr("selected");
                });

                $('#formSelect :first').attr("selected", "selected");


                $("#zone_name").text("");

                if(mode != 1) { mode = 1;}


            });


            $("#submit").click(function() {
if(mode) {
                //$.post//
    //{"result":{"id":"1e375e4666f4da4370781dac980a4c08","type":"TXT","name":"gggggggggggggggggggg.зимовская.рф","content":"gggggggggggggg","proxiable":false,"proxied":false,"ttl":1,"locked":false,"zone_id":"31aeaca4dd4ccd91ab7f07928bcc84cb","zone_name":"зимовская.рф","modified_on":"2016-12-16T22:04:00.641096Z","created_on":"2016-12-16T22:04:00.641096Z","meta":{"auto_added":false}},"success":true,"errors":[],"messages":[]}
    $.post( "add_record.php", { zone_id:"<?=$zone_id;?>", user_id:<?=$user_id?>, name: $("#formName").val(), content: $("#formContent").val(), ttl:  $("#formSelect :selected").val()}, function(data) {

        if(data.success) {

        $("#tb").append('<tr>'+
            '<td>TXT</td>' +
            '<td>'+$("#formName").val()+'</td>' +
            '<td>'+$("#formContent").val()+'</td>'+
            '<td>'+$("#formSelect :selected").text()+'</td>'+
            '<td>'+
            '<button type="button" data-toggle="modal" data-id="'+data.result.id+'" class="edit_record" data-target="#myModal"><i class="fa fa-pencil" aria-hidden="true"></i></button>'+
            ' <button type="button" data-toggle="modal" data-id="'+data.result.id+'" class="delete_record" data-target="#myModal2"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
            '</td>'+
            '</tr>');} else { alert("Error!");}
    }, "json");




}
else
{
    $.post( "edit_record.php", { zone_id:"<?=$zone_id;?>", user_id:<?=$user_id?>, name: $("#formName").val(), content: $("#formContent").val(), ttl:  $("#formSelect :selected").val(),record_id:  $("#formRecord").val()}, function(data) {

        if(data.success) {
            obj.eq(1).text($("#formName").val());
                obj.eq(2).text($("#formContent").val());
                    obj.eq(3).text($('#formSelect :selected').text());

//
           } else { alert("Error!");}
    }, "json");
    //edit
}
                $("#myModal").modal("hide");

            });



        });
    </script>
  </body>
</html>
<?php
    $mysqli->close();
} else {
    $mysqli->close();
    exit();
}
?>