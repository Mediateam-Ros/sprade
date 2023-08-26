<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Torwartvergeleich</h3>
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
					$qry = $conn->query("SELECT * from `torwartvergleich` ");
					while ($row = $qry->fetch_assoc()) :
					?>
						<tr>
							<td class="text-center"><?php echo $row['spiele_heim'] ?></td>
							<td class="text-center"><b>Spiele (Platz)</b></td>
							<td class="text-center"><?php echo $row['spiele_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['spielminuten_heim'] ?></td>
							<td class="text-center"><b>Spielminuten</b></td>
							<td class="text-center"><?php echo $row['spielminuten_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['schuesse_heim'] ?></td>
							<td class="text-center"><b>Erhaltende Schüsse</b></td>
							<td class="text-center"><?php echo $row['schuesse_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['fangquote_heim'] ?></td>
							<td class="text-center"><b>Fangquote %</b></td>
							<td class="text-center"><?php echo $row['fangquote_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['gtore_heim'] ?></td>
							<td class="text-center"><b>Gegentore</b></td>
							<td class="text-center"><?php echo $row['gtore_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['shutouts_heim'] ?></td>
							<td class="text-center"><b>Shutouts</b></td>
							<td class="text-center"><?php echo $row['shutouts_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['name_heim'] ?></td>
							<td class="text-center"><b>Name</b></td>
							<td class="text-center"><?php echo $row['name_gast'] ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
    $(function(){
       
        $('#account-form').submit(function(e){
            e.preventDefault()
            if(parseFloat($('[name="current"]').val()) < parseFloat($('[name="balance"]').val())){
                alert_toast("Amount is greater than your current balance",'warning')
                return false;
            }
            start_loader()
            if($('.err_msg').length > 0)
                $('.err_msg').remove()
            $.ajax({
                url:_base_url_+'classes/Master.php?f=withdraw',
                method:'POST',
                data:$(this).serialize(),
                dataType:'json',
                error:err=>{
                    console.log(err)
                    alert_toast("An error occured","error")
                    end_loader()
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        location.reload();
                    }else if(!!resp.msg){
                         var msg = $('<div class="err_msg"><div class="alert alert-danger">'+resp.msg+'</div></div>')
                         $('#account-form').prepend(msg) 
                         msg.show('slow')
                    }else{
                        alert_toast('An error occured',"error")
                        console.log(resp)
                    }
                    end_loader()
                }
            })
        })
    })
</script>