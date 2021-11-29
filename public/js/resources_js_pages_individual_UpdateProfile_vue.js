"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_individual_UpdateProfile_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/UpdateProfile.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/UpdateProfile.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************************/
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
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'UpdateProfile',
  data: function data() {
    return {
      user: null,
      form: new Form({
        firstname: '',
        lastname: '',
        dob: '',
        bio: '',
        email: '',
        phone: ''
      })
    };
  },
  methods: {
    update: function update() {
      var _this = this;

      this.form.patch('/api/individuals').then(function (response) {
        _this.$notify({
          type: response.data.status ? 'success' : 'warn',
          text: response.data.message
        });

        if (response.data.status) {}
      })["catch"](function (e) {
        _this.$notify({
          type: 'error',
          text: e.message
        });
      })["finally"](function () {
        _this.$spinner.hide();
      });
      console.log('Data', this.form);
    },
    populate: function populate() {
      if (this.user) {
        var _this$user$profile, _this$user$profile2, _this$user$profile3, _this$user$profile4, _this$user$profile5, _this$user$profile6;

        this.form.firstname = (_this$user$profile = this.user.profile) === null || _this$user$profile === void 0 ? void 0 : _this$user$profile.details.firstname;
        this.form.lastname = (_this$user$profile2 = this.user.profile) === null || _this$user$profile2 === void 0 ? void 0 : _this$user$profile2.details.lastname;
        this.form.dob = (_this$user$profile3 = this.user.profile) === null || _this$user$profile3 === void 0 ? void 0 : _this$user$profile3.details.dob;
        this.form.bio = (_this$user$profile4 = this.user.profile) === null || _this$user$profile4 === void 0 ? void 0 : _this$user$profile4.details.bio;
        this.form.email = (_this$user$profile5 = this.user.profile) === null || _this$user$profile5 === void 0 ? void 0 : _this$user$profile5.email;
        this.form.phone = (_this$user$profile6 = this.user.profile) === null || _this$user$profile6 === void 0 ? void 0 : _this$user$profile6.details.phone;
      }
    }
  },
  mounted: function mounted() {
    this.user = this.$store.state.user;
    this.populate();
  }
});

/***/ }),

/***/ "./resources/js/pages/individual/UpdateProfile.vue":
/*!*********************************************************!*\
  !*** ./resources/js/pages/individual/UpdateProfile.vue ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _UpdateProfile_vue_vue_type_template_id_03741af3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./UpdateProfile.vue?vue&type=template&id=03741af3& */ "./resources/js/pages/individual/UpdateProfile.vue?vue&type=template&id=03741af3&");
/* harmony import */ var _UpdateProfile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./UpdateProfile.vue?vue&type=script&lang=js& */ "./resources/js/pages/individual/UpdateProfile.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _UpdateProfile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _UpdateProfile_vue_vue_type_template_id_03741af3___WEBPACK_IMPORTED_MODULE_0__.render,
  _UpdateProfile_vue_vue_type_template_id_03741af3___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/individual/UpdateProfile.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/individual/UpdateProfile.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/pages/individual/UpdateProfile.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UpdateProfile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./UpdateProfile.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/UpdateProfile.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UpdateProfile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/individual/UpdateProfile.vue?vue&type=template&id=03741af3&":
/*!****************************************************************************************!*\
  !*** ./resources/js/pages/individual/UpdateProfile.vue?vue&type=template&id=03741af3& ***!
  \****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UpdateProfile_vue_vue_type_template_id_03741af3___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UpdateProfile_vue_vue_type_template_id_03741af3___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UpdateProfile_vue_vue_type_template_id_03741af3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./UpdateProfile.vue?vue&type=template&id=03741af3& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/UpdateProfile.vue?vue&type=template&id=03741af3&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/UpdateProfile.vue?vue&type=template&id=03741af3&":
/*!*******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/UpdateProfile.vue?vue&type=template&id=03741af3& ***!
  \*******************************************************************************************************************************************************************************************************************************/
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
    _c(
      "form",
      {
        on: {
          submit: function($event) {
            $event.preventDefault()
            return _vm.update.apply(null, arguments)
          },
          keydown: function($event) {
            return _vm.form.onKeydown($event)
          }
        }
      },
      [
        _c("div", { staticClass: "card mb-4" }, [
          _c("div", { staticClass: "card-body" }, [
            _c("p", { staticClass: "card-title" }, [_vm._v("Edit and Update")]),
            _vm._v(" "),
            _c("div", { staticClass: "row mb-4" }, [
              _c("div", { staticClass: "col-md-6" }, [
                _c("label", [_vm._v("Firstname")]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.firstname,
                      expression: "form.firstname"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { type: "text", placeholder: "Firstname" },
                  domProps: { value: _vm.form.firstname },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "firstname", $event.target.value)
                    }
                  }
                })
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-6" }, [
                _c("label", [_vm._v("Lastname")]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.lastname,
                      expression: "form.lastname"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { type: "text", placeholder: "Lastname" },
                  domProps: { value: _vm.form.lastname },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "lastname", $event.target.value)
                    }
                  }
                })
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-6" }, [
                _c("label", [_vm._v("Email")]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.email,
                      expression: "form.email"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { type: "email", disabled: "", placeholder: "Email" },
                  domProps: { value: _vm.form.email },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "email", $event.target.value)
                    }
                  }
                })
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-6" }, [
                _c("label", [_vm._v("Phone")]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.phone,
                      expression: "form.phone"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { type: "tel", disabled: "", placeholder: "Phone" },
                  domProps: { value: _vm.form.phone },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "phone", $event.target.value)
                    }
                  }
                })
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "form-group" }, [
              _c("label", [_vm._v("DOB")]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.dob,
                    expression: "form.dob"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "date", placeholder: "DOB" },
                domProps: { value: _vm.form.dob },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "dob", $event.target.value)
                  }
                }
              })
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group" }, [
              _c("label", [_vm._v("BIO")]),
              _vm._v(" "),
              _c("textarea", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.bio,
                    expression: "form.bio"
                  }
                ],
                staticClass: "form-control",
                attrs: { rows: "10", placeholder: "Bio" },
                domProps: { value: _vm.form.bio },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "bio", $event.target.value)
                  }
                }
              })
            ]),
            _vm._v(" "),
            _vm._m(0)
          ])
        ])
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "text-right" }, [
      _c("button", { staticClass: "btn btn-primary" }, [_vm._v("Update")])
    ])
  }
]
render._withStripped = true



/***/ })

}]);