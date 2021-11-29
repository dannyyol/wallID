<template>
	<div>
		<!-- <breadcrumb v-bind:list="['Dashboard', 'Membership', 'Category']" current='View'></breadcrumb> -->

		<div class="card border-0 mb-4">
			<div class="card-body">
				<p class="card-title font-weight-bold">Categories</p>

				<div class="table-responsive">
					<table class="table table-striped table-borderless">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Price</th>
								<th>Date Created</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>
							<tr v-if="categories.length == 0">
								<td colspan="6">
									<p class="text-center">
										No Record Found!
									</p>
								</td>
							</tr>

							<tr v-for="(row, index) in categories" :key="row.id">
								<td>
									{{index + 1}}
								</td>

								<td>
									{{row.name}}
								</td>

								<td>
									{{row.price}}
								</td>

								<td>
									{{ row.created_at | moment("from", "now", true) }} ago
								</td>

								<td>

									<button class="btn btn-danger btn-sm" @click="confirmDelete(row.id)">
										<i class="fas fa-trash-alt"></i>
									</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="card border-0">
			<div class="card-body">
				<p class="card-title font-weight-bold">Add Category</p>
				<form @submit.prevent="(editMode) ? update() : create()" @keydown="form.onKeydown($event)">
					<div class="form-group">
						<label>Name</label>
						<input type="text" v-model="form.name" required placeholder="Event Name" class="form-control">
						<div v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
					</div>

					<div class="form-group">
						<label>Price</label>
						<input type="number" v-model="form.price" required class="form-control" placeholder="Price">
					</div>

					<div class="form-group">
						<label>Description</label>
						<textarea rows="5" required v-model="form.description" class="form-control" placeholder="Description"></textarea>
					</div>

					<button class="btn btn-primary px-5 float-right" :disabled="form.busy">
						<span v-if="editMode">Update</span>
						<span v-if="!editMode">Create Category</span>
					</button>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				editMode: false,
				form: new Form({
					name: '',
					price: '',
					description: ''
				}),

				categories: []
			}
		},

		methods: {
			loadCategories() {
				this.$spinner.show();
				axios.get('/api/organizations/categories')
					.then(response => {
						this.categories = response.data.data;
						console.log(response);
						this.$notify({
							text: response.data.message
						})
					})
					.catch(e => {
						this.$notify({
							text: e.message
						})
					})
					.finally(() => {
						this.$spinner.hide()
					})
			},

			create() {
				this.$spinner.show();
				this.form.post('/api/organizations/categories')
					.then(response => {
						console.log(response);
						this.$notify({
							text: response.data.message
						});
						this.form.reset();
					})
					.catch(e => {
						console.log('Error', e);
						this.$notify({
							text: e.message
						})
					})
					.finally(() => {
						this.$spinner.hide();
					})
			},
		},

		mounted() {
			this.loadCategories();
		}
	}
</script>