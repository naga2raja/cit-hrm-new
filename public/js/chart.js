$(function(){

	// LoadNewChart();
	function LoadNewChart(){
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
});

LoadEmployeeChart();
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
			console.log('chartData : ', data);

				// Make monochrome colors
				var pieColors = (function () {
				    var colors = [],
				        base = Highcharts.getOptions().colors[0],
				        i;

				    for (i = 0; i < 10; i += 1) {
				        // Start out with a darkened base color (negative brighten), and end
				        // up with a much brighter color
				        colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
				    }
				    return colors;
				}());

	        	// Pie Chart	
				Highcharts.chart('employees_chart', {
				    chart: {
				        plotBackgroundColor: null,
				        plotBorderWidth: null,
				        plotShadow: false,
				        type: 'pie'
				    },
				    title: {
				        text: 'Total Employees'
				    },
				    subtitle: {
				        text: 'Based on Job Title'
				    },
				    tooltip: {
				        pointFormat: '{series.name}: <b>{point.y}</b>'
				    },
				    accessibility: {
				        point: {
				            valueSuffix: ''
				        }
				    },
				    plotOptions: {
				        pie: {
				            allowPointSelect: true,
				            cursor: 'pointer',
				            dataLabels: {
				                enabled: true,
				                format: '{point.percentage:.1f} %',
				                distance: 13,
				            },
				            showInLegend: true
				        }
				    },
				    series: [{
				        name: 'No. of Employee',
				        colorByPoint: true,
				        data:  data
				    }]
				});

				// to remove the watermark
				$('.highcharts-credits').html('');

	        }
		}
	});
}

// no. of Requests
LoadRequestChart();
function LoadRequestChart(){
	$.ajax({
		method: 'GET',
		url: '/getRequestChart-ajax',
		dataType: "json",
		contentType: 'application/json',
		success: function(data){
			var role = '';
			var leave = 0;
			var attendance = 0;
			var timesheet = 0;
			console.log('bar chartData : ', data.leave);
			if(data.role){
				role = data.role;
	        }
			if(data.leave){
				leave = data.leave;
	        }
	        if(data.attendance){
				attendance = data.attendance;
	        }
	        if(data.timesheet){
				timesheet = data.timesheet;
	        }

        	// bar Chart
        	var color = {
			    Leave: 'rgb(124,181,236)',
			  	Attendance: 'rgb(67,67,72)',
			  	Timesheet: 'rgb(144,237,125)'
			}

        	Highcharts.chart('pending_request_chart', {
			    chart: {
			        type: 'column'
			    },
			    title: {
			        text: 'Pending Approval Requests'
			    },
			    subtitle: {
			        text: 'From: '+ role
			    },
			    xAxis: {
			        categories: ['Leave', 'Attendance', 'Timesheet'],
			        crosshair: true,
			        title: {
			            // text: 'Request Type',
			            // style: { fontWeight: 'bold'}
			        },
			        labels: {
			        	formatter: function() {
							return '<a href="<?php echo $this->baseUrl();?>/" class="external">' + this.value +'</a>';
						}
				      // formatter () {
				      // 	return `<span style="color: ${color[this.value]}">${this.value}</span>`
				      // }
				    }
			    },
			    yAxis: {
			        min: 0,
			        title: {
			            text: 'No. of Requests',
			            style: { fontWeight: 'bold'}
			        }
			    },
			    legend: {
			    	enabled: false
			    },
			    tooltip: {
			        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			            '<td style="padding:0">{point.y} Pending</td></tr>',
			        footerFormat: '</table>',
			        shared: true,
			        useHTML: false
			    },
			    plotOptions: {
			        series: {
			            dataLabels: {
			                enabled: true,
			                style: {
			                    fontWeight: 'bold'
			                }
			            }
			        },
			        column: {
			            pointPadding: 0.3,
			            borderWidth: 0
			        }
			    },
			    series: [{
			        name: '',
			        colorByPoint: true,
			        data: [leave, attendance, timesheet]

			    }]
			});	
			// Highcharts.chart('container', {
			//     chart: {
			//         type: 'column'
			//     },
			//     title: {
			//         text: 'Pending Requests'
			//     },
			//     subtitle: {
			//         // text: 'Source: WorldClimate.com'
			//     },
			//     xAxis: {
			//         categories: ['Request Type'],
			//         crosshair: true
			//     },
			//     yAxis: {
			//         title: {
			//             text: 'No. of Requests'
			//         }
			//     },
			//     plotOptions: {
			//         pie: {
			//             allowPointSelect: true,
			//             cursor: 'pointer',
			//             dataLabels: {
			//                 enabled: true,
			//                 format: '{point.percentage:.1f} %',
			//                 // distance: -10,
			//             },
			//             // showInLegend: true
			//         },
			//         column: {
			//             pointPadding: 0.3,
			//             borderWidth: 0
			//         }
			//     },
			//     series: [{
			//         name: 'Leave',
			//         data: [leave]

			//     }, {
			//         name: 'Attendance',
			//         data: [attendance]

			//     }, {
			//         name: 'Timesheet',
			//         data: [timesheet]

			//     }]
			// });

			// to remove the watermark
			$('.highcharts-credits').html('');
		}
	});
	
}
