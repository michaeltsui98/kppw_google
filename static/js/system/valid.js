/*----------------------------------------------------------------------------|
|  Subject:       JavaScript validation API,Form auto Validation API
|  Version:       1.0
|  Author:        Sunarrow
|  Created:       2007-11-8
|  LastModified:  2008-1-20
|  Download:      http://code.google.com/p/cwin/downloads/list
|  License:       Apache License 2.0
|-----------------------------------------------------------------------------|
|  Email:sunkeei@yahoo.com
|-----------------------------------------------------------------------------|
|����1.���ֶ���֤
|      ����ǩ����validElement(element).
|      ���ܣ������֤ʧ�ܣ�����false����ʾ��ҳ�������������Ϣ��
|      ����˵����element:HTMLԪ�أ���ҳ���ϵ��ô˷���ʱ��ʹ�� 'this'���á�
|                limit:��֤���������磺'type:float;required:true;decLen:2'
|                      limit�����Կ�����: type,required,len,between,decLen,
|                                         equals,general
|                      ����˵��:
|						 type:string,int,digit,float,email,ip,url,date,datetime,time
|                             tel,fax,mobileCn,idCard,signName,name,postcodeCn
|                             default: string.
|                        required:��ѡֵ��true��false.default:false.
|                        len:�ַ�������,ֵΪ "6-20",��ʾ������6��20֮�䡣Ҳ��
|                             ��Ϊ"-20"����ʾ������20��
|						 between:��ֵ��Ч,������ֵ֮�䡣��Ϊ "10-100"����ʾ��
|                                С��10��00֮�䣬Ҳ��Ϊ"-100",��ʾС��100��
|                        decLen:�����;��ȳ���.�������Ͼ��Ƚ����Զ�����.
|                        equals:�Ƿ�Ҫ��������Ԫ����ȡ���������ȷ�ϵȳ���.
|                        general:�Ƿ���һ���ַ��������������ַ�.Default:true.
						 than:��ָ������Ƚ�����ֵ���������return true.
|                msgArea:��ʾ������Ϣ��SPAN��DIV��ID���������Ϊ�գ�������
|                        global_error_msg_area ��SPAN��DIV�����ҲΪ�գ����
|                        alert ��Щ������Ϣ��
|                msg:������Ϣ������������Ϊ""�������Ĭ�ϵĴ�����Ϣ.
|����2.���Զ���֤:
|      ����ǩ����checkForm(form,isCheckAll)
|      isCheckAll:�Ƿ������е�Ԫ�أ���ΪFalse,��֤���ڵ�һ���������ʱ�˳������򣬻���֤���е�Ԫ��
|      ���ܣ���֤����������Ҫ��֤���ֶ�.ʧ�ܷ���false.��ʾ������������Ϣ.
|      ʹ����������Ҫ��֤��Ԫ����Ҫ�������� limit ���ԣ�������Զ������������������Ҫ��֤��Ԫ�ء�
|��ʾ:�������Ҫ�Ѵ�����Ϣ��ʾ��ĳһ�������ĵط������Զ���һ��IDΪ global_error_msg_area ��DIV����SPAN
|   ��������֤��Ĭ�����������ַ������Լ��� general:false ��ȡ������
\*---------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------*\
|  Subject:       JavaScript validation API
|��֤API
|��֤�����б�
|
|judgeDigit(arguments...) :�ж��Ƿ�����
|���ֵ��÷�ʽ:
|1.һ������,���ж��Ƿ�Ϊ����,�����Ȳ�����10λ
|2.��������,�ڶ�������Ϊ '>'(����) �� '<'(С��),��3������ΪҪ�Ƚϵ�����
|3.�����������ڶ��������������������Ϊ�������жϴ���ĵ�һ������ֵ�Ƿ��������м�.(���߽�)
|
|judgeFloat(arguments...):������
|�����һ����������ô�ж��Ƿ�Ϊ������
|�����������������ô���ڶ���������Ϊ�����޶�����
|�����������������ô�ڶ�������Ϊ��Сֵ�������������ǽ���Ϊ��ֵ����
|
|isDigit(str):�Ƿ�����
|
|isSignName(arguments...)
|���ֵ��÷�ʽ��
|һ��������(Ĭ��Ϊ2--32λ)���жϱ�ʶ�����ǵ�¼��
|�жϱ�ʶ�����ǵ�¼��������ĸ��ͷ,�ɴ����֡�"_"��"." ���ִ�
|����������
|�޶���С����(�ڶ�������)����󳤶�(����������)
|
|isRealName(str) :�ж��Ƿ�����ʵ����
|isTel(str) :�绰����:�������⣬�ɺ���"-".У����ͨ�绰���������⣬����"-"��ո�ֿ�
|isMobileCN(s) :�й���½�����ֻ�����,��13��15��ͷ��ʹ��ʱ����ݱ仯�޸�,
|isPostalCodeCN(s):�й������ʱ�
|isEmail(s) :E-mail
|isURL(s) :URL
|isIP(s):IP-32
|isHtmlTag(s):HTML Tag
|isIDNumber15(s):���֤��15λ
|isIDNumber18(s):���֤��18λ
|isChineseString(s):�����ַ�
|isDoubleByteString(s):˫�ֽ�
|hasHESpace(s):�Ƿ������β�ո��������������TRUE
|isQQ(s):QQ
|isFloat(s):�Ƿ��Ǹ�����
|isLeapYear(y):�Ƿ�����
|isDateYMD(s):���ڣ�yyyy-mm-dd �� yyyy/mm/dd,֧��1600���Ժ�(����������֤)
|isDateDMY(s):���ڣ�dd-mm-yyyy �� dd/mm/yyyy,֧��1600���Ժ�(����������֤)
|isDateMDY(s):���ڣ�mm/dd/yyyy �� mm-dd-yyyy,֧��1600���Ժ�(����������֤)
|isDateTimeYMD(s):���ڣ�yyyy/mm/dd hh:mm:ss �� yyyy-mm-dd hh:mm:ss,֧��1600���Ժ�(����������֤)
|
|containsSpecialChar()
|�Ƿ�����������ַ�(�����ַ�������ĸ����,�»���,�͵��,�ո�,@#$% ��˫�ֽ�)������,����true
|
|���·������������ĵ��÷���:
|1.һ�������������Ƴ���
|2.�����������ڶ���������ʾ�������С���ȣ�������������ʾ�������󳤶�
|
|isDigitString():����
|isLetter():��ĸ
|isUpperLetter():��д��ĸ
|isLowerLetter():Сд��ĸ
|isLetterNumString():��ĸ������
|isLNUString() :���֣���ĸ���»����ַ���
|
|������:��IE6.0��Firefox2.0�²���ͨ����
|License:Apache license2.0.����ʹ�ô˴���ʱ����license��������Ϣ.
\*-----------------------------------------------------------------------------------------*/
var global_formjs_valid_flag = false;		//ȫ�ֵ��Ƿ����ı���
var error_msg_span = null; //������ʾ��SPAN����DIV

