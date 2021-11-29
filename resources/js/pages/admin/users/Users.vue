<template>
	<div>
		
	    <div class="col-lg-12 grid-margin stretch-card px-0">

	        <div class="card">
	            <div class="card-body">
	                <div class="row">
	                    <div class="col-6">
	                        <h4 class="card-title">{{type}} Users</h4>
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
	                                <th>S/N</th>
	                                <th>Name</th>
	                                <th>Email</th>
	                                <th>Date Created</th>
	                                <th>Status</th>
	                                <th>Actions</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<tr v-if="users.length == 0">
	                        		<td colspan="5">
	                        			<p class="text-center">
	                        				No Record Found
	                        			</p>
	                        		</td>
	                        	</tr>

	                            <tr v-for="(u, index) in users" :key="u.id">
	                                <td class="ro">{{ index + 1 }}</td>

	                                <td class="text-primary ro" style="cursor:pointer" data-toggle="modal" :data-target="'#detail-'+u.id">
	                                    {{u.firstname + " " + u.lastname}}
	                                </td>
	                                
	                                <td class="ro">{{ u.email }}</td>

	                               
	                                <td class="ro">
	                                    {{ u.created_at | moment("from", "now", true) }} ago
	                                </td>

	                                <td class="ro">
	                                    {{ u.status }}
	                                </td>

	                                <td>
	                                    <button v-if="u.status == 'active'" type="button" class="btn btn-danger btn-sm" @click="confirmAction('Suspend', u.id)">
	                                        Suspend
	                                    </button>


	                                    <button v-if="u.status == 'suspended'" type="button" class="btn btn-success btn-sm" @click="confirmAction('Activate', u.id)">
	                                        Activate
	                                    </button>
	                                </td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	            <div class="m-auto">
	                <pagination :data="pagination" @pagination-change-page="loadUsers" page="1"></pagination>
	            </div>
	        </div>
	    </div>
	</div>
</template>

<script>
	export default {
		name: 'Users',
		data() {
			return {
				type: 'All',
				users: [],
				pagination: {},

				status: null,
				baseUrl: '/api/admin/users'
			}
		},

		watch:{
		    $route (to, from) {
		    	if (to.params.status) {
		    		this.status = to.params.status;
		    		this.loadUsers();
		    	}
		    }
		},

		methods: {
			loadUsers(page = 1) {

				let url = (this.status) ? this.baseUrl + '/' + this.status : this.baseUrl;

				this.$spinner.show();
				axios.get(url + '?page=' + page)
					.then(response => {
						this.users = response.data.data;
						this.prepPagination(response.data);
					})
					.catch(e => {
						this.$notify({
							type: 'error',
							text: e.message
						});
					})
					.finally(() => {
						this.$spinner.hide();
					})
			},

			prepPagination(data) {
				
				this.pagination = {
					data: data.data,
					current_page: data.meta.current_page,
					first_item: data.meta.first_item,
					last_item: data.meta.last_item,
					last_page: data.meta.last_page,
					next_page_url: data.meta.next_page_url,
					per_page: data.meta.per_page,
					previous_page_url: data.meta.previous_page_url,
					total: data.meta.total
				}
			},


	      	confirmAction(status, id) {

				this.$confirm({
					message: `Are you sure you want to ${status} this User?`,
					button: {
						no: 'No',
						yes: 'Yes'
					},
					callback: (confirm) => {
						if(confirm) {
							let st = (status == 'Activate') ? 'active' : 'suspended';
							this.doAction(id, st);
						}
					}
				})
			},

			doAction(id, status) {
				this.$spinner.show();
				axios.get('/api/admin/users/' + id + '/' + status)
		    		.then(response => {
		    			
		    			console.log(response);

		    			for (var i = 0; i < this.users.length; i++) {
		    				if (this.users[i].id == id) {
		    					this.users[i] = response.data.data;
		    				}
		    			}

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
			this.status = this.$route.params.status;
			this.loadUsers();
		}
	}
</script>