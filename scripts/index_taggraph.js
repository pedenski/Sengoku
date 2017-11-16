$(document).ready(function () {
	$.ajax({
		url: "html/index_tagbar.php",
		method: "GET",
		success: function(data) 
		{
			console.log(data);
			var parsed = $.parseJSON(data);
			var  tag = [];
			var total = [];

			for(i = 0; i < parsed.length; ++i) {
				tag.push(parsed[i].tag);
				total.push(parsed[i].val);
			}
		
			console.log(total);

			var data = {
				labels : tag,
				datasets : [
					{	
						label : false,
						data : total,
						backgroundColor : ["#00D1B2","#64D1B2","#79D1B2", "#79C2B2", "#FFD1B2", "#fff" ],
						//backgroundColor : ["rgba(127,46,61,0.9)" ,"rgba(153,55,73,0.9)","rgba(178,64,86,0.9)","rgba(204,73,98,0.9)","rgba(229,82,110,0.9)"],
						borderWidth : 1
					}
					
				]
			};

			var ctx = $("#bar-chartcanvas");

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
				type : "bar",
				data : data,
				options : options
			});
		}
	});
});