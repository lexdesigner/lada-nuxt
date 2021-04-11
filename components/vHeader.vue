<template>
	<header id="header">
		<div class="container header-wrapper">
			<div class="header-logo" @click.prevent="goHome">
				<img src="img/lada-logotop.jpg" alt="Lada" class="img-responsive" />
			</div>
			<div class="header-address">
				<p>г. Москва, <br />5 минут от м. Котельники</p>
			</div>
			<nav :class="[menuVisible ? 'open' : '', 'header-nav']">
				<ul>
					<li>
						<a href="#" @click.prevent="scrollTo('cars')">Модельный ряд</a>
					</li>
					<li>
						<a href="#" @click.prevent="scrollTo('benefits')">Преимущества</a>
					</li>
					<li>
						<a href="#" @click.prevent="scrollTo('stock')">Авто в наличии</a>
					</li>
					<li>
						<a href="#" @click.prevent="scrollTo('contacts')">Контакты</a>
					</li>
				</ul>
			</nav>
			<div class="header-contacts">
				<v-phone />
				<a
					href="#"
					class="header-callback"
					@click.prevent="openPopup('callBack')"
					>Заказать звонок</a
				>
			</div>
			<button
				id="burger"
				:class="[menuVisible ? 'open' : '', 'burger']"
				@click.prevent="menuVisible = !menuVisible"
			>
				<span></span>
				<span></span>
				<span></span>
			</button>
		</div>
	</header>
</template>

<script>
import vPhone from "/components/vPhone";
export default {
	data() {
		return {
			menuVisible: false
		};
	},
	components: {
		vPhone
	},
	methods: {
		scrollTo(link) {
			const top = document.getElementById(link);
			const header = document.querySelector("header");
			this.menuVisible = false;
			window.scrollTo({
				top: top.offsetTop - header.offsetHeight,
				behavior: "smooth"
			});
			document.activeElement.blur();
		},
		goHome() {
			this.$router.push("/");
		}
	}
};
</script>

<style lang="sass">
.burger
	display: none
#header
	position: fixed
	top: 0
	left: 0
	width: 100%
	padding: 20px 0
	z-index: 10
	&::after
		content: ''
		position: absolute
		width: 100%
		height: 165px
		background-image: url('/img/header-bg.png')
		top: 0
		left: 0
		z-index: -1
		background-size: cover
		background-repeat: no-repeat
.header-wrapper
	display: flex
	align-items: center
	justify-content: space-between
.header-logo
	width: 232px
	padding-right: 35px
	border-right: 1px solid #D0D3D4
	cursor: pointer
.header-address
	margin-left: 20px
	margin-right: auto
	font-size: 14px
	line-height: 17px

.header-nav
	margin-left: auto
	margin-right: 35px
	ul
		display: flex
		align-items: center
		list-style-type: none
		li
			margin: 0px 15px
			a
				color: $dark
				font-size: 14px
				line-height: 17px
				text-decoration: none
				&:hover
					color: $accent
.header-contacts
	text-align: right
.header-callback
	margin-top: 7px
	display: block
	text-decoration: none
	font-size: 14px
	line-height: 17px
@include lg-desktop
	#header::after
		height: 128px
	.burger
		display: block
		position: relative
		width: 30px
		height: 25px
		display: block
		border: none
		background-color: transparent
		margin-left: 20px
		outline: none
		span
			display: block
			height: 4px
			width: 100%
			background-color: $accent
			position: absolute
			top: 0
			left: 0
			transition: .3s cubic-bezier(1,1,.44,.92)
			&:nth-child(2)
				top: 50%
				transform: translateY(-50%)  scale(1)
			&:nth-child(3)
				top: auto
				bottom: 0
		&.open
			span:nth-child(2)
				transform: translateY(-50%) scale(0)
			span:first-child
				transform: rotate(45deg) translate(45%,50%)
			span:nth-child(3)
				transform: rotate(-45deg) translate(45%, -50%)
			span
				left: -5px
	.header-nav
		position: absolute
		z-index: -1
		top: 75px
		background-color: #fff
		left: 0
		width: 100%
		padding: 100px
		transform: translateY(-100%)
		transition: .3s ease
		box-shadow: 0px 13px 30px rgba(0, 0, 0, 0.25)
		&.open
			transform: translateY(0)
		ul
			display: block
			li
				width: 280px
				padding: 15px 0
				border-bottom: 1px dashed #D0D3D4
				margin: 0 auto
				text-align: center
@include sm-mobile
	.header-address
		display: none
	.header-logo
		width: 84px
		padding: 0
		border: none
	.header-callback
		display: none
	.phone a
		font-size: 14px
	.burger
		width: 18px
		height: 18px
		span
			height: 3px
	.header-nav
		padding: 10px
	#header::after
		height: 74px
	.header-nav
		top: 50px
		padding-top: 40px
	.header-nav ul li
		width: 100%
</style>
