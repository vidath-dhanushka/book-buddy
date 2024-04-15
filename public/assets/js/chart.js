
// ---------- CHARTS ----------

// AREA CHART
const subscriptionRevenueChartOptions = {
  series: [
    {
      name: 'Basic',
      data: [10000, 12000, 14000, 16000, 18000, 20000, 22000], // Example revenue data for Basic subscription level
    },
    {
      name: 'Gold',
      data: [15000, 16000, 17000, 18000, 19000, 20000, 21000], // Example revenue data for Gold subscription level
    },
    {
      name: 'Premium',
      data: [20000, 22000, 24000, 26000, 28000, 30000, 32000], // Example revenue data for Premium subscription level
    }
  ],
  chart: {
    type: 'area',
    background: 'transparent',
    height: 200,
    stacked: true,
    toolbar: {
      show: false,
    },
  },
  colors: ['#7469B6', '#AD88C6', '#E1AFD1'], // Colors for each subscription level
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'], // Months as labels
  dataLabels: {
    enabled: false,
  },
  fill: {
    gradient: {
      opacityFrom: 0.4,
      opacityTo: 0.1,
      shadeIntensity: 1,
      stops: [0, 100],
      type: 'vertical',
    },
    type: 'gradient',
  },
  grid: {
    borderColor: '#55596e',
    yaxis: {
      lines: {
        show: true,
      },
    },
    xaxis: {
      lines: {
        show: true,
      },
    },
  },
  legend: {
    labels: {
      colors: '#B5C0D0',
    },
    show: true,
    position: 'top',
  },
  markers: {
    size: 1,
    strokeColors: '#B5C0D0',
    strokeWidth: 3,
  },
  stroke: {
    curve: 'smooth',
  },
  xaxis: {
    axisBorder: {
      color: '#55596e',
      show: true,
    },
    axisTicks: {
      color: '#55596e',
      show: true,
    },
    labels: {
      offsetY: 5,
      style: {
        colors: '#B5C0D0',
      },
    },
  },
  yaxis: {
    title: {
      text: 'Revenue (Rs)',
      style: {
        color: '#B5C0D0',
      },
    },
    labels: {
      style: {
        colors: ['#B5C0D0'],
      },
    },
  },
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'dark',
  },
};

const subscriptionRevenueChart = new ApexCharts(
  document.querySelector('#revenue-chart'),
  subscriptionRevenueChartOptions
);
subscriptionRevenueChart.render();


  // STACKED BAR CHART
  const stackedBarChartOptions = {
    series: [
      {
        name: 'Public',
        data: [30, 40, 45], // Data for Public under each subscription level
      },
      {
        name: 'Creative Commons',
        data: [20, 25, 30], // Data for Creative Commons under each subscription level
      }
    ],
    chart: {
      type: 'bar',
      background: 'transparent',
      height: 200,
      toolbar: {
        show: false,
      },
      stacked: true,
    },
    colors: ['#7469B6', '#AD88C6'],
    plotOptions: {
      bar: {
        borderRadius: 4,
        horizontal: false,
      },
    },
    dataLabels: {
      enabled: false,
    },
    fill: {
      opacity: 1,
    },
    grid: {
      borderColor: '#55596e',
      yaxis: {
        lines: {
          show: true,
        },
      },
      xaxis: {
        lines: {
          show: true,
        },
      },
    },
    legend: {
      labels: {
        colors: '#B5C0D0',
      },
      show: true,
      position: 'top',
    },
    stroke: {
      colors: ['transparent'],
      show: true,
      width: 2,
    },
    tooltip: {
      shared: true,
      intersect: false,
      theme: 'dark',
    },
    xaxis: {
      categories: ['Basic', 'Gold', 'Premium'], // Subscription levels
      title: {
        style: {
          color: '#B5C0D0',
        },
      },
      axisBorder: {
        show: true,
        color: '#55596e',
      },
      axisTicks: {
        show: true,
        color: '#55596e',
      },
      labels: {
        style: {
          colors: '#B5C0D0',
        },
      },
    },
    yaxis: {
      title: {
        text: 'Count',
        style: {
          color: '#B5C0D0',
        },
      },
      axisBorder: {
        color: '#55596e',
        show: true,
      },
      axisTicks: {
        color: '#55596e',
        show: true,
      },
      labels: {
        style: {
          colors: '#B5C0D0',
        },
      },
    },
  };
  
  const stackedBarChart = new ApexCharts(
    document.querySelector('#bar-chart'),
    stackedBarChartOptions
  );
  stackedBarChart.render();


  const activeSubscribersPieChartOptions = {
    series: [500, 700, 300], // Example data: Number of active subscribers for each subscription level
    labels: ['Basic', 'Gold', 'Premium'], // Subscription level labels
    chart: {
      type: 'pie',
      height: 350,
    },
    colors: ['#7469B6', '#AD88C6', '#E1AFD1'], // Colors for each subscription level
    legend: {
      position: 'bottom',
      labels: {
        colors: '#B5C0D0',
      }
    },
    tooltip: {
      enabled: true,
      y: {
        formatter: function(value) {
          return value + " subscribers";
        }
      }
    },
    responsive: [{
      breakpoint: 480,
      options: {
        chart: {
          width: 200
        },
        legend: {
          position: 'bottom'
        }
      }
    }]
  };
  
  const activeSubscribersPieChart = new ApexCharts(document.querySelector("#pie-chart"), activeSubscribersPieChartOptions);
  activeSubscribersPieChart.render();
  

  
  