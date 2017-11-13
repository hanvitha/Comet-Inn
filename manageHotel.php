<?php  include 'menu.php';
    require_once('config.php');
    $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
    $query = $db->prepare("SELECT * FROM hotel where status=1");
    $query->execute();
    $hotels=$query->fetchAll();

    if(isset($_GET["deleteId"])){
        deleteRoom($_GET["deleteId"]);
    }
    function deleteRoom($id){
        $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        //$id = $db->quote($id);
        $updateQuery =  $db->prepare("UPDATE hotel SET status=0 WHERE hotel_id=$id");  
        $result = $updateQuery->execute();
        echo '<script type="text/javascript">location.href = "manageHotel.php";</script>';
    }
?>
<div class="search-page search-grid-full">
    <div class="container">
    <?php 
        for($i = 0 ; $i < count($hotels) ; $i++){?>
            <div class="hotel-cities">
                <div class="cities-left">
                    <div class="hotel-left-grids">
                        <div class="cities-left-one reservation-right h4">
                            <h4>
                                City: <span class="names"> <?php echo $hotels[$i]["city_name"] ?> </span>
                            </h4>
                            <h4>
                                Address: <span class="names"> <?php echo $hotels[$i]["address"] ?> </span>
                            </h4>
                            <h4>
                                Zipcode: <span class="names"> <?php echo $hotels[$i]["zipcode"] ?> </span>
                            </h4>
                            <div class="update-button search">
                                <input type="button" class="update" value="update" onclick="location.href = 'updateCity.php?cityId=<?php echo  $hotels[$i]["hotel_id"] ?>'"/>
                                <input type="button" value="delete" onclick="location.href = 'manageHotel.php?deleteId=<?php echo  $hotels[$i]["hotel_id"] ?>'"/>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <a href="addCity.php">Add City</a>
    </div>
</div>