/***
* ��������Ԫ��
* @param form ��
* @param checkAll �Ƿ�������Ԫ��(��Ϊfalse����ڵ�һ��������־ͻ��˳�)���򽫼������Ԫ��
* **/
function checkForm(form,checkAll){
	error_msg_span = document.getElementById("global_error_msg_area");
	//clear err msg
	if (error_msg_span != undefined && error_msg_span != null) {
		error_msg_span.innerHTML = "";
	}
    
	var eles = form.elements;
 	var hasError = false;
	//keke_valid(eles[3]);
	//return false;
    //�������б�Ԫ��
 	for(var i=0;i<eles.length;i++){
 		if(typeof(eles[i]).type != 'undefined'){
	 		var eleType = eles[i].type.toLowerCase();
	 		if(eleType!='button'&&eleType!='sbumit' &&eleType!='application/x-shockwave-flash' && typeof eleType != 'undefined'){
	        //ȡ��Ԫ��declare
	 		var ignore= eles[i].getAttribute("ignore");
		 		if(ignore==null||ignore!='true'){
					var limit = eles[i].getAttribute("limit");
					if(limit != null && limit != ""){
					var ajax  = eles[i].getAttribute("ajax");
					var valid = 0;
			 			valid = parseInt(eles[i].getAttribute("valid"));
			 			valid==1?valid=1:(valid==2?valid=2:'');
			 			ajax==null?valid=2:'';
						if(checkAll){
							validElement(eles[i]);
							if(!global_formjs_valid_flag){
								hasError = true;
							}
						}else{
							if(!validElement(eles[i])||valid==1){
								eles[i].type!='checkbox'?eles[i].focus():'';
								return false;
							}
						}
					}
		 		}
	 		}
 		}
	}
	
	return !hasError;
}
function test_hidden(ele){
	var test_a = 0;
	var test = $(ele).parents();
	$(test).each(function(){
		
		if(this.style.display=='none' || $(ele).attr('class').indexOf('hidden')!=-1){
			test_a = 1; 
		} 
	})
	return test_a;
}

