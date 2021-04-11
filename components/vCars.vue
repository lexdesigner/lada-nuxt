<template>
	<section id="cars">
		<v-cars-tabs @clickTab="selectCar" :select-id="active" />
		<v-cars-list :select-id="active" />
	</section>
</template>

<script>
import vCarsTabs from "/components/vCarsTabs";
import vCarsList from "/components/vCarsList";
export default {
	data() {
		return {
			active: "granta"
		};
	},
	components: {
		vCarsTabs,
		vCarsList
	},
	methods: {
		selectCar(data) {
			this.active = data.active;
		}
	}
};
</script>

<style lang="sass"></style>
