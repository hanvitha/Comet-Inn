<?php  include 'menu.php';
    require_once('config.php');
?>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/chocolat.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<?php
    
/* if(isset($_POST['submit_image'])){
	$name = $_FILES['upload_file']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['upload_file']['tmp_name'];

	if(move_uploaded_file($tmp, 'uploads/'.$image_name)){
		$db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
        $roomId = $db->quote($_GET["roomId"]);
        $roomImage = $db->quote('uploads/'.$image_name);
        $updateQuery =  $db->prepare("INSERT INTO room(room_image) values($roomImage)");  
        $result = $updateQuery->execute();
        echo "<script type='text/javascript'>alert('$result');</script>"; 
    }
} */

?>

<div class="search-page search-grid-full">
    <div class="booking">
        <div class="container">
            <div class="reservation-form">
                <div class="col-md-9 reservation-right">
                    <form action="uploadScripts.php" method="post" id="imageform" enctype="multipart/form-data">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="upload_file" name ="upload_file" accept=".png, .jpg, .jpeg" />
                                <label for="upload_file"></label>
                                <input type="submit" name='submit_image' value="Upload Image" id="submit_image"/>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="">
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="addRoom.php" name="addRoom" id="addRoom" class="edit">
                        <h4>Description</h4>         			
                        <input type="text" name="desc" placeholder="Description" required>
                        <h4>Price($)</h4>         			
                        <input type="text" name="price" placeholder="Price" required>
                        <h4>Room Type</h4>      
                        <div class="sort-by">
                            <select class="sel" id="roomType" name="roomType">
                                <option value="">Select Room Type</option>
                                <option value="Single Bed">Single Bed</option>
                                <option value="Double Bed">Double Bed</option>
                            </select>
                        </div><br/><br/>
                        <h4>Max occupancy</h4>         			
                        <input type="number" name="max_occupancy" placeholder="Max Occupancy" required>
                        <h4>Features</h4>         			
                        <div class="sort-by">
                            <select class="sel" id="features" name="features[]" multiple="multiple">

                                <?php
                                    $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
                                    $query = $db->prepare("SELECT * FROM features");
                                    $query->execute();
                                    $rows=$query->fetchAll();
                                    for($i=0; $i< count($rows); $i++){?>
                                    <option value="<?php echo $rows[$i]["feature_id"]?>"><?php echo $rows[$i]["feature_name"]?></option>  
                                    <?php }?>
                            </select>
                        </div><br/><br/>
                        <input type="submit" name="submitted" class="btn1 btn-1 btn-1e" value="CREATE">
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#features').select2();
        $('#imagePreview').css("background-image",'url(images/upload.png)');
    });
    /* document.getElementById("upload_file").onchange = function() {
        document.getElementById("submit_image").click();
    }; */
    $("#upload_file").on('change',function(){}) 
    // photoimg is the ID name of INPUT FILE tag and 

    $('#imageform').ajaxForm()
    //imageform is the ID name of FORM. While changing INPUT it calls FORM submit without refreshing page using ajaxForm() method.  
    $('#upload_file').on('change', function()
    {
        $("#preview").html('');
        $("#preview").html('<img src="images/loader.gif" alt="Uploading...."/>');
        $("#imageform").ajaxForm(
        {
            target: '#imagePreview'
        }).submit();
        //$('#imagePreview').contents(':not(title)').andSelf().remove();
    });
</script>

<?php
    if(isset($_POST['submitted'])){
        createProfile();
    }
    function createProfile(){
        try{    
            $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $hotel = $db->quote($_GET["hotelId"]);
            $desc = $db->quote($_POST["desc"]);
            $price = $db->quote($_POST["price"]);
            $imgsrc = $db->quote($_POST["imgsrc"]);
            $roomType = $db->quote($_POST["roomType"]);
            $max_occupancy = $db->quote($_POST["max_occupancy"]);
            $insertQuery =  $db->prepare("INSERT INTO room(room_desc, price, room_type, max_occupancy, hotel_id, room_image, status) values($desc, $price, $roomType, $max_occupancy, $hotel, $imgsrc,1 )");  
            $result = $insertQuery->execute();
            $roomId = $db->lastInsertId(); 
            $featuresList = $_POST["features"];
            $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            for($featureNo = 0; $featureNo < count($featuresList); $featureNo++){
                $sql = "INSERT INTO room_features VALUES ($roomId, $featuresList[$featureNo])";
                $db->exec($sql);
            }
            echo '<script type="text/javascript">location.href = "roomInfo.php";</script>';
            //header("Location:roomInfo.php"); */
        }catch(PDOException $ex){
            echo "<script type='text/javascript'>alert('$ex->getMessage();');</script>"; 
        }
    }
    
?>