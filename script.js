function currentDate()
	{
		var d = new Date();
		var year = d.getFullYear();
		var month = d.getMonth() + 1;
		if (month<10) month = "0" + month;
		var day = d.getDate();
		if (day<10) day = "0" + day;
		
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
	
	// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
 function modals() {
  modal.style.display = "block";
}
function modala() {
  modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modala();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}