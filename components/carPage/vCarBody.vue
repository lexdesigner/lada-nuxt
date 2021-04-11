<template>
	<section id="cars">
		<v-body-tabs @clickBody="selectBody" :select-id="active" :carId="carId" />
		<v-completations-list :select-id="active" :carId="carId" />
	</section>
</template>

<script>
import vBodyTabs from "/components/carPage/vBodyTabs";
import vCompletationsList from "/components/carPage/vCompletationsList";
export default {
	props: ["body", "carId"],
	components: {
		vBodyTabs,
		vCompletationsList
	},
	data() {
		return {
			active: ""
		};
	},
	methods: {
		selectBody(data) {
			this.active = data.active;
			console.log(this.active);
		}
	},
	created() {
		this.active = this.body;
	}
};
</script>

<style lang="sass"></style>
