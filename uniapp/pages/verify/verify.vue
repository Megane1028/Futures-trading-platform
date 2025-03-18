<template>
	<view>
		<guo-headerTitle :title="$t('verify.smrz')"></guo-headerTitle>
		<view class="tui-register" v-if="userInfo.is_auth == 0 || userInfo.is_auth == -1">
			<view class="tui-form">
				<uni-forms ref="form" :modelValue="formData" label-position="top" label-width="200px" :rules="rules">
					<uni-forms-item :label="$t('verify.xm')" name="real_name" required>
						<uni-easyinput v-model="formData.real_name" :placeholder="$t('verify.srxm')" :inputBorder="true"
							:styles="styles" primaryColor="#1150c2" @blur="SetValue('real_name')" />
					</uni-forms-item>
					<uni-forms-item :label="$t('verify.zjh')" name="id_card" required>
						<uni-easyinput type="number" v-model="formData.id_card" :placeholder="$t('verify.srzjh')"
							:inputBorder="true" :styles="styles" primaryColor="#1150c2" @blur="SetValue('id_card')" />
					</uni-forms-item>
					<uni-forms-item :label="$t('verify.gj')" name="gj" required>
						<uni-easyinput v-model="formData.gj" :placeholder="$t('verify.srgj')" :inputBorder="true" :styles="styles"
							primaryColor="#1150c2" @blur="SetValue('gj')" />
					</uni-forms-item>
					<uni-forms-item :label="$t('verify.sczjz')">
						<view class="tui-certificate">
							<uni-forms-item label="" name="id_img_1" required>
								<view class="item" @click="onUploadImg">
									<image :src="img1 == '' ?  require('@/static/front.png') : img1" mode=""></image>
									<view class="first">
										{{$t('verify.zjzm')}}
									</view>
									<view class="two">
										{{$t('verify.sqzjrmx')}}
									</view>
								</view>
							</uni-forms-item>
							<uni-forms-item label="" name="id_img_2" required>
								<view class="item" @click="onUploadImgReverse">
									<image :src="img2 == '' ? require('@/static/back.png') : img2" mode=""></image>
									<view class="first">
										{{$t('verify.zjfm')}}
									</view>
									<view class="two">
										{{$t('verify.sczjfm')}}
									</view>
								</view>
							</uni-forms-item>

						</view>
					</uni-forms-item>

					<view class="tui-submit" :class="isBtn ? 'tui-ok' : 'tui-cancle'" @click="onClickBtn">
						{{$t('verify.tj')}}
					</view>
				</uni-forms>
			</view>
		</view>
		<!-- 认证审核过渡页 -->
		<view class="tui-audit" v-if="userInfo.is_auth == 1">
			<image class="circle" src="/static/rzz.png" mode=""></image>
			<view class="mt-lg">
				{{$t('verify.rzz')}}
			</view>
			<view class="desc-lg">
				{{$t('verify.ytj')}}
			</view>
		</view>
		<!-- 认证成功 -->
		<view class="tui-audit" v-if="userInfo.is_auth == 2">
			<image class="circle" src="/static/rzcg.png" mode=""></image>
			<view class="mt-lg">
				{{$t('verify.rzcg')}}
			</view>
		</view>
		<!-- 弹出框 -->
		<uni-popup ref="popup" type="center">
			<view class="tui-Model">
				<view class="main">
					<image class="icon-lg" src="/static/success-lg.png" mode=""></image>
					<view class="title">
						{{$t('verify.ytj')}}
					</view>
				</view>
				<view class="btn_box" @click="onClickCancle">
					{{$t('verify.wzdl')}}
				</view>
			</view>
		</uni-popup>
	</view>
</template>

