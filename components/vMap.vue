<template>
	<yandex-map :coords="[55.678397, 37.853416]" :zoom="10" id="map">
		<ymap-marker
			:coords="[55.678397, 37.853416]"
			marker-id="123"
			:icon="markerIcon"
		/>
	</yandex-map>
</template>

<script>
export default {
	data() {
		return {
			markerIcon: {
				imageHref: "/img/point.png",
				imageSize: [140, 149],
				imageOffset: [-70, -74.5],
				layout: "default#image"
			}
		};
	}
};
</script>

<style lang="sass">
#map
	width: 100%
	height: 670px
@include sm-mobile
	#map
		height: 340px
</style>
