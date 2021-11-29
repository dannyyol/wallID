<template>
	<div>
		
	    <div class="col-lg-12 grid-margin stretch-card px-0">

	        <div class="card">
	            <div class="card-body">
	                <div class="row">
	                    <div class="col-6">
	                        <h4 class="card-title">All Events</h4>
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
	                                <th>Creator Name</th>
	                                <th>Creator Email</th>
	                                <th>Free</th>
	                                <th>Price</th>
	                                <th>Tickets</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<tr v-if="events.length == 0">
	                        		<td colspan="5">
	                        			<p class="text-center">
	                        				No Record Found
	                        			</p>
	                        		</td>
	                        	</tr>

	                           <tr v-for="(row, index) in events" :key="row.id">
	                           		<td>{{ index + 1}}</td>
	                           		<td>{{ row.name }}</td>
	                           		<td>{{ row.user.firstname + ' ' + row.user.lastname }}</td>
	                           		<td>{{ row.user.email }}</td>
	                           		<td>{{ row.isFree ? 'Yes' : 'No'}}</td>
	                           		<td>{{ row.price }}</td>
	                           		<td>{{ row.tickets }}</td>
	                           </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	            <div class="m-auto">
	                <pagination :data="pagination" @pagination-change-page="loadEvents" page="1"></pagination>
	            </div>
	        </div>
	    </div>
	</div>
</template>


<script>
	export default {
		data() {
			return {

				events: [],
				pagination: {},
				baseUrl: '/api/admin/events'
			}
		},

		methods: {

			loadEvents(page = 1) {

				this.$spinner.show();
				axios.get(this.baseUrl + '?page=' + page)
					.then(response => {
						console.log(response);
						this.events = response.data.data;
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
			}
		},

		mounted() {
			this.loadEvents();
		}
	}
</script>