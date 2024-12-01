<div class="row">
    <div class="col-lg-12">
      <h1>Barang <small>Grafik Barang</small></h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i></a></li>
            <li><a href="">Barang</a></li>
            <li class="active">Grafik Barang</li>
        </ol>
    </div>
</div>

  <!-- tabel utama -->
<div class="row">
    <div class="col-lg-12">
      <figure class="highcharts-figure">
        <div id="data_barang"></div>
      </figure>
    </div>
</div>

<!-- menghubungkan ke database -->
<?php 
include("models/m_barang.php");
$brg = new Barang($connection);
$tampil = $brg->tampil();

$nama_brg = array();
$stok_brg = array();
while($data = $tampil->fetch_object()){
  $nama_brg[] = $data->nama_brg;
  $stok_brg[] = intval($data->stok_brg);
} 
?>

<script src="assets/highcharts/highcharts.js"></script>
<script src="assets/highcharts/series-label.js"></script>
<script src="assets/highcharts/exporting.js"></script>
<script src="assets/highcharts/export-data.js"></script>
<script src="assets/highcharts/accessibility.js"></script>
<script type="text/javascript">
  Highcharts.chart('data_barang', {

title: {
    text: 'Data Nama dan Jumlah Stok Barang',
    align: 'left'
},

subtitle: {
    text: 'Source : Data gw nih bos',
    align: 'left'
},

yAxis: {
    title: {
        text: 'Jumlah Satuan'
    }
},

xAxis: {
    categories: <?= json_encode($nama_brg);?>,
    tickmarckPlacement: 'on',
    title:{
      enabled: false
    }
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        }
    }
},

series: [{
    name: 'Jumlah Stok Barang',
    data: <?= json_encode($stok_brg);?>
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});

</script>