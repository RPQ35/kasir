// // Ambil elemen canvas
const ctx = document.getElementById('BarChart').getContext('2d');

// Data untuk chart
const data = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr'],
  datasets: [{
    label: 'Sales 2024',
    data:  [1000, 800, 600, 400],
    backgroundColor: [
      'rgb(255, 99, 133)',
      'rgba(54, 162, 235, 0.7)',
      'rgba(255, 206, 86, 0.7)',
      'rgba(75, 192, 192, 0.7)',
    ],
    borderColor: [
      'rgba(255, 99, 132, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(255, 206, 86, 1)',
      'rgba(75, 192, 192, 1)',
    ],
    borderWidth: 1
  }]
};

// Konfigurasi chart

// const config = {
//   type: 'bar',
//   data: data,
//   layout: {
//     padding: {
//         top: 20,
//         right: 20,
//         bottom: 20,
//         left: 20,
//     }
//   }
//   options: {
//     indexAxis: 'x',
//     responsive: true,
//     scales: {
//       y: {
//         beginAtZero: true,
//         max: 1000
//         }
//       }
//     }
//   };


const config = {
  type: 'bar',
  data: data,
  options: {
      responsive: true,
      maintainAspectRatio: false, // Memungkinkan tinggi disesuaikan
      plugins: {
          legend: {
              display: false
          },
          title: {
              display: true,
              text: 'Sales 2024',
              font: {
                  size: 18,
                  weight: 'bold'
              },
              padding: {
                  top: 10,
                  bottom: 30
              }
          }
      },
      scales: {
          y: {
              beginAtZero: true,
              max: 1200, // Skala maksimum diperbesar
              ticks: {
                  stepSize: 200,
                  callback: function(value) {
                      return value === 0 ? '0' : value;
                  }
              },
              grid: {
                  color: 'rgba(0, 0, 0, 0.1)'
              },
              title: {
                  display: true,
                  text: 'Amount',
                  font: {
                      weight: 'bold'
                  }
              }
          },
          x: {
              grid: {
                  display: false
              },
              title: {
                  display: true,
                  text: 'Month',
                  font: {
                      weight: 'bold'
                  }
              }
          }
      },
      layout: {
          padding: {
              top: 1,
              right: 20,
              bottom: 20,
              left: 20
          }
      }
  }
};

// Buat chart
const myChart = new Chart(ctx, config);



// Data dari gambar
// const data = {
//   labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
//   datasets: [{
//     label: 'Sales 2024',
//     data: [100, 80, 60, 40, 20, 0],
//     backgroundColor: 'rgba(75, 192, 192, 0.7)',
//     borderColor: 'rgba(75, 192, 192, 1)',
//     borderWidth: 1
//   }]
// };

// // Konfigurasi chart terbalik
// const config = {
//   type: 'bar',
//   data: data,
//   options: {
//     indexAxis: 'y', // Membuat chart horizontal (vertikal ke bawah)
//     scales: {
//       x: {
//         beginAtZero: true,
//         max: 100
//       }
//     },
//     responsive: true,
//     plugins: {
//       legend: {
//         display: true,
//         position: 'top'
//       }
//     }
//   }
// };

// // Buat chart
// new Chart(
//   document.getElementById('BarChart'),
//   config
// );
