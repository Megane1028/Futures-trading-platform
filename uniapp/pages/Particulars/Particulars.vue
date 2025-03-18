<template>
	<view>
		<guo-headerTitle :title="$t('product.yebmx')" backgroundColor="#fff"></guo-headerTitle>
		<view class="tui-tabs">
			<v-tabs v-model="activeTab" :scroll="false" :tabs="[$t('product.qb'), $t('product.cr'), $t('product.zc'), $t('product.sy')]" color="rgb(168, 169, 172)"
				activeColor="#222" bold lineColor="#1150c2" :lineScale="0.1" @change="onChangeTab"></v-tabs>
		</view>
		<view class="tui-headerTitle" v-if="!isData">
			<view class="tui-card" v-for="(item,index) in List" :key="index">
				<view class="tui-left">
					<view class="title">
						{{item.type == 2 ? $t('product.cr') : item.type == 3 ? $t('product.sy') : $t('product.zc')}}
					</view>
					<view class="time">
						{{item.create_time}}
					</view>
				</view>
				<view class="tui-right"
					:style="{color:item.type == 2 ? '#f33b50' : item.type == 3 ? '#f33b50' : '#0bb563'}">
					{{item.type == 2 ? '+' : item.type == 3 ? '+' : '-'}}{{item.amount}}
				</view>
			</view>
			<!--加载loadding-->
			<tui-loadmore :visible="loadding" :index="3" type="red"></tui-loadmore>
			<tui-nomore :visible="!pullUpOn" :text="$t('app.mtgd')"></tui-nomore>
			<!--加载loadding-->
		</view>
		<template v-if="isData">
			<tui-noData :title="$t('app.zwsj')">
				<image src="@/static/xjb.png" class="tui-allImage" mode=""></image>
			</tui-noData>
		</template>
	</view>
</template>

<script>
	import {
		getMoneyLog
	} from '@/api/money.js'
	export default {
		data() {
			return {
				activeTab: 0,
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
			this.getMoneyLog()
		},
		// 上拉加载
		async onReachBottom() {
			if (!this.pullUpOn) return;
			this.PageIndex = this.PageIndex + 1;
			this.loadding = true;
			if (this.PageIndex <= this.pageCount) {
				await this.getMoneyLog()
			} else {
				this.loadding = false;
				this.pullUpOn = false
			}

			console.log(this.FileInfoList.length)
		},
		methods: {
			onChangeTab() {
				this.getMoneyLog()
			},
			getMoneyLog() {
				getMoneyLog({
					type: this.activeTab == 0 ? 1 : this.activeTab == 1 ? 2 : this.activeTab == 2 ? 4 : 3
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
		}
	}
</script>

<style lang="less">
	.tui-headerTitle {
		padding: 0 36rpx;
		margin-top: 40rpx;

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