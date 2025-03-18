
import request from '@/utils/request.js';

//公共配置
export const appIndex = function(data = {}) {
	return request.post('/index/index', data)
}
//消息列表
export const msgList = function(data = {}) {
	return request.get('/message/data_log', data)
}