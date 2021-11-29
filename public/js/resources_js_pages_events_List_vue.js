"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_events_List_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/List.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/List.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
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
  data: function data() {
    return {
      event: {},
      loading: true,
      events: [],
      pagination: {}
    };
  },
  methods: {
    loadEvents: function loadEvents() {
      var _this = this;

      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
      this.$spinner.show();
      axios.get('/api/events/mine?page=' + page).then(function (response) {
        _this.events = response.data.data;

        _this.prepPagination(response.data);
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
    confirmDelete: function confirmDelete(id) {
      var _this2 = this;

      this.$confirm({
        message: 'Are you sure you want to delete this Event?',
        button: {
          no: 'No',
          yes: 'Yes'
        },
        callback: function callback(confirm) {
          if (confirm) {
            _this2.doDelete(id);
          }
        }
      });
    },
    doDelete: function doDelete(id) {
      var _this3 = this;

      this.$spinner.show();
      axios["delete"]('/api/events/' + id).then(function (response) {
        _this3.events = _this3.events.filter(function (event) {
          return event.id != id;
        });

        _this3.$notify({
          type: 'success',
          text: response.data.message
        });
      })["catch"](function (e) {
        _this3.$notify({
          type: 'error',
          text: e.message
        });
      })["finally"](function () {
        _this3.$spinner.hide();
      });
    },
    confirmClose: function confirmClose(id) {
      var _this4 = this;

      Swal.fire({
        html: 'Are you sure you want to Close this Event?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes'
      }).then(function (result) {
        if (result.isConfirmed) {
          axios.get('/api/events/close/' + id).then(function (response) {
            for (var i = 0; i < _this4.events.length; i++) {
              var event = _this4.events[i];

              if (event.id == id) {
                event.status = 'closed';
                _this4.events[i] = event;
              }
            }

            swal(response.data.message);
          })["catch"](function (e) {
            swal(e.message, 'error');
          });
        }
      });
    },
    confirmShare: function confirmShare(event) {
      var _this5 = this;

      this.event = event;
      this.$confirm({
        message: 'Are you sure you want to share this Event?',
        button: {
          no: 'No',
          yes: 'Yes'
        },
        callback: function callback(confirm) {
          if (confirm) {
            _this5.$modal.show('share-modal');
          }
        }
      });
    },
    share: function share() {
      var _this6 = this;

      this.$modal.hide('share-modal');
      this.$spinner.show();
      axios.get('/api/events/' + this.event.id + '/share').then(function (response) {
        _this6.$notify({
          type: 'success',
          text: response.data.message
        });
      })["catch"](function (e) {
        _this6.$notify({
          type: 'error',
          text: e.message
        });
      })["finally"](function () {
        _this6.$spinner.hide();
      });
    }
  },
  mounted: function mounted() {
    this.loadEvents(1);
  }
});

/***/ }),

/***/ "./resources/js/pages/events/List.vue":
/*!********************************************!*\
  !*** ./resources/js/pages/events/List.vue ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _List_vue_vue_type_template_id_5bbbd9ca___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./List.vue?vue&type=template&id=5bbbd9ca& */ "./resources/js/pages/events/List.vue?vue&type=template&id=5bbbd9ca&");
/* harmony import */ var _List_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./List.vue?vue&type=script&lang=js& */ "./resources/js/pages/events/List.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _List_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _List_vue_vue_type_template_id_5bbbd9ca___WEBPACK_IMPORTED_MODULE_0__.render,
  _List_vue_vue_type_template_id_5bbbd9ca___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/events/List.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/events/List.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./resources/js/pages/events/List.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_List_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./List.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/List.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_List_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/events/List.vue?vue&type=template&id=5bbbd9ca&":
