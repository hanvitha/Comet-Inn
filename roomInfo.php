<?php  include 'menu.php';
    require_once('config.php');
?>
<?php
    $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
    $query = $db->prepare("SELECT * FROM hotel");
    $query->execute();
    $rows=$query->fetchAll();
    if(isset($_GET["deleteId"])){
        deleteRoom($_GET["deleteId"]);
    }
    function deleteRoom($id){
        $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $updateQuery =  $db->prepare("UPDATE room SET status=0 WHERE room_id=$id");  
        $result = $updateQuery->execute();
    }
?>
<div class="search-page search-grid-full">
    <div class="container">
        <div class="tab-content">
            <form action="">
                <div class="droop-down">
                    <div class="droop">
                        <div class="sort-by">
                            <select class="sel" name="city">
                                <?php
                                    $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
                                    $query = $db->prepare("SELECT * FROM hotel where status=1");
                                    $query->execute();
                                    $rows=$query->fetchAll();
                                    ?><option value="">CHOOSE CITY</option>  
                                    <?php for($i=0; $i< count($rows); $i++){?>
                                    <option value="<?php echo $rows[$i]["hotel_id"]?>" <?php if( $_GET['city'] === $rows[$i]["hotel_id"]) echo ' selected="selected"' ?> ><?php echo $rows[$i]["city_name"]?></option>  
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="search">
                            <input type="submit" name="search" value="search">
                    </div>
                </div>
            </form>	
        </div>
    </div>
    <div class="search-page search-grid-full">
    <div class="container">
        <div class="tab-content">
            <?php
                if(isset($_GET['search'])){
                    getRooms();
                }
                function getRooms(){
                    try{    
                        $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                        $id = $db->quote($_POST["city"]);
                        $hotel_id = $_POST["city"];
                        $address = $_POST[$_POST["city"].'_location'];
                        $query = $db->prepare("SELECT * FROM room where hotel_id = $id and status=1");
                        $query->execute();
                        $rooms=$query->fetchAll();
                        for($i=0; $i< count($rooms); $i++){?>
                            <div class="hotel-rooms">
                                <div class="hotel-left">
                                    <a href="roomUpdate.php?roomId=<?php echo $rooms[$i]["room_id"]?>"><span class="glyphicon glyphicon-bed" aria-hidden="true"></span></a>
                                    <p><?php echo $rooms[$i]["room_desc"] ?></p>
                                    <div class="hotel-left-grids">
                                        <div class="hotel-left-one">
                                        <a href="single.php"><img src="<?php echo $rooms[$i]["image_url"]?>" width="130px" height="230px"></a>
                                        </div>
                                        <div class="hotel-left-two">
                                            <div class="rating text-left">
                                                <?php for($count = 0; $count < $rooms[$i]["customer_rating"]; $count++){?>
                                                <span>☆</span>
                                                <?php } ?>
                                            </div>
                                            <a href="roomUpdate.php?roomId=<?php echo $rooms[$i]["room_id"]?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"><?php echo $address ?></span></a>
                                            <p>
                                                <i>Features:</i>
                                                <?php 
                                                $roomId = $rooms[$i]["room_id"];
                                                $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
                                                $query = $db->prepare("SELECT f.feature_name feature_name FROM room_features rf inner join features f on rf.feature_id = f.feature_id where rf.room_id=$roomId");
                                                $query->execute();
                                                $rows=$query->fetchAll();
                                                for($p = 0; $p < count($rows); $p++){?>
                                                     <span> <?php echo $rows[$p]['feature_name'] ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="hotel-right text-right">
                                    <h4>$<?php echo $rooms[$i]["price"] ?></h4>
                                    <p>Best price</p>
                                    <a class="update" href="roomUpdate.php?roomId=<?php echo $rooms[$i]["room_id"]?>">Update</a>
                                    <a class="delete" href="roomInfo.php?deleteId=<?php echo $rooms[$i]['room_id']?>">Delete</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php }?>
                            <a href="addRoom.php?hotelId=<?php echo $hotel_id?>">Add Room</a>
                            <?php
                    }catch(PDOException $ex){
                        echo $ex->getMessage(); 
                    }
                }
                function console_log( $data ){
                    echo '<script>';
                    echo 'console.log('.  $data .')';
                    echo '</script>';
                  }
            ?>
        </div>
    </div>
    </div>