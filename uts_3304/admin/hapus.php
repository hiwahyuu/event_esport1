    <?php
    include "../core/config.php";

    if (!isset($_SESSION['admin'])) {
        header("Location: admin_login.php");
        exit;
    }

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // amanin input
        $stmt = $conn->prepare("DELETE FROM peserta WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: admin_dashboard.php");
    exit;
    ?>
