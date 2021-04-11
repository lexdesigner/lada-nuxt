<template>
	<section id="benefits">
		<div class="container">
			<h2>Преимущества покупки LADA в кредит</h2>
			<ul class="benefits-list">
				<li v-for="(txt, index) in benefits" :key="index">
					<b
						>{{ (index + 1).toString().length < 2 ? "0" : ""
						}}{{ index + 1 }}</b
					>
					<span v-html="txt"></span>
				</li>
			</ul>
		</div>
	</section>
</template>

<script>
export default {
	data() {
		return {
			benefits: [
				"ВЫГОДНЫЕ УСЛОВИЯ ПО КРЕДИТУ ОТ 1.9%",
				"ПЕРВОНАЧАЛЬНЫЙ ВЗНОС ОТ 0 РУБЛЕЙ",
				"СРОК КРЕДИТОВАНИЯ ОТ 6 МЕСЯЦЕВ ДО 8 ЛЕТ",
				"СУММА КРЕДИТОВАНИЯ ДО 3 000 000 РУБЛЕЙ",
				"ДОСРОЧНОЕ ПОГАШЕНИЕ БЕЗ ШТРАФОВ И КОМИССИЙ",
				'ЛЬГОТНОЕ КРЕДИТОВАНИЕ ПО СИСТЕМАМ "ПЕРВЫЙ АВТОМОБИЛЬ" И "СЕМЕЙНЫЙ АВТОМОБИЛЬ',
				"ОПЛАТА ПРОЕЗДА ДО САЛОНА ПРИ ПОКУПКЕ АВТО&nbsp;В&nbsp;КРЕДИТ",
				"БЕСПЛАТНОЕ КАСКО ПРИ ПОКУПКЕ НОВОГО АВТО В&nbsp;КРЕДИТ",
				"ТРЕЙД-ИН С ВЫГОДОЙ ДО 50 000 РУБЛЕЙ",
				"ЗИМНЯЯ РЕЗИНА В ПОДАРОК ПРИ ПОКУПКЕ НОВОГО АВТО В КРЕДИТ",
				"БОЛЕЕ 40 БАНКОВ ПАРТНЕРОВ"
			]
		};
	}
};
</script>

<style lang="sass">
#benefits
	margin-top: 80px
	background-image: url('/img/benefits-bg.jpg')
	background-size: cover
	background-repeat: no-repeat
	background-position: center bottom
	min-height: 600px
.benefits-list
	margin-top: 120px
	margin-bottom: 170px
	display: flex
	flex-direction: column
	height: 280px
	flex-wrap: wrap
	counter-reset: section
	align-items: center
	li
		list-style-type: none
		margin: 12px 0
		font-weight: bold
		font-size: 14px
		line-height: 17px
		text-transform: uppercase
		color: $accent
		max-width: 440px
		width: 100%
		display: flex
		span
			color: #fff
			padding-left: 12px


@include lg-desktop
@include md-desktop
	.benefits-list
		height: auto
		display: block
		margin-top: 70px
		margin-bottom: 70px
		li
			margin-left: auto
			margin-right: auto
@include sm-mobile
	#benefits
		margin-top: 30px
		min-height: 680px
	.benefits-list li
		b
			font-size: 14px
			line-height: 17px
		span
			font-size: 12px
			line-height: 15px
</style>
