<template>
	<view class="tab-bar">
		<view class="content">
			<view class="one-tab" v-for="(item, index) in tabBarList" :key="index" @click="selectTabBar(item.pagePath)">
				<view>
					<view class="tab-img">
						<image v-if="actIndex === index" class="img" :src="item.selectedIconPath"></image>
						<image v-else class="img" :src="item.iconPath"></image>
					</view>
				</view>
				<view v-if="actIndex === index" class="tit selectTexts">{{ item.text }}</view>
				<view v-else class="tit texts">{{ item.text }}</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		name: "tabBar",
		props: {
			// 当前页面路径
			actIndex: {
				type: Number,
				required: true
			}
		},
		data() {
			return {
				tabBarList: [{
						"pagePath": "/pages/index/index",
						"text": this.$t('app.tabbar.sy'),
						"iconPath": require("@/static/tabbar/index.png"),
						"selectedIconPath": require("@/static/tabbar/index_active.png")
					},
					{
						"pagePath": "/pages/product/product",
						"text": this.$t('app.tabbar.cp'),
						"iconPath": require("@/static/tabbar/chanpin.png"),
						"selectedIconPath": require("@/static/tabbar/chanpin_active.png")
					},
					{
						"pagePath": "/pages/money/money",
						"text": this.$t('app.tabbar.yeb'),
						"iconPath": require("@/static/tabbar/yue.png"),
						"selectedIconPath": require("@/static/tabbar/yue_active.png")
					},
					{
						"pagePath": "/pages/user/user",
						"text": this.$t('app.tabbar.grzx'),
						"iconPath": require("@/static/tabbar/my.png"),
						"selectedIconPath": require("@/static/tabbar/my_active.png")
					}
				]
			}
		},
		methods: {
			selectTabBar(path) {
				uni.switchTab({
					url:path
				})
			}
		},
	}
</script>

<style lang="scss">
	.tab-bar {
		position: fixed;
		bottom: 0;
		left: 0;
		width: 100vw;
		padding-top: 10rpx;
		padding-bottom: calc(10rpx + constant(safe-area-inset-bottom));
		padding-bottom: calc(10rpx + env(safe-area-inset-bottom));
		background-color: #fff;
		z-index: 8888;

		.content {
			display: flex;

			.one-tab {
				display: flex;
				flex-direction: column;
				align-items: center;
				width: 50%;

				.tab-img {
					width: 50rpx;
					height: 50rpx;

					.img {
						width: 100%;
						height: 100%;
					}
				}

				.tit {
					font-size: 30rpx;
					transform: scale(0.7);
				}

				.selectTexts {
					color:  #1150C2;
				}

				.texts {
					color: rgb(168, 169, 172);
				}
			}
		}
	}
</style>