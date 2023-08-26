<h1 class="text-dark">Willkomen zur <?php echo $_settings->info('name') ?></h1>
<hr>
<div class="container">
  <div class="card">
    <div class="card-body">
      <h3>Erklärung des Systems:</h3>
      <ol>
        <li>Die Anmeldedaten sind vertraulich zu behandeln!</li>
        <li>Dieses System wird zur Statistik erstellung genutzt.</li>
        <li>Kommentatoren kriegen auf anfrage einen Gastzugang.</li>
        <li>Die einzelenen Unterkategorien sind über die Seitennavigation sichtbar, können aber nur vom Admin geändert werden.</li>
        <li>Die einzelnen Statistiken lauten:</li>
        <ol>
          <li>Teamvergleich</li>
          <li>Topscorer</li>
          <li>Torwartvergleich</li>
          <li>Powerplay</li>
        </ol>
        <li>Die Statistiken sidn teilweise per Hand und teilweise per API eingegeben, hierbei können Tippfehler entstehen.</li>
        <li>Dieses System ist nur für Mitglieder des Mediateams der Rostock Piranhas und auf anfrage werden vereinzelnt für andere Mediateams Accounts erstellt.</li>
      </ol>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h3>Neuigkeiten</h3>
      <?php
      $qry = $conn->query("SELECT * FROM `announcements` order by unix_timestamp(date_created) desc");
      while ($row = $qry->fetch_assoc()) :
        $row['announcement'] = strip_tags(stripslashes(html_entity_decode($row['announcement'])))

      ?>
        <a class="card text-dark card-outline card-primary mb-2 view_data" href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' data-title='<?php echo $row['title'] ?>'>
          <div class="card-header">
            <h5 class="card-title"><?php echo $row['title'] ?></h5>
            <span class="float-right text-muted"><?php echo date("M d,Y h:i A", strtotime($row['date_created'])) ?></span>
          </div>
          <div class="card-header">
            <p class="truncate"><?php echo $row['announcement'] ?></p>
          </div>
        </a>
      <?php endwhile; ?>
    </div>
  </div>
</div>
</div>

<script>
    $(function(){
        $('.view_data').click(function(){
            uni_modal($(this).attr('data-title'),'../view_accouncement.php?id='+$(this).attr('data-id'),'mid-large')
        })
    })
</script>