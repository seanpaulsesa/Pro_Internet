<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username=input($_POST["username"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $email=input($_POST["email"]);
        $no_hp=input($_POST["no_hp"]);
        $program_studi=input($_POST["program_studi"]);

        //Query input menginput data kedalam tabel anggota
        $sql = "INSERT INTO anggota (username,nama,alamat,email,no_hp,program_studi) values
		('$username','$nama','$alamat','$email','$no_hp','$program_studi')";

        //Mengeksekusi/menjalankan query diatas

// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $id_anggota = isset($_POST['id_anggota']) ? $_POST['id_anggota'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $no_hp = isset($_POST['no_hp']) ? $_POST['alamat'] : '';
    $program_studi = isset($_POST['program_studi']) ? $_POST['program_studi'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('SELECT * FROM anggota WHERE id = ?');
    $stmt->execute([$id, $nama, $email, $notelp, $pekerjaan]);
    // Output message
    $msg = 'Created Successfully!';
}
        $hasil = mysqli_query($koneksi, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>
         </div>
        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <input type="text" name="jk" class="form-control" placeholder="Masukan Jenis Kelamin" required/>


        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>

        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Masukan Email" required/>
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>

         <div class="form-group">
            <label>Program Studi:</label>
            <input type="text" name="program_studi" class="form-control" placeholder="Masukan nama program Studi" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-info">Submit</button>
    </form>
</div>
</body>
</html>