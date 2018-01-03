<template>
    <div>
        <h2>User List <a href="javascript:window.location.reload();" class="btn btn-outline-info"><em class="fa fa-refresh"></em></a></h2>
        <br>

        <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0 left"></b-pagination>
        <b-form-group class="right">
            <b-input-group style="width:120%;">
                <div class="btn btn-outlin-info">Filter: </div><b-form-input name="filter"  id="filter" v-model="filter" placeholder="Type to Search" />
            </b-input-group>
        </b-form-group>
        <br><br><br>
        <b-table show-empty
                 responsive
                 :items="items"
                 :fields="fields"
                 :current-page="currentPage"
                 :per-page="perPage"
                 :filter="filter"
                 :sort-by.sync="sortBy"
                 :sort-desc.sync="sortDesc"
                 @filtered="onFiltered">
            <template slot="status" slot-scope="row">
                <em class="fa fa-check" v-if="row.value == 1" style="color:green"> 正在使用</em>
                <em class="fa fa-times" v-else style="color:lightgray"> 未激活</em>
            </template>

            <template slot="action" slot-scope="data">
                <button class="btn btn-outline-danger" @click="deleteUser(data.item.email)"><em class="fa fa-trash"> 删除</em></button>
            </template>

        </b-table>
    </div>
</template>


<script>
    export default{

        data(){
            return {
                fields:[
                    {key:'name', label:'姓名', sortable:true },
                    {key:'status', label:'账户状态',sortable:true},
                    {key:'email', label:'邮箱',sortable:true},
                    {key:'mobile', label:'电话', sortable:true},
                    {key:'role', label:'权限',sortable:true},
                    {key:'createdBy', label:'邀请人', sortable:true},
                    {key:'time', label:'邀请时间',sortable:true},
                    {key:'action',label:'Action'}
                ],
                items:false,
                currentPage: 1,
                perPage: 15,
                totalRows: 0,
                sortBy: null,
                sortDesc: false,
                filter: null
            }
        },

        props:['id'],

        created(){
            this.loadUsers();
        },

        methods:{

            onFiltered (filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },

            loadUsers(){
                return axios.get('/users/list').then(response => {
                    this.items = response.data;
                }).catch(error => {

                })
            },

            deleteUser(email){
                console.log(email);

                let vm = this;

                let formData = {
                    authId: vm.id,
                    email: email
                };

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
        }
    }
</script>


<style>
    .left {
        float: left;
        width: 125px;
        text-align: right;
        margin: 2px 10px;
        margin-left:0px;
        color:#1a92a9 !important;
        margin-right:100px;
    }

    .right {
        float: left;
        text-align: left;
        margin: 2px 10px;
    }
</style>