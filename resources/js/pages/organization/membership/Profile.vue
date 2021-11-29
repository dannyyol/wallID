<template>
	<div>
		<div class="card mb-4">
			<div class="card-body" v-if="member">
				<img src="/images/user.png" style="width: 50px; height: 50px;">
				<span class="px-2">{{ member.individual.firstname + ' ' + member.individual.lastname }}</span>
			</div>
		</div>

		<div class="card">
			<div class="card-body" >
				<div v-if="member">
					<p class="mb-3">
						<span class="small text-muted">Firstname</span> <br>
						<span class="h4">{{ member.individual.lastname }}</span>
					</p>

					<p class="mb-3">
						<span class="small text-muted">Lastname</span> <br>
						<span class="h4">{{ member.individual.lastname }}</span>
					</p>

					<p class="mb-3">
						<span class="small text-muted">Occupation</span> <br>
						<span class="h4">Teacher</span>
					</p>

					<p class="mb-3">
						<span class="small text-muted">DOB</span> <br>
						<span class="h4">
							{{member.individual.dob}}
						</span>
					</p>

					<p>
						<span class="small text-muted">Bio</span> <br>
						<span class="h4">
							{{member.individual.bio}}
						</span>
					</p>

					<div class="py-3 text-right" v-if="member.status == 'pending'">
						<button class="btn btn-danger" @click="approve(member.id)">Approve</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'MemberProfile',
		data() {
			return {
				member: null
			}
		},
		methods: {
			getMember(id) {
				this.$spinner.show();
				axios.get('/api/organizations/members/' + id)
					.then(response => {
						console.log('member', response);
						this.member = response.data.data;
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
			}
		},
		mounted() {
			this.getMember(this.$route.params.id)
		}
	}
</script>