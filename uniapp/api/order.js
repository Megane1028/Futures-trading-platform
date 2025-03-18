import request from '@/utils/request.js';

//订单列表
export const orderlist = function(data = {}) {
	return request.get('order/orderlist', data)
}

export const orderCount = function() {
	return request.get('order/ordercount', {hideLoading: true})
}