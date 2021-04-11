<template>
	<div class="popup">
		<el-dialog
			:title="title"
			:visible.sync="visible"
			center
			custom-class="politic-modal"
			:before-close="closeModal"
		>
			<span>
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae
				veniam sunt debitis ducimus! Quod eius eaque itaque sunt nam ex et
				quaerat facilis voluptatem, neque officiis fugit reprehenderit optio
				recusandae iure accusamus dicta ab molestiae. Laboriosam earum odio sint
				esse repellat culpa, tenetur et ducimus sequi totam? Laborum cum, fugit
				exercitationem, eum, illo reiciendis quo velit possimus sequi nobis
				laudantium? Earum sunt doloremque sed, optio, accusamus sapiente
				cupiditate aliquid deleniti aspernatur quasi quisquam quos id tempora
				maiores ex atque eveniet exercitationem numquam consequuntur. Deleniti,
				at placeat amet reprehenderit expedita iusto quam atque, similique
				necessitatibus nam rem quos fuga? Nisi placeat est voluptatum, at
				possimus commodi quidem, neque, consequatur perspiciatis provident
				deleniti rerum mollitia nesciunt excepturi atque hic fuga pariatur amet
				aut sapiente. Quam minus incidunt distinctio, enim repellat iusto
				ducimus quas asperiores commodi aut similique aperiam debitis
				consequuntur dignissimos cumque doloremque consectetur quidem quia
				libero? Modi explicabo nihil soluta id aspernatur asperiores laboriosam?
				Eius vitae similique rerum hic, odit, ea, voluptas dolore nulla quam
				inventore dignissimos porro itaque dolorem sint. Recusandae quo unde,
				animi officiis sequi modi quam tenetur, libero assumenda magnam minus.
				Inventore aut pariatur laborum quisquam, quibusdam molestiae ducimus
				minima ratione dicta, odit veritatis? Ab nulla ut ex.
			</span>
		</el-dialog>
	</div>
</template>

<script>
export default {
	methods: {
		closeModal() {
			this.closePopup("politic");
		}
	},
	computed: {
		title() {
			return this.$store.getters["modals/title"];
		},
		visible() {
			return this.$store.getters["modals/politic"] &&
				this.$store.getters["modals/visible"]
				? true
				: false;
		}
	}
};
</script>

<style lang="sass">
.politic-modal
	max-width: 500px
	width: 100%
	padding: 20px
	box-shadow: 0px 13px 30px rgba(0, 0, 0, 0.25)
	border-radius: 10px
</style>
