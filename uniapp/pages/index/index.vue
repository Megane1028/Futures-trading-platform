<template>
	<view class="tui-header">
		<view class="tui-NavHeader" :style="stickyStyle">
			<view class="tui-img">
				<image src="@/static/logo.png" mode=""></image>
			</view>
			<view class="tui-right" @click="$refs['langChange'].open()">
				<image src="@/static/diqiu.png" mode=""></image>
				<text>{{$t('app.yymc')}}</text>
			</view>
		</view>
		<view class="tui-banner">
			<uni-swiper-dot class="uni-swiper-dot-box" :info="info" :current="current" :mode="mode"
				:dots-styles="dotsStyles" field="content">
				<swiper class="swiper-box" @change="change" autoplay>
					<swiper-item v-for="(item, index) in info" :key="index">
						<view class="swiper-item" :class="'swiper-item' + index">
							<image :src="item" mode=""></image>
						</view>
					</swiper-item>
				</swiper>
			</uni-swiper-dot>
		</view>
		<view :class="['platformIntroduction', { show: isFold }]">
			<view class="con-title">
				<image src="/static/title.png"></image>
				<text> {{$t('home.ptld')}} </text>
				<image src="/static/title.png"></image>
			</view>
			<view class="lightspot">
				{{$t('home.ptld.jj')}}
			</view>
			<lightspotImg></lightspotImg>
			<view class="con-title">
				<image src="/static/title.png"></image>
				<text> {{$t('home.xwzx')}} </text>
				<image src="/static/title.png"></image>
			</view>

			<view class="newList">
				<view class="newsItem">
					<view class="title">
						北大光华-广期所新能源产业高管研修课程圆满结业
					</view>
					<view class="con">
						10月22日，广州期货交易所“新能源产业高级管理人员研修课程”在北京大学光华管理学院举办结业仪式。光华管理学院党委书记马化祥、广期所总经理朱丽红出席仪式并致辞，广期所副总经理冷冰出席仪式。
					</view>
					<view class="btn">
						<view class="" @click="toNews(1)">
							查看详情
						</view>
					</view>
				</view>
				<view class="newsItem">
					<view class="title">
						广期所工业硅期货和期权荣获FOW最佳新合约奖
					</view>
					<view class="con">
						2023年9月21日，广期所工业硅期货和期权在期货和期权世界杂志（FOW）主办的“2023年度亚洲资本市场颁奖典礼”上荣获“年度最佳新合约——大宗商品”奖项。评审团认为，广期所作为创新型交易所，打造了绿色发展类产品基准，推动服务产业在绿色转型发展中的风险管理需求。
					</view>
					<view class="btn">
						<view class="" @click="toNews(2)">
							查看详情
						</view>
					</view>
				</view>
			</view>
			<view class="con-title">
				<image src="/static/title.png"></image>
				<text> {{$t('home.yszc')}} </text>
				<image src="/static/title.png"></image>
			</view>
			<view class="policy">
				{{ policyText }}
			</view>
			<view class="packUpBtn">
				<image src="/static/lucky_fold.png"></image>
				<view class="btnBox">
					<view class="" @click="isFold = false"> {{$t('home.dj.sq')}} </view>
				</view>
			</view>
		</view>
		<view :class="['conBox', { hide: isFold }]">
			<view class="tui-decorate">
				<view class="tui-line"></view>
				<view class="tui-lucky">
					<view class="tui-luckImge"></view>
				</view>
				<view class="tui-luckyHand"></view>
				<view class="tui-dialog"></view>
				<view class="tui-popupDia" @click="isFold = true"> {{$t('home.dj.w')}}~ </view>
			</view>
			<!-- 内容 -->
			<view class="tui-card">
				<view class="tui-content animate__animated animate__fadeInTopRight">
					<view class="item" v-for="(item, index) in menuList" :key="index" @click="onClickOpen(item, index)">
						<template v-if="index < 6">
							<image :src="item.icon" mode="aspectFill"></image>
							<view class="tui-positionBadge" v-if="index == 5">
								<uni-badge class="uni-badge-left-margin" v-if="count != 0" :text="count" />
							</view>
							<view class="title">
								{{ item.title }}
							</view>
						</template>
						<template v-else>
							<view class="tui-itemLeft">
								<view class="kefu">
									{{ item.title }}
								</view>
								<view class="fuwu"> {{$t('home.zxkf.fw')}} </view>
							</view>
							<view class="tui-itemRight">
								<image :src="item.icon" mode="aspectFill"></image>
							</view>
						</template>
					</view>
				</view>
				<!-- 公告 -->
				<view class="tui-notice" @click="onClickNotice">
					<image src="/static/laba.png" mode=""></image>
					<view class="tui-desc">
						<view class="title">{{getUserItem.gg_title}} </view>

						<view class="time"> {{getUserItem.gg_time}}</view>
					</view>
				</view>
				<!-- 产品推荐 -->
				<view class="tui-recommend no-s">
					<view class="title"> {{$t('home.cptj')}} </view>
					<scroll-view class="prefer-scroll" scroll-x="true">
						<block v-for="(item, index) in goodsList" :key="index">
							<view class="image-box" @click="onClickDetail(item)">
								<view class="name">{{ item.title }}</view>
								<view class="desc">
									{{ item.codename }}
								</view>

								<image v-if="item.is_z == 1" class="tui-shitu"
									:src="require(`@/static/down_${getImgBg(item.zf)}.png`)" mode=""></image>
								<image v-else class="tui-shitu" :src="require(`@/static/up_${getImgBg(item.zf)}.png`)"
									mode="">
								</image>
								<view class="proportion">
									{{ item.price }}
								</view>
								<view class="parities">
									<text>{{ item.zf_d }}</text>
									<view class="tui-rightParities">
										<image class="down" :src="
											  require(`@/static/${item.is_z == 1?'red_up':'green_down'}.png`)" mode=""></image>
										<view class="rise" :style="{ color: item.is_z == 1 ? '#f33b50' : '#0bb563' }">
											{{ item.zf }}
										</view>
									</view>
								</view>
							</view>
						</block>
					</scroll-view>
				</view>
				<!-- 货币种类 -->
				<view class="tui-variety animate__animated animate__bounceInRight">
					<view class="title"> {{$t('home.hbzl')}} </view>
					<view class="tui-classify">
						<view class="" style="flex: 1"> {{$t('home.mc')}} </view>
						<view class="tui-rightVariety" style="flex: 1">
							<text>{{$t('home.zxjg')}}</text>
							<text>{{$t('home.24zf')}}</text>
						</view>
					</view>
					<view class="tui-varietyContent">
						<view class="tui-varietyContentItem" v-for="(item, index) in goodsList" :key="index"
							hover-class="tui-hover" @click="onClickDetail(item)">
							<view class="name">
								<text class="piceName">{{ item.title }}</text>
								<view class="flex-column" style="color: #a8a9ac; font-size: 20rpx">
									<text>{{$t('home.24l')}}</text>
									<text>{{ item.vol }}</text>
								</view>
							</view>
							<view class="code">
								{{ item.price }}
							</view>
							<view style="justify-content: flex-end" class="flex">
								<view class="tui-end" :class="item.is_z == 1 ? 'up' : 'down'">
									{{item.is_z == 1?'+':''}}{{ item.zf }}
								</view>
							</view>
						</view>
					</view>
				</view>
			</view>
		</view>
		<!-- 公告 -->
		<uni-popup ref="popup" type="center">
			<view class="tui-popup">
				<view class="tui-desc">
					<view class="title">{{getUserItem.gg_title}} </view>
					<view class="time" style="padding: 30rpx 0;"> {{getUserItem.gg_time}}</view>
					<view class="desc">{{getUserItem.gg_con}} </view>
				</view>
			</view>
		</uni-popup>
		<langChange ref="langChange"></langChange>
		<tabbar :actIndex="0" v-show="!isFold"></tabbar>
	</view>
