<template>
	<section id="car-profits">
		<div class="container">
			<ul class="car-profits--list">
				<li>
					<svg preserveAspectRatio="xMidYMid meet">
						<use :xlink:href="'#rub'" />
					</svg>
					<div class="text">
						<p class="title">Оплата проезад</p>
						<p class="sub-title">до салона при покупке авто в кредит</p>
					</div>
				</li>
				<li>
					<svg preserveAspectRatio="xMidYMid meet">
						<use :xlink:href="'#casco'" />
					</svg>
					<div class="text">
						<p class="title">Бесплатное КАСКО</p>
						<p class="sub-title">при покупке нового автомобиля в кредит</p>
					</div>
				</li>
				<li>
					<svg preserveAspectRatio="xMidYMid meet">
						<use :xlink:href="'#wheel'" />
					</svg>
					<div class="text">
						<p class="title">Зимняя резина</p>
						<p class="sub-title">в подарок при покупке нового авто в кредит</p>
					</div>
				</li>
			</ul>
		</div>
	</section>
</template>

<script>
export default {};
</script>

<style lang="sass">
.car-profits--list
	display: flex
	justify-content: center
	li
		list-style-type: none
		display: flex
		align-items: center
		max-width: 320px
		width: 100%
		margin: 0px 15px
		svg
			width: auto
			max-height: 100px
			display: block
			max-width: 100px
			fill: $dark
		.text
			margin-left: 24px
			width: 196px
			.title
				font-weight: bold
				font-size: 24px
				line-height: 29px
				color: $accent
			.sub-title
				font-size: 14px
				line-height: 17px

@include lg-desktop
	.car-profits--list li svg
		max-width: 50px
		max-height: 50px
	.car-profits--list li .text
		margin-left: 10px
	.car-profits--list
		flex-wrap: wrap
	.car-profits--list li
		margin-bottom: 30px

	.car-profits--list li .text .title
		font-size: 18px
		line-height: 22px
</style>
