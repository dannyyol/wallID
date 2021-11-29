<template>
	<div>
		
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Welcome </h3>
              <h6 class="font-weight-normal mb-0">
                You have {{notifications.length}} unread notifications!</span>
              </h6>
            </div>
            <div class="col-12 col-xl-4 d-none">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                 <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="#">January - March</a>
                  <a class="dropdown-item" href="#">March - June</a>
                  <a class="dropdown-item" href="#">June - August</a>
                  <a class="dropdown-item" href="#">August - November</a>
                </div>
              </div>
             </div>
            </div>
          </div>
        </div>
      	</div>

      	<div class="row mb-4">
	      	<div class="col-md-3 mb-4 mb-lg-0 stretch-card transparent">
	          <div class="card card-tale">
	            <div class="card-body">
	              <p class="mb-4">Total Users</p>
	              <p class="fs-30 mb-2">{{info.users}}</p>
	              <!-- <p>10.00% (30 days)</p> -->
	            </div>
	          </div>
	        </div>

	        <div class="col-md-3 mb-4 mb-lg-0 stretch-card transparent">
	          <div class="card card-dark-blue">
	            <div class="card-body">
	              <p class="mb-4">Total Groups</p>
	              <p class="fs-30 mb-2">{{info.groups}}</p>
	            </div>
	          </div>
	        </div>

	        <div class="col-md-3 mb-4 mb-lg-0 stretch-card transparent">
	          <div class="card card-light-blue">
	            <div class="card-body">
	              <p class="mb-4">Total Organizations</p>
	              <p class="fs-30 mb-2">{{info.organizations}}</p>
	            </div>
	          </div>
	        </div>

	        <div class="col-md-3 mb-4 mb-lg-0 stretch-card transparent">
	          <div class="card card-light-danger">
	            <div class="card-body">
	              <p class="mb-4">Number of Events</p>
	              <p class="fs-30 mb-2">{{info.events}}</p>
	            </div>
	          </div>
	        </div>
    	</div>

    	<div class="row mb-4">
	    	<div class="col-md-6 mb-4">
	    		<bar-chart :chartData="chartData" :height="200"></bar-chart>
	    	</div>

	    	<div class="col-md-6 mb-4">
	    		<pie-chart :chartData="chartData" :height="200"></pie-chart>
	    	</div>
	    </div>

	    <div class="col-lg-12 grid-margin stretch-card px-0">

	        <div class="card">
	            <div class="card-body">
	                <div class="row">
	                    <div class="col-6">
	                        <h4 class="card-title">Latest Users</h4>
	                    </div>
	                    <div class="col-6">
	                        <div class="dropdown float-right">
	                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                Export
	                            </button>
	                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	                                <a class="dropdown-item" :href="'/api/admin/new-customer-export-to-pdf'">PDF</a>
	                                <a class="dropdown-item" :href="'/api/admin/new-customer-export-to-excel'">Excel</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="table-responsive">
	                    <table class="table table-hover">
	                        <thead>
	                            <tr>
	                                <th class="heading">S/N</th>
	                                <th class="heading">Name</th>
	                                <th class="heading">Email</th>
	                                <th class="heading">Date Created</th>
	                                <th>Actions</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <tr v-for="(u, index) in users" :key="u.id">
	                                <td class="ro">{{ index + 1 }}</td>

	                                <td class="text-primary ro" style="cursor:pointer" data-toggle="modal" :data-target="'#detail-'+u.id">
	                                    {{u.firstname + " " + u.lastname}}
	                                </td>
	                                
	                                <td class="ro">{{ u.email }}</td>

	                               
	                                <td class="ro">
	                                    {{ u.created_at | moment("from", "now", true) }} ago
	                                </td>
	                               

	                                <td>
	                                    <button type="button" class="btn btn-danger btn-sm" @click="confirmDelete(u.id)">
	                                        <i class="fas fa-trash-alt"></i>
	                                    </button>
	                                </td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	            <div class="m-auto">
	                <!-- <pagination :data="users" @pagination-change-page="loadUsers" page="1"></pagination> -->
	            </div>
	        </div>
	    </div>

	</div>
</template>

<script>

	import BarChart from '../../components/BarChart.js';
	import PieChart from '../../components/PieChart.js';

	export default {
		components: {
			BarChart,
			PieChart
		},

		data() {
			return {
				users: {},
				info: {},
	            status: [{}],

	            loading: false,
	            pending_transactions: [],
	            completed_transactions: [],
	            cancelled_transactions: [],
	            users: [],
	            notifications: [],

	            chartData: null,
			}
		},

		methods: {

	      	setupChart(users, organizations, events, groups) {
	      		this.chartData = {
	      			labels: ['Users', 'Organizations', 'Events', 'Groups'],
	      			datasets: [
	      				{
							    data: [
							    	users, 
							    	organizations, 
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

	      	loadDetails() {
	      		this.$spinner.show();
	      		axios.get('/api/admin')
	      			.then(response => {
	      				this.populate(response.data.data);
	      				this.$notify({
	      					type: 'success',
	      					text: response.data.message
	      				})
	      			})
	      			.catch(e => {
	      				this.$notify({
	      					type: 'error',
	      					text: e.message
	      				})
	      			})
	      			.finally(() => {
	      				this.$spinner.hide();
	      			})
	      	},

	      	populate(data) {

	      		this.setupChart(data.totalUsers, data.totalOrgs, data.totalEvents, data.totalGroups);

	      		this.info = {
	      			users: data.totalUsers,
	      			groups: data.totalGroups,
	      			events: data.totalEvents,
	      			organizations: data.totalOrgs
	      		}
	      		this.users = data.users
	      	},

	      	confirmDelete(id) {

				this.$confirm({
					message: 'Are you sure you want to delete this Event?',
					button: {
						no: 'No',
						yes: 'Yes'
					},
					callback: (confirm) => {
						if(confirm) {
							this.doDelete(id);
						}
					}
				})
			},

			doDelete(id) {
				this.$spinner.show();
				axios.delete('/api/admin/users/' + id)
		    		.then(response => {
		    			this.users = this.users.filter(u => u.id != id);
		    			this.$notify({
		    				type: 'success',
		    				text: response.data.message
		    			});
		    		})
		    		.catch(e => {
		    			this.$notify({
		    				type: 'error',
		    				text: e.message
		    			})
		    		})
		    		.finally(() => {
		    			this.$spinner.hide();
		    		})
			}
		},

		mounted() {
			this.loadDetails();
		}
	}
</script>