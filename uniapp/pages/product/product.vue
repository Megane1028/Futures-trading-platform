<template>
	<view>
		<view class="tui-search">
			<uni-easyinput class="uni-mt-5" suffixIcon="search" :placeholder="$t('product.ss')" :inputBorder="true"
				:styles="styles" primaryColor="#1150c2" placeholderStyle="color:#c9c9c9;font-size:28rpx"
				v-model="searchText"></uni-easyinput>
		</view>
		<view class="tui-tabs">
			<v-tabs v-model="current" :tabs="tabs" @change="changeTab" color="#a8a9ac" activeColor="#222"
				lineColor="#1150c2" bold bgColor=""></v-tabs>
		</view>
		<!-- 货币种类 -->
		<view class="tui-variety">

			<view class="tui-classify">
				<view class="" style="flex: 1;">
					{{$t('home.mc')}}
				</view>
				<view class="tui-rightVariety" style="flex: 1;">
					<text>{{$t('home.zxjg')}}</text>
					<text>{{$t('home.24zf')}}</text>
				</view>
			</view>
			<view class="tui-varietyContent">
				<view class="tui-varietyContentItem" v-for="(item,index) in goodsList" :key="index"
					hover-class="tui-hover" @click="onClickDetail(item)">
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
					<view style="justify-content: flex-end;" class="flex">
						<view class="tui-end" :class="item.is_z == 1?'up':'down'">
							{{item.is_z == 1?'+':''}}{{item.zf}}
						</view>
					</view>
				</view>
			</view>
		</view>
		<tabbar :actIndex="1"></tabbar>
	</view>
</template>

</view>
</template>

<script>
	import {
		goods
	} from '@/api/money.js'
	export default {
		components: {
			tabbar: () => import("@/components/tabbar.vue"),
		},
		data() {
			return {
				styles: {
					'borderColor': '#fff'
				},
				current: 0,
				tabs: [this.$t('product.hbzl')],
				goodsList: [],
				timer: null,
				searchText: ''
			};
		},
		onUnload() {
			// 页面销毁时清除定时器
			if (this.timer) {
				clearInterval(this.timer);
			}
			console.log('页面销毁1')
		},
		onHide() {
			console.log('页面销毁1')
			if (this.timer) {
				clearInterval(this.timer);
			}
		},
		onLoad() {
			this.getGoods()
		},
		onShow() {
			this.timer = setInterval(() => {

				goods({
					hideLoading: true,
				}).then(({
					data
				}) => {

					this.goodsList = data
				})
			}, 5000);

		},
		methods: {
			onClickDetail({
				id,
				codename,
				title
			}) {
				uni.navigateTo({
					url: `/pages/Detail/Detail?id=${id}&codename=${codename}&title=${title}`
				})
			},
			setColor(e) {
				if (this.searchText.indexOf(e) != -1) {
					return 'color:#1150c2' //自定义颜色
				}
			},
			getGoods() {
				goods({
					hideLoading: true,
				}).then(({
					data
				}) => {

					this.goodsList = data
				})
			},
			changeTab(index) {
				console.log('当前选中的项：' + index)
			}
		}
	}
</script>

<style lang="less">
	page {
		background-color: #f6f7fb;
	}

	.tui-variety {

		position: relative;
		padding: 0 30rpx;
		padding-bottom: 60rpx;

		.tui-varietyContent {
			display: flex;
			flex-direction: column;

			.tui-hover {
				background-color: #fffaf9 !important;
				transform: seale(1.03);
			}

			.tui-varietyContentItem {
				width: 100%;
				background-color: #fff;
				border-radius: 13px;
				margin-top: 26rpx;
				padding: 30rpx;
				box-sizing: border-box;
				display: flex;
				align-items: center;

				.tui-end {
					padding: 10rpx;
					width: 80px;
					color: #fff;
					border-radius: 5px;
					font-size: 28rpx;
					box-sizing: border-box;
					text-align: center;

					&.up {
						background-color: #f33b50;
					}

					&.down {
						background-color: #0bb563;
					}
				}

				.code {
					flex: 1;
					max-width: 170rpx;
					overflow-wrap: break-word;
					font-size: 26rpx;

				}

				.name {
					display: flex;

					flex-direction: column;
					flex: 1;

					.piceName {
						font-size: 32rpx;
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

			.tui-rightVariety {
				width: 300rpx;
				display: flex;
				align-items: center;
				justify-content: space-between;
			}
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

	.tui-tabs {
		padding: 0 15rpx;
		box-sizing: border-box;
	}

	/deep/.uni-easyinput__content {
		border-radius: 30px;
	}

	/deep/.uni-easyinput__content-input {
		height: 90rpx;
		border-radius: 30px;
	}

	/deep/.uni-easyinput {
		background-color: #fff;
		border-radius: 30px;
	}

	/deep/.uni-forms-item__label {
		color: #a8a9ac !important;
	}
</style>