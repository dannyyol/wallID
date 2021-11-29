"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[741],{9741:(t,a,s)=>{s.r(a),s.d(a,{default:()=>n});const e={name:"UserOrganizations",data:function(){return{form:new Form({name:""}),organizations:[],status:null,baseUrl:"/api/individuals/organizations"}},watch:{$route:function(t,a){t.params.status!=this.status&&(this.status=t.params.status,this.loadOrganizations())}},methods:{loadOrganizations:function(){var t=this,a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1;this.$spinner.show();var s=this.status?this.baseUrl+"/"+this.status:this.baseUrl;axios.get(s+"?page="+a).then((function(a){console.log(a),t.organizations=a.data.data})).catch((function(a){t.$notify({type:"error",text:a.message})})).finally((function(){t.$spinner.hide()}))},checkOrg:function(){var t=this;this.$spinner.show(),this.form.post("/api/individuals/organizations").then((function(a){t.$notify({type:a.data.status?"success":"warn",text:a.data.message})})).catch((function(a){t.$notify({type:"error",text:a.message})})).finally((function(){t.$spinner.hide()}))}},mounted:function(){this.loadOrganizations()}};const n=(0,s(1900).Z)(e,(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",[s("div",{staticClass:"card mb-4"},[s("div",{staticClass:"card-body"},[t._m(0),t._v(" "),s("form",{staticClass:"form-row",on:{submit:function(a){return a.preventDefault(),t.checkOrg.apply(null,arguments)},keydown:function(a){return t.form.onKeydown(a)}}},[s("div",{staticClass:"col-md-8"},[s("label",[t._v("Name")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.form.name,expression:"form.name"}],staticClass:"form-control",attrs:{type:"text",required:"",placeholder:"Organization Name"},domProps:{value:t.form.name},on:{input:function(a){a.target.composing||t.$set(t.form,"name",a.target.value)}}})]),t._v(" "),t._m(1)])])]),t._v(" "),s("div",{staticClass:"card border-0",staticStyle:{"border-radius":"16px"}},[s("div",{staticClass:"card-body"},[s("p",{staticClass:"card-title font-weight-bold"},[t._v("My Organizations")]),t._v(" "),s("div",{staticClass:"table-responsive"},[s("table",{staticClass:"table table-striped table-borderless"},[t._m(2),t._v(" "),s("tbody",[0==t.organizations.length?s("tr",[t._m(3)]):t._e(),t._v(" "),t._l(t.organizations,(function(a,e){return s("tr",{key:a.id},[s("td",[t._v(t._s(e+1))]),t._v(" "),s("td",[t._v(t._s(a.organization.name))]),t._v(" "),s("td",[t._v(t._s(a.organization.phone))]),t._v(" "),s("td",[t._v(t._s(t._f("moment")(a.created_at,"from","now",!0))+" ago")]),t._v(" "),s("td",["pending"==a.status?s("span",{staticClass:"bg-warning py-1 px-2 text-white"},[t._v("\n\t\t\t\t\t\t\t\t\tPending\n\t\t\t\t\t\t\t\t")]):t._e(),t._v(" "),"approved"==a.status?s("span",{staticClass:"bg-success py-1 px-2 text-white",staticStyle:{"border-radius":"5px"}},[t._v("\n\t\t\t\t\t\t\t\t\tApproved\n\t\t\t\t\t\t\t\t")]):t._e(),t._v(" "),"suspended"==a.status?s("span",{staticClass:"bg-danger py-1 px-2 text-white"},[t._v("\n\t\t\t\t\t\t\t\t\tSuspended\n\t\t\t\t\t\t\t\t")]):t._e()])])}))],2)])])])])])}),[function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("p",{staticClass:"card-title"},[s("span",[t._v("Send Request")]),s("br"),t._v(" "),s("span",{staticClass:"text-muted small"},[t._v("\n\t\t\t\t\tSend a request to an Organization to become one its member\n\t\t\t\t")])])},function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"col-md-4 d-flex align-items-end"},[s("button",{staticClass:"btn btn-primary"},[t._v("Check")])])},function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("thead",[s("tr",[s("th",[t._v("#")]),t._v(" "),s("th",[t._v("Name")]),t._v(" "),s("th",[t._v("Phone")]),t._v(" "),s("th",[t._v("Date Joined")]),t._v(" "),s("th",[t._v("Status")])])])},function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("td",{attrs:{colspan:"5"}},[s("p",{staticClass:"text-center"},[t._v("No Record Found")])])}],!1,null,null,null).exports}}]);