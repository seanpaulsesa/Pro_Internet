<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <br>
    <h4>CRUD Sederhana dengan PHP dan Bootstrap | Pace Koding</h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_anggota'])) {
        $id_anggota=htmlspecialchars($_GET["id_anggota"]);

        $sql="delete from anggota where id_anggota='$id_anggota' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No HP</th>
             <th>Jenis Kelamin</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        if (isset($_GET['edit']))
         {
            $id = $_GET['edit'];
            $query = "SELECT * FROM anggota WHERE id='$id'";
            $sql = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_array($sql);
            $no = $data['no'];
            $nama = $data['nama'];
            $alamat = $data['alamat'];
            $email = $data['email'];
            $no_hp = $data['no_hp'];
            $program_studi = $data['program_studi'];

        ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["email"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><?php echo $data["program_studi"]; ?></td>
                
                <td>
                    <a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-warning" role="button">Edit</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger" role="button">Hapus</a>
                    <a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-info" role="button">Detail</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>

</body>
</html>