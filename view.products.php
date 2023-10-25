<!DOCTYPE html>
<html>
<head>
    <title>Список товарів</title>
</head>
<body>
    <h1>Список товарів</h1>
    <?php
    $host = "localhost";
    $username = "наш логін";
    $password = "ваш_пароль";
    $database = "ваша_база_даних";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Помилка підключення до бази даних: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Id</th><th>Назва</th><th>Країна виробника</th><th>Ціна</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Id"] . "</td><td>" . $row["Назва"] . "</td><td>" . $row["Країна виробника"] . "</td><td>" . $row["Ціна"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Список товарів порожній.";
    }

    $conn->close();
    ?>
</body>
</html>
