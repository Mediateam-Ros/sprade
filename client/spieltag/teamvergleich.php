<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Teamvergleich</h3>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<table class="table table-bordered table-stripped" id="indi-list">
				<colgroup>
					<col width="20%">
					<col width="60%">
					<col width="20%">
				</colgroup>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * from `teamvergleich` ");
					while ($row = $qry->fetch_assoc()) :
					?>
						<tr>
							<td class="text-center"><?php echo $row['punkte_heim'] ?></td>
							<td class="text-center"><b>Punkte (Platz)</b></td>
							<td class="text-center"><?php echo $row['punkte_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['spiele_heim'] ?></td>
							<td class="text-center"><b>Spiele</b></td>
							<td class="text-center"><?php echo $row['spiele_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['siege_heim'] ?></td>
							<td class="text-center"><b>Siege</b></td>
							<td class="text-center"><?php echo $row['siege_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['niederlagen_heim'] ?></td>
							<td class="text-center"><b>Niederlagen</b></td>
							<td class="text-center"><?php echo $row['niederlagen_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['tore_heim'] ?></td>
							<td class="text-center"><b>Tore</b></td>
							<td class="text-center"><?php echo $row['tore_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['gtore_heim'] ?></td>
							<td class="text-center"><b>Gegentore</b></td>
							<td class="text-center"><?php echo $row['gtore_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['strafen_heim'] ?></td>
							<td class="text-center"><b>Strafen</b></td>
							<td class="text-center"><?php echo $row['strafen_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['schuesse_heim'] ?></td>
							<td class="text-center"><b>Schüsse</b></td>
							<td class="text-center"><?php echo $row['schuesse_gast'] ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	var indiList;
	$(document).ready(function(){
		// $('.view_data').click(function(){
		// 	uni_modal("Indiviual Details","accounts/view_details.php?code="+$(this).attr('data-id'))
		// })
	})
	$(function(){
		$('#indi-list').dataTable()
	})
</script>