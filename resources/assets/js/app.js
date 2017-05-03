
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('../../../node_modules/jquery/dist/jquery.min');
// require('../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min');

// require('../../../node_modules/wysihtml/dist/wysihtml');

// require('../../../node_modules/wysihtml/dist/minified/wysihtml.all-commands.min');
// require('../../../node_modules/wysihtml/dist/minified/wysihtml.table_editing.min');
// require('../../../node_modules/wysihtml/dist/minified/wysihtml.toolbar.min');
// require('../../../node_modules/wysihtml/parser_rules/advanced');

// var editor = new wysihtml.Editor(document.getElementById('wysihtml5-textarea'), {
//     toolbar:document.getElementById('wysihtml5-toolbar'),
//     parserRules:  wysihtmlParserRules
// });

// require('../../../node_modules/vue/dist/vue.min');
// require('../../../node_modules/vue-validator/dist/vue-validator.min');
// require('../../../node_modules/vue-resource/dist/vue-resource.min');

// var Vue = require('vue');
// var validator = require('vue-validator');
// var resource = require('vue-resource');

// window.Vue = Vue;

// Vue.http.headers.common['X-CSRF-TOKEN'] = $("#csrf-token").attr("value");


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

// $(document).ready(()=>{
//     var editor = new wysihtml5.Editor("wysihtml5-textarea", { // id of textarea element
//         toolbar:      "wysihtml5-toolbar", // id of toolbar element
//         parserRules:  wysihtml5ParserRules // defined in parser rules set
//     });
// });

new Vue({
    el :'#manage-vue',
    data :{
        items: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        formErrors:{},
        formErrorsUpdate:{},
        newItem : {
            'title':'',
            'description':'',
            'username':'',
            'email':''
        },
        fillItem : {
            'title':'',
            'description':'',
            'username':'',
            'email':'',
            'id':''
        }
    },
    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        pagesNumber: function() {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    ready: function() {
        this.getVueItems(this.pagination.current_page);
    },
    methods: {
        sendMessage: function(item) {
            this.$http.delete('/vueitems/'+item.id).then((response) => {
                this.changePage(this.pagination.current_page);
                toastr.success('Post Deleted Successfully.', 'Success Alert', {timeOut: 5000});
            });
        },
        getVueItems: function(page) {
            this.$http.get('/vueitems?page='+page).then((response) => {
                this.$set('items', response.data.data.data);
                this.$set('pagination', response.data.pagination);
            });
        },
        createItem: function() {
            var input = this.newItem;
            console.log(input);
            this.$http.post('/vueitems',input).then((response) => {
                this.changePage(this.pagination.current_page);
                this.newItem = {
                    'title':'',
                    'description':'',
                    'username':'',
                    'email':''
                };
                $("#create-item").modal('hide');
                toastr.success('Post Created Successfully.', 'Success Alert', {timeOut: 5000});
            }, (response) => {
                this.formErrors = response.data;
            });
        },
        deleteItem: function(item) {
            this.$http.delete('/vueitems/'+item.id).then((response) => {
                this.changePage(this.pagination.current_page);
                toastr.success('Post Deleted Successfully.', 'Success Alert', {timeOut: 5000});
            });
        },
        editItem: function(item) {
            this.fillItem.title = item.title;
            this.fillItem.id = item.id;
            this.fillItem.description = item.description;
            $("#edit-item").modal('show');
        },
        updateItem: function(id) {
            var input = this.fillItem;
            this.$http.put('/vueitems/'+id,input).then((response) => {
                this.changePage(this.pagination.current_page);
                this.newItem = {
                    'title':'',
                    'description':'',
                    'username':'',
                    'email':'',
                    'id':''
                };
                $("#edit-item").modal('hide');
                toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
            }, (response) => {
                this.formErrors = response.data;
            });
        },
        changePage: function(page) {
            this.pagination.current_page = page;
            this.getVueItems(page);
        }
    }
});
