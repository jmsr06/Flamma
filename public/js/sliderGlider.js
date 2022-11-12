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
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/sliderGlider.js":
/*!**************************************!*\
  !*** ./resources/js/sliderGlider.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("window.addEventListener('load', function () {\n  new Glider(document.querySelector('.carousel__lista'), {\n    slidesToShow: 2,\n    slidesToScroll: 2,\n    draggable: true,\n    rewind: true,\n    duration: 0.25,\n    dots: '.carousel__indicadores',\n    arrows: {\n      prev: '.carousel__anterior',\n      next: '.carousel__siguiente'\n    },\n    responsive: [{\n      // screens greater than >= 320px\n      breakpoint: 319,\n      settings: {\n        // Set to `auto` and provide item width to adjust to viewport\n        draggable: true,\n        slidesToShow: 1.3,\n        slidesToScroll: 1\n      }\n    }, {\n      // screens greater than >= 576px\n      breakpoint: 576,\n      settings: {\n        draggable: true,\n        slidesToShow: 3,\n        slidesToScroll: 3\n      }\n    }, {\n      // screens greater than >= 992px\n      breakpoint: 992,\n      settings: {\n        draggable: true,\n        slidesToShow: 3.5,\n        slidesToScroll: 3\n      }\n    }, {\n      // screens greater than >= 992px\n      breakpoint: 1200,\n      settings: {\n        draggable: true,\n        slidesToShow: 5,\n        slidesToScroll: 5\n      }\n    }]\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc2xpZGVyR2xpZGVyLmpzP2RlMmUiXSwibmFtZXMiOlsid2luZG93IiwiYWRkRXZlbnRMaXN0ZW5lciIsIkdsaWRlciIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsInNsaWRlc1RvU2hvdyIsInNsaWRlc1RvU2Nyb2xsIiwiZHJhZ2dhYmxlIiwicmV3aW5kIiwiZHVyYXRpb24iLCJkb3RzIiwiYXJyb3dzIiwicHJldiIsIm5leHQiLCJyZXNwb25zaXZlIiwiYnJlYWtwb2ludCIsInNldHRpbmdzIl0sIm1hcHBpbmdzIjoiQUFBQUEsTUFBTSxDQUFDQyxnQkFBUCxDQUF3QixNQUF4QixFQUFnQyxZQUFXO0FBQ3ZDLE1BQUlDLE1BQUosQ0FBV0MsUUFBUSxDQUFDQyxhQUFULENBQXVCLGtCQUF2QixDQUFYLEVBQXVEO0FBQ25EQyxnQkFBWSxFQUFFLENBRHFDO0FBRW5EQyxrQkFBYyxFQUFFLENBRm1DO0FBR25EQyxhQUFTLEVBQUUsSUFId0M7QUFJbkRDLFVBQU0sRUFBRSxJQUoyQztBQUtuREMsWUFBUSxFQUFFLElBTHlDO0FBTW5EQyxRQUFJLEVBQUUsd0JBTjZDO0FBT25EQyxVQUFNLEVBQUU7QUFDSkMsVUFBSSxFQUFFLHFCQURGO0FBRUpDLFVBQUksRUFBRTtBQUZGLEtBUDJDO0FBV25EQyxjQUFVLEVBQUUsQ0FBQztBQUNMO0FBQ0FDLGdCQUFVLEVBQUUsR0FGUDtBQUdMQyxjQUFRLEVBQUU7QUFDTjtBQUNBVCxpQkFBUyxFQUFFLElBRkw7QUFHTkYsb0JBQVksRUFBRSxHQUhSO0FBSU5DLHNCQUFjLEVBQUU7QUFKVjtBQUhMLEtBQUQsRUFVUjtBQUNJO0FBQ0FTLGdCQUFVLEVBQUUsR0FGaEI7QUFHSUMsY0FBUSxFQUFFO0FBQ05ULGlCQUFTLEVBQUUsSUFETDtBQUVORixvQkFBWSxFQUFFLENBRlI7QUFHTkMsc0JBQWMsRUFBRTtBQUhWO0FBSGQsS0FWUSxFQW1CUjtBQUNJO0FBQ0FTLGdCQUFVLEVBQUUsR0FGaEI7QUFHSUMsY0FBUSxFQUFFO0FBQ05ULGlCQUFTLEVBQUUsSUFETDtBQUVORixvQkFBWSxFQUFFLEdBRlI7QUFHTkMsc0JBQWMsRUFBRTtBQUhWO0FBSGQsS0FuQlEsRUE0QlI7QUFDSTtBQUNBUyxnQkFBVSxFQUFFLElBRmhCO0FBR0lDLGNBQVEsRUFBRTtBQUNOVCxpQkFBUyxFQUFFLElBREw7QUFFTkYsb0JBQVksRUFBRSxDQUZSO0FBR05DLHNCQUFjLEVBQUU7QUFIVjtBQUhkLEtBNUJRO0FBWHVDLEdBQXZEO0FBa0RILENBbkREIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3NsaWRlckdsaWRlci5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIndpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdsb2FkJywgZnVuY3Rpb24oKSB7XG4gICAgbmV3IEdsaWRlcihkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuY2Fyb3VzZWxfX2xpc3RhJyksIHtcbiAgICAgICAgc2xpZGVzVG9TaG93OiAyLFxuICAgICAgICBzbGlkZXNUb1Njcm9sbDogMixcbiAgICAgICAgZHJhZ2dhYmxlOiB0cnVlLFxuICAgICAgICByZXdpbmQ6IHRydWUsXG4gICAgICAgIGR1cmF0aW9uOiAwLjI1LFxuICAgICAgICBkb3RzOiAnLmNhcm91c2VsX19pbmRpY2Fkb3JlcycsXG4gICAgICAgIGFycm93czoge1xuICAgICAgICAgICAgcHJldjogJy5jYXJvdXNlbF9fYW50ZXJpb3InLFxuICAgICAgICAgICAgbmV4dDogJy5jYXJvdXNlbF9fc2lndWllbnRlJ1xuICAgICAgICB9LFxuICAgICAgICByZXNwb25zaXZlOiBbe1xuICAgICAgICAgICAgICAgIC8vIHNjcmVlbnMgZ3JlYXRlciB0aGFuID49IDMyMHB4XG4gICAgICAgICAgICAgICAgYnJlYWtwb2ludDogMzE5LFxuICAgICAgICAgICAgICAgIHNldHRpbmdzOiB7XG4gICAgICAgICAgICAgICAgICAgIC8vIFNldCB0byBgYXV0b2AgYW5kIHByb3ZpZGUgaXRlbSB3aWR0aCB0byBhZGp1c3QgdG8gdmlld3BvcnRcbiAgICAgICAgICAgICAgICAgICAgZHJhZ2dhYmxlOiB0cnVlLFxuICAgICAgICAgICAgICAgICAgICBzbGlkZXNUb1Nob3c6IDEuMyxcbiAgICAgICAgICAgICAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDFcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAge1xuICAgICAgICAgICAgICAgIC8vIHNjcmVlbnMgZ3JlYXRlciB0aGFuID49IDU3NnB4XG4gICAgICAgICAgICAgICAgYnJlYWtwb2ludDogNTc2LFxuICAgICAgICAgICAgICAgIHNldHRpbmdzOiB7XG4gICAgICAgICAgICAgICAgICAgIGRyYWdnYWJsZTogdHJ1ZSxcbiAgICAgICAgICAgICAgICAgICAgc2xpZGVzVG9TaG93OiAzLFxuICAgICAgICAgICAgICAgICAgICBzbGlkZXNUb1Njcm9sbDogM1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICB7XG4gICAgICAgICAgICAgICAgLy8gc2NyZWVucyBncmVhdGVyIHRoYW4gPj0gOTkycHhcbiAgICAgICAgICAgICAgICBicmVha3BvaW50OiA5OTIsXG4gICAgICAgICAgICAgICAgc2V0dGluZ3M6IHtcbiAgICAgICAgICAgICAgICAgICAgZHJhZ2dhYmxlOiB0cnVlLFxuICAgICAgICAgICAgICAgICAgICBzbGlkZXNUb1Nob3c6IDMuNSxcbiAgICAgICAgICAgICAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDNcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAge1xuICAgICAgICAgICAgICAgIC8vIHNjcmVlbnMgZ3JlYXRlciB0aGFuID49IDk5MnB4XG4gICAgICAgICAgICAgICAgYnJlYWtwb2ludDogMTIwMCxcbiAgICAgICAgICAgICAgICBzZXR0aW5nczoge1xuICAgICAgICAgICAgICAgICAgICBkcmFnZ2FibGU6IHRydWUsXG4gICAgICAgICAgICAgICAgICAgIHNsaWRlc1RvU2hvdzogNSxcbiAgICAgICAgICAgICAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDVcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgIF1cbiAgICB9KTtcbn0pOyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/sliderGlider.js\n");

/***/ }),

/***/ 11:
/*!********************************************!*\
  !*** multi ./resources/js/sliderGlider.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\www\flamma\resources\js\sliderGlider.js */"./resources/js/sliderGlider.js");


/***/ })

/******/ });