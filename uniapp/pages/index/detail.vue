<template>
	<view>
		<guo-headerTitle></guo-headerTitle>
		<view class="news text-main-color">
			<view class="main page-padding-hor" v-if="Id == 1">
				<view class="title mt-md font-bolder text-sm" style="line-height: 30px;">
					北大光华-广期所新能源产业高管研修课程圆满结业</view>
				<view class="time mt-sm text-des-color">2023-07-17 15:36:20</view><!---->
				<view class="mt-md text-md text-des-color content text-align-justify" style="line-height: 24px;">
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						10月22日，广州期货交易所“新能源产业高级管理人员研修课程”在北京大学光华管理学院举办结业仪式。光华管理学院党委书记马化祥、广期所总经理朱丽红出席仪式并致辞，广期所副总经理冷冰出席仪式。
					</p>
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						本次课程项目自今年4月份启动，开展了新能源产业发展、金融体系与期货市场发展、企业风险管理与期货期权运用实务等四个专题模块的课程讲授，吸引来自晶硅光伏新能源相关重点产业企业、行业协会近50名高级管理人员参加。在课堂学习之外，研修班学员赴广州、东莞、包头等地开展企业参访、座谈交流等移动课堂学习，拓展了学员对新能源发展、企业风险管理和战略发展的理念和认识。
					</p>
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						结业仪式上，光华管理学院党委书记马化祥作结业寄语，他对广期所支持北大光华管理学院举办研修课程表示感谢，希望课程可以成为广期所、北大光华和各位企业家长期共同友好关系的开始，大家携手并进，为期货行业、金融市场、社会和国家的进步作出贡献。
					</p>
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						广期所总经理朱丽红在结业致辞中表示，此次课程对于帮助行业企业深入理解和运用期货进行风险管理、稳定生产经营发挥了作用，广期所对北大光华管理学院、中国有色金属工业协会及硅业分会和企业学员表示感谢，并将不忘初心，继续为相关产业做好服务，推动期货市场的功能发挥，提高工业硅、碳酸锂品种全球价格影响力，助力提升相关产业国际竞争力。
					</p>
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						学员们对研修课程给予高度评价，表示通过参加项目，对期货市场的功能作用有了深刻的认识，对期货市场的运行机制有了深入的理解，对在企业经营中如何科学理性利用期货市场有了系统的了解，为有效应对今年以来晶硅行业的各种变化起到了积极作用，希望这样的项目能够长期坚持下去。
					</p>
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						中国有色金属工业协会硅业分会秘书长徐爱华在结业发言中表示，研修课程学习是难能可贵的经历，通过学习深入了解了宏观经济与新能源的发展趋势、金融市场及期货与衍生品的发展史以及如何利用期货期权等衍生品进行套期保值、风险管理，为未来的职业生涯和事业发展注入了强大的力量。希望各位同学们携手共进，为建设更加绿色、更可持续的未来不懈努力。
					</p>
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						盈江明亮硅业有限责任公司董事长黄良光表示，通过研修课程，对期货和衍生品有了新的认识，了解工具操作得当的确可以给企业带来一定好处。后来在工业硅价格大幅波动的时候通过亲身实践，参与期货市场减轻公司库存和资金压力，挽回损失。作为云南德宏硅协会的会长，也对会员单位进行了期货工具的宣传和亲身案例的分享。
					</p>
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						广期所将以此次研修课程为契机，积极培养具有现代化风险管理理念的晶硅光伏行业高端管理人才和各类专业人才，不断提升产业企业对期货市场的正确认识和应用，助力我所外贸“新三样”相关产业链供应链的稳健发展。
					</p>
					<p><br></p>
				</view>
			</view>
			<view class="main page-padding-hor" v-if="Id == 2">
				<view class="title mt-md font-bolder text-sm" style="line-height: 30px;">广期所工业硅期货和期权荣获FOW最佳新合约奖</view>
				<view class="time mt-sm text-des-color">2023-07-07 23:16:30</view><!---->
				<view class="mt-md text-md text-des-color content text-align-justify" style="line-height: 24px;">
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						2023年9月21日，广期所工业硅期货和期权在期货和期权世界杂志（FOW）主办的“2023年度亚洲资本市场颁奖典礼”上荣获“年度最佳新合约——大宗商品”奖项。评审团认为，广期所作为创新型交易所，打造了绿色发展类产品基准，推动服务产业在绿色转型发展中的风险管理需求。
					</p>
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						工业硅期货和期权于2022年12月22日在广期所上市，是我国首个新能源金属期货品种。上市9个月以来，工业硅期货和期权市场运行质量不断提升，市场功能有效发挥。截至2023年9月21日，工业硅期货日均成交量8.3万手，日均持仓量10.6万手，日均成交额60.2亿元，市场规模稳步扩大；市场参与结构持续优化，产业客户的日均持仓量占比在30%左右；期现联动较好，期现价格相关系数达0.97，服务工业硅产业功能凸显。
					</p>
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						作为以服务绿色发展为宗旨的交易所，广期所积极布局相关品种，加快推进各项研发工作，在工业硅上市7个月后，于今年7月21日上市了碳酸锂期货和期权，将服务领域拓展到动力电池、储能等国家经济新的增长点相关行业，初步形成了新能源期货品种板块，进一步丰富了期货市场服务实体经济的品种体系。
					</p>
					<p
						style="padding: 0px;margin-top: 0.05rem;margin-bottom: 0.05rem;color: rgb(51, 51, 51);font-family: 'Microsoft YaHei', Simsun, SimHei, Arial;font-size: 16.0129px;text-align: justify;text-wrap: wrap;text-indent: 2em">
						FOW是全球投资者集团（Global Investor
						Group）旗下知名的衍生品信息与服务供应商，其主办的“亚洲资本市场颁奖”活动每年举行一次，旨在表彰在资产管理和交易方面有卓越表现的机构，在国际期货和衍生品业界有一定影响力。</p>
					<p><br></p>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				Id: 0
			};
		},
		onLoad(e) {
			this.Id = Number(e.Id)
		},
	}
</script>

<style lang="less">
	.font-bolder {
		font-weight: 800;
	}

	.text-des-color {
		color: #98999d;
	}

	.mt-sm {
		margin-top: 8px;
	}

	.news {
		padding: 0 32rpx;
	}

	.mt-md {
		margin-top: 10px;
	}

	.text-des-color {
		color: #98999d;
	}

	.text-align-justify {
		text-align: justify;
	}

	.news .main .content {
		letter-spacing: 1px;
	}

	.title {
		font-size: 20px;
	}
</style>