<template>
	<view>
		<!-- 导航栏 -->
		<uni-nav-bar :border="false" statusBar :leftWidth="leftWidth" :rightWidth="rightWidth"
			:backgroundColor="backgroundColor" height="120rpx">
			<view class="tui-set" @click="onClickTitle">
				<image src="/static/zhuanhuan.png" class="tui-zhuanhuan" mode="" v-if="isTitleImg"></image>
				{{title}}
			</view>
			<template v-slot:left v-if="isLeft">
				<view class="tui-leftIcon" @click="onClickLeft">
					<uni-icons type="arrow-left" size="25" style="color: #fff;"></uni-icons>
				</view>
			</template>
			<template v-slot:right v-if="isRight">
				<view class="tui-leftIcon" @click="onClickRight" v-if="orderNum == 0">
					<image src="/static/righticon.png" class="tui-rightIconImg" mode=""></image>
				</view>
				<view class="tui-leftIcon2" @click="onClickRight" v-else>
					<view class="kz"></view>
					<image src="/static/righticon.png" class="tui-rightIconImg" style="position: relative;z-index: 29"
						mode=""></image>
				</view>
			</template>
		</uni-nav-bar>
	</view>
</template>

<script>
	export default {
		name: "headerTiltle",
		data() {
			return {

			};
		},
		props: {
			title: {
				default: '',
				type: String
			},
			rightWidth: {
				default: '',
				type: String
			},
			leftWidth: {
				default: '',
				type: String
			},
			backgroundColor: {
				default: '#f6f7fb',
				type: String
			},
			isLeft: {
				default: true,
				type: Boolean
			},
			isRight: {
				default: false,
				type: Boolean
			},
			isTitleImg: {
				default: false,
				type: Boolean
			},
			orderNum: {
				default: 0,
				type: Number
			}
		},
		methods: {
			onClickLeft() {
				const canNavBack = getCurrentPages()
				if (canNavBack && canNavBack.length > 1) {
					uni.navigateBack({
						delta: 1
					})
				} else {
					history.back()
				}
			},
			onClickRight() {
				uni.navigateTo({
					url: '/pages/order/order'
				})
			},
			onClickTitle() {
				this.$emit('onClickTitle')
			}
		}
	}
</script>

<style lang="less">
	.tui-zhuanhuan {
		width: 32rpx;
		height: 32rpx;
		margin-right: 10rpx;
	}

	.tui-rightIconImg {
		width: 48rpx;
		height: 48rpx;
	}

	.tui-set {
		flex: 1;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 35rpx;
		color: #222;
		font-weight: bold;
	}

	.tui-leftIcon {
		width: 80rpx;
		height: 80rpx;
		color: #fff !important;
		background-color: #cbcbcb;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;

	}

	.tui-leftIcon2 {
		width: 80rpx;
		height: 80rpx;
		color: #fff !important;
		background-color: #822151 !important;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
		margin-left: 40rpx;
		position: relative;
	}

	.kz {
		width: 80rpx;
		height: 80rpx;
		border-radius: 50%;
		background-color: #822151 !important;
		position: absolute;
		z-index: 28;
		opacity: 0.6;
		animation: shadow-expand 1s infinite;
	}

	@keyframes shadow-expand {
		0% {
			width: 80rpx;
			height: 80rpx;
			opacity: 0.6;
		}

		100% {
			width: 110rpx;
			height: 110rpx;
			opacity: 0.2;
		}
	}
</style>