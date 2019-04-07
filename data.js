function strToDate(dateStr){ //将字符串转换成data对象
	var dateStr = dateStr.replace(/-/g, "/");//现将yyyy-MM-dd类型转换为yyyy/MM/dd
	var dateTime = Date.parse(dateStr);//将日期字符串转换为表示日期的秒数
	//注意：Date.parse(dateStr)默认情况下只能转换：月/日/年 格式的字符串，但是经测试年/月/日格式的字符串也能被解析
	var data = new Date(dateTime);//将日期秒数转换为日期格式
	return data;
}
function compareDate(startDate,endDate){//比较两个日期的大小
	var d1 = new Date(startDate.replace(/\-/g, "\/"));  
	var d2 = new Date(endDate.replace(/\-/g, "\/"));  
	if(d1 >d2)  
 	{  
  		alert("开始时间不能大于结束时间！");  
  		return false;  
 	}
	return true;
}