<template>
	<view>
		<guo-headerTitle :title="options.title" :isTitleImg="true" :isRight="true" :orderNum="orderCountNum"
			@onClickTitle="onClickTitle"></guo-headerTitle>
		<view class="tui-header">
			<view class="tui-border" v-if="getUserItem.b_is == 1">
				<text>{{$t('detail.ssz')}}</text>
				<text>{{$t('detail.kssj')}}: {{getUserItem.b_start_time}}-{{getUserItem.b_end_time}}</text>
			</view>
			<view class="tui-Content">
				<view class="tui-left">
					<view class="bar"></view>
					<view class="static">
						<view class="title"> {{pageDetail.price}} </view>
						<view class="flex flex-between flex-item">
							<text class="tui-size">{{pageDetail.zf_d}}</text>
							<view class="flex flex-item p-l">
								<image src="../../static/green_down.png" mode=""></image>
								<text class="tui-size" style="color: #0bb563">{{pageDetail.zf}}</text>
							</view>
						</view>
					</view>
				</view>
				<view class="tui-bg">
					<image src="../../static/border-img.png" mode=""></image>
				</view>
				<view class="tui-right">
					<view class="flex flex-column">
						<view class="item flex flex-column flex-between">
							<view class="right-size"> {{$t('detail.24g')}} </view>
							<view class="right-max">
								{{ pageDetail.price_high }}
							</view>
						</view>
						<view style="flex: 1"></view>
						<view class="item flex flex-column flex-between">
							<view class="right-size">{{$t('detail.24d')}} </view>
							<view class="right-max">
								{{ pageDetail.price_low }}
							</view>
						</view>
					</view>
					<view style="flex: 1"></view>
					<view class="flex flex-column">
						<view class="item flex flex-column flex-between">
							<view class="right-size"> {{$t('detail.24l')}}(MX) </view>
							<view class="right-max">
								{{ pageDetail.vol }}
							</view>
						</view>
						<view style="flex: 1"></view>
						<view class="item flex flex-column flex-between">
							<view class="right-size"> {{$t('detail.24e')}}</view>
							<view class="right-max"> {{ pageDetail.zf }} </view>
						</view>
					</view>
				</view>
			</view>
			<view class="tui-tabs">
				<v-tabs :isTime="true" v-model="timeActive" @change="getDetail()" :scroll="false"
					:tabs="timeTabs.map(item=>item.text)" color="rgb(168, 169, 172)" activeColor="#222" bold
					lineColor="#1150c2" :lineScale="0.2" bgColor="#f6f7fb" :zIndex="1"></v-tabs>
			</view>
			<kline ref="kline" :data="klineList"></kline>
			<view class="tui-btn">
				<button class="btn" :style="{background:getUserItem.b_is == 1 ? 'rgba(241,243,246)' : '#f33b50'}"
					@click="dealPopupOpen(1)">{{$t('detail.sg')}}</button>
				<button class="btn" :style="{background:getUserItem.b_is == 1 ? 'rgba(241,243,246)' : '#0bb563'}"
					@click="dealPopupOpen(2)">{{$t('detail.sc')}}</button>
			</view>
		</view>
		<!-- 弹出框 -->
		<uni-popup ref="popupSuccess" type="center" :mask-click="false">
			<view class="tui-Model">
				<view class="main">
					<image class="icon-lg" src="/static/success-lg.png" mode=""></image>
					<view class="title">
						{{$t('detail.gmcg')}}
					</view>
				</view>
				<view class="flex flex-column" style="padding: 0 64rpx;font-size: 24rpx;color: #a8a9ac;">
					<view class="flex flex-item flex-between p-b">
						<view class="">
							{{$t('app.je')}}
						</view>
						<view class="">
							{{deal.actAmount}}
						</view>
					</view>
					<view class="flex flex-item flex-between p-b">
						<view class="">
							{{$t('detail.sj')}}
						</view>
						<view class="">
							{{deal.actTime}}S
						</view>
					</view>
					<view class="flex flex-item flex-between p-b">
						<view class="">
							{{$t('detail.gmfx')}}
						</view>
						<view class="" :style="{color:deal.isType == 1 ? '#f33b50' : '#0bb563'}">
							{{deal.isType == 1 ? $t('detail.sg') : $t('detail.sc')}}
						</view>
					</view>
					<view class="flex flex-item flex-between p-b">
						<view class="">
							{{$t('detail.ye')}}
						</view>
						<view class="">
							{{userInfo.money}}
						</view>
					</view>
					<view class="flex flex-item flex-between p-b">
						<view class="">
							{{$t('detail.jg')}}
						</view>
						<view class="">
							{{pageDetail.price}}
						</view>
					</view>
					<view class="flex flex-item flex-between p-b">
						<view class="">
							{{$t('product.syl')}}
						</view>
						<view class="" style="color: #0bb563;">
							{{earnings.profit_ratio}}%
						</view>
					</view>
				</view>
				<view class="btn_box">
					<view class="look" @click="onClickOrder">
						{{$t('detail.ckcc')}}
					</view>
					<view class="ok" @click="onClickOk">
						{{$t('detail.hd')}}
					</view>
				</view>
			</view>
		</uni-popup>
		<uni-popup ref="popup" type="bottom">
			<view class="tui-bottomPopup">
				<view class="tui-purchase">
					<view class="tui-title">
						<view class="flex">
							<text class="name">{{pageDetail.title}}</text>
							<text class="bade"
								:style="{background:deal.isType == 1 ?  '#f33b50' :'#0bb563'}">{{deal.isType==1?$t('detail.sg'):$t('detail.sc')}}</text>
						</view>
						<view class="tui-cancleText" @click="dealPopupClose">
							{{$t('detail.qx')}}
						</view>
					</view>
					<view class="tui-firstTitle">
						{{$t('detail.je')}}
					</view>
					<view class="items">
						<view class="tui-item" v-for="(item,index) in deal.amountTab" :key="index"
							@click="deal.actAmount =item" :class="deal.actAmount == item ? 'tui-activite' : ''">
							{{item}}
						</view>
					</view>
					<view class="tui-inputBox">
						<input class="tui-input" v-model="deal.actAmount" :placeholder="$t('detail.srje')"
							type="text" />
						<text>CNY</text>
					</view>
					<view class="flex flex-between flex-item" style="margin-top: 16rpx;">
						<view class="flex flex-item">
							<view class="tui-money">
								{{$t('detail.ye')}}：<text>{{userInfo.money}}</text> <text class="tui-cny">CNY</text>
							</view>
						</view>
						<view class="tui-alling" @click="deal.actAmount = userInfo.money">
							{{$t('detail.qbxd')}}
						</view>
					</view>
					<view class="tui-firstTitle">
						{{$t('detail.sj')}}
					</view>
					<view class="items">
						<view class="tui-item" v-for="(item,index) in pageDetail.timeList" :key="index"
							@click="deal.actTime=item.seconds"
							:class="deal.actTime == item.seconds ? 'tui-activite' : ''">
							{{item.seconds_desc}}
						</view>
					</view>
					<view class="tui-detail">
						<view class="flex flex-item flex-column">
							<view class="text-ts">
								{{$t('detail.dqj')}}
							</view>
							<view class="pice">
								{{pageDetail.price}}
							</view>

						</view>
						<view class="flex flex-item flex-column">
							<view class="text-ts">
								{{$t('detail.je')}}
							</view>
							<view class="pice">
								{{deal.actAmount|| 0 }}
							</view>
						</view>
						<view class="flex flex-item flex-column">
							<view class="text-ts">
								{{$t('detail.syl')}}
							</view>
							<view class="pice">
								{{earnings.profit_ratio}}%
							</view>
						</view>
						<view class="flex flex-item flex-column">
							<view class="text-ts">
								{{$t('detail.yg')}}
							</view>
							<view class="pice">
								{{earnings.profit}}
							</view>
						</view>
					</view>
					<view class="tui-submit" :class="isBtn ? 'tui-ok' : 'tui-cancle'" @click="confirmDeal">
						{{$t('detail.qd')}}
					</view>
				</view>
			</view>
		</uni-popup>
		<uni-drawer ref="showLeft" mode="left" :width="300">
			<scroll-view style="height: 100%" scroll-y="true">
				<view class="tui-draw">
					<view class="title"> {{$t('detail.cpjy')}} </view>
					<view class="tui-search">
						<uni-easyinput class="uni-mt-5" suffixIcon="search" :placeholder="$t('detail.srcpmc')"
							:inputBorder="true" :styles="styles" primaryColor="#1150c2"
							placeholderStyle="color:#c9c9c9;font-size:28rpx" v-model="searchText"></uni-easyinput>
					</view>
					<!-- <view class="">
						<v-tabs :value="0" :tabs="['货币种类']" color="#a8a9ac" activeColor="#222" lineColor="#1150c2" bold
							bgColor=""></v-tabs>
					</view> -->
					<!-- 货币种类 -->
					<view class="tui-variety">
						<view class="tui-classify">
							<view class="" style="flex: 1"> {{$t('home.mc')}} </view>
							<view class="tui-rightVariety" style="flex: 1">
								<text>{{$t('home.zxjg')}}</text>
								<text>{{$t('home.24zf')}}</text>
							</view>
						</view>
						<view class="tui-varietyContent">
							<view class="tui-varietyContentItem" v-for="(item,index) in goodsList" :key="index"
								hover-class="tui-hover" @click="selectGoods(item)">
								<view class="name">
									<view class="flex flex-item">
										<text class="piceName" v-for="(v,i) in item.title.split('')" :key=""
											:style="setColor(v)">{{ v }}</text>
									</view>
									<view class="flex-column" style="color: #a8a9ac;font-size: 20rpx;">
										<text>{{$t('home.24l')}}</text>
										<text>{{item.vol}}</text>
									</view>
								</view>
								<view class="code">
									{{item.price}}
								</view>
								<view style="justify-content: flex-end;width: 100rpx;" class="flex">
									<view class="tui-end" :class="item.is_z == 1?'up':'down'">
										{{item.zf_d}}
									</view>
								</view>
							</view>
						</view>
					</view>
				</view>
			</scroll-view>
		</uni-drawer>
	</view>
