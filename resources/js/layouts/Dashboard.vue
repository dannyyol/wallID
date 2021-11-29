<template>
	<div class="wrapper">
		<router-view></router-view>
	</div>
</template>

<script>
	
	export default {
		
		data() {
			return {}
		},

		methods: {
			
		},

		created() {
			this.$store.dispatch('user/profile'); 
		}
	}
</script>