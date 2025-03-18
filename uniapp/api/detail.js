
import request from '@/utils/request.js';

//商品详情
export const goodDetail = function(data = {}) {
	return request.get('/index/goods_dec', data)
}
//商品k线图
export const goodKline = function(data = {}) {
	return request.get('/index/goods_stock', data)
}
//商品下单
export const goodMicrotrade = function(data = {}) {
	return request.post('/goods/microtrade', data)
}