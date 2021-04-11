<template>
	<section id="main-benefits">
		<div class="contianer">
			<ul class="main-benefits-list">
				<li>
					<svg preserveAspectRatio="xMidYMid meet">
						<use :xlink:href="'#car'" />
					</svg>

					<span>Все модели <br />в наличии</span>
				</li>
				<li>
					<svg preserveAspectRatio="xMidYMid meet">
						<use :xlink:href="'#rub'" />
					</svg>
					<span>Новая LADA <br />от {{ minPrice }} руб.</span>
				</li>
				<li>
					<svg preserveAspectRatio="xMidYMid meet">
						<use :xlink:href="'#casco'" />
					</svg>
					<span>Бесплатное <br />КАСКО</span>
				</li>
				<li>
					<svg preserveAspectRatio="xMidYMid meet">
						<use :xlink:href="'#wheel'" />
					</svg>
					<span>Зимняя резина <br />в подарок</span>
				</li>
			</ul>
		</div>
	</section>
</template>

<script>
export default {
	computed: {
		minPrice() {
			return this.$store.getters["cars/minPrice"].toLocaleString();
		}
	}
};
</script>

<style lang="sass">
.main-benefits-list
	display: flex
	list-style-type: none
	justify-content: center
	li
		width: 270px
		text-align: center
		margin: 0px 15px
		svg
			height: 70px
			display: block
			max-width: 100%
			margin: 0 auto
			margin-bottom: 30px
			fill: $dark
		span
			font-size: 21px
			line-height: 25px
@include lg-desktop
@include md-desktop
	.main-benefits-list li svg
		width: 55px
		margin-bottom: 20px
	.main-benefits-list li span
		font-size: 16px
		line-height: 1.2

@include sm-mobile
	.main-benefits-list
		flex-wrap: wrap
	.main-benefits-list li svg
		height: 50px
		width: 50px
		margin-bottom: 15px
	.main-benefits-list li span
		font-size: 14px
		line-height: 17px
	.main-benefits-list li
		width: 120px
		margin-bottom: 30px
</style>
