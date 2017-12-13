<template>
    <div class="container">
        <p class="is-size-1">个人信息</p>
        <br>
        <ul class="box">
            <li class="column is-12">
                <a href="javascript:window.location.reload();" class="button is-primary"><em class="fa fa-refresh"> 刷新</em></a>
            </li>
            <li class="column is-12">
                姓名
                <br>
                <h4 class="label" v-text="this.person.name"></h4>
            </li>
            <li class="column is-12">
                电话
                <br>
                <h4 class="label" v-text="this.person.mobile"></h4>
            </li>
            <li class="column is-12">
                邮箱
                <br>
                <h4 class="label" v-text="this.person.email"></h4>
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
            }
        }
    }
</script>