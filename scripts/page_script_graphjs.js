$(document).ready(function () {

	
	$.ajax({
		url: "html/page_graph_entries.php",
		method: "GET",
	
		data: {actyid: "82"},
		success: function(data) 
		{
			
			var parsed = $.parseJSON(data);
			a = parsed.days;
			b = parsed.arr;

			// aa = convertToArray(a);
			// bb = convertToArray(b);
			
			//  function convertToArray(obj) {
  	// 		 return Object.keys(obj).map(function(key) {
   //     		 return obj[key];
  	// 			  });
			// 	}

			// console.log(b);

			var data = {
				labels : a,
				datasets : [
					{	
						label : false,
						data : b,
						borderWidth : 1,
						backgroundColor : "rgba(233, 62, 62, 0.45)",
						borderColor : "#FF3860",
						pointBackgroundColor : "#411515",
						fill: 'false',
						lineTension : 0,
						pointRadius : 0,
					}
					
				]
			};

			var ctx = $("#line-chartcanvas");

			var options = {
				title : {
					display : true,
					position : "top",
					text : "2017 Top tags",
					fontSize : 14,
					fontColor : "#00C4A7"
				},
				legend : {
					display : true,
					display: false, //disable label
					position : "bottom"
				},
				scales : {
					yAxes : [{
						ticks : {
							min : 0
						}
					}]
				}
			};

			var chart = new Chart( ctx, {
				type : "line",
				data : data,
				options : options
			});
		}
	});
});
