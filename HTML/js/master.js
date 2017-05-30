 $('#navButton').click(function (){
 	$('#navigationBar').toggleClass('closed');
 	$(this).toggleClass('fa-bars');
 	$(this).toggleClass('fa-times');
 });
// 
// No preguntes
// 
// function createChart(canvasId, chartType, dataArray, bgArray, borderArray, labelsArray, label) {
// 	var ctx = document.getElementById(canvasId).getContext('2d');
// 	var myChart = new Chart(ctx, {
// 		type: chartType,
// 		data: {
// 			labels: labelsArray,
// 			datasets: [{
// 				label: label,
// 				data: dataArray,
// 				backgroundColor: bgArray,
// 				borderColor: borderArray,
// 				borderWidth: 1
// 			}]
// 		},
// 		options: {
// 			scales: {
// 				yAxes: [{
// 					ticks: {
// 						beginAtZero: true
// 					}
// 				}]
// 			}
// 		}
// 	});
// }