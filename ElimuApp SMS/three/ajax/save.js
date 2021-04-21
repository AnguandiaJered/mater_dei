function save(Type,Action,Id)
{
	var msg;
	msg = confirm('Etes - vous sur(e) d\'effectuer cette action ?');
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
			
			var OptionId= document.getElementById('OptionId').value;
			var SectionId= document.getElementById('SectionId').value;
			var Requests='Type='+Type+'&Action='+Action+'&SectionId='+SectionId+'&OptionId='+OptionId+'&Id='+Id+'';
			if(OptionId!='')
			{
				//process
				ajax('MsgOptionId','ajax/executer.php','ajax/loader.gif',Requests);
			}else
			{
				alert('Veuillez remplir le textbox pour continuer');
				document.getElementById('OptionId').focus();
			}
			break
			case 3:
			var Periode,Trimestre,Exam,Option; 
		    Periode = document.getElementById('PeriodeId').value;
			Trimestre = document.getElementById('TrimestreId').value;
			Exam = document.getElementById('ExamId').value;
			OptionId= document.getElementById('OptionId').value;
			if(Periode == '')
			{
				alert('Veuillez ajouter la valeur du periode');
				document.getElementById('PeriodeId').focus();
			}else if(Trimestre == '')
			{
				alert('Veuillez ajouter la valeur du trimestre');
				document.getElementById('TrimestreId').focus();
			}else if(Exam == '')
			{
				alert('Veuillez ajouter la valeur du exam');
				document.getElementById('ExamId').focus();
			}else
			{
				//process
				var Requests='Type='+Type+'&Action='+Action+'&Id='+Id+'&Trimestre='+Trimestre+'&Periode='+Periode+'&Exam='+Exam+'&OptionId='+OptionId+'';
				ajax('MsgPeriodiciteId','ajax/executer.php','ajax/loader.gif',Requests);
			}
			break;
			case 4:
			
			var OptionId= document.getElementById('OptionId').value;
			var ActiviteId= document.getElementById('ActiviteId').value;
			//alert('Booba');
			
			if(ActiviteId!='')
			{
				var Requests='Type='+Type+'&Action='+Action+'&Id='+Id+'&OptionId='+OptionId+'&ActiviteId='+ActiviteId+'';
				ajax('MsgActiviteId','ajax/executer.php','ajax/loader.gif',Requests);
			}
			else
			{
				alert('Veuillez ajouter activite pour continuer');
				document.getElementById('ActiviteId').focus();
			}
			
			break;
			case 5:
			var cours,p,t,ex;
			cours= document.getElementById('CourseId').value;
			p= document.getElementById('PId').value;
			t= document.getElementById('TId').value;
			ex= document.getElementById('EId').value;
			if(cours =='')
			{
				alert('Veuillez ajouter branche');
				document.getElementById('CourseId').focus();
			}
			else if(p =='')
			{
				alert('Veuillez ajouter max periode');
				document.getElementById('PId').focus();
			}
			else if(t =='')
			{
				alert('Veuillez ajouter max trimestre');
				document.getElementById('TId').focus();
			}
			else if(ex =='')
			{
				alert('Veuillez ajouter max exam');
				document.getElementById('EId').focus();
			}
			else
			{
				//process
				var Requests='Type='+Type+'&Action='+Action+'&Id='+Id+'&Periode='+p+'&Trimestre='+t+'&Exam='+ex+'&Course='+cours+'';
				ajax('FormGeneratorId','ajax/executer.php','ajax/loader.gif',Requests);
			}
			break;
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
		}// JavaScript Document
		
function Gen_Form(MyN,ActiviteId,OptionId)
{
	var n;
	n = document.getElementById(MyN).value;
	if(n < 1)
	{
		alert('Veuillez ajouter un nombre pour continuer');
		document.getElementById(myn).focus();
	}else
	{
		//process
		//FormGeneratorId
		
		ajax('FormGeneratorId','ajax/form_generator.php','ajax/loader.gif','n='+n+'&ActiviteId='+ActiviteId+'&OptionId='+OptionId+'');
	}
}
function MultipleSave(N,ActiviteId,OptionId)
{
	var j,i,sql,cours,msg,mycourse,p,t,ex,real_course;
	j=0;
	sql='';
	for(i=0; i< N; i++)
	{
		j++;
		cours = document.getElementById('MyCourseId'+j).value;
		p = document.getElementById('PId'+j).value; if(p==''){p=0;}
		t = document.getElementById('TId'+j).value; if(t==''){t=0;}
		ex = document.getElementById('EId'+j).value; if(ex==''){ex=0;}
		real_course=cours.replace("'","");
		real_course=real_course.replace("&","");
		mycourse="'"+real_course+"'";
		
		sql+='insert into  tbl__43branches set activite_id='+ActiviteId+',option_id='+OptionId+',branche='+mycourse+',max__periode='+p+',max__trimestre='+t+',max__exam='+ex+'|';
	}
	msg = confirm('Etes-vous sure(e) de vouloir executer cette action encore?');
	if(msg == true)
	{
	ajax('FormGeneratorId','ajax/executer.php','ajax/loader.gif','Sql='+sql+'&Type=5&Id=0&Action=default');
	}else
	{
		alert('Action rejetee');
	}
}