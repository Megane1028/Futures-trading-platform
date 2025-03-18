import request from '@/utils/request.js';

//注册校验
export const userCheckRegister = function(data = {}) {
	return request.post('/login/checkRegister', {...data})
}
//注册
export const userRegister = function(data = {}) {
	return request.post('/login/register', data)
}
//登录
export const userLogin = function(data = {}) {
	return request.post('/login/login', data)
}
//登录
export const userInfo = function(data = {}) {
	return request.get('/user/getUserInfo', data)
}
//获取已绑定
export const userGetCash = function(data = {}) {
	return request.post('user/getCash', data)
}
//绑定c出金账户
export const userBindWithdraw = function(data = {}) {
	return request.post('user/cash_save', data)
}
//出金
export const userWithdraw = function(data = {}) {
	return request.post('user/downmark', data)
}
//公共配置
export const getUserIndex = function(data = {}) {
	return request.get('index/index', data)
}
export const up_password = function(data = {}) {
	return request.post('user/up_password', data)
}
export const up_mpassword = function(data = {}) {
	return request.post('user/up_mpassword', data)
}