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
						backgroundColor : ["#fff","#ececec","#d4d4d4", "#bcbcbc", "#a5a5a5", "#8d8d8d" ],
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
					fontColor : "#fff"
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