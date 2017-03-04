<?php



include"koneksi.php";


$query = "SELECT * FROM inbox WHERE Processed = 'false'";

$hasil = mysql_query($query);

while($data= mysql_fetch_array($hasil)){

    $id = $data['ID'];

    $noPengirim = $data['SenderNumber'];

    $msg = strtoupper($data['TextDecoded']);

    $pecah = explode("#",$msg);

    $id_klien=$pecah[1];

    $masalah=$pecah[2];

    if($pecah[0]=="REG")

    {

        if($pecah[1] !="" and $pecah[2] !="")

        {

            $tgl= date("Y-m-d");

            //$tgl=date("d M Y");

            //$newDate = date("Y-m-d", strtotime($d_tgl));
            $a=mysql_num_rows(mysql_query("SELECT * FROM masalah WHERE id_klien='$id_klien' AND keterangan='Belum Terselesaikan' OR keterangan='Tertunda'"));
            if ($a>0){
                mysql_query("INSERT INTO outbox (DestinationNumber,

            TextDecoded) VALUES ('".$noPengirim."', 'Anda masih mempunyai masalah yang belum terselesaikan')");
            }else{
            mysql_query("INSERT INTO masalah(id_klien,tanggal,permasalahan,keterangan)VALUES('$id_klien','$tgl','$masalah','Belum Terselesaikan')");
            $ada=mysql_fetch_array(mysql_query("SELECT karyawan.telp as hp,klien.nama as nama, klien.telp as telp, klien.alamat as alamat FROM klien,kecamatan,karyawan WHERE klien.id_kecamatan=kecamatan.id_kecamatan AND karyawan.id_kecamatan=kecamatan.id_kecamatan AND klien.id_klien='$id_klien'"));
            $telp=$ada['telp'];
            $nama=$ada['nama'];
            $hp=$ada['hp'];
            $alamat=$ada['alamat'];
            $isinyo="CV.RLN, Nama".$nama." Alamat ".$alamat." No HP ".$telp." Masalah ".$masalah;

            $query=mysql_query("INSERT INTO outbox (DestinationNumber,

            TextDecoded) VALUES ('".$noPengirim."', '".$isinyo."')");      


}
        }else{

            $query=mysql_query("INSERT INTO outbox (DestinationNumber,

            TextDecoded, CreatorID) VALUES ('".$noPengirim."', 'Gagal Registrasi. Format : REG#KodePelanggan#Masalah')");

        }

    }else{

            $query=mysql_query("INSERT INTO outbox (DestinationNumber,

            TextDecoded) VALUES ('".$noPengirim."', 'Gagal Registrasi. Format : REG#KodePelanggan#Masalah')");

    }

    $query3 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";

        mysql_query($query3);

}

?> 