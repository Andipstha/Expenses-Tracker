<?php
require('./includes/db_conn.php');  // Database connection


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses Tracker</title>
</head>
<body>

    <h1>Expenses Tracker</h1>
    <form action="add_expense.php" method="post">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" required>
        <label for="item">Item</label>
        <input type="text" name="item" id="item" required>
        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount" required>
        <button type="submit">Add Expense</button>
    </form>

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
            $sql = "SELECT * FROM expenses";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>".$row["title"]."</td><td>".$row["amount"]."</td><td>action</td><td>action</td></tr>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </tbody>
    </table>
    
</body>
</html>
