<template>
	<section class="fixed top-0 left-0 flex flex-col mt-24">
		<div
			class="px-4 py-3 my-2 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md"
			role="alert"
			v-for="n in 5"
			:key="n"
		>
			<div class="flex">
				<div class="py-1">
					<svg
						class="w-6 h-6 mr-4 text-teal-500 fill-current"
						xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 20 20"
					>
						<path
							d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"
						/>
					</svg>
				</div>
				<div>
					<p class="font-bold">{{ $t('settings.privacy_policy') }}</p>
					<p class="text-sm">
						{{ $t('settings.privacy_policy') }}
						{{ $t('settings.make_sure_changes_affect') }}.
					</p>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
export default {
	name : "Notification" 
};
</script>

<style>
</style>