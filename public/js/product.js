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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/scripts/app/product/index.js":
/*!*******************************************************!*\
  !*** ./resources/assets/scripts/app/product/index.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ((function () {
  /**
   * product description
   */
  $('#description').summernote({
    toolbar: [// [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']], ['font', ['strikethrough', 'superscript', 'subscript']], ['fontsize', ['fontsize']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], ['height', ['height']]],
    tabsize: 2,
    height: 400
  });
  /**
   * select categories
   */

  $(document).ready(function () {
    $('#categoriesSelect').select2({
      placeholder: "Select categories",
      tags: true,
      multiple: true,
      tokenSeparators: [',']
    });
  });
  /**
   * select brand
   */

  $(document).ready(function () {
    $('#brandSelect').select2({
      placeholder: "Select a brand"
    });
  });
  /**
   * popup delete confirmation modal
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
    console.log(url);
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
   * category modal
   */

  $('#addNewCategoryModal').on('show.bs.modal', function () {
    $.each($('input', '#addNewCategoryForm'), function () {
      $("#addNewCategoryForm [name*='" + $(this).attr('name') + "']").removeClass('is-invalid');
    });
  });
  /**
   * Brand modal
   */

  $('#addNewBrandModal').on('show.bs.modal', function () {
    $.each($('input', '#addNewBrandForm'), function () {
      $("#addNewBrandForm [name*='" + $(this).attr('name') + "']").removeClass('is-invalid');
    });
  });
  /**
   * Add new category
   */

  $("#addNewCategoryForm").submit(function (e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function success(data) {
        window.location.reload();
      },
      error: function error(data) {
        $.each($('input', '#addNewCategoryForm'), function (k) {
          $("#addNewCategoryForm [name*='" + $(this).attr('name') + "']").removeClass('is-invalid');
        });
        var response = $.parseJSON(data.responseText);

        if (response.errors) {
          $.each(response.errors, function (i, item) {
            $("#addNewCategoryForm [name*='" + i + "']").addClass('is-invalid');
            $('#addNewCategoryForm .error_' + i).html(item);
          });
        }
      }
    });
  });
  /**
   * Add new Brand
   */

  $("#addNewBrandForm").submit(function (e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function success(data) {
        window.location.reload();
      },
      error: function error(data) {
        $.each($('input', '#addNewBrandForm'), function (k) {
          $("#addNewBrandForm [name*='" + $(this).attr('name') + "']").removeClass('is-invalid');
        });
        var response = $.parseJSON(data.responseText);

        if (response.errors) {
          $.each(response.errors, function (i, item) {
            $("#addNewBrandForm [name*='" + i + "']").addClass('is-invalid');
            $('#addNewBrandForm .error_' + i).html(item);
          });
        }
      }
    });
  });
  /**
   * show images to edit form
   */

  (function () {
    var imgAdd = $('.imgAdd');
    var path = imgAdd.data('imagePath');
    var images = collect(imgAdd.data('images'));
    var imageCount = images.count();

    if (imageCount) {
      images.each(function (image, key) {
        if (key === 0) {
          $('.imagePreview').attr('src', path + image.image);
        } else {
          $('.imgAdd').closest(".row").find('.imgAdd').before('<div class="col-sm-3 imgUp"><img src="' + path + image.image + '" class="imagePreview"><label class="btn btn-primary btn-upload">Browse...<input type="file" name="images[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del" data-image-id="' + image.id + '"></i></div>');
        }
      });
    }
  })();
  /**
   * delete images: hidden field
   */


  $(document).on("click", "i.del", function () {
    $('.imgAdd').closest(".row").find('.imgAdd').after('<input type="hidden" id="imageDeletedHiddenField" name="images_deleted[]" value="' + $(this).data('imageId') + '">');
  });
  /**
   * preview image
   */

  $(document).on("change", ".uploadFile", function () {
    var uploadFile = $(this);
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

    if (/^image/.test(files[0].type)) {
      // only image file
      var reader = new FileReader(); // instance of the FileReader

      reader.readAsDataURL(files[0]); // read the local file

      reader.onloadend = function () {
        // set image
        uploadFile.closest(".imgUp").find('.imagePreview').attr('src', this.result);
      };
    }
  });
})());

/***/ }),

/***/ 7:
/*!*************************************************************!*\
  !*** multi ./resources/assets/scripts/app/product/index.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/chanty/Desktop/StudyCourse/Laravel/base-project-beniten/resources/assets/scripts/app/product/index.js */"./resources/assets/scripts/app/product/index.js");


/***/ })

/******/ });