<?php
include("db.php");

$name = $_POST["name"];
$phone = $_POST["phone"];
$get_id = $_GET["id"];


// POST
if (isset($_POST["add"])) {
    $sql = ("INSERT INTO student (name, phone) VALUES (?, ?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $phone]);
    
    if ($query) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}


// DET
$sql=$pdo->prepare("SELECT * FROM student");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);


// PUT
if (isset($_POST['edit'])) {
    $sql=("UPDATE student SET name=?, phone=? WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $phone, $get_id]);

    if ($query) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

// DELETE
if (isset($_POST["delete"])) {
    $sql=("DELETE FROM student WHERE id = ?");
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);

    if ($query) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}
?>