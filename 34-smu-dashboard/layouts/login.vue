<template>
	<div dir="ltr">
		<main class="w-screen h-screen text-white">
			<Nuxt />
		</main>
	</div>
</template>

<script>
export default {
	name: "login",
	components: {},
};
</script>

<style scoped>
.bg {
	background: linear-gradient(-45deg, #E43D3D, #ffa3a3, #E43D3D, #db0000);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
}


@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
</style>
