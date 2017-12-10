<template>
    <div>
        <h1 class="is-size-1">用户列表</h1>
        <div class="box">
            <a href="javascript:window.location.reload();" class="button is-primary"><em class="fa fa-refresh"></em></a>
            <div class="col-md-10">
                <table class="table table-responsive-sg">
                    <thead class="thead">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th>Invited by</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody v-for="user in allUsers">
                    <tr>
                        <td v-text="user[0]"></td>
                        <td v-text="user[1]"></td>
                        <td v-text="user[2]"></td>
                        <td v-text="user[3]"></td>
                        <td v-text="user[4]"></td>
                        <td><button class="button is-primary" @click="chat"><em class="fa fa-commenting"> 发送信息</em></button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>


<script>
    export default{
        data(){
            return {
                allUsers: {}
            }
        },

        methods:{

            loadUsers(){
                return axios.get('/users/list').then(response => {
                    this.allUsers = response.data;
                }).catch(error => {

                })
            },

            chat(){

            }
        },

        created(){
            this.allUsers = this.loadUsers();
        }
    }
</script>