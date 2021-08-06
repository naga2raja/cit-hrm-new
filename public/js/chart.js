$(function(){

	LoadEmployeeChart();
	// upcoming leave data
	function LoadEmployeeChart(){
		$.ajax({
			method: 'GET',
			url: '/getEmployeeChart-ajax',
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				var leaves = '';
				var labels = '';
				var labels_Data = [];
				var count = 0;
				var count_Data = [];
				if(data.length > 0){
				// console.log('response : ', data);

					data.forEach(function (row,index) {
		            	labels += "'"+row.job_title+"',";
		            	labels_Data.push(row.job_title);
		        	});
		            for (var i = 0; i < labels_Data.length; i++) {
	            		data.forEach(function (row,index) {
		            		if(labels_Data[i] == row.job_title){
		            			count = (count+++ 1);
		            		}
	            		});
	            		count_Data.push(count);
	            		count = '';
	            	}
	            	// console.log('labels : ', labels_Data);
		        	// console.log('data : ', count_Data);

		        	// Pie Chart	
					var ctx = document.getElementById('pieChart').getContext('2d');
					var pieChart = new Chart(ctx, {
						type: 'pie',
						data: {
							labels: labels_Data,
							datasets: [{
								label: '# of Votes',
								data: count_Data,
								backgroundColor: [
									'rgba(255, 99, 132, 1)',
									'#3E007C',
									'rgba(255, 206, 86, 1)',
									'rgba(75, 192, 192, 1)',
									'rgba(153, 102, 255, 1)',
									'rgba(255, 159, 64, 1)'
								],
								borderWidth: 1
							}]
						},
						options: {
							responsive: true,
							legend: {
								display: true
							}
						}
					});

		        }
			}
		});
	}     
	
	
	// Line Chart
	
	var ctx = document.getElementById("lineChart").getContext('2d');
	var lineChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Jan",	"Feb",	"Mar",	"Apr",	"May"],
			datasets: [{
				label: 'Developer',
				data: [20,	10,	5,	5,	20],
				fill: false,
				borderColor: '#373651',
				backgroundColor: '#373651',
				borderWidth: 1
			},
					  {
				label: 'Marketing',
				data: [2,	2,	3,	4,	1],
				fill: false,
				borderColor: '#E65A26',
				backgroundColor: '#E65A26',
				borderWidth: 1
			},
					  {
				label: 'Marketing',
				data: [1,	3,	6,	8,	10],
				fill: false,
				borderColor: '#a1a1a1',
				backgroundColor: '#a1a1a1',
				borderWidth: 1
			}]
		},
		options: {
		  responsive: true,
			legend: {
				display: false
			}
		}
	});

});

// LoadNewChart();

// function LoadNewChart(){
// 	$.ajax({
// 		method: 'GET',
// 		url: '/getEmployeeChart-ajax',
// 		dataType: "json",
// 		contentType: 'application/json',
// 		success: function(data){
// 			var leaves = '';
// 			var labels = '';
// 			var labels_Data = [];
// 			var count = 0;
// 			var count_Data = [];
// 			if(data.length > 0){
// 			// console.log('response : ', data);

// 				data.forEach(function (row,index) {
// 	            	labels += "{ name:'"+row.job_title+"', y: 61.41, },"+;
// 	            	labels_Data.push(row.job_title);
// 	        	});
// 	            for (var i = 0; i < labels_Data.length; i++) {
//             		data.forEach(function (row,index) {
// 	            		if(labels_Data[i] == row.job_title){
// 	            			count = (count+++ 1);
// 	            		}
//             		});
//             		count_Data.push(count);
//             		count = '';
//             	}
//             	console.log('labels : ', labels_Data);
// 	        	console.log('data : ', count_Data);

// 	        	// Pie Chart	
// 				Highcharts.chart('container', {
// 				    chart: {
// 				        plotBackgroundColor: null,
// 				        plotBorderWidth: null,
// 				        plotShadow: false,
// 				        type: 'pie'
// 				    },
// 				    title: {
// 				        text: 'Employee Job Title 2021'
// 				    },
// 				    tooltip: {
// 				        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
// 				    },
// 				    accessibility: {
// 				        point: {
// 				            valueSuffix: '%'
// 				        }
// 				    },
// 				    plotOptions: {
// 				        pie: {
// 				            allowPointSelect: true,
// 				            cursor: 'pointer',
// 				            dataLabels: {
// 				                enabled: true,
// 				                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
// 				            }
// 				        }
// 				    },
// 				    series: [{
// 				        name: 'Brands',
// 				        colorByPoint: true,
// 				        data: [
// 				        		{
// 						            name: 'Chrome',
// 						            y: 61.41,
// 						        },
// 						    ]
// 				    }]
// 				});

// 	        }
// 		}
// 	});
// }

