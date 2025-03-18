<template>
	<view>
		<view class="tui-content">
			<view class="tui-header">
				<view class="box" @click="onClickRight">
					<uni-icons type="help" size="30" style="color: #fff;"></uni-icons>
				</view>
			</view>
			<view class="">
				<view class="container">
					<canvas id="progressCanvas" canvas-id="progressCanvas"
						style="width: 630rpx; height: 350rpx;"></canvas>
				</view>

			</view>
			<view class="tui-card">
				<view class="tui-cardItem" @click="onClickDeposit('buy')">
					<image src="../../static/cunru.png" mode=""></image>
					<text class="">
						{{$t('product.cr')}}
					</text>
				</view>
				<view class="tui-border"></view>
				<view class="tui-cardItem" @click="onClickDeposit('sell')">
					<image src="../../static/zhuanchu.png" mode=""></image>
					<text class="">
						{{$t('product.zc')}}
					</text>
				</view>
				<view class="tui-border"></view>
				<view class="tui-cardItem" @click="onClickParticulars">
					<image src="../../static/mingxi.png" mode=""></image>
					<text class="">
						{{$t('product.mx')}}
					</text>
				</view>
			</view>
			<view class="tui-grad">
				<view :class="['tui-gradItem',{'show':gradItem>0}]">
					<image src="../../static/yiqueren.png" mode=""></image>
					<view class="title">
						{{$t('product.yqrfe')}}
					</view>
					<view class="desc">
						{{pageData.yue_start_money}}
					</view>
				</view>
				<view :class="['tui-gradItem',{'show':gradItem>3}]">
					<image src="../../static/daiqueren.png" mode=""></image>
					<view class="title">
						{{$t('product.dqrfe')}}
					</view>
					<view class="desc">
						{{pageData.yue_stop_money}}
					</view>
				</view>
				<view :class="['tui-gradItem',{'show':gradItem>2}]">
					<image src="../../static/shouyi.png" mode=""></image>
					<view class="title">
						{{$t('product.sy')}}
					</view>
					<view class="desc">
						{{pageData.sy}}
					</view>
				</view>
				<view :class="['tui-gradItem',{'show':gradItem>2}]">
					<image src="../../static/shouyilu.png" mode=""></image>
					<view class="title">
						{{$t('product.syl')}}
					</view>
					<view class="desc">
						{{pageData.yield}}
					</view>
				</view>
				<view :class="['tui-gradItem',{'show':gradItem>4}]">
					<image src="../../static/jrrujin.png" mode=""></image>
					<view class="title">
						{{$t('product.jrsyrjcs')}}
					</view>
					<view class="desc">
						{{pageData.ru_count}}
					</view>
				</view>
				<view :class="['tui-gradItem',{'show':gradItem>1}]">
					<image src="../../static/jrchujin.png" mode=""></image>
					<view class="title">
						{{$t('product.jrsycjcs')}}
					</view>
					<view class="desc">
						{{pageData.chu_count}}
					</view>
				</view>
			</view>
		</view>
		<tabbar :actIndex="2"></tabbar>
	</view>
</template>

