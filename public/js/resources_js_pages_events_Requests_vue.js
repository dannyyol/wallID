"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_events_Requests_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/Requests.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/Requests.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************/
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'EventRequest',
  data: function data() {
    return {
      events: [],
      pagination: {},
      invitations: [],
      form: new Form({
        event_id: '',
        username: ''
      })
    };
  },
  computed: {
    url: function url() {
      return 'event-info';
    }
  },
  methods: {
    getRequests: function getRequests() {
      var _this = this;

      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
      this.$spinner.show();
      axios.get("/api/events/".concat(this.form.event_id, "/requests?page=").concat(page)).then(function (response) {
        console.log('Data', response);

        _this.$notify({
          type: response.data.status ? 'success' : 'warn',
          text: response.data.message
        });

        _this.prepPagination(response.data);

        _this.invitations = response.data.data;
      })["catch"](function (e) {
        _this.$notify({
          type: 'error',
          text: e.message
        });
      })["finally"](function () {
        _this.$spinner.hide();
      });
    },
    prepPagination: function prepPagination(data) {
      this.pagination = {
        data: data.data,
        current_page: data.meta.current_page,
        first_item: data.meta.first_item,
        last_item: data.meta.last_item,
        last_page: data.meta.last_page,
        next_page_url: data.meta.next_page_url,
        per_page: data.meta.per_page,
        previous_page_url: data.meta.previous_page_url,
        total: data.meta.total
      };
    },
    loadAllEvents: function loadAllEvents() {
      var _this2 = this;

      this.$spinner.show();
      axios.get('/api/events/all').then(function (response) {
        _this2.events = response.data.data;

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
    this.loadAllEvents();
  }
});

/***/ }),

/***/ "./resources/js/pages/events/Requests.vue":
/*!************************************************!*\
  !*** ./resources/js/pages/events/Requests.vue ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Requests_vue_vue_type_template_id_367ac4c1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Requests.vue?vue&type=template&id=367ac4c1& */ "./resources/js/pages/events/Requests.vue?vue&type=template&id=367ac4c1&");
/* harmony import */ var _Requests_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Requests.vue?vue&type=script&lang=js& */ "./resources/js/pages/events/Requests.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Requests_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Requests_vue_vue_type_template_id_367ac4c1___WEBPACK_IMPORTED_MODULE_0__.render,
  _Requests_vue_vue_type_template_id_367ac4c1___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/events/Requests.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/events/Requests.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/pages/events/Requests.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Requests_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Requests.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/Requests.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Requests_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/events/Requests.vue?vue&type=template&id=367ac4c1&":
