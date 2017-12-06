<template>
    <div class="container">
        <h1>用户列表</h1>
        <div>
            <div class="row">
                <table class="table table-responsive">
                    <thead class="thead">
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Created by</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody v-for="user in allUsers">
                    <tr>
                        <td v-text="user[0]"></td>
                        <td>Not applicable</td>
                        <td v-text="user[1]"></td>
                        <td v-text="user[2]"></td>
                        <td><button class="btn btn-success">Send Message</button></td>
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
                return axios.get('/api/users/list').then(response => {
                    this.allEntries = response.data;
                }).catch(error => {

                })
            }
        },

        mounted(){
            this.allUsers = this.loadUsers();
        }
    }
</script>