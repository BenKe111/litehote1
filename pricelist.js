class pricelist {
function raschitat() {
lvl  = document.getElementById('lvl').value;
switch (lvl) {
   case "window":
      cena = 1200;
      break;
   case "television":
      cena = 1500;
      break   ;
   case "conditioning":
      cena = 2500;
      break   ;
   case "jacuzzi minibar":
      cena = 4000;
      break;
}
    dop = document.getElementById('dop').value;
    switch(dop){
        case "wifi":
            stoim = 500;
            break;
        case "food":
            stoim = 1300;
            break;
        case "all":
            stoim = 1800;
            break;
        case "null":
            stoim = 0;
            break;
    }
    room = document.getElementById('room').value;
    switch(room){
        case "stand":
            price = 2000;
            break;
        case "one":
            price = 1500;
            break;
        case "two":
            price = 2000;
            break;
        case "stud":
            price = 2500;
            break;
    }
stoimost = stoim+cena+price;
document.getElementById('stoimost').innerHTML = "Стоимость равна: "+ stoimost +" р..";
}
}