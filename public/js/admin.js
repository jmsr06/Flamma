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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin.js":
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var contenedor = document.querySelector('#contenedor1');\ndocument.querySelector('#boton-menu').addEventListener('click', function () {\n  contenedor.classList.toggle('active');\n});\n\nvar comprobarAncho = function comprobarAncho() {\n  if (window.innerWidth <= 768) {\n    contenedor.classList.remove('active');\n  } else {\n    contenedor.classList.add('active');\n  }\n};\n\nwindow.addEventListener('resize', comprobarAncho);\ndocument.addEventListener('load', comprobarAncho);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWRtaW4uanM/MDcyMiJdLCJuYW1lcyI6WyJjb250ZW5lZG9yIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiYWRkRXZlbnRMaXN0ZW5lciIsImNsYXNzTGlzdCIsInRvZ2dsZSIsImNvbXByb2JhckFuY2hvIiwid2luZG93IiwiaW5uZXJXaWR0aCIsInJlbW92ZSIsImFkZCJdLCJtYXBwaW5ncyI6IkFBQUEsSUFBTUEsVUFBVSxHQUFHQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsY0FBdkIsQ0FBbkI7QUFFQUQsUUFBUSxDQUFDQyxhQUFULENBQXVCLGFBQXZCLEVBQXNDQyxnQkFBdEMsQ0FBdUQsT0FBdkQsRUFBZ0UsWUFBTTtBQUNsRUgsWUFBVSxDQUFDSSxTQUFYLENBQXFCQyxNQUFyQixDQUE0QixRQUE1QjtBQUNILENBRkQ7O0FBSUEsSUFBTUMsY0FBYyxHQUFHLFNBQWpCQSxjQUFpQixHQUFNO0FBQ3pCLE1BQUlDLE1BQU0sQ0FBQ0MsVUFBUCxJQUFxQixHQUF6QixFQUE4QjtBQUMxQlIsY0FBVSxDQUFDSSxTQUFYLENBQXFCSyxNQUFyQixDQUE0QixRQUE1QjtBQUNILEdBRkQsTUFFTztBQUNIVCxjQUFVLENBQUNJLFNBQVgsQ0FBcUJNLEdBQXJCLENBQXlCLFFBQXpCO0FBQ0g7QUFDSixDQU5EOztBQU9BSCxNQUFNLENBQUNKLGdCQUFQLENBQXdCLFFBQXhCLEVBQWtDRyxjQUFsQztBQUNBTCxRQUFRLENBQUNFLGdCQUFULENBQTBCLE1BQTFCLEVBQWtDRyxjQUFsQyIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9hZG1pbi5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0IGNvbnRlbmVkb3IgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjY29udGVuZWRvcjEnKTtcclxuXHJcbmRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNib3Rvbi1tZW51JykuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiB7XHJcbiAgICBjb250ZW5lZG9yLmNsYXNzTGlzdC50b2dnbGUoJ2FjdGl2ZScpO1xyXG59KTtcclxuXHJcbmNvbnN0IGNvbXByb2JhckFuY2hvID0gKCkgPT4ge1xyXG4gICAgaWYgKHdpbmRvdy5pbm5lcldpZHRoIDw9IDc2OCkge1xyXG4gICAgICAgIGNvbnRlbmVkb3IuY2xhc3NMaXN0LnJlbW92ZSgnYWN0aXZlJyk7XHJcbiAgICB9IGVsc2Uge1xyXG4gICAgICAgIGNvbnRlbmVkb3IuY2xhc3NMaXN0LmFkZCgnYWN0aXZlJyk7XHJcbiAgICB9XHJcbn1cclxud2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ3Jlc2l6ZScsIGNvbXByb2JhckFuY2hvKTtcclxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignbG9hZCcsIGNvbXByb2JhckFuY2hvKTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/admin.js\n");

/***/ }),

/***/ 1:
/*!*************************************!*\
  !*** multi ./resources/js/admin.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\www\flamma\resources\js\admin.js */"./resources/js/admin.js");


/***/ })

/******/ });