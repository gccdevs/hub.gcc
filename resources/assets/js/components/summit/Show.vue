<template>
    <div class="container">
        <button class="button is-primary" @click.prevent="refresh"><em class="fa fa-refresh"> </em> 刷新</button>
        <a class="button is-primary" href="/form/download-users"><em class="fa fa-paperclip"> </em> Download</a>
        <br><br>
        <div>
            <div>
                <table class="table is-narrow">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>名字</th>  <!--[0] -->
                        <th>性别</th> <!--[1] -->
                        <th>电话</th> <!--[2] -->
                        <th>Email</th> <!--[3] -->
                        <th>地址</th> <!--[4] -->
                        <th>First?</th> <!--[8] -->
                        <th>支付凭证</th> <!--[6] -->
                        <th>支付时间</th> <!--[7] -->
                        <th>途径</th> <!--[8] -->
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(entry, index) in allEntries">
                        <td v-text="allEntries.length - index"></td>
                        <td v-text="entry.name"></td>
                        <td v-text="entry.gender"></td>
                        <td v-text="entry.mobile"></td>
                        <td v-text="entry.email"></td>
                        <td v-text="entry.address"></td>
                        <td v-text="entry.firstTime"></td>
                        <td v-text="entry.ref"></td>
                        <td v-text="entry.time"></td>
                        <td v-text="entry.path"></td>

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
            return{
                allEntries: {}
            }
        },

        methods:{
            loadData(){
                return axios.get('/api/form/result').then(response => {
                    this.allEntries = response.data;
                }).catch(error => {

                })
            },

            refresh(){
                return this.loadData();
            },

            filter() {

            }
        },

        created(){
            this.allEntries = this.loadData();
        }

    }
</script>