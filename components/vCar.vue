<template>
	<li class="car-list-item">
		<div class="car-title" v-if="!page">
			<p class="title">{{ car.name }}</p>
			<p class="sub-title" v-if="carId !== body.id">{{ body.name }}</p>
		</div>
		<div class="car-row">
			<div class="car-image">
				<figure>
					<img
						:src="`img/cars/${carId}/${body.id}.png`"
						:alt="body.name"
						class="img-responsive"
					/>
				</figure>
			</div>
			<div class="car-info">
				<ul class="car-gifts">
					<li v-for="(gift, index) in car.gifts" :key="index">
						<svg preserveAspectRatio="xMidYMid meet">
							<use :xlink:href="`#${gift.icon}`" />
						</svg>
						<span v-html="gift.text"></span>
					</li>
				</ul>
				<ul class="car-config">
					<li>
						Гарантия: <b>{{ body.warranty }}</b>
					</li>
					<li>
						Количество мест: <b>{{ body.seats }}</b>
					</li>
					<li>
						Максимальная мощность:
						<b>{{ page ? compl.power : body.completations[0].power }} л.с.</b>
					</li>
					<li>
						Расход топлива,100 км:
						<b
							>{{
								page ? compl.gasoline : body.completations[0].gasoline
							}}
							л.</b
						>
					</li>
					<li>
						Объем багажника: <b>{{ body.bug_value }} л.</b>
					</li>
				</ul>

				<div class="car-price" v-if="!page">
					<div class="car-price-item">
						<p>Скидка при кредите</p>
						<b>{{ body.benefit.toLocaleString() }} руб.*</b>
					</div>
					<div class="car-price-item">
						<p>Цена в кредит</p>
						<b>{{ getPrice(body.id) }} руб.*</b>
					</div>
				</div>
			</div>
			<div class="car-btns">
				<button
					class="btn"
					@click.prevent="openPopup('callBack', `Рассчитать в кредит`)"
				>
					Рассчитать в кредит
				</button>
				<button
					class="btn btn-dark"
					@click.prevent="carPage(carId)"
					v-if="!page"
				>
					Выбрать модель
				</button>
				<button
					class="btn btn-dark"
					@click.prevent="openPopup('callBack', `Купить в Trade-In`)"
				>
					Купить в Trade-In
				</button>
			</div>
		</div>
	</li>
</template>

<script>
export default {
	props: ["carId", "body", "page", "compl"],
	data() {
		return {
			car: []
		};
	},
	methods: {
		carPage(id) {
			this.$router.push(id);
		},
		getPrice(id) {
			const arr = [];
			this.car.body.forEach(body => {
				if (body.id === id) {
					body.completations.map(b => arr.push(b.price));
				}
			});
			return Math.min.apply(null, arr).toLocaleString();
		}
	},
	created() {
		this.car = this.$store.getters["cars/car"](this.carId);
	}
};
</script>

<style lang="sass">
.car-list-item
	list-style-type: none
	padding-bottom: 24px
	border-bottom: 1px solid #D0D3D4
	margin-bottom: 50px
.car-title
	display: inline-block
	margin-right: auto
	text-align: right
	p.title
		font-weight: 300
		font-size: 40px
		line-height: 48px
		color: $accent
	p.sub-title
		font-size: 21px
		line-height: 25px
.car-image
	width: 270px
	overflow: hidden
	figure
		width: 442px
		img
			display: block
			width: 100%
			height: auto
.car-row
	width: 100%
	display: flex
.car-info
	display: flex
	flex-wrap: wrap
	max-width: 570px
	width: 100%
	margin: 0px 30px
.car-gifts
	width: 270px
	list-style-type: none
	li
		display: flex
		align-items: center
		margin-bottom: 24px
		span
			font-weight: bold
			font-size: 14px
			line-height: 17px
			text-transform: uppercase
			width: 150px
	svg
		width: 34px
		margin-right: 10px
		height: 34px
		fill: $accent
.car-config
	width: 270px
	list-style-type: none
	margin-left: auto
	li
		margin-bottom: 10px
		font-size: 14px
		line-height: 17px
.car-price
	display: flex
	justify-content: space-between
	padding-top: 18px
	border-top: 1px solid #D0D3D4
	width: 100%

.car-price-item
	max-width: 270px
	width: 100%
	p
		font-size: 14px
		line-height: 17px
	>b
		font-weight: bold
		font-size: 24px
		line-height: 29px
		color: $accent
.car-btns
	width: 270px
	.btn
		margin: 15px 0
@include lg-desktop
	.car-row
		flex-wrap: wrap
	.car-btns
		width: 100%
		display: flex
		justify-content: space-between
		margin-top: 20px
@include md-desktop
	.car-btns
		width: 100%
		display: block
		margin-top: 20px
	.car-list-item
		display: flex
		flex-direction: column
	.car-image
		margin-left: auto
		margin-right: auto
		margin-bottom: 20px
	.car-title
		margin-left: auto
		margin-right: auto
	.car-info
		margin-left: auto
		margin-right: auto
	.car-btns
		display: flex
		flex-wrap: wrap
		justify-content: space-around
@include sm-mobile
	.car-title
		margin-left: 0
	.car-title p.title
		font-size: 21px
		line-height: 25px
	.car-title p.sub-title
		font-size: 14px
		line-height: 17px
	.car-gifts svg
		width: 26px
		height: 26px
	.car-gifts li span
		font-size: 12px
		line-height: 15px
		width: 100%
	.car-gifts li
		margin-bottom: 14px
	.car-config
		margin: 0
	.car-price-item > b
		font-size: 19px
		line-height: 25px
	.car-price-item
		width: 140px
	.car-btns .btn
		margin: 10px 0
	.car-btns
		margin-top: 10px
	.car-list-item
		margin-bottom: 20px
		padding-bottom: 10px
</style>