</template>

<script>
	import {
		goods,
		get_count
	} from "@/api/money.js";
	import {
		policyText
	} from "./data.js";
	import {
		getUserIndex
	} from '@/api/user.js'
	export default {
		components: {
			lightspotImg: () => import("@/components/lightspotImg.vue"),
			langChange: () => import("@/components/langChange.vue"),
			tabbar: () => import("@/components/tabbar.vue"),
		},

		data() {
			return {
				value: 0,
				policyText,
				isFold: false,
				current: 0,
				mode: "dot",
				info: [
					"https://dkzk65jpm6jtb.cloudfront.net/storage/banner/image/de8940e7b3d5aedfdac21084195d4bc9.jpeg",
					"https://dkzk65jpm6jtb.cloudfront.net/storage/banner/image/063d3e72a395a86456b454173ec64e42.jpeg",

				],
				dotsStyles: {
					selectedBackgroundColor: "#fff",
					selectedBorder: "#fff",
				},
				menuList: [{
						title: this.$t("home.kjrj"),
						icon: require("@/static/kjrj.png"),
					},
					{
						title: this.$t("home.cpjy"),
						icon: require("@/static/cpjy.png"),
					},
					{
						title: this.$t("home.wddd"),
						icon: require("@/static/wddd.png"),
					},
					{
						title: this.$t("home.ckfs"),
						icon: require("@/static/ckfs.png"),
					},
					{
						title: this.$t("home.gywm"),
						icon: require("@/static/about.png"),
					},
					{
						title: this.$t("home.xtxx"),
						icon: require("@/static/xtxx.png"),
					},
					{
						title: this.$t("home.zxkf"),
						icon: require("@/static/kefu.png"),
					},
				],
				goodsList: [],
				timer: null,
				stickyStyle: "", // 吸顶元素的样式
				upImage: [
					require("@/static/up_0.png"),
					require("@/static/up_1.png"),
					require("@/static/up_2.png"),
					require("@/static/up_3.png"),
				],
				downImage: [
					require("@/static/down_0.png"),
					require("@/static/down_1.png"),
					require("@/static/down_2.png"),
					require("@/static/down_3.png"),
				],
				count: 0,
				getUserItem: {}
			};
		},
		onUnload() {
			// 页面销毁时清除定时器
			if (this.timer) {
				clearInterval(this.timer);
			}
			this.stickyStyle = "";
		},
		onHide() {
			this.stickyStyle = "";
			if (this.timer) {
				clearInterval(this.timer);
			}
		},
		onPageScroll(e) {
			// 监听页面滚动事件
			if (e.scrollTop > 100) {
				// 当滚动距离超过100时，设置吸顶元素的样式，使其固定在页面顶部
				this.stickyStyle =
					"position: fixed; top: 0; left: 0; width: 100%; z-index: 99999;background-color: #f6f7fb;";
			} else {
				// 滚动距离不足100时，取消吸顶效果
				this.stickyStyle = "";
			}
		},
		onLoad() {
			this.getGoods();
		},
		onShow() {
			this.getUserIndex()
			this.get_count()
			this.timer = setInterval(() => {
				goods({
					hideLoading: true,
				}).then(({
					data
				}) => {

					this.goodsList = data;
				});
			}, 5000);
		},
		methods: {
			toNews(id) {
				uni.navigateTo({
					url: `/pages/index/detail?Id=${id}`,
				});
			},
			getUserIndex() {
				getUserIndex({
					hideLoading: true,
				}).then(({
					data
				}) => {

					this.getUserItem = data;
				});
			},
			get_count() {
				get_count({
					hideLoading: true,
				}).then(({
					data
				}) => {
					this.count = data.count
				});
			},
			getImgBg(num) {
				return Math.floor(Math.random() * (4 + 1));
			},
			getGoods() {
				goods({
					hideLoading: true,
				}).then(({
					data
				}) => {
					this.goodsList = data;
				});
			},
			onClickDetail({
				id,
				codename,
				title
			}) {
				uni.navigateTo({
					url: `/pages/Detail/Detail?id=${id}&codename=${codename}&title=${title}`,
				});
			},
			onClickNotice() {
				this.$refs.popup.open();
			},
			change(e) {
				this.current = e.detail.current;
			},
			onClickOpen(item, index) {
				switch (index) {
					case 5:
						uni.navigateTo({
							url: "/pages/message/message",
						});
						break;
					case 3:
						uni.navigateTo({
							url: "/pages/account/account",
						});
						break;
					case 2:
						uni.navigateTo({
							url: "/pages/order/order",
						});
						break;
					case 1:
						uni.switchTab({
							url: "/pages/product/product",
						});
						break;
					case 4:
						uni.navigateTo({
							url: "/pages/yinsi/gy",
						});
						break;
					case 6:
						getUserIndex({
							hideLoading: true,
						}).then(({
							data
						}) => {
							window.location.href = data.kefu_url
						});
						break;
					case 0:
						getUserIndex({
							hideLoading: true,
						}).then(({
							data
						}) => {

							window.location.href = data.kefu_url
						});
						break;
				}
			},
		},
	};
