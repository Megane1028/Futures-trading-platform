<template>
	<view>
		<guo-headerTitle :title="$t('home.xtxx')"></guo-headerTitle>
		<view class="tui-header">
			<view class="tui-card" :class="[{read:item.is_read==2}]" v-for="(item,index) in pageList" :key="index">
				<view class="tui-leftIcon">
				</view>
				<view class="tui-right">
					<view class="desc">
						{{item.cont}}
					</view>
					<view class="flex flex-between">
						<view class="time">
							{{item.time}}
						</view>
						<view class="time" v-if="false">
							【{{item.seconds}}S】
						</view>
					</view>
					
				</view>
			</view>
		</view>
		<tui-noData v-if="!pageList.length" :title="$t('home.xtxx.zwsj')">
			<image src="../../static/dd.png" class="tui-allImage" mode=""></image>
		</tui-noData>
	</view>
</template>

<script>
	import {
		msgList
	} from "@/api/app.js"
	export default {
		data() {
			return {
				pageList: []
			};
		},
		onLoad() {
			this.getList()
		},
		methods: {
			getList() {
				msgList().then(({
					data
				}) => {
					this.pageList = data
				})
			}
		}
	}
</script>

<style lang="less">
	.tui-header {
		padding: 0 36rpx;

		.tui-card {
			background-color: #fff;
			border-radius: 13px;
			margin-top: 20rpx;
			padding: 30rpx;
			box-sizing: border-box;
			display: flex;
			justify-content: space-between;

			.tui-right {
				flex: 1;
				display: flex;
				flex-direction: column;
				padding-left: 20rpx;

				.desc {
					color: #aeaeae;
					font-size: 28rpx;
				}

				.time {
					color: #aeaeae;
					font-size: 24rpx;
					padding-top: 16rpx;
				}
			}

			.tui-leftIcon {
				width: 44rpx;
				height: 44rpx;
				border-radius: 50%;
				display: flex;
				flex-shrink: 0;
				background-size: 100% 100%;
				background-image: url('~@/static/js-yd.png');
			}

			&.read {
				.tui-right {
					.desc {
						color: #aeaeae;
					}

					.time {
						color: #aeaeae;
					}
				}

				.tui-leftIcon {
					background-image: url('~@/static/js-yd.png');
				}
			}
		}
	}
</style>