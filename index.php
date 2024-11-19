<?php
session_start();

$db = new SQLite3('db.sqlite');

$tableCheck = $db->querySingle("SELECT name FROM sqlite_master WHERE type='table' AND name='users'");
if (!$tableCheck) {
    die("<script>alert('Error: Database not initialized! Please run the setup first.'); window.location.href = 'welcome.php';</script>");
}

$user = $db->querySingle("SELECT * FROM users WHERE id = 1", true);
if (!$user) {
    $user = ['name' => 'Guest', 'balance' => 0];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = intval($_POST['amount']);
    if ($amount > 0 && $amount <= $user['balance']) {
        $db->exec("UPDATE users SET balance = balance - $amount WHERE id = 1");
        $message = "<span class='success'>Successfully withdrew $$amount!</span>";
        $user = $db->querySingle("SELECT * FROM users WHERE id = 1", true);
    } elseif ($amount > $user['balance']) {
        $message = "<span class='alert'>Error: Insufficient balance!</span>";
    } else {
        $message = "<span class='alert'>Error: Invalid amount!</span>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSRF Demo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
        <p>Your balance: $<?php echo htmlspecialchars($user['balance']); ?></p>
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="number" id="amount" name="amount" placeholder="Enter amount" required>
            <button type="submit">Withdraw</button>
        </form>
    </div>
</body>
</html>
