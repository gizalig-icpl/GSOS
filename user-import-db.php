<?php
ini_set('max_execution_time', '0');
include_once('include/session.php');
include_once('include/connection.php');
include_once('include/functions.php');
include_once('include/sendmailer.php');
    require './vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $otp=config("userpassword","otp");
    // $month_arr = ['January' => 1,'February' => 2,'March'=> 3,'April'=> 4,'May'=> 5,'June'=> 6,'July'=> 7,'August'=> 8,'September'=> 9,'October'=> 10,'November'=> 11,'December'=> 12];

    $spreadsheet = new Spreadsheet();

    $file_name=$_POST['fileName'];

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_name);

    $sheet = $spreadsheet->getSheet(0);
    
    // Store data from the activeSheet to the varibale in the form of Array
    $data = array(1,$sheet->toArray(null,true,true,true)); 
    
    $data = $data[1];

    $final_arr = [];
    $email_all=[];
    $end_row  = $sheet->getHighestRow();
    $secondary_arr = [];
    for($i=0;$i<count($final_arr);$i++){
        $email_all[$i]= $data[$i]['D'];
        array_push($final_arr,$email_all);
    }
    for($i=0;$i<count($email_all);$i++){
        $row = $email_all[$i];
        echo $row['email'];
    }
    for($i=1;$i<=$end_row;$i++){
        if(is_numeric($data[$i]['A'])){
            
            $tmpArr = [];
            
            $tmpArr['first_name'] = $data[$i]['B'];
            $tmpArr['last_name'] = $data[$i]['C'];
            $tmpArr['email']= $data[$i]['D'];
            $tmpArr['desig'] = $data[$i]['E'];
            $tmpArr['department'] = $data[$i]['F'];
            $tmpArr['emp_id'] = $data[$i]['G'];
            // $tmpArr['Month'] = $data[$i]['H'];
            // $tmpArr['Year'] = $data[$i]['I'];
            // $tmpArr['Representation'] = $data[$i]['J'];
            array_push($final_arr,$tmpArr);
        }
    }
    $authorizationjson='{"Compliance":"0","Simplerisk":"0","Security":"1","Quiz":"1","Tabletop":"0"}';
	
    // $sql = "INSERT INTO user (first_name,last_name,role, email,pass, desig, department, emp_id,authorization) VALUES (:first_name, :last_name,0, :email,'user@2023', :desig, :department, :emp_id,:authorization)";
	// $stmt = $dbh->prepare($sql);


// echo $final_arr;exit;
// print_r($final_arr);exit;

    for($i=0;$i<count($final_arr);$i++){
        $row = $final_arr[$i];  

        $first_name = clean_text($row['first_name']);
        $last_name = clean_text($row['last_name']);
        $email = clean_text($row['email']);
        $desig = clean_text($row['desig']);
        $department = clean_text($row['department']);
        $location = clean_text($row['location']);
        $emp_id = clean_text($row['emp_id']);
        $role = 0;
        $token = "";
        $password_length = rand(8, 16);
        $otp_length = 6;
        $pw = '';

        $sql = "SELECT * FROM `users` where email=:email";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":email" => $email
        ));

        $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($result2)==0){

        if($otp==1){
            for($p = 0; $p < $otp_length; $p++) {
                $pw .= chr(rand(48, 57));
            }
        }else{
            for($p = 0; $p < $password_length; $p++) {
                $pw .= chr(rand(32, 126));
            }
        }
        $pass=password_hash($pw,PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(first_name,last_name,email,role,desig,department,location,emp_id,pass,authorization,token,org_id) values (:first_name,:last_name,:email,:role,:desig,:department,:location,:emp_id,:pwd,:authorization,:token,:org_id) ";
	    $stmt = $dbh->prepare($sql);
	    $stmt->execute(array(
            ":first_name"=>$first_name,
            ":last_name"=>$last_name,
	    	":email" => $email,
            ":role" => $role,
			":desig" => $desig,
			":department" => $department,
			":location" => $location,
			":emp_id" => $emp_id,
			":pwd" => $pass,
			":authorization" =>$authorizationjson,
			":token" => $token,
            "org_id" => 1
	    ));
	    
		$id = $dbh->lastInsertId();
        sendAllUser($email,$pw);
        try {
	   
            $sql1 = "SELECT * FROM privilege_table WHERE user_id=:id and privilege=:p";
            $stmt1 = $dbh->prepare($sql1);
            $arr = ["Vission","Kpi","Enterprise","Polices","Awarness","War","Quiz","Project"];
            for($j=0;$j<count($arr);$j++){
                
                $stmt1->execute(array(
                    ":id" => $id,
                    ":p" => $arr[$j]
                ));

                $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

                if(empty($result1)){
                    $status=0;
                    if($arr[$j] == 'Awarness' || $arr[$j] == 'Quiz' ) {
                        $status = '1';
                    }
                    
                    $sql3 = "INSERT INTO privilege_table (user_id,privilege,status) VALUES (:id,:p,:s)";
                    $stmt3 = $dbh->prepare($sql3);
                    $stmt3->execute(array(	
                        ":id" => $id,
                        ":p" => $arr[$j],
                        ":s"=> $status,
                    ));
                }
                
            }
            
    // $authorization_string = "";
    // if($authorization){
    //     foreach ($authorization as $key => $value) {
    //         if($value==1){
    //             $authorization_string .= $key."<br>";
    //         }
    //     }
    // }
    
    // $priviledge_string = "";
    // if($arr){
    //     foreach ($arr as $key => $value) {
    //         $appValue = $_POST[strtolower($value)];
    //         if($appValue==1){
    //             $priviledge_string .= $value."<br>";
    //         }
    //     }
    // }

    // senduserValue("addUser",$authorization_string,$priviledge_string,$pw);	
    // echo "Inserted";
    
        }
        catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }


    }
        
        // $stmt->execute(array(
        //     ":first_name" => $row['first_name'],
        //     ":last_name" => $row['last_name'],
        //     ":email" => $row['email'],
        //     ":desig" => $row['desig'],
        //     ":department" => $row['department'],
        //     ":emp_id" => $row['emp_id'],
        //     ":authorization"=>$authorization
        // ));
    }
 

   

	if($stmt->rowCount() > 0){
	    $_SESSION['kpi-status'] = "success";
        header('Location: import-user.php');
	}
	else{
	    $_SESSION['kpi-status'] = "error";
        header('Location: import-user.php');
	}
?>