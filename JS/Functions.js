// Funcion para borrar datos iguales dentro de un array
function deleteCharactersEquals(characters)
{
	var i
	var leng = characters.length
	var out = []
	var obj = {}

	for ( i = 0 ; i < leng ; i++) 
	{
		obj[characters[i]] = 0
	}

	for ( i in obj )
	{
		out.push(i)
	}

	return out;
}
// Funcion para Generar Strings Aleatorios
function password(length,special)
{
	var iteration = 0;
  	var password = "";
  	var randomNumber;
  	if(special == undefined){
      	var special = false;
  	}
  	while(iteration < length){
    	randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
    	if(!special){
      		if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
      		if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
      		if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
      		if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
    	}
    	iteration++;
    	password += String.fromCharCode(randomNumber);
  	}
  	return password;
}
// Funcion para des-Ordenar un arreglo
function Shuffle(o) {
  for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
  return o;
};