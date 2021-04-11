<template>
	<div>
		<nuxt />
		<popup-callback />
		<popup-politic />
	</div>
</template>
<script>
import popupCallback from "/components/modals/popupCallback";
import popupPolitic from "/components/modals/popupPolitic";

export default {
	components: {
		popupCallback,
		popupPolitic
	}
};
</script>

<style></style>
