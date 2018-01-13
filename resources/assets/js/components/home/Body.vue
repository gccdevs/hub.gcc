<template>
    <div class="body">
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top tinted-image" src="./../../../image/summit.png" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">活动报名</h4>
                                <p class="card-text">
                                    領袖高峰会2018 <br>
                                    報名參加小組 <br>
                                    報名受洗 <br>
                                </p>
                                <v-btn class="btn btn-dark" style="margin-bottom:17px;" v-b-modal.formRego>報名</v-btn>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top" src="./../../../image/watchOnline.jpg" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">在線資源</h4>
                                <p class="card-text">
                                    錯過了主日？沒關係！
                                    在這裡，您可以收看及時的證道信息以及各式各樣的視頻資源<br>
                                </p>
                                <v-btn href="https://www.youtube.com/user/GloryCityMelbourne" class="btn btn-dark" style="margin-bottom:17px;">收看资讯</v-btn>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top" src="./../../../image/devotion.jpg" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">每日晨更</h4>
                                <p class="card-text">
                                    每天的開始，就領受神的華語，更新你的生命
                                     <br>
                                    <b>時間：每天早上6：30-7：00</b><br>
                                </p>
                                <b-btn href="https://www.facebook.com/GloryCityChurch/" class="btn btn-dark" style="margin-bottom:17px;">參與每日晨更</b-btn>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top" src="./../../../image/listen.png" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">聯繫牧者</h4>
                                <p class="card-text">
                                    有什麼話，或者建議想要告訴我們牧者嗎？
                                    <br>
                                </p>
                                <v-btn class="btn btn-dark" style="margin-bottom:17px;" v-b-modal.story>我有話説</v-btn>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top" src="./../../../image/BibleStudy.jpg" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">讀經計劃</h4>
                                <p class="card-text">
                                    神的話語就是我們的靈糧 <br>
                                    一起參與我們的40週讀經計劃，或者全年讀經計劃吧！<br>
                                </p>
                                <!--<v-btn class="btn btn-dark" style="margin-bottom:17px;" v-b-modal.comming-soon>今日經文</v-btn>-->
                                <a href="https://bible-study.glorycitychurch.com" class="btn btn-dark" style="margin-bottom:17px;">打卡</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top" src="./../../../image/connecting.jpg" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">People</h4>
                                <p class="card-text">
                                    還沒有central hub的帳號嗎?<br>
                                    快去向小組長索取吧!<br>
                                </p>
                                <v-btn href="/login" class="btn btn-dark" style="margin-bottom:17px;">進入Hub</v-btn>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <b-modal id="formRego" title="GCC Central Hub">
            <a style="text-decoration: none !important;" href="/summit-2018" target="_blank">Summit 2018</a>
            <br>
            <a style="text-decoration: none !important;" href="/registration/cell-group" target="_blank">Cell groups sign up</a>
            <br>
            <a style="text-decoration: none !important;" href="/registration/baptism" target="_blank">Baptism Sign up</a>
        </b-modal>

        <b-modal id="comming-soon" title="GCC Central Hub">
            <p class="my-4">Coming soon !</p>
        </b-modal>

        <b-modal id="story" title="GCC Central Hub">
            <div class="form-group">
                <label>Name</label>
                <input type="name" v-model="name" class="form-control" placeholder="姓名">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="email" v-model="phone" class="form-control" placeholder="電話">
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" v-model="email" class="form-control" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label>Content* </label>
                <textarea v-model="story" type="email" class="form-control" placeholder="寫下你想說的....."></textarea>
            </div>
            <button type="submit" class="btn btn-dark" @click="submitStory">提交</button>

        </b-modal>

    </div>
</template>


<script>
    export default{
        data (){
            return {
                name: '',
                phone: '',
                email: '',
                story: '',
            }
        },

        methods: {
            submitStory (){

                if (!this.story) {
                    alert('內容不能為空！');
                    return;
                }

                let formData = {
                    name: this.name,
                    phone: this.phone,
                    email: this.email,
                    story: this.story
                };

                axios.post('/api/send-contact',formData).then(response => {
                    if (response.data.message === 'success') {
                        alert('Post successfully!');
                        this.cleanInput();
                    }else {
                        alert('Server error! Please try later' + response.data.message);
                    }
                }).catch(error => {
                    alert('網路故障！請聯繫我們的同工, 或發信息到: contact@glorycitychurch.com');
                    this.cleanInput();
                });
            },

            cleanInput() {
                this.name = '';
                this.email = '';
                this.phone = '';
                this.story = '';
            }
        }
    }
</script>

<style>

    .card-img-top {
        height:250px;
    }

    .shadow {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .card {
        text-align:center;
        margin: 0 auto 40px;
        float: none;
        background-color: #D9DFE5;
        height: 250px;
    }

    .links > li {
        color: #fff;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

</style>
