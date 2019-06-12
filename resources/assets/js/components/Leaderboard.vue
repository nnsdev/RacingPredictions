<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Points</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in leaderboard" :key="user.id" :class="(userid == user.user_id) ? 'bg-primary text-white' : ''">
                                <td>{{ index +1 }}</td>
                                <td><a :href="'/user/' + user.user.id" :class="(userid == user.user_id) ? 'text-white' : ''">{{ user.user.name }}</a></td>
                                <td>{{ user.points }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a :href="'/race/' + race + '/results'" class="btn btn-primary">Full Leaderboard</a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'leaderboard',
    props: ['userid', 'race'],
    data: () => {
        return {
            leaderboard: null
        }
    },
    methods: {
        update () {
            window.axios.get('/api/leaderboard/' + this.race).then(res => {
                this.leaderboard = res.data
            }).catch(err => {
                console.log(err);
            })
        }
    },
    mounted () {
        this.update()
        var timer = setInterval(function () {
            window.axios.get('/api/leaderboard/' + this.race).then(res => {
                this.leaderboard = res.data
            }).catch(err => {
                console.log(err);
            })
        }.bind(this), 60000)
    }
}
</script>
