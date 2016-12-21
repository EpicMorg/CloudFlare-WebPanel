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
                <li id="page-main" class="active"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Главная</a></li>
                <li  id="page-show-all" class="dropdown">
                    <a href="JavaScript:();" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> Отображение <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li id="page-show"><a href="/index-all.php"><i class="fa fa-users" aria-hidden="true"></i> Все аккаунты</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Отдельные аккаунты</li>
                        <?php
                        $data1 = $mysqli->query("SELECT * FROM users");

                        if($data1->num_rows) {
                            while ($row1 = $data1->fetch_array()) {
                                echo "<li><a href=\"/user.php?user_id={$row1["id"]}\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i> {$row1["name"]}</a></li>";
                            }

                        }
                        ?>

                    </ul>
                </li>
                <li id="page-settings"><a href="/settings/"><i class="fa fa-cogs" aria-hidden="true"></i> Настройки</a></li>
                <!--<li><a href="/rss.php"><i class="fa fa-rss-square" aria-hidden="true"></i> RSS</a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>