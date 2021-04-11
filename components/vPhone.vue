<template>
	<span class="phone">
		<a :href="`tel:${phone}`">{{ phoneLocal(phone) }}</a>
	</span>
</template>

<script>
export default {
	methods: {
		phoneLocal(phone) {
			return phone.replace(
				/(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})/,
				"$1 ($2) $3-$4-$5"
			);
		}
	},
	computed: {
		phone() {
			return this.$store.getters["info/phone"];
		}
	}
};
</script>

<style lang="sass">
.phone
	display: block
	a
		font-weight: bold
		font-size: 18px
		line-height: 21px
		color: $dark
		position: relative
		text-decoration: none
		&:hover
			color: $accent
</style>
