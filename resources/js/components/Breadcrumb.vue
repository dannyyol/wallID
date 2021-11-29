<template>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb bg-white">
	  	<li v-for="page in list" class="breadcrumb-item">{{page}}</li>
	    <li class="breadcrumb-item active" aria-current="page">{{current}}</li>
	  </ol>
	</nav>
</template>

<script>
	export default {
		props: {
			list: Array,
			current: String
		},
	}
</script>