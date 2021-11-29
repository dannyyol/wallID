<template>
	<div>

		<div class="card mb-4">
			<div class="card-body">
				<img src="/images/user.png" style="width: 50px; height: 50px;">
				<span class="px-2" v-if="user && user.profile">
					{{ user.profile.details.firstname + ' ' + user.profile.details.lastname }}
				</span>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-body">
				<p class="card-title">Profile</p>

				<div class="row">
					<p class="col">
						<span class="small text-muted">Firstname</span> <br>
						<span class="font-weight-bold">
							{{ user.profile.details.firstname }}
						</span>
					</p>

					<p class="col">
						<span class="small text-muted">Firstname</span> <br>
						<span class="font-weight-bold">
							{{ user.profile.details.lastname }}
						</span>
					</p>
				</div>

				<div class="row">
					<p class="col">
						<span class="small text-muted">Email</span> <br>
						<span class="font-weight-bold">
							{{ user.profile.email }}
						</span>
					</p>

					<p class="col">
						<span class="small text-muted">Phone</span> <br>
						<span class="font-weight-bold">
							{{ user.profile.details.phone }}
						</span>
					</p>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<p class="card-title"></p>

				<div class="row">
					<p class="col">
						<span class="small text-muted">Bio</span> <br>
						<span class="font-weight-bold">
							{{ user.profile.details.bio ? user.profile.details.bio : 'N/A' }}
						</span>
					</p>
				</div>

				<div class="row">
					<p class="col">
						<span class="small text-muted">DOB</span> <br>
						<span class="font-weight-bold">
							{{ user.profile.details.dob }}
						</span>
					</p>
				</div>

				<div class="text-right">
					<router-link :to="{name: 'update-profile'}" class="btn btn-danger"> 
						Edit
					</router-link>
				</div>
			</div>
		</div>

	</div>
</template>

<script>
	export default {
		name: 'UserProfile',
		data() {
			return {
				user: null
			}
		},

		mounted() {
			this.user = this.$store.state.user;
		}
	}
</script>