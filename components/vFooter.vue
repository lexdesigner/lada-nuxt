<template>
	<footer id="footer">
		<div class="container">
			<div class="footer-info">
				<p>
					© 2021 Официальный дилер.
					<a
						href="#"
						@click.prevent="
							openPopup('politic', 'Политика обработки персональных данных')
						"
						class="politic"
						>Политика конфиденциальности</a
					>
				</p>
				<p class="disclaimer">
					* - Рекомендованные розничные цены указаны с учетом максимальной
					выгоды по действующим акциям. Информация о технических
					характеристиках, составе комплектаций, цветовой гамме и
					рекомендованных розничных ценах, опубликованных на официальном сайте,
					носит справочный характер и ни при каких обстоятельствах не является
					публичной офертой, определяемой положениями Статьи 437 ч.2
					Гражданского кодекса Российской Федерации. Для получения подробной
					информации обращайтесь к официальным дилерам АО ''АВТОВАЗ''.
				</p>
			</div>
		</div>
		<v-icons />
	</footer>
</template>

<script>
import vIcons from "/components/vIcons";
export default {
	components: {
		vIcons
	}
};
</script>

<style lang="sass">
#footer
	background-color: #495966
	color: #fff
	p
		padding-bottom: 24px
		font-size: 14px
		line-height: 17px
	a.politic
		padding-left: 30px

@include sm-mobile
	#footer a.politic
		padding-left: 0
		display: block
</style>
