

let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
let series = subscriptions.map(subscription => {
 
  let data = months.map(month => {
      let member_count = subscription.month === month ? subscription.member_count : 0;
      return subscription.price * member_count;
  });

  return {
      name: subscription.name,
      data: data
  };
});

const subscriptionRevenueChartOptions = {
  series: series,
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
  labels: months,
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


  // BAR CHART

  var categories = ebooksCount.map(function(ebook) {
    return ebook.license_type;
  });
  var data = ebooksCount.map(function(ebook) {
    return ebook.book_count;
  });
const barChartOptions = {
  series: [
    {
      name: 'Books',
      data: data, // Example data for number of Public and Licensed books
    }
  ],
  chart: {
    type: 'bar',
    background: 'transparent',
    height: 200,
    toolbar: {
      show: false,
    },
    stacked: false, // Not a stacked bar chart
  },
  colors: ['#7469B6', '#B5C0D0'],
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
    categories: categories, // Book types
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
      text: 'Number of E- Books',
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

const barChart = new ApexCharts(
  document.querySelector('#bar-chart'),
  barChartOptions
);
barChart.render();

var sub_labels = subscriptions.map(function(subscription) {
  return subscription.name;
});
var sub_data = subscriptions.map(function(subscription) {
  return subscription.member_count;
});

  const activeSubscribersPieChartOptions = {
    series: sub_data, // Example data: Number of active subscribers for each subscription level
    labels: sub_labels, // Subscription level labels
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
          width: 100
        },
        legend: {
          position: 'bottom'
        }
      }
    }]
  };
  
  const activeSubscribersPieChart = new ApexCharts(document.querySelector("#pie-chart"), activeSubscribersPieChartOptions);
  activeSubscribersPieChart.render();
  

  
  