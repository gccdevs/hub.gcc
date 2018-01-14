<template>
    <div class="container">
        <div class="card border-info">
            <!--<br>-->
            <h3 class="card-header bg-transparent border-info">個人信息</h3>
            <div class="card-body">
                姓名:<h4 class="label" v-text="this.person.name"></h4> <br>
                電話號碼: <h4 class="label" v-text="this.person.mobile"></h4> <br>
                郵箱:<h4 class="label" v-text="this.person.email"></h4> <br>
            </div>
        </div>
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
