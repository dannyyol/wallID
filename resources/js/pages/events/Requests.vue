<template>
	<div>
		<div class="card mb-4">
			<div class="card-body">
				<p class="card-title">Request Status</p>
				<form class="" @submit.prevent="getRequests()" @keydown="form.onKeydown($event)">
					<div class="row mb-4">
						<div class="col-md-10">
							<select class="form-control" required v-model="form.event_id">
								<option value="">Select Event</option>
								<option v-for="event in events" :value="event.unique_id" :key="event.id">
									{{event.name}}
								</option>
							</select>
						</div>

						<div class="col-md-2">
							<button class="btn btn-primary px-5">Fetch</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Event Requests</h4>
				<div class="table-responsive">
					<table class="table table-striped table-borderless">
						<thead>
							<tr>
								<th>#</th>
								<th>Event Title</th>
								<th>Invitee Name</th>
								<th>Invitee Email</th>
								<th>Invitation Status</th>
							</tr>
						</thead>
						<tbody>
							<tr v-if="invitations.length == 0">
								<td colspan="5">
									<p class="text-center">No Record Found</p>
								</td>
							</tr>

							<tr v-for="(row, index) in invitations" :key="row.id">
								<td>
									{{index + 1}}
								</td>
								<td>
									{{row.event.name}}
								</td>
								
								<td v-if="row.user.type == 'individual'">
									{{ row.user.details.firstname + ' ' + row.user.details.lastname }}
								</td>

								<td v-if="row.user.type == 'organization'">
									{{ row.user.details.name }}
								</td>

								<td>
									{{row.user.email}}
								</td>

								<td>
									<span v-if="row.status == 'pending'" class="p-2 bg-info rounded text-white">
										Pending
									</span>

									<span v-if="row.status == 'approved'" class="p-2 bg-sucess rounded text-white">
										Accepted
									</span>

									<span v-if="row.status == 'declined'" class="p-2 bg-warning rounded text-white">
										Declined
									</span>
								</td>
								<td>
									
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<pagination :data="pagination" @pagination-change-page="getRequests" page="1"></pagination>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'EventRequest',
		data() {
			return {

				events: [],
				pagination: {},
				invitations: [],

				form: new Form({
					event_id: '',
					username: ''
				}),
			}
		},
		computed: {
			url: () => {
				return 'event-info';
			}
		},
		methods: {
			getRequests(page = 1) {

				this.$spinner.show();
				axios.get(`/api/events/${this.form.event_id}/requests?page=${page}`)
					.then(response => {
						
						console.log('Data', response);

						this.$notify({
							type: (response.data.status) ? 'success' : 'warn',
							text: response.data.message
						})

						this.prepPagination(response.data);
						this.invitations = response.data.data;
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

			loadAllEvents() {
				this.$spinner.show();
				axios.get('/api/events/all')
					.then(response => {
						this.events = response.data.data;
						this.$notify({
							type: (response.data.status) ? 'success' : 'warn',
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
			this.loadAllEvents();
		}
	}
</script>