<template>

	<a-card :bordered="false" class="widget-1">
		<a-statistic
			:title="title"
			:value="value"
			:precision="0"
			class="text-success"
			:class="'text-' + status"
		>
		</a-statistic>
	</a-card>

</template>

<script>

	export default ({
		props: {
			title: {
				type: String,
				default: "",
			},
			value: {
				type: Number,
				default: 0,
			},
			prefix: {
				type: String,
				default: "",
			},
			status: {
				type: String,
				default: "success",
			},
		},
		data() {
			return {
			}
		},
	})

</script>
