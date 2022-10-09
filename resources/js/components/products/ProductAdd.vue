<template>
    <div class="card card-primary card-outline">
        <div class="card-body">
            <h5 class="card-title">Create Product</h5><br>

            <!-- form start -->
            <form role="form" action="" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>Category</label>
                    <Select2 v-model="form.category_id" :options="categories" :settings="{ placeholder: 'Select category' }"></Select2>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Submit</button>
            </div>
            </form>
        </div>
    </div><!-- /.card -->
</template>

<script>
    import store from '../../store'
    import * as actions from '../../store/action-types'
    import { mapGetters } from 'vuex'
    // import Select2Component
    import Select2 from 'v-select2-component'
    export default {
        // declare Select2Component
        components: {Select2},
        data(){
            return {
                form: {
                    category_id: 0
                }
            }
        },
        computed: {
            ...mapGetters({
                'categories' : 'getCategories'
            })
        },
        mounted(){
            //Get Categories
            store.dispatch(actions.GET_CATEGORIES);
        }
    }
</script>