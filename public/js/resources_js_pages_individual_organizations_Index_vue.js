"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_individual_organizations_Index_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/organizations/Index.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/organizations/Index.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************************************/
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
  name: 'UserOrganizations',
  data: function data() {
    return {
      form: new Form({
        name: ''
      }),
      organizations: [],
      status: null,
      baseUrl: '/api/individuals/organizations'
    };
  },
  watch: {
    $route: function $route(to, from) {
      if (to.params.status != this.status) {
        this.status = to.params.status;
        this.loadOrganizations();
      }
    }
  },
  methods: {
    loadOrganizations: function loadOrganizations() {
      var _this = this;

      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
      this.$spinner.show();
      var url = this.status ? this.baseUrl + '/' + this.status : this.baseUrl;
      axios.get(url + '?page=' + page).then(function (response) {
        console.log(response);
        _this.organizations = response.data.data;
      })["catch"](function (e) {
        _this.$notify({
          type: 'error',
          text: e.message
        });
      })["finally"](function () {
        _this.$spinner.hide();
      });
    },
    checkOrg: function checkOrg() {
      var _this2 = this;

      this.$spinner.show();
      this.form.post('/api/individuals/organizations').then(function (response) {
        _this2.$notify({
          type: response.data.status ? 'success' : 'warn',
          text: response.data.message
        });
      })["catch"](function (e) {
        _this2.$notify({
          type: 'error',
          text: e.message
        });
      })["finally"](function () {
        _this2.$spinner.hide();
      });
    }
  },
  mounted: function mounted() {
    this.loadOrganizations();
  }
});

/***/ }),

/***/ "./resources/js/pages/individual/organizations/Index.vue":
/*!***************************************************************!*\
  !*** ./resources/js/pages/individual/organizations/Index.vue ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Index_vue_vue_type_template_id_2f72fc36___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=2f72fc36& */ "./resources/js/pages/individual/organizations/Index.vue?vue&type=template&id=2f72fc36&");
/* harmony import */ var _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js& */ "./resources/js/pages/individual/organizations/Index.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Index_vue_vue_type_template_id_2f72fc36___WEBPACK_IMPORTED_MODULE_0__.render,
  _Index_vue_vue_type_template_id_2f72fc36___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/individual/organizations/Index.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/individual/organizations/Index.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/pages/individual/organizations/Index.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/organizations/Index.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/individual/organizations/Index.vue?vue&type=template&id=2f72fc36&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/pages/individual/organizations/Index.vue?vue&type=template&id=2f72fc36& ***!
  \**********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_2f72fc36___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_2f72fc36___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_2f72fc36___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Index.vue?vue&type=template&id=2f72fc36& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/organizations/Index.vue?vue&type=template&id=2f72fc36&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/organizations/Index.vue?vue&type=template&id=2f72fc36&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/organizations/Index.vue?vue&type=template&id=2f72fc36& ***!
  \*************************************************************************************************************************************************************************************************************************************/
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
      _c("div", { staticClass: "card-body" }, [
        _vm._m(0),
        _vm._v(" "),
        _c(
          "form",
          {
            staticClass: "form-row",
            on: {
              submit: function($event) {
                $event.preventDefault()
                return _vm.checkOrg.apply(null, arguments)
              },
              keydown: function($event) {
                return _vm.form.onKeydown($event)
              }
            }
          },
          [
            _c("div", { staticClass: "col-md-8" }, [
              _c("label", [_vm._v("Name")]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.name,
                    expression: "form.name"
                  }
                ],
                staticClass: "form-control",
                attrs: {
                  type: "text",
                  required: "",
                  placeholder: "Organization Name"
                },
                domProps: { value: _vm.form.name },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "name", $event.target.value)
                  }
                }
              })
            ]),
            _vm._v(" "),
            _vm._m(1)
          ]
        )
      ])
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "card border-0",
        staticStyle: { "border-radius": "16px" }
      },
      [
        _c("div", { staticClass: "card-body" }, [
          _c("p", { staticClass: "card-title font-weight-bold" }, [
            _vm._v("My Organizations")
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "table-responsive" }, [
            _c(
              "table",
              { staticClass: "table table-striped table-borderless" },
              [
                _vm._m(2),
                _vm._v(" "),
                _c(
                  "tbody",
                  [
                    _vm.organizations.length == 0
                      ? _c("tr", [_vm._m(3)])
                      : _vm._e(),
                    _vm._v(" "),
                    _vm._l(_vm.organizations, function(row, index) {
                      return _c("tr", { key: row.id }, [
                        _c("td", [_vm._v(_vm._s(index + 1))]),
                        _vm._v(" "),
                        _c("td", [_vm._v(_vm._s(row.organization.name))]),
                        _vm._v(" "),
                        _c("td", [_vm._v(_vm._s(row.organization.phone))]),
                        _vm._v(" "),
                        _c("td", [
                          _vm._v(
                            _vm._s(
                              _vm._f("moment")(
                                row.created_at,
                                "from",
                                "now",
                                true
                              )
                            ) + " ago"
                          )
                        ]),
                        _vm._v(" "),
                        _c("td", [
                          row.status == "pending"
                            ? _c(
                                "span",
                                {
                                  staticClass: "bg-warning py-1 px-2 text-white"
                                },
                                [
                                  _vm._v(
                                    "\n\t\t\t\t\t\t\t\t\tPending\n\t\t\t\t\t\t\t\t"
                                  )
                                ]
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          row.status == "approved"
                            ? _c(
                                "span",
                                {
                                  staticClass:
                                    "bg-success py-1 px-2 text-white",
                                  staticStyle: { "border-radius": "5px" }
                                },
                                [
                                  _vm._v(
                                    "\n\t\t\t\t\t\t\t\t\tApproved\n\t\t\t\t\t\t\t\t"
                                  )
                                ]
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          row.status == "suspended"
                            ? _c(
                                "span",
                                {
                                  staticClass: "bg-danger py-1 px-2 text-white"
                                },
                                [
                                  _vm._v(
                                    "\n\t\t\t\t\t\t\t\t\tSuspended\n\t\t\t\t\t\t\t\t"
                                  )
                                ]
                              )
                            : _vm._e()
                        ])
                      ])
                    })
                  ],
                  2
                )
              ]
            )
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
    return _c("p", { staticClass: "card-title" }, [
      _c("span", [_vm._v("Send Request")]),
      _c("br"),
      _vm._v(" "),
      _c("span", { staticClass: "text-muted small" }, [
        _vm._v(
          "\n\t\t\t\t\tSend a request to an Organization to become one its member\n\t\t\t\t"
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-4 d-flex align-items-end" }, [
      _c("button", { staticClass: "btn btn-primary" }, [_vm._v("Check")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("#")]),
        _vm._v(" "),
        _c("th", [_vm._v("Name")]),
        _vm._v(" "),
        _c("th", [_vm._v("Phone")]),
        _vm._v(" "),
        _c("th", [_vm._v("Date Joined")]),
        _vm._v(" "),
        _c("th", [_vm._v("Status")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("td", { attrs: { colspan: "5" } }, [
      _c("p", { staticClass: "text-center" }, [_vm._v("No Record Found")])
    ])
  }
]
render._withStripped = true



/***/ })

}]);