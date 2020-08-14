<template>
    <div class="container">
        <div>



                    <div style="text-align:center">
                        <!-- <img :src="$images(row.image , 'org')" style="width: 100%" > -->
                    </div>
                    <br>
                    <h1 >{{ row.title }}</h1>
                    <br>
                    <p v-html="row.excerpt"></p>
                    <br>
                    <p v-html="row.body"></p>


        </div>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                row: {},
                loading: true,
            }
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.loading = true;
                let url = process.env.moduleUrl + 'pages/' + this.$route.params.id;
                this.$axios.$get(url).then((res) => {
                    this.row = res.payload;
                    this.loading = false;
                })
            }
        }
    }
</script>
