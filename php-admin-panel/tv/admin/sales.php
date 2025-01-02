<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .ab{
            margin-left: 300px;
        }
    </style>
</head>
<body>
    <div class="ab">
        <h1>Admin Panel - Sales Analysis</h1>

        <!-- Add input fields for date range selection -->
        <form method="POST">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date">
            <button type="submit" name="submit">Submit</button>
        </form>

        <?php
        // Database connection
        $mysqli = new mysqli("localhost", "root", "", "MeTv");

        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Check if the user submitted the form
        if (isset($_POST['submit'])) {
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            // Fetch sales data for the specified date range
            $salesData = getSalesDataForDateRange($mysqli, $start_date, $end_date);
        } else {
            // Default to current month if no date range is specified
            $salesData = getCurrentMonthSalesData($mysqli);
        }
        ?>

        <!-- Sales Chart -->
        <h3>Sales Analysis</h3>
        <canvas id="salesChart" width="400" height="200"></canvas>

        <script>
            // PHP data for sales analysis
            const salesData = <?php echo json_encode($salesData); ?>;

            // Create sales analysis chart
            const salesChart = new Chart(document.getElementById('salesChart'), {
                type: 'bar',
                data: {
                    labels: salesData.labels,
                    datasets: [{
                        label: 'Sales Amount',
                        data: salesData.values,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <?php
        // Close database connection
        $mysqli->close();

        // Function to fetch sales data for the current month
        function getCurrentMonthSalesData($mysqli) {
            // Calculate the first day of the current month
            $firstDayCurrentMonth = date('Y-m-01');

            // Calculate the last day of the current month
            $lastDayCurrentMonth = date('Y-m-t');

            // Implement your query to fetch sales data for the current month
            $query = "SELECT Item_Name, SUM(Price * Quantity) AS sales_amount FROM user_orders WHERE ordered_on BETWEEN '$firstDayCurrentMonth' AND '$lastDayCurrentMonth' GROUP BY Item_Name";

            $result = $mysqli->query($query);

            $labels = [];
            $values = [];

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $labels[] = $row['Item_Name'];
                    $values[] = $row['sales_amount'];
                }
            }

            return [
                'labels' => $labels,
                'values' => $values
            ];
        }

        // Function to fetch sales data for the specified date range
        function getSalesDataForDateRange($mysqli, $start_date, $end_date) {
            // Implement your query to fetch sales data for the specified date range
            $query = "SELECT Item_Name, SUM(Price * Quantity) AS sales_amount FROM user_orders WHERE ordered_on BETWEEN '$start_date' AND '$end_date' GROUP BY Item_Name";

            $result = $mysqli->query($query);

            $labels = [];
            $values = [];

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $labels[] = $row['Item_Name'];
                    $values[] = $row['sales_amount'];
                }
            }

            return [
                'labels' => $labels,
                'values' => $values
            ];
        }
        ?>
    </div>
    
    <?php
    include('includes/footer.php');
    ?>
</body>
</html>
