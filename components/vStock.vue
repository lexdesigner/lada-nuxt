<template>
	<section id="stock">
		<div class="container">
			<h2>Автомобили в наличии</h2>
			<div class="stock-controls">
				<select
					name="model"
					id="model"
					v-model="model.name"
					@change="filterName"
				>
					<option value="">Выберите модель</option>
					<option
						:value="opt"
						v-for="(opt, index) in stockKeys('name')"
						:key="index"
						>{{ opt }}</option
					>
				</select>
				<select
					name="completation"
					id="completation"
					v-model="model.completation"
					:disabled="!model.name"
					@change="filterCompletation"
				>
					<option value="">Выберите комплектацию</option>
					<option
						:value="opt"
						v-for="(opt, index) in stockKeys('completation')"
						:key="index"
						>{{ opt }}</option
					>
				</select>
				<select
					name="power"
					id="power"
					v-model="model.power"
					:disabled="!model.completation"
					@change="filterPower"
				>
					<option value="">Выберите двигатель</option>
					<option
						:value="opt"
						v-for="(opt, index) in stockKeys('power')"
						:key="index"
						>{{ opt }}</option
					>
				</select>
			</div>
			<ul class="stock-list" v-if="!mobile">
				<li v-for="(car, index) in stock" :key="index" v-show="index < carView">
					<div class="name">{{ car.name }}</div>
					<div class="image">
						<figure>
							<img :src="`img/cars/${car.id}/image.png`" :alt="car.name" />
						</figure>
						<div class="info-list">
							<div class="info-list--item">
								<span>Двигатель:</span><b>{{ car.power }}</b>
							</div>
							<div class="info-list--item">
								<span>Комплектация:</span><b>{{ car.completation }}</b>
							</div>
							<!-- <div class="info-list--item">
								<span>Цвет:</span><b>{{ car.color }}</b>
							</div> -->
						</div>
						<div class="price">
							<span>Цена:</span>
							<b>{{ car.price.toLocaleString() }} руб.</b>
						</div>
						<div class="benefit">
							<span>Выгода до:</span
							><b>{{ car.benefit.toLocaleString() }} руб.</b>
						</div>
						<button
							class="btn"
							@click.prevent="
								openPopup('callBack', `Забронировать ${car.name}`)
							"
						>
							Забронировать
						</button>
					</div>
				</li>
			</ul>
			<Flickity
				class="flickity-stock"
				ref="flickity2"
				:options="flickityOptions"
				v-if="mobile"
			>
				<div v-for="(car, index) in stock" :key="index" class="stock-sell">
					<div class="name">{{ car.name }}</div>
					<div class="image">
						<figure>
							<img :src="`img/cars/${car.id}/image.png`" :alt="car.name" />
						</figure>
						<div class="info-list">
							<div class="info-list--item">
								<span>Двигатель:</span><b>{{ car.power }}</b>
							</div>
							<div class="info-list--item">
								<span>Комплектация:</span><b>{{ car.completation }}</b>
							</div>
							<!-- <div class="info-list--item">
								<span>Цвет:</span><b>{{ car.color }}</b>
							</div> -->
						</div>
						<div class="price">
							<span>Цена:</span>
							<b>{{ car.price.toLocaleString() }} руб.</b>
						</div>
						<div class="benefit">
							<span>Выгода до:</span
							><b>{{ car.benefit.toLocaleString() }} руб.</b>
						</div>
						<button
							class="btn"
							@click.prevent="
								openPopup('callBack', `Забронировать ${car.name}`)
							"
						>
							Забронировать
						</button>
					</div>
				</div>
			</Flickity>
		</div>
	</section>
</template>

