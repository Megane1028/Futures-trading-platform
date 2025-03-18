<template>
	<div class="chart">
		<div id="Kline" class="kline">
		</div>
	</div>
</template>
<script>
	import dayjs from 'dayjs'
	export default {
		props: ['data'],
		data() {
			return {}
		},
		mounted() {

			this.$echarts.env.touchEventsSupported = true;
			this.$echarts.env.wxa = false;
			this.$echarts.env.canvasSupported = false;
			this.$echarts.env.svgSupported = true;
			this.$echarts.env.domSupported = true;
		},
		methods: {
			init() {
				const kline = this.$echarts.init(document.getElementById("Kline"));
				const upColor = '#00da3c';
				const downColor = '#ec0000'
				let data = []
				data = formatData(this.data);

				function formatData(rawData) {
					let categoryData = [];
					let values = [];
					let volumes = [];
					rawData.forEach((item, index) => {
						categoryData.push(dayjs(item.time).format('MM-DD HH:mm:ss'));
						values.push([item.open, item.close, item.low, item.high])
						volumes.push([index, item.volume, item.open > item.close ? 1 : -1]);
					})
					return {
						categoryData: categoryData,
						values: values,
						volumes: volumes
					}
				}
				if (this.data.length) {


					function calculateMA(dayCount, data) {
						let result = [];
						for (let i = 0, len = data.values.length; i < len; i++) {
							if (i < dayCount) {
								result.push('-');
								continue;
							}
							let sum = 0;
							for (let j = 0; j < dayCount; j++) {
								sum += data.values[i - j][1];
							}
							result.push(+(sum / dayCount).toFixed(3));
						}
						return result;
					}

					let option = {
						animation: true,
						tooltip: {
							trigger: 'axis',
							axisPointer: {
								type: 'cross'
							},
							textStyle: {
								color: '#333'
							},
							className: 'klineTooltip',
							position: function(pos, params, el, elRect, size) {
								var obj = {
									top: 10
								};
								obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 30;
								return obj;
							},
							formatter: function(params) {
								const themeColor = params[5].value[3] > 0 ? upColor : downColor
								const param = params[0];
								return `
							<ul style="border-color:${themeColor}">
								<li> 
									<div class="dot" style="background-color:${themeColor}"></div>
									 <span>${param.name}</span> 
								</li>
								<li>
									 <div class="dot" style="background-color:${themeColor}"></div> 
									 <span>open <span>${param.data[0]}</span></span>
								</li>
								<li> 
									<div class="dot" style="background-color:${themeColor}"></div>
									 <span>close <span>${param.data[1]}</span></span> 
								</li>
								<li> 
									<div class="dot" style="background-color:${themeColor}"></div> 
									<span>lowest <span>${param.data[2]}</span></span>
								</li>
								<li> 
									<div class="dot" style="background-color:${themeColor}"></div>
									 <span>highest <span>${param.data[3]}</span></span> 
								</li>
							</ul>
							`
							},
							extraCssText: 'width: 170px'
						},

						axisPointer: {
							link: {
								xAxisIndex: 'all'
							},
							label: {
								backgroundColor: '#777'
							}
						},
						toolbox: {
							show: false

						},

						visualMap: {
							show: false,
							seriesIndex: 5,
							dimension: 2,
							pieces: [{
								value: 1,
								color: downColor
							}, {
								value: -1,
								color: upColor
							}]
						},
						grid: [{
								left: '0%',
								right: '15%',
								height: '50%',
								top: '8%'
							},
							{
								left: '0%',
								right: '15%',
								top: '66%',
								height: '6%'
							}
						],
						xAxis: [{
								type: 'category',
								data: data.categoryData,
								scale: true,
								boundaryGap: false,
								axisTick: {
									show: true
								},
								axisLine: {
									onZero: false
								},
								splitLine: {
									show: false
								},
								splitNumber: 20,
								min: 'dataMin',
								max: 'dataMax',
								axisPointer: {
									z: 100
								}
							},
							{
								type: 'category',
								gridIndex: 1,
								data: data.categoryData,
								scale: true,
								boundaryGap: false,
								axisLine: {
									onZero: false
								},
								axisTick: {
									show: false
								},
								splitLine: {
									show: false
								},
								axisLabel: {
									show: false
								},
								splitNumber: 20,
								min: 'dataMin',
								max: 'dataMax',
								axisPointer: {
									type: 'shadow',
									label: {
										show: false
									},
									triggerTooltip: true,
									handle: {
										show: true,
										margin: 30,
										color: '#B80C00'
									}
								}

							}
						],
						yAxis: [{
								scale: true,
								position: 'right',
								// splitArea: {
								// 	show: true
								// }
								// axisTick: {
								// 	show: true
								// }
							},
							{
								scale: true,
								gridIndex: 1,
								splitNumber: 2,
								axisLabel: {
									show: false
								},
								axisLine: {
									show: false
								},
								axisTick: {
									show: false
								},
								splitLine: {
									show: false
								}
							}
						],
						dataZoom: [{
								type: 'slider',
								xAxisIndex: [0, 1],
								realtime: false,
								start: 70,
								end: 100,
								top: 10,
								height: 16,
								handleIcon: 'M10.7,11.9H9.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4h1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
								handleSize: '120%'
							},
							{
								type: 'inside',
								xAxisIndex: [0, 1],
								start: 70,
								end: 100,
								top: 30,
								height: 16
							}
						],
						series: [{
								name: 'kline',
								type: 'candlestick',
								data: data.values,
								itemStyle: {
									normal: {
										color: upColor,
										color0: downColor,
										borderColor: null,
										borderColor0: null
									}
								},
								markLine: {
									symbol: "none", //去掉警戒线最后面的箭头
									label: {
										backgroundColor: '#75c566',
										padding: [4, 6, 2, 6],
										borderRadius: 4,
										color: '#fff',
										position: "insideEndTop", //将警示值放在哪个位置，三个值“start”,"middle","end"  开始  中点 结束
									},
									lineStyle: {
										color: '#75c566',
									},
									data: [{
										silent: false, //鼠标悬停事件  true没有，false有
										yAxis: '', // 警戒线的标注值，可以有多个yAxis,多条警示线   或者采用   {type : 'average', name: '平均值'}，type值有  max  min  average，分为最大，最小，平均值
									}, ],
								},
							},
							{
								name: 'MA5',
								type: 'line',
								data: calculateMA(5, data),
								smooth: true,
								lineStyle: {
									normal: {
										opacity: 0
									}
								},
								itemStyle: {
									normal: {
										opacity: 0
									}
								},
							},
							{
								name: 'MA10',
								type: 'line',
								data: calculateMA(10, data),
								smooth: true,
								lineStyle: {
									normal: {
										opacity: 0
									}
								},
								itemStyle: {
									normal: {
										opacity: 0
									}
								},
							},
							{
								name: 'MA20',
								type: 'line',
								data: calculateMA(20, data),
								smooth: true,
								lineStyle: {
									normal: {
										opacity: 0
									}
								},
								itemStyle: {
									normal: {
										opacity: 0
									}
								},
							},
							{
								name: 'MA30',
								type: 'line',
								data: calculateMA(30, data),
								smooth: true,
								lineStyle: {
									normal: {
										opacity: 0
									}
								},
								itemStyle: {
									normal: {
										opacity: 0
									}
								},
							},
							{
								name: 'Volume',
								type: 'bar',
								xAxisIndex: 1,
								yAxisIndex: 1,
								data: data.volumes,
							}
						]
					};
					option.series[0].markLine.data[0].yAxis = data.values[
						data.values.length - 1
					][1] + "";
					kline.setOption(option);
				} else {
					kline.clear();
				}
			},
		},

	}
</script>
<style lang="scss" scoped>
	.kline {
		width: 100%;
		height: 468px;
	}

	::v-deep .klineTooltip {
		box-shadow: none !important;
		background-color: transparent !important;
		padding: 0 !important;

		&>ul {
			border-radius: 6px;
			padding: 10px;
			border: 1px solid transparent;
			background-color: #fff;

			&>li {
				display: flex;
				align-items: center;

				.dot {
					border-radius: 50%;
					width: 5px;
					height: 5px;
					margin-right: 10px;
				}

				&:first-child {
					.dot {
						width: 10px;
						height: 10px;
					}
				}

				&>span {
					display: flex;
					flex: 1;

					&>span {
						margin-left: auto;
					}
				}
			}
		}
	}
</style>