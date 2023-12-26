<?php
@define("DB_HOST", "localhost");
@define("DB_USERNAME", "root");
@define("DB_PASSWORD", "");
@define("DB_NAME", "gsos_db");
    global $dbh;
    try {
        $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
if(isset($_POST['add_asset'])){
    global $dbh;
    $sql = "INSERT INTO asset_recertification(asset_id, name, description, classification, owner, custodian, risk_level) values (:asset_id, :name, :description, :classification, :owner, :custodian, :risk_level) ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":asset_id"=>$_POST['asset_id'],
        ":name"=>$_POST['asset_name'],
        ":description" => $_POST['asset_description'],
        ":classification" => $_POST['asset_classification'],
        ":owner" => $_POST['asset_owner'],
        ":custodian" => $_POST['asset_custodian'],
        ":risk_level" => $_POST['risk_level']
    ));

}
if(isset($_POST['update_asset'])){
    global $dbh;
    $sql = "UPDATE asset_recertification SET asset_id=:asset_id,name=:name,description=:description,classification=:classification,owner=:owner,custodian=:custodian,risk_level=:risk_level WHERE id=:id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":asset_id"=>$_POST['asset_id'],
        ":name"=>$_POST['asset_name'],
        ":description" => $_POST['asset_description'],
        ":classification" => $_POST['asset_classification'],
        ":owner" => $_POST['asset_owner'],
        ":custodian" => $_POST['asset_custodian'],
        ":risk_level" => $_POST['risk_level'],
        ":id" => $_GET['id']
    ));
    header('location: view_asset_recertification.php');
}
if(isset($_GET['id'])){
    global $dbh;
    $sql = "select * from asset_recertification where id=:id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Asset Recertification Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #1c1e21;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            color: #1877f2;
        }
        .field {
            width: 100%;
            padding: 10px;
            font-size: 14px;
        }
        .label {
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="updated_asset_recertification_form.php">Add Asset</a>
        <a href="view_asset_recertification.php">View Asset</a>
        <div class="header">Asset Recertification Form</div>
        <br>
        <form action="" method="post">
            <div class="label">Asset Information:</div>
            Asset ID: <input class="field" type="text" name="asset_id" value="<?php if(isset($_GET['id'])){echo $rows['asset_id'];} ?>" required><br>
            Asset Name: <input class="field" type="text" name="asset_name" value="<?php if(isset($_GET['id'])){echo $rows['name'];} ?>" required><br>
            Asset Description: <input class="field" type="text" name="asset_description" value="<?php if(isset($_GET['id'])){echo $rows['description'];} ?>" required><br>
            Asset Classification: 
            <select class="field" name="asset_classification" required>
                <option value="Public" <?php if(isset($_GET['id'])){if($rows['classification']=='Public'){echo "selected";}} ?>>Public</option>
                <option value="Private" <?php if(isset($_GET['id'])){if($rows['classification']=='Private'){echo "selected";}} ?>>Private</option>
                <option value="Confidential" <?php if(isset($_GET['id'])){if($rows['classification']=='Confidential'){echo "selected";}} ?>>Confidential</option>
            </select><br>
            Asset Owner: <input class="field" type="text" name="asset_owner" value="<?php if(isset($_GET['id'])){echo $rows['owner'];} ?>" required><br>
            Asset Custodian: <input class="field" type="text" name="asset_custodian" value="<?php if(isset($_GET['id'])){echo $rows['custodian'];} ?>" required><br>
            <!-- Add other fields with required attribute -->
            <div class="label">Asset Risk Information:</div>
            Risk Level: 
            <select class="field" name="risk_level" required>
                <option value="High" <?php if(isset($_GET['id'])){if($rows['risk_level']=='High'){echo "selected";}} ?>>High</option>
                <option value="Medium" <?php if(isset($_GET['id'])){if($rows['risk_level']=='Medium'){echo "selected";}} ?>>Medium</option>
                <option value="Low" <?php if(isset($_GET['id'])){if($rows['risk_level']=='Low'){echo "selected";}} ?>>Low</option>
            </select><br>
            <?php
            if(isset($_GET['id'])){
                ?>
                <input type="submit" value="Update" name="update_asset">
                <?php
            }else{
                ?>
                <input type="submit" value="Submit" name="add_asset">
                <?php
            }
            ?>
        </form>
    </div>
</body>
</html>
