 <form method=post>
               <?php
               $jer=date('Y');
               $jerp=date('Y')-1;
               $jerf=date('Y')+1;
               echo "

               <select id=mauf onChange=wybierzMc() name=mauf>";
               	
                if($_SESSION['mc']=='01')
               	echo "<option selected value='01'>Styczeń</option>";
               else
               	echo "<option value='01'>Styczeń</option>";

               if($_SESSION['mc']=='02')
               	echo "<option selected value='02'>Luty</option>";
               else
               	echo "<option value='02'>Luty</option>";


               if($_SESSION['mc']=='03')
               	echo "<option selected value='03'>Marzec</option>";
               else
               	echo "<option value='03'>Marzec</option>";

               if($_SESSION['mc']=='04')
               	echo "<option selected value='04'>Kwiecien</option>";
               else
               	echo "<option value='04'>Kwiecien</option>";

               if($_SESSION['mc']=='05')
               	echo "<option selected value='05'>Maj</option>";
               else
               	echo "<option value='05'>Maj</option>";

               if($_SESSION['mc']=='06')
               	echo "<option selected value='06'>Czerwiec</option>";
               else
               	echo "<option value='06'>Czerwiec</option>";

				if($_SESSION['mc']=='07')
               	echo "<option selected value='07'>Lipiec</option>";
               else
               	echo "<option value='07'>Lipiec</option>";

               if($_SESSION['mc']=='08')
               	echo "<option selected value='08'>Sierpień</option>";
               else
               	echo "<option value='08'>Sierpień</option>";

               if($_SESSION['mc']=='09')
               	echo "<option selected value='09'>Wrzesień</option>";
               else
               	echo "<option value='09'>Wrzesień</option>";
			
			if($_SESSION['mc']=='10')
               	echo "<option selected value='10'>Pażdziernik</option>";
               else
               	echo "<option value='10'>Październik</option>";

               if($_SESSION['mc']=='11')
               	echo "<option selected value='11'>Listopad</option>";
               else
               	echo "<option value='11'>Listopad</option>";

               if($_SESSION['mc']=='12')
               	echo "<option selected value='12'>Grudzień</option>";
               else
               	echo "<option value='12'>Grudzień</option>";

               echo "</select>





               <select id=jer name=jer onChange=wybierzRok()>";

               if($_SESSION['jer']==$jerp)
               	echo "<option selected value=".$jerp.">".$jerp."</option>";
               else
               	echo "<option value=".$jerp.">".$jerp."</option>";

               if($_SESSION['jer']==$jer)
               	echo "<option selected value=".$jer.">".$jer."</option>";
               else
               	echo "<option value=".$jer.">".$jer."</option>";
               
               if($_SESSION['jer']==$jerf)
               	echo "<option selected value=".$jerf.">".$jerf."</option>";
               else
               	echo "<option value=".$jerf.">".$jerf."</option>";
               
              	echo " </select>";


               
               ?>

            </form>

<script type="text/javascript">
	
	function wybierzRok(){
		var rok=document.getElementById('jer');
		//console.log(pracownicy.value);
		var rok2=rok.value;
	var znacznik = document.createElement('input');
		znacznik.setAttribute('type', 'hidden');
		znacznik.setAttribute('name', 'ktoryRok');
		znacznik.setAttribute('value',rok2 );
		var kontener = document.getElementById("ukryty");
		kontener.appendChild(znacznik);
		
		//console.log(rok.innerHTML+='<option value='+rok2+' selected hidden>'+rok2+'</option>');

 		 $( "button[name=wyslij]" ).trigger( "click" );

}

function wybierzMc(){
		var mc=document.getElementById('mauf');
		//console.log(pracownicy.value);
		var mc=mc.value;
	var znacznik = document.createElement('input');
		znacznik.setAttribute('type', 'hidden');
		znacznik.setAttribute('name', 'ktoryMc');
		znacznik.setAttribute('value',mc );
		var kontener = document.getElementById("ukryty");
		kontener.appendChild(znacznik);
		
 		 $( "button[name=wyslij2]" ).trigger( "click" );
}


</script>
<?php
if(isset($_POST['wyslij']))
{
	$_SESSION['jer']=$_POST['ktoryRok'];
	//echo "<script>alert(".$_SESSION['jer'].")</script>";



	echo 
	"<script>
	rok2=".$_SESSION['jer'].";
	var rok=document.getElementById('jer');
	for(let i=0;i<=2;i++)
		if(rok[i].value==rok2)
		{
			rok[i].setAttribute('selected','');
		
		}
		else
		{
			rok[i].removeAttribute('selected','');
			
		}
	</script>";

}

if(isset($_POST['wyslij2']))
{
	$_SESSION['mc']=$_POST['ktoryMc'];
	//echo "<script>alert(".$_POST['ktoryMc'].")</script>";


	echo 
	"<script>
	mc2=".$_SESSION['mc'].";
	var mc=document.getElementById('mauf');
	for(let i=0;i<=11;i++)
		if(mc[i].value==mc2)
		{
			mc[i].setAttribute('selected','');
		
		}
		else
		{
			mc[i].removeAttribute('selected','');
			
		}
	</script>";


}



//--- tam juz tabela ....
?>