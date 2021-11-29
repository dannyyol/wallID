<template>
	<div>
		<div class="card border-0" style="border-radius: 16px">
			<p class="card-title pt-3 px-3 h5 mb-0" v-if="!editMode">Create an Event</p>
			<p class="card-title pt-3 px-3 h5 mb-0" v-if="editMode">Update an Event</p>
			<div class="card-body">

				<p>
					<span class="mr-2">Is Free:</span> <toggle-button :value="false" :labels="{checked: 'Yes', unchecked: 'No'}" @change="toggleMode"/>
				</p>

				<form @submit.prevent="(editMode) ? update() : create()" @keydown="form.onKeydown($event)">
					<div class="form-group">
						<label>Title</label>
						<input type="text" v-model="form.name" required placeholder="Event Title" class="form-control">
						<div v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
					</div>

					<div class="form-group">
						<label>Ticket Numbers</label>
						<input type="number" v-model="form.tickets" required class="form-control" placeholder="Number of Tickets">
					</div>

					<div class="form-group" v-if="!form.isFree">
						<label>Ticket Price Category</label>
						<select class="form-control" v-model="form.pricing" required>
							<option value="single">Single Price</option>
							<option value="multiple">Multiple Prices</option>
						</select>
					</div>

					<div class="form-group" v-if="form.pricing == 'single'">
						<input type="number" v-model="form.price" required class="form-control" placeholder="Ticket Price">
					</div>

					<div class="form-group bg-light" v-if="form.pricing == 'multiple'">

						<price-category v-for="(section, index) in form.ticketCategories" v-bind:key="'S' + index" :index="index" v-on:updateCategory="updateCategory" v-on:updatePrice="updatePrice" @closeSection="closeSection"></price-category>

						<button class="btn" type="button" @click="addSection">+ Add Section</button>
					</div>

					<div class="form-group">
						<label>Date</label>
						<input type="date" v-model="form.date" required class="form-control">
					</div>

					<div class="form-group">
						<label>Type</label>
						<select class="form-control" required v-model="form.type">
							<option value="open">Open</option>
							<option value="close">Closed</option>
							<option value="invitational">Invitational</option>
						</select>
					</div>

					<div class="form-group">
						<label>Description</label>
						<textarea rows="5" required v-model="form.description" class="form-control" placeholder="Description"></textarea>
					</div>

					<button class="btn btn-primary px-5 float-right" :disabled="form.busy">
						<span v-if="editMode">Update Event</span>
						<span v-if="!editMode">Create Event</span>
					</button>
				</form>
			</div>
		</div>
	</div>
</template>

<script>

	import PriceCategory from '../../components/TicketPriceCategory.vue';
	export default {
		data() {
			return {
				id: '',
				editMode: false,
				form: new Form({
					name: '',
					type: '',
					date: '',
					price: '',
					tickets: '',
					description: '',
					isFree: false,
					pricing: '',
					ticketCategories: [
						{
							name: '',
							price: 0
						}
					]
				}),
			}
		},

		components: {
			PriceCategory
		},

		methods: {
			create() {
				this.$spinner.show();
				this.form.post('/api/events')
					.then(response => {
						this.$notify({
							type: 'success',
							text: response.data.message
						});
						this.form.reset();
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

			update() {
				this.form.patch('/api/events/' + this.id)
					.then(response => {
						this.form.reset();
						swal(response.data.message);
					})
					.catch(e => {
						this.$notify({
							text: e.message
						})
					})
			},

			loadEvent(id) {
				axios.get('/api/events/' + id)
					.then(response => {
						this.form.fill(response.data.data);
					})
					.catch(e => {
						this.$notify({
							text: e.message
						});
						console.log(e);
					})
			},

			toggleMode(e) {
				this.form.isFree = e.value;
			},

			updateTicketCategory(event) {
				console.log('Data', event.target.value);
			},

			addSection() {
				this.form.ticketCategories.push({
					name: '',
					price: 0
				})
			},

			updateCategory(name, index) {
				this.form.ticketCategories[index].name = name;
			},

			updatePrice(price, index) {
				this.form.ticketCategories[index].price = price;
			},

			closeSection(index) {
				this.form.ticketCategories.splice(index, 1);
			}
		},

		mounted() {
			if (this.$route.params.id) {
				this.editMode = true;
				this.id = this.$route.params.id;
				this.loadEvent(this.$route.params.id);
			}
		}
	}

</script>