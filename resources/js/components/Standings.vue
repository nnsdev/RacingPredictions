<template>
<div>
    <div class="row">
        <div class="col-md-6">
            State: {{ state }}
        </div>
        <div class="col-md-6">
            Last update: {{ last_update }} GMT
        </div>
    </div>
    <p><strong>Current Points:</strong> {{ points }}</p>
    <table class="table table-responsive" v-if="standings">
        <thead>
            <tr>
                <th>#</th>
                <th>Car</th>
                <th>Driver</th>
                <th>Gap</th>
                <th>Status</th>
                <th>Last Lap</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ standings.lmp1.pivot.position }}</td>
                <td>{{ standings.lmp1.team }}</td>
                <td>{{ standings.lmp1.pivot.current_driver }}</td>
                <td>{{ standings.lmp1.pivot.position == '1' ? '-' : standings.lmp1.pivot.gap_to_leader }}</td>
                <td>{{ standings.lmp1.pivot.state }}</td>
                <td>{{ standings.lmp1.pivot.last_lap }}</td>
            </tr>
            <tr>
                <td>{{ standings.lmp2.pivot.position }}</td>
                <td>{{ standings.lmp2.team }}</td>
                <td>{{ standings.lmp2.pivot.current_driver }}</td>
                <td>{{ standings.lmp2.pivot.position == '1' ? '-' : standings.lmp2.pivot.gap_to_leader }}</td>
                <td>{{ standings.lmp2.pivot.state }}</td>
                <td>{{ standings.lmp2.pivot.last_lap }}</td>
            </tr>
            <tr>
                <td>{{ standings.gtepro.pivot.position }}</td>
                <td>{{ standings.gtepro.team }}</td>
                <td>{{ standings.gtepro.pivot.current_driver }}</td>
                <td>{{ standings.gtepro.pivot.position == '1' ? '-' : standings.gtepro.pivot.gap_to_leader }}</td>
                <td>{{ standings.gtepro.pivot.state }}</td>
                <td>{{ standings.gtepro.pivot.last_lap }}</td>
            </tr>
            <tr>
                <td>{{ standings.gteam.pivot.position }}</td>
                <td>{{ standings.gteam.team }}</td>
                <td>{{ standings.gteam.pivot.current_driver }}</td>
                <td>{{ standings.gteam.pivot.position == '1' ? '-' : standings.gteam.pivot.gap_to_leader }}</td>
                <td>{{ standings.gteam.pivot.state }}</td>
                <td>{{ standings.gteam.pivot.last_lap }}</td>
            </tr>
        </tbody>
    </table>
</div>
</template>
<script>
export default {
    name: 'standings',
    props: ['race'],
    data: () => {
        return {
            standings: {},
            remaining: 0,
            state: 'Green Flag',
            last_update: null,
            points: 0
        }
    },
    methods: {
        update () {
            window.axios.get('/api/standings/' + this.race).then(res => {
                console.log(res);
                this.standings = res.data.standings
                this.last_update = res.data.last_update
                this.points = res.data.points
                this.state = res.data.state
                this.remaining = res.data.remaining
            }).catch(err => {
                console.log(err);
            })
        }
    },
    mounted () {
        this.update()
        var timer = setInterval(function () {
            window.axios.get('/api/standings/' + this.race).then(res => {
                this.standings = res.data.standings
                this.last_update = res.data.last_update
                this.points = res.data.points
                this.state = res.data.state
                this.remaining = res.data.remaining
            }).catch(err => {
                console.log(err);
            })
        }.bind(this), 60000)
    }
}
</script>