/**
*���ִ��󷵻�FALSE
*/
function validElement(ele){
	
	
    //���ر�ǩ�����գ�ֱ�ӷ���ͨ��
	var a = test_hidden(ele);

	if(a==1){
	
		 return true;
	}
	
	error_msg_span = document.getElementById("global_error_msg_area");
	//���Լ��
	var limit = ele.getAttribute("limit");
	if(limit == null || trim(limit) == "") return;
	limit = trim(limit);
	var msgSpan = ele.getAttribute("msgArea");
	if(msgSpan != null) msgSpan = trim(msgSpan);
	var errMsg = ele.getAttribute("msg");
	if(errMsg != null) errMsg = trim(errMsg);
	//ȫ�ֱ���
	global_formjs_valid_flag = false;
	//preparing----
	var form = ele.form;
	var formName = form.name;
	//alert(ele.form.name);
	if(msgSpan != null || msgSpan != ""){
		msgSpan = document.getElementById(msgSpan);
		if(msgSpan == null){
			msgSpan = error_msg_span;
		}
	}else{
		msgSpan = error_msg_span;
	}

	/*if(msgSpan != undefined && msgSpan != null){
		msgSpan.innerHTML = "";
	}*/
	//���ô�����Ϣ����
	var setErrMessage = function(ele,error_msg){
		errMsg = (errMsg == null || errMsg == "") ? ele.name+" input error:" + error_msg : errMsg;
		if(msgSpan !=undefined  && msgSpan != null){
			msgSpan.innerHTML = "";
			msgSpan.setAttribute('class','msg msg_error');
			msgSpan.innerHTML = '<span>'+errMsg+'</span>';
		}else{
			//showDialog(errMsg,'alert','tips');
			 if(typeof art == 'function'){
				 art.dialog.alert(errMsg);
			 }else{
				 alert(errMsg);
			 }  
			
		}
		 
		return false;
	};
	// prepared....
	//������Ϣ�������
	//���limit��Ϣ����ȡ����Ҫ��Ϣ֮ -- �Ƿ����������
	var vtype = "string";			//ֵ����
	var required = false;	//�Ƿ����
	var general = false;		//�Ƿ���һ���ַ���(��������������ַ�)
	var lims = limit.split(";");		//�����б�
	var ii;
	for(ii = 0;ii<lims.length;ii++){
		if(lims[ii].indexOf(":")>0){
			var alim = lims[ii].split(":");
			if(alim[0] == 'type'){
				vtype = alim[1];
			}else if(alim[0] == 'required'){
				required = alim[1] == "true";
			}else if(alim[0] == 'general' && alim[1] == 'true'){
				general = true;
			}
		}else{
			alert("Element config error!")
			return false;
		}
	}
	//����
	if(required&&ele.type=='checkbox'&&ele.checked==false){
		return setErrMessage(ele," must be choose.");
	}
	
	//ֵ
	var valu = $.trim(ele.value);
			ele.value = valu;
	//�Ƿ�Ϊ��
	var isNull = (valu == undefined) || (valu == "");
	//���ж� -- ���������Ϊ�ն�ʵ���ǿգ��򷵻�
	if(required && isNull){
		return setErrMessage(ele," can't be null.");
	}else if(!isNull){
		//=============================���ͼ���========================//
		//=============================���ͼ���========================//
		//��������
		switch(vtype){
            //����
			case "int":
				if(!isDigit(valu)){
					return setErrMessage(ele," must be int.");
				}
				break;
			case "digit":
				if(!isDigitString(valu)){
					return setErrMessage(ele," must be digit.");
				}
				break;
			case "float":
				if(!isFloat(valu)){
					return setErrMessage(ele," must be float.");
				}
				break;
			case "date":
				if(!isDateYMD(valu)){
					return setErrMessage(ele," must be date.");
				}
				break;
			case "datetime":
				if(!isDateTimeYMD(valu)){
					return setErrMessage(ele," must be datetime.");
				}
				break;
			case "time":
				if(!isTime(valu)){
					return setErrMessage(ele," must be time.");
				}
				break;
			case "tel":
			case "fax":
				if(!isTel(valu)){
					return setErrMessage(ele," must be tel or fax number.");
				}
				break;
			case "mobileCn":
				if(!isMobileCN(valu)){
					return setErrMessage(ele," must be Chinese");
				}
				break;
			case "ip":
				if(!isIP(valu)){
					return setErrMessage(ele," must be IP.");
				}
				break;
			case "url":
				if(!isURL(valu)){
					return setErrMessage(ele," must be URL.");
				}
				break;
			case "idCard":
				if(!(isIDNumber15(valu) || isIDNumber18(valu))){
					return setErrMessage(ele," must be Chinese IDCard number.");
				}
				break;
			case "email":
				if(containsSpecialChar(valu)||!isEmail(valu)){
					return setErrMessage(ele," must be Email address.");
				}
				break;
			case "signName":
				if(!isSignName(valu)){
					return setErrMessage(ele," must be sign name:character,number,underline,point.The first char must be character.");
				}
                break;
            case "name":
				if(!isRealName(valu)){
					return setErrMessage(ele," must be real name:Double byte character or single byte character. or space,point.");
				}
				break;
			case "postcodeCn":
				if(!isPostalCodeCN(valu)){
					return setErrMessage(ele," must be valid postcode.");
				}
				break;
			case "string":
				break;
			default:
				alert(L.ele + ele.name + L.error_config_val + vtype);
				return false;
		}
		//=============================���ͼ������========================//
		//============================�������Ƽ���=======================//
		if(lims != null){
			var i;
			for(i = 0;i<lims.length;i++){
				var lim = lims[i].split(":");
				if(lim.length != 2){
					alert("attrribute limit config error.");
					return false;
				}
				if(lim[0] == "len"){	//���ȼ�飬������ʲô���ͣ������˳��Ⱦͼ��
					var lenDesc = lim[1];
					//alert(lim[1]);
					if(lenDesc.indexOf("-") > -1){
						var als = lenDesc.split("-");
						if(als.length == 2){
							if(als[0] == ""){
								if(valu.length > parseInt(als[1])){
									return setErrMessage(ele," can't more than " + als[1]);
								}
							}else if(als[1] == ""){
								if(valu.length < parseInt(als[0])){
									return setErrMessage(ele," can't less than " + als[0]);
								}
							}else if(valu.length < parseInt(als[0]) || valu.length > parseInt(als[1])){
								return setErrMessage(ele," must between " + als[0] + " and " + als[1]);
							}
						}else{
							alert("Element" + ele.name + " config error.");
							return false;
						}
					}else{
						if(valu.length != parseInt(lenDesc)){
							return setErrMessage(ele," the length must be " + lenDesc);
						}
					}
				//�޶�ֵ����,������int����float��
				}else if(lim[0] == "between" && lim[1].indexOf("-") > -1 && (vtype=="float" || vtype=="int")){
					var ls = lim[1].split("-");
					var fv = parseFloat(valu);
					//���û������
					if(ls[0] == ""){
						if(fv > parseFloat(ls[1])){
							return setErrMessage(ele," can't more than " + ls[1]);
						}
					}else if(ls[1] == ""){	//���û������
						if(fv < parseFloat(ls[0])){
							return setErrMessage(ele," can't less than " + ls[0]);
						}
					}else{
						if(fv < parseFloat(ls[0]) || fv > parseFloat(ls[1])){
							return setErrMessage(ele," must between " + ls[0] + " and " + ls[1]);
						}
					}
				}else if(lim[0] == "decLen" && vtype=="float"){	//����������
					if((valu.length - valu.indexOf(".")) > parseInt(lim[1])){
						//ת������
						var precision = Math.pow(10, parseInt(lim[1]) || 0);
						ele.value = Math.round(parseFloat(valu) * precision) / precision;
					}
				}else if(lim[0] == "equals"){
					//�Ƿ�Ҫ����������ȵ�Ԫ��ֵ
					var oevalue = eval("document." + formName + "." + lim[1] + ".value");
					if(oevalue != valu){
						return setErrMessage(ele," not match element " + lim[1] + "'s value.");
					}
				}else if(lim[0]=='bigger'){
					//Ҫ���⵱ǰ��ֵ��ָ��Ԫ��ֵ��
					var oevalue = eval("document." + formName + "." + lim[1] + ".value");
					od = parseInt(oevalue);
					cd =  parseInt(valu);
					if(cd<od||isNaN(od)||isNaN(cd)){
						return setErrMessage(ele," "+lim[0]+"  value  must bigger than " + lim[1] );
					}
				}else if(lim[0]=='than'){
					//Ҫ���⵱ǰ��ʱ��ֵ��ǰһ��ʱ��ֵ��
					var oevalue = eval("document." + formName + "." + lim[1] + ".value");
					od = toDate(oevalue);
					cd =  toDate(valu);
					if(cd<od){
						return setErrMessage(ele," "+lim[0]+"  date  must than " + lim[1] );
					}
					
				}else if(lim[0]=='less'){
					//Ҫ���⵱ǰ��ʱ��ֵ��ָ��ʱ��ֵС
					ld = toDate(lim[1]);
					cd =  toDate(valu);
					if(ld<cd){
						return setErrMessage(ele," "+lim[0]+"  date  must less " + lim[1] );
					}
				}
			}
		}
		if(general && vtype=='string'){// alert(containsSpecialChar(valu));
			if(containsSpecialChar(valu)){
				
				return setErrMessage(ele," can't allow contains special character.");
			}
		}
		//ajax�ж���֤����
		if(ele.getAttribute("valid")=='0'){
			return setErrMessage(ele,"ajax valid failed");
		}
	}
	//============================���Ƽ������=======================//
	global_formjs_valid_flag = true;
	return true;
}
/**
 * �����Ϣ��
 * @param divid
 */
