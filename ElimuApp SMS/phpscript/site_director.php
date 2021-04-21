<?php if(isset($_POST['province_id']))
{
	header('location:../site_profile.php?id='.$_POST['site_id'].'&phase=1');
}?>