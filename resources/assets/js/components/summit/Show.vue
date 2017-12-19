<template>
    <div>
        <h2>高峰會報名表單 <br><br>
            <a class="btn btn-outline-info" href="javascript:window.location.reload();"><em class="fa fa-refresh"> </em> 刷新</a>
            <button class="btn btn-outline-info" style="color:#1a92a9;" disabled><em class="fa fa-money"></em> Refund</button>
            <a class="btn btn-link" style="color:#1a92a9;" href="/form/download-users"><em class="fa fa-paperclip"> </em> Download</a>

        </h2>
        <b-form-group style="display:inline;">
            <b-input-group style="width:120%;">
                <div class="btn btn-outlin-info">Filter: </div><b-form-input name="filter"  id="filter" v-model="filter" placeholder="Type to Search" />
            </b-input-group>
        </b-form-group>
        <br>
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
        <b-pagination style="color:#1a92a9 !important;" :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0"></b-pagination>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                fields:[
                    {key:'id', label:'ID', sortable:true },
                    {key:'name', label:'姓名', sortable:true },
                    {key:'mobile', label:'电话'},
                    {key:'email', label:'邮箱'},
                    {key:'gender', label:'性别', sortable:true},
                    {key:'address', label:'地址'},
                    {key:'firstTime', label:'first?', sortable:true},
                    {key:'ref', label:'支付凭证'},
                    {key:'time', label:'支付时间', sortable:true},
                    {key:'path', label:'了解途径'}
                ],
                filter: null,
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
            },

            onFiltered (filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            }
        }
    }
</script>