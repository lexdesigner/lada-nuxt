<template>
	<div class="container">
		<div class="completations" :id="selectId">
			<div
				class="completations-config"
				v-for="(cfg, index) in configs"
				:key="index"
			>
				<p class="title">{{ cfg }}</p>

				<v-compl
					v-for="(compl, index) in complCfg(cfg)"
					:key="index"
					:compl="compl"
					:bodyId="selectId"
					:carId="carId"
				/>
			</div>
		</div>
	</div>
</template>

<script>
import vCompl from "/components/carPage/vCompl";

export default {
	props: ["select-id", "carId"],
	components: {
		vCompl
	},
	data() {
		return {
			completations: []
		};
	},
	watch: {
		selectId() {
			console.log(this.selectId);
			console.log(this.completations);
			this.getCompletations();
		}
	},
	methods: {
		complCfg(cfg) {
			return this.completations.filter(compl => compl.config === cfg);
		},
		getCompletations() {
			const cars = this.$store.getters["cars/cars"];
			cars.forEach(car => {
				if (car.id === this.carId) {
					car.body.forEach(item => {
						if (item.id === this.selectId) {
							this.completations = item.completations;
						}
					});
				}
			});
		}
	},
	computed: {
		configs() {
			return [...new Set(this.completations.map(a => a.config))];
		}
	},
	created() {
		this.getCompletations();
	}
};
</script>

<style lang="sass">
.completations-config
	padding-top: 30px
	p.title
		color: $accent
		font-size: 21px
		line-height: 25px
</style>
