window.onload = initAll2;

function initAll() {
	var allLiTags = document.getElementsByClassName('cat-item');
	var childLiTags = '';
	var tempTag = '';
	for (var i = 0; i < allLiTags.length; i++) {
		if (allLiTags[i].className.indexOf('cat-item') > -1) {
			childLiTags = allLiTags[i].childNodes;
			for (var j = 0; j < childLiTags.length; j++) {
				//alert(childLiTags[j].tagName+' => '+childLiTags[j].className);
				if (childLiTags[j].className.indexOf('children') > -1) {
					//alert(childLiTags[j].tagName+' parent '+allLiTags[i].className);
					/*tempTag = allLiTags[i].innerHTML;
					allLiTags[i].innerHTML = '<span class="icon">&bsp;</span>'+tempTag;*/
				}
				else {
					//alert(allLiTags[i].tagName+' => '+childLiTags[j].className);
				}
			}
			
			
		}
	}



	/*$(document).ready(function() {
	  $('#play-video').on('click', function(ev) {
	 
	    $("#youtube-vid")[0].src += "&autoplay=1";
	    ev.preventDefault();
	 
	  });
	});

	play-icon
	function playVideo(video, hideId) {
		document.getElementById(hideId).style.display = 'none';
		document.getElementById(video).src += "&autoplay=1";
	    //ev.preventDefault();
	}*/
}

function initAll2() {
	var allUlTags = document.getElementsByClassName('children');
	var parentLiTags = '';
	var tempTag = '';
	var zPos = 1;
	for (var i = 0; i < allUlTags.length; i++) {
		if (allUlTags[i].parentNode.className.indexOf('cat-item') > -1) {
			tempTag = allUlTags[i].parentNode.innerHTML;
			allUlTags[i].parentNode.innerHTML = tempTag+'<span onclick="toggleMenu(\'right-menu-parent-'+zPos+'\');" class="yellow-font link-icon fa-angle-down"> </span>';
			allUlTags[i].parentNode.id = 'right-menu-parent-'+zPos;
			//allUlTags[i].parentNode.onclick = function() {toggleMenu(this.id);};
			//allUlTags[i].parentNode.onClick = toggleMenu('right-menu-parent-'+zPos);
		}
		zPos++;
	}

	var allUlTags = document.getElementsByTagName('ul');
	var childLiTags;
	for (var i = 0; i < allUlTags.length; i++) {
		if (allUlTags[i].className == 'list-items') {
			childLiTags = allUlTags[i].childNodes;
			for (var j = 0; j < childLiTags.length; j++) {
				childLiTags[j].className = 'inactive';
				childLiTags[j].onclick = function() {
					var active = (this.className.indexOf('inactive') == -1) ? 'yes' : 'no';
					//alert(active);
					if (active == 'no') {initAll(); this.className = 'active exempt'; } // TAB OPENED
					if (active == 'yes') {this.className = 'inactive';} // TAB CLOSED
				}
			}
		}
	}


    // Align .bold-text class to middle vertically
    /*var spaceBox = document.getElementById('space-box').offsetHeight;
    var boldText = document.getElementById('bold-text').offsetHeight;
    var pad = (spaceBox - boldText)/2;
    alert('('+spaceBox+'-'+boldText+') / 2 = '+pad);*/
    var allBoldText = document.getElementsByClassName('bold-text');
    for (var i = 0; i < allBoldText.length; i++) {
    	var spaceBox = allBoldText[i].parentElement.offsetHeight;
    	var boldText = allBoldText[i].offsetHeight;
    	var pad = (spaceBox - boldText)/2;
    	//alert('('+spaceBox+'-'+boldText+') / 2 = '+pad);
    	allBoldText[i].style.paddingTop = pad+'px';
    	//alert(allBoldText[i].innerHTML);
    }
}

function toggleMenu(elemId) {
	var allLi = document.getElementsByTagName('LI');
	for (var i = 0; i < allLi.length; i++) {
		if (allLi[i].id == elemId) {
			//alert('You clicked me => '+allLi[i].id);
			if (allLi[i].childNodes[2].style.display == 'block') {
				allLi[i].childNodes[2].style.display = 'none';
			}
			else {
				allLi[i].childNodes[2].style.display = 'block';
			}
		}
	}
	//this.childNodes[2].style.display = 'none';
	/*var allChildNodes = this.childNodes;
	var counter = 1;
	alert(allChildNodes.length);
	for (var i = 0; i < allChildNodes.length; i++) {
		if(allChildNodes[i].tagName == 'UL') {
			alert(counter);
			if(allChildNodes[i].className == 'children') {
				if (allChildNodes[i].style.display == 'none') {
					allChildNodes[i].style.display = 'block';
				}
				else {
					allChildNodes[i].style.display = 'none';
				}
			}
		}
		counter++;
	}*/
}

function showModal(elemId, elemType) {
	$('#modal').show();
	//$('#item-desc-'+elemId).html();
	//$('#thumb-img-'+elemId).html();
	$('#pop-video,#pop-video-content,#pop-image,#pop-content').hide();
	if (elemType == 'video') {
		var url = $('#thumb-img-'+elemId).attr('data-link');
		$('#enclose').css('display','block');
		$('#pop-video').html('<iframe id="youtube-vid" width="100%" height="480" src="https://www.youtube.com/embed/'+url+'?rel=0" frameborder="0" allowfullscreen></iframe>');
		$('#pop-video-content').html('<h2>'+$('#thumb-title-'+elemId).html()+'</h2>'+$('#item-desc-'+elemId).html());
		$('#pop-video,#pop-video-content').show();
	}
	else {
		var img = $('#thumb-img-'+elemId).attr('data-link').split('|');
		var imgOut = '';
		if (img.length > 1) {
			$('#enclose').css('display','block');
			$('#pop-content').attr('class', 'adjust-pop-content');
			imgOut += '<div class="width welcome-box slider-box"><div id="slider"><ul>';
			for (var i = 0; i < img.length-1; i++) {
				imgOut += '<li><img src="'+img[i]+'" /></li>';
			}
			imgOut += '</ul></div></div>';
		}
		else {
			imgOut = '<img src="'+img+'" />';
		}
		
		$('#pop-image').html(imgOut);
		//$('#pop-content').html('<h2>'+$('#thumb-title-'+elemId).html()+'</h2>'+$('#item-desc-'+elemId).html());
		$('#pop-image,#pop-content').show();
	}
	$("#slider").easySlider({
                auto: true, 
                continuous: true,
                numeric: true
            });
}

function closeModal(elemId, elemType) {
	if (elemType == 'video') {
		$('#pop-video').html(' ');
	}
	$('#'+elemId).hide();
}

function toggleElem(theId) {
	var menuId = document.getElementById(theId);
	if (menuId.style.display == 'block') {
		menuId.style.display = 'none';
	}
	else {
		menuId.style.display = 'block';
	}
}