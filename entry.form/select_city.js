$(function () 
 {
	 $("#s_city").autocomplete({
		source: function (request, response) {
		 $.getJSON(
			"http://gd.geobytes.com/AutoCompleteCity?callback=?&q="+request.term,
			function (data) {
				response(data);
			}
		 );
		},
		minLength: 3,
		select: function (event, ui) {
		 var selectedObj = ui.item;
		 $("#s_city").val(selectedObj.value);
		getcitydetails(selectedObj.value);
		 return false;
		},
		open: function () {
		 $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
		},
		close: function () {
		 $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
		}
	 });
	 $("#s_city").autocomplete("option", "delay", 100);

	 function getcitydetails(fqcn) {
 
	if (typeof fqcn == "undefined") fqcn = $("#s_city").val();
 
	cityfqcn = fqcn;
 
	if (cityfqcn) {
 
	    $.getJSON(
	                "http://gd.geobytes.com/GetCityDetails?callback=?&fqcn="+cityfqcn,
                     function (data) {
                     	$("#s_city").val(data.geobytescity);
			            $("#s_country").val(data.geobytescountry);
			        	}
			         );
				}
			}

	});


