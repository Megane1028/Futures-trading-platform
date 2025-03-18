import request from '@/utils/request.js';

//余额宝首页
export const balanceInfo = function(data = {}) {
	return request.get('yuebao/getdata', data)
}
//余额宝转出
export const balanceSell = function(data = {}) {
	return request.post('/yuebao/sell', data)
}
//余额宝转入
export const balanceBuy = function(data = {}) {
	return request.post('/yuebao/buy', data)
}
//出金记录
export const withdraw_record = function(data = {}) {
	return request.get('user/withdraw_record', data)
}
//入金记录
export const upmark_record = function(data = {}) {
	return request.get('user/upmark_record', data)
}
// 出金
export const downmark = function(data = {}) {
	return request.post('user/downmark', {
		...data
	})
}
// 实名认证
export const doAuth = function(data = {}) {
	return request.post('user/doAuth', {
		...data
	})
}
// 商品列表
export const goods = function(data = {}) {
	return request.get('index/goods', data)
}
// 余额宝明细
export const getMoneyLog = function(data = {}) {
	return request.get('yuebao/log', data)
}
//商品详情
export const goods_dec = function(data = {}) {
	return request.get('index/goods_dec', data)
}
//消息未读数量
export const get_count = function(data = {}) {
	return request.get('message/get_count', data)
}
// 资金记录
export const mark = function(data = {}) {
	return request.get('/user/mark', data)
}