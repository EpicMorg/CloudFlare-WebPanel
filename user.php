<?php
require_once ("functions.php");
require_once ("sql.php");

$user_id = clear_data($_GET["user_id"]);
$data = $mysqli->query("SELECT * FROM users WHERE id = $user_id");
if($data->num_rows)  {
    $row = $data->fetch_array();


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
      <div class="page-header">
        <h1><?=$row["name"];?></h1>
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
  <?php
  $connection = curl_init();

  curl_setopt($connection, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones");

  curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);


  $headers = [
  'X-Auth-Email: ' . $row["email"],
  'X-Auth-Key: ' . $row["api"]
  ];

  curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($connection);

  curl_close($connection);

  $result = json_decode($result);
    if(isset($result->result)) {
        foreach ($result->result as $val) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $val->name . "</td>";
            echo "<td><a href=\"/edit.php?zone_id={$val->id}&user_id={$row["id"]}\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a></td>";
            echo "</tr>";
        }
    }
  $mysqli->close();

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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="/assets/js/jquery-3.1.1.min.js"><\/script>')</script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        function changeClass(){
              $("#page-main").removeClass("active"); 
              $("#page-settings").removeClass("active");
              $("#page-show-all").addClass("active");
              $("#page-show").removeClass("active");
            }
            changeClass();
           });
    </script>
  </body>
</html>
<?php
}
else {
    exit("Access Denied!");
}