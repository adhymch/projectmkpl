<h2>Kirim Barang</h2>
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
echo form_input('Divisi', set_value('Divisi', $data['Divisi']),'readonly');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Tipe Barang:";
echo "</td>";
echo "<td>";
echo form_input('TipeBarang', set_value('TipeBarang', $data['TipeBarang']),'readonly');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Serial Number:";
echo "</td>";
echo "<td>";
echo form_input('SerialNumber', set_value('SerialNumber', $data['SerialNumber']),'readonly');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Nama Barang:";
echo "</td>";
echo "<td>";
echo form_input('NamaBarang', set_value('NamaBarang', $data['NamaBarang']),'readonly');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Nama Pengirim:";
echo "</td>";
echo "<td>";
echo form_input('Pengirim', set_value('Pengirim', ''));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Nama Penerima:";
echo "</td>";
echo "<td>";
echo form_input('Penerima', set_value('Penerima', ''));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Lokasi Asal:";
echo "</td>";
echo "<td>";
$Lokasi1 = array('Gudang 1' => 'Gudang 1', 'Gudang 2'=>'Gudang 2', 'Gudang 3'=>'Gudang 3', 'Gudang 4'=>'Gudang 4', 'Gudang 5'=>'Gudang 5');
echo form_dropdown('Lokasi1', $Lokasi1, set_value('Lokasi1', $data['Lokasi1']),'required');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Lokasi Tujuan:";
echo "</td>";
echo "<td>";
$Lokasi2 = array('Gudang 1' => 'Gudang 1', 'Gudang 2'=>'Gudang 2', 'Gudang 3'=>'Gudang 3', 'Gudang 4'=>'Gudang 4', 'Gudang 5'=>'Gudang 5');
echo form_dropdown('Lokasi2', $Lokasi2, set_value('Lokasi2', $data['Lokasi2']),'required');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Tanggal:";
echo "</td>";
echo "<td>";
$this->load->helper('date');
$TanggalBuat = mdate('%Y-%m-%d %h:%i:%s', now());
echo form_input('TanggalKirim', set_value('TanggalKirim', $TanggalBuat),'disabled');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Status:";
echo "</td>";
echo "<td>";
$Status = array('Pindah'=>'Pindah');
echo form_dropdown('Status',$Status, set_value('Status', $data['Status']),'required');
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