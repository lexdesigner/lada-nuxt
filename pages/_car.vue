<template>
	<div id="car-page">
		<v-header />
		<v-main :carId="car.id" />
		<v-car-benefits />
		<v-car-body :carId="car.id" :body="car.body[0].id" />
		<v-benefits />
		<v-stock />
		<v-contacts />
		<v-footer />
	</div>
</template>

<script>
import vHeader from "/components/vHeader";
import vMain from "/components/vMain";
import vCarBenefits from "/components/carPage/vCarBenefits";
import vBenefits from "/components/vBenefits";
import vCarBody from "/components/carPage/vCarBody";
import vStock from "/components/vStock";
import vContacts from "/components/vContacts";
import vFooter from "/components/vFooter";

export default {
	asyncData({ params, store }) {
		const car = store.getters["cars/car"](params.car);
		return { car };
	},
	components: {
		vHeader,
		vCarBenefits,
		vBenefits,
		vStock,
		vCarBody,
		vContacts,
		vMain,
		vFooter
	}
};
</script>

<style lang="sass"></style>
