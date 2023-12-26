<?php
require_once("include/header.php");
include_once('./include/session.php');

function parseLogEntry($logEntry) {
    // Assuming a common format: [timestamp] [log level] [error message]
    $pattern = '/\[(.*?)\] \[(.*?)\] (.*)/';
    preg_match($pattern, $logEntry, $matches);

    if (count($matches) === 4) {
        $timestamp = $matches[1];
        $logLevel = $matches[2];
        $errorMessage = $matches[3];

        return array('timestamp' => $timestamp, 'logLevel' => $logLevel, 'message' => $errorMessage);
    }

    return null; // Return null if the log entry doesn't match the expected format
}


?>
<div class="wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="fs-5"><em class="bi bi-bell"></em>
                <?php echo "Error Manager"; ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="">
                    <div class="row">
                        <div class="col-9">
                            <input class="form-field form-control" type="text" name="log_path"
                                placeholder="Enter Log Path Here" required value="/var/log/nginx/error.log">
                        </div>
                        <div class="col-3">
                            <input type="submit" class="btn btn-primary" name="submit" value="Get Details">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $path = $_POST["log_path"];

            $error_log_content = file_get_contents($path);

            
            // Split the log file into individual log entries (assuming each entry is on a new line)
            $log_entries = explode("\n", $error_log_content);

            $log_entries = array_reverse($log_entries);
            ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                     echo '<div class="table-responsive">';
                                     echo '<table id="query" class="table align-middle table-hover sortable">';
                                     echo '<thead>';
                                     echo '<tr>';
                                         echo '<th>Timestamp</th>';
                                         echo '<th>Log Level</th>';
                                         echo '<th>Error Message</th>';
                                     echo '</tr>';
                                     echo '</thead>';
                         
                                     echo '<tbody>';
                                     // Process each log entry
                                     foreach ($log_entries as $log_entry) {
                                         // Skip empty lines
                                         if (empty($log_entry)) {
                                             continue;
                                         }
                         
                                         // Parse the log entry
                                         $parsed_entry = parseLogEntry($log_entry);
                         
                                         if ($parsed_entry) {
                                             // Extract the timestamp, log level, and error message
                                             $timestamp = $parsed_entry['timestamp'];
                                             $logLevel = $parsed_entry['logLevel'];
                                             $errorMessage = $parsed_entry['message'];
                         
                                             echo '<tr>';
                                             echo '<td>'.xss_safe($timestamp).'</td>';
                                             echo '<td>'.xss_safe($logLevel).'</td>';
                                             echo '<td>'.xss_safe($errorMessage).'</td>';
                                             echo '</tr>';
                                         } else {
                                             echo "Error: Unable to parse log entry - $log_entry\n";
                                         }
                                     }
                                     echo '</tbody>';
                                     echo '</table>';
                                     echo '</div>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
        ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        if ($('#query')) {
            $('#query').DataTable();
        }
    });
</script>