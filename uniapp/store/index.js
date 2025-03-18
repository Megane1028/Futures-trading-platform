import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate'
Vue.use(Vuex);
const initialState = () => {
	return {
		token: '',
		//用户头像名称等
		userInfo: {},
		//公共配置
		appInfo: {},
		//注册信息
		registerInfo: {}
	};
};
const store = new Vuex.Store({
	state: initialState(),
	getters: {
		nickname: function(state) {
			return state.userInfo.nickname
		},
	},
	mutations: {
		setToken: function(state, data) {
			state.token = data
		},
		setUser: function(state, data) {
			state.userInfo = data
		},
		setApp: function(state, data) {
			state.appInfo = data
		},
		setRegister: function(state, data) {
			state.registerInfo = data
		},
		RESET_STATE(state) {
			// 这里的 Object.assign 可以重置 state 到 initialState
			Object.assign(state, initialState());
		}
	},
	plugins: [
		createPersistedState({
			storage: {
				getItem: key => uni.getStorageSync(key),
				setItem: (key, value) => uni.setStorageSync(key, value),
				removeItem: key => () => {}
			}
		})
	]
})

export default store;