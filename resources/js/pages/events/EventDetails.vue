<template>
	<div>
		
		<div class="card border-0 mb-4" style="border-radius: 16px;">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<p class="">
							<span class="small text-muted">Title</span> <br>
							<b>{{event.name}}</b>
						</p>
						<p>
							<span class="small text-muted">Event Date</span> <br>
						 	<b>{{event.event_date}}</b>
						 </p>
						<p>
							<span class="small text-muted">Purchased Tickets</span> <br>
							<b>{{event.tickets.length}}</b>	
						</p>
					</div>

					<div class="col-md-6">
						<!-- <qrcode-vue :value="value" :size="size" level="H" /> -->
					</div>
				</div>
			</div>
		</div>


		<div class="card border-0 mb-4" style="border-radius: 16px;">
			<div class="card-body">
				<p class="card-title">
					<span class="float-left"><strong>Ticket Buyers</strong></span>
					<div class="dropdown float-right">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" :href="'/api/admin/company-export-to-pdf'">PDF</a>
                            <a class="dropdown-item" :href="'/api/admin/company-export-to-excel'">Excel</a>
                        </div>
                    </div>
				</p>
				
				<div class="table-responsive">
					<table class="table table-striped table-borderless">
						<thead>
							<tr>
								<th>#</th>
								<th>Fullname</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>
							<tr v-if="event.attendees.length == 0">
								<td colspan="6">
									<p class="text-center">
										No Record Found!
									</p>
								</td>
							</tr>

							<tr v-for="(row, index) in event.attendees" :key="row.id">
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="card border-0" style="border-radius: 16px;">
			<div class="card-body">
				<p class="card-title">
					<span class="float-left"><strong>Attendees</strong></span>
					<div class="dropdown float-right">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" :href="'/api/admin/company-export-to-pdf'">PDF</a>
                            <a class="dropdown-item" :href="'/api/admin/company-export-to-excel'">Excel</a>
                        </div>
                    </div>
				</p>
				
				<div class="table-responsive">
					<table class="table table-striped table-borderless">
						<thead>
							<tr>
								<th>#</th>
								<th>Fullname</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>
							<tr v-if="event.attendees.length == 0">
								<td colspan="6">
									<p class="text-center">
										No Record Found!
									</p>
								</td>
							</tr>

							<tr v-for="(row, index) in event.attendees" :key="row.id">
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		name: 'EventDetails',
		components: {
			
		},
		data() {
			return {
				event: {},
				value: 'https://example.com',
        		size: 300,
			}
		},

		methods: {
			getEvent(id) {
				this.$spinner.show();
				axios.get('/api/events/' + id)
					.then(response => {
						this.event = response.data.data;
						this.$notify({
							title: 'success',
							text: response.data.message
						})

						console.log(response);
					})
					.catch(e => {
						this.$notify({
							title: 'Error',
							text: e.message
						})
					})
					.finally(e => {
						this.$spinner.hide();
					})
			}
		},

		mounted() {
			this.getEvent(this.$route.params.id);
		}
	}
</script>