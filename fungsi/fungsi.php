<?php
function acak($panjang)
{
   $karakter = 'abcdefghijklmnopqrstuvwxyz-';
   $string = '';
   for($i = 0; $i < $panjang; $i++) {
   $pos = rand(0, strlen($karakter)-1);
   $string .= $karakter{$pos};
   }
   return $string;
}
function Uploadklien($fupload_name){
  //direktori gambar
  $vdir_upload = "img/klien/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["gambar"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
   //Set ukuran gambar hasil perubahan
  $dst_width3 = 300;
  $dst_height3 = ($dst_width3/$src_width)*$src_height;
  //proses perubahan ukuran
  $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
  imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);
  //Simpan gambar
  imagejpeg($im3,$vdir_upload . "300_" . $fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im3);
}
function Uploadkaryawan($fupload_name){
  //direktori gambar
  $vdir_upload = "img/karyawan/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["gambar"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
   //Set ukuran gambar hasil perubahan
  $dst_width3 = 300;
  $dst_height3 = ($dst_width3/$src_width)*$src_height;
  //proses perubahan ukuran
  $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
  imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);
  //Simpan gambar
  imagejpeg($im3,$vdir_upload . "300_" . $fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im3);
}
?>