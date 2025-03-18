// 方法已在全局注册,使用方法时 this.$utils.方法名(参数) 
const imgUrl = 'https://lcssoss.oss-cn-shanghai.aliyuncs.com'
const h5Appid = 'wx025090c8839f889a'
const getQueryUrl = function() {
	if (process.env.NODE_ENV === 'development') {
		//开发环境请求地址---在manifest.json配置跨域
		return '/api'
	} else if (process.env.NODE_ENV === 'production') {
		//正式环境请求地址
		return '/api'
	}
}
//获取当前运行域名
const getDomain = function() {
	if (process.env.NODE_ENV === 'development') {
		//开发环境
		return 'https://www.baidu.com'
	} else if (process.env.NODE_ENV === 'production') {
		//正式环境
		// #ifdef H5
		return 'https://' + window.location.hostname
		// #endif
		// #ifdef MP-WEIXIN
		return 'https://www.baidu.com'
		// #endif
	}
}
//获取当前页面路径以及参数
const getUrl = function() {
	const pages = getCurrentPages()
	const currentPage = pages[pages.length - 1]
	const url = currentPage.route
	const options = currentPage.options
	let urlWithArgs = `/${url}?`
	for (let key in options) {
		const value = options[key]
		urlWithArgs += `${key}=${value}&`
	}
	urlWithArgs = urlWithArgs.substring(0, urlWithArgs.length - 1)
	return urlWithArgs
}
//获取当前时间 年-月-日
const nowDate = function() {
	let nowDate = new Date();
	let date = {
		year: nowDate.getFullYear(),
		month: nowDate.getMonth() + 1,
		date: nowDate.getDate(),
	}
	let month = ''
	let lifeday = ''
	if (date.month < 10) {
		month = '0'
	}
	if (date.date < 10) {
		lifeday = '0'
	}
	console.log(date);
	let systemDate = date.year + '-' + month + date.month + '-' + lifeday + date.date;
	return systemDate
}
//时间戳转换 年-月-日(可显示时分秒)
const formatTimetamp = function(tamp, showHours) {
	if (tamp) {
		var nowDate = new Date(tamp * 1000);
	} else {
		var nowDate = new Date();
	}
	let dateObj = {
		year: nowDate.getFullYear(),
		month: nowDate.getMonth() + 1,
		lifeday: nowDate.getDate(),
		hours: nowDate.getHours(), // 时
		minutes: nowDate.getMinutes(), // 分
		seconds: nowDate.getSeconds() // 秒
	}
	let {
		year,
		month,
		lifeday,
		hours,
		minutes,
		seconds
	} = dateObj
	if (month < 10) month = '0' + month
	if (lifeday < 10) lifeday = '0' + lifeday
	if (hours < 10) hours = '0' + hours
	if (minutes < 10) minutes = '0' + minutes
	if (seconds < 10) seconds = '0' + seconds
	if (showHours) {
		var systemDate = `${year}-${month}-${lifeday} ${hours}:${minutes}:${seconds}`
	} else {
		var systemDate = `${year}-${month}-${lifeday}`
	}
	return systemDate
}
//时间戳转换 微信朋友圈时间格式
const formatDateWx = {
	UNITS: {
		'年': 31557600000,
		'月': 2629800000,
		'天': 86400000,
		'小时': 3600000,
		'分钟': 60000,
		'秒': 1000
	},
	humanize: function(milliseconds) {
		if (milliseconds <= this.UNITS['分钟'] * 15) {
			return '刚刚';
		}
		var humanize = '';
		for (var key in this.UNITS) {
			if (milliseconds >= this.UNITS[key]) {
				humanize = Math.floor(milliseconds / this.UNITS[key]) + key + '前';
				break;
			}
		}
		return humanize || '刚刚';
	},
	format: function(dateStr) {
		if (typeof dateStr === 'number') {
			dateStr = formatTimetamp(dateStr, true)
		}
		if (!dateStr) return ''
		var date = this.parse(dateStr)
		var diff = Date.now() - date.getTime();
		if (diff < this.UNITS['天']) {
			return this.humanize(diff);
		}
		var _format = function(number) {
			return (number < 10 ? ('0' + number) : number);
		};
		const timeStr = date.getFullYear() + '/' + _format(date.getMonth() + 1) + '/' + _format(date
				.getDate()) +
			' ' +
			_format(date.getHours()) + ':' + _format(date.getMinutes());
		return timeStr
	},
	parse: function(str) { //将"yyyy-mm-dd HH:MM:ss"格式的字符串，转化为一个Date对象
		var a = str.split(/[^0-9]/);
		return new Date(a[0], a[1] - 1, a[2], a[3], a[4], a[5]);
	}
};
//获两个目标时间之间的剩余时间
const getRemainingDays = function(time1, time2, hasHours) {
	// 将时间戳转换为日期对象
	const targetDate = new Date(time1);

	// 计算时间差（以毫秒为单位）
	const timeDifference = targetDate - time2;

	// 将时间差转换为剩余天数（向下取整）
	const remainingDays = Math.floor(timeDifference / (1000 * 60 * 60 * 24)) || 0;
	// 计算剩余小时数
	const remainingHours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) || 0;
	if (remainingHours < 0 || remainingDays < 0) {
		return false
	}
	if (hasHours) {
		return (remainingDays + 1) + "天" + remainingHours + "小时"

	} else {
		return (remainingDays + 1) + "天"

	}
}
//进度条计算
const moneyProgress = function(crowd_y, crowd) {
	const num1 = Number(crowd)
	const num2 = Number(crowd_y)
	if (num1 && num2 > 0) {

		const count = num2 / num1 * 100
		if (count < 0.01 && count > 0) {
			return 0.01
		} else {
			let percent = parseInt(count * 100) / 100
			return percent > 100 ? 100 : percent
		}
	} else {
		return 0
	}
}
//经纬度格式化
function formatLocation(longitude, latitude) {
	if (typeof longitude === 'string' && typeof latitude === 'string') {
		longitude = parseFloat(longitude)
		latitude = parseFloat(latitude)
	}

	longitude = longitude.toFixed(2)
	latitude = latitude.toFixed(2)

	return {
		longitude: longitude.toString().split('.'),
		latitude: latitude.toString().split('.')
	}
}

