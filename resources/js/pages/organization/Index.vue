<template>
    <div>

    	<div style="padding-bottom: 30px; padding-top: 20px;">
    		<section class="welcome-screen mb-4">
		        <div class="container-fluid">
		            <div class="row">
		              <div class="col-md-1"></div>
		                <div class="col-md-7">
		                    <h1>Hi, 
		                    	<span v-if="user">
		                    		{{ user.profile.details.name }}
		                    	</span>
		                  	</h1>
		                    <p>Get Our Mobile App</p>
		                    <div class="btn-div">
		                      <a href="#"><img src="/images/btn-app-store.svg" alt="App Store"></a>
		                      <a href="#"><img src="/images/btn-google-playstore.svg" alt="Google Play Store"></a>
		                    </div>
		                </div>
		                <div class="col-md-4">
		                    <img src="/images/mobile.png" alt="Mobile app">
		                </div>
		            </div>
		        </div>
		    </section>
    	</div>

      <div class="row">

        <div class="col-md-4 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Members</p>
                  <p class="fs-30 mb-2">0</p>
                  
                </div>
              </div>
            </div>

            <div class="col-md-4 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Active Subscriptions</p>
                  <p class="fs-30 mb-2">0</p>
                  
                </div>
              </div>
            </div>

            <div class="col-md-4 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Events</p>
                  <p class="fs-30 mb-2">0</p>
                  
                </div>
              </div>
            </div>
    </div>

    <div class="row">
    	<div class="col-md-4 grid-margin stretch-card">
    		<div class="card">
    			<div class="card-body">
    				<pie-chart :chartData="chartData" :height="250"></pie-chart>
    			</div>
    		</div>
    	</div>

    	<div class="col-md-8 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                <p class="card-title mb-0">Latest Membership Requests</p>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      	<thead>
                        	<tr>
                          		<th>Name</th>
                          		<th>Email</th>
                          		<th>Phone</th>
                          		<th>Action</th>
                        	</tr>  
                      </thead>
                      <tbody>
                           <tr>
	                           	<td>Tobi</td>
	                           	<td>tobs@yahoo.boy</td>
	                           	<td>0908765432111</td>
	                           	<td>
	                           		<button class="btn btn-sm btn-success">Approve</button>
	                           		<button class="btn btn-sm btn-danger">Decline</button>
	                           	</td>
                           </tr> 

                           <tr>
	                           	<td>Tobi</td>
	                           	<td>tobs@yahoo.boy</td>
	                           	<td>0908765432111</td>
	                           	<td>
	                           		<button class="btn btn-sm btn-success">Approve</button>
	                           		<button class="btn btn-sm btn-danger">Decline</button>
	                           	</td>
                           </tr> 

                           <tr>
	                           	<td>Tobi</td>
	                           	<td>tobs@yahoo.boy</td>
	                           	<td>0908765432111</td>
	                           	<td>
	                           		<button class="btn btn-sm btn-success">Approve</button>
	                           		<button class="btn btn-sm btn-danger">Decline</button>
	                           	</td>
                           </tr> 

                           <tr>
	                           	<td>Tobi</td>
	                           	<td>tobs@yahoo.boy</td>
	                           	<td>0908765432111</td>
	                           	<td>
	                           		<button class="btn btn-sm btn-success">Approve</button>
	                           		<button class="btn btn-sm btn-danger">Decline</button>
	                           	</td>
                           </tr> 

                           <tr>
	                           	<td>Tobi</td>
	                           	<td>tobs@yahoo.boy</td>
	                           	<td>0908765432111</td>
	                           	<td>
	                           		<button class="btn btn-sm btn-success">Approve</button>
	                           		<button class="btn btn-sm btn-danger">Decline</button>
	                           	</td>
                           </tr> 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </div>
</template>


<script>

	import RadarChart from '../../components/charts/RadarChart.js';
	import PieChart from '../../components/PieChart.js';

	export default {
		components: {
			RadarChart,
			PieChart
		},
		data() {
			return {
				user: null,
				requests: [],
				chartData: null
			}
		},

		methods: {
			fillData () {
		        this.chartData = {
		          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
		          datasets: [
		            {
		              label: 'Members',
		              backgroundColor: '#f87979',
		              data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
		            }, 
		            {
		              label: 'Events',
		              backgroundColor: '#f87979',
		              data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
		            },
		            {
		              label: 'Groups',
		              backgroundColor: '#f87979',
		              data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
		            }
		          ]
		        }
	      },

	      setupChart(users, subs, events, groups) {
	      		this.chartData = {
	      			labels: ['Members', 'Subscriptions', 'Events', 'Groups'],
	      			datasets: [
	      				{
							    data: [
							    	users, 
							    	subs, 
							    	events, groups
							    ],
							    backgroundColor: [
							      'rgb(255, 99, 132)',
							      'rgb(54, 162, 235)',
							      'rgb(255, 205, 86)'
							    ],
						    	hoverOffset: 4
						  	}
						  ]
	      		}
	      	},
		},
		mounted() {
			this.setupChart(20, 40, 50, 70);
			this.user = this.$store.state.user;
		}
	}
</script>

<style>
	 .welcome-screen .container-fluid{
        background-color: #792af0a4;
        padding: 30px 20px;
        border-radius: 30px;
        position: relative;
      }
      .welcome-screen h1{
        color: #000;
        font-weight: bold;
        font-size: 47px;
      }
      .welcome-screen p{
        color: #000;
        font-size: 20px;
        font-weight: bold;
      }
      .welcome-screen .btn-div img{
        width: 160px;
      }
      .welcome-screen .col-md-4 img{
        width: 300px;
        margin-top: -70px;
        margin-bottom: -60px;
      }
      @media (max-width: 767px){
        .welcome-screen .col-md-4 img{
        width: 300px;
        margin-top: 20px;
        margin-bottom: 1px;
      }
     }
</style>