/*!***************************************************************************!*\
  !*** ./resources/js/pages/events/List.vue?vue&type=template&id=5bbbd9ca& ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_List_vue_vue_type_template_id_5bbbd9ca___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_List_vue_vue_type_template_id_5bbbd9ca___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_List_vue_vue_type_template_id_5bbbd9ca___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./List.vue?vue&type=template&id=5bbbd9ca& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/List.vue?vue&type=template&id=5bbbd9ca&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/List.vue?vue&type=template&id=5bbbd9ca&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/List.vue?vue&type=template&id=5bbbd9ca& ***!
  \******************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    [
      _c(
        "modal",
        { attrs: { name: "share-modal", adaptive: true, height: 400 } },
        [
          _c("div", { staticClass: "card h-100" }, [
            _c("div", { staticClass: "card-body" }, [
              _c("p", { staticClass: "card-title" }, [
                _vm._v("\n        \t\t\t\tEvent Details: \n        \t\t\t")
              ]),
              _vm._v(" "),
              _c("p", [
                _vm._v("\n        \t\t\t\tName: "),
                _c("b", [_vm._v(_vm._s(_vm.event.name))])
              ]),
              _vm._v(" "),
              _c("p", [
                _vm._v("\n        \t\t\t\tDate: "),
                _c("b", [_vm._v(_vm._s(_vm.event.event_date))])
              ]),
              _vm._v(" "),
              _c("p", [
                _vm._v("\n        \t\t\t\tDescription: "),
                _c("br"),
                _vm._v(
                  "\n        \t\t\t\t" +
                    _vm._s(_vm.event.description) +
                    "\n        \t\t\t"
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "card-footer text-right" }, [
              _vm.$auth.type != "individual"
                ? _c(
                    "button",
                    {
                      staticClass: "btn btn-primary px-3",
                      on: { click: _vm.share }
                    },
                    [_vm._v("Share with Member")]
                  )
                : _vm._e()
            ])
          ])
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "card border-0",
          staticStyle: { "border-radius": "16px" }
        },
        [
          _c(
            "div",
            { staticClass: "card-body" },
            [
              _vm._m(0),
              _c("div", { staticClass: "dropdown float-right" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-primary btn-sm dropdown-toggle",
                    attrs: {
                      type: "button",
                      id: "dropdownMenuButton",
                      "data-bs-toggle": "dropdown",
                      "aria-haspopup": "true",
                      "aria-expanded": "false"
                    }
                  },
                  [
                    _vm._v(
                      "\n                            Export\n                        "
                    )
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "dropdown-menu",
                    attrs: { "aria-labelledby": "dropdownMenuButton" }
                  },
                  [
                    _c(
                      "a",
                      {
                        staticClass: "dropdown-item",
                        attrs: { href: "/api/events/company-export-to-pdf" }
                      },
                      [_vm._v("PDF")]
                    ),
                    _vm._v(" "),
                    _c(
                      "a",
                      {
                        staticClass: "dropdown-item",
                        attrs: { href: "/api/events/export" }
                      },
                      [_vm._v("Excel")]
                    )
                  ]
                )
              ]),
              _vm._v(" "),
              _c("p"),
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
                        _vm.events.length == 0
                          ? _c("tr", [_vm._m(2)])
                          : _vm._e(),
                        _vm._v(" "),
                        _vm._l(_vm.events, function(row, index) {
                          return _c("tr", { key: row.id }, [
                            _c("td", [
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t\t" +
                                  _vm._s(row.unique_id) +
                                  "\n\t\t\t\t\t\t\t\t"
                              )
                            ]),
                            _vm._v(" "),
                            _c("td", [
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t\t" +
                                  _vm._s(row.name) +
                                  "\n\t\t\t\t\t\t\t\t"
                              )
                            ]),
                            _vm._v(" "),
                            _c("td", [
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t\t" +
                                  _vm._s(row.type) +
                                  "\n\t\t\t\t\t\t\t\t"
                              )
                            ]),
                            _vm._v(" "),
                            _c("td", [
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t\t" +
                                  _vm._s(row.tickets) +
                                  "\n\t\t\t\t\t\t\t\t"
                              )
                            ]),
                            _vm._v(" "),
                            _c("td", [
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t\t" +
                                  _vm._s(row.event_date) +
                                  "\n\t\t\t\t\t\t\t\t"
                              )
                            ]),
                            _vm._v(" "),
                            _c("td", [
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t\tN/A\n\t\t\t\t\t\t\t\t"
                              )
                            ]),
                            _vm._v(" "),
                            _c("td", [
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t\t" +
                                  _vm._s(row.status) +
                                  "\n\t\t\t\t\t\t\t\t"
                              )
                            ]),
                            _vm._v(" "),
                            _c(
                              "td",
                              [
                                _c(
                                  "router-link",
                                  {
                                    staticClass: "btn btn-info btn-sm",
                                    attrs: {
                                      to:
                                        _vm.$route.path +
                                        "/" +
                                        row.id +
                                        "/edit",
                                      type: "button"
                                    }
                                  },
                                  [
                                    _c("i", {
                                      staticClass: "fas fa-pencil-alt"
                                    })
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "a",
                                  {
                                    staticClass: "btn btn-sm btn-success",
                                    on: {
                                      click: function($event) {
                                        return _vm.confirmShare(row)
                                      }
                                    }
                                  },
                                  [_c("i", { staticClass: "fas fa-share" })]
                                ),
                                _vm._v(" "),
                                _c(
                                  "router-link",
                                  {
                                    staticClass: "btn btn-primary btn-sm",
                                    attrs: {
                                      to: _vm.$route.path + "/" + row.id,
                                      title: "Details"
                                    }
                                  },
                                  [
                                    _c("i", {
                                      staticClass: "fas fa-file",
                                      attrs: { "aria-hidden": "true" }
                                    })
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "button",
                                  {
                                    staticClass: "btn btn-danger btn-sm",
                                    on: {
                                      click: function($event) {
                                        return _vm.confirmDelete(row.id)
                                      }
                                    }
                                  },
                                  [_c("i", { staticClass: "fas fa-trash-alt" })]
                                )
                              ],
                              1
                            )
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
                on: { "pagination-change-page": _vm.loadEvents }
              })
            ],
            1
          )
        ]
      )
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", { staticClass: "card-title mb-0" }, [
      _c("span", { staticClass: "float-left" }, [_vm._v("My Events")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("ID")]),
        _vm._v(" "),
        _c("th", [_vm._v("Name")]),
        _vm._v(" "),
        _c("th", [_vm._v("Type")]),
        _vm._v(" "),
        _c("th", [_vm._v("Tickets")]),
        _vm._v(" "),
        _c("th", [_vm._v("Date")]),
        _vm._v(" "),
        _c("th", [_vm._v("Period")]),
        _vm._v(" "),
        _c("th", [_vm._v("Status")]),
        _vm._v(" "),
        _c("th", [_vm._v("Actions")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("td", { attrs: { colspan: "8" } }, [
      _c("p", { staticClass: "text-center" }, [
        _vm._v("\n\t\t\t\t\t\t\t\t\t\tNo Events Found!\n\t\t\t\t\t\t\t\t\t")
      ])
    ])
  }
]
render._withStripped = true



/***/ })

}]);