function clearMsgArea(divid){
    var msgSpan = document.getElementById(divid);
    if(msgSpan != undefined && msgSpan != null){
		msgSpan.innerHTML = "";
	}
}

/*ȥ���ո�*/
function trim(str){
	return str.replace(/^\s+|\s+$/g, '');
}

/**
*   �ж��Ƿ�����
*   ���ֵ��÷�ʽ:
*	1.һ������,���ж��Ƿ�Ϊ����,�����Ȳ�����10λ
*	2.��������,�ڶ�������Ϊ '>'(����) �� '<'(С��),��3������ΪҪ�Ƚϵ�����
*	3.�����������ڶ��������������������Ϊ�������жϴ���ĵ�һ������ֵ�Ƿ��������м䡣�����߽磩
*/
function judgeDigit(){
	var s = arguments[0];
	if(arguments.length == 1){
		return isDigit(s);
	}else if(arguments.length == 3){
		//ͨ����֤
		var patrn=/^-?[0-9]{1,10}$/;
		if(patrn.test(s)){
			var p1 = arguments[1];
			var sint = parseInt(s);
			if(isDigit(arguments[2])){
				var pint = parseInt(arguments[2]);
				if(p1 == '>' || p1 == '<'){
					if(p1 == '>'){
						return sint > pint;
					}else if(p1 == '<'){
						return sint < pint;
					}
				}else if(isDigit(p1)){
					var pmin = parseInt(p1);
					return (sint >= pmin) && (sint <= pint);
				}else{
					alert('arguments error,the 2nd argument is not a number and not an operation:greater|less|equals.');
				}
			}else{
				alert('arguments error,the 3rd argument is not a number.');
			}
		}
	}
	return false;
}
/**
*�Ƿ�����
*/
function isDigit(s){
	var patrn=/^[0-9]{1,10}$/;
	return patrn.test(s);
}

