"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_events_EventInfo_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/EventInfo.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/EventInfo.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      event: null,
      category_id: null
    };
  },
  methods: {
    getEvent: function getEvent(id) {
      var _this = this;

      this.$spinner.show();
      axios.get('/api/events/' + id).then(function (response) {
        _this.event = response.data.data;

        _this.$notify({
          title: 'success',
          text: response.data.message
        });
      })["catch"](function (e) {
        _this.$notify({
          title: 'Error',
          text: e.message
        });
      })["finally"](function (e) {
        _this.$spinner.hide();
      });
    },
    process: function process() {
      if (this.event.pricing != 'single') {
        this.$modal.show('categories-modal');
      } else {
        this.initPayment();
      }
    },
    initPayment: function initPayment() {
      var _this2 = this;

      if (this.event.pricing != 'single' && !this.category_id) {
        this.$notify({
          type: 'warn',
          text: 'Please select Ticket Category'
        });
      } else {
        this.$modal.hide('categories-modal');
        this.$spinner.show();
        var data = {
          event_id: this.event.id,
          category_id: this.category_id
        };
        console.log('Data', data);
        axios.post('/api/tickets/buy', data).then(function (response) {
          _this2.$notify({
            type: response.data.status ? 'success' : 'warn',
            text: response.data.message
          });

          if (response.data.status && response.data.data.link) {
            localStorage.setItem('event_id', _this2.event.id);
            localStorage.setItem('paymentFor', 'ticket');
            window.location.href = response.data.data.link;
          }
        })["catch"](function (e) {
          _this2.$notify({
            type: 'error',
            text: e.message
          });
        })["finally"](function () {
          _this2.$spinner.hide();
        });
      }
    }
  },
  mounted: function mounted() {
    this.getEvent(this.$route.params.id);
  }
});

/***/ }),

/***/ "./resources/js/pages/events/EventInfo.vue":
/*!*************************************************!*\
  !*** ./resources/js/pages/events/EventInfo.vue ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _EventInfo_vue_vue_type_template_id_a98ff58a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./EventInfo.vue?vue&type=template&id=a98ff58a& */ "./resources/js/pages/events/EventInfo.vue?vue&type=template&id=a98ff58a&");
/* harmony import */ var _EventInfo_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./EventInfo.vue?vue&type=script&lang=js& */ "./resources/js/pages/events/EventInfo.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _EventInfo_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _EventInfo_vue_vue_type_template_id_a98ff58a___WEBPACK_IMPORTED_MODULE_0__.render,
  _EventInfo_vue_vue_type_template_id_a98ff58a___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/events/EventInfo.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/events/EventInfo.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/pages/events/EventInfo.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_EventInfo_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./EventInfo.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/EventInfo.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_EventInfo_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/events/EventInfo.vue?vue&type=template&id=a98ff58a&":