<script>
	import {
		doAuth,
	} from '@/api/money.js'
	import {
		userInfo
	} from "@/api/user.js"
	import updateFile from "@/utils/upload.js"

	export default {
		data() {
			return {
				userInfo: {},
				formData: {
					real_name: '',
					id_card: '',
					gj: '',
					id_img_1: '',
					id_img_2: '',
				},
				styles: {
					'borderColor': '#fff'
				},
				isBtn: false,
				rules: {
					real_name: {
						rules: [{
							required: true,
							errorMessage: this.$t('verify.srxm'),
						}, ],
					},
					id_card: {
						rules: [{
							required: true,
							errorMessage: this.$t('verify.srzjh'),
						}, ],
					},
					gj: {
						rules: [{
							required: true,
							errorMessage: this.$t('verify.srgj'),
						}, ],
					},
					id_img_1: {
						rules: [{
							required: true,
							errorMessage: this.$t('verify.sczjz'),
						}, ],
					},
					id_img_2: {
						rules: [{
							required: true,
							errorMessage: this.$t('verify.sczjz'),
						}, ],
					}
				},
				img1: '',
				img2: ''
			};
		},
		onLoad() {
			this.getDetail()
		},
		methods: {
			getDetail() {
				userInfo({
					hideLoading: true
				}).then(({
					data
				}) => {
					this.userInfo = data
				})
			},
			onClickCancle() {
				this.$refs.popup.close()
			},
			onUploadImgReverse() {
				uni.chooseImage({
					count: 1, //上传图片的数量，默认是9
					sizeType: ['original', 'compressed'], //可以指定是原图还是压缩图，默认二者都有

					success: async (res) => {
						const tempFilePaths = res.tempFilePaths; //拿到选择的图片，是一个数组\
						uni.showLoading({
							title: this.$t('verify.scz')
						})

						let xhr = await updateFile(tempFilePaths[0])
						console.log(xhr)
						this.formData.id_img_2 = xhr.data.headimg
						this.img2 = xhr.data.content_all
						this.$refs.form.validate().then((res) => {
							this.isBtn = true
						})
						uni.hideLoading()
					}
				});
			},
			onUploadImg() {
				uni.chooseImage({
					count: 1, //上传图片的数量，默认是9
					sizeType: ['original', 'compressed'], //可以指定是原图还是压缩图，默认二者都有

					success: async (res) => {
						const tempFilePaths = res.tempFilePaths; //拿到选择的图片，是一个数组\
						uni.showLoading({
							title: this.$t('verify.scz')
						})

						let xhr = await updateFile(tempFilePaths[0])
						console.log(xhr)
						this.formData.id_img_1 = xhr.data.headimg
						this.img1 = xhr.data.content_all
						this.$refs.form.validate().then((res) => {
							this.isBtn = true
						})
						uni.hideLoading()
					}
				});
			},
			SetValue(value) {
				this.$refs.form.validate([value, 'id_img_1', 'id_img_2'], (err, formData) => {
					if (!err) {
						this.isBtn = true
						console.log('success', formData)
					}
				})
			},

			onClickBtn() {
				if (this.isBtn) {
					this.$refs.form.validate().then((res) => {
						this.isBtn = true
						doAuth({
							...this.formData,
							checkFree: true
						}).then((data) => {
							this.$refs.popup.open()
							this.getDetail()
						})
					})
				}
			}
		}
	}
</script>

<style lang="less">
	.tui-audit {
		margin-top: 208rpx;
		display: flex;
		flex-direction: column;
		align-items: center;

		.circle {
			width: 202rpx;
			height: 202rpx;
			border-radius: 50%;
		}

		.mt-lg {
			padding-top: 40rpx;
			font-size: 40rpx;
			font-weight: 500;
		}

		.desc-lg {
			color: #a8a9ac;
			font-size: 30rpx;
			padding-top: 20rpx;
		}
	}

	.tui-Model {
		width: 536rpx;
		background-color: #fff;
		border-radius: 13px;

		.btn_box {
			border-top: 1px solid #eee;
			height: 88rpx;
			overflow: hidden;
			border-radius: 0 0 24rpx 24rpx;
			font-size: 24rpx;
			color: #222;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.main {
			padding: 30rpx;
			box-sizing: border-box;
			display: flex;
			align-items: center;
			flex-direction: column;

			.icon-lg {
				width: 66rpx;
				height: 66rpx;
			}

			.title {
				padding-top: 28rpx;
				font-size: 28rpx;
				color: #222;
				font-weight: 500;
			}
		}
	}

	.tui-certificate {
		display: flex;
		justify-content: space-between;

		.item:nth-child(2) {
			margin-right: 0;
		}

		.item {
			flex: 1;
			background-color: #fff;
			border-radius: 13px;
			display: flex;
			align-items: center;
			flex-direction: column;
			padding: 20rpx;
			box-sizing: border-box;
			margin-right: 20rpx;

			.first {
				font-size: 28rpx;
				padding-top: 20rpx;
				color: #222;
			}

			.two {
				color: #a8a9ac;
				font-size: 20rpx;
				padding-top: 6rpx;
			}

			image {
				width: 294rpx;
				height: 182rpx;
			}
		}
	}

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
		margin-top: 44rpx;
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