<template>
	<div>
		<h4>Verifying Payment</h4>
	</div>
</template>

<script>
	export default {
		name: 'PaymentResponse',
		data() {
			return {
				
			}
		},

		methods: {
			verify(ref) {

				this.$spinner.show();
				axios.get('/api/payments/verify/' + ref)
					.then(response => {

						this.$notify({
							type: (response.data.status) ? 'success' : 'warn',
							text: response.data.message
						});

						let reason = localStorage.getItem('paymentFor');
						
						if (reason == 'ticket') {
							this.saveTicket();
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

			saveTicket() {

				let data = {
					reference: this.$route.query.reference,
					event_id: localStorage.getItem('event_id')
				};

				this.$spinner.show();

				axios.post('/api/tickets', data)
					.then(response => {

						this.$notify({
							type: (response.data.status) ? 'success' : 'warn',
							text: response.data.message
						});

						if(response.data.status) {
							this.$router.push('/payments/ticket');
						}
					})
					.catch(() => {
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
			if (this.$route.query.reference) {
				this.verify(this.$route.query.reference);
			}
		}
	}
</script>