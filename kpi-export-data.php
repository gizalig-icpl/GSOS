<?php
require_once("./include/header.php");
include_once('./include/session.php');
include_once('./domain/kpi-export-db.php');

$final_result = json_decode(getSpecificData());
$page=isset($_GET['pages'])?purifier($_GET['pages']):"";
$entries=isset($_GET['entries'])?purifier($_GET['entries']):"";
$items=isset($_GET['items'])?purifier($_GET['items']):"";

?>
<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <!--new breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3"><em class="bi bi-speedometer2"></em><?php echo " ";
                                                                                        echo _Dashboard; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bx bx-home-alt"></i>
                                </li> -->
                                <li class="breadcrumb-item active" aria-current="page"><?php echo _Export; ?>

                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Settings</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
                                <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                            </div>
                        </div>
                    </div> -->

                <!--end new bread crumb-->
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">GSOS</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo _Dashboard; ?></a></li>
                                    <li class="breadcrumb-item active"><?php echo _Export; ?></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?php echo _KPI;
                                                    echo "-";
                                                    echo _Export; ?></h4>
                        </div>
                    </div>
                </div> -->
                <div class="main-title card p-2">
                    <h2 class="mb-0 text-success"><?php echo _KPI;
                                                echo "-";
                                                echo _Export;?></h2>
                </div>
                <!-- <div class="card">
                    <div class="card-body">
                        <table class="table mb-0 table-striped" id="war-game-sim-list">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo _KPI_ID; ?></th>
                                    <th scope="col"><?php echo _Objective; ?></th>
                                    <th scope="col"><?php echo _Sub_Objective; ?></th>
                                    <th scope="col"><?php echo _KPI; ?></th>
                                    <th scope="col"><?php echo _Activity; ?></th>
                                    <th scope="col"><?php echo _Remarks; ?></th>
                                    <th scope="col"><?php echo _Month; ?></th>
                                    <th scope="col"><?php echo _Year; ?></th>
                                    <th scope="col"><?php echo _Representation; ?></th>
                                </tr>
                            </thead>
                            <tbody> -->

                <?php
                // FPDF configuration
                // $pdf = new FPDF();
                // $pdf->AddPage();
                // $pdf->SetFont('Arial', 'B', 16);

                // Loop through your data and add it to the PDF
                // foreach ($final_result as $row) {
                    // Loop through the columns
                    // foreach ($row as $column) {
                        // Write the column data to the PDF
                    //     $pdf->Cell(40, 10, $column, 1);
                    // }

                    // Add a new line after the row
                //     $pdf->Ln();
                // }

                // Output the PDF to the browser or save to a file
                // $pdf->Output();


                $found = 1;
                // Define the number of results to display per page
                $records_per_page = 10;
                $total_records = count($final_result);
                // Get the current page number
                if (isset($page) && is_numeric($page)) {
                    $current_page = (int) $page;
                } else {
                    $current_page = 1;
                }

                // Calculate the total number of pages
                $total_pages = ceil($total_records / $records_per_page);

                // Determine the range of page links to show
                $range = 3;
                // Get the selected number of entries to display
                if (isset($entries) && $entries!='') {
                    $records_per_page = $entries;
                } 
                
                
                // Calculate the starting and ending results for the current page
                $start_index = (int)($current_page - 1) * (int)$records_per_page;
                $end_index = $start_index + (int)$records_per_page - 1;
                
                // If the end index is greater than the total number of results, adjust it
                if ($end_index >= count($final_result)) {
                    $end_index = count($final_result) - 1;
                }

                echo " <div class='card'>";
                echo "<div class='card-body'>";
                echo "<div class='d-flex justify-content-between'>";
                // Display "Show X entries" dropdown menu
                // $show_items = [10, 25, 50, 100];
                $current_items = isset($items) ? (int) $items : $records_per_page;
                // echo "<div>";
                // echo "<span>Show</span>";
                // echo "<select onchange=\"location = this.value;\">";
                // foreach ($show_items as $item) {
                //     $selected = ($item == $current_items) ? "selected" : "";
                //     $url = "?" . http_build_query(array_merge($_GET, ['items' => $item, 'page' => 1]));
                //     echo "<option value='$url' $selected>$item</option>";
                // }
                // echo "</select>";
                // echo "<span>entries</span>";
                // echo "</div>";

                echo "<form method='GET' action='kpi-export-data.php?entries=".$entries."' class='d-flex align-items-center'>";
                echo "<label for='entries'>Show Entries:</label>";
                echo "<select id='entries' name='entries'>";
                echo "<option value='10'" . ($records_per_page == 10 ? " selected" : "") . ">10</option>";
                echo "<option value='25'" . ($records_per_page == 25 ? " selected" : "") . ">25</option>";
                echo "<option value='50'" . ($records_per_page == 50 ? " selected" : "") . ">50</option>";
                echo "<option value='100'" . ($records_per_page == 100 ? " selected" : "") . ">100</option>";
                echo "</select>";
                echo "</form>";

                ?>
                <?php if ($found == 1)  ?>
                <div class="table-export-container ms-auto">
                    <form action="kpi-excel-import.php" method="POST">
                        <input hidden type="text" name="data" value="<?php echo htmlentities(json_encode($final_result)) ?>">

                        <button type="submit" name="export_type" value="excel" class="btn btn-secondary btn submit-btn me-2"><?php 
                                                                                                                                // echo _Export;
                                                                                                                                // echo " ";
                                                                                                                                // echo _as;
                                                                                                                                echo " ";
                                                                                                                                echo _Excel; ?></button>

                         <!-- <button type="submit" name="export_type" value="pdf" class="btn btn-secondary btn submit-btn me-2">  -->

                                                                                                                            <!-- // echo _Export;
                                                                                                                            // echo " ";
                                                                                                                            // echo _as;
                                                                                                                            // echo " ";
                                                                                                                            //echo "PDF"; ?> -->
                                                                                                                        <!-- </button> -->

                        <!-- Print button for data-table -->
                        <button type="button" class="btn btn-secondary btn submit-btn me-2" onclick="printTable()"><?php echo BTN_PRINT; ?></button>

                        <!-- Copy button for data-table -->
                      
                        <button type="button" class="btn btn-secondary btn submit-btn me-2" id="copyBtn" onclick="copyTable()"><?php echo BTN_COPY; ?></button>
                    </form>
                </div>
                <?php
                if (isset($_POST['export_type'])) {
                    $export_type = $_POST['export_type'];
                
                    switch ($export_type) {
                        case 'excel':
                            // Export as Excel
                            $data = json_decode($_POST['data'], true);
                            // Use a library like PHPExcel to generate an Excel file from $data
                            // Output the Excel file to the user's browser with appropriate headers
                            header('Content-Type: application/vnd.ms-excel');
                            header('Content-Disposition: attachment; filename="export.xls"');
                            // Output the Excel data here
                            exit();
                
                        case 'pdf':
                            // Export as PDF
                            $data = json_decode($_POST['data'], true);
                            // Use a library like FPDF or mPDF to generate a PDF from $data
                            // Output the PDF to the user's browser with appropriate headers
                            header('Content-Type: application/pdf');
                            header('Content-Disposition: attachment; filename="export.pdf"');
                            // Output the PDF data here
                            exit();
                
                        // Other cases for different export types
                    }
                }
                // Display the table with the paginated results
                echo "</div>";
                echo "<hr>";
                echo "<table id='myTable' class='table mb-0 table-striped'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th scope='col'>KPI ID</th>";
                echo "<th scope='col'>Objective</th>";
                echo "<th scope='col'>Sub-Objective</th>";
                echo "<th scope='col'>KPI</th>";
                echo "<th scope='col'>Activity</th>";
                echo "<th scope='col'>Remarks</th>";
                echo "<th scope='col'>Month</th>";
                echo "<th scope='col'>Year</th>";
                echo "<th scope='col'>Representation</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                for ($i = $start_index; $i <= $end_index; $i++) {
                    $arr = (array) $final_result[$i];
                    echo "<tr>";
                    echo "<th scope='row'>" . ((!empty($arr['kpi_id'])) ? $arr['kpi_id'] : ($i + 1)) . "</th>";
                    echo "<td>" . $arr['objective'] . "</td>";
                    echo "<td>" . $arr['sub_objective'] . "</td>";
                    echo "<td>" . $arr['kpi'] . "</td>";
                    echo "<td>" . $arr['activity'] . "</td>";
                    echo "<td>" . $arr['remarks'] . "</td>";
                    echo "<td>" . $arr['month'] . "</td>";
                    echo "<td>" . $arr['year'] . "</td>";
                    echo "<td>" . $arr['representation'] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "<br>";
                // Display the pagination links
                // $num_pages = ceil($total_records / $records_per_page);
                // echo "<nav aria-label='Page navigation'>";
                // echo "<ul class='pagination'>";
                // for ($i = 1; $i <= $num_pages; $i++) {
                //     $class = $i == $current_page ? 'active' : '';
                //     $url = '?page=' . $i;
                //     echo "<li class='page-item $class'><a class='page-link float-end' href='$url'>$i</a></li>";
                // }
                // echo "</ul>";
                // echo "</nav>";
                ?>

                </tbody>
                </table>
            </div>
        </div>
        <?php
            echo "<div class='' style='margin-left:5px'>";
            // Display the previous button
            echo "<nav aria-label='Page navigation'>";
            echo "<ul class='pagination'>";
            if ($current_page > 1) {
                $prev_page = $current_page - 1;
                echo "<a class='page-link float-end pagination-link' href='?page=kpi-export-data&pages=$prev_page&items=$current_items'>Prev</a>";
            }

            // Loop through the page links to display
            for ($i = max(1, $current_page - $range); $i <= min($current_page + $range, $total_pages); $i++) {
                $active_class = ($current_page == $i) ? "active" : "";
                $url = "?" . http_build_query(array_merge($_GET, ['pages' => $i]));
                echo "<a class='page-link float-end pagination-link $active_class' href='$url'>$i</a>";
            }

            // Display the next button
            if ($current_page < $total_pages) {
                $next_page = $current_page + 1;
                echo "<a class='page-link float-end pagination-link' href='?page=kpi-export-data&pages=$next_page&items=$current_items'>Next</a>";
            }
            echo "</ul>";
            echo "</nav>";
            echo "</div>";
        ?>
    </div>
