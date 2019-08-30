/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dashboard/jvectormap.custom.js":
/*!*****************************************************!*\
  !*** ./resources/js/dashboard/jvectormap.custom.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  "use strict";

  jQuery('#world-map-markers').vectorMap({
    map: 'world_mill_en',
    backgroundColor: 'transparent',
    borderColor: '#818181',
    borderOpacity: 0.25,
    borderWidth: 1,
    zoomOnScroll: false,
    color: '#8b94d6',
    regionStyle: {
      initial: {
        fill: '#8b94d6'
      }
    },
    markerStyle: {
      initial: {
        r: 9,
        'fill': '#fff',
        'fill-opacity': 1,
        'stroke': '#000',
        'stroke-width': 5,
        'stroke-opacity': 0.4
      }
    },
    enableZoom: true,
    hoverColor: '#8b94d6',
    markers: [{
      latLng: [21.00, 78.00],
      name: 'India'
    }],
    hoverOpacity: null,
    normalizeFunction: 'linear',
    scaleColors: ['#b6d6ff', '#005ace'],
    selectedColor: '#c9dfaf',
    selectedRegions: [],
    showTooltip: true,
    onRegionClick: function onRegionClick(element, code, region) {
      var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
      alert(message);
    }
  });
  $('#india').vectorMap({
    map: 'in_mill',
    backgroundColor: 'transparent',
    zoomOnScroll: false,
    regionStyle: {
      initial: {
        fill: '#64ced3'
      }
    }
  });
  $('#usa').vectorMap({
    map: 'us_aea_en',
    backgroundColor: 'transparent',
    zoomOnScroll: false,
    regionStyle: {
      initial: {
        fill: '#f87ca1'
      }
    }
  });
  $('#australia').vectorMap({
    map: 'au_mill',
    backgroundColor: 'transparent',
    zoomOnScroll: false,
    regionStyle: {
      initial: {
        fill: '#ffe174'
      }
    }
  });
  $('#uk').vectorMap({
    map: 'uk_mill_en',
    backgroundColor: 'transparent',
    zoomOnScroll: false,
    regionStyle: {
      initial: {
        fill: '#ffa47f'
      }
    }
  });
});

/***/ }),

/***/ 4:
/*!***********************************************************!*\
  !*** multi ./resources/js/dashboard/jvectormap.custom.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\Adrian\ecommerce-ar\resources\js\dashboard\jvectormap.custom.js */"./resources/js/dashboard/jvectormap.custom.js");


/***/ })

/******/ });