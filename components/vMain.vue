<template>
	<main id="main" :class="[carId ? 'maincar-bg' : '']">
		<div class="main-cars-bg">
			<p class="title" v-if="carId">{{ carId }}</p>
			<p class="title" v-else>LADA</p>
			<figure v-if="carId" class="main-cars-image">
				<img :src="`/img/cars/${carId}/image.png`" alt="" />
			</figure>
			<figure v-else>
				<img src="/img/bg-cars.png" alt="" />
			</figure>
		</div>
		<div class="container">
			<div class="main-contain">
				<div class="main-date">Только до {{ dateEnd }}</div>
				<div class="main-title">
					<h1>Финальная распродажа</h1>
					<h2 v-if="carId">
						{{ carName }} с выгодой до&nbsp;<b>{{ carBenefit }}</b
						>&nbsp;руб.
					</h2>
					<h2 v-else>
						LADA 2020 года с выгодой до&nbsp;<b>{{ maxBenefit }}</b
						>&nbsp;руб.
					</h2>
				</div>
				<div class="main-benefit">
					<div class="main-benefit_text">
						<span class="val">1,9%</span>
						<div class="keys">
							<p>Первоначальный взнос</p>
							<p>Авторассрочка</p>
						</div>
					</div>
					<button
						class="btn"
						@click.prevent="
							openPopup('callBack', `Получите лучшее предложение на LADA`)
						"
					>
						Получить предложение
					</button>
				</div>
			</div>
		</div>
	</main>
</template>

<script>
export default {
	props: ["carId"],
	computed: {
		maxBenefit() {
			return this.$store.getters["cars/maxBenefit"].toLocaleString();
		},
		carName() {
			return this.$store.getters["cars/carName"](this.carId);
		},
		carBenefit() {
			return this.$store.getters["cars/carBenefit"](
				this.carId
			).toLocaleString();
		},
		dateEnd() {
			const currentDate = new Date();
			const month = this.$store.getters["info/getMonth"](
				currentDate.getMonth()
			);
			const l = new Date(
				currentDate.getFullYear(),
				currentDate.getMonth() + 1,
				0
			);
			const day = l.getDate();
			return `${day} ${month}`;
		}
	}
};
</script>

<style lang="sass">
#main
	min-height: 640px
	background-image: url('/img/bg.jpg')
	background-size: cover
	background-repeat: no-repeat
	padding-top: 162px
	padding-bottom: 140px
	background-position: center bottom
	&.maincar-bg
		color: #fff
		background-image: url('/img/car-bg.jpg')
		.main-cars-bg
			top: 116px
			p.title
				top: -10px
.main-contain
	max-width: 49%
	margin-left: 51%
	position: relative
	z-index: 3
.main-date
	color: $accent
	line-height: 20px
	font-weight: bold
h1
	font-size: 46px
	line-height: 56px
	font-weight: bold
.main-title h2
	margin-top: 7px
	font-weight: normal
	font-size: 35px
	line-height: 42px
	text-align: left
.main-benefit
	margin-top: 112px
	display: flex
	align-items: center
	justify-content: space-between
.main-benefit_text
	display: flex
	align-items: center
	margin-right: 20px
	.val
		font-size: 35px
		font-weight: bold
		line-height: 43px
	.keys
		padding-left: 10px
		font-size: 16px
		line-height: 19px
.main-cars-bg
	position: absolute
	left: 50%
	transform: translateX(-100%)
	top: 243px
	z-index: 2
	p.title
		position: absolute
		z-index: -1
		font-weight: bold
		font-weight: 900
		font-size: 240px
		line-height: 305px
		text-align: center
		text-transform: uppercase
		color: #2B2D33
		opacity: 0.7
		left: 0
		width: 100%
		text-align: center
		top: -98px
	figure
		max-width: 688px
		width: 100%
		overflow: hidden
		img
			display: block
			width: 100%
			height: auto
	.main-cars-image
		img
			width: 1117px
@include lg-desktop
	.main-cars-bg p.title
		font-size: 190px
	.main-benefit
		flex-wrap: wrap
	h1
		font-size: 36px
		line-height: 46px
	.main-title h2
		font-size: 24px
		line-height: 32px
	.main-benefit
		margin-top: 24px
	.main-benefit_text .val
		font-size: 24px
		line-height: 1.2
	.main-benefit_text .keys
		font-size: 16px
		line-height: 1.2
	.main-benefit_text
		margin-right: 0
		margin-bottom: 20px
	#main
		min-height: 550px
		padding-bottom: 110px
	#main.maincar-bg .main-cars-bg .main-cars-image img
		width: 920px
	#main.maincar-bg .main-cars-bg figure
		max-width: 575px
@include md-desktop
	.main-contain
		max-width: 100%
		margin-left: 0
	.main-cars-bg
		top: 280px
		transform: translateX(-50%)
	.main-cars-bg p.title
		font-size: 140px
	.main-benefit
		margin-top: 160px
	.main-benefit_text
		margin-bottom: 0
	#main
		padding-top: 150px
	#main.maincar-bg .main-cars-bg .main-cars-image img
		width: 600px
	#main.maincar-bg .main-cars-bg p.title
		font-size: 70px
		line-height: 90px
		top: 5px
	#main.maincar-bg .main-cars-bg
		top: 230px
@include sm-mobile
	.main-cars-bg figure
		width: 320px
	.main-cars-bg p.title
		font-size: 110px
	#main
		padding-top: 105px
		padding-bottom: 90px
	.main-date
		font-size: 14px
		line-height: 17px
	h1
		font-size: 23px
		line-height: 29px
	.main-title h2
		font-size: 20px
		line-height: 24px
	.main-cars-bg p.title
		top: -110px
	.main-cars-bg
		top: 230px
	.main-benefit_text .val
		font-size: 30px
	.main-benefit_text .keys
		font-size: 14px
		line-height: 17px
	.main-benefit_text
		margin-left: auto
		margin-right: auto
		margin-bottom: 20px
	.main-benefit .btn
		margin-left: auto
		margin-right: auto
	#main.maincar-bg .main-cars-bg .main-cars-image img
		width: 440px
	#main.maincar-bg .main-cars-bg .title
		font-size: 70px
		line-height: 90px
	#main.maincar-bg .main-cars-bg
		top: 220px
</style>
