<template>
    <div class="box">
        <form @submit.prevent="updateProfile" class="box">
            <div class="field" :class="{'has-error' : errors.has('name') }">
                <label for="name" class="label">用户名</label>
                <input v-model="name"
                       v-validate data-vv-rules="required" data-vv-as="邮箱"
                       id="name" type="text" class="input" name="name" required>
                <span class="help-block" style="color:red" v-show="errors.has('name')">{{errors.first('name')}}</span>
            </div>
            <div class="field" :class="{'has-error' : errors.has('email') }">
                <label for="email" class="label">邮箱</label>
                <input v-model="this.person.email"
                       v-validate data-vv-rules="required|email" data-vv-as="邮箱"
                       id="email" type="email" class="input" name="email" required disabled>
                <span class="help-block" style="color:red" v-show="errors.has('email')">{{errors.first('email')}}</span>
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
                    name: this.name
                };
                this.$store.dispatch('updateProfileRequest',formData).then(response => {
                    this.$router.push({name:'profile'})
                }).catch(error => {

                })
            }
        }
    }
</script>