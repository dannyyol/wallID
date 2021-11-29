<template>
	<div>
		<modal name="categories-modal" :adaptive="true">
        	<div class="card h-100">
        		<form @submit.prevent="initPayment" @keydown="form.onKeydown($event)">
        			<div class="card-body">
        				<div class="form-group">
		        			<label>Ticket Category</label>
		        			<select class="form-control" required v-model="category_id">
		        				<option v-for="tc in event.ticketCategories" :key="tc.id" :value="tc.id">
		        					{{tc.name}}
		        				</option>
		        			</select>
		        		</div>
        			</div>

	        		<div class="card-footer text-right">
	        			<button class="btn btn-danger">
	        				Continue
	        			</button>
	        		</div>
        		</form>
        	</div>
    	</modal>

		<div class="card border-0 mb-4" style="border-radius: 16px;">
			<div class="card-body" v-if="event">
				<p class="card-title">Details</p>

				<p class="mb-4">
					<span class="small text-muted">Title</span> <br>
					{{event.name}}
				</p>


				<p class="mb-4">
					<span class="small text-muted">Date</span> <br>
					{{event.event_date}}
				</p>

				<p class="mb-4">
					<span class="small text-muted">Available Tickets</span> <br>
					{{event.tickets - event.tickets_purchased}}
				</p>
			</div>
		</div>

		<div class="card border-0 mb-4">
			<div class="card-body" v-if="event">
				<p class="card-title">Pricing</p>

				<div>
					<p>
						<span class="small text-muted">Price Type</span> <br>
						{{event.pricing}}
					</p>
				</div>

				<div>
					<p class="mb-4" v-for="tc in event.ticketCategories" :key="tc.id">
						<span class="small text-muted">{{tc.name}}</span> <br>
						₦{{tc.price}}
					</p>
				</div>

				<div class="text-right">
					<button class="btn btn-danger btn-sm" @click="process">Buy Ticket</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				event: null,
				category_id: null,
			}
		},

		methods: {
			getEvent(id) {
				this.$spinner.show();
				axios.get('/api/events/' + id)
					.then(response => {
						this.event = response.data.data;
						this.$notify({
							title: 'success',
							text: response.data.message
						})
					})
					.catch(e => {
						this.$notify({
							title: 'Error',
							text: e.message
						})
					})
					.finally(e => {
						this.$spinner.hide();
					})
			},

			process() {
				if (this.event.pricing != 'single') {
					this.$modal.show('categories-modal');
				}
				else {
					this.initPayment();
				}
			},

			initPayment() {
				if (this.event.pricing != 'single' && !this.category_id) {
					this.$notify({
						type: 'warn',
						text: 'Please select Ticket Category'
					})
				}
				else {

					this.$modal.hide('categories-modal');
					this.$spinner.show();

					let data = {
						event_id: this.event.id,
						category_id: this.category_id
					}

					console.log('Data', data);

					axios.post('/api/tickets/buy', data)
						.then(response => {

							this.$notify({
								type: (response.data.status) ? 'success' : 'warn',
								text: response.data.message
							})
							
							if (response.data.status && response.data.data.link) {
								
								localStorage.setItem('event_id', this.event.id);
								localStorage.setItem('paymentFor', 'ticket');

								window.location.href = response.data.data.link
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
				}
			}
		},

		mounted() {
			this.getEvent(this.$route.params.id);
		}
	}
</script>