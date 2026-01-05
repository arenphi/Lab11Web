<?php
/**
 * Implementasi Form Input User menggunakan Class Form dan Class Database
 */

// Instance objek (Database dan Form sudah tersedia dari index.php)
$db = new Database();
$form = new Form("", "Simpan Data");

// Logika penyimpanan data
if ($_POST) {
    // Tangani checkbox hobi
    $hobi_data = isset($_POST['hobi']) ? $_POST['hobi'] : [];
    
    $data = [
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'pass' => $_POST['pass'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'agama' => $_POST['agama'],
        'hobi' => implode(',', $hobi_data),
        'alamat' => $_POST['alamat'],
    ];
    
    // Simpan ke tabel 'users'
    $simpan = $db->insert('users', $data);

    if ($simpan) {
        echo "<div class='alert-success'>Data berhasil disimpan!</div>";
    } else {
        echo "<div class='alert-danger'>Gagal menyimpan data.</div>";
    }
}
?>

<h3>Form Input User (OOP)</h3>
<?php
// Menampilkan Form
$form->addField("nama", "Nama Lengkap");
$form->addField("email", "Email");
$form->addField("pass", "Password", "password");

$form->addField("jenis_kelamin", "Jenis Kelamin", "radio", [
    'L' => 'Laki-laki',
    'P' => 'Perempuan'
]);

$form->addField("agama", "Agama", "select", [
    'Islam' => 'Islam',
    'Kristen' => 'Kristen',
    'Katolik' => 'Katolik',
    'Hindu' => 'Hindu',
    'Budha' => 'Budha'
]);

$form->addField("hobi", "Hobi", "checkbox", [
    'Membaca' => 'Membaca',
    'Coding' => 'Coding',
    'Traveling' => 'Traveling'
]);

$form->addField("alamat", "Alamat Lengkap", "textarea");

// Tampilkan Form
$form->displayForm();
?>