<template>
    <div>
        <table class="table table-responsive">
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Points</td>
            </tr>
            <tr v-for="(user, index) in leaderboard" :key="user.id" :class="(userid == user.id) ? 'bg-primary text-white' : ''">
                <td>{{ index +1 }}</td>
                <td><a :href="'/user/' + user.id">{{ user.name }}</a></td>
                <td>{{ user.points }}</td>
            </tr>
        </table>
        <a href="/leaderboard" class="btn btn-primary">Full Leaderboard</a>
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