//----------------------------正则匹配--------------------

//匹配帐号
const regUid = function(str) {
	return !RegExp(/^\w{6,12}$/).test(str);
}

const regName = function(str) {
	return !RegExp(/^[\u4e00-\u9fa5]{2,5}$/).test(str);
}

//输入是否全为空
const regAir = function(str) {
	return str.split(" ").join("").length
}

//匹配身份证
const regIDC = function(str) {
	return !RegExp(/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/).test(str);
}
//匹配手机号
const regPhone = function(str) {
	// return "12313"
	return !RegExp(/^1[345789]\d{9}$/).test(str);
}

//手机号以 3 - 4 - 4 格式显示
const regPhoneFormat = function(str) {
	return str.replace(/(\d{3})(\d{4})/, "$1 $2 "); //添加空格
}

//匹配验证码
const regCheckNum = function(str) {
	return !RegExp(/^\d{4}$/).test(str);
}

//匹配邮箱格式
const regEmail = function(str) {
	return !RegExp(/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/).test(str);
}
//金额输入框限制
const validateAmount = function(val, max = '999999') {
	let value = val.toString();
	if (!value) return '';
	// 仅保留数字和小数点
	value = value.replace(/[^0-9.]/g, '');
	// 确保只有一个小数点
	if ((value.match(/\./g) || []).length > 1) {
		value = value.replace(/\.+$/, "");
	}
	// 确保值在范围内
	if (value !== '' && value <= 0) {
		value = '1';
	} else if (value !== '' && value > max) {
		value = max;
	}
	// 保留最多两位小数
	if (value.indexOf('.') !== -1) {
		const parts = value.split('.');
		if (parts[1].length > 2) {
			value = `${parts[0]}.${parts[1].substring(0, 2)}`;
		}
	}
	return value
}
const replaceWithAsterisks = function(str, start, end) {
	// 验证输入参数是否有效
	if (typeof str !== 'string' || typeof start !== 'number') {
		return ''
		// throw new Error('Invalid input parameters');
	}
	if(!end) end = str.length
	// 确保开始位置和结束位置在合理范围内
	start = Math.max(0, start);
	end = Math.min(str.length, end);
	// 确保开始位置小于等于结束位置
	if (start > end) {
		throw new Error('Start position should be less than or equal to end position');
	}

	// 构建替换后的字符串
	const prefix = str.slice(0, start);
	const middle = '*'.repeat(end - start);
	const suffix = str.slice(end);

	return prefix + middle + suffix;
}
export default {
	imgUrl,
	h5Appid,
	getQueryUrl,
	getDomain,
	getUrl,
	nowDate,
	formatTimetamp,
	formatDateWx,
	getRemainingDays,
	moneyProgress,
	formatLocation,
	regUid,
	regName,
	regAir,
	regIDC,
	regPhone,
	regPhoneFormat,
	regCheckNum,
	regEmail,
	validateAmount,
	replaceWithAsterisks
}