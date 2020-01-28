var numer = Math.floor(Math.random()*7)+1;
function odliczanie()
{
	var dzisiaj = new Date();

	var dzien = dzisiaj.getDate();
	if (dzien<10) dzien ="0"+dzien;
	var miesiac = dzisiaj.getMonth()+1;
	if (miesiac<10) miesiac ="0"+miesiac;
	var rok = dzisiaj.getFullYear();

	var sekunda = dzisiaj.getSeconds();
	if (sekunda<10) sekunda ="0"+sekunda;
	var minuta = dzisiaj.getMinutes();
	if (minuta<10) minuta ="0"+minuta;
	var godzina = dzisiaj.getHours();
	if (godzina<10) godzina ="0"+godzina;

	document.getElementById("zegar").innerHTML = dzien+"/"+miesiac+"/"+rok+"|"+godzina+":"+minuta+":"+sekunda;
	setTimeout("odliczanie()", 1000);
}
	
			
			function schowaj()
			{
				$("#slider").fadeOut(500);
			}
		
			function zmienslajd()
			{
				numer++; if (numer>7) numer=1;
				
				var plik = "<img src=\"slajdy/slajd" + numer + ".jpg\" />";
				
				document.getElementById("slider").innerHTML = plik;
				$("#slider").fadeIn(500);
				
				timer1 = setTimeout("zmienslajd()", 6000);
				timer2 = setTimeout("schowaj()", 5500);
			
			}
	