/*!*******************************************************************************!*\
  !*** ./resources/js/pages/events/Requests.vue?vue&type=template&id=367ac4c1& ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Requests_vue_vue_type_template_id_367ac4c1___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Requests_vue_vue_type_template_id_367ac4c1___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Requests_vue_vue_type_template_id_367ac4c1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Requests.vue?vue&type=template&id=367ac4c1& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/Requests.vue?vue&type=template&id=367ac4c1&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/Requests.vue?vue&type=template&id=367ac4c1&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/Requests.vue?vue&type=template&id=367ac4c1& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
        _c("p", { staticClass: "card-title" }, [_vm._v("Request Status")]),
        _vm._v(" "),
        _c(
          "form",
          {
            on: {
              submit: function($event) {
                $event.preventDefault()
                return _vm.getRequests()
              },
              keydown: function($event) {
                return _vm.form.onKeydown($event)
              }
            }
          },
          [
            _c("div", { staticClass: "row mb-4" }, [
              _c("div", { staticClass: "col-md-10" }, [
                _c(
                  "select",
                  {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.event_id,
                        expression: "form.event_id"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { required: "" },
                    on: {
                      change: function($event) {
                        var $$selectedVal = Array.prototype.filter
                          .call($event.target.options, function(o) {
                            return o.selected
                          })
                          .map(function(o) {
                            var val = "_value" in o ? o._value : o.value
                            return val
                          })
                        _vm.$set(
                          _vm.form,
                          "event_id",
                          $event.target.multiple
                            ? $$selectedVal
                            : $$selectedVal[0]
                        )
                      }
                    }
                  },
                  [
                    _c("option", { attrs: { value: "" } }, [
                      _vm._v("Select Event")
                    ]),
                    _vm._v(" "),
                    _vm._l(_vm.events, function(event) {
                      return _c(
                        "option",
                        { key: event.id, domProps: { value: event.unique_id } },
                        [
                          _vm._v(
                            "\n\t\t\t\t\t\t\t\t" +
                              _vm._s(event.name) +
                              "\n\t\t\t\t\t\t\t"
                          )
                        ]
                      )
                    })
                  ],
                  2
                )
              ]),
              _vm._v(" "),
              _vm._m(0)
            ])
          ]
        )
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "card" }, [
      _c(
        "div",
        { staticClass: "card-body" },
        [
          _c("h4", { staticClass: "card-title" }, [_vm._v("Event Requests")]),
          _vm._v(" "),
          _c("div", { staticClass: "table-responsive" }, [
            _c(
              "table",
              { staticClass: "table table-striped table-borderless" },
              [
                _vm._m(1),
                _vm._v(" "),
                _c(
                  "tbody",
                  [
                    _vm.invitations.length == 0
                      ? _c("tr", [_vm._m(2)])
                      : _vm._e(),
                    _vm._v(" "),
                    _vm._l(_vm.invitations, function(row, index) {
                      return _c("tr", { key: row.id }, [
                        _c("td", [
                          _vm._v(
                            "\n\t\t\t\t\t\t\t\t" +
                              _vm._s(index + 1) +
                              "\n\t\t\t\t\t\t\t"
                          )
                        ]),
                        _vm._v(" "),
                        _c("td", [
                          _vm._v(
                            "\n\t\t\t\t\t\t\t\t" +
                              _vm._s(row.event.name) +
                              "\n\t\t\t\t\t\t\t"
                          )
                        ]),
                        _vm._v(" "),
                        row.user.type == "individual"
                          ? _c("td", [
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t" +
                                  _vm._s(
                                    row.user.details.firstname +
                                      " " +
                                      row.user.details.lastname
                                  ) +
                                  "\n\t\t\t\t\t\t\t"
                              )
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        row.user.type == "organization"
                          ? _c("td", [
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t" +
                                  _vm._s(row.user.details.name) +
                                  "\n\t\t\t\t\t\t\t"
                              )
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _c("td", [
                          _vm._v(
                            "\n\t\t\t\t\t\t\t\t" +
                              _vm._s(row.user.email) +
                              "\n\t\t\t\t\t\t\t"
                          )
                        ]),
                        _vm._v(" "),
                        _c("td", [
                          row.status == "pending"
                            ? _c(
                                "span",
                                {
                                  staticClass: "p-2 bg-info rounded text-white"
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
                                    "p-2 bg-sucess rounded text-white"
                                },
                                [
                                  _vm._v(
                                    "\n\t\t\t\t\t\t\t\t\tAccepted\n\t\t\t\t\t\t\t\t"
                                  )
                                ]
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          row.status == "declined"
                            ? _c(
                                "span",
                                {
                                  staticClass:
                                    "p-2 bg-warning rounded text-white"
                                },
                                [
                                  _vm._v(
                                    "\n\t\t\t\t\t\t\t\t\tDeclined\n\t\t\t\t\t\t\t\t"
                                  )
                                ]
                              )
                            : _vm._e()
                        ]),
                        _vm._v(" "),
                        _c("td")
                      ])
                    })
                  ],
                  2
                )
              ]
            )
          ]),
          _vm._v(" "),
          _c("pagination", {
            attrs: { data: _vm.pagination, page: "1" },
            on: { "pagination-change-page": _vm.getRequests }
          })
        ],
        1
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-2" }, [
      _c("button", { staticClass: "btn btn-primary px-5" }, [_vm._v("Fetch")])
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
        _c("th", [_vm._v("Event Title")]),
        _vm._v(" "),
        _c("th", [_vm._v("Invitee Name")]),
        _vm._v(" "),
        _c("th", [_vm._v("Invitee Email")]),
        _vm._v(" "),
        _c("th", [_vm._v("Invitation Status")])
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