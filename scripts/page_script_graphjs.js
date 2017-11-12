//get canvas
	var ctx = $("#line-chartcanvas");

	var data = {
		labels : [<?php echo "'$days'"; ?>],
		datasets : [
			{
			
				label : "<?php echo date('M'); ?>",
				borderWidth: 1,
				data :  <?php print json_encode($arr); ?>,
				backgroundColor : "rgba(233, 62, 62, 0.45)",
				borderColor : "#FF3860",
				pointBackgroundColor : "#411515",
				fill: 'false',
				lineTension : 0,
				pointRadius : 0,


			},
			
			
		]
	};

	var options = {
		title : {
			display : false,
			position : "top",
			text : "Line Graph",
			fontSize : 18,
			fontColor : "#000",
			
		},
		legend : {
			display : true,
			position : "bottom",
			lineWidth : 1
		},
		scales: {
		    yAxes: [{
		                gridLines: {
		                    display:false
		                }   
		            }]
		    }
	};

	var chart = new Chart( ctx, {
		type : "line",
		data : data,
		options : options
	} );