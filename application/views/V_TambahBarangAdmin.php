<h2>Tambah Barang</h2>
<div class="divider"></div>
<br/>

<?php
if (isset($data)) {
    
} else {
    $data = 0;
}

echo form_open();
echo "<table>";
echo "<tr colspan=2 class='error'>";
echo "<td>";
echo validation_errors();
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Divisi:";
echo "</td>";
echo "<td>";
$Divisi = array('IT Helpdesk' => 'IT Helpdesk', 'IT Internal'=>'IT Internal');
echo form_dropdown('Divisi',$Divisi, set_value('Divisi', $data['Divisi']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Tipe Barang:";
echo "</td>";
echo "<td>";
$TipeBarang = array('CD' => 'CD', 'Kabel LAN'=>'Kabel LAN', 'Keyboard'=>'Keyboard', 'Monitor'=>'Monitor', 'Mouse'=>'Mouse'
    , 'Telepon'=>'Telepon', 'Printer'=>'Printer', 'Printer & Scanner'=>'Printer & Scanner','RJ-45'=>'RJ-45',
    'Router'=>'Router', 'Switch'=>'Switch', 'TV'=>'TV');
echo form_dropdown('TipeBarang', $TipeBarang, set_value('TipeBarang', $data['TipeBarang']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Serial Number:";
echo "</td>";
echo "<td>";
echo form_input('SerialNumber', set_value('SerialNumber', $data['SerialNumber']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Nama Barang:";
echo "</td>";
echo "<td>";
echo form_input('NamaBarang', set_value('NamaBarang', $data['NamaBarang']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Lokasi Asal:";
echo "</td>";
echo "<td>";
$Lokasi1 = array('Gudang 1' => 'Gudang 1', 'Gudang 2'=>'Gudang 2', 'Gudang 3'=>'Gudang 3', 'Gudang 4'=>'Gudang 4', 'Gudang 5'=>'Gudang 5');
echo form_dropdown('Lokasi1', $Lokasi1, set_value('Lokasi1', $data['Lokasi1']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Lokasi Sekarang:";
echo "</td>";
echo "<td>";
$Lokasi2 = array('Gudang 1' => 'Gudang 1', 'Gudang 2'=>'Gudang 2', 'Gudang 3'=>'Gudang 3', 'Gudang 4'=>'Gudang 4', 'Gudang 5'=>'Gudang 5', 'Sedang Dikirim' => 'Sedang Dikirim');
echo form_dropdown('Lokasi2', $Lokasi2, set_value('Lokasi2', $data['Lokasi2']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Tanggal:";
echo "</td>";
echo "<td>";
$this->load->helper('date');
$TanggalBuat = mdate('%Y-%m-%d %h:%i:%s', now());
echo form_input('TanggalBuat', set_value('TanggalBuat', $TanggalBuat),'disabled');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Status:";
echo "</td>";
echo "<td>";
$Status = array('Tersedia' => 'Tersedia', 'Terpakai'=>'Terpakai', 'Pindah'=>'Pindah');
echo form_dropdown('Status',$Status, set_value('Status', $data['Status']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";

echo "</td>";
echo "<td>";
echo form_submit('submit', 'submit');
echo " ";
echo form_submit('cancel', 'Cancel');
echo "</td>";

echo "</tr>";
echo "</table>";
?>