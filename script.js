function currentDate()
	{
		var d = new Date();
		var year = d.getFullYear();
		var month = d.getMonth() + 1;
		if (month < 10) month = "0" + month;
		var day = d.getDate();
		if (day < 10) day = "0" + day;
		
		var readyDate = year + "-" + month + "-" + day;
		document.getElementById("date").value = readyDate;
	}
	
	function drawPieChart()
	{
			google.charts.load("current", {packages:["corechart"]});
		 google.charts.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Language', 'Speakers (in millions)'],
			  ['German',  5.85],
			  ['French',  1.66],
			  ['Italian', 0.316],
			  ['Romansh', 0.0791]
			]);

		  var options = {
			legend: 'right',
			pieSliceText: 'label',
			backgroundColor: '#A5BFC5',
			pieStartAngle: 100,
		  };

			var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			chart.draw(data, options);
		  }
	}