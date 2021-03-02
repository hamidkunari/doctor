

let login  = require('./components/auth/login.vue').default;
let register  = require('./components/auth/register.vue').default;
let forget  = require('./components/auth/forget.vue').default;
let logout  = require('./components/auth/logout.vue').default;

//end authenication
let home  = require('./components/home.vue').default;

// Doctor Component 
let storedoctor = require('./components/doctor/create.vue').default;
let doctor = require('./components/doctor/index.vue').default;
let editdoctor = require('./components/doctor/edit.vue').default;
let viewdoctor = require('./components/doctor/details.vue').default;
 // Speciality Component 
let storespeciality = require('./components/supplier/create.vue').default;
let speciality = require('./components/supplier/index.vue').default;
let editspeciality = require('./components/supplier/edit.vue').default;

//Patient Component
let storepatient = require('./components/patient/create.vue').default;
let patient = require('./components/patient/index.vue').default;
let editpatient= require('./components/patient/edit.vue').default;

//transaction
let transaction = require('./components/transaction/index.vue').default;



// Category Component 
let storecategory = require('./components/category/create.vue').default;
let category = require('./components/category/index.vue').default;
let editcategory = require('./components/category/edit.vue').default;
 
 // Product Component 
let storeproduct = require('./components/product/create.vue').default;
let product = require('./components/product/index.vue').default;
let editproduct = require('./components/product/edit.vue').default;

 // Expens Component 
let storeexpense = require('./components/expense/create.vue').default;
let expense = require('./components/expense/expense.vue').default;
let editexpense = require('./components/expense/edit.vue').default;
 

  // Salary Component 
let salary = require('./components/salary/all_employee.vue').default;
let paysalary = require('./components/salary/create.vue').default;

let allsalary = require('./components/salary/index.vue').default;
let viewsalary = require('./components/salary/view.vue').default;
let editsalary = require('./components/salary/edit.vue').default;

 // Stock Component 
let stock = require('./components/product/stock.vue').default;
let editstock = require('./components/product/edit-stock.vue').default;
 
 // Customer Component  
let storecustomer = require('./components/customer/create.vue').default;
let customer = require('./components/customer/index.vue').default;
let editcustomer = require('./components/customer/edit.vue').default;


// POS Component
let pos = require('./components/pos/pointofsale.vue').default;

// Order Component
let order = require('./components/order/order.vue').default;
let vieworder = require('./components/order/vieworder.vue').default;
let searchorder = require('./components/order/search.vue').default;
 
   
  

export const routes = [
  { path: '/', component: login, name:'/'},
  { path: '/register', component: register, name:'register'},
  { path: '/forget', component: forget, name:'forget'},
  { path: '/logout', component: logout, name:'logout'},
  { path: '/home', component: home, name:'home'},

  // Employee Routes
  { path: '/store-doctor', component: storedoctor, name:'store-doctor'},
  { path: '/doctor', component: doctor, name:'doctor'},
  { path: '/edit-doctor/:id', component: editdoctor, name:'edit-doctor'},
  { path: '/view-doctor/:id', component: viewdoctor, name:'view-doctor'},

  // Speciality Routes
  { path: '/store-speciality', component: storespeciality, name:'store-speciality'},
  { path: '/speciality', component: speciality, name:'speciality'},
  { path: '/edit-speciality/:id', component: editspeciality, name:'edit-speciality'},

  //Patient Routes
   { path: '/store-patient', component: storepatient, name:'store-patient'},
  { path: '/patient', component: patient, name:'patient'},
  { path: '/edit-patient/:id', component: editpatient, name:'edit-patient'},

  // Transaction
  { path: '/transaction', component: transaction, name:'transaction'},


 // Category Routes
  { path: '/store-category', component: storecategory, name:'store-category'},
  { path: '/category', component: category, name:'category'},
  { path: '/edit-category/:id', component: editcategory, name:'edit-category'},

  // Product Routes
  { path: '/store-product', component: storeproduct, name:'store-product'},
  { path: '/product', component: product, name:'product'},
  { path: '/edit-product/:id', component: editproduct, name:'edit-product'},

 // Expense Routes
  { path: '/store-expense', component: storeexpense, name:'store-expense'},
  { path: '/expense', component: expense, name:'expense'},
  { path: '/edit-expense/:id', component: editexpense, name:'edit-expense'},

// Salary Routes
  { path: '/given-salary', component: salary, name:'given-salary'},
  { path: '/pay-salary/:id', component: paysalary, name:'pay-salary'},

  { path: '/salary', component: allsalary, name:'salary'},
  { path: '/view-salary/:id', component: viewsalary, name:'view-salary'},
  { path: '/edit-salary/:id', component: editsalary, name:'edit-salary'},

 // Stock Routes
  { path: '/stock', component: stock, name:'stock'},
  { path: '/edit-stock/:id', component: editstock, name:'edit-stock'},

  // Customer Routes
  { path: '/store-customer', component: storecustomer, name:'store-customer'},
  { path: '/customer', component: customer, name:'customer'},
  { path: '/edit-customer/:id', component: editcustomer, name:'edit-customer'},
   
 // POS Routes 
 { path: '/pos', component: pos, name:'pos'},
 
 // Order Routes
 { path: '/order', component: order, name:'order'},
 { path: '/view-order/:id', component: vieworder, name:'view-order'},
 { path: '/searchorder', component: searchorder, name:'searchorder'},


]