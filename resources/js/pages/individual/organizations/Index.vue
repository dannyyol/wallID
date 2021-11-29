<template>
	<div>
		<div class="card mb-4">
			<div class="card-body">
				<p class="card-title">
					<span>Send Request</span><br>
					<span class="text-muted small">
						Send a request to an Organization to become one its member
					</span>
				</p>

				<form class="form-row" @submit.prevent="checkOrg" @keydown="form.onKeydown($event)">
					<div class="col-md-8">
						<label>Name</label>
						<input type="text" required class="form-control" v-model="form.name" placeholder="Organization Name">
					</div>
					<div class="col-md-4 d-flex align-items-end">
						<button class="btn btn-primary">Check</button>
					</div>
				</form>
			</div>
		</div>

		<div class="card border-0" style="border-radius: 16px;">
			<div class="card-body">
				<p class="card-title font-weight-bold">My Organizations</p>
				<div class="table-responsive">
					<table class="table table-striped table-borderless">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Date Joined</th>
								<th>Status</th>
							</tr>
						</thead>

						<tbody>
							<tr v-if="organizations.length == 0">
								<td colspan="5">
									<p class="text-center">No Record Found</p>
								</td>
							</tr>

							<tr v-for="(row, index) in organizations" :key="row.id">
								<td>{{ index + 1 }}</td>
								<td>{{ row.organization.name }}</td>
								<td>{{ row.organization.phone }}</td>
								<td>{{ row.created_at | moment("from", "now", true) }} ago</td>
								<td>
									<span v-if="row.status == 'pending'" class="bg-warning py-1 px-2 text-white">
										Pending
									</span>
									<span v-if="row.status == 'approved'" class="bg-success py-1 px-2 text-white" style="border-radius: 5px">
										Approved
									</span>
									<span v-if="row.status == 'suspended'" class="bg-danger py-1 px-2 text-white">
										Suspended
									</span>
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
		name: 'UserOrganizations',

		data() {
			return {
				form: new Form({
					name: ''
				}),

				organizations: [],

				status: null,
				baseUrl: '/api/individuals/organizations'
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
				this.$spinner.show();
				let url = (this.status) ? this.baseUrl + '/' + this.status : this.baseUrl;

				axios.get(url + '?page=' + page)
					.then(response => {
						console.log(response);
						this.organizations = response.data.data;
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

			checkOrg() {

				this.$spinner.show();
				this.form.post('/api/individuals/organizations')
					.then(response => {
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
			this.loadOrganizations();
		}
	}
</script>