/*!********************************************************************************!*\
  !*** ./resources/js/pages/events/EventInfo.vue?vue&type=template&id=a98ff58a& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_EventInfo_vue_vue_type_template_id_a98ff58a___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_EventInfo_vue_vue_type_template_id_a98ff58a___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_EventInfo_vue_vue_type_template_id_a98ff58a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./EventInfo.vue?vue&type=template&id=a98ff58a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/EventInfo.vue?vue&type=template&id=a98ff58a&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/EventInfo.vue?vue&type=template&id=a98ff58a&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/events/EventInfo.vue?vue&type=template&id=a98ff58a& ***!
  \***********************************************************************************************************************************************************************************************************************/
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
      _c("modal", { attrs: { name: "categories-modal", adaptive: true } }, [
        _c("div", { staticClass: "card h-100" }, [
          _c(
            "form",
            {
              on: {
                submit: function($event) {
                  $event.preventDefault()
                  return _vm.initPayment.apply(null, arguments)
                },
                keydown: function($event) {
                  return _vm.form.onKeydown($event)
                }
              }
            },
            [
              _c("div", { staticClass: "card-body" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", [_vm._v("Ticket Category")]),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.category_id,
                          expression: "category_id"
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
                          _vm.category_id = $event.target.multiple
                            ? $$selectedVal
                            : $$selectedVal[0]
                        }
                      }
                    },
                    _vm._l(_vm.event.ticketCategories, function(tc) {
                      return _c(
                        "option",
                        { key: tc.id, domProps: { value: tc.id } },
                        [
                          _vm._v(
                            "\n\t\t        \t\t\t\t\t" +
                              _vm._s(tc.name) +
                              "\n\t\t        \t\t\t\t"
                          )
                        ]
                      )
                    }),
                    0
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card-footer text-right" }, [
                _c("button", { staticClass: "btn btn-danger" }, [
                  _vm._v("\n\t        \t\t\t\tContinue\n\t        \t\t\t")
                ])
              ])
            ]
          )
        ])
      ]),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "card border-0 mb-4",
          staticStyle: { "border-radius": "16px" }
        },
        [
          _vm.event
            ? _c("div", { staticClass: "card-body" }, [
                _c("p", { staticClass: "card-title" }, [_vm._v("Details")]),
                _vm._v(" "),
                _c("p", { staticClass: "mb-4" }, [
                  _c("span", { staticClass: "small text-muted" }, [
                    _vm._v("Title")
                  ]),
                  _vm._v(" "),
                  _c("br"),
                  _vm._v("\n\t\t\t\t\t" + _vm._s(_vm.event.name) + "\n\t\t\t\t")
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "mb-4" }, [
                  _c("span", { staticClass: "small text-muted" }, [
                    _vm._v("Date")
                  ]),
                  _vm._v(" "),
                  _c("br"),
                  _vm._v(
                    "\n\t\t\t\t\t" + _vm._s(_vm.event.event_date) + "\n\t\t\t\t"
                  )
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "mb-4" }, [
                  _c("span", { staticClass: "small text-muted" }, [
                    _vm._v("Available Tickets")
                  ]),
                  _vm._v(" "),
                  _c("br"),
                  _vm._v(
                    "\n\t\t\t\t\t" +
                      _vm._s(_vm.event.tickets - _vm.event.tickets_purchased) +
                      "\n\t\t\t\t"
                  )
                ])
              ])
            : _vm._e()
        ]
      ),
      _vm._v(" "),
      _c("div", { staticClass: "card border-0 mb-4" }, [
        _vm.event
          ? _c("div", { staticClass: "card-body" }, [
              _c("p", { staticClass: "card-title" }, [_vm._v("Pricing")]),
              _vm._v(" "),
              _c("div", [
                _c("p", [
                  _c("span", { staticClass: "small text-muted" }, [
                    _vm._v("Price Type")
                  ]),
                  _vm._v(" "),
                  _c("br"),
                  _vm._v(
                    "\n\t\t\t\t\t\t" +
                      _vm._s(_vm.event.pricing) +
                      "\n\t\t\t\t\t"
                  )
                ])
              ]),
              _vm._v(" "),
              _c(
                "div",
                _vm._l(_vm.event.ticketCategories, function(tc) {
                  return _c("p", { key: tc.id, staticClass: "mb-4" }, [
                    _c("span", { staticClass: "small text-muted" }, [
                      _vm._v(_vm._s(tc.name))
                    ]),
                    _vm._v(" "),
                    _c("br"),
                    _vm._v(
                      "\n\t\t\t\t\t\t₦" + _vm._s(tc.price) + "\n\t\t\t\t\t"
                    )
                  ])
                }),
                0
              ),
              _vm._v(" "),
              _c("div", { staticClass: "text-right" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-danger btn-sm",
                    on: { click: _vm.process }
                  },
                  [_vm._v("Buy Ticket")]
                )
              ])
            ])
          : _vm._e()
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);