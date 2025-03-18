<template>
	<view>
		<uni-popup ref="popup" type="bottom" border-radius="10px 10px 0 0">
			<view class="tui-popupContent">
				<view class="flex flex-between flex-item p-26">
					<view class="title">
						{{$t('app.yysz')}}
					</view>
					<view class="cancle" @click="onClickCancle">
						{{$t('app.qx')}}
					</view>
				</view>
				<view class="tui-content">
					<view class="tui-contentItem" v-for="(item,index) in langList" :key="index" @click="seletLang(item)"
						:class="[{'tui-activite':showLang==item.value}]">
						{{item.name}}
					</view>

				</view>
			</view>
		</uni-popup>
	</view>
</template>

<script>
	export default {
		name: "langChange",
		data() {
			return {
				showLang: uni.getStorageSync('i18nLang'),
				langList: [{
						name: '简体中文',
						value: 'zh-CN'
					},
					{
						name: '繁體中文',
						value: 'zh-TW'
					}, {
						name: 'English',
						value: 'en-US'
					},
					{
						name: '日本語',
						value: 'ja-JP'
					},
					{
						name: 'ภาษาไทย',
						value: 'th-TH'
					},
					{
						name: 'Tiếng Việt',
						value: 'vi-VN'
					}, {
						name: 'IndonesiaName',
						value: 'id-ID'
					}, {
						name: '한국어',
						value: 'ko-KR'
					}, {
						name: 'Français',
						value: 'fr-FR'
					}, {
						name: 'Deutsch',
						value: 'de-DE'
					}
				]
			};
		},
		methods: {
			open() {
				// 通过组件定义的ref调用uni-popup方法 ,如果传入参数 ，type 属性将失效 ，仅支持 ['top','left','bottom','right','center']
				this.$refs.popup.open()
			},
			seletLang(item) {
				uni.setStorageSync('i18nLang', item.value)
				location.reload();
			}
		}
	}
</script>

<style lang="scss" scoped>
	.tui-popupContent {
		border-radius: 24px 24px 0 0;
		padding: 48rpx 0 0;
		background-color: #fff;

		.p-26 {
			padding: 0 32rpx;
		}

		.tui-content {
			margin-top: 40rpx;
			padding-bottom: 100rpx;

			.tui-contentItem {
				height: 100rpx;
				font-size: 28rpx;
				color: #222;
				display: flex;
				align-items: center;
				padding: 0 32rpx;
			}

			.tui-activite {
				background-color: #f3f5f6 !important;
				color: #1150c2 !important;
			}
		}

		.title {
			font-size: 32rpx;
			font-weight: 800;
			color: #222;
		}

		.cancle {
			color: #a8a9ac;
			font-size: 28rpx;
		}
	}
</style>