</script>

<style lang="less">
	page {
		height: 100%;
		background-color: #f6f7fb;
	}

	.tui-desc {
		display: flex;
		flex-direction: column;
		padding-left: 20rpx;

		.desc {
			color: #33a854;
			font-size: 26rpx;
		}

		.title {
			color: #222;
			font-size: 26rpx;
		}

		.time {
			color: #a8a9ac;
			font-size: 20rpx;
			padding-top: 10rpx;
		}
	}

	/deep/.uni-popup {
		z-index: 999 !important;
	}

	.tui-hover {
		background-color: #fffaf9 !important;
		transform: seale(1.03);
	}

	.tui-popup {
		width: 600rpx;
		background-color: #fff;
		border-radius: 20rpx;
		padding: 30rpx;
		box-sizing: border-box;
	}

	.tui-variety {
		margin-top: 64rpx;
		position: relative;

		.tui-varietyContent {
			display: flex;
			flex-direction: column;
			padding-bottom: 30px;

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
						background-color: #f33b50 !important;
					}

					&.down {
						background-color: #0bb563 !important;
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

	.tui-recommend {
		margin-top: 64rpx;
		margin-bottom: 60rpx;
		position: relative;

		.prefer-scroll {
			white-space: nowrap;
			/* 防止换行 */
			overflow-x: auto;
			/* 开启横向滚动 */
			overflow-y: hidden;
			/* 隐藏纵向滚动条 */
			-webkit-overflow-scrolling: touch;
			/* 针对移动端使滚动更流畅 */
			width: 100%;
		}

		.image-box {
			display: inline-block;
			width: 245upx;

			background-color: #fff;
			border-radius: 13px;
			margin-left: 20rpx;
			padding: 20rpx;
			box-sizing: border-box;

			.tui-shitu {
				width: 90%;
				height: 110rpx;
				left: 50%;
				transform: translateX(-50%);
				margin-top: 12rpx;
			}

			.parities {
				display: flex;
				align-items: center;
				justify-content: space-between;
				font-size: 20rpx;
				color: #222;

				.tui-rightParities {
					display: flex;
					align-items: center;
					padding-top: 10rpx;

					.rise {
						padding-left: 10rpx;
						color: #f33b50;
					}

					.down {
						width: 18rpx;
						height: 18rpx;
					}
				}
			}

			.proportion {
				font-size: 24rpx;
				color: #222;
				margin-top: 12rpx;
			}

			.name {
				font-size: 32rpx;
				font-weight: 500;
				color: #222;
			}

			.desc {
				color: #a8a9ac;
				font-size: 20rpx;
				padding-top: 6rpx;
			}
		}

		.image-box:nth-of-type(1) {
			margin-left: 0;
		}

		.title {
			font-size: 32rpx;
			color: #222;
			padding-bottom: 20rpx;
		}
	}

	@keyframes wave {
		0% {
			transform: translateY(-5px);
		}

		50% {
			transform: translateY(-20px);
		}
	}

	@keyframes responsiveAnimation {
		0% {
			transform: scale(0.8);
			/* 动画开始时图片大小正常 */
		}

		50% {
			transform: scale(1);
			/* 动画中间时图片放大50% */
		}

		100% {
			transform: scale(0.8);
			/* 动画结束时图片恢复正常大小 */
		}
	}

	.tui-notice {
		margin-top: 44rpx;
		background-color: #fff;
		padding: 30rpx;
		border-radius: 13px;
		font-size: 32rpx;
		display: flex;
		align-items: center;



		image {
			width: 80rpx;
			height: 80rpx;
			animation: responsiveAnimation 2s infinite;
			/* 应用动画 */
		}
	}

	.tui-card {
		z-index: 333;
		width: 100%;
		overflow: hidden;
		padding: 0 36rpx;
		padding-bottom: 110rpx;
		background-color: #f6f7fb;
		position: absolute;
		margin-top: 70rpx;

		.tui-content {
			display: flex;
			justify-content: space-between;
			flex-wrap: wrap;



			.item:nth-child(7) {
				width: 335rpx;
				padding: 30rpx;
				background: url(/static/kf-bg.png) no-repeat;
				background-size: 100% 100%;
				display: flex;
				align-items: center;
				justify-content: space-between !important;
				flex-direction: row;
			}

			.item {
				width: 160rpx;
				height: 160rpx;
				padding: 30rpx;
				border-radius: 26rpx;
				font-size: 32rpx;
				background-color: #fff;
				margin-top: 20rpx;
				box-sizing: border-box;
				display: flex;
				align-items: center;
				justify-content: center;
				flex-direction: column;
				position: relative;

				.tui-positionBadge {
					position: absolute;
					top: -20rpx;
					right: -20rpx;
				}

				.tui-itemRight {
					width: 120rpx;
					height: 100rpx;

					image {
						width: 100%;
						height: 100%;
					}
				}

				.tui-itemLeft {
					display: flex;
					flex-direction: column;

					.kefu {
						font-size: 26rpx;
					}

					.fuwu {
						font-size: 20rpx;
						color: #a8a9ac;
						padding-top: 5rpx;
					}
				}

				.title {
					max-width: 55px;
					padding-top: 4rpx;
					font-size: 24rpx;
				}

				image {
					width: 70rpx;
					height: 70rpx;
				}
			}
		}
	}

	.platformIntroduction {
		transition: all 0.3s ease;
		height: 0;
		padding: 50rpx 40rpx;
		padding-bottom: 0;
		overflow-y: auto;
		position: relative;
		z-index: 999;
		overflow: hidden;

		.con-title {
			display: flex;
			align-items: center;
			justify-content: center;
			margin-bottom: 16rpx;

			&>image {
				width: 46rpx;
				height: 22rpx;
				position: relative;
				top: 3rpx;
			}

			&>text {
				color: #1150c2;
				font-size: 32rpx;
				margin: 0 18rpx;
				font-weight: bold;
			}
		}

		.lightspot {
			color: #222;
			font-size: 24rpx;
			text-align: center;
		}

		.policy {
			color: #222;
			font-size: 24rpx;
			line-height: 38rpx;
		}

		.newList {
			margin-bottom: 80rpx;
			margin-top: 40rpx;

			.newsItem {
				padding: 12px 12px;
				border-radius: 12px;
				background-color: #fff;
				margin-top: 10px;

				.title {
					font-size: 26rpx;
					color: #323232;
				}

				.con {
					text-indent: 2em;
					font-size: 28rpx;
					color: rgb(51, 51, 51);
					margin-top: 10px;
					margin-bottom: 10px;
					overflow: hidden;
					text-overflow: ellipsis;
					display: -webkit-box;
					-webkit-line-clamp: 2;
					-webkit-box-orient: vertical;
				}

				.btn {
					border-top: 1px solid #eee;
					padding-top: 12px;
					display: flex;
					justify-content: flex-end;
					font-size: 24rpx;
					color: #1150c2;
				}
			}
		}

		.packUpBtn {
			transition: bottom 0.4s cubic-bezier(0, 0.5, 1, 2);
			position: fixed;
			bottom: 70vh;
			left: 0;
			// background-color: #f6f7fb;
			visibility: hidden;
			z-index: 9999;

			image {
				width: 100vw;
				height: 168rpx;
			}

			.btnBox {
				background-color: #f6f7fb;
				padding-bottom: 20rpx;
				display: flex;
				align-items: center;
				justify-content: center;
				margin-top: -34px;
				position: relative;

				&>view {
					width: 99px;
					height: 26px;
					background-color: unset;
					border: 1px solid #1150c2;
					color: #1150c2;
					text-align: center;
					line-height: 24px;
					font-size: 12px;
				}
			}
		}

		&.show {
			height: auto;
			padding-bottom: 260rpx;

			.packUpBtn {
				visibility: visible;
				bottom: 0;
			}
		}
	}

	.conBox {
		&.hide {
			display: none;
		}
	}

	.tui-decorate {
		margin-top: 118rpx;
		position: relative;

		.tui-popupDia {
			height: 75rpx;
			width: 175rpx;
			z-index: 300;
			left: 50%;
			border-radius: 50%;
			transform: translateX(44%) translateY(-166%) rotateZ(-7deg);
			border: 1px solid #1150c2;
			color: #1150c2;
			display: flex;
			align-items: center;
			justify-content: center;
			position: absolute;
		}

		.tui-dialog {
			height: 32rpx;
			width: 40rpx;
			z-index: 300;
			left: 50%;
			transform: translateX(100%) translateY(-100%);
			background: url(/static/dialog.png) no-repeat;
			background-size: 100% 100%;
			position: absolute;
		}

		.tui-luckyHand {
			width: 34rpx;
			height: 28rpx;
			left: 50%;
			margin-left: 5px;
			top: 26rpx;
			z-index: 300;
			position: absolute;
			background: url(/static/hand.png) no-repeat;
			background-size: 100% 100%;
			-webkit-animation: wave 1s infinite; // shaking为动画名称，1s 动画执行时间，infinite 无限循环
		}

		.tui-lucky {
			width: 140rpx;
			top: -36rpx;
			left: 50%;
			transform: translateX(-66%);
			position: relative;

			.tui-luckImge {
				background: url(/static/lucky.png) no-repeat;
				background-size: 100% 100%;
				position: absolute;
				top: 4rpx;
				left: 0px;
				height: 96rpx;
				width: 100%;
			}
		}

		.tui-line {
			height: 280rpx;
			z-index: 222;
			position: absolute;
			width: 100%;
			background: url(/static/line.png) no-repeat;
			background-size: 100% 100%;
		}
	}

	.tui-banner {
		padding: 20rpx 36rpx;

		.swiper-box {
			height: 320rpx;

			.swiper-item {
				width: 100%;
				height: 100%;
				border-radius: 55rpx;
				overflow: hidden;

				image {
					width: 100%;
					height: 100%;
				}
			}
		}
	}

	.tui-NavHeader {
		padding: 20rpx 36rpx;
		display: flex;
		align-items: center;
		justify-content: space-between;
		position: relative;
		height: 100rpx;
		background: url(/static/bg.png) no-repeat;

		.tui-img {
			width: 188rpx;
			height: 54rpx;

			image {
				width: 100%;
				height: 100%;
			}
		}

		.tui-right {
			background-color: rgba(235, 239, 241, 0.43);
			padding: 20rpx 20rpx;
			border-radius: 21px;
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
				font-family: "myfont";
			}
		}
	}

	.tui-header {
		height: 100%;
		background: url(/static/bg.png) no-repeat;
		background-size: 860rpx 1026rpx;
		background-position-y: -106rpx;
	}
	.uni-scroll-view::-webkit-scrollbar {
	    display: none; /* 隐藏滚动条 */
	}
</style>