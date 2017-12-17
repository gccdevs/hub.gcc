<template>
    <form @submit.prevent="updateProfile">
        <div class="form-group" :class="{'has-error' : errors.has('name') }">
            <label for="name">姓名</label>
            <input v-model="name"
                   v-validate="'required|min:2|max:10'" data-vv-as="姓名"
                   id="name" type="text" class="form-control" name="name" required>
            <span class="help-block" style="color:red" v-show="errors.has('name')">{{errors.first('name')}}</span>
        </div>

        <div class="form-group" :class="{'has-error' : errors.has('mobile') }">
            <label for="mobile">电话</label>
            <input v-model="mobile" v-validate="'numeric|min:10|max:20'" data-vv-as="电话" id="mobile" class="form-control" name="mobile">
            <span class="help-block" style="color:red" v-show="errors.has('mobile')">{{errors.first('mobile')}}</span>
        </div>

        <div class="form-group">
            <label>邮箱</label>
            <input v-model="this.person.email" class="form-control" required disabled>
        </div>
        <div class="form-group">
            <div class="control">
                <button type="submit" class="btn btn-outline-info" style="width:100%">
                    更新用户资料
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    import { ErrorBag } from 'vee-validate';
    import * as types from './../../store/mutation-type'

    export default {
        data(){
            return {
                name: '',

                person: {
                    name: '',
                    mobile: '',
                    email: ''
                }
            }
        },

        created() {
            this.person = this.loadPerson();
        },

        methods:{

            loadPerson(){
                return axios.get('/user/profile').then(response => {
                    this.person = response.data;
                }).catch(error => {
                    console.log(error)
                })
            },

            updateProfile() {
                const formData = {
                    name: this.name,
                    mobile: this.mobile
                };
                this.$store.dispatch('updateProfileRequest',formData).then(response => {
                    this.$router.push({name:'profile'})
                }).catch(error => {

                })
            }
        }
    }
</script>