<h2>FORM ISIAN DATA BARU</h2>
<form>
    nama: <input type="text" name="nm">
    <input type="submit" name="sub" value="Simpan Data Baru">
    <input type="submit" name="sub" value="Kembali ke Tampil Data">
    <?php
        if(isset($_GET['sub'])){//untuk mengecek sudak ditekan atau belum tombolnya 
            //kalo belum tekan kembali ke tampil data
            if ($_GET['sub']=="Kembali ke Tampil Data"){
                header("location:01_tampildata.php");
            }
            else{
                if(strlen($_GET['nm'])){ //untuk mengecek data nama kosong atau tidak
                    include "koneksi.php";
                    mysqli_query($kon,"INSERT INTO `mahasiwa` (`id`, `nama`) 
                                      VALUES (NULL, '".$_GET['nm']."')");
                    echo "<br>Data <b>".$_GET['nm']."</b> Telah Disimpan ke Database";
                }
                else 
                echo "<br>Data nama tidak boleh kosong";
            
            }
        }
    ?>
</form>