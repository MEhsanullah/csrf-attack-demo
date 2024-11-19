<?php
try {
    $db = new SQLite3('db.sqlite');

    // Create the `users` table
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY,
        name TEXT,
        balance INTEGER
    )");

    // Insert initial user data
    $db->exec("INSERT INTO users (name, balance) VALUES ('John Doe', 1000)");

    echo "<script>alert('Database setup complete! You can now proceed to the application.');</script>";
    echo "<script>window.location.href = 'welcome.php';</script>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