</div>


<?php
$found = 1;




// if (count($final_result)>0) {
//     for($i=0;$i<count($final_result);$i++){
//         $arr = (array) $final_result[$i];
//         echo "<tr>";
//             echo "<th scope='row'>".((!empty($arr['kpi_id']))?$arr['kpi_id']:($i+1))."</th>";
//             echo "<td>".$arr['objective']."</td>";
//             echo "<td>".$arr['sub_objective']."</td>";
//             echo "<td>".$arr['kpi']."</td>";
//             echo "<td>".$arr['activity']."</td>";
//             echo "<td>".$arr['remarks']."</td>";
//             echo "<td>".$arr['month']."</td>";
//             echo "<td>".$arr['year']."</td>";
//             echo "<td>".$arr['representation']."</td>";

//         echo "</tr>";
//     }
// } else {
//     echo "";
//     $found = 0;
// }


?>
<!-- </table> -->
<br>

<!-- <div style="text-align:right" class="">
            <?php if ($found == 1) { ?>
                 <form action="kpi-excel-import.php" method="POST">
                    <input hidden type="text" name="data" value="<?php echo htmlentities(json_encode($final_result)) ?>" />


                    <button type="submit" class="btn bg-primary btn submit-btn me-2"><?php echo _Export;
                                                                                        echo " ";
                                                                                        echo _as;
                                                                                        echo " ";
                                                                                        echo _Excel; ?></button>

                </form> -->
<!-- <a href="kpi-dashboard.php"><button type="submit" class="btn bg-primary btn submit-btn" style="color:black"><?php echo _Back; ?></button></a> -->

<?php } else { ?>
    <div style='text-align:center;color:#fff;'><br><br><br>No Data Founded<h4></h4><br><br><br><button type="button" class="submit-btn btn btn-sm bg-primary"><a style="color:#fff" href="./kpi-dashboard.php">Back</a></button></div>
<?php } ?>
</div>