</template>

<script>
	import {
		goodDetail,
		goodKline,
		goodMicrotrade
	} from "@/api/detail.js";
	import {
		goods
	} from '@/api/money.js'
	import {
		userInfo,
		getUserIndex
	} from "@/api/user.js"
	import {
		orderCount
	} from "@/api/order.js"
	export default {
		components: {
			kline: () => import("@/components/kline/index.vue"),
		},

		data() {
			return {
				timer: null,
				orderTimer: null,
				options: {},
				userInfo: {},
				goodsList: [],
				pageDetail: {
					timeList: []
				},
				klineList: [],
				timeActive: 3,
				timeTabs: [{
					text: "1m",
					value: '1min'
				}, {
					text: "5m",
					value: '5min'
				}, {
					text: "30m",
					value: '30min'
				}, {
					text: "1h",
					value: '1hour'
				}, {
					text: "4h",
					value: '4hour'
				}, {
					text: "1d",
					value: '1day'
				}, {
					text: "1w",
					value: '1week'
				}],
				deal: {
					amountTab: ['100', '500', '1000', '2000', '5000', '10000'],
					actAmount: '',
					actTime: '',
					isType: '',
				},

				searchText: '',
				current: -1,
				styles: {
					borderColor: "#f6f8fa",
				},
				getUserItem: {},
				orderCountNum: 0
			};
		},
		computed: {
			isBtn() {
				return this.deal.actAmount && this.deal.actTime
			},
			earnings() {
				if (!this.isBtn) {
					return {
						profit_ratio: 0,
						profit: 0
					}
				} else {
					const {
						timeList
					} = this.pageDetail
					const {
						actAmount,
						actTime
					} = this.deal
					const profit_ratio = timeList.find(item => item.seconds == actTime).profit_ratio
					console.log(actAmount, profit_ratio, 'actAmount')
					return {
						profit_ratio,
						profit: profit_ratio * actAmount / 100
					}
				}
			}
		},
		onLoad(options) {
			this.getUserIndex()
			this.options = options;
			this.$nextTick(() => {
				this.getDetail();
			})
			this.getDetailUserInfo()
			this.timer = setInterval((_) => {
				this.getDetail();
				this.getUserIndex()
			}, 5000);
			this.getOrderCountNum()
			this.orderTimer = setInterval(() => {
				this.getOrderCountNum()
			}, 2000)
		},
		onUnload() {
			// 页面销毁时清除定时器
			if (this.timer) {
				clearInterval(this.timer);
			}
			if (this.orderTimer) {
				clearInterval(this.orderTimer);
			}
		},
		onHide() {
			if (this.timer) {
				clearInterval(this.timer);
			}
		},
		methods: {
			getOrderCountNum() {
				orderCount().then(({
					data
				}) => {
					this.orderCountNum = data.count
				})
			},
			getUserIndex() {
				getUserIndex({
					hideLoading: true,
				}).then(({
					data
				}) => {

					this.getUserItem = data;
				});
			},
			onClickOrder() {
				uni.navigateTo({
					url: '/pages/order/order'
				})
				this.getDetailUserInfo()
				this.dealPopupClose()
				this.$refs.popupSuccess.close()
			},
			onClickOk() {
				this.getDetailUserInfo()
				this.dealPopupClose()
				this.$refs.popupSuccess.close()
			},
			confirmDeal() {
				if (!this.isBtn) return;
				const paramData = {
					currency_id: this.options.codename,
					seconds: this.deal.actTime,
					number: this.deal.actAmount,
					type: this.deal.isType,
				}
				goodMicrotrade(paramData).then(_ => {
					this.$refs.popupSuccess.open()
					this.$refs.popup.close()
					
					const audioContext = uni.createInnerAudioContext();
					audioContext.src = '/static/success.mp3';
					audioContext.play();
					// uni.showToast({
					// 	title: this.$t('detail.czcg'),
					// 	icon: "none"
					// })

				})
			},
			getDetailUserInfo() {
				userInfo({
					hideLoading: true
				}).then(({
					data
				}) => {
					this.userInfo = data
				})
			},
			dealPopupClose() {
				this.$refs.popup.close()
				this.deal = this.$options.data().deal
			},
			dealPopupOpen(type) {
				if (this.getUserItem.b_is == 1) return
				this.getDetailUserInfo()
				this.deal.isType = type
				this.$refs.popup.open()
			},
			selectGoods(item) {
				console.log(this.options, 'options')
				this.options = {
					codename: item.codename,
					id: item.id,
					title: item.title
				}
				this.getDetail();
				this.$refs.showLeft.close();
			},
			setColor(e) {
				if (this.searchText.indexOf(e) != -1) {
					return 'color:#1150c2' //自定义颜色
				}
			},
			getDetail() {
				const {
					id,
					codename
				} = this.options;

				goodDetail({
					id,
					hideLoading: true,
				}).then(({
					data
				}) => {
					this.pageDetail = data || {};
				});
				const {
					timeTabs,
					timeActive
				} = this
				goodKline({
					symbol: codename,
					resolution: timeTabs[timeActive].value,
					hideLoading: true,
				}).then(({
					data
				}) => {
					this.klineList = data || [];
					this.$nextTick(_ => {
						this.$refs['kline'].init()
					})
				});
			},
			getGoods() {
				goods({
					hideLoading: true,
				}).then(({
					data
				}) => {
					this.goodsList = data
					this.$refs.showLeft.open();
				})
			},
			onClickTitle() {
				this.getGoods()

			},
		},
	};
