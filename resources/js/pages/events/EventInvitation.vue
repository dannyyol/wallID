<template>
	<div>
		<div class="card mb-4">
			<div class="card-body">
				<p class="card-title">Send Invitation</p>
				<form class="" @submit.prevent="sendInvite" @keydown="form.onKeydown($event)">
					<div class="row mb-4">
						<div class="col-md-6">
							<label>Event ID</label>
							<input type="text" class="form-control" v-model="form.event_id" placeholder="Event ID">
						</div>

						<div class="col-md-6">
							<label>Username</label>
							<input type="text" class="form-control" v-model="form.username" placeholder="Username">
						</div>
					</div>
					<div class="text-right">
						<button class="btn btn-primary px-5">Send</button>
					</div>
				</form>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<h4 class="card-title">My Invitations</h4>
				<div class="table-responsive">
					<table class="table table-striped table-borderless">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Date</th>
								<th>Is Free</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(row, index) in invitations" :key="row.id">
								<td>
									{{index + 1}}
								</td>
								<td>
									{{row.event.name}}
								</td>
								<td>
									{{row.event.event_date}}
								</td>
								<td>
									{{ (row.event.isFree) ? 'Yes' : 'No'}}
								</td>
								<td>
									<button class="btn btn-danger btn-sm" @click="decline(row.id)" v-if="row.status == 'pending'">
										Decline
									</button>

									<router-link :to="row.event.id + '/info'" title="Details" class="btn btn-info btn-sm">
										View Details
									</router-link>
								</td>
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
		name: 'EventInvitation',
		data() {
			return {

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
			getRequests() {
				this.$spinner.show();
				axios.get(`/api/events/invites`)
					.then(response => {
						this.invitations = response.data.data;
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

			sendInvite() {
				
				this.$spinner.show();
				this.form.post('/api/events/invite')
					.then(response => {
						this.$notify({
							type: (response.data.status) ? 'success' : 'warn',
							text: response.data.message
						})

						if (response.data.status) {
							this.form.reset();
						}
					})
					.catch(e => {
						this.$notify({
							type: 'error',
							message: e.message
						})
					})
					.finally(() => {
						this.$spinner.hide();
					})
			},

			decline(id) {
				this.$confirm({
					message: 'Decline Invitation?',
					button: {
						no: 'No',
						yes: 'Yes'
					},
					callback: (confirm) => {
						if(confirm) {
							this.doDeline(id);
						}
					}
				})
			},

			doDeline(id) {
				this.$spinner.show();
				axios.get('/api/events/requests/' + id + '/declined')
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
			},
		},
		mounted() {
			this.getRequests();
		}
	}
</script>