<script>
export default {
	data() {
		return {
			carView: 4,
			model: {
				name: "",
				completation: "",
				power: ""
			},
			stock: [],
			mobile: false,
			flickityOptions: {
				prevNextButtons: true,
				pageDots: false,
				freeScroll: false,
				arrowShape: {
					x0: 15,
					x1: 60,
					y1: 35,
					x2: 65,
					y2: 30,
					x3: 25
				}
			}
		};
	},
	methods: {
		stockKeys(key) {
			if (key === "name") {
				const keys = [];
				this.$store.getters["cars/stock"].map(car => keys.push(car[key]));
				return [...new Set(keys)];
			} else {
				const keys = [];
				this.stock.map(car => keys.push(car[key]));
				return [...new Set(keys)];
			}
		},
		refreshCarousel() {
			if (this.mobile) {
				this.$refs.flickity2.select(0);
				this.$refs.flickity2.reloadCells();
			}
		},
		filterName() {
			if (this.model.name) {
				const stock = this.$store.getters["cars/stock"];
				this.stock = stock.filter(s => s.name === this.model.name);
				this.model.completation = "";
				this.model.power = "";
			} else {
				this.refreshStock();
			}
			this.refreshCarousel();
		},
		filterCompletation() {
			if (this.model.completation) {
				const stock = this.$store.getters["cars/stock"];
				this.stock = stock.filter(
					s =>
						s.name === this.model.name &&
						s.completation === this.model.completation
				);
				this.model.power = "";
			} else {
				this.filterName();
			}
			this.refreshCarousel();
		},
		filterPower() {
			if (this.model.power) {
				const stock = this.$store.getters["cars/stock"];
				this.stock = stock.filter(
					s =>
						s.name === this.model.name &&
						s.completation === this.model.completation &&
						s.power === this.model.power
				);
			} else {
				this.filterCompletation();
			}
			this.refreshCarousel();
		},
		refreshStock() {
			this.stock = this.$store.getters["cars/stock"];
		}
	},
	created() {
		this.refreshStock();
	},
	mounted() {
		this.mobile = this.isMobile();
	}
};
</script>

<style lang="sass">
#stock
	margin-top: 20px
.stock-controls
	display: flex
	justify-content: center
	margin-top: 60px
	select
		margin: 0px 15px
.stock-list
	display: flex
	list-style-type: none
	margin-top: 50px
	li
		width: 270px
		margin: 0px 15px
		.name
			font-weight: bold
			font-size: 24px
			line-height: 29px
		.image
			width: 100%
			overflow: hidden
			figure
				width: 442px
				img
					display: block
					width: 100%
					height: auto
		.info-list
			border-bottom: 1px solid #D0D3D4
			.info-list--item
				font-size: 14px
				line-height: 17px
				margin-bottom: 10px
				b
					padding-left: 10px
		.price
			margin: 10px 0
			font-size: 14px
			line-height: 17px
			b
				display: block
				font-size: 24px
				line-height: 29px
		.benefit
			font-size: 14px
			line-height: 17px
			b
				color: $accent
				padding-left: 10px
		.btn
			margin-top: 30px
@include lg-desktop
	.stock-list
		flex-wrap: wrap
	.stock-list li
		margin-bottom: 40px
@include md-desktop
	.stock-controls select
		margin: 0px 5px
@include sm-mobile
	#stock
		margin-top: 0
	.stock-controls
		margin-top: 30px
		flex-wrap: wrap
		justify-content: center
	.stock-controls select
		margin-bottom: 20px
	.stock-list
		margin-top: 10px
	.stock-sell
		width: 270px
		margin: 0px 10px
		.name
			font-weight: bold
			font-size: 24px
			line-height: 29px
		.image
			width: 270px
			overflow: hidden
			img
				width: 442px
		.info-list
			border-bottom: 1px solid #D0D3D4
			margin-bottom: 14px
			.info-list--item
				font-size: 14px
				line-height: 17px
				margin-bottom: 10px
		.price
			margin-bottom: 14px
			b
				display: block
				font-size: 24px
				line-height: 29px
			span
				font-size: 14px
				line-height: 17px
		.benefit
			b
				font-size: 14px
				line-height: 17px
				color: $accent
			span
				font-size: 14px
				line-height: 17px
		.btn
			margin-top: 30px
	.flickity-stock
		width: 100vw
		position: relative
		left: -15px
</style>
