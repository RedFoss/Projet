
var nombre =Number(prompt("Entre le nombre initiale i:"))

for (var i = nombre; i < nombre + 10; i++) {
    if (i % 2 === 0) {
        console.log(i + " est paire");
    }else{
    	console.log(i + "est impaire");
    }
}