/**
* �жϱ�ʶ�����ǵ�¼��������ĸ��ͷ,�ɴ����֡�"_"��"." ���ִ�
* �޶���С����(�ڶ�������)����󳤶�(����������)(Ĭ��Ϊ2--32λ)
* @param string
* @param min length
* @param max length
*/
function isSignName(){
	var s = arguments[0];
	if(arguments.length == 1){
		var patrn=/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){1,31}$/;
		return patrn.test(s);
	}else if(arguments.length == 3){
		if(isDigit(arguments[1]) && isDigit(arguments[2])){
			eval("var patrn=/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){" + (parseInt(arguments[1]) - 1) + "," + (parseInt(arguments[2]) - 1) + "}$/;");
			return eval("patrn.test(s);");
		}else{
			alert('Error:the 2nd argument and the 3rd argument must be number.');
			return false;
		}
	}else{
		alert('method invoke error.error arguments number.');
		return false;
	}
}
/**
*�ж��Ƿ�����ʵ����
*/
function isRealName(s){
	var patrn = /^([a-zA-Z0-9]|[._ ]){2,64}$/;		//Ӣ����
	var p2 = /^([^\x00-\xff]|[\s]){2,32}$/;		//˫�ֽ���
	return patrn.test(s) || p2.test(s);
}

/**
* �绰����
* ���������ֿ�ͷ���������⣬�ɺ���"-"
**/
function isTel(s){
	//var patrn=/^[+]{0,1}(\d){1,3}[ ]?([-]?((\d)|[ ]){1,12})+$/;
	var patrn = /^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/;
	var patrn2 = /^1[3|5|8]{1}[0-9]{1}[-| ]?\d{8}$/;
	var patrn3 = /^(400)[6|7|8|1|0]{1}[-| ]?\d{3}[-| ]?\d{3}$/;
	var patrn4 = /^(800)[-| ]?\d{3}[-| ]?\d{4}$/;
	var patrn5 = /^(00852)?[-| ]?[6|9]{1}\d{7}$/;
	return patrn.test(s) || patrn2.test(s)||patrn3.test(s)||patrn4.test(s)||patrn5.test(s);
}

/**
* �й���½�����ֻ�����
* ��13��15��ͷ��ʹ��ʱ����ݱ仯�޸�
* У����ͨ�绰���������⣬����"-"��ո�ֿ�
**/
function isMobileCN(s){
	var patrn = /^1[0-9]{1}[0-9]{1}[-| ]?\d{8}$/;
	var patrn2 = /^(00852)?[-| ]?[6|9]{1}\d{7}$/;

	return patrn.test(s)||patrn2.test(s);
}

/**
* �й������ʱ�
***/
function isPostalCodeCN(s){
	var patrn=/^[1-9]\d{5}$/;
	return patrn.test(s);
}
/**Emai*/
function isEmail(s){
	var patrn = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
	return patrn.test(s);
}