<script>
	import {
		balanceInfo
	} from "@/api/money.js"
	export default {
		components: {
			tabbar: () => import("@/components/tabbar.vue"),
		},
		data() {
			return {
				pageData: {},
				gradItem: 0,
				currentProgress: 0,
				currentAmount: 0
			};
		},
		onReady() {

		},
		mounted() {
			const timer = setInterval(_ => {
				if (this.gradItem >= 5) {
					clearInterval(timer)
				}
				this.gradItem++
			}, 500)
		},
		onShow() {
			this.currentProgress = 0
			this.getDetail()
		},
		methods: {
			animateProgress() {
				const duration = 2000;
				const frameRate = 60;
				const totalFrames = (duration / 1000) * frameRate;
				let currentFrame = 0;
				// const progressIncrement = this.pageData.zb * 100 / totalFrames;
				const progressIncrement = 100 / totalFrames;
				const amountIncrement = this.pageData.all_money / totalFrames;
				const animate = () => {
					if (currentFrame <= totalFrames) {
						this.currentProgress += progressIncrement;
						if (this.currentAmount < this.pageData.all_money) {
							this.currentAmount += amountIncrement;
						}
						if (this.currentAmount > this.pageData.all_money) {
							this.currentAmount = this.pageData.all_money
						}
						this.drawProgress(this.currentProgress, this.currentAmount);
						currentFrame++;
						requestAnimationFrame(animate);
					}
				};
				animate();
			},
			rpxToPx(rpx) {
				const windowWidth = uni.getSystemInfoSync().windowWidth;
				const px = (rpx / 750) * windowWidth;
				return px;
			},
			drawProgress(progress, amount) {
				const systemInfo = uni.getSystemInfoSync();
				const pixelRatio = systemInfo.pixelRatio;
				const canvasWidth = this.rpxToPx(630);
				const canvasHeight = this.rpxToPx(280);
				const ctx = uni.createCanvasContext('progressCanvas', this);
				ctx.width = canvasWidth * pixelRatio;
				ctx.height = canvasHeight * pixelRatio;

				const centerX = canvasWidth / 2;
				const centerY = canvasHeight;
				const radius = canvasWidth / 2 - this.rpxToPx(50);
				const startAngle = Math.PI;
				const endAngle = Math.PI * (1 + progress / 100);
				const lineWidth = this.rpxToPx(32);

				ctx.clearRect(0, 0, ctx.width, ctx.height);
				ctx.setLineCap('round');

				ctx.beginPath();
				ctx.arc(centerX, centerY, radius, Math.PI, 2 * Math.PI);
				ctx.setStrokeStyle('#ffffff');
				ctx.setLineWidth(lineWidth);
				ctx.stroke();

				ctx.beginPath();
				ctx.arc(centerX, centerY, radius, startAngle, endAngle);
				const cor = ctx.createLinearGradient(0,0,150,0)
				cor.addColorStop(0,'rgba(234, 240, 251, 0.2)')
				cor.addColorStop(1,'#2e6bdb')
				ctx.setStrokeStyle(cor);
				ctx.setLineWidth(lineWidth);
				ctx.stroke();

				ctx.setFillStyle('#8f8f8f');
				ctx.setTextAlign('center');
				ctx.setTextBaseline('middle');
				ctx.font = "12px 'PingFang SC', sans-serif"
				ctx.fillText('余额宝总余额', centerX, centerY - this.rpxToPx(120));

				ctx.setFontSize(this.rpxToPx(60));
				ctx.setFillStyle('#000000');
				ctx.fillText(`￥${amount.toFixed(2)}`, centerX, centerY - this.rpxToPx(50));

				ctx.setFillStyle('#8f8f8f');
				ctx.font = "10px 'PingFang SC', sans-serif"
				ctx.fillText('确认份额', centerX - radius + 10, centerY + this.rpxToPx(55));
				ctx.fillText('总额', centerX + radius, centerY + this.rpxToPx(55));

				ctx.draw();
			},

			getDetail() {
				balanceInfo({
					hideLoading: true
				}).then(({
					data
				}) => {
					this.pageData = data
					this.animateProgress();
				})
			},
			onClickDeposit(type) {
				uni.navigateTo({
					url: '/pages/transfer/transfer?type=' + type + '&pirce=' + this.pageData.all_money
				})
			},
			onClickParticulars() {
				uni.navigateTo({
					url: '/pages/Particulars/Particulars'
				})
			},
			onClickRight() {
				uni.navigateTo({
					url: '/pages/money/detail'
				})
			}
		}
	}
</script>

<style lang="less">
	page {
		background-color: #f6f7fb;
	}

	.tui-grad {
		border-radius: 0 0 13px 13px;
		padding-bottom: 68rpx;
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		margin-top: 20rpx;

		.tui-gradItem {
			width: 300rpx;
			margin-bottom: 20rpx;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 30rpx 0;
			box-sizing: border-box;
			background-color: #fff;
			border-radius: 13px;
			transition: all .5s ease;

			&:nth-child(odd) {
				transform: translateX(-200px);
			}

			&:nth-child(even) {
				transform: translateX(200px);
			}

			&.show {
				transform: translateX(0) !important;
			}

			.title {
				color: #a8a9ac;
				font-size: 26rpx;
				padding-top: 20rpx;
			}

			.desc {
				font-size: 32rpx;
				color: #222;
				padding-top: 6rpx;
			}

			image {
				width: 72rpx;
				height: 72rpx;
			}
		}
	}

	.tui-card {
		background-color: #fff;
		border-radius: 26rpx;
		display: flex;
		align-items: center;
		justify-content: space-between;
		margin-top: 30rpx;

		.tui-border {
			width: 1px;
			height: 68rpx;
			background-color: #eee;
		}

		.tui-cardItem {
			flex: 1;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			padding: 30rpx;
			box-sizing: border-box;

			text {
				font-size: 26rpx;
				padding-top: 10rpx;
				color: #222;
			}

			image {
				width: 72rpx;
				height: 72rpx;
			}
		}
	}

	.tui-progressBottom {
		position: absolute;
		bottom: -30rpx;
		left: 0;
		right: 0;
		margin: auto;
		width: 310px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		color: #a8a9ac;
		font-size: 20rpx;
	}

	.tui-progress {
		position: absolute;
		top: 160rpx;
		left: 0;
		right: 0;
		margin: auto;
		text-align: center;

		.title {
			color: #a8a9ac;
			font-size: 26rpx;
		}

		.price {
			font-size: 70rpx;
			color: #222;
			padding-top: 20rpx;
		}
	}

	.tui-content {
		padding: 0 60rpx;

		.tui-header {
			display: flex;
			justify-content: flex-end;
			padding-top: 20rpx;

			.box {
				width: 86rpx;
				height: 86rpx;
				background-color: #cbcbcb;
				color: #fff;
				border-radius: 50%;
				display: flex;
				align-items: center;
				justify-content: center;
			}
		}
	}
</style>