<template>
    <Bar
      id="my-chart-id"
      :options="chartOptions"
      :data="chartData"
    />
  </template>

  <script>
  import { Bar } from 'vue-chartjs'
  import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

  ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

  export default {
    name: 'BarChart',
    components: { Bar },
    data() {
      return {
        chartData: {
		  labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
						label: "This year",
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        backgroundColor: this.getRandomColor(1),
                        borderColor: this.getRandomColor(2),
                        pointBackgroundColor: this.getRandomColor(3),
                        pointBorderColor: this.getRandomColor(4),
						barPercentage: .75,
						categoryPercentage: .5
					}]
        },
        chartOptions: {
          responsive: true,
          maintainAspectRatio: false,
				
        }
      }

    },
    methods: {
		getRandomColor(index) {
			const colors = ["#36a2eb", "#ff8500", "#a03297"];
			return colors[index % colors.length];
		},

		removerDadosChart() {
			const canvas = this.$data._chart;
			if (canvas) {
				// Destruir o gráfico existente
				canvas.destroy();
			}
			return null;
		},
		async carregar() {
			let datasets = [
                        {
                        label: "This year",
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        backgroundColor: this.getRandomColor(index),
                        borderColor: this.getRandomColor(index),
                        pointBackgroundColor: this.getRandomColor(index),
                        pointBorderColor: this.getRandomColor(index),
						barPercentage: .75,
						categoryPercentage: .5
                        }];


		},
	},
  }
  </script>
