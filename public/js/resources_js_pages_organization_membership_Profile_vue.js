"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_organization_membership_Profile_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/organization/membership/Profile.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/organization/membership/Profile.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'MemberProfile',
  data: function data() {
    return {
      member: null
    };
  },
  methods: {
    getMember: function getMember(id) {
      var _this = this;

      this.$spinner.show();
      axios.get('/api/organizations/members/' + id).then(function (response) {
        console.log('member', response);
        _this.member = response.data.data;

        _this.$notify({
          type: response.data.status ? 'success' : 'warn',
          text: response.data.message
        });
      })["catch"](function (e) {
        _this.$notify({
          type: 'error',
          text: e.message
        });
      })["finally"](function () {
        _this.$spinner.hide();
      });
    },
    approve: function approve(id) {
      var _this2 = this;

      this.$confirm({
        message: 'Approve?',
        button: {
          no: 'No',
          yes: 'Yes'
        },
        callback: function callback(confirm) {
          if (confirm) {
            _this2.doApprove(id);
          }
        }
      });
    },
    doApprove: function doApprove(id) {
      var _this3 = this;

      this.$spinner.show();
      axios.get('/api/organizations/members/' + id + '/approve').then(function (response) {
        _this3.$notify({
          type: 'success',
          text: response.data.message
        });
      })["catch"](function (e) {
        _this3.$notify({
          type: 'success',
          text: e.message
        });
      })["finally"](function () {
        _this3.$spinner.hide();
      });
    }
  },
  mounted: function mounted() {
    this.getMember(this.$route.params.id);
  }
});

/***/ }),

/***/ "./resources/js/pages/organization/membership/Profile.vue":
/*!****************************************************************!*\
  !*** ./resources/js/pages/organization/membership/Profile.vue ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Profile_vue_vue_type_template_id_1a630853___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Profile.vue?vue&type=template&id=1a630853& */ "./resources/js/pages/organization/membership/Profile.vue?vue&type=template&id=1a630853&");
/* harmony import */ var _Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Profile.vue?vue&type=script&lang=js& */ "./resources/js/pages/organization/membership/Profile.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Profile_vue_vue_type_template_id_1a630853___WEBPACK_IMPORTED_MODULE_0__.render,
  _Profile_vue_vue_type_template_id_1a630853___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/organization/membership/Profile.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/organization/membership/Profile.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/pages/organization/membership/Profile.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Profile.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/organization/membership/Profile.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/organization/membership/Profile.vue?vue&type=template&id=1a630853&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/pages/organization/membership/Profile.vue?vue&type=template&id=1a630853& ***!
  \***********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_1a630853___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_1a630853___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_1a630853___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Profile.vue?vue&type=template&id=1a630853& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/organization/membership/Profile.vue?vue&type=template&id=1a630853&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/organization/membership/Profile.vue?vue&type=template&id=1a630853&":
/*!**************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/organization/membership/Profile.vue?vue&type=template&id=1a630853& ***!
  \**************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("div", { staticClass: "card mb-4" }, [
      _vm.member
        ? _c("div", { staticClass: "card-body" }, [
            _c("img", {
              staticStyle: { width: "50px", height: "50px" },
              attrs: { src: "/images/user.png" }
            }),
            _vm._v(" "),
            _c("span", { staticClass: "px-2" }, [
              _vm._v(
                _vm._s(
                  _vm.member.individual.firstname +
                    " " +
                    _vm.member.individual.lastname
                )
              )
            ])
          ])
        : _vm._e()
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "card" }, [
      _c("div", { staticClass: "card-body" }, [
        _vm.member
          ? _c("div", [
              _c("p", { staticClass: "mb-3" }, [
                _c("span", { staticClass: "small text-muted" }, [
                  _vm._v("Firstname")
                ]),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("span", { staticClass: "h4" }, [
                  _vm._v(_vm._s(_vm.member.individual.lastname))
                ])
              ]),
              _vm._v(" "),
              _c("p", { staticClass: "mb-3" }, [
                _c("span", { staticClass: "small text-muted" }, [
                  _vm._v("Lastname")
                ]),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("span", { staticClass: "h4" }, [
                  _vm._v(_vm._s(_vm.member.individual.lastname))
                ])
              ]),
              _vm._v(" "),
              _vm._m(0),
              _vm._v(" "),
              _c("p", { staticClass: "mb-3" }, [
                _c("span", { staticClass: "small text-muted" }, [
                  _vm._v("DOB")
                ]),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("span", { staticClass: "h4" }, [
                  _vm._v(
                    "\n\t\t\t\t\t\t" +
                      _vm._s(_vm.member.individual.dob) +
                      "\n\t\t\t\t\t"
                  )
                ])
              ]),
              _vm._v(" "),
              _c("p", [
                _c("span", { staticClass: "small text-muted" }, [
                  _vm._v("Bio")
                ]),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("span", { staticClass: "h4" }, [
                  _vm._v(
                    "\n\t\t\t\t\t\t" +
                      _vm._s(_vm.member.individual.bio) +
                      "\n\t\t\t\t\t"
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.member.status == "pending"
                ? _c("div", { staticClass: "py-3 text-right" }, [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-danger",
                        on: {
                          click: function($event) {
                            return _vm.approve(_vm.member.id)
                          }
                        }
                      },
                      [_vm._v("Approve")]
                    )
                  ])
                : _vm._e()
            ])
          : _vm._e()
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", { staticClass: "mb-3" }, [
      _c("span", { staticClass: "small text-muted" }, [_vm._v("Occupation")]),
      _vm._v(" "),
      _c("br"),
      _vm._v(" "),
      _c("span", { staticClass: "h4" }, [_vm._v("Teacher")])
    ])
  }
]
render._withStripped = true



/***/ })

}]);