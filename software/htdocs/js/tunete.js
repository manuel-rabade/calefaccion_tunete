$(document).ready(function () {
        $.getJSON('history.php', drawL7D);
    });

function drawL7D (data) {
    var canvas = document.getElementById("l7d").getContext('2d');
    var chart = new Chart(canvas, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: [{
                        label: "Temperatura superior",
                        data: data.particle,
                        backgroundColor: [
                                          'rgba(105, 0, 132, .2)',
                                          ],
                        borderColor: [
                                      'rgba(200, 99, 132, .7)',
                                      ],
                        borderWidth: 2
                    },
    {
        label: "Temperatura ambiente",
        data: data.owm,
        backgroundColor: [
                          'rgba(0, 137, 132, .2)',
                          ],
        borderColor: [
                      'rgba(0, 10, 130, .7)',
                      ],
        borderWidth: 2
    }
                    ]
            },
            options: {
                responsive: true
            }
        });
}
