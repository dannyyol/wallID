<template>
	<div>

		 <modal name="share-modal" :adaptive="true" :height="400">
        	<div class="card h-100">
        		<div class="card-body">
        			<p class="card-title">
        				Event Details: 
        			</p>

        			<p>
        				Name: <b>{{event.name}}</b>
        			</p>

        			<p>
        				Date: <b>{{event.event_date}}</b>
        			</p>

        			<p>
        				Description: <br>
        				{{event.description}}
        			</p>
        		</div>
        		<div class="card-footer text-right">
        			<button class="btn btn-primary px-3" v-if="$auth.type != 'individual'" @click="share">Share with Member</button>
        			<!-- <button class="btn btn-primary px-3 d-none">Share with Special Group</button> -->
        		</div>
        	</div>
    	</modal>

		<div class="card border-0" style="border-radius: 16px;">
			<div class="card-body">
				<p class="card-title mb-0">
					<span class="float-left">My Events</span>
					<div class="dropdown float-right">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" :href="'/api/events/company-export-to-pdf'">PDF</a>
                            <a class="dropdown-item" :href="'/api/events/export'">Excel</a>
                        </div>
                    </div>
				</p>

				<div class="table-responsive">
					<table class="table table-striped table-borderless">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Type</th>
								<th>Tickets</th>
								<th>Date</th>
								<th>Period</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>
							<tr v-if="events.length == 0">
								<td colspan="8">
									<p class="text-center">
										No Events Found!
									</p>
								</td>
							</tr>

							<tr v-for="(row, index) in events" :key="row.id">
								<td>
									{{ row.unique_id }}
								</td>

								<td>
									{{row.name}}
								</td>

								<td>
									{{row.type}}
								</td>

								<td>
									{{row.tickets}}
								</td>

								<td>
									{{row.event_date}}
								</td>

								<td>
									N/A
								</td>

								<td>
									{{row.status}}
								</td>

								<td>

									<router-link :to="$route.path + '/' + row.id + '/edit'" type="button" class="btn btn-info btn-sm"> 
										<i class="fas fa-pencil-alt"></i> 
									</router-link>

									<a @click="confirmShare(row)" class="btn btn-sm btn-success">
										<i class="fas fa-share"></i> 
									</a>

									<router-link :to="$route.path + '/' + row.id" title="Details" class="btn btn-primary btn-sm"> 
										<i class="fas fa-file" aria-hidden="true"></i>
									</router-link>

									<button class="btn btn-danger btn-sm" @click="confirmDelete(row.id)">
										<i class="fas fa-trash-alt"></i>
									</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<pagination :data="pagination" @pagination-change-page="loadEvents" page="1"></pagination>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		data() {
			return {
				event: {},
				loading: true,
				events: [],
				pagination: {},
			}
		},
		
		methods: {
			loadEvents(page = 1) {

				this.$spinner.show();
				axios.get('/api/events/mine?page=' + page)
					.then(response => {
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
					});
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
				axios.delete('/api/events/' + id)
		    		.then(response => {
		    			this.events = this.events.filter(event => event.id != id);
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
			},

			confirmClose(id) {
				Swal.fire({
				  	html: 'Are you sure you want to Close this Event?',
				  	icon: 'warning',
				  	showCancelButton: true,
				  	confirmButtonText: 'Yes',
				}).then((result) => {
				 
				  if (result.isConfirmed) {
				    	axios.get('/api/events/close/' + id)
				    		.then(response => {
				    			
				    			for (var i = 0; i < this.events.length; i++) {
				    				const event = this.events[i];
				    				if (event.id == id) {
				    					event.status = 'closed';
				    					this.events[i] = event;
				    				}
				    			}

				    			swal(response.data.message);
				    		})
				    		.catch(e => {
				    			swal(e.message, 'error');
				    		})
				  }
				})
			},

			confirmShare(event) {

				this.event = event;
				this.$confirm({
					message: 'Are you sure you want to share this Event?',
					button: {
						no: 'No',
						yes: 'Yes'
					},
					callback: (confirm) => {
						if(confirm) {
							this.$modal.show('share-modal');
						}
					}
				})
			},

			share() {
				this.$modal.hide('share-modal');
				this.$spinner.show();
				axios.get('/api/events/' + this.event.id + '/share')
					.then(response => {
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
			}
		},

		mounted() {
			this.loadEvents(1);
		}
	}
</script>