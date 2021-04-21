// JavaScript Document
function ajax(OutputSectionId,FileLocation,ImageLoaderLocation,UrlRequest)
{
	$.ajax({
			type: "POST",
			url: ""+FileLocation+"",
			data: ""+UrlRequest+"",
			cache: false,
			beforeSend: function () { 
				$('#'+OutputSectionId).html('<img src="'+ImageLoaderLocation+'" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$('#'+OutputSectionId).html( html );
			}
		});
}