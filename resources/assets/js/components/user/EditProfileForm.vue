<template>
    <form>
        <div class="form-group" :class="{'has-error' : errors.has('name') }">
            <label for="name">姓名</label>
            <input v-model="name"
                   v-validate="'required|min:2|max:25'" data-vv-as="姓名"
                   id="name" type="text" class="form-control" name="name" required>
            <span class="help-block" style="color:red" v-show="errors.has('name')">{{errors.first('name')}}</span>
        </div>

        <div class="form-group" :class="{'has-error' : errors.has('mobile') }">
            <label for="mobile">電話號碼</label>
            <input v-model="mobile"
                   v-validate="'numeric|min:10|max:20'" data-vv-as="電話號碼"
                   id="mobile" class="form-control" name="mobile">
            <span class="help-block" style="color:red" v-show="errors.has('mobile')">{{errors.first('mobile')}}</span>
        </div>

        <div class="form-group">
            <label>郵箱</label>
            <input v-model="email" class="form-control" required disabled>
        </div>

        <div class="form-group">
            <div class="control">
                <button type="submit" class="btn btn-outline-info" style="width:100%" @click="updateProfile">
                    更新用戶資料
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
                mobile: '',
                email: ''
            }
        },

        created() {
            this.loadPerson();
        },

        methods:{

            loadPerson(){
                let vm = this;
                return axios.get('/user/profile').then(response => {
                    vm.name = response.data.name;
                    vm.email = response.data.email;
                    vm.mobile = response.data.mobile;
                }).catch(error => {
                    console.log(error)
                })
            },

            updateProfile() {
                let vm = this;
                const formData = {
                    name: vm.name,
                    mobile: vm.mobile
                };
                this.$store.dispatch('updateProfileRequest',formData).then(response => {
                    this.$router.push({name: 'profile'});
                    console.log('Success!');
                }).catch(error => {
                    console.log(error);
                })
            }
        }
    }
</script>
