<?php
require('./includes/db_conn.php');  // Database connection
include './pages/delete_transaction.php';



$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses Tracker</title>

    <!--  Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</head>

<body>

    <?php
        if($delete){
        echo " 
            <div id='success-alert' class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Success!</strong>Your transaction has been deleted successfully.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    ?>

    <h1>Expenses Tracker</h1>


    <div class="root">
        <div id="items">
            <h2>Expenses</h2>
            <table class="table" id="myTable" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            $sql1 = "SELECT * FROM expenses";
            $result1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)) {
                    echo "<tr><td>".$row1["title"]."</td><td>".$row1["amount"]."</td><td>action</td><td><button class='delete btn btn-danger btn-sm' id=d" . $row1['id'] . ">x</button></td></tr>";
                }
            } else {
                echo "0 results";
            }
            ?>
                </tbody>
            </table>
        </div>
        <hr class="vertical" />
        <div id="new">
            <form action="./pages/add_expenses.php" method="post">
                <h2>Add new</h2>
                <div class="inputs">
                    <div class="inputitem">
                        <p style="width: 9rem">Entry type: </p>
                        <select class="form-control" id='itemType' name="category_id">
                            <?php
                                foreach($row as $value) {
                                    echo "<option value='{$value['id']}'>{$value['label']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="inputitem">
                        <p style="width: 9rem">Name:</p>
                        <input class="form-control" type="text" name="ename" id="name" value="" placeholder="name" />
                        
                    </div>
                    <div class="inputitem">
                        <p style="width: 9rem">Amount:</p>
                        <input class="form-control" value="0" min="0" id="amount" name="eamount" type="number" placeholder="amount" />
                    </div>
                    <div class="inputitem">
                        <p style="width: 9rem">Date:</p>
                        <input class="form-control" type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
                    </div>
                </div>
                <button class="btn btn-outline-primary btn-lg" type="submit">Add Expense</button>
            </form>
        </div>


    </div>

    <script src="../assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>