/**URL*/
function isURL(s){
	var patrn = /^http:\/\/([\w-]+(\.[\w-]+)+(\/[\w-   .\/\?%&=\u4e00-\u9fa5]*)?)?$/;
	return patrn.test(s);
}
/**
* IP
**/
function isIP(s) {
	var patrn=/^((1?\d?\d|(2([0-4]\d|5[0-5])))\.){3}(1?\d?\d|(2([0-4]\d|5[0-5])))$/;
	return patrn.test(s);
}
/**
*�Ƿ���������������ʽ
*ֻ�п�ʼ�������������ƥ���ΪTRUE
*HTML Tag
*/
function isHtmlTag(s){
	var patrn = /^<(.*)>.*<\/\1>|<(.*) \/>$/;
	return patrn.test(s);
}
/**
*���֤��
*�����ʡ������뻹û���ж�
*15λ
*/
function isIDNumber15(s){
	var patrn=/^[\d]{6}((\d{2}((0[13578]|1[02])(0[1-9]|[12]\d|3[01])|(0[13456789]|1[012])(0[1-9]|[12]\d|30)|02(0[1-9]|1\d|2[0-8])))|([02468][048]|[13579][26])0229)[\d]{3}$/;
	return patrn.test(s);
}
/**
*���֤��
*�����ʡ������뻹û���ж�
*18λ
*/
function isIDNumber18(s){
	var patrn = /^[\d]{6}[0-9]{4}(((0[13578]|(10|12))(0[1-9]|[1-2][0-9]|3[0-1]))|(02(0[1-9]|[1-2][0-9]))|((0[469]|11)(0[1-9]|[1-2][0-9]|30)))[\d]{3}[\d|x|X]$/;
	return patrn.test(s);
}

/**
*����
*/
function isChineseString(s){
	var patrn = /^[\u4e00-\u9fa5]+$/
	return patrn.test(s);
}
/**
*˫�ֽ�
*/
function isDoubleByteString(s){
	var patrn = /^[^x00-xff]+$/;
	return patrn.test(s);
}
/**
*�Ƿ������β�ո��������������TRUE
*/
function hasHESpace(s){
	var patrn = /^\s+|\s+$/;
	return patrn.test(s);
}
/**
*	QQ�����10λ����С5λ
*/
function isQQ(s){
	var patrn=/^[1-9]{1}\d{4,9}$/;
	return patrn.test(s);
}
/**
*������
*	�����һ����������ô�ж��Ƿ�Ϊ������
*	�����������������ô���ڶ���������Ϊ�����޶�����
*	�����������������ô�����������ǽ���Ϊ��ֵ����
*/
function judgeFloat(){
	if(arguments.length == 1){
		return isFloat(arguments[0]);
	}else if(arguments.length == 2){
		eval("var patrn = /^-?\\d+.?\\d{0," + arguments[1] + "}$/;");
		return eval("patrn.test(arguments[0]);");
	}else if(arguments.length == 4){
		var a3 = arguments[2];
		if(a3 == '>' || a3 == '<'){
			if(isFloat(arguments[3])){
				eval("var patrn = /^-?\\d+.?\\d{0," + arguments[1] + "}$/;");
				if(eval("patrn.test(arguments[0]);")){
					if(a3 == '<'){
						if(parseFloat(arguments[0]) < parseFloat(arguments[3])) return true;
					}else{
						if(parseFloat(arguments[0]) > parseFloat(arguments[3])) return true;
					}
				}
				return false;
			}
		}else if(isFloat(a3)){
			eval("var patrn = /^-?\\d+.?\\d{0," + arguments[1] + "}$/;");
				if(eval("patrn.test(arguments[0]);")){
					var f0 = parseFloat(arguments[0]);
					var f3 = parseFloat(arguments[2]);
					var f4 = parseFloat(arguments[3]);
					return f0 >= f3 && f0 <= f4;
				}else{
					return false;
				}
		}else{
			alert('the 3rd and the 4th arguments are not number.');
			return false;
		}
	}
	return false;
}
/**
*�Ƿ��Ǹ�����
**/
function isFloat(s){
	var patrn = /^-?\d*.?\d+$/;
	return patrn.test(s);
}
/**
*�Ƿ�����
**/
function isLeapYear(y){
	return (y % 4 == 0 && y % 100 != 0) || y % 400 == 0;
}
/**
*����
*yyyy-mm-dd��ʽ��yyyy/mm/dd��ʽ��������λ��ʾ���
*Regex author:Michael Ash
*֧��1600���Ժ�
*/
function isDateYMD(s){
	var patrn = /^(?:(?:(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)(?:0?2\1(?:29)))|(?:(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:(?:0?[13578]|1[02])\2(?:31))|(?:(?:0?[1,3-9]|1[0-2])\2(29|30))|(?:(?:0?[1-9])|(?:1[0-2]))\2(?:0?[1-9]|1\d|2[0-8]))))$/;
	return patrn.test(s);
}
/**
*����
*dd-mm-yyyy��ʽ��dd/mm/yyyy��ʽ��������λ��ʾ���
*Regex author:Marco Storti
*֧��1600���Ժ�
*/
function isDateDMY(s){
	var patrn = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;
	return patrn.test(s);
}
/**
*����
*mm-dd-yyyy��ʽ��mm/dd/yyyy��ʽ��������λ��ʾ���
*Regex author:Michael Ash
*֧��1600���Ժ�
*/
function isDateMDY(s){
	var patrn =  /^(?:(?:(?:0?[13578]|1[02])(\/|-|\.)31)\1|(?:(?:0?[13-9]|1[0-2])(\/|-|\.)(?:29|30)\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:0?2(\/|-|\.)29\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:(?:0?[1-9])|(?:1[0-2]))(\/|-|\.)(?:0?[1-9]|1\d|2[0-8])\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;
	return patrn.test(s);
}
/**
*����ʱ�䣺M/d/y hh:mm:ss
*Regex author:Michael Ash
*֧��1600���Ժ�
*/
function isDateTimeMDY(s){
	var patrn = /^(?=\d)(?:(?:(?:(?:(?:0?[13578]|1[02])(\/|-|\.)31)\1|(?:(?:0?[1,3-9]|1[0-2])(\/|-|\.)(?:29|30)\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})|(?:0?2(\/|-|\.)29\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))|(?:(?:0?[1-9])|(?:1[0-2]))(\/|-|\.)(?:0?[1-9]|1\d|2[0-8])\4(?:(?:1[6-9]|[2-9]\d)?\d{2}))($|\ (?=\d)))?(((0?[1-9]|1[012])(:[0-5]\d){0,2}(\ [AP]M))|([01]\d|2[0-3])(:[0-5]\d){1,2})?$/;
	return patrn.test(s);
}
/**
*����ʱ�� yyyy/mm/dd hh:mm:ss �� yyyy-mm-dd hh:mm:ss
*Date Regex author:Michael Ash
*Modified by Shaw Sunkee
*֧��1600���Ժ�
*/
function isDateTimeYMD(s){
	var patrn = /^(?:(?:(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)(?:0?2\1(?:29)))|(?:(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:(?:0?[13578]|1[02])\2(?:31))|(?:(?:0?[1,3-9]|1[0-2])\2(29|30))|(?:(?:0?[1-9])|(?:1[0-2]))\2(?:0?[1-9]|1\d|2[0-8]))))[ ]([0-1]?[0-9]|[2][0-3]):([0-5]?[0-9]):([0-5]?[0-9])$/;;
	return patrn.test(s);
}
/**
*ʱ��
*hh:mm:ss 24Сʱ�� 0 ~ 23 hour
*/
function isTime(s){
	var patrn = /^([0-1]?[0-9]|[2][0-3]):([0-5]?[0-9]):([0-5]?[0-9])$/;
	return patrn.test(s);
}
function toDate(s){
	return s.replace("-","");
	/*var sd=s.split("-");
    return new Date(sd[0],sd[1],sd[2]);
    */
}
/**
*	�Ƿ�����������ַ�(�����ַ�������ĸ���֣��»��ߣ��͵�ţ��ո�@#$% ��˫�ֽ�)
*	������������ true
*/
var validation_specialChars = new Array('\'','\"','\n','\r','\t',';',':','=','<','>',',','|','\\','<','>','/','^','~','`','$','#',' ');
function containsSpecialChar(str){
	for(var i = 0;i<validation_specialChars.length;i++){
		if(str.indexOf(validation_specialChars[i]) > -1){
			return true;
		}
	}
	return false;
}
/**
*	�ж��Ƿ�Ϊ���ִ�(���ڴ�ǰ��"-"�ţ��磺-123)
*	���ֵ��÷�ʽ:
*	1.һ�������������Ƴ���
*	2.�����������ڶ���������ʾ�������С���ȣ�������������ʾ�������󳤶�
*/
function isDigitString(){
	return judgePattrnAndLen("-?\\d",arguments);
}
/**��ĸ��
*	���ֵ��÷�ʽ��
*	һ����һ������������Ҫ��֤��ֵ
*	�����Ǵ������������ڶ��͵����������ֱ������С���Ⱥ���󳤶�
*/
function isLetter(){
	return judgePattrnAndLen("[A-Za-z]",arguments);
}

