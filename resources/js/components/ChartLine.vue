<template>
    <div class="flex items-center justify-center px-4 w-100">
        <canvas id="myChart" width="200px" height="100px"></canvas>
    </div>
</template>

<script setup>
    import { onMounted } from 'vue';
    import Chart from 'chart.js/auto';
    var labels = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    onMounted(() => {
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    data: [Math.ceil(Math.random()*900), Math.ceil(Math.random()*900), Math.ceil(Math.random()*900), Math.ceil(Math.random()*900), Math.ceil(Math.random()*900), Math.ceil(Math.random()*900), Math.ceil(Math.random()*900), Math.ceil(Math.random()*900), Math.ceil(Math.random()*900), Math.ceil(Math.random()*900), Math.ceil(Math.random()*900), Math.ceil(Math.random()*900)],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 1
                }],
                display: false,
            },
            options: {
                animations: {
                    tension: {
                        duration: 1050,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    })
</script>