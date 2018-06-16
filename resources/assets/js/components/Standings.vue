<template>
    <table class="table" v-if="standings">
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
                <td>{{ standings.lmp1.position }}</td>
                <td>#{{ standings.lmp1.car_number + " " + standings.lmp1.name }}</td>
                <td>{{ standings.lmp1.current_driver }}</td>
                <td>{{ standings.lmp1.position == '1' ? '-' : standings.lmp1.gap_to_leader }}</td>
                <td>{{ standings.lmp1.state }}</td>
                <td>{{ standings.lmp1.last_lap }}</td>
            </tr>
            <tr>
                <td>{{ standings.lmp2.position }}</td>
                <td>#{{ standings.lmp2.car_number + " " + standings.lmp2.name }}</td>
                <td>{{ standings.lmp2.current_driver }}</td>
                <td>{{ standings.lmp2.position == '1' ? '-' : standings.lmp2.gap_to_leader }}</td>
                <td>{{ standings.lmp2.state }}</td>
                <td>{{ standings.lmp2.last_lap }}</td>
            </tr>
            <tr>
                <td>{{ standings.gtepro.position }}</td>
                <td>#{{ standings.gtepro.car_number + " " + standings.gtepro.name }}</td>
                <td>{{ standings.gtepro.current_driver }}</td>
                <td>{{ standings.gtepro.position == '1' ? '-' : standings.gtepro.gap_to_leader }}</td>
                <td>{{ standings.gtepro.state }}</td>
                <td>{{ standings.gtepro.last_lap }}</td>
            </tr>
            <tr>
                <td>{{ standings.gteam.position }}</td>
                <td>#{{ standings.gteam.car_number + " " + standings.gteam.name }}</td>
                <td>{{ standings.gteam.current_driver }}</td>
                <td>{{ standings.gteam.position == '1' ? '-' : standings.gteam.gap_to_leader }}</td>
                <td>{{ standings.gteam.state }}</td>
                <td>{{ standings.gteam.last_lap }}</td>
            </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    name: 'standings',
    data: () => {
        return {
            standings: null
        }
    },
    methods: {
        update () {
        }
    },
    mounted () {
        window.axios.get('/api/standings').then(res => {
            this.standings = res.data
        }).catch(err => {
            console.log(err);
        })
        var timer = setInterval(function () {
            window.axios.get('/api/standings').then(res => {
                this.standings = res.data
            }).catch(err => {
                console.log(err);
            })
        }.bind(this), 60000)
    }
}
</script>
