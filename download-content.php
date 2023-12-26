<?php
require 'vendor/autoload.php';

require_once("include/header.php");

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

ini_set('max_execution_time', 30000); // 5 minutes

function convertForwardSlashesAndRemoveSpaces($string)
{
    $convertedString = '';

    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] === '/') {
            $convertedString .= '\\'; // Add a backward slash
        } elseif ($string[$i] !== ' ') {
            $convertedString .= $string[$i]; // Keep the character if it's not a space
        }
    }

    return $convertedString;
}

?>
<div class="wrapper">
        <div class="page-content">

        <div class="main-title card p-2" >
            <h2 class="text-success"><em class="bi bi-file-earmark-richtext"></em> <?php echo "Awareness Content";?></h2>
        </div>

        <div class="content card card-body">

            <div class="container-fluid">

            <table class="table align-middle table-hover sortable">
                    <thead class="table-secondary">
                            <tr>
                                <th scope="col">Path</th>
                                <th scope="col">LastModified</th>
                                <th scope="col">Bucker LastModified</th>
                                <th scope="col">Message</th>
                            </tr>
                    </thead>
                    <tbody>
<?php
if ($_POST['submit']) {

    $result = array();
    $i = 0;

    $accessKeyId = $_POST['access_key'];
    $secretAccessKey = $_POST['secret_access_key'];
    $bucketName = $_POST['bucket_name'];
    $region = $_POST['region'];

    if (PHP_OS == "WINDOWS") {
        $downloadPath = APPLICATION_PATH . "photos\ ";
    } else{
        $downloadPath = APPLICATION_PATH . "photos/";
    }

    $s3Client = new S3Client([
        'version' => 'latest',
        'region' => $region,
        'credentials' => [
            'key' => $accessKeyId,
            'secret' => $secretAccessKey,
        ],
    ]);


    try {
        $objects = $s3Client->listObjectsV2([
            'Bucket' => $bucketName,
        ]);

        foreach ($objects['Contents'] as $object) {

            $key = $object['Key'];
            $result[$i]['key'] = $key; 
            if (PHP_OS == "WINDOWS") {
                $localFilePath = convertForwardSlashesAndRemoveSpaces($downloadPath . $key);
            } else {
                $localFilePath = $downloadPath . $key;
            }
            $result[$i]['localFilePath'] = $localFilePath; 
            
            if (is_file($localFilePath)) {

                $localLastModified = filemtime($localFilePath);
                //echo $localLastModified . "<br>";
                $bucketLastModified = strtotime($object['LastModified']);
                //echo $bucketLastModified . "<br>";
                $result[$i]['localLastModified'] = $localLastModified; 
                $result[$i]['bucketLastModified'] = $bucketLastModified; 
                if ($bucketLastModified <= $localLastModified) {
                    $message = "File already exists and is up to date: $key";
                    $result[$i]['message'] = $message;
                    continue;
                }
            } elseif (is_dir($localFilePath)) {
                //$message = "Folder already exists: $key\n" . "<br>";
                continue;
            } elseif ($object['Size'] == 0) {
                if (!is_dir($localFilePath)) {
                    mkdir($localFilePath, 0777, true);
                }

                echo "\nCreated folder: $key\n" . "<br>";
                continue;
            }

            if (!is_dir(dirname($localFilePath))) {
                mkdir(dirname($localFilePath), 0777, true);
            }

            $s3Client->getObject([
                'Bucket' => $bucketName,
                'Key' => $key,
                'SaveAs' => $localFilePath,
            ]);
            
       }
    } catch (AwsException $e) {
        echo $e->getMessage();
    }
}
    for($j=0;$j<count($result);$j++){
        echo '<tr><td scope="col">'.$localFilePath.'</td>
        <td scope="col">'.date('Y-m-d h:i:s',$localLastModified).'</td>
        <td scope="col">'.date('Y-m-d h:i:s',$bucketLastModified).'</td>
        <td scope="col">Downloaded: '.$key.'</td><tr>';
    }
?>



                    <tbody>
                </table>
            </div>
        </div>
    </div>
</div>