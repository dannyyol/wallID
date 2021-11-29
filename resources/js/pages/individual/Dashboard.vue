<template>
	<div>
		<h4 class="h3 mb-4">Welcome
			<span v-if="user && user.profile" class="font-weight-bold">
				{{ user.profile.details.firstname + ' ' + user.profile.details.lastname }}
			</span>
		</h4>

		<div class="row">
			<div class="col-md-9 mb-4">
				<div class="row mb-4">
					<div class="col-md-6 mb-4">
						<div class="card" style="">
							<div class="card-body">
								<p>
									<i class="fas fa-users text-primary" style="font-size: 30px;"></i>
									<span style="float: right; font-weight: bold;">
										{{dashdata.totalOrgs}}
									</span>
								</p>
								<p>
									<span>Organizations</span>
								</p>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="card" style="">
							<div class="card-body">
								<p>
									<i class="fas fa-calendar text-primary" style="font-size: 30px;"></i>
									<span style="float: right; font-weight: bold;">
										{{dashdata.totalEvents}}
									</span>
								</p>
								<p>
									<span >Events</span>
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<p class="card-title">Pending Approval</p>
						<div class="table-responsive">
							<table class="table table-striped table-borderless">
								<thead>
									<tr>
										<th>Organization Name</th>
										<th>Organization Email</th>
										<th>Approval Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr v-if="dashdata.organizations.length == 0">
										<td colspan="5">
											<p class="text-center">No Record Found</p>
										</td>
									</tr>

									<tr v-for="(row, index) in dashdata.organizations" :key="row.id">
										<td>{{ index + 1 }}</td>
										<td>{{ row.organization.name }}</td>
										<td>{{ row.organization.phone }}</td>
										<td>{{ row.created_at | moment("from", "now", true) }} ago</td>
										<td>
											<button class="btn btn-danger">
												Delete
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card mb-4">
					<div class="card-body">
						<h4 class="card-title">Upcoming Event</h4>
						<p>
							<span class="small text-muted">Title</span> <br>
							<span>Tech Talk</span>
						</p>

						<p>
							<span class="small text-muted">Date</span> <br>
							<span>20/10/2021</span>
						</p>
						<p>
							<span class="small text-muted">Description</span> <br>
							<span>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua.
							</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'IndividualDashboard',
		data() {
			return {
				user: null,
				dashdata: {
					totalOrgs: 0,
					totalEvents: 0,
					organizations: []
				}
			}
		},

		methods: {

			loadDashData() {

				this.$spinner.show();
				axios.get('/api/individuals')
					.then(response => {
						this.dashdata = response.data.data
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
			this.user = this.$store.state.user;
			this.loadDashData();
		}
	}
</script>