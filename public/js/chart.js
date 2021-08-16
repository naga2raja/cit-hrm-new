	// Total no. of Employees
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
								return '<a id='+this.value+'>' + this.value +'</a>';
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

				// set link to the xAxis categories // $("#Leave").attr("href", "leave-list");
				var link1 = document.getElementById("Leave");
			    link1.setAttribute('href', "leave-list");

			    var link2 = document.getElementById("Attendance");
			    link2.setAttribute('href', "employee-records");

				var link3 = document.getElementById("Timesheet");
			    link3.setAttribute('href', "timesheets");

				// to remove the watermark
				$('.highcharts-credits').html('');
			}
		});
	}