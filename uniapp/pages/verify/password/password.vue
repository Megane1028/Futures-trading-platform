<template>
	<view>
		<guo-headerTitle :title="title"></guo-headerTitle>
		<view class="" style="padding: 0 32rpx;">
			<view class="tui-form">
				<uni-forms ref="form" :modelValue="formData" label-position="top" label-width="200px" :rules="rules">
					<uni-forms-item :label="$t('password.jmm')" name="oldpassword" required>
						<uni-easyinput v-model="formData.oldpassword" :placeholder="$t('password.srjmm')"
							:inputBorder="true" :styles="styles" primaryColor="#1150c2"
							@blur="SetValue('oldpassword')" />
					</uni-forms-item>
					<uni-forms-item :label="$t('password.xmm')" name="newpassword" required>
						<uni-easyinput type="number" v-model="formData.newpassword" :placeholder="$t('password.srxmm')"
							:inputBorder="true" :styles="styles" primaryColor="#1150c2"
							@blur="SetValue('newpassword')" />
					</uni-forms-item>
					<uni-forms-item :label="$t('password.qrmm')" name="submitpassword" required>
						<uni-easyinput v-model="formData.submitpassword" :placeholder="$t('password.qzcsrmm')"
							:inputBorder="true" :styles="styles" primaryColor="#1150c2"
							@blur="SetValue('submitpassword')" />
					</uni-forms-item>


					<view class="tui-submit" :class="isBtn ? 'tui-ok' : 'tui-cancle'" @click="onClickBtn">
						{{$t('verify.tj')}}
					</view>
				</uni-forms>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				title: '',
				formData: {
					oldpassword: '',
					newpassword: '',
					submitpassword: ''
				},
				styles: {
					'borderColor': '#fff'
				},
				isBtn: false,
				rules: {
					oldpassword: {
						rules: [{
							required: true,
							errorMessage: this.$t('password.jmm'),
						}, ],
					},
					newpassword: {
						rules: [{
							required: true,
							errorMessage: this.$t('password.xmm'),
						}, ],
					},
					submitpassword: {
						rules: [{
							required: true,
							errorMessage: this.$t('password.qrmm'),
						}, ],
					},

				},
			};
		},
		onLoad(e) {
			if (e.type == 'login') {
				this.title = this.$t('set.xgdlmm')
			} else {
				this.title = this.$t('set.xgzfmm')
			}
		},
		methods: {
			SetValue(value) {
				this.$refs.form.validate([value, 'id_img_1', 'id_img_2'], (err, formData) => {
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