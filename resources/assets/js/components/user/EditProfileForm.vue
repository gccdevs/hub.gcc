<template>
    <div class="box">
        <form @submit.prevent="updateProfile" class="box">

            <div class="field" :class="{'has-error' : errors.has('name') }">
                <label for="name" class="label">姓名</label>
                <input v-model="name"
                       v-validate="'required|min:2|max:10'" data-vv-as="姓名"
                       id="name" type="text" class="input" name="name" required>
                <span class="help-block" style="color:red" v-show="errors.has('name')">{{errors.first('name')}}</span>
            </div>

            <div class="field" :class="{'has-error' : errors.has('mobile') }">
                <label for="mobile" class="label">电话</label>
                <input v-model="mobile"
                       v-validate="'numeric|min:10|max:20'" data-vv-as="电话"
                       id="mobile" type="text" class="input" name="mobile">
                <span class="help-block" style="color:red" v-show="errors.has('mobile')">{{errors.first('mobile')}}</span>
            </div>

            <div class="field">
                <label class="label">邮箱</label>
                <input v-model="this.person.email"class="input" required disabled>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-primary" style="width:100%">
                        更新用户资料
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    //    import jwtToken from './../../helpers/jwt'
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