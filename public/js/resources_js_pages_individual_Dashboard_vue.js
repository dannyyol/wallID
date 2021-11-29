"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_individual_Dashboard_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/Dashboard.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/Dashboard.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
  name: 'IndividualDashboard',
  data: function data() {
    return {
      user: null,
      dashdata: {
        totalOrgs: 0,
        totalEvents: 0,
        organizations: []
      }
    };
  },
  methods: {
    loadDashData: function loadDashData() {
      var _this = this;

      this.$spinner.show();
      axios.get('/api/individuals').then(function (response) {
        _this.dashdata = response.data.data;
      })["catch"](function (e) {
        _this.$notify({
          type: 'error',
          text: e.message
        });
      })["finally"](function () {
        _this.$spinner.hide();
      });
    }
  },
  mounted: function mounted() {
    this.user = this.$store.state.user;
    this.loadDashData();
  }
});

/***/ }),

/***/ "./resources/js/pages/individual/Dashboard.vue":
/*!*****************************************************!*\
  !*** ./resources/js/pages/individual/Dashboard.vue ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Dashboard_vue_vue_type_template_id_92484732___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Dashboard.vue?vue&type=template&id=92484732& */ "./resources/js/pages/individual/Dashboard.vue?vue&type=template&id=92484732&");
/* harmony import */ var _Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Dashboard.vue?vue&type=script&lang=js& */ "./resources/js/pages/individual/Dashboard.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Dashboard_vue_vue_type_template_id_92484732___WEBPACK_IMPORTED_MODULE_0__.render,
  _Dashboard_vue_vue_type_template_id_92484732___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/individual/Dashboard.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/individual/Dashboard.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/pages/individual/Dashboard.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Dashboard.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/Dashboard.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/individual/Dashboard.vue?vue&type=template&id=92484732&":
/*!************************************************************************************!*\
  !*** ./resources/js/pages/individual/Dashboard.vue?vue&type=template&id=92484732& ***!
  \************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_template_id_92484732___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_template_id_92484732___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_template_id_92484732___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Dashboard.vue?vue&type=template&id=92484732& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/Dashboard.vue?vue&type=template&id=92484732&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/Dashboard.vue?vue&type=template&id=92484732&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/individual/Dashboard.vue?vue&type=template&id=92484732& ***!
  \***************************************************************************************************************************************************************************************************************************/
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
    _c("h4", { staticClass: "h3 mb-4" }, [
      _vm._v("Welcome\n\t\t"),
      _vm.user && _vm.user.profile
        ? _c("span", { staticClass: "font-weight-bold" }, [
            _vm._v(
              "\n\t\t\t" +
                _vm._s(
                  _vm.user.profile.details.firstname +
                    " " +
                    _vm.user.profile.details.lastname
                ) +
                "\n\t\t"
            )
          ])
        : _vm._e()
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-9 mb-4" }, [
        _c("div", { staticClass: "row mb-4" }, [
          _c("div", { staticClass: "col-md-6 mb-4" }, [
            _c("div", { staticClass: "card" }, [
              _c("div", { staticClass: "card-body" }, [
                _c("p", [
                  _c("i", {
                    staticClass: "fas fa-users text-primary",
                    staticStyle: { "font-size": "30px" }
                  }),
                  _vm._v(" "),
                  _c(
                    "span",
                    { staticStyle: { float: "right", "font-weight": "bold" } },
                    [
                      _vm._v(
                        "\n\t\t\t\t\t\t\t\t\t" +
                          _vm._s(_vm.dashdata.totalOrgs) +
                          "\n\t\t\t\t\t\t\t\t"
                      )
                    ]
                  )
                ]),
                _vm._v(" "),
                _vm._m(0)
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-6" }, [
            _c("div", { staticClass: "card" }, [
              _c("div", { staticClass: "card-body" }, [
                _c("p", [
                  _c("i", {
                    staticClass: "fas fa-calendar text-primary",
                    staticStyle: { "font-size": "30px" }
                  }),
                  _vm._v(" "),
                  _c(
                    "span",
                    { staticStyle: { float: "right", "font-weight": "bold" } },
                    [
                      _vm._v(
                        "\n\t\t\t\t\t\t\t\t\t" +
                          _vm._s(_vm.dashdata.totalEvents) +
                          "\n\t\t\t\t\t\t\t\t"
                      )
                    ]
                  )
                ]),
                _vm._v(" "),
                _vm._m(1)
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body" }, [
            _c("p", { staticClass: "card-title" }, [
              _vm._v("Pending Approval")
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
                      _vm.dashdata.organizations.length == 0
                        ? _c("tr", [_vm._m(3)])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm._l(_vm.dashdata.organizations, function(row, index) {
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
                          _vm._m(4, true)
                        ])
                      })
                    ],
                    2
                  )
                ]
              )
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _vm._m(5)
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", [_c("span", [_vm._v("Organizations")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", [_c("span", [_vm._v("Events")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Organization Name")]),
        _vm._v(" "),
        _c("th", [_vm._v("Organization Email")]),
        _vm._v(" "),
        _c("th", [_vm._v("Approval Status")]),
        _vm._v(" "),
        _c("th", [_vm._v("Action")])
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
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("td", [
      _c("button", { staticClass: "btn btn-danger" }, [
        _vm._v("\n\t\t\t\t\t\t\t\t\t\t\tDelete\n\t\t\t\t\t\t\t\t\t\t")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-3" }, [
      _c("div", { staticClass: "card mb-4" }, [
        _c("div", { staticClass: "card-body" }, [
          _c("h4", { staticClass: "card-title" }, [_vm._v("Upcoming Event")]),
          _vm._v(" "),
          _c("p", [
            _c("span", { staticClass: "small text-muted" }, [_vm._v("Title")]),
            _vm._v(" "),
            _c("br"),
            _vm._v(" "),
            _c("span", [_vm._v("Tech Talk")])
          ]),
          _vm._v(" "),
          _c("p", [
            _c("span", { staticClass: "small text-muted" }, [_vm._v("Date")]),
            _vm._v(" "),
            _c("br"),
            _vm._v(" "),
            _c("span", [_vm._v("20/10/2021")])
          ]),
          _vm._v(" "),
          _c("p", [
            _c("span", { staticClass: "small text-muted" }, [
              _vm._v("Description")
            ]),
            _vm._v(" "),
            _c("br"),
            _vm._v(" "),
            _c("span", [
              _vm._v(
                "\n\t\t\t\t\t\t\tLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n\t\t\t\t\t\t\ttempor incididunt ut labore et dolore magna aliqua.\n\t\t\t\t\t\t"
              )
            ])
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ })

}]);