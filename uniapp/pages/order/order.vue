<template>
	<view>
		<guo-headerTitle :title="$t('home.dd.jl')" :backgroundColor="backgroundColor"></guo-headerTitle>
		<view class="tui-tabs">
			<v-tabs v-model="activeTab" :scroll="false" :tabs="[$t('home.dd.cslb'), $t('home.dd.csjl')]"
				color="rgb(168, 169, 172)" activeColor="#222" bold lineColor="#1150c2" :lineScale="0.1"
				@change="onChangeTab"></v-tabs>
		</view>
		<view class="tui-card">

			<block v-if="!isData">
				<view class="tui-box" v-for="(item,index) in List" :key="index">
					<view class="tui-title">
						<view class="flex flex-item">
							<text class="name">{{item.title}}</text>
							<text class="desc">{{item.seconds}}S</text>
						</view>
						<view class="right" :style="{color:item.type == 1 ? '#f33b50' : '#0bb563'}">
							{{item.type == 1 ? $t('order.sg') : $t('order.sc')}}
						</view>
					</view>
					<view class="tui-orderTitle">
						<view class="">
							{{$t('order.ddbh')}}
						</view>
						<view class="code">
							{{item.order_sn}}
						</view>
					</view>
					<view class="flex flex-wrap">
						<view class="tui-wrapItem">
							<view class="">
								{{$t('order.je')}}
							</view>
							<view class="pice">
								{{item.number}}
							</view>
						</view>
						<view class="tui-wrapItem" :style="{width:'46%',visibility:item.end_profit?'visible':'hidden'}">
							<view class="">
								{{$t('order.yk')}}
							</view>
							<view class="pice"  :style="{color:item.end_profit < 0 ? '#f33b50' : '#0bb563'}">
								{{item.end_profit}}
							</view>
						</view>
						<view class="tui-wrapItem text-des-color">
							<view class="">
								{{$t('order.gmj')}}
							</view>
							<view class="pice">
								{{item.open_price}}
							</view>
						</view>
						<view class="tui-wrapItem text-des-color" style="width: 46%;">
							<view class="">
								{{activeTab == 1 ? $t('order.cjj') : $t('order.djs')}}
							</view>
							<view class="pice" :style="{color: activeTab == 0 ? '#fc6d22' : ''}">
								{{activeTab == 1 ? item.end_price : item.remain_milli_seconds/1000 + 'S'}}
							</view>
						</view>
						<view class="flex flex-item flex-between w-100 text-des-color p-2">
							<view class="left">
								<view class="">
									{{$t('order.ccsj')}}
								</view>
								<view class="pice">
									{{item.buy_time}}
								</view>
							</view>
							<view class="right" style="width: 46%;">
								<view class="">
									{{$t('order.pcsj')}}
								</view>
								<view class="pice">
									{{item.sell_time}}
								</view>
							</view>
						</view>
					</view>
				</view>
				<!--加载loadding-->
				<tui-loadmore :visible="loadding" :index="3" type="red"></tui-loadmore>
				<tui-nomore :visible="!pullUpOn" :text="$t('app.mtgd')"></tui-nomore>
				<!--加载loadding-->
			</block>
		</view>
		<template v-if="isData">
			<tui-noData :title="$t('home.dd.zwsj')">
				<image src="../../static/dd.png" class="tui-allImage" mode=""></image>
			</tui-noData>
		</template>
	</view>
</template>

<script>
	import {
		orderlist
	} from '@/api/order.js'

	export default {
		data() {
			return {
				backgroundColor: '#fff',
				activeTab: 0,
				List: [],
				PageIndex: 1,
				PageSize: 10,
				loadding: false,
				pullUpOn: true,
				isData: true,
				pageCount: 0,
				timer: null
			};
		},
		onLoad() {
			this.timer = setInterval(_ => {
				this.orderlist()
			}, 1000)
		},
		onHide() {
			clearInterval(this.timer)
		},
		// 上拉加载
		async onReachBottom() {
			if (!this.pullUpOn) return;
			this.PageIndex = this.PageIndex + 1;
			this.loadding = true;
			if (this.PageIndex <= this.pageCount) {
				await this.orderlist()
			} else {
				this.loadding = false;
				this.pullUpOn = false
			}

			console.log(this.FileInfoList.length)
		},
		methods: {
			onChangeTab(e) {
				console.log(e)
				this.PageIndex = 1;
				this.orderlist()
			},
			orderlist() {
				orderlist({
					status: this.activeTab == 0 ? 1 : 3,
					hideLoading: true
				}).then(({
					data
				}) => {
					console.log(data)
					if (data.lists.length !== 0) {
						this.isData = false
					} else {
						this.isData = true
					}
					if (!data.lists || data.lists.length < this.PageSize) {
						this.pullUpOn = false;
					}
					this.loadding = false;
					if (this.PageIndex == 1) {
						this.List = data.lists
					} else {
						this.List = this.List.concat(data.lists)
					}
				})
			}
		},

	}
</script>

<style lang="less">
	.flex-wrap {
		flex-wrap: wrap;
	}



	.w-100 {
		width: 100%;
	}

	.text-des-color {
		color: #a8a9ac !important;
		font-size: 20rpx !important;
	}

	.tui-red {
		color: #f33b50 !important;
	}

	.tui-green {
		color: #0bb563 !important;
	}

	.p-2 {
		padding-top: 10rpx;
	}

	.tui-card {
		padding: 0 36rpx;

		.tui-box {
			margin: 0 0 20rpx;
			background-color: #fff;
			border-radius: 13px;
			font-size: 24rpx;
			color: #a8a9ac;
			padding: 20rpx;
			box-sizing: border-box;
			margin-top: 20rpx;

			.left,
			.right {
				display: flex;
				flex-direction: column;

			}

			.tui-wrapItem {
				padding-top: 12rpx;
				color: #222;
				display: flex;
				align-items: center;
				width: 54%;

				.pice {
					font-weight: 700;
					padding-left: 20rpx;
				}
			}

			.tui-orderTitle {
				padding-top: 20rpx;
				display: flex;
				align-items: center;
				color: #222;

				.code {
					padding-left: 20rpx;
				}
			}

			.tui-title {
				padding-bottom: 20rpx;
				border-bottom: 1px solid #eee;
				font-size: 28rpx;
				font-weight: 700;
				color: #222;
				display: flex;
				align-items: center;
				justify-content: space-between;

				.right {
					color: #f33b50;
				}

				.desc {
					color: #fc6d22;
					font-size: 24rpx;
					padding-left: 10rpx;
				}
			}
		}
	}
</style>