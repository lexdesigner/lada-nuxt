<template>
	<section id="contacts">
		<v-map />
		<div class="container">
			<div class="contacts-info">
				<p class="title">Официальный дилер LADA</p>
				<p class="address">
					<svg preserveAspectRatio="xMidYMid meet">
						<use :xlink:href="'#point'" />
					</svg>
					г. Москва, Привольная 70 <br />
					Метро: Котельники
				</p>
				<p class="graphic">
					<svg preserveAspectRatio="xMidYMid meet">
						<use :xlink:href="'#phone'" />
					</svg>
					Ежедневно с {{ time_work_from }}:00 до {{ time_work_to }}:00
				</p>
				<v-phone />
				<button
					class="btn"
					@click.prevent="openPopup('callBack', `Заказать звонок`)"
				>
					Заказать звонок
				</button>
			</div>
		</div>
	</section>
</template>

<script>
import vMap from "/components/vMap";
import vPhone from "/components/vPhone";
export default {
	components: {
		vMap,
		vPhone
	},
	computed: {
		time_work_from() {
			return this.$store.getters["info/time_work_from"];
		},
		time_work_to() {
			return this.$store.getters["info/time_work_to"];
		}
	}
};
</script>

<style lang="sass">
#contacts
	position: relative
	&::after
		content: ''
		position: absolute
		top: 0
		left: 0
		width: 100%
		height: 146px
		background-image: url('/img/lada-topline2.png')
		background-size: cover
		background-repeat: no-repeat
		background-position: center top
		z-index: 2
	&::before
		content: ''
		position: absolute
		bottom: 0
		left: 0
		width: 100%
		height: 146px
		background-image: url('/img/lada-topline3.png')
		background-size: cover
		background-repeat: no-repeat
		background-position: center bottom
		z-index: 2
	.container
		position: relative
.contacts-info
	position: absolute
	left: 0
	bottom: 155px
	background-color: #fff
	z-index: 3
	border-radius: 5px
	padding: 60px 35px
	.title
		font-size: 21px
		line-height: 25px
	.address
		display: flex
		align-items: center
		font-size: 14px
		line-height: 17px
		margin-top: 24px
		svg
			fill: #fff
			width: 18px
			height: 18px
			margin-right: 14px
	.graphic
		display: flex
		align-items: center
		font-size: 14px
		line-height: 17px
		margin-top: 24px
		svg
			fill: #fff
			width: 18px
			height: 18px
			margin-right: 14px
	.phone
		display: block
		margin: 24px 0
		font-size: 14px
		line-height: 17px
@include sm-mobile
	.contacts-info
		width: 100vw
		left: 0
		position: relative
		left: -15px
		bottom: 0
		padding: 35px 15px
		z-index: 1
	.contacts-info .address
		width: 210px
		margin-left: auto
		margin-right: auto
	.contacts-info .graphic
		width: 210px
		margin-left: auto
		margin-right: auto
	.contacts-info .phone
		text-align: center
	#contacts
		padding-bottom: 65px
	#contacts::before,
	#contacts::after
		height: 74px
</style>
