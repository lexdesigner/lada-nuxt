<template>
	<div class="compl">
		<div class="compl-crop">
			<div class="compl-name">
				<p class="key">Комплектация</p>
				<p class="val">{{ compl.name }}</p>
			</div>
			<div class="compl-kpp">
				<p class="key">КПП</p>
				<p class="val">{{ compl.kpp }}</p>
			</div>
			<div class="compl-value">
				<p class="key">Объем</p>
				<p class="val">{{ compl.value }}</p>
			</div>
			<div class="compl-power">
				<p class="key">Мощность</p>
				<p class="val">{{ compl.power }}</p>
			</div>
			<div class="compl-benefit">
				<p class="key">Скидка при кредите</p>
				<p class="val">{{ benefit.toLocaleString() }} руб.*</p>
			</div>
			<div class="compl-price">
				<p class="key">Цена в кредит</p>
				<p class="val">{{ compl.price.toLocaleString() }} руб.*</p>
			</div>
			<div class="compl-open" @click="openCompl">
				<svg preserveAspectRatio="xMidYMid meet">
					<use :xlink:href="'#chevron'" />
				</svg>
			</div>
		</div>
		<div class="compl-full">
			<v-car
				:carId="carId"
				:body="body"
				:compl="compl"
				page="car"
				class="pagecar-car"
			/>
		</div>
	</div>
</template>

<script>
import vCar from "/components/vCar";
export default {
	props: ["compl", "bodyId", "carId"],
	components: {
		vCar
	},
	data() {
		return {
			benefit: null,
			body: null
		};
	},
	watch: {
		bodyId() {
			this.getBody();
		}
	},
	methods: {
		openCompl(event) {
			const complEl = event.target.closest(".compl");
			complEl.classList.toggle("open");
		},
		getBody() {
			const cars = this.$store.getters["cars/cars"];
			cars.forEach(car => {
				if (car.id === this.carId) {
					this.body = car.body.find(body => body.id === this.bodyId);
					this.benefit = this.body.benefit;
				}
			});
		}
	},
	created() {
		this.getBody();
	}
};
</script>

<style lang="sass">
.compl-crop
	display: flex
	justify-content: space-between
	align-items: center
	margin-top: 40px
	padding: 15px 0
	border-bottom: 1px solid #D0D3D4
	.val
		font-size: 14px
		line-height: 17px
		font-weight: bold
		text-transform: uppercase
	.key
		font-size: 14px
		line-height: 17px
.compl-name
	width: 170px
.compl-kpp
	width: 170px
.compl-value
	width: 120px
.compl-power
	width: 120px
.compl-benefit
	width: 175px
	.val
		color: $accent
		font-size: 24px
		line-height: 29px
.compl-price
	width: 175px
	.val
		color: $accent
		font-size: 24px
		line-height: 29px
.compl-open
	width: 75px
	padding: 0 25px
	border-left: 1px solid #D0D3D4
	height: 50px
	display: flex
	align-items: center
	justify-content: center
	cursor: pointer
	&:hover
		svg
			opacity: 0.7
	svg
		display: block
		width: 25px
		height: 25px
		transition: .3s ease
		fill: $accent
.pagecar-car
	padding-top: 30px
	display: none
.compl.open
	.pagecar-car
		display: block
	.compl-open
		svg
			transform: rotate(180deg)

@include lg-desktop
	.compl-benefit .val,
	.compl-price .val
		font-size: 20px
		line-height: 1.2
@include md-desktop
	.compl-benefit
		order: 2
		margin-left: auto
		margin-right: auto
		margin-top: 10px
	.compl-price
		order: 3
		margin-left: auto
		margin-right: auto
		margin-top: 10px
	.compl-crop
		flex-wrap: wrap

@include sm-mobile
	.compl-kpp,
	.compl-value,
	.compl-power
		display: none
	.compl-benefit
		margin: 0
		width: 140px
		margin-top: 20px
	.compl-price
		margin: 0
		width: 140px
		margin-top: 20px
	.compl-benefit .val, .compl-price .val
		font-size: 19px
</style>
