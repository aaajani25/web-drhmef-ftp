<!--<div id="titre">
  <div class="t_container">
    <h1 class="h_tilte disp-1">MFP'SENDBOX - ECRIRE AU MINISTRE</h1>
  </div>
</div><br>-->
<?php
//echo validation_errors();
  
  if(!empty($msg) && $this->uri->segment(3)=='trt_demande_acte'){if($type==1){$msg_type = 'msg-erreur';}else{$msg_type = 'msg-succes';}
?>
        <div class="msg <?php echo $msg_type; ?>" id="senb" style="margin-top:3px">
            <?php echo $msg; ?>
        </div>

        <script type="text/javascript">
      setTimeout(function(){
        document.getElementById('senb').style.display = 'none';
    },10000);
     
    </script>
<?php }?>
<script type="text/javascript">
function sup_h(acte)
{
  
  //alert(acte.value);
  if(acte.value==6)
  {
    document.getElementById('devoileacte1').style.display = 'block';
    document.getElementById('devoileacte2').style.display = 'block';
  }
  else 
  {
    document.getElementById('devoileacte1').style.display = 'none';
    document.getElementById('devoileacte2').style.display = 'none';
  }
}
</script>

<form action="<?php echo site_url($ctrl.'/trt_demande_acte') ?>" method="post">
<div class="panel-grid" id="pgx-7-1" style="margin-top:2px;">

  <div class="panel-grid-cell" id="pgcx-7-1-0">
    <h3 class="widget-title">STATISTIQUES DES DEMANDES DE AVIS FAVORABLES </h3>
    <!--contenu-->
    
      <p>

      <table width="950" border="1" align="center" cellpadding="4" cellspacing="5" class=".table-bordered">
         <thead>
          <th>Emploi</th>
          <th>Janvier</th>
          <th>Fevrier</th>
          <th>Mars</th>
          <th>Avril</th>
          <th>Mai</th>
          <th>Juin</th>
          <th>Juillet</th>
          <th>Aout</th>
          <th>Septembre</th>
          <th>Octobre</th>
          <th>Novembre</th>
          <th>Decembre</th>
          <th>Total</th>
         </thead>
         <tbody>
         <?php foreach ($stats as $stat){?>
         <tr>
         <td><?php echo $stat['emploi'] ?></td>
         <td><?php echo $stat['janv'] ?></td>
         <td><?php echo $stat['fev'] ?></td>
         <td><?php echo $stat['mars'] ?></td>
         <td><?php echo $stat['avr'] ?></td>
         <td><?php echo $stat['mai'] ?></td>
         <td><?php echo $stat['juin'] ?></td>
         <td><?php echo $stat['juil'] ?></td>
         <td><?php echo $stat['aout'] ?></td>
         <td><?php echo $stat['sept'] ?></td>
         <td><?php echo $stat['oct'] ?></td>
         <td><?php echo $stat['nov'] ?></td>
         <td><?php echo $stat['decem'] ?></td>
         <td><?php echo $stat['total'] ?></td>
         </tr>
         </tbody>
         <?php }?>
     </table>    
          

            </span>
        </div>
    </div>
 </div>

</div>
<input name="recep" type="hidden" value="support@fonctionpublique.gouv.ci">
<input name="parent" type="hidden" value="winsend_demande">
</form>

