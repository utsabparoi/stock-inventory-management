<template>
<!-- form start -->
<form @submit.prevent="submitForm" role="form" method="post">
    <div class="row">
        <show-error></show-error>
        <div class="col-sm-6">    
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h5 class="card-title">Create Product</h5><br>
                    
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <Select2 v-model="form.category_id" :options="categories" :settings="{ placeholder: 'Select category' }"></Select2>
                            </div>
                        
                            <div class="form-group">
                                <label>Brand <span class="text-danger">*</span></label>
                                <Select2 v-model="form.brand_id" :options="brands" :settings="{ placeholder: 'Select brand' }"></Select2>
                            </div>
                            <div class="form-group">
                                <label>SKU <span class="text-danger">*</span></label>
                                <input type="text" v-model="form.sku" class="form-control" placeholder="SKU">
                            </div>
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" v-model="form.name" class="form-control" placeholder="Product name">
                            </div>
                            <div class="form-group">
                                <label>Image <span class="text-danger">*</span></label>
                                <input @change="selectImage" type="file" class="form-control" placeholder="Product image">
                            </div>
                            <div class="form-group">
                                <label>Cost Price($) <span class="text-danger">*</span></label>
                                <input type="text" v-model="form.cost_price" class="form-control" placeholder="Product cost price">
                            </div>
                            <div class="form-group">
                                <label>Retail Price($) <span class="text-danger">*</span></label>
                                <input type="text" v-model="form.retail_price" class="form-control" placeholder="Product retail price">
                            </div>
                            <div class="form-group">
                                <label>Year <span class="text-danger">*</span></label>
                                <input type="text" v-model="form.year" class="form-control" placeholder="Product year [Ex: 2022]">
                            </div>
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <input type="text" v-model="form.description" class="form-control" placeholder="Product description [Max: 200]">
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select v-model="form.status" class="form-control" placeholder="Product status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    
                </div>
            </div><!-- /.card -->
        </div>

        <div class="col-sm-6">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h5 class="card-title">Product Size</h5><br>

                    <div class="row mb-1" v-for="(item, index) in form.items" :key="index">
                        <div class="col-sm-4">
                            <select class="form-control" v-model="item.size_id">
                                <option value="">Select Size</option>
                                <option v-for="(size, index)  in sizes" :key="index" :value="size.id" >{{ size.size }}</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" v-model="item.size_id">
                                <option value="">Select a Category</option>
                                <option v-for="(category, index)  in categories" :key="index" :value="category.id" >{{ cateogry.name }}</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" v-model="item.location" class="form-control" placeholder="Location">
                        </div>
                        <div class="col-sm-3">
                            <input type="number" v-model="item.quantity" class="form-control" placeholder="Quantity">
                        </div>
                        <div class="col-sm-2">
                            <button @click="deleteItem(index)" type="button" class="btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <button @click="addItem" type="button" class="btn-primary btn-sm mt-3"><i class="fa fa-plus"></i> Add item</button>
                </div>
            </div><!-- /.card -->
        </div>
    </div>
</form>
    
</template>

<script>
    import store from '../../store'
    import * as actions from '../../store/action-types'
    import { mapGetters } from 'vuex'
    import Select2 from 'v-select2-component'
    import ShowError from "../utils/ShowError"; 
    export default {
        // declare Select2Component
        components: {
            Select2,
            ShowError
        },
        data(){
            return {
                form: {
                    category_id: '',
                    brand_id: '',
                    sku: '',
                    name: '',
                    image: '',
                    cost_price: 0,
                    retail_price: 0,
                    year: '',
                    description: '',
                    status: 1,
                    items: [
                        {
                            size_id: '',
                            category_id: '',
                            location: '',
                            quantity: 0
                        }
                    ]
                }
            }
        },
        computed: {
            ...mapGetters({
                'categories' : 'getCategories',
                'brands' : 'getBrands',
                'sizes' : 'getSizes'
            })
        },
        mounted(){
            //Get Categories
            store.dispatch(actions.GET_CATEGORIES);
            //Get Brands
            store.dispatch(actions.GET_BRANDS);
            //Get Sizes
            store.dispatch(actions.GET_SIZES);
        },
        methods: {
            selectImage(e){
                this.form.image = e.target.files[0]
            },
            addItem(){
                let item = {
                    size_id: '',
                    category_id: '',
                    location: '',
                    quantity: 0       
                }
                this.form.items.push(item)
            },
            deleteItem(index){
                this.form.items.splice(index, 1)
            },
            submitForm(){
                let data = new FormData();

                data.append('category_id', this.form.category_id)
                data.append('brand_id', this.form.brand_id)
                data.append('sku', this.form.sku)
                data.append('name', this.form.name)
                data.append('image', this.form.image)
                data.append('cost_price', this.form.cost_price)
                data.append('retail_price', this.form.retail_price)
                data.append('year', this.form.year)
                data.append('description', this.form.description)
                data.append('status', this.form.status)
                data.append('items', JSON.stringify(this.form.items))
                
                //console.log(this.form)
                store.dispatch(actions.ADD_PRODUCT, data);
            }

        }
    }
</script>