<script>
function save(Type,Action,Id)
{
	var msg;
	msg = confirm('Etes - vous sur(e) d\'effectuer cette action ?');
	alert(Type);
	exit();
	if(msg == true)
	{
		//process
		switch(Type)
		{
			case 1:
			var SectionId= document.getElementById('SectionID').value;
			var Requests='Type='+Type+'&Action='+Action+'&SectionId='+SectionId+'&Id='+Id+'';
			if( SectionId!='')
			{
			ajax('MsgSectionId','ajax/executer.php','ajax/loader.gif',Requests);
			}else
			{
				alert('Veuillez remplir le textbox pour continuer');
				document.getElementById('SectionID').focus();
			}
			break; // section
			case 2:
			alert('cool');
			/*
			var OptionId= document.getElementById('OptionId').value;
			var SectionId= document.getElementById('SectionId').value;
			var Requests='Type='+Type+'&Action='+Action+'&SectionId='+SectionId+'&OptionId='+OptionId+'&Id='+Id+'';
			if(OptionId!='')
			{
				//process
				//ajax('MsgOptionId','ajax/executer.php','ajax/loader.gif',Requests);
			}else
			{
				alert('Veuillez remplir le textbox pour continuer');
				document.getElementById('OptionId').focus();
			}*/
			break;
			default:
		{
			alert('Invalid Option');
		}
		}
		
	}
	else
	{
		return false;
	}
}
function RefreshTree()
		{
		ajax('ThreeId','ajax/RefreshTree.php','ajax/loader.gif','');	
		}

</script>