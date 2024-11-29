const menuIcon = document.querySelector('.menu-icon');
const sideBar = document.querySelector('#sidebar');
const header = document.querySelector('.header');

menuIcon.addEventListener('click', toggleSidebar);

function toogleSidebar() {
    if (sidebar.classList.contains('sidebar-responsive')) {
        sidebar.classList.remove('sidebar-responsive');
        menuIcon.querySelector('span').innerText = 
            'keyboard_double_arrow_right';
        header.classList.remove('header-responsive');
    } else {
        sidebar.classList.add('sidebar-responsive');
        menuIcon.querySelector('span').innerText = 'menu';
        header.classList.add('header-responsive');
    }
}

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
        },
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
        enabled: false,
  },
  legend: {
        show: false,
  },
  xaxis: {
        categories: ['Pierre', 'David',  'Jules', 'Alexia', 'Max'],
     }, 
     yaxix: {
        title: {
            text: "Recommandations",
        },
     },
  };

  let chartBar = new ApexCharts(document.querySelector("#chart-bar"), options);
  chartBar.render();