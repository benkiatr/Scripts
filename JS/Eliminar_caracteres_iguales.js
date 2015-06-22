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
