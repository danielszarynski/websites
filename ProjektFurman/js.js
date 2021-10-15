function NormalizujTabeleWyjazdy(){
//jezeli data jak wyzej to je scal
	var tabela =document.getElementsByName("daty");
	var licz=1;
	
	for(let i=tabela.length-1;i>=0;i--)
		{
			if(i==0)
			tabela[i].rowSpan=licz;

 			if(i-1>=0)
        		if(tabela[i].textContent==tabela[i-1].textContent)
         		{
         			tabela[i].rowSpan=licz;
         			tabela[i].remove();
         			licz++;   
         		}
         		else
         		{
         		//	$("td#daty:empty").remove();
         			tabela[i].rowSpan=licz;
         			console.log(licz);
         			licz=1;    
         		}
    	}




licz=1;
}

var tylkoRaz=0;
var ok=0;
//var sprwyjzd=0;
function odblokuj(ktora,id1){
	
	//console.log(ktora,id1);

//jezeli id kierowcy jest rozne,ale id wyjazdu oraz nazwa usera taka sama to blad



var inputy=document.getElementById(ktora);
inputy.removeAttribute("disabled");
console.log(inputy.value);
var usr=inputy.value;



var selekty=document.getElementById(ktora);
	selekty.style.backgroundColor='white';
	selekty.style.color='black';




	

	
		if(tylkoRaz==0 )
	{
		//pokaz zapisz jak tylko zmieniono jakis input z edytuj wyjazdy
		var znacznik = document.createElement('input');
		znacznik.setAttribute('type', 'submit');
		znacznik.setAttribute('id', 'tenO');
		znacznik.setAttribute('name', 'wyslijZmiany');
		znacznik.setAttribute('value', 'Zapisz');
		var kontener = document.getElementById("wyjazdyEdytowalne");
		kontener.appendChild(znacznik);
		tylkoRaz=1;
	}

	//sprWyjazdy(ktora,id1,usr);
}



/*
	
<script type="text/javascript">
	function czyWbazie(ktora)
			{			
			var dane=document.getElementById(ktora);
			var loginORtrasa=dane.value;
			console.log(loginORtrasa);
			var ok=0;
			<?php
			$useryORwyjazdy=$pdo->query("SELECT t.Trasa, u.UserName FROM trasa t,users u");
				while($row = $useryORwyjazdy->fetch(PDO::FETCH_ORI_NEXT))
     			 {
				?>	
				if (loginORtrasa == '<?=$row[0]?>' || loginORtrasa=='<?=$row[1]?>')
						ok=1;
				
				<?php
				 $stmt->closeCursor();
				}?>
				
				if(ok==0)
					dane.style.background='red';
				else
					dane.style.background='white';
			}
</script>




function sprWyjazdy(kierowcaID,wyjazdID,username){
	var wyjazdy=document.getElementById("wyjazdy").select;

	console.log(wyjazdy);

	sprwyjzd=1;
}*/