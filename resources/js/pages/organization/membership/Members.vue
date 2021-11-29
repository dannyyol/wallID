<template>
	<div>

		<modal name="member-modal" :adaptive="true" :height="350">
        	<div class="card h-100">
        		<div class="card-body">
        			<p class="card-title">
        				User Information: 
        			</p>

        			<p v-if="user">
        				Fullname: <b>{{user.details.firstname + ' ' + user.details.lastname}}</b>
        			</p>

        			<p v-if="user">
        				Email: <b>{{user.email}}</b>
        			</p>

        			<p class="mb-3" v-if="user">
        				Phone: <b>{{user.details.phone}}</b>
        			</p>

        			<div class="px-1">
        				<label>Membership Category</label>
	        			<select class="form-control" v-model="category_id">
	        				<option value="">Select Category</option>
	        				<option v-for="cat in categories" :key="cat.id" value="cat.id">
	        					{{cat.name}}
	        				</option>
	        			</select>
        			</div>
        		</div>
        		<div class="card-footer text-right">
        			<button class="btn btn-primary px-3" @click="addMember">Add and approve</button>
        		</div>
        	</div>
    	</modal>

		<div class="card mb-4">
			<div class="card-body">
				<p class="card-title font-weight-bold">Add Member</p>

				<form class="form-row" @submit.prevent="getUser" @keydown="form.onKeydown($event)">
					<div class="col-md-8">
						<label>User ID</label>
						<input type="text" class="form-control" v-model="form.user" placeholder="User ID">
					</div>
					<div class="col-md-4 d-flex align-items-end">
						<button class="btn btn-primary px-3">Fetch User</button>
					</div>
				</form>
			</div>
		</div>

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
									<a href="#" v-if="row.status == 'suspended'" class="btn btn-sm btn-info" @click="approve(row.id)">
										Approve
									</a>
									<a href="#" v-if="row.status == 'approved'" class="btn btn-sm btn-danger" @click="suspend(row.id)">
										Suspend
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
				form: new Form({
					user: ''
				}),

				user: null,
				members: [],
				categories: [],
				category_id: null,
			}
		},

		methods: {
			loadMembers() {
				this.$spinner.show();
				axios.get('/api/organizations/members')
					.then(response => {
						this.members = response.data.data;
						this.$notify({
							type: (response.data.status) ? 'success' : 'warn',
							text: response.data.message
						})
					})
					.catch(e => {
						this.$spinner({
							type: 'error',
							text: e.message
						})
					})
					.finally(() => {
						this.$spinner.hide();
					})
			},

			addMember() {

				this.$modal.hide('member-modal');
				if(this.category_id) {

					let data = {
						user: this.user.details.id,
						category_id: this.category_id
					};

					this.$spinner.show();
					axios.post('/api/organizations/add-and-approve', data)
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
							this.$spinner.hide()
						})
				}
				else {
					this.$notify({
						type: 'error',
						text: 'Select Membership category'
					})
				}
			},

			approve(id) {
				this.$confirm({
					message: 'Approve?',
					button: {
						no: 'No',
						yes: 'Yes'
					},
					callback: (confirm) => {
						if(confirm) {
							this.doApprove(id);
						}
					}
				})
			},

			doApprove(id) {
				this.$spinner.show();
				axios.get('/api/organizations/members/' + id + '/approve')
					.then(response => {
						this.$notify({
							type: 'success',
							text: response.data.message
						})
					})
					.catch(e => {
						this.$notify({
							type: 'success',
							text: e.message
						})
					})
					.finally(() => {
						this.$spinner.hide();
					})
			},

			suspend(id) {
				this.$confirm({
					message: 'Suspend?',
					button: {
						no: 'No',
						yes: 'Yes'
					},
					callback: (confirm) => {
						if(confirm) {
							this.doSuspend(id);
						}
					}
				})
			},

			doSuspend(id) {
				this.$spinner.show();
				axios.get('/api/organizations/members/' + id + '/suspended')
					.then(response => {
						this.$spinner({
							type: 'success',
							text: response.data.message
						})
					})
					.catch(e => {
						this.$spinner({
							type: 'success',
							text: e.message
						})
					})
					.finally(() => {
						this.$spinner.hide();
					})
			},

			getUser() {
				this.$spinner.show();
				axios.get('/api/users/username/' + this.form.user)
					.then(response => {
						console.log(response);
						if(response.data.status) {
							this.$notify({
								type: 'success',
								text: response.data.message
							})

							this.user = response.data.data;
							this.$modal.show('member-modal');
						}
						else {
							this.$notify({
								type: 'error',
								text: response.data.message
							})
						}
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

			loadCategories() {
				axios.get('/api/organizations/categories')
					.then(response => {
						this.categories = response.data.data;
					})
					.catch(e => {
						
					})
					.finally(() => {
						
					})
			},
		},

		mounted() {
			this.loadMembers();
			this.loadCategories();
		}
	}
</script>