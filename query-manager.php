<?php
require_once("include/header.php");
include_once('./include/session.php');
?>
<div class="wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="fs-5"><em class="bi bi-bell"></em>
                <?php echo "Query Manager"; ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="">
                    <div class="row">
                        <div class="col-9">
                            <input class="form-field form-control" type="text" name="query"
                                placeholder="Enter your SQL query" required>
                        </div>
                        <div class="col-3">
                            <input type="submit" class="btn btn-primary" name="submit" value="Execute SQL" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        global $dbh;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $query = $_POST["query"];

            $isDeleteQuery = strpos(strtoupper($query), 'DELETE') !== false;
            ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <?php 
                                    if ($isDeleteQuery) {
                                        echo "DELETE queries are not allowed.";
                                    } else {
                                        try {
                                            $stmt = $dbh->prepare($query);
                                            $stmt->execute();
                        
                                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                                            if ($result) {
                                                echo '<div class="table-responsive">';
                                                echo '<table id="query" class="table align-middle table-hover sortable"><thead><tr>';
                                                foreach ($result[0] as $column => $value) {
                                                    echo "<th>".xss_safe($column)."</th>";
                                                }
                                                echo "</tr></thead><tbody>";
                                                foreach ($result as $row) {
                                                    echo "<tr>";
                                                    foreach ($row as $value) {
                                                        echo "<td>".xss_safe($value)."</td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                                echo "</tbody></table>";
                                                echo "</div>";
                                            } else {
                                                echo "No results found.";
                                            }
                                        } catch (PDOException $e) {
                                            die("Query failed: " . $e->getMessage());
                                        }
                                    }
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