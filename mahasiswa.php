<?php
class Mahasiswa {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function tambahMahasiswa($nim, $nama, $prodi) {
        $sql = "INSERT INTO tb_mahasiswa (nim, nama, prodi) VALUES ('$nim', '$nama', '$prodi')";
        if ($this->koneksi->query($sql) === TRUE) {
            echo "Mahasiswa berhasil ditambahkan <br/>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->koneksi->error;
        }
    }

    public function tampilkanSemuaMahasiswa() {
        $sql = "SELECT * FROM tb_mahasiswa";
        $result = $this->koneksi->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "NIM = " . $row["nim"] . " - NAMA = " . $row["nama"] . " - PRODI = " . $row["prodi"] . "<br/>";
            }
        } else {
            echo "Tidak ada data mahasiswa";
        }
    }

    public function cariMahasiswaByNim($vcari) {
        $sql = "SELECT * FROM tb_mahasiswa WHERE nim = '$vcari'";
        $result = $this->koneksi->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Ditemukan mahasiswa dengan kriteria: NIM = " . $row["nim"] . " - NAMA = " . $row["nama"] . " - PRODI = " . $row["prodi"] . "<br/>";
            }
        } else {
            echo "Tidak ada data mahasiswa dengan kriteria nim tersebut" . "<br/>";
        }
    }

    public function cariMahasiswaByKeyword($vcari) {
        $sql = "SELECT * FROM tb_mahasiswa WHERE nim LIKE '%$vcari%' OR nama LIKE '%$vcari%' OR prodi LIKE '%$vcari%'";
        $result = $this->koneksi->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Ditemukan mahasiswa dengan kriteria keywoard yaitu NIM = " . $row["nim"] . " - NAMA = " . $row["nama"] . " - PRODI = " . $row["prodi"] . "<br/>";
            }
        } else {
            echo "Tidak ada data mahasiswa dengan kriteria mendekati nim tersebut" . "<br/>";
        }
    }

    public function updateMahasiswa($vcari, $vnama, $vprodi) {
        $sql = "UPDATE tb_mahasiswa SET nama='$vnama', prodi='$vprodi' WHERE nim='$vcari'";
        if ($this->koneksi->query($sql) === TRUE) {
            echo "Data mahasiswa berhasil diperbarui." . "<br/>";
        } else {
            echo "Error: " . $this->koneksi->error;
        }
    }

    public function hapusMahasiswa($vcari) {
        $sql = "DELETE FROM tb_mahasiswa WHERE nim = '$vcari'";
        if ($this->koneksi->query($sql) === TRUE) {
            echo "Data mahasiswa berhasil dihapus." . "<br/>";
        } else {
            echo "Error: " . $this->koneksi->error;
        }
    }
}
?>
