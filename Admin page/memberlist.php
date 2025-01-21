<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user'] ['role'] !== 'admin') {
  header('Location: login.php');
    exit(); 
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once('../function/db.php');
    require_once('ahead.php');

    $query = "SELECT * FROM users;";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0): // Check if there are results
    ?>
        <div class="container">
            <h4>User List</h4>
            
            <table class="table table-secondary table-bordered border-success mt-5">
                <thead class="table-secondary table-bordered border-success ">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <?php
                $counter = 1;
                // Fetch each row as an associative array and display it
                while ($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td class="table-secondary table-bordered border-success"><?= $counter++ ?></td>
                        <td class="table-secondary table-bordered border-success">
                            <?= htmlspecialchars($row["name"]) ?>
                        </td>
                        <td class="table-secondary table-bordered border-success"><?= htmlspecialchars($row["email"]) ?></td>
                        <td class="table-secondary table-bordered border-success"><?=  htmlspecialchars($row["role"])  ?></td>
                        
                    </tr>
                <?php
                endwhile;
                ?>
            </table>
        </div>
    <?php
    else:
        echo "<p>No users found.</p>";
    endif;
    ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>