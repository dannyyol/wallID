<template>
	<div>
		<div class="card mb-4 bg-light px-2">
			<p class="px-3">
				<button class="btn btn-danger btn-sm float-right" @click="closeSection">
					<i class="fas fa-trash-alt" type="button"></i>
				</button>
			</p>

			<div class="row">
				<div class="col-6">
	        		<input type="text" v-on:blur="updateCategory" placeholder="Category Name" class="form-control">
	        	</div>

	        	<div class="col-6">
	        		<input type="number" v-on:blur="updatePrice" placeholder="Price" class="form-control">
	        	</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'TicketPriceCategory',
		props: {
			index: Number
		},

		methods: {
			
			updateCategory(event) {
				const element = event.target;
				const name = $(element).val();
				this.$emit('updateCategory', name, this.index);
			},

			updatePrice(event) {
				const element = event.target;
				const name = $(element).val();
				this.$emit('updatePrice', name, this.index);
			},

			closeSection() {
				this.$emit('closeSection', this.index);
			},
		},
	}
</script>