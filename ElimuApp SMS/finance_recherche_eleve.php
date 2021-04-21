<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Finance Recherche Eleve</title>
<link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/8nov17.css" rel="stylesheet">
<script src="ajax/jquery-1.9.0.min.js"></script> 
</head>

<body>
<label>Recherche Numero Matricule ou Nom Complet Eleve </label><input type="text" id="student_Id" placeholder="" /> &nbsp;<button type="button" onclick="return search_student(); ">Recherche</button>
<div id="show_students"></div>
</body>
</html>
<script>
function search_student() {
    var txt;
	var student_id=document.getElementById('student_Id').value;
    var r = confirm("Etes-vous sure de vouloir effectuer une recherche avec la valeur suivante "+student_id+"!");
    if (r == true) {
		
		                   if (student_id .length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "ajax/search_student.php",
			data: "keyword="+student_id+"",
			cache: false,
			beforeSend: function () { 
				$('#show_students').html('<img src="ajax/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#show_students").html( html );
			}
		});
	} else {
		$("#show_students").html( "" );
	}
				   } 
}
</script>