/**
*	��д��ĸ
*	���ֵ��÷�ʽ��
*	һ����һ������������Ҫ��֤��ֵ
*	�����Ǵ������������ڶ��͵����������ֱ������С���Ⱥ���󳤶�
*/
function isUpperLetter(){
	return judgePattrnAndLen("[A-Z]",arguments);
}
/**
*	Сд��ĸ
*	���ֵ��÷�ʽ��
*	һ����һ������������Ҫ��֤��ֵ
*	�����Ǵ������������ڶ��͵����������ֱ������С���Ⱥ���󳤶�
*/
function isLowerLetter(){
	return judgePattrnAndLen("[a-z]",arguments);
}
/**�������ַ���*/
function isLetterNumString(){
	return judgePattrnAndLen("[A-Za-z0-9]",arguments);
}
/**���֣���ĸ���»����ַ���*/
function isLNUString(s){
	return judgePattrnAndLen("\\w",arguments);
}

/**
 * ����һ���򵥵�����ʽ����Ҫ�ж���ֵ�������޶���С���Ⱥ���󳤶�
 * @return
 */
function judgePattrnAndLen(){
	var pat = arguments[0];
	var as = arguments[1];
	if(as == null || as == undefined || as.length == 0){
		alert('no arguments.');
		return false;
	}else if(as.length == 1){
		eval("var patrn= /^" + pat + "+$/;");
		return eval("patrn.test(as[0]);");
	}else if(as.length == 3){
		if(isDigit(as[1]) && isDigit(as[2])){
			eval("patrn =" + "/^" + pat + "{" + as[1] + "," + as[2] + "}$/;");
			return eval("patrn.test(as[0]);");
		}else{
			alert('error arguments:the 2nd argument and the 3rd argument must be number.');
			return false;
		}
	}else{
		alert('error arguments number');
		return false;
	}
}
Array.prototype.in_array = function(e) 
{ 
    for(i=0;i<this.length;i++)
    {
        if(this[i] == e)
        return true;
    }
    return false;
}
String.prototype.Trim     =   function(){return   this.replace(/(^\s*)|(\s*$)/g,   " ");} 
/**
 * obj input_obj
 * isAlert boolen 
 */
