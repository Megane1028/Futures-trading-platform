<template>
	<view>
		<uv-tabbar :value="value" @change="index=>value = index">
			<uv-tabbar-item text="首页" icon="home">
				<Index></Index>
			</uv-tabbar-item>
			<uv-tabbar-item text="放映厅" icon="photo"></uv-tabbar-item>
			<uv-tabbar-item text="直播" icon="play-right"></uv-tabbar-item>
			<uv-tabbar-item text="我的" icon="account"></uv-tabbar-item>
		</uv-tabbar>
	</view>
</template>

<script>
	import Index from '../../pages/index/index.vue'
	// import Index from '../index/index.vue'
	// import Index from '../index/index.vue'
	// import Index from '../index/index.vue'
	export default {
		components:{
			Index
		},
		data() {
			return {
				value: 0
			};
		}
	}
</script>

<style lang="less">

</style>