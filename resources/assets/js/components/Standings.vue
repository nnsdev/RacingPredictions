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
                <td>{{ standings.dpi.pivot.position }}</td>
                <td>{{ standings.dpi.team }}</td>
                <td>{{ standings.dpi.pivot.current_driver }}</td>
                <td>{{ standings.dpi.pivot.position == '1' ? '-' : standings.dpi.pivot.gap_to_leader }}</td>
                <td>{{ standings.dpi.pivot.state }}</td>
                <td>{{ standings.dpi.pivot.last_lap }}</td>
            </tr>
            <tr v-if="race !== 3">
                <td>{{ standings.lmp2.pivot.position }}</td>
                <td>{{ standings.lmp2.team }}</td>
                <td>{{ standings.lmp2.pivot.current_driver }}</td>
                <td>{{ standings.lmp2.pivot.position == '1' ? '-' : standings.lmp2.pivot.gap_to_leader }}</td>
                <td>{{ standings.lmp2.pivot.state }}</td>
                <td>{{ standings.lmp2.pivot.last_lap }}</td>
            </tr>
            <tr v-if="race !== 3">
                <td>{{ standings.gtlm.pivot.position }}</td>
                <td>{{ standings.gtlm.team }}</td>
                <td>{{ standings.gtlm.pivot.current_driver }}</td>
                <td>{{ standings.gtlm.pivot.position == '1' ? '-' : standings.gtlm.pivot.gap_to_leader }}</td>
                <td>{{ standings.gtlm.pivot.state }}</td>
                <td>{{ standings.gtlm.pivot.last_lap }}</td>
            </tr>
            <tr>
                <td>{{ standings.gtd.pivot.position }}</td>
                <td>{{ standings.gtd.team }}</td>
                <td>{{ standings.gtd.pivot.current_driver }}</td>
                <td>{{ standings.gtd.pivot.position == '1' ? '-' : standings.gtd.pivot.gap_to_leader }}</td>
                <td>{{ standings.gtd.pivot.state }}</td>
                <td>{{ standings.gtd.pivot.last_lap }}</td>
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
