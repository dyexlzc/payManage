function transSchool(iNum){//将学校代码转换成字符串的函数
    sStr="";
    switch(parseInt(iNum)){
        case 1: sStr="石河子大学";break;
        case 2: sStr="西安电子科技大学";break;
        case 3: sStr="清华大学";break;    
        default: sStr="error";break;
    }
    return sStr;
}