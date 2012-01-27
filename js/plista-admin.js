/*global document, window*/

var plistaadmin = {
	init: function () {
		"use strict";
		var pdesign = document.getElementById('plistadesignbox'),
			pmdesign = document.getElementById('plistamobiledesignbox'),
			pmcheckdesign = document.getElementById('plista_mobile_editcss'),
			pcheckdesign = document.getElementById('plista_editcss'),
			ppicads = document.getElementById('plista_setpicads'),
			ppicadsinfo = document.getElementById('plista_picads_info'),
			ppicadsadditional = document.getElementById('ppicadsadditional'),
			ppicadsinfoclose = document.getElementById('plista_picads_info_close');

		pdesign.className = pmdesign.className = 'plistahide';
		if (ppicadsinfo) {
			ppicadsinfo.className = ppicadsadditional.className = 'plistahide';
		}

		if (pcheckdesign.checked === true) {
			pdesign.className = 'plistashow';
		}

		pcheckdesign.onclick = function () {
			if (pcheckdesign.checked === true) {
				pdesign.className = 'plistashow';
			} else {
				pdesign.className = 'plistahide';
			}
		};

		if (pmcheckdesign.checked === true) {
			pmdesign.className = 'plistashow';
		}

		pmcheckdesign.onclick = function () {
			if (pmcheckdesign.checked === true) {
				pmdesign.className = 'plistashow';
			} else {
				pmdesign.className = 'plistahide';
			}
		};

		if (ppicads.checked === true) {
			ppicadsadditional.className = 'plistashow';
		}

		ppicads.onclick = function () {
			if (ppicads.checked === true) {
				ppicadsinfo.className = ppicadsadditional.className = 'plistashow';
			} else {
				ppicadsinfo.className = ppicadsadditional.className = 'plistahide';
			}
		};

		ppicadsinfoclose.onclick = function () {
			ppicadsinfo.className = 'plistahide';
		};
	}
};

if (typeof (window.addEventListener) !== 'undefined') {
	window.addEventListener("load", plistaadmin.init, false);
} else if (typeof (window.attachEvent) !== 'undefined') {
	window.attachEvent("onload", plistaadmin.init);
}
