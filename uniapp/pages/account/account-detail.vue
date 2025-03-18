<template>
	<view>
		<guo-headerTitle :title="typeList[formData.pay_type]"></guo-headerTitle>
		<!-- 注册 -->
		<view class="tui-register">
			<view class="tui-form">
				<uni-forms ref="baseForm" :modelValue="formData" label-position="top">
					<template v-if="formData.pay_type == 'bank_card'">
						<uni-forms-item :label="$t('withdraw-money.xm')">
							<view class="tui-listItem" v-if="binded">
								<view class="flex-item flex">
									<view class="title">
										{{formData.user_name && this.$utils.replaceWithAsterisks(formData.user_name,1)}}
									</view>
								</view>
							</view>
							<uni-easyinput v-else v-model="formData.user_name" :placeholder="$t('account.srkhxm')"
								:inputBorder="true" :styles="styles" primaryColor="#1150c2" :adjust-position="false"
								@focus="hideTabbar" @blur="showTabbar" />
						</uni-forms-item>
						<uni-forms-item :label="$t('withdraw-money.gj')">
							<view class="tui-listItem" v-if="binded">
								<view class="flex-item flex">
									<view class="title">
										{{formData.gj && this.$utils.replaceWithAsterisks(formData.gj,1)}}
									</view>
								</view>
							</view>
							<uni-easyinput v-else v-model="formData.gj" :placeholder="$t('account.srgj')"
								:inputBorder="true" :styles="styles" primaryColor="#1150c2" :adjust-position="false"
								@focus="hideTabbar" @blur="showTabbar" />
						</uni-forms-item>
						<uni-forms-item :label="$t('account.khdz')">
							<view class="tui-listItem" v-if="binded">
								<view class="flex-item flex">
									<view class="title">
										{{formData.bank_branch && this.$utils.replaceWithAsterisks(formData.bank_branch,2)}}
									</view>
								</view>
							</view>
							<uni-easyinput v-else v-model="formData.bank_branch" :placeholder="$t('account.srkhdz')"
								:inputBorder="true" :styles="styles" primaryColor="#822151" :adjust-position="false"
								@focus="hideTabbar" @blur="showTabbar" />
						</uni-forms-item>
						<uni-forms-item :label="$t('withdraw-money.khh')">
							<view class="tui-listItem" v-if="binded">
								<view class="flex-item flex">
									<view class="title">
										{{formData.bank_name}}
									</view>
								</view>
							</view>
							<uni-easyinput v-else v-model="formData.bank_name" :placeholder="$t('account.srkhyx')"
								:inputBorder="true" :styles="styles" primaryColor="#1150c2" :adjust-position="false"
								@focus="hideTabbar" @blur="showTabbar" />
						</uni-forms-item>
						<uni-forms-item :label="$t('withdraw-money.kh')">
							<view class="tui-listItem" v-if="binded">
								<view class="flex-item flex">
									<view class="title">
										{{formData.account && getUsdt_back}}
									</view>
								</view>
							</view>
							<uni-easyinput v-else v-model="formData.account" :placeholder="$t('account.sryhkzh')"
								:inputBorder="true" :styles="styles" primaryColor="#1150c2" :adjust-position="false"
								@focus="hideTabbar" @blur="showTabbar" />
						</uni-forms-item>
					</template>
					<uni-forms-item :label="$t('account.bzdz')" v-else>
						<view class="tui-listItem" v-if="binded">
							<view class="flex-item flex">
								<view class="title">
									{{getUsdt_url }}
								</view>
							</view>
						</view>
						<uni-easyinput v-else v-model="formData.usdt_url" :placeholder="$t('account.srbzdz')"
							:inputBorder="true" :styles="styles" primaryColor="#1150c2" :adjust-position="false"
							@focus="hideTabbar" @blur="showTabbar" />
					</uni-forms-item>
					<view class="tui-submit" :class="[{'tui-cancle':btnDisabled}]" @click="onSubmit" v-if="!binded">
						{{$t('account.bc')}}
					</view>
				</uni-forms>
				<view class="bindTip">
					{{$t('account.lx')}}
					<uni-icons type="right" size="12"></uni-icons>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	import {
		userGetCash,
		userBindWithdraw
	} from "@/api/user.js"
	export default {
		data() {
			return {
				binded: false,
				typeList: {
					'bank_card': this.$t('account.yhk'),
					'usdt-trc20': 'USDT-TRC20',
					'usdt-erc20': 'USDT-ERC20',
				},
				formData: {
					user_name: '',
					gj: '',
					bank_name: '',
					account: '',
					bank_branch: '',
					usdt_url: '',
					pay_type: '',
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
				
				const {
					formData
				} = this
				if (formData.pay_type == 'bank_card') {
					for(let i in formData) {
						if (!formData[i] && i !== 'usdt_url'){
							return true
						}
					}
				} else {
					
					if (!formData.usdt_url) {
						return true
					}
				}
				return false
			},
			getUsdt_url(){
				if(!this.formData.usdt_url) return ''
				if(this.formData.usdt_url.length<=4)
					return this.formData.usdt_url + '**********' + this.formData.usdt_url
				else
					return this.formData.usdt_url.substring(0,4)+ '**********' + this.formData.usdt_url.substring(this.formData.usdt_url.length-4)
			},
			getUsdt_back(){
				if(!this.formData.account) return ''
				if(this.formData.account.length<=4)
					return this.formData.account + '**********' + this.formData.account
				else
					return this.formData.account.substring(0,4)+ '**********' + this.formData.account.slice(-4)
			}
		},
		onLoad(e) {
			this.formData.pay_type = e.pay_type
			this.getDetail()
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
		methods: {
			showTabbar() {
				this.tabbar = true;
			},
			hideTabbar() {
				this.tabbar = false;
			},
			getDetail() {
				userGetCash().then(({
					data
				}) => {
					const {
						pay_type
					} = this.formData
					if (data[pay_type]) {
						try {
							Object.entries(data[pay_type]).forEach(([key, val]) => {
								if (!val) {
									throw this.$t('account.ykz')
								}
							})
						} catch (e) {
							return false
						}
						this.binded = true
						Object.assign(this.formData, data[pay_type])
					}
				})
			},
			onSubmit() {
				if (this.btnDisabled) return
				userBindWithdraw({
					...this.formData,
				}).then(({
					data
				}) => {
					uni.showToast({
						title: this.$t('account.szcg'),
						icon: 'none',
						success() {
							setTimeout(_ => {
								uni.navigateBack()
							}, 1500)
						}
					})
				})
			}
		}
	}
</script>

<style lang="less">
	.tui-cancle {
		background-color: rgb(241, 243, 246) !important;
		color: #a8a9ac !important;
		opacity: .5;
	}

	.tui-listItem {
		width: 100%;
		font-size: 30rpx;
		background-color: #fff;
		border-radius: 13px;
		padding: 28rpx;
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
			font-size: 25rpx;
			color: #222;
		}

		.logo {
			width: 60rpx;
			height: 60rpx;
			border-radius: 50%;
			margin-right: 20rpx;
		}
	}

	.tui-submit {
		width: calc(100% - 66rpx);
		// position: fixed;
		// bottom: 57px;
		// left: 0;
		// right: 0;
		background: #1150c2;
		color: #fff;

		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 20rpx;
		padding: 30rpx 0;
		font-size: 32rpx;
		margin: 0 auto;
	}

	.tui-register {
		width: 100%;
		padding: 0 36rpx;
		margin-top: 60rpx;
		padding-bottom: calc(30rpx + env(safe-area-inset-bottom));

		.tui-form {
			margin-top: 60rpx;
		}

		.tui-title {
			font-size: 44rpx;
			font-weight: 800;
		}
	}

	/deep/.uni-easyinput__content {
		border-radius: 30rpx;

		&.is-disabled {
			color: #333;
			background-color: #ffffff;
		}
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
		padding: 0 !important;
		height:auto;
		font-size: 12px;
	}

	.bindTip {
		background-color: #f4eadd;
		color: #fc6d22;
		border-radius: 12px;
		margin-top: 32px;
		padding: 15px;
		font-size: 14px;
		display: flex;
		align-items: center;
		margin-bottom: calc(30rpx + env(safe-area-inset-bottom));

		text {
			margin-left: auto;
			color: #fc6d22 !important;
		}
	}
</style>