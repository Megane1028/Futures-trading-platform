<template>
	<view>
		<view class="flex flex-column flex-content flex-item" style="margin-top: 248rpx;">
			<slot></slot>
			<view class="tui-text">
				{{title}}
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		name: "noData",
		data() {
			return {

			};
		},
		props: {
			title: {
				type: String,
				default: ''
			}
		}
	}
</script>

<style lang="less">
	.tui-text {
		font-size: 28rpx;
		color: #a8a9ac;
	}
</style>