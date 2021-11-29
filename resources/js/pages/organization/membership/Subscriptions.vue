<template>
	<div>

		<!-- <nav aria-label="breadcrumb">
		  	<ol class="breadcrumb bg-white">
		    	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		    	<li class="breadcrumb-item"><a href="#">Members</a></li>
		    	<li class="breadcrumb-item active" aria-current="page">Subscriptions</li>
		  	</ol>
		</nav> -->

		<div class="card border-0" style="border-radius: 16px;">
			<div class="card-body">
				<p class="card-title font-weight-bold">Membership Subscriptions</p>
				<div class="table-responsive">
					<table class="table table-striped table-borderless">
						<thead>
							<tr>
								<th>#</th>
								<th>User Name</th>
								<th>User Email</th>
								<th>Category</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							<tr v-if="subscriptions.length == 0">
								<td colspan="6">
									<p class="text-center">
										No Record Found!
									</p>
								</td>
							</tr>

							<tr v-for="(row, index) in subscriptions" :key="row.id">
								<td>
									{{index + 1}}
								</td>

								<td>
									{{row.user.firstname}} {{row.user.lastname}}
								</td>

								<td>
									{{row.user.email}}
								</td>

								<td>
									{{ row.created_at | moment('Y-m-d') }}
								</td>

								<td>
									<a href="#" v-if="row.status == 'pending'" class="btn btn-sm btn-info" @click="approve(row.id)">
										Approve
									</a>
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
				subscriptions: []
			}
		},

		methods: {
			loadSubscriptions() {
				this.$spinner.show();
				axios.get('/api/organizations/subscriptions')
					.then(response => {
						console.log(response);
						this.$notify({
							type: 'success',
							text: response.data.message
						});

						this.subscriptions = response.data.data;
					})
					.catch(e => {
						console.log('Error', e);
						this.$notify({
							type: 'error',
							text: e.message
						})
					})
					.finally(() => {
						this.$spinner.hide();
					})
			},

			approve(userid) {

				this.$confirm({
					message: 'Approve Membership Request?',
					button: {
						no: 'No',
						yes: 'Yes'
					},
					callback: (confirm) => {
						if(confirm) {
							this.doApprove(userid);
						}
					}
				})
			},
		},

		mounted() {
			this.loadSubscriptions();
		}
	}
</script>