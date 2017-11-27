<?php include 'menu.php';
require_once('config.php');
if(!isset($_SESSION["sess_userid"])){
	echo '<script type="text/javascript">location.href = "index.php";</script>';
	echo '<script type="text/javascript">alert("please login");</script>';	
}
?>
<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
        $query = $db->prepare("SELECT * FROM user where user_id = $id");
        $query->execute();
        $row=$query->fetchAll();
    }
    
?>
<div class="search-page search-grid-full">
<div class="booking">
	<div class="container">
			<div class="reservation-form">
				<div class="col-md-9 reservation-right">
					<form method="POST" action="custInfo.php?id=<?php echo $row[0]["user_id"]?>" name="custInfo" class="edit">
						<h4>Name</h4>         			
                        <input type="text" name="name" value="<?php echo $row[0]["name"] ?>" placeholder="Name" required>
						<h4>Email</h4>
						<input type="text" name="email" value="<?php echo $row[0]["email_id"] ?>"  placeholder="Email" required>
						<h4>Phone</h4>
						<input type="text" name="phone" value="<?php echo $row[0]["phone"] ?>"  placeholder="Phone" required>
						<input type="submit" name="submitted" class="btn1 btn-1 btn-1e" value="UPDATE NOW">
					</form>
				</div>
			</div>
	</div>
</div>
</div>
<?php
    if(isset($_POST['submitted'])){
        editProfile();
    }
    function editProfile(){
        try{    
            $db = new PDO("mysql:dbname=".DBNAME.";host=".DBHOST, DBUSER, DBPASS);  
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $id = $db->quote($_GET["id"]);
            //$id  = $_GET["id"];
            $name = $db->quote($_POST["name"]);
            $email = $db->quote($_POST["email"]);
            $phone = $db->quote($_POST["phone"]);
            $updateQuery =  $db->prepare("UPDATE user SET name=$name, email_id=$email, phone=$phone WHERE user_id=$id");  
            $result = $updateQuery->execute();
            echo '<script type="text/javascript">location.href = "usersList.php";</script>';
            //header("Location:usersList.php");
        }catch(PDOException $ex){
            echo "<script type='text/javascript'>alert('$ex->getMessage();');</script>"; 
        }
    }
?>