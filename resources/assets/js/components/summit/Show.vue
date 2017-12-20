<template>
    <div>
        <h2>高峰会报名表单<a class="btn btn-link" href="/form/download-users" style="color:#1a92a9;"><em class="fa fa-link"> ......</em></a></h2>
        <br>
        <a class="btn btn-outline-info" href="javascript:window.location.reload();"><em class="fa fa-refresh"> </em> 刷新</a>
        <button class="btn btn-outline-info" style="color:#1a92a9;" disabled><em class="fa fa-money"></em> Refund</button>
        <br><br>
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
        </b-table>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                fields:[
                    {key:'id', label:'ID', sortable:true },
                    {key:'name', label:'姓名', sortable:true },
                    {key:'mobile', label:'电话',sortable:true},
                    {key:'email', label:'邮箱',sortable:true},
                    {key:'gender', label:'性别', sortable:true},
                    {key:'address', label:'地址',sortable:true},
                    {key:'firstTime', label:'first?', sortable:true},
                    {key:'ref', label:'支付凭证',sortable:true},
                    {key:'time', label:'支付时间', sortable:true},
                    {key:'path', label:'了解途径',sortable:true}
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

        created(){
            this.fetchData();
        },

        computed: {
            sortOptions () {
                // Create an options list from our fields
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => { return { text: f.label, value: f.key } })
            }
        },

        methods: {

            onFiltered (filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },

            fetchData(){
                let vm = this;
                return axios.get('/api/form/result').then(response => {
                    vm.items = response.data;
                    vm.totalRows = vm.items.length;
                });
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