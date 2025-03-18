<template>
	<view class="welcome">
		<image class="logo" src="@/static/logo.png" mode="aspectFit" />
		<view class="progressBox">
			<view class="progressNow" :style="{width:progressNum+'%'}">
				<image class="run" src="@/static/run.png" mode=""></image>
				<text class="num">{{progressNum}}%</text>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				progressNum: 0
			};
		},
		mounted() {
			function getRandomNumber(min, max) {
				return Math.floor(Math.random() * (max - min + 1)) + min;
			}
			let timer = setInterval(_ => {
				const getNum = getRandomNumber(10, 20)
				if (this.progressNum + getNum > 100) {
					this.progressNum = 100;
					clearInterval(timer)
					if (this.$store.state.token) {
						uni.switchTab({
							url: '/pages/index/index'
						})
					} else {
						uni.redirectTo({
							url: '/pages/login/login'
						})
					}
				} else {

					this.progressNum += getNum
				}
			}, 200)
		},

	}
</script>

<style lang="scss" scoped>
	.welcome {
		display: flex;
		flex-direction: column;
		align-items: center;
		padding-top: 12vh;
		width: 100vw;
		height: 100vh;

		.logo {
			width: 274rpx;
		}

		.progressBox {
			width: 298px;
			height: 7px;
			background-color: #fff;
			border-radius: 4px;
			margin-top: auto;
			margin-bottom: 25vh;

			.progressNow {
				height: 100%;
				border-radius: 4px;
				background: linear-gradient(270deg, #fff, #2e6bdb);
				position: relative;
				transition: width .5s ease;

				.run {
					position: absolute;
					right: -10rpx;
					top: -10rpx;
					width: 34rpx;
					height: 34rpx;
				}


				.num {
					position: absolute;
					right: -20rpx;
					top: 28rpx;
					width: 50rpx;
					font-size: 12px;
					color: #222;
					text-align: center;
				}
			}
		}
	}
</style>