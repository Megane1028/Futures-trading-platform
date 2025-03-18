<template>
	<view class="">
		<guo-headerTitle :title="$t('account.ckzh')"></guo-headerTitle>
		<view class="tui-header">
			<view class="tui-cardImage">
				<image class="img" src="/static/account-bg.png" mode=""></image>
				<view class="tui-list">
					<view class="title">
						{{$t('account.zhlx')}}
					</view>
					<view class="tui-listItem" @click="onClickDetail('bank_card')">
						<view class="flex flex-column" style="padding: 0 30rpx;">
							<image src="@/static/yinhangka.png" class="tui-bank" mode=""></image>
							<view class="bank">
								{{$t('account.yhk')}}
							</view>
						</view>
						<view class="">
							<uni-icons type="right" size="15" style="color: #fff;"></uni-icons>
						</view>
					</view>
					<view class="tui-listItem trc-bg" @click="onClickDetail('usdt-trc20')">
						<view class="flex flex-column" style="padding: 0 30rpx;">
							<image src="@/static/t.png" class="tui-bank" mode=""></image>
							<view class="bank">
								USDT-TRC20
							</view>
						</view>
						<view class="">
							<uni-icons type="right" size="15" style="color: #fff;"></uni-icons>
						</view>
					</view>
					<view class="tui-listItem erc-bg" @click="onClickDetail('usdt-erc20')">
						<view class="flex flex-column" style="padding: 0 30rpx;">
							<image src="@/static/t.png" class="tui-bank" mode=""></image>
							<view class="bank">
								USDT-ERC20
							</view>
						</view>
						<view class="">
							<uni-icons type="right" size="15" style="color: #fff;"></uni-icons>
						</view>
					</view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	
	export default {
		data() {
			return {

			};
		},
		methods: {
			onClickDetail(type) {
				uni.navigateTo({
					url: '/pages/account/account-detail?pay_type=' + type
				})
			}
		}
	}
</script>

<style lang="less">
	page {
		background-color: #f6f7fb !important;
	}

	.tui-header {
		padding: 0 36rpx;

		.tui-cardImage {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 100rpx;

			.tui-list {
				color: #fff;
				margin-top: 100rpx;
				width: 100%;

				.trc-bg {
					background: url('../../static/trc-bg.png') 0% 0% / contain no-repeat !important;
				}

				.erc-bg {
					background: url('../../static/erc-bg.png') 0% 0% / contain no-repeat !important;
				}

				.tui-listItem {
					display: flex;
					align-items: center;
					justify-content: space-between;
					margin-top: 20rpx;

					padding: 30rpx;
					box-sizing: border-box;
					background: url('../../static/bank-bg1.png') 0% 0% / contain no-repeat;

					.bank {
						font-size: 32rpx;
						color: #fff;
						padding-top: 6rpx;
						color: #fff;
					}

					.tui-bank {
						width: 35rpx;
						height: 35rpx;
					}
				}

				.title {

					color: #fff;
				}
			}

			.img {
				width: 500rpx;
				height: 400rpx;
			}
		}
	}
</style>