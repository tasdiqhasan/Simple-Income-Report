<template>
    <form @submit.prevent="submit">
        <div class="alert alert-success" v-show="success">Data tersimpan.</div>
        <div class="form-group row">
            <label for="" class="control-label col-md-3 text-md-right">Jenis <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <select name="type" :class="(errors && errors.type) ? 'form-control is-invalid' : 'form-control'" v-model="fields.type">
                    <option v-for="(category, index) in categories" :value="index">{{ category }}</option>
                </select>
                <div class="invalid-feedback" v-if="errors && errors.type">{{ errors.type[0] }}</div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="control-label col-md-3 text-md-right">Deskripsi <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="text" :class="(errors && errors.description) ? 'form-control is-invalid' : 'form-control'" name="description" v-model="fields.description">
                <div class="invalid-feedback" v-if="errors && errors.description">{{ errors.description[0] }}</div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="control-label col-md-3 text-md-right">Jumlah <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="text" :class="(errors && errors.amount) ? 'form-control is-invalid' : 'form-control'" name="amount" v-model="fields.amount">
                <div class="invalid-feedback" v-if="errors && errors.amount">{{ errors.amount[0] }}</div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="control-label col-md-3 text-md-right">Diterima Tanggal <span class="text-danger">*</span></label>
            <div class="col-md-9">
                <input type="date" value="" :class="(errors && errors.received_at) ? 'form-control is-invalid' : 'form-control'" name="received_at" v-model="fields.received_at">
                <div class="invalid-feedback" v-if="errors && errors.received_at">{{ errors.received_at[0] }}</div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-9 offset-3">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                categories: null,
                fields: {},
                success:false,
                errors: {}
            }
        },
        mounted() {
            axios.get('api/incomes/type').then(response => {
                this.categories = response.data.data
            })
        },
        methods: {
            submit() {
                axios.post('api/incomes/create', this.fields).then(response => {
                    this.fields = {};
                    this.success = true;
                    this.errors = {};
                }).catch(error => {
                    this.errors = error.response.data.errors;
                    // console.log(error);
                    // console.log(error.response);
                    console.log(error.response.data);
                });
            }
        }
    }
</script>