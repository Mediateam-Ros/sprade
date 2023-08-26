<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `accounts` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
}
}
?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Topscorer</h3>
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
					$qry = $conn->query("SELECT * from `topscorer` ");
					while ($row = $qry->fetch_assoc()) :
					?>
						<tr>
							<td class="text-center"><?php echo $row['punkte_heim'] ?></td>
							<td class="text-center"><b>Punkte</b></td>
							<td class="text-center"><?php echo $row['punkte_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['tore_heim'] ?></td>
							<td class="text-center"><b>Tore</b></td>
							<td class="text-center"><?php echo $row['tore_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['assist_heim'] ?></td>
							<td class="text-center"><b>Assist</b></td>
							<td class="text-center"><?php echo $row['assist_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['spiele_heim'] ?></td>
							<td class="text-center"><b>Spiele</b></td>
							<td class="text-center"><?php echo $row['spiele_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['+/-_heim'] ?></td>
							<td class="text-center"><b>+/-</b></td>
							<td class="text-center"><?php echo $row['+/-_gast'] ?></td>
						</tr>
						<tr>
							<td class="text-center"><?php echo $row['position_heim'] ?></td>
							<td class="text-center"><b>Position</b></td>
							<td class="text-center"><?php echo $row['position_gast'] ?></td>
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
            start_loader()
            if($('.err_msg').length > 0)
                $('.err_msg').remove()
            $.ajax({
                url:_base_url_+'classes/Master.php?f=deposit',
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