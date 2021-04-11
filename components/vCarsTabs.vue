<template>
	<div id="cars-tabs">
		<div class="container">
			<h2>Выбери свой автомобиль LADA</h2>
			<ul class="cars-tabs-list" v-if="!mobile">
				<li
					v-for="{ id, name } in cars"
					:key="id"
					:class="[selectId === id ? 'active' : '']"
					@click.prevent="emitCars(id)"
				>
					<figure><img :src="`img/cars/${id}/image.png`" :alt="name" /></figure>
					<span>{{ name }}</span>
				</li>
			</ul>
			<Flickity
				class="flickity-cars"
				ref="flickity"
				:options="flickityOptions"
				v-if="mobile"
			>
				<div
					v-for="{ id, name } in cars"
					:key="id"
					:class="[selectId === id ? 'active' : '', 'carousel-cell']"
					@click.prevent="emitCars(id)"
				>
					<figure><img :src="`img/cars/${id}/image.png`" :alt="name" /></figure>
					<span>{{ name }}</span>
				</div>
			</Flickity>
		</div>
	</div>
</template>

<script>
export default {
	props: ["select-id"],
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
		cars() {
			return this.$store.getters["cars/cars"];
		}
	},
	methods: {
		emitCars(id) {
			this.$emit("clickTab", {
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
#cars-tabs
	background: linear-gradient(180deg, #FFFFFF 0%, #D8E0E6 100%)
	padding-top: 120px
	padding-bottom: 140px
	position: relative
	&::after
		content: ''
		display: block
		background-image: url('/img/lada-line.png')
		width: 100%
		background-size: cover
		height: 146px
		position: absolute
		left: 0
		bottom: 0
		background-repeat: no-repeat
		background-position: center bottom
.cars-tabs-list
	margin-top: 30px
	display: flex
	justify-content: space-between
	list-style-type: none
	li
		width: 270px
		overflow: hidden
		text-align: center
		cursor: pointer
		&.active
			span
				color: $accent
		figure
			width: 442px
			height: 157px
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
	.cars-tabs-list li figure
		height: auto
		width: 380px
		img
			height: auto
@include md-desktop
	#cars-tabs
		padding-top: 50px
	.cars-tabs-list li figure
		width: 285px
	.cars-tabs-list li span
		font-size: 18px
		line-height: 1.4
@include sm-mobile
	#cars-tabs
		padding-top: 20px
		padding-bottom: 65px
	#cars-tabs::after
		height: 74px
	.cars-tabs-list
		flex-wrap: wrap
		justify-content: center
	.cars-tabs-list li
		width: 170px
		margin-bottom: 20px
	.flickity-cars
		margin-top: 20px
		.carousel-cell
			width: 190px
			overflow: hidden
			text-align: center
			&.active
				span
					color: $accent
			span
				font-weight: bold
				font-size: 20px
				line-height: 25px
			figure
				margin-bottom: 14px
				img
					width: 311px
</style>
