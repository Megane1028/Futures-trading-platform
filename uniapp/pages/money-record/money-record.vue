<template>
	<view>
		<guo-headerTitle :title="$t('money-record.zjjl')"></guo-headerTitle>
		<view class="tui-headerTitle" v-if="!isData">
			<view class="tui-card" v-for="(item,index) in List" :key="index">
				<view class="tui-left">
					<view class="title">
						{{item.content}}
					</view>
					<view class="time">
						{{item.addtime}}
					</view>
				</view>

				<view class="tui-right" :style="{color:item.money >= 0 ? '#0bb563' : '#f33b50'}">
					{{item.money >= 0 ? "+" : ''}} {{item.money}}
				</view>
			</view>
			<!--加载loadding-->
			<tui-loadmore :visible="loadding" :index="3" type="red"></tui-loadmore>
			<tui-nomore :visible="!pullUpOn" :text="$t('app.mtgd')"></tui-nomore>
			<!--加载loadding-->
		</view>
		<template v-if="isData">
			<tui-noData :title="$t('money-record.zwzjjl')">
				<image src="../../static/cw.png" class="tui-allImage" mode=""></image>
			</tui-noData>
		</template>
	</view>
</template>

<script>
	import {
		mark
	} from '@/api/money.js'
	export default {

		data() {
			return {
				List: [],
				PageIndex: 1,
				PageSize: 10,
				loadding: false,
				pullUpOn: true,
				isData: true,
				pageCount: 0
			};
		},
		onLoad() {
			this.mark()
		},
		// 上拉加载
		async onReachBottom() {
			if (!this.pullUpOn) return;
			this.PageIndex = this.PageIndex + 1;
			this.loadding = true;
			if (this.PageIndex <= this.pageCount) {
				await this.mark()
			} else {
				this.loadding = false;
				this.pullUpOn = false
			}

			console.log(this.FileInfoList.length)
		},
		methods: {
			mark() {
				mark({
					hideLoading: true,
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
						this.List = data.lists.map(item => {
							if (item.content &&item.content.includes("平仓获得收益")) {
								item.content = "平仓成功"
							}
							return item
						})
					} else {
						this.List = this.List.concat(data.lists).map(item => {
							if (item.content &&item.content.includes("平仓获得收益")) {
								item.content = "平仓成功"
							}
							return item
						})
					}
				})
			}
		}
	}
</script>

<style lang="less">
	.tui-headerTitle {
		padding: 0 36rpx;

		.tui-card {
			background-color: #fff;
			border-radius: 13px;
			padding: 26rpx;
			box-sizing: border-box;
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin-top: 20rpx;

			.tui-right {
				color: #f33b50;
				font-size: 28rpx;
			}

			.tui-left {
				display: flex;
				flex-direction: column;

				.title {
					font-size: 28rpx;
					color: #222;
				}

				.time {
					color: #a8a9ac;
					font-size: 20rpx;
					padding-top: 6rpx;
				}
			}
		}
	}
</style>