<template>
	<div id="main-page">
		<v-header />
		<v-main />
		<v-main-benefits />
		<v-cars />
		<v-benefits />
		<v-stock />
		<v-contacts />
		<v-footer />
	</div>
</template>

<script>
import vHeader from "/components/vHeader";
import vMain from "/components/vMain";
import vMainBenefits from "/components/vMainBenefits";
import vCars from "/components/vCars";
import vBenefits from "/components/vBenefits";
import vStock from "/components/vStock";
import vContacts from "/components/vContacts";
import vFooter from "/components/vFooter";
export default {
	components: {
		vHeader,
		vMain,
		vMainBenefits,
		vCars,
		vBenefits,
		vStock,
		vContacts,
		vFooter
	}
};
</script>
