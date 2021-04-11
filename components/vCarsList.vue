<template>
	<div class="container">
		<ul class="cars-list" :id="selectId">
			<template v-if="mobile">
				<v-car
					v-for="(body, index) in car.body"
					:key="index"
					:body="body"
					:carId="selectId"
					v-show="index < carsView"
				></v-car>
			</template>
			<template v-else>
				<v-car
					v-for="body in car.body"
					:key="body.id"
					:body="body"
					:carId="selectId"
				></v-car>
			</template>
		</ul>
		<button
			class="show-more"
			@click="carsView++"
			v-if="mobile && carsView < car.body.length"
		>
			Показать ещё
			<svg preserveAspectRatio="xMidYMid meet">
				<use :xlink:href="'#reload'" />
			</svg>
		</button>
	</div>
</template>

<script>
import vCar from "/components/vCar";
export default {
	props: ["select-id"],
	components: {
		vCar
	},
	data() {
		return {
			mobile: false,
			carsView: 2
		};
	},
	computed: {
		car() {
			return this.$store.getters["cars/car"](this.selectId);
		}
	},
	mounted() {
		this.mobile = this.isMobile();
	}
};
</script>

<style lang="sass">
.show-more
	display: flex
	border: none
	border-top: 1px dashed #D0D3D4
	border-bottom: 1px dashed #D0D3D4
	padding: 14px 0
	background-color: #fff
	outline: none
	justify-content: space-between
	align-items: center
	width: 170px
	font-size: 14px
	line-height: 17px
	color: $accent
	margin-left: auto
	margin-right: auto
	svg
		fill: #fff
		width: 20px
		height: 20px
</style>
