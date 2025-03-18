<template>
	<view class="">
		<guo-headerTitle :title="$t('set.sz')"></guo-headerTitle>
		<view class="tui-header">
			<view class="tui-list">
				<view class="tui-listItem" @click="$refs['langChange'].open()">
					<view class="flex-item flex">
						<view class="title">
							{{$t('set.yysz')}}
						</view>
					</view>
					<view class="flex flex-item">
						<view class="language">
							{{$t('set.yy')}}
						</view>
						<image class="tui-rightIcon" src="/static/youjian.png" mode=""></image>
					</view>
				</view>
				<view class="tui-listItem" @click="clickPassword('login')">
					<view class="flex-item flex">
						<view class="title">
							{{$t('set.dlmm')}}
						</view>
					</view>
					<view class="flex flex-item">
						<view class="language">
							{{$t('set.xg')}}
						</view>
						<image class="tui-rightIcon" src="/static/youjian.png" mode=""></image>
					</view>
				</view>
				<view class="tui-listItem" @click="clickPassword('password')">
					<view class="flex-item flex">
						<view class="title">
							{{$t('set.jymm')}}
						</view>
					</view>
					<view class="flex flex-item">
						<view class="language">
							{{$t('set.xg')}}
						</view>
						<image class="tui-rightIcon" src="/static/youjian.png" mode=""></image>
					</view>
				</view>
				<view class="tui-listItem" @click="beforeClearAllCache">
					<view class="flex-item flex">
						<view class="title">
							{{$t('set.qchc')}}
						</view>
					</view>

				</view>
				<view class="tui-listItem" style="background-color: #f4eadd;padding: 30rpx;margin-top: 40rpx;">
					<view class="flex-item flex">
						<view class="title" style="color: #fc6d22;">
							{{$t('set.gm')}}
						</view>
					</view>
					<view class="flex flex-item">
						<uni-icons type="right" size="15" style="color: #fc6d22;"></uni-icons>

					</view>
				</view>
			</view>
		</view>
		<langChange ref="langChange"></langChange>
	</view>
</template>

<script>
	export default {
		components: {

			langChange: () => import("@/components/langChange.vue"),
		},
		data() {
			return {

			};
		},
		methods: {
			clickPassword(type) {
				uni.navigateTo({
					url:'/pages/password/password?type=' + type
				})
			},
			onClickLeft() {
				uni.navigateBack(-1)
			},
			beforeClearAllCache() {
				uni.showModal({
					title: this.$t('set.ts'),
					content: this.$t('set.qchcdl'),
				}).then(res => {
					if (res.confirm) {
						this.clearAllCache()
					}
				})
			},
			async clearAllCache() {
				// 清除 localStorage
				localStorage.clear();

				// 清除 sessionStorage
				sessionStorage.clear();

				// 清除 cookies
				const cookies = document.cookie.split("; ");
				for (let i = 0; i < cookies.length; i++) {
					const cookie = cookies[i];
					const eqPos = cookie.indexOf("=");
					const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
					document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/";
				}

				// 清除 IndexedDB (需要异步操作)
				const databases = await indexedDB.databases();
				for (const db of databases) {
					indexedDB.deleteDatabase(db.name);
				}

				// 清除缓存存储（Cache Storage）
				if ('caches' in window) {
					caches.keys().then(function(keyList) {
						return Promise.all(keyList.map(function(key) {
							return caches.delete(key);
						}));
					});
				}
				this.$store.commit('RESET_STATE')
				uni.reLaunch({
					url: "/pages/welcome/welcome"
				})
			}
		}
	}
</script>

<style lang="less">
	page {
		background-color: #f6f7fb;
	}

	.tui-header {
		padding: 0 36rpx;
	}

	.tui-list {
		padding-bottom: 160rpx;
		margin-top: 20rpx;
		display: flex;
		flex-direction: column;
		width: 100%;

		.tui-listItem {
			width: 100%;
			font-size: 30rpx;
			background-color: #fff;
			border-radius: 13px;
			padding: 20rpx;
			box-sizing: border-box;
			display: flex;
			margin-top: 20rpx;
			display: flex;

			align-items: center;
			justify-content: space-between;

			.language {
				color: #a8a9ac;
				font-size: 30rpx;
				padding-right: 20rpx;
			}

			.tui-rightIcon {
				width: 6px;
				height: 11px;
			}

			.title {
				font-size: 30rpx;
				color: #222;
			}

			.logo {
				width: 60rpx;
				height: 60rpx;
				border-radius: 50%;
				margin-right: 20rpx;
			}
		}
	}

	.tui-set {
		flex: 1;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 40rpx;
		color: #222;
		font-weight: bold;
	}

	.tui-leftIcon {
		width: 80rpx;
		height: 80rpx;
		color: #fff !important;
		background-color: #cbcbcb;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;

	}
</style>