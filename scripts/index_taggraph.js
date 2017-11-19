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
						backgroundColor : ["#05668D","#028090","#00A896", "#02C39A", "#F0F3BD", "#fff" ],
						//backgroundColor : ["rgba(127,46,61,0.9)" ,"rgba(153,55,73,0.9)","rgba(178,64,86,0.9)","rgba(204,73,98,0.9)","rgba(229,82,110,0.9)"],
						borderWidth : 1
					}
					
				]
			};

			var ctx = $("#bar-chartcanvas");

			var options = {
				title : {
					display : true,
					position : "bottom",
					text : "2017 Top tags",
					fontSize : 14,
					fontColor : "#05668D"
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