<template>
	<view>
		<guo-headerTitle :title="typeList[type]+$t('app.je')"></guo-headerTitle>
		<view class="tui-header">
			<view class="tui-form">
				<view class="title">
					{{typeList[type]}}{{$t('app.je')}}
				</view>
				<view class="flex flex-column">
					<view class="tui-inputBox">
						<view class="font-bolder">
							￥
						</view>
						<input v-model="amount" type="text" class="input" disabled />
					</view>
					<view class="bottom">
						{{$t('product.k')}}{{typeList[type]}}{{$t('app.je')}}{{usableAmount}}CNY,
						<text>{{$t('product.qb')}}{{typeList[type]}}</text>
					</view>
				</view>
			</view>
			<view class="keyboard">
				<view class="capsule">
					<button class="tui-keyboard" hover-class="hover-click" v-for="(item,index) in keyList" :key="index"
						@click="keyUp(item)">
						{{item}}
					</button>
					<button class="tui-keyboard end" hover-class="hover-click" @click="backSp">
						<image src="../../static/clear.png" mode=""></image>
					</button>
				</view>
			</view>
			<view class="tui-submit" :class="[{'tui-cancle':btnDisabled}]" @click="onSubmit">
				{{$t('app.qd')}}
			</view>
		</view>
	</view>
	</view>
</template>

<script>
	import {
		balanceBuy,
		balanceSell
	} from "@/api/money.js"
	import {
		userInfo
	} from "@/api/user.js"
	export default {
		data() {
			return {
				userInfo: {},
				typeList: {
					'buy': this.$t('product.cr'),
					'sell': this.$t('product.zc'),
				},
				type: {},
				keyList: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '.', '0'],
				amount: '',
				pirce: 0
			};
		},
		computed: {
			usableAmount() {
				return this.type == 'sell' ? this.pirce : this.userInfo.money
			},
			btnDisabled() {
				const {
					amount
				} = this
				if (!amount || amount * 1 <= 0) {
					return true
				} else if (amount * 1 > this.usableAmount) {
					return true
				}
				return false
			},
		},
		onLoad(e) {
			this.getDetail()
			this.type = e.type
			this.pirce = e.pirce
		},
		methods: {
			getDetail() {
				userInfo({
					hideLoading: true
				}).then(({
					data
				}) => {
					this.userInfo = data
				})
			},
			keyUp(val) {
				const newAmout = this.amount + val
				let value = this.$utils.validateAmount(newAmout);
				this.$nextTick(_ => {
					// 更新 v-model
					this.amount = value;
				})
			},
			backSp() {
				this.amount = this.amount.slice(0, -1);
			},
			onSubmit() {
				if (this.btnDisabled) return
				let queryApi = null
				if (this.type == 'buy') {
					queryApi = balanceBuy
				} else if (this.type == 'sell') {
					queryApi = balanceSell
				}
				queryApi({
					amount: this.amount,
				}).then(({
					data
				}) => {
					uni.showModal({
						title: '操作成功',
						content: "请耐心等待到账",
						showCancel: false,
					}).then(_ => {
						uni.navigateBack()
					})

				})
			}
		}
	}
</script>

<style lang="less">
	.end {
		margin-bottom: 0;
	}

	.hover-click {
		background-color: #fff !important;
	}

	.tui-cancle {
		background-color: rgb(241, 243, 246) !important;
		color: #a8a9ac !important;
		opacity: .5;
	}

	.tui-submit {
		background: #1150c2;
		color: #fff;
		width: 320rpx;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 20rpx;
		padding: 30rpx 0;
		font-size: 32rpx;
		margin: 0 auto;
		margin-top: 44rpx;
	}

	.tui-header {
		padding: 0 36rpx;

		.keyboard {
			width: 100%;
			position: fixed;
			bottom: 0;
			left: 0;
			right: 0;
			border-radius: 48rpx 48rpx 0 0;
			padding: 48rpx 40rpx 100rpx;
			background-color: #fff;
			box-sizing: border-box;

			.capsule {
				height: 100%;
				position: relative;
				background-color: #fff;
				display: flex;
				flex-wrap: wrap;


				.tui-keyboard {
					background-color: #f5f7fb;
					box-sizing: border-box;
					margin-bottom: 40rpx;
					width: 200rpx;
					height: 90rpx;
					line-height: 90rpx;
					border-radius: 22px;
					font-size: 40rpx;
					font-weight: 600;
					display: flex;
					justify-content: center;
					align-items: Center;
					border: 1px solid #f5f7fb;

					image {
						width: 32px;
						height: 32px;
					}
				}
			}
		}

		.tui-form {
			margin-top: 60rpx;

			display: flex;
			flex-direction: column;
			font-size: 28rpx;
			color: #303133;
			border-radius: 13px;

			.bottom {
				font-size: 24rpx;
				padding-top: 15rpx;
				color: #a8a9ac;

				text {
					color: #1150c2;
					padding-left: 10rpx;
				}
			}

			.tui-inputBox {
				height: 160rpx;
				border-bottom: 1px solid rgba(0, 0, 0, .18);
				display: flex;
				align-items: center;


				.font-bolder {
					font-weight: 800;
					font-size: 62rpx;
				}

				.input {
					flex: 1;
					height: 100rpx;
					font-size: 62rpx;
				}
			}

			.title {
				font-size: 24rpx;
			}
		}
	}
</style>