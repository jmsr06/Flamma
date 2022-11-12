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
/******/ 	return __webpack_require__(__webpack_require__.s = 10);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/sliderDetalle.js":
/*!***************************************!*\
  !*** ./resources/js/sliderDetalle.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("document.addEventListener('DOMContentLoaded', function () {\n  var secondarySlider = new Splide('#secondary-slider', {\n    rewind: true,\n    width: '100%',\n    direction: 'ltr',\n    isNavigation: true,\n    gap: 0,\n    pagination: false,\n    cover: true,\n    lazyLoad: 'sequential',\n    arrows: false,\n    breakpoints: {\n      '2400': {\n        fixedWidth: 85,\n        fixedHeight: 85,\n        height: 85,\n        width: '30vw'\n      },\n      '1199': {\n        height: 85,\n        width: '38vw',\n        fixedWidth: 85,\n        fixedHeight: 85\n      },\n      '991': {\n        fixedWidth: 80,\n        fixedHeight: 80,\n        height: 80,\n        width: '40vw'\n      },\n      '767': {\n        fixedWidth: 80,\n        fixedHeight: 80,\n        height: 80,\n        width: 320\n      },\n      '575': {\n        fixedWidth: 80,\n        fixedHeight: 80,\n        height: 80,\n        width: 320\n      }\n    }\n  }).mount();\n  var primarySlider = new Splide('#primary-slider', {\n    type: 'fade',\n    // heightRatio: 1,\n    pagination: false,\n    arrows: false,\n    cover: true,\n    lazyLoad: 'sequential',\n    rewind: true,\n    breakpoints: {\n      '2400': {\n        fixedWidth: '30vw',\n        fixedHeight: '30vw',\n        width: '30vw',\n        arrows: true\n      },\n      '1199': {\n        fixedWidth: '38vw',\n        fixedHeight: '38vw',\n        width: '38vw',\n        arrows: true\n      },\n      '991': {\n        fixedWidth: '40vw',\n        fixedHeight: '40vw',\n        width: '40vw',\n        arrows: false\n      },\n      '767': {\n        fixedWidth: 320,\n        fixedHeight: 320,\n        width: 320,\n        arrows: false\n      },\n      '575': {\n        fixedWidth: 320,\n        fixedHeight: 320,\n        width: 320,\n        arrows: false\n      }\n    }\n  }); // do not call mount() here.\n\n  primarySlider.sync(secondarySlider).mount();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2xpZGVyRGV0YWxsZS5qcz8xOGJhIl0sIm5hbWVzIjpbImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsInNlY29uZGFyeVNsaWRlciIsIlNwbGlkZSIsInJld2luZCIsIndpZHRoIiwiZGlyZWN0aW9uIiwiaXNOYXZpZ2F0aW9uIiwiZ2FwIiwicGFnaW5hdGlvbiIsImNvdmVyIiwibGF6eUxvYWQiLCJhcnJvd3MiLCJicmVha3BvaW50cyIsImZpeGVkV2lkdGgiLCJmaXhlZEhlaWdodCIsImhlaWdodCIsIm1vdW50IiwicHJpbWFyeVNsaWRlciIsInR5cGUiLCJzeW5jIl0sIm1hcHBpbmdzIjoiQUFBQUEsUUFBUSxDQUFDQyxnQkFBVCxDQUEwQixrQkFBMUIsRUFBOEMsWUFBVztBQUNyRCxNQUFJQyxlQUFlLEdBQUcsSUFBSUMsTUFBSixDQUFXLG1CQUFYLEVBQWdDO0FBQ2xEQyxVQUFNLEVBQUUsSUFEMEM7QUFFbERDLFNBQUssRUFBRSxNQUYyQztBQUdsREMsYUFBUyxFQUFFLEtBSHVDO0FBSWxEQyxnQkFBWSxFQUFFLElBSm9DO0FBS2xEQyxPQUFHLEVBQUUsQ0FMNkM7QUFNbERDLGNBQVUsRUFBRSxLQU5zQztBQU9sREMsU0FBSyxFQUFFLElBUDJDO0FBUWxEQyxZQUFRLEVBQUUsWUFSd0M7QUFTbERDLFVBQU0sRUFBRSxLQVQwQztBQVVsREMsZUFBVyxFQUFFO0FBQ1QsY0FBUTtBQUNKQyxrQkFBVSxFQUFFLEVBRFI7QUFFSkMsbUJBQVcsRUFBRSxFQUZUO0FBR0pDLGNBQU0sRUFBRSxFQUhKO0FBSUpYLGFBQUssRUFBRTtBQUpILE9BREM7QUFPVCxjQUFRO0FBQ0pXLGNBQU0sRUFBRSxFQURKO0FBRUpYLGFBQUssRUFBRSxNQUZIO0FBR0pTLGtCQUFVLEVBQUUsRUFIUjtBQUlKQyxtQkFBVyxFQUFFO0FBSlQsT0FQQztBQWFULGFBQU87QUFDSEQsa0JBQVUsRUFBRSxFQURUO0FBRUhDLG1CQUFXLEVBQUUsRUFGVjtBQUdIQyxjQUFNLEVBQUUsRUFITDtBQUlIWCxhQUFLLEVBQUU7QUFKSixPQWJFO0FBbUJULGFBQU87QUFDSFMsa0JBQVUsRUFBRSxFQURUO0FBRUhDLG1CQUFXLEVBQUUsRUFGVjtBQUdIQyxjQUFNLEVBQUUsRUFITDtBQUlIWCxhQUFLLEVBQUU7QUFKSixPQW5CRTtBQXlCVCxhQUFPO0FBQ0hTLGtCQUFVLEVBQUUsRUFEVDtBQUVIQyxtQkFBVyxFQUFFLEVBRlY7QUFHSEMsY0FBTSxFQUFFLEVBSEw7QUFJSFgsYUFBSyxFQUFFO0FBSko7QUF6QkU7QUFWcUMsR0FBaEMsRUEwQ25CWSxLQTFDbUIsRUFBdEI7QUE0Q0EsTUFBSUMsYUFBYSxHQUFHLElBQUlmLE1BQUosQ0FBVyxpQkFBWCxFQUE4QjtBQUM5Q2dCLFFBQUksRUFBRSxNQUR3QztBQUU5QztBQUNBVixjQUFVLEVBQUUsS0FIa0M7QUFJOUNHLFVBQU0sRUFBRSxLQUpzQztBQUs5Q0YsU0FBSyxFQUFFLElBTHVDO0FBTTlDQyxZQUFRLEVBQUUsWUFOb0M7QUFPOUNQLFVBQU0sRUFBRSxJQVBzQztBQVE5Q1MsZUFBVyxFQUFFO0FBQ1QsY0FBUTtBQUNKQyxrQkFBVSxFQUFFLE1BRFI7QUFFSkMsbUJBQVcsRUFBRSxNQUZUO0FBR0pWLGFBQUssRUFBRSxNQUhIO0FBSUpPLGNBQU0sRUFBRTtBQUpKLE9BREM7QUFPVCxjQUFRO0FBQ0pFLGtCQUFVLEVBQUUsTUFEUjtBQUVKQyxtQkFBVyxFQUFFLE1BRlQ7QUFHSlYsYUFBSyxFQUFFLE1BSEg7QUFJSk8sY0FBTSxFQUFFO0FBSkosT0FQQztBQWFULGFBQU87QUFDSEUsa0JBQVUsRUFBRSxNQURUO0FBRUhDLG1CQUFXLEVBQUUsTUFGVjtBQUdIVixhQUFLLEVBQUUsTUFISjtBQUlITyxjQUFNLEVBQUU7QUFKTCxPQWJFO0FBbUJULGFBQU87QUFDSEUsa0JBQVUsRUFBRSxHQURUO0FBRUhDLG1CQUFXLEVBQUUsR0FGVjtBQUdIVixhQUFLLEVBQUUsR0FISjtBQUlITyxjQUFNLEVBQUU7QUFKTCxPQW5CRTtBQXlCVCxhQUFPO0FBQ0hFLGtCQUFVLEVBQUUsR0FEVDtBQUVIQyxtQkFBVyxFQUFFLEdBRlY7QUFHSFYsYUFBSyxFQUFFLEdBSEo7QUFJSE8sY0FBTSxFQUFFO0FBSkw7QUF6QkU7QUFSaUMsR0FBOUIsQ0FBcEIsQ0E3Q3FELENBcUZqRDs7QUFDSk0sZUFBYSxDQUFDRSxJQUFkLENBQW1CbEIsZUFBbkIsRUFBb0NlLEtBQXBDO0FBQ0gsQ0F2RkQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvc2xpZGVyRGV0YWxsZS5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbImRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCBmdW5jdGlvbigpIHtcbiAgICB2YXIgc2Vjb25kYXJ5U2xpZGVyID0gbmV3IFNwbGlkZSgnI3NlY29uZGFyeS1zbGlkZXInLCB7XG4gICAgICAgIHJld2luZDogdHJ1ZSxcbiAgICAgICAgd2lkdGg6ICcxMDAlJyxcbiAgICAgICAgZGlyZWN0aW9uOiAnbHRyJyxcbiAgICAgICAgaXNOYXZpZ2F0aW9uOiB0cnVlLFxuICAgICAgICBnYXA6IDAsXG4gICAgICAgIHBhZ2luYXRpb246IGZhbHNlLFxuICAgICAgICBjb3ZlcjogdHJ1ZSxcbiAgICAgICAgbGF6eUxvYWQ6ICdzZXF1ZW50aWFsJyxcbiAgICAgICAgYXJyb3dzOiBmYWxzZSxcbiAgICAgICAgYnJlYWtwb2ludHM6IHtcbiAgICAgICAgICAgICcyNDAwJzoge1xuICAgICAgICAgICAgICAgIGZpeGVkV2lkdGg6IDg1LFxuICAgICAgICAgICAgICAgIGZpeGVkSGVpZ2h0OiA4NSxcbiAgICAgICAgICAgICAgICBoZWlnaHQ6IDg1LFxuICAgICAgICAgICAgICAgIHdpZHRoOiAnMzB2dycsXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgJzExOTknOiB7XG4gICAgICAgICAgICAgICAgaGVpZ2h0OiA4NSxcbiAgICAgICAgICAgICAgICB3aWR0aDogJzM4dncnLFxuICAgICAgICAgICAgICAgIGZpeGVkV2lkdGg6IDg1LFxuICAgICAgICAgICAgICAgIGZpeGVkSGVpZ2h0OiA4NSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAnOTkxJzoge1xuICAgICAgICAgICAgICAgIGZpeGVkV2lkdGg6IDgwLFxuICAgICAgICAgICAgICAgIGZpeGVkSGVpZ2h0OiA4MCxcbiAgICAgICAgICAgICAgICBoZWlnaHQ6IDgwLFxuICAgICAgICAgICAgICAgIHdpZHRoOiAnNDB2dycsXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgJzc2Nyc6IHtcbiAgICAgICAgICAgICAgICBmaXhlZFdpZHRoOiA4MCxcbiAgICAgICAgICAgICAgICBmaXhlZEhlaWdodDogODAsXG4gICAgICAgICAgICAgICAgaGVpZ2h0OiA4MCxcbiAgICAgICAgICAgICAgICB3aWR0aDogMzIwLFxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICc1NzUnOiB7XG4gICAgICAgICAgICAgICAgZml4ZWRXaWR0aDogODAsXG4gICAgICAgICAgICAgICAgZml4ZWRIZWlnaHQ6IDgwLFxuICAgICAgICAgICAgICAgIGhlaWdodDogODAsXG4gICAgICAgICAgICAgICAgd2lkdGg6IDMyMCxcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgIH0pLm1vdW50KCk7XG5cbiAgICB2YXIgcHJpbWFyeVNsaWRlciA9IG5ldyBTcGxpZGUoJyNwcmltYXJ5LXNsaWRlcicsIHtcbiAgICAgICAgdHlwZTogJ2ZhZGUnLFxuICAgICAgICAvLyBoZWlnaHRSYXRpbzogMSxcbiAgICAgICAgcGFnaW5hdGlvbjogZmFsc2UsXG4gICAgICAgIGFycm93czogZmFsc2UsXG4gICAgICAgIGNvdmVyOiB0cnVlLFxuICAgICAgICBsYXp5TG9hZDogJ3NlcXVlbnRpYWwnLFxuICAgICAgICByZXdpbmQ6IHRydWUsXG4gICAgICAgIGJyZWFrcG9pbnRzOiB7XG4gICAgICAgICAgICAnMjQwMCc6IHtcbiAgICAgICAgICAgICAgICBmaXhlZFdpZHRoOiAnMzB2dycsXG4gICAgICAgICAgICAgICAgZml4ZWRIZWlnaHQ6ICczMHZ3JyxcbiAgICAgICAgICAgICAgICB3aWR0aDogJzMwdncnLFxuICAgICAgICAgICAgICAgIGFycm93czogdHJ1ZSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAnMTE5OSc6IHtcbiAgICAgICAgICAgICAgICBmaXhlZFdpZHRoOiAnMzh2dycsXG4gICAgICAgICAgICAgICAgZml4ZWRIZWlnaHQ6ICczOHZ3JyxcbiAgICAgICAgICAgICAgICB3aWR0aDogJzM4dncnLFxuICAgICAgICAgICAgICAgIGFycm93czogdHJ1ZSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAnOTkxJzoge1xuICAgICAgICAgICAgICAgIGZpeGVkV2lkdGg6ICc0MHZ3JyxcbiAgICAgICAgICAgICAgICBmaXhlZEhlaWdodDogJzQwdncnLFxuICAgICAgICAgICAgICAgIHdpZHRoOiAnNDB2dycsXG4gICAgICAgICAgICAgICAgYXJyb3dzOiBmYWxzZSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAnNzY3Jzoge1xuICAgICAgICAgICAgICAgIGZpeGVkV2lkdGg6IDMyMCxcbiAgICAgICAgICAgICAgICBmaXhlZEhlaWdodDogMzIwLFxuICAgICAgICAgICAgICAgIHdpZHRoOiAzMjAsXG4gICAgICAgICAgICAgICAgYXJyb3dzOiBmYWxzZSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAnNTc1Jzoge1xuICAgICAgICAgICAgICAgIGZpeGVkV2lkdGg6IDMyMCxcbiAgICAgICAgICAgICAgICBmaXhlZEhlaWdodDogMzIwLFxuICAgICAgICAgICAgICAgIHdpZHRoOiAzMjAsXG4gICAgICAgICAgICAgICAgYXJyb3dzOiBmYWxzZSxcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgIH0pOyAvLyBkbyBub3QgY2FsbCBtb3VudCgpIGhlcmUuXG4gICAgcHJpbWFyeVNsaWRlci5zeW5jKHNlY29uZGFyeVNsaWRlcikubW91bnQoKTtcbn0pOyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/sliderDetalle.js\n");

/***/ }),

/***/ 10:
/*!*********************************************!*\
  !*** multi ./resources/js/sliderDetalle.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\www\flamma\resources\js\sliderDetalle.js */"./resources/js/sliderDetalle.js");


/***/ })

/******/ });