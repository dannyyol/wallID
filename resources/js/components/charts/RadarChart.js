import { Radar, mixins} from 'vue-chartjs'
const { reactiveProp } = mixins;

export default {
  extends: Radar,
  props: ['chartData', 'options'],
  mixins: [reactiveProp],
  mounted () {
    this.renderChart(this.chartData, this.options)
  }
}