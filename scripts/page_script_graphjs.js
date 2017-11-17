$(document).ready(function () {
	$.ajax({
		url: "html/page_graph_entries.php",
		method: "GET",
		success: function(data) 
		{
			
			var  parsed = $.parseJSON(data);
			var d = parsed.days;
			var e = parsed.arr;

			var aa = [];
		

			for(z = 0; z < d.length; ++z) {
				aa.push(d);
			}

						
		
			console.log(aa);
		

			var data = {
				labels : ['16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'],
				datasets : [
					{	
						label : false,
						data : ["1"],
						backgroundColor : ["#00D1B2","#64D1B2","#79D1B2", "#79C2B2", "#FFD1B2", "#fff" ],
						//backgroundColor : ["rgba(127,46,61,0.9)" ,"rgba(153,55,73,0.9)","rgba(178,64,86,0.9)","rgba(204,73,98,0.9)","rgba(229,82,110,0.9)"],
						borderWidth : 1
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
				type : "bar",
				data : data,
				options : options
			});
		}
	});
});
