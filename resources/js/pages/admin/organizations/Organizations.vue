<template>
	<div>
		
		<div class="col-lg-12 grid-margin stretch-card px-0">

	        <div class="card">
	            <div class="card-body">
	                <div class="row">
	                    <div class="col-6">
	                        <h4 class="card-title">{{type}} Organizations</h4>
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
	                                <th>Number of employee</th>
	                                <th>Date Created</th>
	                                <th>Status</th>
	                                <th>Actions</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<tr v-if="organizations.length == 0">
	                        		<td colspan="5">
	                        			<p class="text-center">
	                        				No Record Found
	                        			</p>
	                        		</td>
	                        	</tr>

	                            <tr v-for="(row, index) in organizations" :key="row.id">
	                                <td class="ro">{{ index + 1 }}</td>

	                                <td>
	                                    {{row.name}}
	                                </td>
	                                
	                                <td class="ro">{{ row.employees }}</td>

	                               
	                                <td class="ro">
	                                    {{ row.created_at | moment("from", "now", true) }} ago
	                                </td>

	                                <td class="ro">
	                                    {{ (row.status == 1) ? 'Active' : 'Suspended' }}
	                                </td>

	                                <td>
	                                    <button v-if="row.status == 1" type="button" class="btn btn-danger btn-sm" @click="confirmAction('Suspend', row.id)">
	                                        Suspend
	                                    </button>


	                                    <button v-if="row.status == 0" type="button" class="btn btn-success btn-sm" @click="confirmAction('Activate', row.id)">
	                                        Activate
	                                    </button>
	                                </td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	            <div class="m-auto">
	                <pagination :data="pagination" @pagination-change-page="loadOrganizations" page="1"></pagination>
	            </div>
	        </div>
	    </div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				type: 'All',
				organizations: [],
				pagination: {},

				status: null,
				baseUrl: '/api/admin/organizations'
			}
		},

		watch:{
	   	 	$route (to, from) {
		    	if (to.params.status != this.status) {
		    		this.status = to.params.status;
		    		this.loadOrganizations();
		    	}
		    }
		},

		methods: {

			loadOrganizations(page = 1) {

				let url = (this.status) ? this.baseUrl + '/' + this.status : this.baseUrl;
				this.$spinner.show();
				axios.get(url + '?page=' + page)
					.then(response => {
						this.organizations = response.data.data;
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
					message: `Are you sure you want to ${status} this Organization?`,
					button: {
						no: 'No',
						yes: 'Yes'
					},
					callback: (confirm) => {
						if(confirm) {
							let st = (status == 'Activate') ? 1 : 0;
							this.doAction(id, st);
						}
					}
				})
			},

			doAction(id, status) {
				this.$spinner.show();
				axios.get('/api/admin/organizations/' + id + '/' + status)
		    		.then(response => {
		    			for (var i = 0; i < this.organizations.length; i++) {
		    				if (this.organizations[i].id == id) {
		    					this.organizations[i] = response.data.data;
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
			this.loadOrganizations();
		}
	}
</script>