let options = {
    series: [
        {
            data: [5, 7, 6, 4, 9],
        },
    ],
    chart: {
        type: 'bar',
        height: 350,
        toolbar: {
            show: false,
        }
    },
  colors : ['#eba91d', '#bc1e51', '#04a07e', '434738', '#0b0c0e'],
  plotOptions: {
        bar: {
            
            distributed: true,
            horizontal: false,
            columnWidth: '40%'
        },  
    },
    dataLabels: {
        enabled: false
  },
  legend: {
    show: false
  },
  xaxis: {
    categories: [
            'Pierre', 
            'David', 
            'Jules', 
            'Alexia', 
            'Max', 
            
        ],
     },
     yaxix: {
        title: {
            text: "Recommandations",
        },
     },
  };

  let chartBar = new ApexCharts(document.querySelector("#chart-bar"), options);
  chartBar.render();