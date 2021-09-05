<?= $this->extend('layouts/mobile') ?>
<!--definis content di line stlh ini-->
<?= $this->section('content') ?>


<div class="ticket">
	<p class="centered btm-border"><strong><?= isset($rec['lokasi'])?$rec['lokasi']:''; ?></strong><br><br></p>
			
    <p class="centered">
		
		<img src="<?=$qrcode;?>" style="width:100px;height:100px;margin:auto;" alt="Logo">		
		<br>
		<strong><?= isset($rec['id_apar'])?$rec['id_apar']:''; ?></strong>
    <table>
        <tbody>
            <tr>
                <td class="customlabel">&nbsp;Jenis Apar</td>
                <td class="titikdua">:</td>
				<td class="customdesc"><?= isset($rec['jenis'])?$rec['jenis']:''; ?></td>
			</tr>
			<tr>
                <td class="customlabel">&nbsp;Tanggal Masa Berlaku</td>
                <td class="titikdua">:</td>
				<td class="customdesc"><?= isset($rec['masa_berlaku_awal'])?date('d M Y',strtotime ($rec['masa_berlaku_awal'])):''; ?></td>
			</tr>
			<tr>
                <td class="customlabel">&nbsp;Sampai</td>
                <td class="titikdua">:</td>
				<td class="customdesc"><?= isset($rec['masa_berlaku_akhir'])?date('d M Y',strtotime ($rec['masa_berlaku_akhir'])):''; ?></td>
			</tr>
        </tbody>
    </table>
        <p class="btm-top">
			&nbsp;Tanggal jam cetak : <?php echo date('d M Y H:i:s'); ?><br>
			<table style="margin-left:180px;">
				<tr>
					<td class="centered">Ditetapkan</td>
				</tr>
				<tr><td class="centered">&nbsp;</td></tr>
				<tr>
					<td class="centered">&nbsp;</td>
				</tr>
				<tr><td class="centered">&nbsp;</td></tr>
				<tr><td class="centered">MANAGER</td></tr>
			</table>
		</p>
</div>
		
<?= $this->endSection() ?>