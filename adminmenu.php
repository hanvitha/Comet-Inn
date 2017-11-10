<?php include 'menu.php';
require_once('config.php');
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/chocolat.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="search-page search-grid-left">
    <div class="container">
        <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#userlist">Users List</a></li>
        <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
        <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
        <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
        </ul>
        <div class="tab-content">
            <div id="userlist" class="tab-pane fade in active padded">
                    <?php
                    try{
                        $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = $db->prepare("SELECT * FROM user where user_id > 1");
                        $query->execute();
                        $rows=$query->fetchAll();
                        if(count($rows) > 0){?>
                            <div style="overflow-x:auto;">
                                <table class="responstable">
                                    <tr>
                                        <th>USER ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>PHONE</th>
                                    </tr>
                                <?php for($i=0; $i< count($rows); $i++){?>
                                    <tr>
                                        <td><?php echo $rows[$i]['user_id']?> </td>
                                        <td><?php echo $rows[$i]['name']?> </td>
                                        <td><?php echo $rows[$i]['email_id']?> </td>
                                        <td><?php echo $rows[$i]['phone']?> </td>
                                    </tr>
                                <?php
                            }
                        }else{
                            echo "No users yet!!!";
                        }
                   }catch(PDOException $ex){
                        echo $ex->getMessage(); 
                    }
                ?>
                                </table>
                            </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="menu3" class="tab-pane fade">
                <h3>Menu 3</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
        </div>
    </div>
</div>
</div>
