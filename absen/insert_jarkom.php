<?php
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$kehadiran = $_POST['kehadiran'];


if (!empty($nim) || !empty($nama) || !empty($kehadiran)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "kelasl3";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        header("Location: absen_gagal.html");
        die();
    } else {
        $SELECT = "select nim from absen_jarkom where nim = ? Limit 1";
        $INSERT = "insert into absen_jarkom (nim, nama, kehadiran) values (?, ?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $stmt->bind_result($nim);
        $stmt->store_result();

            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sss", $nim, $nama, $kehadiran);
            $stmt->execute();
            // echo "Data absensi tercatat";

        $stmt->close();
        $conn->close();
        header("Location: absen_sukses.html");
        die();
    }
} else {
    header("Location: absen_gagal.html");
    die();
}
?>
