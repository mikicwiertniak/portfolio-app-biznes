<div>
    <div class="w-1/2">
        @foreach($cryptoForAnalytics as $crypto)

        @endforeach
    </div>

    <div class="w-1/2">
        <div id="chart">

        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
            },
            markers: {
                size: 10,
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    })
</script>
