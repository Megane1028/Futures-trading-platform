<template>
	<view>
		<!-- 导航栏 -->
		<uni-nav-bar :border="false" statusBar leftWidth="230rpx" rightWidth="230rpx" backgroundColor="#f6f7fb">
			<template v-slot:left>
				<view class="tui-img">
					<image src="../../static/logo.png" mode=""></image>
				</view>
			</template>
			<template v-slot:right>
				<view class="tui-right" @click="$refs['langChange'].open()">
					<image src="../../static/diqiu.png" mode=""></image>
					<text>{{$t('app.yymc')}}</text>
				</view>
			</template>
		</uni-nav-bar>
		<!-- 登录 -->
		<view class="tui-login">
			<view class="tui-title">
				{{$t('login.zhdl')}}
			</view>
			<view class="tui-form no-r">
				<uni-forms ref="baseForm" :modelValue="formData" label-position="top" label-width="200rpx">
					<uni-forms-item :label="$t('login.zh')">
						<uni-easyinput :adjust-position="false" v-model="formData.account"
							:placeholder="$t('login.qsrzh')" :inputBorder="true" :styles="styles" primaryColor="#1150c2"
							@focus="hideTabbar" @blur="showTabbar" />
					</uni-forms-item>
					<uni-forms-item :label="$t('login.mm')">
						<uni-easyinput :adjust-position="false" type="password" v-model="formData.passwd"
							:placeholder="$t('login.qsrmm')" :inputBorder="true" :styles="styles" primaryColor="#1150c2"
							@focus="hideTabbar" @blur="showTabbar" />
					</uni-forms-item>
					<view class="tui-submit" :class="[{'tui-cancle':btnDisabled}]" @click="onClickLogin">
						{{$t('login.dl')}}
					</view>
				</uni-forms>
			</view>
		</view>
		<!-- 底部 -->
		<view class="bottom" v-if="tabbar">
			<view class="tui-first">
				<view class="register" @click="onClickRegister">
					{{$t('login.ljzc')}}
				</view>
				<view class="symbol">
				</view>
				<view class="" @click="onClickMessage">
					{{$t('home.zxkf')}}
				</view>
			</view>
			<view class="tui-Two">
				<view class="">
					{{$t('login.bsty')}}
				</view>
				<view class="policy" @click="onClickYinsi">
					{{$t('login.yszc')}}
				</view>
			</view>
		</view>
		<langChange ref="langChange"></langChange>
	</view>
</template>

<script>
	import {
		userLogin,
		userInfo,
		getUserIndex
	} from "@/api/user.js"
	export default {
		components: {
			langChange: () => import("@/components/langChange.vue"),
		},
		data() {
			return {
				formData: {
					// account: 'user66', 
					// passwd: '123456', 
					// account: 'mumu',
					// passwd: '123456'
					account: '',
					passwd: ''
				},
				styles: {
					'borderColor': '#fff'
				},
				tabbar: true,
				windowHeight: ''
			};
		},

		onLoad() {
			uni.getSystemInfo({
				success: (res) => {
					this.windowHeight = res.windowHeight;
				}
			});
			uni.onWindowResize((res) => {
				if (res.size.windowHeight < this.windowHeight) {
					this.tabbar = false
				} else {
					this.tabbar = true
				}
			})
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

		methods: {

			showTabbar() {
				this.tabbar = true;
			},
			hideTabbar() {
				this.tabbar = false;
			},
			onClickMessage() {
				getUserIndex({
					hideLoading: true,
				}).then(({
					data
				}) => {

					window.location.href = data.kefu_url
				});
			},
			onClickYinsi() {
				uni.navigateTo({
					url: '/pages/yinsi/yinsi'
				})
			},
			onClickLogin() {
				if (this.btnDisabled) return
				userLogin({
					...this.formData,
					checkFree: true
				}).then(({
					data: {
						token
					}
				}) => {
					this.$store.commit('setToken', token)
					userInfo().then(({
						data
					}) => {
						this.$store.commit('setUser', data)
						uni.switchTab({
							url: '/pages/index/index'
						})
					})
				})
			},
			onClickRegister() {
				uni.navigateTo({
					url: '/pages/login/registerCheck'
				})
			}
		}
	}
</script>

<style lang="less">
	page {
		background-color: #f6f7fb !important;
	}

	.bottom {
		position: fixed;
		bottom: 114rpx;
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

	.tui-first {
		display: flex;
		align-items: center;
		color: #1150c2;
		font-size: 29rpx;

		.symbol {
			background-color: #a8a9ac;
			width: 1px;
			height: 11px;
			margin: 0 9px;
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
	}

	.tui-login {
		width: 100%;
		padding: 0 60rpx;
		margin-top: 60rpx;

		.tui-form {
			margin-top: 60rpx;
		}

		.tui-title {
			font-size: 44rpx;
			font-weight: 800;
		}
	}

	.tui-img {

		width: 188rpx;
		height: 54rpx;

		image {
			width: 100%;
			height: 100%;
		}
	}

	.tui-right {

		display: flex;
		align-items: center;

		image {
			width: 40rpx;
			height: 40rpx;
		}

		text {
			padding-left: 20rpx;
			font-size: 32rpx;
			font-weight: bold;
			font-family: 'myfont';
		}
	}
</style>