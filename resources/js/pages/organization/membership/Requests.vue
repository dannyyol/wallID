<template>
	<div>

		
		<div class="card border-0" style="border-radius: 16px;">
			<div class="card-body">
		
				<p class="card-title font-weight-bold">Current Members</p>
				<div class="table-responsive">
					<table class="table table-striped table-borderless">
						<thead>
							<tr>
								<th>#</th>
								<th>Firstname</th>
								<th>Surname</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Date Joined</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							<tr v-if="members.length == 0">
								<td colspan="7">
									<p class="text-center">
										No Record Found!
									</p>
								</td>
							</tr>

							<tr v-for="(row, index) in members" :key="row.id">
								<td>
									{{index + 1}}
								</td>

								<td>
									{{ row.individual.firstname }}
								</td>

								<td>
									{{ row.individual.lastname}}
								</td>

								<td>
									{{ row.individual.phone }}
								</td>

								<td>
									{{ row.individual.user.email }}
								</td>

								
								<td>
									{{ row.created_at | moment("from", "now", true) }} ago
								</td>

								<td>
									<a href="#" class="btn btn-sm btn-info" @click="approve(row.id)">
										Approve
									</a>
									
									<router-link :to="'/organization/members/' + row.id " class="btn btn-info btn-sm"> 
										View
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
		data() {
			return {
				members: []
			}
		},

		methods: {
			loadRequests() {
				axios.get('/api/organizations/members/requests')
					.then(response => {
						this.members = response.data.data;
					})
					.catch(e => {
						this.$notify({
							text: e.message
						})
					})
			},

			approve(memberid) {

				this.$confirm({
					message: 'Approve Membership Request?',
					button: {
						no: 'No',
						yes: 'Yes'
					},
					callback: (confirm) => {
						if(confirm) {
							this.doApprove(memberid);
						}
					}
				})
			},

			doApprove(id) {
				this.$spinner.show();
				axios.get('/api/organizations/members/' + id + '/approve')
						.then(response => {
							console.log(response);
							this.$notify({
								type: (response.data.status) ? 'success' : 'warn',
								text: response.data.message
							});
						})
						.catch(e => {
							this.$notify({
								text: e.message
							})
						})
						.finally(() => {
							this.$spinner.hide();
						})
			}
		},

		mounted() {
			this.loadRequests();
		}
	}
</script>