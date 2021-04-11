import Vue from "vue";
Vue.mixin({
	methods: {
		openPopup(name, title) {
			this.$store.commit("modals/modalOpen", { name, title });
		},
		closePopup(name) {
			this.$store.commit("modals/modalClose", { name });
		},
		isMobile() {
			const SCREENSIZE = 480;
			var w = window,
				d = document,
				e = d.documentElement,
				g = d.getElementsByTagName("body")[0],
				x = w.innerWidth || e.clientWidth || g.clientWidth;
			// y = w.innerHeight || e.clientHeight || g.clientHeight;
			return x <= SCREENSIZE ? true : false;
		}
	}
});
