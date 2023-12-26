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
    $isdeleted=0;
    $sql = "select * from asset_recertification where isdeleted=:isdeleted";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':isdeleted', $isdeleted, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['action'])){
        deleteid($_POST['id']);
    }
    function deleteid($id){
        global $dbh;
        $isdeleted=1;
        $sql="UPDATE `asset_recertification` SET isdeleted=:isdeleted WHERE id=:id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':isdeleted', $isdeleted, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Asset Recertification Form</title>
    <link rel="stylesheet" href=
"https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  
    <!--jQuery library file -->
    <script type="text/javascript" 
        src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
  
    <!--Datatable plugin JS library file -->
    <script type="text/javascript" 
src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    </script>
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
        <div class="header">Asset Recertification</div>
        <br>
        <table class="display">
            <thead>
                <th>Id</th>
                <th>Asset Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Classification</th>
                <th>Owner</th>
                <th>Custodian</th>
                <th>Risk_level</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                if($stmt->rowCount() > 0){
                    $i=1;
                    foreach($rows as $key => $row){ 
                        ?>
                        <tr>
                            <td><?php echo intval($i++); ?></td>
                            <td><?php echo $row["asset_id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["description"]; ?></td>
                            <td><?php echo $row["classification"]; ?></td>
                            <td><?php echo $row["owner"]; ?></td>
                            <td><?php echo $row["custodian"]; ?></td>
                            <td><?php echo $row["risk_level"]; ?></td>
                            <td>
                                <i class="bi bi-trash-fill" onclick="deleteid(<?php echo $row['id']; ?>)"></i>
                                <a href="updated_asset_recertification_form.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-fill"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        /* Initialization of datatables */
        $(document).ready(function () {
            $('table.display').DataTable();
        });
        function deleteid(id){
            $.ajax({
                method: 'POST',
                url: './view_asset_recertification.php',
                data: { action: 'fetch',id:id },
                success: function (res) {
                    location.reload();
                },
                error: function (res) {
                    console.log(res);
                },
            });
        }
    </script>
</body>
</html>
