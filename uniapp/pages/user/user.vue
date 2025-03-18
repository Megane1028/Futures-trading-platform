<template>
	<view class="tui-header">
		<view class="tui-userInfo">
			<view class="flex flex-column">
				<view class="name">
					{{userInfo.username}}
				</view>
				<view class="desc">
					<view class="rellname">
						{{userInfo.real_name.substr(0,1)+new Array(userInfo.real_name.length).join('*')}}
					</view>
					<view class="tui-vip">
						<image src="/static/vip.png" mode=""></image>
						<view class="">
							{{$t('user.ptyh')}}
						</view>
					</view>
				</view>
				<view class="tui-credit">
					<image src="/static/xinyong.png" mode=""></image>
					<view class="">
						{{$t('user.xyf')}}:{{userInfo.credit_score}}
					</view>
				</view>
			</view>
			<view class="tui-kaihu" hover-class="tui-kaihuHover" @click="onClickFuzhi(userInfo.code)">
				<text>{{$t('user.khm')}}</text>
				<text style="padding-left: 10rpx;">{{userInfo.code}}</text>
				<image src="../../static/fuzhi.png" mode=""></image>
			</view>
		</view>
		<view class="tui-money">
			<view class="normal">
				<view class="flex flex-column">
					<view class="text-xs">
						{{$t('user.zzc')}}(CNY)
					</view>
					<view class="pice">
						<text class="unit">￥</text>
						{{userInfo.money}}
					</view>
					<view class="mt-sm">
						<text>≈</text>
						<view class="unit">
							{{userInfo.usdt_money}}USDT
						</view>
					</view>
				</view>
				<view class="flex-1"></view>
				<view class="flex flex-between flex-content" style="margin-top: 60rpx;">
					<view class="flex flex-column flex-item">
						<view class="all-size">
							{{$t('user.zhyk')}}
						</view>
						<view class="big-size">
							{{userInfo.yk}}
						</view>
					</view>
					<view class="flex flex-column flex-item" style="margin-left: 84rpx;">
						<view class="all-size">
							{{$t('user.jryk')}}
						</view>
						<view class="big-size">
							{{userInfo.yk_today}}
						</view>
					</view>
				</view>
				<view class="tui-position">
					<image src="../../static/cny.png" mode=""></image>
				</view>
			</view>
			<view class="tui-spendMoney">
				<view class="tui-spendMoneyItem">
					<view class="cny">
						{{$t('user.kyye')}}(CNY)
					</view>
					<view class="pice">
						￥{{userInfo.money}}
					</view>
				</view>
				<view class="tui-rightItem" @click="getUserIndex">
					<image src="/static/rujin.png" mode=""></image>
					<view class="text">
						{{$t('user.rj')}}
					</view>
				</view>
				<view class="tui-rightItem" @click="onClickMoney">
					<image src="/static/chujin.png" mode=""></image>
					<view class="text">
						{{$t('user.cj')}}
					</view>
				</view>
			</view>
		</view>
		<view class="tui-list">
			<view class="tui-listItem" v-for="(item,index) in settingList" :key="index"
				@click="onClickPath(item,index)">
				<view class="flex-item flex">
					<image class="logo" :src="item.icon" mode=""></image>
					<view class="title">
						{{item.title}}
					</view>
				</view>
				<image class="tui-rightIcon" src="../../static/youjian.png" mode=""></image>
			</view>
		</view>
		<tabbar :actIndex="3"></tabbar>
	</view>
</template>

<script>
	import {
		userInfo,
		getUserIndex
	} from "@/api/user.js"
	export default {
		components: {
			tabbar: () => import("@/components/tabbar.vue"),
		},
		data() {
			return {
				userInfo: {
					real_name: '',
				},
				settingList: [
					// 	{
					// 	title: this.$t("user.smrz"),
					// 	icon: require("@/static/smrz.png")
					// },
					{
						title: this.$t("user.ddjl"),
						icon: require("@/static/wddd.png")
					}, {
						title: this.$t("user.rjmx"),
						icon: require("@/static/kjrj.png")
					}, {
						title: this.$t("user.cjmx"),
						icon: require("@/static/chujin.png")
					}, {
						title: this.$t("user.zjjl"),
						icon: require("@/static/cwjl.png")
					}, {
						title: this.$t("user.ckzh"),
						icon: require("@/static/ck.png")
					}, {
						title: this.$t("user.sz"),
						icon: require("@/static/sz.png")
					}, {
						title: this.$t("user.tcdl"),
						icon: require("@/static/tcdl.png")
					},
				]
			};
		},
		onShow() {
			this.getDetail()
		},
		methods: {
			onClickFuzhi(text) {
				uni.setClipboardData({
					data: text,
					success: ()=> {
						console.log('复制成功');
						// 可以添加用户友好的提示，例如使用uni.showToast提示复制成功
						uni.showToast({
							title: this.$t('user.fzcg'),
							icon: 'none',
							duration: 2000
						});
					}
				});
			},
			getUserIndex() {
				getUserIndex({
					hideLoading: true,
				}).then(({
					data
				}) => {

					window.open(data.kefu_url,'_self')
				});
			},
			getDetail() {
				userInfo({
					hideLoading: true
				}).then(({
					data
				}) => {
					this.userInfo = data
				})
			},
			onClickMoney() {
				uni.navigateTo({
					url: '/pages/withdraw-money/withdraw-money'
				})
			},
			onClickPath(item, index) {
				switch (index) {
					case 5:
						uni.navigateTo({
							url: '/pages/set/set'
						})
						break;
					case 6:
						uni.showModal({
							title: this.$t("user.tcdl"),
							content: this.$t("user.qdtc"),
							confirmColor: '#222',
							cancelColor: '#222',
							success: function(res) {
								if (res.confirm) {
									uni.reLaunch({
										url: '/pages/login/login'
									})
								}
							}
						});
						break;
					case 4:
						uni.navigateTo({
							url: '/pages/account/account'
						})
						break;
					case 3:
						uni.navigateTo({
							url: '/pages/money-record/money-record'
						})
						break;
					case 0:
						uni.navigateTo({
							url: '/pages/order/order'
						})
						break;
					case 2:
						uni.navigateTo({
							url: '/pages/withdraw-list/withdraw-list'
						})
						break;
					case 1:
						uni.navigateTo({
							url: '/pages/withdraw-list/withdraw-open'
						})
						break;
						// case 0:
						// 	uni.navigateTo({
						// 		url: '/pages/verify/verify'
						// 	})
						// 	break;
				}

			}
		}
	}
