/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/LiveSearch.js"
/*!***********************************!*\
  !*** ./src/modules/LiveSearch.js ***!
  \***********************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ LiveSearch)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class LiveSearch {
  constructor() {
    this.searchWrapper = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#searchWrapper');
    this.searchResults = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#liveSearch');
    this.searchField = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#s');
    this.prevSearchQuery = '';
    this.timer;
    this.spinnerVisible = false;
    this.searchField.on('input', this.inputChanged.bind(this));
    this.searchField.on('focus', this.searchFieldFocused.bind(this));
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).on('click', this.documentClick.bind(this));
  }
  inputChanged() {
    if (this.searchField.val() !== this.prevSearchQuery) {
      this.prevSearchQuery = this.searchField.val();
      if (this.prevSearchQuery === '') this.searchResultsInvisible();else {
        clearTimeout(this.timer);
        if (!this.spinnerVisible) {
          this.searchResults.html('<div class="loading-icon"></div>');
          this.spinnerVisible = true;
        }
        this.searchResultsVisible();
        this.timer = setTimeout(this.displaySearchResults.bind(this), 800);
      }
    }
  }
  displaySearchResults() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default().getJSON(`${siteData.domain}/wp-json/custom/v1/combined?search=${this.searchField.val()}`, data => {
      if (data.length) {
        this.searchResults.html(`
          ${data.map(item => `<li>
              <a href="${item.link}">
                ${item.title}${item.type === 'post' ? ` by <span>${item.author}</span>` : ''}
              </a>
            </li>
            `).join('')}
        `);
      } else this.searchResults.html(`<li id="noResults">No results found.</li>`);
    });
    this.spinnerVisible = false;
  }
  searchFieldFocused() {
    if (this.prevSearchQuery !== '') this.searchResultsVisible();
  }
  documentClick(e) {
    if (!jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).closest(this.searchWrapper).length) {
      this.searchResultsInvisible();
    }
  }
  searchResultsVisible() {
    this.searchResults.removeClass('invisible');
  }
  searchResultsInvisible() {
    this.searchResults.addClass('invisible');
  }
}

/***/ },

/***/ "jquery"
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
(module) {

module.exports = window["jQuery"];

/***/ }

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		if (!(moduleId in __webpack_modules__)) {
/******/ 			delete __webpack_module_cache__[moduleId];
/******/ 			var e = new Error("Cannot find module '" + moduleId + "'");
/******/ 			e.code = 'MODULE_NOT_FOUND';
/******/ 			throw e;
/******/ 		}
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_LiveSearch__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/LiveSearch */ "./src/modules/LiveSearch.js");

new _modules_LiveSearch__WEBPACK_IMPORTED_MODULE_0__["default"]();
})();

/******/ })()
;
//# sourceMappingURL=index.js.map