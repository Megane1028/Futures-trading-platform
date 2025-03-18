<template>
	<view>
		<!-- 导航栏 -->
		<uni-nav-bar :border="false" statusBar leftWidth="230rpx" rightWidth="230rpx" backgroundColor="#f6f7fb"
			height="120rpx">
			<template v-slot:left>
				<view class="tui-leftIcon" @click="back">
					<uni-icons type="arrow-left" size="25" style="color: #fff;"></uni-icons>
				</view>
			</template>
		</uni-nav-bar>
		<!-- 注册 -->
		<view class="tui-register">
			<view class="tui-title">
				{{$t('login.szmm')}}
			</view>
			<view class="tui-form">
				<uni-forms ref="baseForm" :modelValue="formData" label-position="top" label-width="200px">
					<uni-forms-item :label="$t('login.mm')">
						<uni-easyinput :adjust-position="false" v-model="formData.passwd"
							:placeholder="$t('login.qsrmm')" :inputBorder="true" :styles="styles" primaryColor="#1150c2"
							@focus="hideTabbar" @blur="showTabbar" />
					</uni-forms-item>
					<uni-forms-item :label="$t('login.qrmm')">
						<uni-easyinput :adjust-position="false" v-model="formData.o_passwd"
							:placeholder="$t('login.qsrqrmm')" :inputBorder="true" :styles="styles"
							primaryColor="#1150c2" @focus="hideTabbar" @blur="showTabbar" />
					</uni-forms-item>
					<uni-forms-item :label="$t('login.jymm')">
						<uni-easyinput :adjust-position="false" v-model="formData.mpasswd"
							:placeholder="$t('login.qsrjymm')" :inputBorder="true" :styles="styles"
							primaryColor="#1150c2" @focus="hideTabbar" @blur="showTabbar" />
					</uni-forms-item>
					<uni-forms-item :label="$t('login.qrjymm')">
						<uni-easyinput :adjust-position="false" v-model="formData.o_mpasswd"
							:placeholder="$t('login.qsrqrjymm')" :inputBorder="true" :styles="styles"
							primaryColor="#1150c2" @focus="hideTabbar" @blur="showTabbar" />
					</uni-forms-item>
					<view class="tui-submit" :class="[{'tui-cancle':btnDisabled}]" @click="onRegister">
						{{$t('login.wczc')}}
					</view>
				</uni-forms>
			</view>
		</view>
		<!-- 底部 -->
		<view class="bottom">
			<view class="tui-Two">
				<view class="">
					{{$t('login.bsty')}}
				</view>
				<view class="policy" @click="onClickYinsi">
					{{$t('login.yszc')}}
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	import {
		userRegister
	} from "@/api/user.js"
	export default {
		data() {
			return {
				formData: {
					// passwd: '666666',
					// o_passwd: '666666',
					// mpasswd: '888888',
					// o_mpasswd: '888888',
					passwd: '',
					o_passwd: '',
					mpasswd: '',
					o_mpasswd: ''
				},
				styles: {
					'borderColor': '#fff'
				},
				tabbar: true,
				windowHeight: ''
			};
		},
		computed: {
			btnDisabled() {
				try {
					Object.values(this.formData).forEach(item => {
						if (!item) {
							throw ('有空值')
						}
					})
				} catch (e) {
					//TODO handle the exception
					return true
				}
				return false
			}
		},
		onLoad() {
			uni.getSystemInfo({
				success: (res) => {
					this.windowHeight = res.windowHeight;
				}
			});
			// uni.onWindowResize((res) => {
			// 	if (res.size.windowHeight < this.windowHeight) {
			// 		this.tabbar = false
			// 	} else {
			// 		this.tabbar = true
			// 	}
			// })
		},
		methods: {
			showTabbar() {
				this.tabbar = true;
			},
			hideTabbar() {
				this.tabbar = false;
			},
			onClickYinsi() {
				uni.navigateTo({
					url: '/pages/yinsi/yinsi'
				})
			},
			onRegister() {
				if (this.btnDisabled) return
				if (this.formData.passwd !== this.formData.o_passwd) {
					return uni.showToast({
						title: this.$t('login.mmbyz'),
						icon: 'none'
					})
				}
				if (this.formData.mpasswd !== this.formData.o_mpasswd) {
					return uni.showToast({
						title: this.$t('login.jymmbyz'),
						icon: 'none'
					})
				}
				userRegister({
					...this.$store.state.registerInfo,
					...this.formData,
					checkFree: true
				}).then(_ => {
					uni.showModal({
						title: this.$t('login.zccg'),
						content: this.$t('login.zccgts'),
						showCancel: false,

					}).then(_ => {
						uni.reLaunch({
							url: "/pages/login/login"
						})
					})
				})
			},
			back() {
				uni.navigateBack()
			}
		},
	}
</script>

<style lang="less">
	page {
		background-color: #f6f7fb;
	}

	.bottom {
		position: fixed;
		// bottom: 114rpx;
		bottom: calc(env(safe-area-inset-bottom) + 30rpx);
		width: 100%;
		display: flex;
		align-items: center;
		flex-direction: column;
	}

	.tui-bottom {
		margin: 114rpx auto 0 !important;
		width: 100%;
		display: flex;
		align-items: center;
		flex-direction: column;
	}

	.tui-Two {
		display: flex;
		align-items: center;
		font-size: 24rpx;
		color: #a8a9ac;
		padding-top: 20rpx;

		.policy {
			color: #1150c2;
			padding-left: 10rpx;
		}
	}



	.tui-cancle {
		background-color: rgb(241, 243, 246) !important;
		color: #a8a9ac !important;
		opacity: .5;
	}

	.tui-submit {
		margin-top: 44rpx;
		background: #1150c2;
		color: #fff;
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 20rpx;
		padding: 30rpx 0;
		font-size: 32rpx;
	}

	.tui-register {
		width: 100%;
		padding: 0 60rpx;
		margin-top: 60rpx;

		.tui-form {
			margin-top: 60rpx;
		}

		.tui-title {
			font-size: 40rpx;
			font-weight: 800;
		}
	}

	/deep/.uni-easyinput__content {
		border-radius: 30rpx;
	}

	/deep/.uni-easyinput__content-input {
		height: 95rpx;
		border-radius: 30rpx;
	}

	/deep/.uni-easyinput {
		background-color: #fff;
		border-radius: 30rpx;
	}

	/deep/.uni-forms-item__label {
		color: #a8a9ac !important;
		font-size: 12px;
		padding: 0 !important;
	}
	
	/deep/ .uni-forms-item {
		margin-bottom: 12px !important;
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
		margin-left: 40rpx;
	}
</style>