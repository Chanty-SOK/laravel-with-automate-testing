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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/scripts/app/article/index.js":
/*!*******************************************************!*\
  !*** ./resources/assets/scripts/app/article/index.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ((function () {
  /**
   * popup modal
   */
  $('.btn-delete').on('click', function () {
    $('#delete-popup').modal('show');
    $('.confirm-delete').data('url', $(this).data('url'));
  });
  /**
   * confirm delete
   */

  $('.confirm-delete').on('click', function (e) {
    e.preventDefault();
    var url = $(this).data('url');
    $.ajax({
      url: url,
      type: 'DELETE',
      success: function success(data) {
        $(this).attr("data-dismiss", "modal");
        window.location.reload();
      },
      error: function error(data) {
        console.log(data.responseText);
      }
    });
  });
  /**
   * Summer note editor
   */

  $('.summernote').summernote({
    toolbar: [['cleaner', ['cleaner']], // The Button
    ['style', ['style']], ['font', ['bold', 'italic', 'underline', 'clear']], ['fontname', ['fontname']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], ['height', ['height']], ['table', ['table']], ['insert', ['media', 'link', 'hr', 'picture']], ['view', ['fullscreen', 'codeview']], ['help', ['help']]],
    cleaner: {
      action: 'both',
      // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
      newline: '<br>',
      // Summernote's default is to use '<p><br></p>'
      notStyle: 'position:absolute;top:0;left:0;right:0',
      // Position of Notification
      keepHtml: false,
      // Remove all Html formats
      keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>', '<i>', '<a>'],
      // If keepHtml is true, remove all tags except these
      keepClasses: false,
      // Remove Classes
      badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'],
      // Remove full tags with contents
      badAttributes: ['style', 'start'],
      // Remove attributes from remaining tags
      limitChars: false,
      // 0/false|# 0/false disables option
      limitDisplay: 'both',
      // text|html|both
      limitStop: false // true/false

    },
    height: 300,
    dialogsInBody: true,
    callbacks: {
      onImageUpload: function onImageUpload(files, editor, welEditable) {
        for (var i = files.length - 1; i >= 0; i--) {
          sendFile(files[i], this);
        }
      }
    }
  });

  function sendFile(file, editor, welEditable) {
    var form_data = new FormData();
    form_data.append('file', file);
    var url = APP_URL + "/admin/design/articles/storeImage";
    $.ajax({
      data: form_data,
      type: "POST",
      url: url,
      cache: false,
      contentType: false,
      processData: false,
      success: function success(url) {
        $('.summernote').summernote('editor.insertImage', url);
      }
    });
  }
  /**
   * Preview Image
   */


  $('#inputPhoto').on('change', function (e) {
    var input = this;
    var width = 370;
    var height = 240;
    var file;

    var _URL = window.URL || window.webkitURL;

    if (file = this.files[0]) {
      var img = new Image();

      img.onload = function () {
        if (this.width !== width && this.height !== height) {
          alert("Image must width ".concat(width, " height ").concat(height, " "));
        } else {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        }
      };

      img.src = _URL.createObjectURL(file);
    }
  });
})());

/***/ }),

/***/ 3:
/*!*************************************************************!*\
  !*** multi ./resources/assets/scripts/app/article/index.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/chanty/Desktop/StudyCourse/Laravel/base-project-beniten/resources/assets/scripts/app/article/index.js */"./resources/assets/scripts/app/article/index.js");


/***/ })

/******/ });