function isExtName(obj,isalert,msgType,showTarget){
	var value = obj.value;
	var ext = obj.getAttribute('ext');
	var ext_arr = ext.split(',');
	var s_num = value.lastIndexOf(".");
	var lastname = value.substring(s_num,value.length).toLowerCase();
	isalert = true;
	if(isalert)
	{
	    if(ext_arr.in_array(lastname))
	    	{return true;}else{
	    		if(msgType){
					tipsAppend(showTarget,lastname+L.file_format_error,'error','red');
	    		}else{
	    			art.dialog.alert(lastname+L.file_format_error);
	    		}return false;
	    	}
	}else{
		if(ext_arr.in_array(lastname))
    	{return true;}else{return false;}
	}
}

//ҳ�����ʱ��֤
$(function(){
	form_valid();
})
//��֤ҳ������input��ǩ
function form_valid(){
	var eles = $("input,select"); //document.getElementsByTagName('input');
	
	for(i=0;i<eles.length;i++){
		var limit = eles[i].getAttribute("limit");
		if(limit != null && limit != ""){
			//id = eles[i].getAttribute('id');
			//if(id !='' && id != null ){
			  ele_valid(eles[i]);	
			//}
			
		}	
	}
	return true;
}
//ͨ��Ԫ���뽹��focus��֤����
function ele_valid(obj){
	
	//var obj = document.getElementById(id);
	var msgArea = obj.getAttribute("msgArea");
	var msg = obj.getAttribute('msg');
	var tips = obj.getAttribute('title');
	
	if(tips==null) tips='&nbsp;';
	
	$(obj).blur(function(){
		var url = obj.getAttribute('ajax');
		var value="";
		var aa = validElement(obj);
		if (!aa) {
			
			$("#" + msgArea).addClass('msg').removeClass('msg_tips').removeClass('msg_ok');
			$("#" + msgArea).html("<i></i><span>"+msg+"</span>");
			return false;
		} else {
			//ajax��֤
			if(url){
				value = trim($(obj).val());
				if(!value.length){
					return false;
				}
				url +=  value;
				$.post(url,function(data){
					if($.trim(data)==true){
						$("#" + msgArea).addClass('msg').addClass('msg_ok').removeClass('msg_tips').removeClass('msg_error');
						$("#" + msgArea).html('<i></i>');
						$(obj).attr("valid",2);
						return true;
					}else{
						$("#" + msgArea).addClass('msg').addClass('msg_error').removeClass('msg_tips').removeClass('msg_ok');
						if(msgArea==undefined || msgArea==null){
							 if(typeof(eval("art.dialog"))=="function"){
								 art.dialog.alert(data);
							 }else{
								 alert(data);
							 } 
						}else{
							$("#" + msgArea).html('<i></i><span>'+data+'</span>');
						}
						
						$(obj).attr("valid",1);
						return false;
					}
				})
			}else{
				//��ҵѡ����֤
				if(($("#indus_pid").val() && $("#indus_id").val() == '') || ($("#indus_pid").val() == '' && $("#indus_id").val()) ){
					var span_indus = "#" + msgArea;
					if(span_indus == '#span_indus'){
						$("#span_indus").addClass('msg_error').removeClass('msg_tips');
						$("#span_indus").html("<i></i><span>��ѡ����ҵ�ӷ���</span>");
						return false;
					}else{
						$("#" + msgArea).addClass('msg_ok').removeClass('msg_tips').removeClass('msg_error');
						$("#" + msgArea).html("<i></i>");
						return true;
					}
					
				}
				else{
				$("#" + msgArea).addClass('msg_ok').removeClass('msg_tips').removeClass('msg_error');
				$("#" + msgArea).html("<i></i>");
				return true;
				}
			}
			
		}
	}).focus(function(){
		$("#" + msgArea).addClass('msg').removeClass('msg_ok').removeClass('msg_tips').removeClass('msg_error');
		$("#" + msgArea).html(tips);
		return false;
	})
}


 
 
