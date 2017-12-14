<template>
    <div>
        <h1 class="is-size-1">User List</h1>
        <div class="container">
            <a href="javascript:window.location.reload();" class="button is-primary"><em class="fa fa-refresh"></em></a>
            <div class="col-md-10">
                <table class="table">
                    <thead class="thead">
                    <tr>
                        <th>姓名</th>
                        <th>账户状态</th>
                        <th>邮件</th>
                        <th>电话</th>
                        <th>权限</th>
                        <th>邀请人</th>
                        <th>邀请时间</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <tbody v-for="user in allUsers">
                    <tr>
                        <td v-text="user[0]"></td>

                        <td v-if="user[6]" class="tag is-primary"><em class="fa fa-check"></em> 正在使用</td>
                        <td v-else class="tag is-light"><em class="fa fa-times"></em> 未激活</td>

                        <td v-text="user[1]"></td>
                        <td v-text="user[2]"></td>
                        <td v-text="user[3]"></td>
                        <td v-text="user[4]"></td>
                        <td v-text="user[5]"></td>
                        <td>
                            <!--<button class="button is-primary" @click="chat"><em class="fa fa-commenting"> 发送信息</em></button>-->
                            <button class="button is-danger" @click="deleteUser(user)"><em class="fa fa-trash-o"> 删除</em></button>
                        </td>

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

            deleteUser(user){

            }
        },

        created(){
            this.allUsers = this.loadUsers();
        }
    }
</script>