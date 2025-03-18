<template>
	<view>
		<guo-headerTitle :title="title"></guo-headerTitle>
		<view class="" style="padding: 0 32rpx;">
			<view class="tui-form">
				<uni-forms ref="form" :modelValue="formData" label-position="top" label-width="200px" :rules="rules">
					<uni-forms-item :label="$t('password.jmm')" name="o_password" required>
						<uni-easyinput type="password" v-model="formData.o_password" :placeholder="$t('password.srjmm')"
							:inputBorder="true" :styles="styles" primaryColor="#1150c2"
							@blur="SetValue('o_password')" />
					</uni-forms-item>
					<uni-forms-item :label="$t('password.xmm')" name="password" required>
						<uni-easyinput type="password" v-model="formData.password" :placeholder="$t('password.srxmm')"
							:inputBorder="true" :styles="styles" primaryColor="#1150c2" @blur="SetValue('password')" />
					</uni-forms-item>
					<uni-forms-item :label="$t('password.qrmm')" name="check_password" required>
						<uni-easyinput type="password" v-model="formData.check_password"
							:placeholder="$t('password.qzcsrmm')" :inputBorder="true" :styles="styles"
							primaryColor="#1150c2" @blur="SetValue('check_password')" />
					</uni-forms-item>


					<view class="tui-submit" :class="(isBtn || is_ok) ? 'tui-ok' : 'tui-cancle'" @click="onClickBtn">
						{{$t('password.tj')}}
					</view>
				</uni-forms>
			</view>
		</view>
	</view>
</template>

<script>
	import {
		up_password,
		up_mpassword
	} from '@/api/user.js'
	export default {
		data() {
			return {
				title: '',
				formData: {
					o_password: '',
					password: '',
					check_password: ''
				},
				styles: {
					'borderColor': '#fff'
				},
				isBtn: false,
				rules: {
					o_password: {
						rules: [{
							required: true,
							errorMessage: this.$t('password.srjmm'),
						}, ],
					},
					password: {
						rules: [{
							required: true,
							errorMessage: this.$t('password.srxmm'),
						}, ],
					},
					check_password: {
						rules: [{
							required: true,
							errorMessage: this.$t('password.qzcsrmm'),
						}, ],
					},

				},
				type: ''
			};
		},
		onLoad(e) {
			this.type = e.type
			if (e.type == 'login') {
				this.title = this.$t('password.xgdlmm')
			} else {
				this.title = this.$t('password.xgzfmm')
			}
		},
		computed: {
			is_ok() {
				return this.formData.o_password.length > 5 && this.formData.password.length > 5 
				&& this.formData.check_password.length > 5
			}	
		},
		methods: {
			onClickBtn() {
				if (this.isBtn) {
					this.$refs.form.validate().then((res) => {
						this.isBtn = true
						console.log(this.title)
						if (this.type == 'login') {
							up_password({
								...this.formData,
								checkFree: true
							}).then((data) => {

								uni.showToast({
									title: data.massage,
									icon: 'none'
								})
								setTimeout(() => {
									uni.navigateBack(-1)
								}, 500)
							})
						} else {
							let params = {
								mpassword:this.formData.password,
								o_password:this.formData.o_password,
								check_password:this.formData.check_password,
							}
							up_mpassword({
								...params,
								checkFree: true
							}).then((data) => {

								uni.showToast({
									title: data.massage,
									icon: 'none'
								})
								setTimeout(() => {
									uni.navigateBack(-1)
								}, 500)
							})
						}
					})
				}
			},
			SetValue(value) {
				this.$refs.form.validate([value], (err, formData) => {
					if (!err) {
						this.isBtn = true
						console.log('success', formData)
					}
				})
			},
		}
	}
</script>

<style lang="less">
	.tui-cancle {
		background-color: rgb(241, 243, 246) !important;
		color: #a8a9ac !important;
		opacity: .5;
	}

	.tui-ok {
		background-color: #1150c2 !important;
		color: #fff !important;
	}

	.tui-submit {
		position: fixed;
		bottom: 110rpx;
		left: 0;
		right: 0;
		width: calc(100% - 35px);
		margin: 0 auto;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 20rpx;
		padding: 30rpx 0;
		font-size: 32rpx;
	}

	.tui-register {
		width: 100%;
		padding: 0 36rpx;
		margin-top: 30rpx;

		.tui-form {
			margin-top: 30rpx;
		}

		.tui-title {
			font-size: 44rpx;
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
	}
</style>