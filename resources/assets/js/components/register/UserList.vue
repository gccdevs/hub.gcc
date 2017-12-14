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
                        <td v-text="user.name"></td>

                        <td v-if="user.status" class="tag is-primary"><em class="fa fa-check"></em> 正在使用</td>
                        <td v-else class="tag is-light"><em class="fa fa-times"></em> 未激活</td>

                        <td v-text="user.email"></td>
                        <td v-text="user.mobile"></td>
                        <td v-text="user.role"></td>
                        <td v-text="user.createdBy"></td>
                        <td v-text="user.time"></td>
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

        props:['id'],

        methods:{

            loadUsers(){
                return axios.get('/users/list').then(response => {
                    this.allUsers = response.data;
                }).catch(error => {

                })
            },

            deleteUser(user){

                let formData = {
                    authId: this.id,
                    userId: user.id
                };

                let vm = this;

                return axios.post('/api/user/delete', formData).then(response => {
                    if (response.data.message === 'deleted'){
                        alert('User deleted!');
                        vm.loadUsers();
                    }else if (response.data.message === 'null'){
                        alert('Cannot delete not existing user');
                    } else {
                        alert('Cannot delete yourself');
                    }
                }).catch(error => {
                    console.log(error);
                })
            }
        },

        created(){
            this.allUsers = this.loadUsers();
        }
    }
</script>