</script>

<style lang="less">
	page {
		background-color: #f6f7fb;
	}

	.tui-kaihuHover {
		background-color: #f1f3fb !important;
		transform: scale(1.03);
	}

	.tui-kaihu {
		color: #98999d;
		background-color: #fff;
		display: flex;
		align-items: center;
		justify-content: space-between;
		border-radius: 16px;
		padding: 16rpx;
		font-size: 24rpx;

		image {
			width: 28rpx;
			height: 28rpx;
			margin-left: 14rpx;
		}
	}

	.tui-list {
		padding-bottom: 30px;
		margin-top: 20rpx;
		display: flex;
		flex-direction: column;
		width: 100%;

		.tui-listItem {
			width: 100%;
			font-size: 30rpx;
			background-color: #fff;
			border-radius: 13px;
			padding: 20rpx;
			box-sizing: border-box;
			display: flex;
			margin-top: 20rpx;
			display: flex;

			align-items: center;
			justify-content: space-between;

			.tui-rightIcon {
				width: 6px;
				height: 11px;
			}

			.title {
				font-size: 30rpx;
				color: #222;
			}

			.logo {
				width: 60rpx;
				height: 60rpx;
				border-radius: 50%;
				margin-right: 20rpx;
			}
		}
	}

	.tui-spendMoney {
		font-size: 26rpx;
		display: flex;
		margin-top: 20rpx;

		.tui-rightItem {
			margin-left: 20rpx;
			padding: 28rpx;
			width: 180rpx;
			background-color: #fff;
			border-radius: 13px;
			display: flex;
			flex-direction: column;
			align-items: center;

			.text {
				font-size: 32rpx;
				font-weight: 500;
				padding-top: 18rpx;
				color: #222;
			}

			image {
				width: 55rpx;
				height: 55rpx;
			}
		}

		.tui-spendMoneyItem {
			padding: 28rpx;
			width: 300rpx;
			align-items: flex-start;
			background-color: #fff;
			border-radius: 13px;
			display: flex;
			flex-direction: column;

			.cny {
				color: #a8a9ac;
				font-size: 20rpx;
			}

			.pice {
				font-size: 32rpx;
				font-weight: 500;
				padding-top: 20rpx;
			}
		}
	}

	.all-size {
		font-size: 20rpx;
		color: #a8a9ac;
	}

	.big-size {
		font-size: 26rpx;
		color: #222;
		padding-top: 10rpx;
	}

	.flex-1 {
		flex: 1;
	}

	.tui-money {
		margin-top: 44rpx;

		.normal {
			background: url(/static/money-bg.png) 0% 0% / cover no-repeat;
			border-radius: 13px;
			padding: 26rpx;
			display: flex;
			align-items: center;
			justify-content: space-between;
			position: relative;

			.tui-position {
				width: 100rpx;
				height: 60rpx;
				right: 26rpx;
				top: 26rpx;
				position: absolute;

				image {
					width: 100%;
					height: 100%;
				}
			}

			.mt-sm {
				color: #a8a9ac;
				font-size: 20rpx;
				padding-top: 10rpx;
				display: flex;
				align-items: center;
			}

			.pice {
				font-size: 36rpx;
				font-weight: 500;
				padding-top: 20rpx;
			}

			.text-xs {
				font-size: 20rpx;
				color: #222;
			}
		}
	}

	.tui-header {
		padding: 0 32rpx;

		.tui-userInfo {
			display: flex;
			align-items: center;
			justify-content: space-between;

			padding-top: 64rpx;

			.tui-credit {
				background-color: #fff;
				color: rgb(37, 188, 115);
				font-size: 21rpx;
				display: flex;
				align-items: center;
				justify-content: space-between;
				border-radius: 12px;
				margin-left: 12rpx;
				height: 40rpx;
				padding: 0 10rpx;
				margin-top: 20rpx;

				image {
					width: 26rpx;
					height: 26rpx;
					margin-right: 6rpx;
				}
			}

			.desc {
				display: flex;
				align-items: center;



				.tui-vip {
					background-color: #e4e3ff;
					color: #3f427e;
					font-size: 21rpx;
					display: flex;
					align-items: center;
					justify-content: space-between;
					border-radius: 12px;
					margin-left: 12rpx;
					height: 40rpx;
					padding: 0 10rpx;

					image {
						width: 26rpx;
						height: 26rpx;
						margin-right: 6rpx;
					}
				}

				.rellname {
					font-size: 32rpx;
					font-weight: 500;
					padding-top: 6rpx;
					color: #222;
				}
			}

			.name {
				font-size: 44rpx;
				font-weight: bold;
				color: #222;
			}
		}
	}
</style>