<?php
class bmiPasien {
    public $tanggalperiksa;
    public $kodepasien;
    public $nama;
    public $berat;
    public $tinggi;
    public $umur;
    public $jenis_kelamin;
    public $BMIres;
    public $BMIstatus = '';

    function __construct($tanggalperiksa, $kodepasien, $nama, $jenis_kelamin, $umur, $berat, $tinggi)
    {
        $this->tanggalperiksa = $tanggalperiksa;
        $this->kodepasien = $kodepasien;
        $this->nama = $nama;
        $this->berat = $berat;
        $this->tinggi = $tinggi;
        $this->umur = $umur;
        $this->jenis_kelamin = $jenis_kelamin;
    }

    public function hasilBMI() {
        $this->tinggi = $this->tinggi / 100;
        $this->BMIres = $this->berat / ($this->tinggi * $this->tinggi);
        return $this->BMIres;
    }

    public function statusBMI() {
        if($this->BMIres < 18.5) {
            return $this->BMIstatus = 'Kekurangan Berat Badan';
        } else if ($this->BMIres >= 18.5 && $this->BMIres <= 24.9) {
            return $this->BMIstatus = 'Berat Badan Ideal';
        } else if ($this->BMIres >= 25.0 && $this->BMIres <= 29.9) {
            return $this->BMIstatus = 'Kelebihan Berat Badan';
        } else {
            return $this->BMIstatus = 'Kegemukan (Obesitas)';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<?php 
        if(isset($_POST['proses'])) {
            $tanggalperiksa = $_POST['tanggalperiksa'];
            $kodepasien = $_POST['kodepasien'];
            $nama = $_POST['nama_lengkap'];
            $berat = $_POST['berat'];
            $tinggi = $_POST['tinggi'];
            $umur = $_POST['umur'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $pasien1 = new bmiPasien("2022-04-14", "001", "Reza Kun", "Laki-laki", "20", "52", "160");
            $pasien2 = new bmiPasien("2022-04-15", "002", "Melia", "Perempuan", "19", "48", "175");
            $pasien3 = new bmiPasien("2022-04-16", "003", "Levi", "Laki-Laki", "24", "66", "178");
            $pasien4 = new bmiPasien($tanggalperiksa, $kodepasien, $nama, $jenis_kelamin, $umur, $berat, $tinggi);
            
            
            $ar_pasien = [$pasien1, $pasien2, $pasien3, $pasien4];
        }
            ?>
            

<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Tanggal periksa</th>
      <th scope="col">Kode Pasien</th>
      <th scope="col">Nama Pasien</th>
      <th scope="col">Gender</th>
      <th scope="col">Umur</th>
      <th scope="col">Berat (kg)</th>
      <th scope="col">Tinggi (cm)</th>
      <th scope="col">Nilai BMI</th>
      <th scope="col">Status BMI</th>
    </tr>
  </thead>
  <tbody>
    <?php
            $nomor=1;
            foreach($ar_pasien as $pas){
        ?>
            <tr>
                <td><?=$nomor?></td>
                <td><?=$pas->tanggalperiksa?></td>
                <td><?=$pas->kodepasien?></td>
                <td><?=$pas->nama?></td>
                <td><?=$pas->jenis_kelamin?></td>
                <td><?=$pas->umur?></td>
                <td><?=$pas->berat?></td>
                <td><?=$pas->tinggi?></td>
                <td><?=$pas->hasilBMI()?></td>
                <td><?=$pas->statusBMI()?></td>
                
            </tr>

            <?php
            $nomor++;
            }
                ?>
    
    
  </tbody>
</table>

</body>
</html>