</div>
</div>
</div>
</div>

<?php
// include "include/footer.php";
?>

<script>
    // Function to print the data-table
    function printTable() {
        var table = document.getElementById("myTable");
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">' + table.outerHTML + '</body></html>');
        newWin.document.close();
        setTimeout(function() {
            newWin.close();
        }, 10);
    }

    // Function to copy the data-table to clipboard
    function copyTable() {
        var range = document.createRange();
        range.selectNode(document.getElementById("myTable"));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand("copy");
        window.getSelection().removeAllRanges();
         // Change the title to "Copied"
        var copyButton = document.querySelector('.submit-btn');
        copyButton.setAttribute('data-original-title', 'Copied');
        $(copyButton).tooltip('show');
    }
</script>
<script>
const copyBtn = document.getElementById('copyBtn');

// Add a click event listener to the button
copyBtn.addEventListener('click', function() {
    // Select the table
    const table = document.getElementById('myTable');

    // Copy the table to the clipboard
    navigator.clipboard.writeText(table.outerHTML);

    // Show the tooltip
    const tooltip = document.getElementById('copyTooltip');
    tooltip.classList.add('show');

    // Hide the tooltip after 2 seconds
    setTimeout(function() {
        tooltip.classList.remove('show');
    }, 2000);
});

let sel = document.querySelector('select#entries');
sel.addEventListener('change', function() {
    // Get the currently selected option
    let selectedOption = sel.querySelector('option[selected]');
    
    // Remove the "selected" attribute from the previously selected option
    if (selectedOption) {
        selectedOption.removeAttribute('selected');
    }

    // Add the "selected" attribute to the newly selected option
    let newlySelectedOption = sel.options[sel.selectedIndex];
    newlySelectedOption.setAttribute('selected', '');
    let form = sel.closest('form');
    form.submit();
});

</script>






