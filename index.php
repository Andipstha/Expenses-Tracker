<?php
require('./includes/db_conn.php');  // Database connection

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

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <h1>Expenses Tracker</h1>


    <div class="root">
        <div id="items">
            <h2>Expenses</h2>
            <table>
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
                    echo "<tr><td>".$row1["title"]."</td><td>".$row1["amount"]."</td><td>action</td><td>action</td></tr>";
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
                        <select id='itemType' name="category_id">
                            <?php
                                foreach($row as $value) {
                                    echo "<option value='{$value['id']}'>{$value['label']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="inputitem">
                        <p style="width: 9rem">Name:</p>
                        <input type="text" name="ename" id="name" value="" placeholder="name" />
                    </div>
                    <div class="inputitem">
                        <p style="width: 9rem">Amount:</p>
                        <input value="0" min="0" id="amount" name="eamount" type="number" placeholder="amount" />
                    </div>
                    <div class="inputitem">
                        <p style="width: 9rem">Date:</p>
                        <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
                    </div>
                </div>
                <button type="submit">Add Expense</button>
            </form>
        </div>


    </div>


</body>

</html>