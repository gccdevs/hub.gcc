<template>
    <div class="container">
        <button class="button is-primary" @click.prevent="refresh"><em class="fa fa-refresh"> 刷新</em></button>
        <a class="button is-primary" href="/form/download-users"><em class="fa fa-paperclip"> Download</em></a>
        <br><br>
        <div>
            <div>
                <table class="table is-narrow">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>  <!--[0] -->
                        <th>Gender</th> <!--[1] -->
                        <th>Mobile</th> <!--[2] -->
                        <th>Email</th> <!--[3] -->
                        <th>Address</th> <!--[4] -->
                        <th>First Time</th> <!--[8] -->
                        <th>Paid</th> <!--[5] -->
                        <th>Ref</th> <!--[6] -->
                        <th>Paid Time</th> <!--[7] -->
                        <th>Where to know us</th> <!--[8] -->
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(entry, index) in allEntries">
                        <td v-text="allEntries.length - index"></td>
                        <td v-text="entry[0]"></td>
                        <td v-text="entry[1]"></td>
                        <td v-text="entry[2]"></td>
                        <td v-text="entry[3]"></td>
                        <td v-text="entry[4]"></td>
                        <td v-text="entry[8]"></td>

                        <td v-if="entry[5]"><em class="fa fa-check" style="color: lightseagreen"> Yes</em></td>
                        <td v-else><em class="fa fa-times" style="color: darkred"> No</em></td>
                        <td v-text="entry[6]"></td>
                        <td v-if="entry[5]" v-text="entry[7]"></td>
                        <td v-else></td>

                        <td v-text="entry[9]"></td>

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