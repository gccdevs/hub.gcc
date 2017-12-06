<template>
    <div class="col-md-9">
        <h1>个人信息 <a href="javascript:window.location.reload();" class="btn btn-outline-info"><em class="fa fa-refresh"></em></a></h1>
        <br>
            <router-link :to="{ name: 'profile.edit' }" class="btn btn-outline-info" activeClass="active" exact>修改信息</router-link>
            <router-link :to="{ name: 'password.edit' }" class="btn btn-outline-info" activeClass="active" exact>修改密码</router-link>
            <br><br>
            <ul class="list-group">
                <li class="list-group-item">
                    用户名
                    <br>
                    <h4 v-text="this.person.name"></h4>
                </li>
                <li class="list-group-item">
                    邮箱
                    <br>
                    <h4 v-text="this.person.email"></h4>
                </li>
            </ul>
    </div>
</template>

<script>
    export default{

        data(){
            return {
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
        }
    }
</script>
