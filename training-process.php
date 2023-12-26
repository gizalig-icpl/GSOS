<?php
require_once('include/connection.php');
require_once('include/functions.php');
require_once('include/pagination.php');

function getUsersData()
{
    global $dbh;

    // Set some useful configuration 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = config("pagination","users"); 
     
    // Set conditions for column sorting 
    $sortSQL = 'ORDER BY created DESC'; 
    if(!empty($_POST['coltype']) && !empty($_POST['colorder'])){ 
        $coltype = $_POST['coltype']; 
        $colorder = $_POST['colorder']; 
        $sortSQL = " ORDER BY $coltype $colorder"; 
    } 
     
    // Count of all records 
    $query   = $dbh->query("SELECT COUNT(*) as rowNum FROM users"); 
    $result  = $query->fetchAll(PDO::FETCH_ASSOC); 
    $rowCount= $result[0]['rowNum']; 
     
    // Initialize pagination class 
    $pagConfig = array( 
        'totalRows' => $rowCount, 
        'perPage' => $limit, 
        'currentPage' => $offset, 
        'contentDiv' => 'dataContainer', 
        'link_func' => 'columnSorting' 
    ); 
    $pagination =  new Pagination($pagConfig); 
 
    // Fetch records based on the offset and limit 
    $query = "SELECT * FROM users $sortSQL LIMIT :offset,:limit";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    // $stmt->bindParam(':sortby', $sortSQL, PDO::PARAM_STR);
    $stmt->execute();
    ?> 
    <!-- Data list container --> 
    <table class="table align-middle table-hover sortable"> 
    <thead class="table-secondary">
    <tr>
        <th scope="col">
            <input type="checkbox"  class="checkbox">
        </th>
        <th scope="col">
            ID
        </th>
        <th scope="col" class="sorting" coltype="first_name" colorder="">First Name</th>
        <th scope="col" class="sorting" coltype="last_name" colorder="">Last Name</th>
        <th scope="col" class="sorting" coltype="email" colorder="">Email</th>
        <th scope="col" class="sorting" coltype="created" colorder="">Created</th>
        <th scope="col" class="sorting" coltype="last_login" colorder="">Last Login</th>
        <th scope="col" class="sorting" coltype="status" colorder="">Status</th>
        <th scope="col" class="sorting" coltype="is_test" colorder="">User Type</th>
        <th scope="col">Action</th>
    </tr>
    </thead> 
    <tbody> 
        <?php 
        if($stmt->rowCount() > 0){
            $i=1;
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $key => $row){ 
        ?> 
            <tr>
                <th scope="row">
                    <input type="checkbox" value="<?php echo $row["id"]; ?>" name="user_ids[]" class="checkbox">    
                </th>
                <td><?php echo intval($offset)+intval($i++); ?></td>
                <td><?php echo $row["first_name"]; ?></td>
                <td><?php echo $row["last_name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["created"]; ?></td>
                <td><?php echo $row["last_login"]; ?></td>
                <td><?php echo ($row["status"] == 1)?'Active':'Inactive'; ?></td>
                <td><?php echo ($row["is_test"] == 1)?'Live':'Test'; ?></td>
                <td>
                            <button type="button" onClick="changepassword(<?php echo $row["id"]; ?>)" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createModel" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change Password">
                                <i class="bi bi-lock-fill"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createModel" onClick="getUsers(<?php echo $row["id"]; ?>,'createModal')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update User">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button data-test-id="delete_user" type="button" class="btn btn-sm btn-outline-danger" onClick="displayLoader();deleteUser(<?php echo $row["id"]; ?>);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" >
                            <i class="bi bi-trash-fill"></i>
                            </button>
                            
                             <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createModel" onClick="getUsers(<?php echo $row["id"]; ?>,'settingUser')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update User Authorization">
                                <i class="lni lni-user"></i>
                            </button>
                             <button type="button" class="btn btn-sm btn-outline-primary"  onClick="mailUser(<?php echo $row["id"]; ?>)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Invitation Mail">
                                <i class="bi bi-envelope"></i>
                            </button>
                             <button type="button" class="btn btn-sm btn-outline-primary"  onClick="userPanel(<?php echo $row["id"]; ?>)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User Panel">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </td>
            </tr>
        <?php 
            } 
        }else{ 
            echo '<tr><td colspan="8">No records found...</td></tr>'; 
        } 
        ?> 
    </tbody> 
    </table> 
     
    <!-- Display pagination links --> 
    <?php echo $pagination->createLinks(); ?> 

        <?php






    // global $dbh;

    // // Get parameters from the client
    // $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    // $searchValue = isset($_POST['search']) ? $_POST['search'] : '';
    // $startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '';
    // $endDate = isset($_POST['endDate']) ? $_POST['endDate'] : '';
    // $recordsPerPage = isset($_POST['recordsPerPage']) ? $_POST['recordsPerPage'] : 10;

    // // Calculate the start index of the records for the current page
    // $startIndex = ($page - 1) * $recordsPerPage;

    // // Query to retrieve data with search and date filter
    // $query = "SELECT * FROM users WHERE (first_name LIKE :searchValue OR last_name LIKE :searchValue OR email LIKE :searchValue)";
    // $params = array(':searchValue' => '%' . $searchValue . '%');

    // if (!empty($startDate) && !empty($endDate)) {
    //     $query .= " AND created BETWEEN :startDate AND :endDate";
    //     $params[':startDate'] = $startDate;
    //     $params[':endDate'] = $endDate;
    // }

    // $query .= " ORDER BY created DESC LIMIT $startIndex, $recordsPerPage";

    // $stmt = $dbh->prepare($query);
    // $stmt->execute($params);
    // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // // Total records query (without pagination)
    // $totalRecordsQuery = "SELECT COUNT(*) FROM users WHERE (first_name LIKE :searchValue OR last_name LIKE :searchValue OR email LIKE :searchValue)";
    // $totalParams = array(':searchValue' => '%' . $searchValue . '%');

    // if (!empty($startDate) && !empty($endDate)) {
    //     $totalRecordsQuery .= " AND created BETWEEN :startDate AND :endDate";
    //     $totalParams[':startDate'] = $startDate;
    //     $totalParams[':endDate'] = $endDate;
    // }

    // $totalStmt = $dbh->prepare($totalRecordsQuery);
    // $totalStmt->execute($totalParams);
    // $totalRecords = $totalStmt->fetchColumn();

    // // Calculate the total number of pages
    // $totalPages = ceil($totalRecords / $recordsPerPage);

    // // Prepare response data
    // $response = array(
    //     "data" => $data,
    //     "totalPages" => $totalPages
    // );

    // // Send JSON response back to the client
    // header('Content-Type: application/json');
    // echo json_encode($response);
}

function updateUserStatus($status, array $id){
    global $dbh;
    $ids = implode(",", $id);
    $query = "UPDATE training SET assign_status = :status WHERE training_id IN ($ids)";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    $result = $stmt->execute();
    if($result){
        echo 'success';
    }
}

try {
    $action = $_POST['action'];
    switch ($action) {
        case 'get';
        break;
        case 'add';
        break;
        case 'list';
            getUsersData();
        break;
        case 'del';
        break;
        case 'disable';
            $id = $_POST['ids'];
            updateUserStatus(0, $id);
        break;
        case 'enable';
            $id = $_POST['ids'];
            updateUserStatus(1, $id);
        break;
        default:
            '';
            break;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>