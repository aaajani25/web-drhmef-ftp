<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" id="tabb">
        <tr align="center" class="row-title">
          <td width="259" bgcolor="">titre 1</td>
          <td width="117" bgcolor="">titre 2</td>
          <td width="135" height="25" bgcolor="">titre 3</td>
          <td width="109" height="25" bgcolor="">titre 4</td>
        </tr>
        <?php 
    if($nom_de_ton_tableau){
    foreach($nom_de_ton_tableau as $tab){ ?>
        <tr align="center" class="row-content">          
          <td bgcolor="">&nbsp;</td>
          
          <td>&nbsp;</td>
          
          <td>&nbsp;</td>
          
          <td>&nbsp;</td>
            
        </tr>
        <?php }}else {  ?>
        <tr class="row-content no-result">
          <td colspan="6" align="center">PAS RESULTAT</td>
        </tr>
        <?php }  ?>
      </table>     