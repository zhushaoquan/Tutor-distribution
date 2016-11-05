window.onload = prePares;
function prePares() {
    match();
 
};
/*tab切换*/
function tabChange_st()
{
	var left_serach = document.getElementById("left-serach");
	var left_text = document.getElementById('left-text');
	var serach = document.getElementById('serach');
	var store = document.getElementById('store');
		left_serach.style.display="block";
		left_text.style.display="none";
		serach.style.background="url(../image/right-nav.png)";
		serach.style.color="#fff";
		store.style.background="#fff";
		store.style.color="#355f81";

	
};
function tabChange_se()
{
	var left_serach = document.getElementById("left-serach");
	var left_text = document.getElementById('left-text');
	var serach = document.getElementById('serach');
	var store = document.getElementById('store');
		left_text.style.display="block";
	    left_serach.style.display="none";
		store.style.background="url(../image/right-nav.png)";
		store.style.color="#fff";
		serach.style.background="#fff";
		serach.style.color="#355f81";

};
/*----隐藏、显示二级导航-----*/
/*---匹配li与对应的ul--*/

function match() {
    var lis=document.getElementsByClassName("nav-ul-li-1");
    var uls=document.getElementsByClassName("nav-ul-2");
    //alert(lis.length);
    for(var i=0;i<lis.length;i++)
    {
        showList(lis[i],uls[i],i);
    
    }
    
};

/*function matchHeadnav(){
    var lis=document.getElementsByClassName("head-nav-1-a");
    var uls=document.getElementsByClassName("head-nav-2");
    //alert(lis.length);
    for(var i=0;i<lis.length;i++)
    {
        showListhover(lis[i],uls[i],i);
    
    }
};
*/
function showList(li,ul,i)
{

    li.onclick=function()
    {
   
        if(ul.style.display=="none")
            {
                ul.style.display="block";
               
            }
        else
            {
                ul.style.display="none";
               
            }

    }
};
function showListhover(li,ul,i)
{

    li.onmouseover=function()
    {
                ul.style.display="block";
    }
    li.onmouseout=function()
    {
                ul.style.display="none";
    }
};
/*隐藏左侧区域*/
function leftInside()
{
	var left = document.getElementById("left");
	var right =document.getElementById("right");
	if(left.style.display=="block")
		{
			left.style.display = "none";
			right.style.marginLeft = "0";
		
		}
	else if(left.style.display=="none")
	   {

			right.style.marginLeft = "17.5%";
			left.style.display = "block";
			

		}
};
/*----解决ie下无法使用placeholder------*/
/**
 */
(function(){
var EventUtil = {
    addHandler: function(element, type, handler){
        if (element.addEventListener){
            element.addEventListener(type, handler, false);
        } else if (element.attachEvent){
            element.attachEvent("on" + type, handler);
        } else {
            element["on" + type] = handler;
        }
    },
    getCharCode: function(event){
        if (typeof event.charCode === "number"){
            return event.charCode;
        } else {
            return event.keyCode;
        }
    },
    getEvent: function(event){
        return event ? event : window.event;
    },
    getTarget: function(event){
        return event.target || event.srcElement;
    }
};
EventUtil.addHandler(document, 'readystatechange', function(){
    if (!('placeholder' in document.createElement('input'))) {
        var inputdoc = document.getElementsByTagName('input');
        var hasPlaceholder = new Array();
        for (var i in inputdoc) {
            if (typeof(inputdoc[i]) === 'object' && inputdoc[i].getAttribute('placeholder') != null) {
                hasPlaceholder.push(inputdoc[i]);
            }
        }
        if (hasPlaceholder.length > 0) {
            var holders = new Array;
            for (var i = 0; i < hasPlaceholder.length; i++) {
                var span = document.createElement('span');
                // span.className = 'ui-placeholder';
                var input = hasPlaceholder[i];
                span.height = input.height;
                span.width = input.width;
                span.innerHTML = input.getAttribute('placeholder');
                if (input === input.parentNode.lastChild) {
                    input.parentNode.appendChild(span);
                } else {
                    input.parentNode.insertBefore(span, input.nextSibling);
                }
                span.style.color = "#999";
                span.style.textIndent = '0.5em';
                span.style.position = "absolute";
                span.style.top = input.offsetTop;
                span.style.left = input.offsetLeft;
                holders[i] = span;
            }
            var togglePlaceholder = function(event) {
                event = EventUtil.getEvent(event);
                var target = EventUtil.getTarget(event);
                // alert(target.value)
                for( var i in hasPlaceholder) {
                    if (target === hasPlaceholder[i]) {
                        if (hasPlaceholder[i].value != '') {
                            holders[i].style.display = 'none';
                        } else if ( /[a-zA-Z0-9`~!@#\$%\^&\*\(\)_+-=\[\]\{\};:'"\|\\,.\/\?<>]/.test(String.fromCharCode(EventUtil.getCharCode(event))) ) {
                             
                            holders[i].style.display = 'none';
                        } else {
                            holders[i].style.display = 'block';
                        }
                    }
                }
            }
             
            EventUtil.addHandler(document, 'keydown', togglePlaceholder)
 
            EventUtil.addHandler(document, 'keyup', function(event) {
                event = EventUtil.getEvent(event);
                var target = EventUtil.getTarget(event);
                // alert(target.value)
                for( var i in hasPlaceholder) {
                    if (target === hasPlaceholder[i]) {
                        if (hasPlaceholder[i].value != '') {
                            holders[i].style.display = 'none';
                        } else {
                            holders[i].style.display = 'block';
                        }
                    }
                }
            })
        }
    }
})
}).call()