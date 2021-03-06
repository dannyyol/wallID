import { Doughnut, mixins} from 'vue-chartjs'
const { reactiveProp } = mixins;

export default {
  extends: Doughnut,
  props: ['chartData', 'options'],
  mixins: [reactiveProp],
  mounted () {
    this.renderChart(this.chartData, this.options)
  }
}