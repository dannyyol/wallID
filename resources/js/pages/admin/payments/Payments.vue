<template>
	<div>
		
	    <div class="col-lg-12 grid-margin stretch-card px-0">

	        <div class="card">
	            <div class="card-body">
	                <div class="row">
	                    <div class="col-6">
	                        <h4 class="card-title">All Payments</h4>
	                    </div>
	                    <div class="col-6">
	                        <div class="dropdown float-right">
	                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                Export
	                            </button>
	                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	                                <a class="dropdown-item" :href="'/api/admin/new-customer-export-to-pdf'">PDF</a>
	                                <a class="dropdown-item" :href="'/api/admin/new-customer-export-to-excel'">Excel</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="table-responsive">
	                    <table class="table table-hover">
	                        <thead>
	                            <tr>
	                                <th>S/N</th>
	                                <th>Payer Name</th>
	                                <th>Payer Name</th>
	                                <th>Amount</th>
	                               	<th>Payment Date</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<!-- <tr v-if="payments.length == 0">
	                        		<td colspan="5">
	                        			<p class="text-center">
	                        				No Record Found
	                        			</p>
	                        		</td>
	                        	</tr> -->

	                           <tr >
	                           		<td>1</td>
	                           		<td>Angel</td>
	                           		<td>Angel@yahoo.com</td>
	                           		<td>10</td>
	                           		<td>5 days ago</td>
	                           </tr>

	                           <tr >
	                           		<td>2</td>
	                           		<td>Angel</td>
	                           		<td>Angel@yahoo.com</td>
	                           		<td>10</td>
	                           		<td>5 days ago</td>
	                           </tr>

	                           <tr >
	                           		<td>3</td>
	                           		<td>Angel</td>
	                           		<td>Angel@yahoo.com</td>
	                           		<td>10</td>
	                           		<td>5 days ago</td>
	                           </tr>

	                           <tr >
	                           		<td>4</td>
	                           		<td>Angel</td>
	                           		<td>Angel@yahoo.com</td>
	                           		<td>10</td>
	                           		<td>5 days ago</td>
	                           </tr>

	                           <tr >
	                           		<td>5</td>
	                           		<td>Angel</td>
	                           		<td>Angel@yahoo.com</td>
	                           		<td>10</td>
	                           		<td>5 days ago</td>
	                           </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	            <div class="m-auto">
	                <pagination :data="pagination" @pagination-change-page="loadPayments" page="1"></pagination>
	            </div>
	        </div>
	    </div>
	</div>
</template>


<script>
	export default {
		data() {
			return {

				payments: [],
				pagination: {},
				baseUrl: '/api/admin/payments'
			}
		},

		methods: {

			loadPayments(page = 1) {

				this.$spinner.show();
				axios.get(this.baseUrl + '?page=' + page)
					.then(response => {
						console.log(response);
						this.payments = response.data.data;
						this.prepPagination(response.data);
					})
					.catch(e => {
						this.$notify({
							type: 'error',
							text: e.message
						});
					})
					.finally(() => {
						this.$spinner.hide();
					})
			},

			prepPagination(data) {
				
				this.pagination = {
					data: data.data,
					current_page: data.meta.current_page,
					first_item: data.meta.first_item,
					last_item: data.meta.last_item,
					last_page: data.meta.last_page,
					next_page_url: data.meta.next_page_url,
					per_page: data.meta.per_page,
					previous_page_url: data.meta.previous_page_url,
					total: data.meta.total
				}
			}
		},

		mounted() {
			//this.loadPayments();
		}
	}
</script>