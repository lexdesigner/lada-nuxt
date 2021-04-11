<template>
	<div id="car-tabs">
		<div class="container">
			<h2>Выбери тип кузова {{ car.name }}</h2>
			<template v-if="mobile">
				<Flickity
					class="flickity-tabs-list"
					ref="flickity3"
					:options="flickityOptions"
				>
					<div
						v-for="body in car.body"
						:key="body.id"
						:class="[selectId === body.id ? 'active' : '', 'flickity3-cell']"
						@click.prevent="emitCars(body.id)"
					>
						<figure>
							<img
								:src="`img/cars/${car.id}/${body.id}.png`"
								:alt="body.name"
							/>
						</figure>
						<span>{{ body.name }}</span>
					</div>
				</Flickity>
			</template>
			<template v-else>
				<ul class="car-tabs-list">
					<li
						v-for="body in car.body"
						:key="body.id"
						:class="[selectId === body.id ? 'active' : '']"
						@click.prevent="emitCars(body.id)"
					>
						<figure>
							<img
								:src="`img/cars/${car.id}/${body.id}.png`"
								:alt="body.name"
							/>
						</figure>
						<span>{{ body.name }}</span>
					</li>
				</ul>
			</template>
		</div>
	</div>
</template>

<script>
export default {
	props: ["carId", "selectId"],
	data() {
		return {
			flickityOptions: {
				prevNextButtons: false,
				pageDots: false,
				freeScroll: false
			},
			mobile: false
		};
	},
	computed: {
		car() {
			return this.$store.getters["cars/car"](this.carId);
		}
	},
	methods: {
		emitCars(id) {
			this.$emit("clickBody", {
				active: id
			});
		}
	},
	mounted() {
		this.mobile = this.isMobile();
	}
};
</script>

<style lang="sass">
#car-tabs
	margin: 80px 0
	position: relative
.car-tabs-list
	margin-top: 30px
	display: flex
	justify-content: center
	list-style-type: none
	li
		width: 170px
		overflow: hidden
		text-align: center
		cursor: pointer
		margin: 0px 13px
		&.active
			span
				color: $accent
		figure
			width: 278px
			height: 105px
			margin-bottom: 16px
			img
				display: block
				max-width: 100%
				height: 100%
		span
			font-size: 24px
			line-height: 29px
			font-weight: bold
@include lg-desktop
@include md-desktop
@include sm-tablets
@include sm-mobile
	.car-tabs-list
		flex-wrap: wrap
		justify-content: center
	#car-tabs
		margin-top: 0
		margin-bottom: 0
	.flickity3-cell
		width: 190px
		text-align: center
		margin-top: 30px
		&.active
			span
				color: $accent
		figure
			width: 100%
			overflow: hidden
			margin-bottom: 14px
			img
				width: 311px
		span
			font-weight: bold
			font-size: 20px
			line-height: 25px
</style>
