<?php
require('../phpscript/connection.php');
$db=db_connection();
$n=$_REQUEST['n'];
?><form method="" enctype="multipart/form-data">
<table width="100%" border="0">
  <tr bgcolor="#C1DFFD">
    <td>Titre Cours</td>
    <td>Section </td>
    <td>Option</td>
    <td>Classe</td>
    <td>Enseignant</td>
    <td>Max Periode</td>
    <td>Max Exam</td>
    <td>Max Trimestre</td>
    <td>Max Semetre</td>
    <td>Max General</td>
  </tr>
  <?php 
  for($i=1; $i<=$n; $i++)
  {
	  $sectionid="'OptionId".$i."'";?>
  <tr bgcolor="#FFFFFF">
    <td><label for="textfield"></label>
      <input type="text" name="textfield" id="CourID<?php echo $i;?>"></td>
    <td><?php echo mydropdown2outputs($db,'',' tbl__11section','',100,'return show_option('.$i.','.$sectionid.',this);','section"id="MysectionId'.$i.'','section_id','section',0,''); ?></td>
    <td><div id="OptionId<?php echo $i;?>"></div></td>
    <td width="200"><div id="ClassId<?php echo $i;?>"></div></td>
    <td><div id="LecturerId<?php echo $i;?>"></div></td>
    <td><input type="text" name="textfield3" id="MaxPeriodeId"></td>
    <td><input type="text" name="textfield4" id="MaxExamId"></td>
    <td><input type="text" name="textfield5" id="MaxTrimestreId"></td>
    <td><input type="text" name="textfield6" id="MaxSemestreId"></td>
    <td><input type="text" name="textfield7" id="MaxGeneralId"></td>
  </tr>
  <tr>
  </tr>
  <?php 
  }?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

