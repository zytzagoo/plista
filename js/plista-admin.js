/*global document*/

function plistaadmin() {
	var pdesign = document.getElementById('plistadesignbox'),
		pmdesign = document.getElementById('plistamobiledesignbox'),
		pmcheckdesign = document.getElementById('plista_mobile_editcss'),
		pcheckdesign = document.getElementById('plista_editcss');

	pdesign.style.display = pmdesign.style.display = 'none';

	if (pcheckdesign.checked == '1') {
		pdesign.style.display = 'block';
	}

	pcheckdesign.onchange = function () {
		if (pcheckdesign.checked == '1') {
			pdesign.style.display = 'block';
		} else {
			pdesign.style.display = 'none';
		}
	};

	if (pmcheckdesign.checked == '1') {
		pmdesign.style.display = 'block';
	}

	pmcheckdesign.onchange = function () {
		if (pmcheckdesign.checked == '1') {
			pmdesign.style.display = 'block';
		} else {
			pmdesign.style.display = 'none';
		}
	};
};

if ( typeof(window.addEventListener) !== 'undefined' )
	window.addEventListener( "load", plistaadmin, false );
else if ( typeof(window.attachEvent) !== 'undefined' ) {
	window.attachEvent( "onload", plistaadmin );
}
