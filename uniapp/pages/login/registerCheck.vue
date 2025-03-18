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
				{{$t('login.zhzc')}}
			</view>
			<view class="tui-form">
				<uni-forms ref="baseForm" :modelValue="formData" label-position="top" label-width="200rpx">
					<uni-forms-item :label="$t('login.zh')">
						<uni-easyinput :adjust-position="false" v-model="formData.account" :placeholder="$t('login.qsrzh')" :inputBorder="true"
							:styles="styles" primaryColor="#1150c2"  @focus="hideTabbar" @blur="showTabbar" />
					</uni-forms-item>
					<uni-forms-item :label="$t('login.sjh')">
						<uni-easyinput :adjust-position="false" v-model="formData.phone" :placeholder="$t('login.qsrsjh')" :inputBorder="true"
							:styles="styles" primaryColor="#1150c2"  @focus="hideTabbar" @blur="showTabbar" />
					</uni-forms-item>
					<uni-forms-item :label="$t('verify.xm')">
						<uni-easyinput :adjust-position="false" v-model="formData.real_name" :placeholder="$t('verify.srxm')" :inputBorder="true"
							:styles="styles" primaryColor="#1150c2"  @focus="hideTabbar" @blur="showTabbar" />
					</uni-forms-item>
					<uni-forms-item :label="$t('login.khm')">
						<uni-easyinput :adjust-position="false" v-model="formData.invitecode" :placeholder="$t('login.qsrkhm')"
							:inputBorder="true" :styles="styles" primaryColor="#1150c2"  @focus="hideTabbar" @blur="showTabbar" />
					</uni-forms-item>
					<view class="tui-submit" :class="[{'tui-cancle':btnDisabled}]" @click="checkInfo">
						{{$t('login.xyb')}}
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
		userCheckRegister
	} from "@/api/user.js"
	export default {
		data() {
			return {
				formData: {
					// account: 'user66',
					// phone: '18888888888',
					// real_name: '张三',
					// invitecode: '41',
					account: '',
					phone: '',
					real_name: '',
					invitecode: ''
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
				// this.tabbar = false;
			},
			onClickYinsi() {
				uni.navigateTo({
					url: '/pages/yinsi/yinsi'
				})
			},
			checkInfo() {
				if (this.btnDisabled) return
				userCheckRegister({
					...this.formData,
					checkFree: true
				}).then(_ => {
					this.$store.commit('setRegister', this.formData)
					uni.navigateTo({
						url: "/pages/login/register"
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
		padding-bottom: calc(env(safe-area-inset-bottom) + 30rpx);
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
		padding: 26rpx 0;
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