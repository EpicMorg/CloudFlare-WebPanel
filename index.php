<?php
require_once ("sql.php");

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

<?php include("nav.php"); ?>
    <!-- Begin page content -->
    <div class="container">
<?php
require_once ("functions.php");
require_once ("sql.php");
$data = $mysqli->query("SELECT * FROM users");

?>
      <div class="page-header">
        <h1>Добро пожаловать в CloudFlare WebPanel</h1>
      </div>
        <?php
if(!$data->num_rows) { ?>
      <!-- Показывается только если конфиг пустой -->
      <p class="lead">Похоже, у вас еще не добавлено ни одного аккаунта <code>CloudFlare</code>.</p>
      <p>Зайдите в <a href="/settings/">настройки</a> для продолжения работы.</p>
<?php }

$flag = false;
        $str = "";
while($row = $data->fetch_array())  {

    $connection = curl_init();

    curl_setopt($connection, CURLOPT_URL, "https://api.cloudflare.com/client/v4/user");

    curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

    $headers = [
        'X-Auth-Email: ' . $row["email"],
        'X-Auth-Key: ' . $row["api"],
        'Content-Type: application/json'
    ];

    curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($connection);

    curl_close($connection);

    $result = json_decode($result);

    if(!isset($result->result->id)) {
        $flag = true;

        $str = $str.", ".$row["name"];

    }


}

if($flag) {
    $str = ltrim($str, ", ");
    print <<< HTML

<!-- Показывается только если какой-то из токенов протух -->
      <p class="lead">Похоже, некоторые токены ({$str}) <code>CloudFlare</code> неверны.</p>
      <p>Зайдите в <a href="/settings/">настройки</a> для продолжения работы.</p>
HTML;
}

        $mysqli->close();
        ?>




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
