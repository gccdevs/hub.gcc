<template>
    <div>
        <button class="btn btn-outline-info" @click.prevent="refresh"><em class="fa fa-refresh"></em></button>
        <button class="btn btn-outline-info" @click.prevent="download">Download</button>
        <button class="btn btn-outline-danger" @click.prevent="close" disabled>Close Registration</button>
        <div class="dropdown" style="display: inline-block">
            <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Choose a form
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" @click.prevent="filter" href="#">Summit 2018</a>
            </div>
        </div>
        <br><br>
        <div>
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-responsive-sg">
                        <thead class="thead">
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

                        </tr>
                        </tbody>
                    </table>
                </div>
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

            download(){

            },

            close(){

            },

            filter() {

            }
        },

        created(){
            this.allEntries = this.loadData();
        }

    }
</script>