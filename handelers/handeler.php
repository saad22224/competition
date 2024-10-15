<?php
session_start(); // تأكد من بدء الجلسة
require("./db.php");
require("./functions.php");
$error = [
    "firsterror" => "",
    "lasterror" => "",
    "emailerror" => "",
];
 $data = [
    "first" => "",
    "last" => "",
    "email" => "",
 ];
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
    foreach ($_POST as $key => $value) {
        $$key = trim(htmlentities(htmlspecialchars($value)));
        $data["first"] = $first;
        $data["last"] = $second;
        $data["email"] = $email;
        $_SESSION["data"] = $data;
    }

    // التحقق من المدخلات
    if (emptyInput($first)) {
        $error["firsterror"] = "الرجاء كتابة اسمك الأول";
    }
    if (emptyInput($second)) {
        $error["lasterror"] = "الرجاء كتابة اسمك الأخير";
    }
    $sql2 = "SELECT * from users where email = '$email' ";
    $result =  mysqli_query($conn , $sql2);
    if (emptyInput($email)) {
        $error["emailerror"] = "الرجاء كتابة عنوان بريدك الإلكتروني";
    } elseif (!validateEmail($email)) {
        $error["emailerror"] = "الرجاء كتابة بريد إلكتروني صحيح";
    }elseif(mysqli_num_rows($result) > 0) {
        $error["emailerror"] = "  عنوان البريد الكتروني هذا موجود مسبقا";
    }

    // تحقق من عدم وجود أخطاء
    if (empty(array_filter($error))) {
        $$key = mysqli_real_escape_string($conn,$$key);
        $sql = "INSERT INTO users (fname, lname, email) VALUES ('$first', '$second', '$email')";
        if (mysqli_query($conn, $sql)) {
           $_SESSION['succ'] =   "done";
            redirect("../index.php");
        } else {
            echo "خطأ: " . mysqli_error($conn);
        }
    } else {
        $_SESSION["error"] = $error;
        redirect("../index.php");
    }
}
?>
