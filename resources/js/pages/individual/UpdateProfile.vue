<template>
	<div>
		<form @submit.prevent="update" @keydown="form.onKeydown($event)">
			<div class="card mb-4">
				<div class="card-body">
					<p class="card-title">Edit and Update</p>

					<div class="row mb-4">
						<div class="col-md-6">
							<label>Firstname</label>
							<input type="text" class="form-control" v-model="form.firstname" placeholder="Firstname">
						</div>

						<div class="col-md-6">
							<label>Lastname</label>
							<input type="text" class="form-control" v-model="form.lastname" placeholder="Lastname">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label>Email</label>
							<input type="email" disabled class="form-control" v-model="form.email" placeholder="Email">
						</div>

						<div class="col-md-6">
							<label>Phone</label>
							<input type="tel" disabled class="form-control" placeholder="Phone" v-model="form.phone">
						</div>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<label>DOB</label>
						<input type="date" class="form-control" placeholder="DOB" v-model="form.dob">
					</div>

					<div class="form-group">
						<label>BIO</label>
						<textarea rows="10" v-model="form.bio" class="form-control" placeholder="Bio"></textarea>
					</div>

					<div class="text-right">
						<button class="btn btn-primary">Update</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</template>

<script>
	export default {
		name: 'UpdateProfile',
		data() {
			return {
				user: null,
				form: new Form({
					firstname: '',
					lastname: '',
					dob: '',
					bio: '',
					email: '',
					phone: ''
				})
			}
		},

		methods: {
			update() {
				this.form.patch('/api/individuals')
					.then(response => {
						this.$notify({
							type: (response.data.status) ? 'success' : 'warn',
							text: response.data.message
						})

						if (response.data.status) {
							
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
				console.log('Data', this.form);
			},

			populate() {
				if (this.user) {
					this.form.firstname = this.user.profile?.details.firstname;
					this.form.lastname = this.user.profile?.details.lastname;
					this.form.dob = this.user.profile?.details.dob;
					this.form.bio = this.user.profile?.details.bio;
					this.form.email = this.user.profile?.email;
					this.form.phone = this.user.profile?.details.phone;
				}
			}
		},

		mounted() {
			this.user = this.$store.state.user;
			this.populate();
		}
	}
</script>