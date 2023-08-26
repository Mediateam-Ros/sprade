<?php
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $qry = $conn->query("SELECT * from `teamvergleich` ");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    }
}
?>
<style>
    .input {
        border: none;
        border-bottom: 1px solid black;
        text-align: center;
    }

    .input:focus {
        outline: none;
    }
</style>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Update Teamvergleich</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form id="teamvergleich-form">
                <table class="table table-bordered table-stripped" id="indi-list">
                    <colgroup>
                        <col width="20%">
                        <col width="60%">
                        <col width="20%">
                    </colgroup>
                    <thead>
                       <tr>
                            <th class="text-center">Heim</th>
                            <th></th>
                            <th class="text-center">Gast</th>
                       </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = $conn->query("SELECT * from `teamvergleich` ");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <td class="text-center"><input class="input" name="punkte_heim" value="<?php echo $row['punkte_heim'] ?>"></td>
                                <td class="text-center"><b>Punkte (Platz)</b></td>
                                <td class="text-center"><input class="input" name="punkte_gast" value="<?php echo $row['punkte_gast'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="text-center"><input class="input" name="spiele_heim" value="<?php echo $row['spiele_heim'] ?>"></td>
                                <td class="text-center"><b>Spiele</b></td>
                                <td class="text-center"><input class="input" name="spiele_gast" value="<?php echo $row['spiele_gast'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="text-center"><input class="input" name="siege_heim" value="<?php echo $row['siege_heim'] ?>"></td>
                                <td class="text-center"><b>Siege</b></td>
                                <td class="text-center"><input class="input" name="siege_gast" value="<?php echo $row['siege_gast'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="text-center"><input class="input" name="niederlagen_heim" value="<?php echo $row['niederlagen_heim'] ?>"></td>
                                <td class="text-center"><b>Niederlagen</b></td>
                                <td class="text-center"><input class="input" name="niederlagen_gast" value="<?php echo $row['niederlagen_gast'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="text-center"><input class="input" name="tore_heim" value="<?php echo $row['tore_heim'] ?>"></td>
                                <td class="text-center"><b>Tore</b></td>
                                <td class="text-center"><input class="input" name="tore_gast" value="<?php echo $row['tore_gast'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="text-center"><input class="input" name="gtore_heim" value="<?php echo $row['gtore_heim'] ?>"></td>
                                <td class="text-center"><b>Gegentore</b></td>
                                <td class="text-center"><input class="input" name="gtore_gast" value="<?php echo $row['gtore_gast'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="text-center"><input class="input" name="strafen_heim" value="<?php echo $row['strafen_heim'] ?>"></td>
                                <td class="text-center"><b>Strafen</b></td>
                                <td class="text-center"><input class="input" name="strafen_gast" value="<?php echo $row['strafen_gast'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="text-center"><input class="input" name="schuesse_heim" value="<?php echo $row['schuesse_heim'] ?>"></td>
                                <td class="text-center"><b>Schüsse</b></td>
                                <td class="text-center"><input class="input" name="schuesse_gast" value="<?php echo $row['schuesse_gast'] ?>"></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex w-100">
            <button form="teamvergleich-form" class="btn btn-primary mr-2">Save</button>
            <a href="./?page=accounts" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#teamvergleich-form').submit(function(e) {
            e.preventDefault()
            start_loader()
            if ($('.err_msg').length > 0)
                $('.err_msg').remove()
            $.ajax({
                url: _base_url_ + 'classes/Master.php?f=save_teamvergleich',
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                error: err => {
                    console.log(err)
                    alert_toast("An error occured", "error")
                    end_loader()
                },
                success: function(resp) {
                    if (resp.status == 'success') {
                        location.href = "./?page=spieltag"
                    } else if (!!resp.msg) {
                        var msg = $('<div class="err_msg"><div class="alert alert-danger">' + resp.msg + '</div></div>')
                        $('#account-form').prepend(msg)
                        msg.show('slow')
                    } else {
                        alert_toast('An error occured', "error")
                        console.log(resp)
                    }
                    end_loader()
                }
            })
        })
    })
</script>