</script>

<style lang="less">
	.tui-hover {
		background-color: #fffaf9 !important;
		transform: seale(1.03);
	}

	.p-b {
		padding-bottom: 20rpx;
	}

	.tui-Model {
		width: 536rpx;
		background-color: #fff;
		border-radius: 13px;

		.btn_box {
			border-top: 1px solid #eee;
			height: 88rpx;
			overflow: hidden;
			border-radius: 0 0 24rpx 24rpx;
			font-size: 24rpx;
			color: #222;
			display: flex;
			align-items: center;
			justify-content: center;

			.look {
				border-right: 1px solid #eee;
				display: flex;
				justify-content: center;
				align-items: center;
				flex: 1;
			}

			.ok {
				display: flex;
				justify-content: center;
				align-items: center;
				flex: 1;
			}
		}

		.main {
			padding: 30rpx;
			box-sizing: border-box;
			display: flex;
			align-items: center;
			flex-direction: column;

			.icon-lg {
				width: 66rpx;
				height: 66rpx;
			}

			.title {
				padding-top: 28rpx;
				font-size: 28rpx;
				color: #222;
				font-weight: 500;
			}
		}
	}

	.tui-cancle {
		background-color: #ebeff1 !important;
		color: #a8a9ac !important;
		opacity: .5;
	}

	.tui-ok {
		background-color: #1150c2 !important;
		color: #fff !important;
	}

	.tui-submit {

		width: 178px;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 20rpx;
		padding: 30rpx 0;
		font-size: 32rpx;
		margin: 0 auto;
		margin-top: 44rpx;
	}

	.tui-detail {
		display: flex;
		align-items: center;
		justify-content: space-between;
		margin-top: 40rpx;

		.text-ts {
			color: #a8a9ac;
			font-size: 10px;
		}

		.pice {
			color: #222;
			font-size: 10px;
			padding-top: 8rpx;
		}
	}

	.flex-item {
		align-items: center;
	}

	.tui-bottomPopup {

		padding: 48rpx 0 0;
		border-radius: 48rpx 48rpx 0 0;
		background-color: #fff;
		z-index: 9999;

		.tui-purchase {
			padding: 0 32rpx;
			padding-bottom: 40rpx;

			.tui-firstTitle {
				color: #a8a9ac;
				font-size: 28rpx;
				margin-top: 60rpx;

			}

			.tui-alling {
				color: #f56c6c;
				font-size: 24rpx;
			}

			.tui-money {
				display: flex;
				justify-content: flex-start;
				color: #c9c9c9;
				font-size: 24rpx;

				.tui-cny {
					margin-left: 4rpx;
					font-size: 8px;
					line-height: 17px;
				}
			}

			.tui-inputBox {
				padding: 0px 30rpx;
				border-radius: 12px;
				caret-color: #a8a9ac;
				background-color: #f6f7fb;
				display: flex;
				align-items: center;

				.tui-input:placeholder {
					color: #c9c9c9;
					font-size: 24rpx;
				}

				.tui-input {
					border-radius: 12px !important;
					flex: 1;
					padding: 26rpx 30rpx !important;
					caret-color: #c9c9c9;
					height: 100rpx;
					font-size: 26rpx;
				}

				text {
					font-size: 24rpx;
					color: #a8a9ac;
				}
			}

			.items {
				display: flex;
				flex-wrap: wrap;
				justify-content: space-between;
				align-content: space-between;
				padding: 20rpx 0 0 0;

				.tui-activite {
					border: 1px solid #0bb563 !important;
					color: #0bb563 !important;
				}

				.tui-item {
					margin-bottom: 20rpx;
					width: 210rpx;
					height: 116rpx;
					color: #a8a9ac;
					opacity: 1;
					background-color: #f6f7fb;
					border-radius: 12px !important;
					font-size: 28rpx;
					display: flex;
					align-items: center;
					justify-content: center;
				}
			}

			.tui-title {
				display: flex;
				align-items: center;
				justify-content: space-between;

				.tui-cancleText {
					color: #a8a9ac;
					font-size: 28rpx;
				}

				.name {
					font-size: 32rpx;
					font-weight: 500;
					display: flex;
					position: relative;
					color: #222;
				}

				.bade {
					border-radius: 10px;
					height: 46rpx;
					padding: 4rpx 12rpx;
					color: #fff;
					// background-color: #0bb563 !important;
					font-weight: 800;
					display: flex;
					align-items: center;
					justify-content: center;
					margin-left: 10rpx;
					font-size: 20rpx;
				}
			}
		}
	}

	.tui-btn {
		width: 100%;
		background-color: #f6f7fb;
		padding: 30rpx 40rpx;
		position: fixed;
		left: 0;
		bottom: 0;

		padding-bottom: 42rpx;
		font-size: 24rpx;
		font-weight: 500;
		display: flex;
		align-items: center;
		justify-content: space-between;

		.btn {
			width: 216rpx;
			border: unset;
			color: #fff;
			text-align: center;
			border-radius: 30rpx;
		}
	}

	.tui-draw {
		padding: 46px 0px 27px;

		.tui-rightVariety {
			width: 300rpx;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}

		.tui-variety {
			position: relative;

			padding-bottom: 60rpx;

			.tui-varietyContent {
				display: flex;
				flex-direction: column;

				.tui-varietyContentItem {
					width: 100%;
					background-color: #fff;
					border-radius: 13px;

					padding: 20rpx 30rpx;
					box-sizing: border-box;
					display: flex;
					align-items: center;

					.tui-end {
						padding: 10rpx;
						width: 100%;
						color: #fff;
						border-radius: 5px;
						font-size: 24rpx;
						box-sizing: border-box;
						text-align: center;

						&.up {
							background-color: #f33b50 !important;
						}

						&.down {
							background-color: #0bb563 !important;
						}
					}

					.code {

						width: 170rpx;
						overflow-wrap: break-word;
						font-size: 26rpx;
						text-align: left;
					}

					.name {
						display: flex;
						flex-direction: column;
						flex: 1;

						.piceName {
							font-size: 30rpx;
							color: #222;
							font-weight: 500;
							padding-bottom: 15rpx;
						}
					}
				}
			}

			.tui-classify {
				color: #a8a9ac;
				font-size: 24rpx;
				display: flex;
				align-items: center;
				padding: 30rpx;
			}

			.title {
				font-size: 32rpx;
				color: #222;
				padding-bottom: 20rpx;
			}
		}

		.tui-search {
			padding: 30rpx;
			box-sizing: border-box;
		}

		.title {
			padding-left: 40rpx;
			font-size: 60rpx;
			font-weight: 800;
		}
	}

	/deep/.uni-easyinput__content {
		border-radius: 30px;
	}

	/deep/.uni-easyinput__content-input {
		height: 90rpx;
		border-radius: 30px;
	}

	/deep/.uni-easyinput {
		background-color: #f6f8fa;
		border-radius: 30px;
	}

	/deep/.uni-forms-item__label {
		color: #a8a9ac !important;
	}

	.p-l {
		padding-left: 10rpx;
	}

	.tui-tabs {
		margin: 30rpx 0;
	}

	.right-size {
		font-size: 20rpx;
		color: #a8a9ac;
	}

	.right-max {
		font-size: 24rpx;
		padding-top: 4rpx;
		color: #222;
	}

	.tui-header {
		padding: 0 36rpx;

		.tui-border {
			color: rgb(249, 174, 61);
			border: 1px solid rgb(249, 174, 61);
			height: 44rpx;
			padding: 0px 22rpx;
			box-sizing: border-box;
			display: flex;
			align-items: center;
			justify-content: space-between;

			text {
				font-size: 30rpx;

			}
		}

		.tui-Content {
			border-radius: 13px;
			background-color: #fff;
			display: flex;
			justify-content: space-between;
			margin-top: 40rpx;

			.tui-right {
				padding: 24rpx 40rpx 24rpx 0;
				flex: 28;
				display: flex;
			}

			.tui-bg {
				width: 14rpx;
				height: 208rpx;
				margin: 0 40rpx 0 26rpx;

				image {
					width: 100%;
					height: 100%;
				}
			}

			.tui-left {
				display: flex;
				align-items: center;
				font-weight: 500;
				padding: 42rpx 0;
				flex: 18;
				font-size: 62rpx;

				.static {
					height: 100rpx;
					display: flex;
					flex-direction: column;
					justify-content: space-between;
					color: #f33b50;

					image {
						width: 16rpx;
						height: 16rpx;
					}

					.tui-size {
						color: #a8a9ac;
						font-size: 20rpx;
					}

					.title {
						font-size: 40rpx;
						overflow-wrap: break-word;
						max-width: 132px;
						font-weight: bold;
					}
				}

				.bar {
					width: 8rpx;
					height: 90rpx;
					margin-right: 32rpx;
					background-color: #f33b50;
				}
			}
		}
	}
</style>