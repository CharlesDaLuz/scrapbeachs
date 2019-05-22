$.getJSON("../busca.php", function(dados){
	var pontoid = document.getElementById('PontoID').value;
    var count = dados[pontoid].length;
    var counter = 0;
    var datas = [];
    var agua = [];
    var ar = [];
    var ecoli = [];
    while(count > 0) {
        datas[counter] = [dados[pontoid][counter][0]];
        agua[counter] = parseInt([dados[pontoid][counter][1]], 10);
        ar[counter] = [dados[pontoid][counter][2]];
        ecoli[counter] = [dados[pontoid][counter][3]];
        counter++;
        count --;
    }
//gerar o grafico
var ctx = document.getElementById('GraficoA');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: datas,  // array com datas
        datasets: [{
            label: ['Água (Cº)'], //legenda 
            data: agua, //array com temp agua
            backgroundColor: [
                'rgba(0, 255, 132, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        },{
            label: ['Ar (Cº)'], //legenda 
            data: ar, //array com temp ar
            backgroundColor: [
                'rgba(255, 0, 132, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var ctx2 = document.getElementById('GraficoB');
var myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: datas,  // array com datas
        datasets: [{
            label: ['E.coli NMP*/100ml'], //legenda 
            data: ecoli, //array com temp agua
            backgroundColor: [
                'rgba(0, 0, 255, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
});
